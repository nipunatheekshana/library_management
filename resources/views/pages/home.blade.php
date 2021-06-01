@extends('app')
@section('title','Home')
@section('content')


@include('includes.header')

{{-- home of student --}}
@if (Session::has("status") && session('role')=='student')
{{ session('role')}}
<div class="uk-card uk-card-default uk-card-body uk-width-3-4@m uk-align-center book_box">
    <div class="uk-child-width-1-4@m" uk-grid>
        @foreach ($data as $book )
            <div id="book-{{$book->id}}">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top" style="height: 200px; background-image: url('{{$book->img}}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                        {{-- <img src="{{$book->img}}" alt=""> --}}
                    </div>
                    <div class="uk-card-body" style="height: 200px;">
                        <h3 class="uk-card-title">{{$book->name}}</h3>
                        <p>{{$book->discription}}</p>
                        <button class="uk-button uk-button-primary" onclick="barrow({{$book}})">Barrow</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>

{{-- home of profesor --}}
@elseif (Session::has("status") && session('role')=='profesor')
{{ session('role')}}

{{-- home of librarian --}}
@elseif (Session::has("status") && session('role')=='librarian')
{{ session('role')}}
@else




{{-- barrow book modal --}}
<div id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Modal Title</h2>
        </div>
        <div class="uk-modal-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="button">Save</button>
        </div>
    </div>
</div>

@endif
@endsection

