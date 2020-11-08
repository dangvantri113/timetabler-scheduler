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
                <a href="/admin/profile"><i class="fas fa-address-card"></i>Tài Khoản</a>
            </div>
            <div class="menu-item">
                <a href="/admin/add-admin"><i class="fas fa-users-cog"></i>Thêm Admin</a>
            </div>
            <div class="menu-item">
                <a href="/admin/teacher"><i class="fas fa-user"></i>Giáo Viên</a>
            </div>
            <div class="menu-item">
                <a href="/admin/klass"><i class="fas fa-user-graduate"></i>Lớp học</a>
            </div>
            <div class="menu-item">
                <a href="/admin/room"><i class="fas fa-school"></i>Phòng học</a>
            </div>
            <div class="menu-item">
                <a href="/admin/subject"><i class="fas fa-book"></i>Môn học</a>
            </div>
            <div class="menu-item">
                <a href="/admin/timetable"><i class="fas fa-calendar-week"></i>Thời khóa biểu</a>
            </div>
        </div>
    </div>
@endsection
@section('load-js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection


