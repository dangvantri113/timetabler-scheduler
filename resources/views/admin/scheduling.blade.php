@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome/all.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
    <div class="admin-content">
        @include('component.side-bar')
        <div class="dashboard">
            <div class="menu-item">
                <a href="/admin/timetable/view">Xem </a>
            </div>
            <div class="menu-item">
                <a href="/admin/doscheduling">Lặp TKB</a>
            </div>
            <div class="menu-item">
                <a href="/admin/timetable/export-excel">Tải file excel</a>
            </div>
        </div>
    </div>
@endsection
@section('load-js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection


