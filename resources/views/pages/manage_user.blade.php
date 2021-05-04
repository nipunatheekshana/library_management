@extends('app')
@section('title','Manage Users')
@section('content')

@if (session("usermanage_mode")=='edit')
{{--adding form --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading uk-align-center"><span>Add User</span></h3>
    <form class="uk-form-horizontal uk-margin-large uk-grid-small" action="/update_user/{{session('user_id')}}" method="post" uk-grid>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-horizontal-text">First name</label>
            <input class="uk-input" name="first_name" type="text" placeholder="First name" value="{{session('first_name')}}">
        </div>
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-horizontal-text">Last name</label>
            <input class="uk-input" name="last_name" type="text" placeholder="Last name" value="{{session('last_name')}}">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Role</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="form-horizontal-select" name="role" >
                    <option value="student">student</option>
                    <option value="profesor">profesor</option>
                    <option value="librarian">librarian</option>
                </select>
            </div>
        </div>

        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">Mobile number</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="mobile" type="text" placeholder="Some text..." value="{{session('mobile')}}">
            </div>
        </div>
        @if (session('gender')=='Male')
            <div class="uk-margin">
                <div class="uk-form-label">Gender</div>
                <div class="uk-form-controls">
                    <label><input class="uk-radio" type="radio" name="gender" value="Male" checked> Male</label><br>
                    <label><input class="uk-radio" type="radio" name="gender" value="Female"> Female</label>
                </div>
            </div>
        @else
            <div class="uk-margin">
                <div class="uk-form-label">Gender</div>
                <div class="uk-form-controls">
                    <label><input class="uk-radio" type="radio" name="gender" value="Male"> Male</label><br>
                    <label><input class="uk-radio" type="radio" name="gender" value="Female" checked> Female</label>
                </div>
            </div>
        @endif

        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">email</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="email" type="email" placeholder="Some text..." value="{{session('email')}}">
            </div>
        </div>
        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">campus id</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="camp_id" type="text" placeholder="Some text..." value="{{session('camp_id')}}">
            </div>
        </div>
        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">Password</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="password" type="password" placeholder="Some text..." value="{{session('password')}}">
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
    <form class="uk-form-horizontal uk-margin-large uk-grid-small" action="/add_user" method="post" uk-grid>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-horizontal-text">First name</label>
            <input class="uk-input" name="first_name" type="text" placeholder="First name">
        </div>
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-horizontal-text">Last name</label>
            <input class="uk-input" name="last_name" type="text" placeholder="Last name">
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-select">Role</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="form-horizontal-select" name="role">
                    <option value="student">student</option>
                    <option value="profesor">profesor</option>
                    <option value="librarian">librarian</option>
                </select>
            </div>
        </div>

        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">Mobile number</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="mobile" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-form-label">Gender</div>
            <div class="uk-form-controls">
                <label><input class="uk-radio" type="radio" name="gender" value="Male"> Male</label><br>
                <label><input class="uk-radio" type="radio" name="gender" value="Male"> Female</label>
            </div>
        </div>
        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">email</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="email" type="email" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">campus id</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="camp_id" type="text" placeholder="Some text...">
            </div>
        </div>
        <div class="uk-width-1-1@s">
            <label class="uk-form-label" for="form-horizontal-text">Password</label>
            <div class="uk-form-controls">
                <input class="uk-input" id="form-horizontal-text" name="password" type="password" placeholder="Some text...">
            </div>
        </div>
        <button class="uk-button uk-button-secondary uk-align-center" type="submit">Register user</button>

        @csrf
    </form>
</div>

@endif

{{-- table --}}
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
    <h3 class="uk-heading-line"><span>ALL Users</span></h3>
    <table class="uk-table uk-table-justify uk-table-divider">
        <thead>
            <tr>
                <th class="uk-width-small">NO</th>
                <th>Name</th>
                <th>Role</th>
                <th>Campus Id</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->camp_id}} </td>
                    <form action="/edit_user/{{$user->id}}" method="get">
                        <td><button class="uk-button uk-button-primary " type="submit">Update</button></td>

                    </form>

                    <form action="/delete_user/{{$user->id}}" method="get">
                        <td><button class="uk-button uk-button-danger" type="submit">Delete</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
