@extends('app')
@section('title','Category')
@section('content')

@if (session("category_mode")=='edit')
{{--adding form --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading uk-align-center"><span>Add Category</span></h3>
    <form class="uk-form-horizontal uk-margin-large uk-grid-small" action="/update_category/{{session('id')}}" method="post" uk-grid>

        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">Category</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" value="{{session('category')}}" name="category" type="text" placeholder="Some text...">
            </div>
        </div>
        @csrf

        <button class="uk-button uk-button-secondary uk-align-center" type="submit">Update user</button>

    </form>
</div>
@else

{{--adding form --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading uk-align-center"><span>Add User</span></h3>
    <form class="uk-form-horizontal uk-margin-large uk-grid-small" action="/add_category" method="post" uk-grid>

        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">Category</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="category" type="text" placeholder="Some text..." value="{{session('mobile')}}">
            </div>
        </div>
        <button class="uk-button uk-button-secondary uk-align-center" type="submit">Add Category</button>

        @csrf
    </form>
</div>

@endif

{{-- table --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading-line"><span>ALL Category</span></h3>
    <table class="uk-table uk-table-justify uk-table-divider">
        <thead>
            <tr>
                <th >NO</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catagories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->category}}</td>
                    <form action="/edit_category/{{$category->id}}" method="get">
                        <td><button class="uk-button uk-button-primary " type="submit">Update</button></td>

                    </form>

                    <form action="/delete_category/{{$category->id}}" method="get">
                        <td><button class="uk-button uk-button-danger" type="submit">Delete</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

