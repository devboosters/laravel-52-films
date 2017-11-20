<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Comments</h4></div>
        <div class="panel-body">

            <div class="film-comments">

            {!! Form::open(['route' => ['films.comments', $film], 'id' => 'comment_form']) !!}
                <input type="hidden" name="film_id" value="{{ $film->id }}" />
                <input type="hidden" name="film_slug" value="{{ $film->slug }}" />
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input name="name" id="author" class="form-control" required="required" />

                    <label for="comment">Your Comment</label>
                    <textarea name="comment" class="form-control" rows="3" required="required"></textarea>

                </div>

                {!! Form::submit('Comment',['class'=>'send btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}

            @if(isset($comments))
                <div class="comments-nav">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                There are {{ count($comments) }} comments <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Best</a></li>
                                <li><a href="javascript:void(0)">Hot</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="row">

                    <div class="media">
                        <!-- first comment -->
                        @foreach($comments as $comment)
                        <div class="media-heading">
                            <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#{{ $comment->id }}" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">{{ $comment->id }}</span> {{ $comment->name }} -  {{ \Carbon\Carbon::now()->toDateString( $comment->created_at) }}
                        </div>

                        <div class="panel-collapse collapse in" id="{{ $comment->id }}">

                            <div class="media-left">
                                <div class="vote-wrap">
                                    <div class="vote up">
                                        <i class="glyphicon glyphicon-menu-up"></i>
                                    </div>
                                    <div class="vote inactive">
                                        <i class="glyphicon glyphicon-menu-down"></i>
                                    </div>
                                </div>
                                <!-- vote-wrap -->
                            </div>
                            <!-- media-left -->


                            <div class="media-body">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                        <!-- comments -->
                        @endforeach
                    </div>
                    <!-- first comment -->

                </div>
            @endif
        </div>
        <!-- film-comments -->
    </div>
</div>