<?php

namespace App\Http\Controllers\Frontend\Film;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Film\CreateFilmRequest;
use App\Http\Requests\Frontend\Film\PostCommentRequest;
use App\Models\Access\Comment\Comment;
use App\Models\Access\Film\Film;
use App\Models\Access\Genre\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{

    protected $images_folder_name = "";

    public function __construct(){
        $this->images_folder_name =  base_path() . '/public/img/frontend/films/';
    }
    /**
     * Display a listing of the Films.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        /*$films_info = Film::where('user_id', request()->user()->id)->get();*/
        $films_info = Film::where('user_id', request()->user()->id)->paginate(1);
        $films = ($films_info->count()) ? $films_info : [];

        return view('frontend.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateFilmRequest $request)
    {
        $film_form_data = $request->except(['genres']);
        $film_form_data['slug'] = strtolower(str_replace(" ", "-", $film_form_data['name'])); //saving film-slug-name

        $input_film_genres = $request->get('genres');
        $film_form_data['user_id'] = $request->user()->id;

        if ($request->file('photo') != '') {

            $uploading_image = $request->file('photo');

            $imageName = explode(".", $uploading_image->getClientOriginalName())[0]. sha1(time().time()) .'.' . $uploading_image->getClientOriginalExtension();

            $uploading_image->move($this->images_folder_name, $imageName);

            $film_form_data['photo'] = $imageName; //updated ImageName

            //managing the Film Genres Information
            $film_genre_ids = [];
            if(!empty($input_film_genres)) {
                foreach ($input_film_genres AS $film_genre){

                    if (strstr($film_genre, '||')) {
                        $film_genre_ids[] = explode("||", $film_genre)[0];
                    } else {
                        $film_genre = Genre::create(['name' => strtolower($film_genre), 'display_name' => $film_genre]);
                        $film_genre_ids[] = $film_genre->id;
                    }
                }
            }

            $film = Film::create($film_form_data);
            //saving/updating the related Genres in the fashion of many to many relationship
            $film->genres()->sync($film_genre_ids);

        }

        return redirect('films')->with('flash_message', 'Film added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    /*public function show($id)*/
    public function show($film_slug_name)
    {
        /*$film = Film::findOrFail($id);*/
        $film = Film::where('slug', $film_slug_name)->first();
        $film['genres'] = "";

        //fetching all film genres in comma separated form
        if($film->genres()->get()->count()){
            foreach($film->genres()->get() AS $genre){
                $genres[] = $genre->display_name;
            }

            $film['genres'] = implode(", ", $genres);
        }

        //fetching the associated comments
        if($film->comments()->get()->count()){

            $comments = $film->comments()->get();
        }

        return view('frontend.films.show', compact('film','comments'));
    }

    /**
     * This will fetch multiple Genres to select from Film form to attach with the film record
     * @param Request $request
     */
    public function genres(Request $request){

        $this->validate($request, ['query' => 'required']);
        $film_genres_query = $request->get('query');

        $film_genres = [];

        $film_genres_list = Genre::where('display_name', 'LIKE', $film_genres_query . "%")->get();

        foreach($film_genres_list AS $film_genre){
            $film_genres [] = ['id' => $film_genre->id . "||" . $film_genre->display_name, 'text' => $film_genre->display_name];
        }

        return $film_genres;
    }

    /**
     * This will save multiple Comments via show Film interface form to attach with the film record
     * @param Request $request
     */
    public function comments(/*PostCommentRequest*/Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->passes()) {

            $comment = new Comment();
            $comment->name = $request->get('name');
            $comment->comment = $request->get('comment');
            $comment->film_id = $request->get('film_id');
            $comment->user_id = $request->user()->id;
            $comment->save();

            //return response()->json(['success'=>'Comment added Successfully.']);

            return redirect('/films/'.$request->get('film_slug'))->with('success', 'Comment Added Successfully.')->with('film_slug_name', $request->get('film_slug'));
        }

        //return response()->json(['error'=>$validator->errors()->all()]);
    }
}
