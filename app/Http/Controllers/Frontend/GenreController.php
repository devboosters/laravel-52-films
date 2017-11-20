<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $genre = Genre::where('name', 'LIKE', "%$keyword%")
                ->orWhere('display_name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $genre = Genre::paginate($perPage);
        }

        return view('frontend.genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'display_name' => 'required'
		]);
        $requestData = $request->all();
        
        Genre::create($requestData);

        return redirect('genre')->with('flash_message', 'Genre added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $genre = Genre::findOrFail($id);

        return view('frontend.genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);

        return view('frontend.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'display_name' => 'required'
		]);
        $requestData = $request->all();
        
        $genre = Genre::findOrFail($id);
        $genre->update($requestData);

        return redirect('genre')->with('flash_message', 'Genre updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Genre::destroy($id);

        return redirect('genre')->with('flash_message', 'Genre deleted!');
    }
}
