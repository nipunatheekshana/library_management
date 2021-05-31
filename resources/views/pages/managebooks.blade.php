@extends('app')
@section('title','Manage books')
@section('content')

@if (session("bookmanage_mode")=='edit')

{{--editing form --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading uk-align-center"><span>UPDATE BOOK DETAILS</span></h3>
    <form class="uk-form-horizontal uk-margin-large" action="/update/{{session('id')}}" method="post">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">product name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="name" type="text" placeholder="Some text..." value="{{session('name')}}">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Duantity</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="quantity" type="text" placeholder="Some text..." value="{{session('quantity')}}">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Discription</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="discription" type="text" placeholder="Some text..." value="{{session('discription')}}">
            </div>
        </div>
        <button class="uk-button uk-button-secondary uk-align-center" type="submit">Update Book</button>

        @csrf
    </form>
</div>
@else

{{--adding form --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading uk-align-center"><span>ADD NEW BOOK</span></h3>
    <form class="uk-form-horizontal uk-margin-large" action="/add" method="post" enctype="multipart/form-data">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Book name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="name" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Quantity</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="quantity" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Discription</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="discription" type="text" placeholder="Some text...">
            </div>
        </div>
        {{-- Image --}}
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Image</label>
            <div class="js-upload uk-flex uk-padding-small  uk-padding-remove-bottom" uk-form-custom>
                <input name="image" type="file" multiple>
                <button class="uk-button-small uk-button-primary uk-width-1-1" type="button" tabindex="-1"><i uk-icon="image" class="uk-margin-small-right"></i>Select</button>
            </div>
        </div>
        <button class="uk-button uk-button-secondary uk-align-center" type="submit">Add Book</button>

        @csrf
    </form>
</div>

@endif

{{-- table --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading-line"><span>ALL BOOKS</span></h3>
    <table class="uk-table uk-table-justify uk-table-divider">
        <thead>
            <tr>
                <th class="uk-width-small">NO</th>
                <th>Book Name</th>
                <th>Quantity</th>
                <th>Discription</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->quantity}}</td>
                    <td>{{$book->discription}} </td>
                    <form action="/edit/{{$book->id}}" method="get">
                        <td><button class="uk-button uk-button-primary " type="submit">Update</button></td>

                    </form>

                    <form action="/delete/{{$book->id}}" method="get">
                        <td><button class="uk-button uk-button-danger" type="submit">Delete</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
