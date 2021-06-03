@extends('app')
@section('title','Mybooks')
@section('content')

{{-- home of student --}}
{{-- @if (Session::has("status") && session('role')=='student') --}}
{{ session('role')}}
<div class="uk-card uk-card-default uk-card-body uk-width-3-4@m uk-align-center book_box">
    <h3 class="uk-heading uk-align-center"><span>Books currently in position</span></h3>

    <div class="uk-child-width-1-4@m" uk-grid>

        {{-- {{dd($myBooks)}} --}}
        @foreach ($myBooks as $book )
            @if ($book->status==1)
                <div id="book-{{$book->id}}">
                    <input type="hidden" id="barrowid-{{$book->id}}" value="{{$book->barrowid}}">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top" style="height: 200px; background-image: url('{{$book->img}}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                        </div>
                        <div class="uk-card-body" style="height: 200px;">
                            <h3 class="uk-card-title">{{$book->title}}</h3>
                            <p>{{$book->discription}}</p>
                            <button class="uk-button uk-button-primary" onclick="returnfun({{$book->id}})">Return</button>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

    </div>

</div>


<div class="uk-card uk-card-default uk-card-body uk-width-3-4@m uk-align-center ">
    <h3 class="uk-heading uk-align-center"><span>Barrow History</span></h3>
    <div class="uk-child-width-1-4@m" uk-grid>

        {{-- {{dd($myBooks)}} --}}
        @foreach ($myBooks as $book )
            @if ($book->status==0)
                <div id="book-{{$book->id}}">
                    <input type="hidden" id="barrowid-{{$book->id}}" value="{{$book->barrowid}}">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top" style="height: 200px; background-image: url('{{$book->img}}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                        </div>
                        <div class="uk-card-body" >
                            <h3 class="uk-card-title">{{$book->title}}</h3>
                            <p>{{$book->discription}}</p>
                            {{-- <button class="uk-button uk-button-primary" onclick="returnfun({{$book->id}})">Return</button> --}}
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

    </div>

</div>

@endsection
