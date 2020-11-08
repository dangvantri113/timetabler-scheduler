@extends('layout')
@section('load-css')
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
    <div class="admin-content">
        @include('component.side-bar')
        <div class="w-100">
            @if(session('message'))
                <span class="add-message">{{session('message')}}</span>
            @endif
            @include('component.teacher.add')
            @include('component.teacher.list')
        </div>
    </div>    <div id="delete-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want delete this subject?</p>
                </div>
                <form id="delete-teacher-form" method="post" action="/admin/teacher/delete" hidden>
                    @csrf
                    <input type="number" name="id" id="ip-delete-id">
                </form>
                <div class="modal-footer">
                    <button type="submit" form="delete-subject-form" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function editTeacher(id)
        {
            let formEdit = document.getElementById('form-teacher');
            formEdit.action = '/admin/teacher/edit';
            let ipID = document.getElementById('ip-id');
            let ipName = document.getElementById('ip-name');
            let ipEmail = document.getElementById('ip-email');
            let ipMale = document.getElementById('ip-male');
            let ipFemale = document.getElementById('ip-female');
            let ipBirthday = document.getElementById('ip-birthday');
            let ipPosition = document.getElementById('sl-position');

            let teacherName = document.querySelector('#tc-'+id+' .teacher-name').innerHTML;
            let teacherEmail = document.querySelector('#tc-'+id+' .teacher-email').innerHTML;
            let teacherBirthday = document.querySelector('#tc-'+id+' .teacher-birthday').innerHTML;
            let teacherGender = document.querySelector('#tc-'+id+' .teacher-gender').innerHTML;
            let teacherPosition = document.querySelector('#tc-'+id+' .teacher-position').innerHTML;
            let teacherSubjects = document.querySelectorAll('#tc-'+id+' .subject-item');
            debugger;

            ipID.value = id;
            ipName.value = teacherName;
            ipEmail.value = teacherEmail;
            if(teacherGender == "Nam") {
                ipMale.checked = true;
            } else {
                ipFemale.checked = true;
            }
            ipBirthday.value = teacherBirthday;
            ipPosition.value = teacherPosition;

            teacherSubjects.forEach(function (e){
                console.log(e.className);
                document.getElementById('cb_subject_'+e.className.slice(16)).checked = true;
            });
            // ipEmail.value = teacherEmail;
            // ipEmail.value = teacherEmail;
        }
        function deleteTeacher(id){
            let ipDeleteID = document.getElementById('ip-delete-id');
            ipDeleteID.value = id;
            $('#delete-modal').modal('show');
        }
    </script>
@endsection
@section('load-js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection


