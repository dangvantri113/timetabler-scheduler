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
            @include('component.subject.add')
            @include('component.subject.list')
        </div>
    </div>
    <div id="delete-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want delete this subject?</p>
                </div>
                <form id="delete-subject-form" method="post" action="/admin/subject/delete" hidden>
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
        function editSubject(id)
        {
            let formEdit = document.getElementById('form-subject');
            formEdit.action = '/admin/subject/edit';
            let ipID = document.getElementById('ip-id');
            let ipName = document.getElementById('ip-name');
            let ipHours = document.getElementById('ip-number-hours');

            let subjectName = document.querySelector('#sb_'+id+' .subject-name').innerHTML;
            let subjectHours = document.querySelector('#sb_'+id+' .subject-hours').innerHTML;

            ipID.value = id;
            ipName.value = subjectName;
            ipHours.value = subjectHours;
        }
        function deleteSubject(id){
            let ipDeleteID = document.getElementById('ip-delete-id');
            ipDeleteID.value = id;
            $('#delete-modal').modal('show');
        }
    </script>
    </script>
@endsection
@section('load-js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
@endsection
