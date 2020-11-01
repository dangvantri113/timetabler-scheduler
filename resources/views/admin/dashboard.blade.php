@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="admin-content">
        @include('component.side-bar')
        @include('component.admin-container')
    </div>

@endsection
