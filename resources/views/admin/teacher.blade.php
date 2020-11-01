@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
    <div class="admin-content">
        @include('component.side-bar')
        <div style="width: 100%">
            @if(session('message'))
                <span class="add-message">{{session('message')}}</span>
            @endif
            @include('component.teacher.add')
            @include('component.teacher.list')
        </div>
    </div>
@endsection
