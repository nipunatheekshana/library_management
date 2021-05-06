@extends('app')
@section('title','Home')
@section('content')


@include('includes.header')

{{-- home of student --}}
@if (Session::has("status") && session('role')=='student')
{{ session('role')}}


{{-- home of profesor --}}
@elseif (Session::has("status") && session('role')=='profesor')
{{ session('role')}}

{{-- home of librarian --}}
@elseif (Session::has("status") && session('role')=='librarian')
{{ session('role')}}
@else

@endif
@endsection

