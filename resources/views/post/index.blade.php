@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @foreach ($list as $post)

                    <div class="panel panel-default">
                        <div class="panel-heading">{{$post->title}}</div>

                        <div class="panel-body">
                            <div>{{$post->content}}</div>
                            <div>{{$post->created_at->format('Y-m-d H:i')}} {{$post->user->name}} </div>
                        </div>

                        @if ($post->user_id == \Auth::id())
                            <div><a href="">edit</a></div>
                        @endif


                        @if ( \Auth::guard('admin')->check())
                            <div><a href="">admin edit</a></div>
                        @endif

                    </div>

                @endforeach

                <div>
                    {{$list->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection
