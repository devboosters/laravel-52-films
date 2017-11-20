
<div class="box-body">

    <div class="row">
        <div class="col-md-12">

            <fieldset class="col-md-12">
                <div class="col-md-6">

                     {!! Form::label('name', trans('labels.frontend.codeline_app.film.name'),['class'=>'control-label']) !!}
                     {!! Form::input('text', 'name', null, ['class' => 'form-control', 'required' => 'required']) !!}

                </div>
                <div class="col-md-6">

                     {!! Form::label('description', trans('labels.frontend.codeline_app.film.description'), ['class'=>'control-label']) !!}
                     {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'cols' => '20', 'rows' => '10' ]) !!}

                </div>
                <div class="col-md-6">
                     {!! Form::label('name', trans('labels.frontend.codeline_app.film.release_date'), ['class'=>'control-label']) !!}
                     <div class="input-group date form_dateonly">
                           <span class="input-group-addon">
                                <span class="fa fa-calendar-o"></span>
                           </span>
                           {!! Form::input('text', 'release_date', null, ['class' => 'form-control readonly', 'readOnly' => 'readOnly', 'required' => 'required']) !!}
                     </div>
                </div>
                <div class="col-md-6">

                    <br />
                    <br />
                     {!! Form::label('rating', trans('labels.frontend.codeline_app.film.rating'),['class'=>'control-label']) !!} :
                     {!! Form::input('hidden', 'rating', null, ['class' => 'form-control rating', 'required' => 'required']) !!}
                     {{--{!! Form::input('text', 'rating', null, ['class' => 'form-control rating', 'required' => 'required']) !!}--}}

                </div>
                <div class="col-md-6">

                     {!! Form::label('ticket_price', trans('labels.frontend.codeline_app.film.ticket_price'),['class'=>'control-label']) !!}
                     {!! Form::input('number', 'ticket_price', null, ['class' => 'form-control', 'required' => 'required']) !!}

                </div>
                <div class="col-md-6">

                     {!! Form::label('country',  trans('labels.frontend.codeline_app.film.country'), ['class'=>'control-label']) !!}
                     {!! Form::selectCountry('country',  null ,['class' => 'form-control', 'required' => 'required']) !!}

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('genres',  trans('labels.frontend.codeline_app.film.genres'), ['class'=>'control-label']) !!}
                        {{--{!! Form::select('genres[]',  null, ['id' => 'film_genres', 'class' => 'form-control', 'required' => 'required']) !!}--}}
                        <select name="genres[]" id="film_genres" class="form-control" required="required"></select>
                    </div>
                </div>
                <div class="col-md-6">

                     {!! Form::label('photo', trans('labels.frontend.codeline_app.film.photo'),['class'=>'control-label']) !!}
                     {!! Form::input('file', 'photo', null, ['class' => 'form-control', 'required' => 'required']) !!}

                </div>

                <div class="form-group">
                    <div class="col-md-offset-10 col-md-2">
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>