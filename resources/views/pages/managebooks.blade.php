@extends('app')
@section('title','Manage books')
@section('content')

@if (session("bookmanage_mode")=='edit')

{{--editing form --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading uk-align-center"><span>UPDATE BOOK DETAILS</span></h3>
    <form class="uk-form-horizontal uk-margin-large" action="/update/{{session('id')}}" method="post">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">ISBN number</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('isbnNum')}}" name="isbnNum" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Title</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('title')}}" name="title" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Author Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('authorName')}}" name="authorName" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Publisher</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('publisher')}}" name="publisher" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Category</label>

            <div class="uk-form-controls">
                <select class="uk-select" name="category">
                        <option value="{{session('category_id')}}">{{session('category')}}</option>
                    @if (isSet($category))
                        @foreach ($category as $category )
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    @endif

                </select>
            </div>

        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Edition</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('edition')}}" name="edition" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Discription</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('discription')}}" name="discription" type="text" placeholder="Some text...">
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
            <label class="uk-form-label" for="form-horizontal-text">ISBN number</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="isbnNum" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Title</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="title" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Author Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="authorName" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Publisher</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="publisher" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Category</label>


            <div class="uk-form-controls">
                <select class="uk-select" name="category">
                    @foreach ($data[1] as $category )
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Edition</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="edition" type="text" placeholder="Some text...">
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
            @foreach ($data[0] as $book)
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
