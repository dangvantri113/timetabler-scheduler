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
            @include('component.subject-level.add')
            @include('component.subject-level.list')
        </div>
    </div>
    <div id="delete-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete Subject-Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want delete this subject-level?</p>
                </div>
                <form id="delete-subject-level-form" method="post" action="/admin/subject-level/delete" hidden>
                    @csrf
                    <input type="number" name="id" id="ip-delete-id">
                </form>
                <div class="modal-footer">
                    <button type="submit" form="delete-subject-level-level-form" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function editSubjectLevel(id)
        {
            let formEdit = document.getElementById('form-subject-level');
            formEdit.action = '/admin/subject-level/edit';
            let ipID = document.getElementById('ip-id');
            let ipSubject = document.getElementById('sl-subject');
            let ipLevel = document.getElementById('sl-level');
            let ipHours = document.getElementById('ip-units');

            let subjectLevelSubjectID = document.querySelector('#sb_'+id+' .subject-level-subject-id').id;
            let subjectLevelLevelID = document.querySelector('#sb_'+id+' .subject-level-level-id').id;
            let subjectLevelUnits = document.querySelector('#sb_'+id+' .subject-level-units').innerHTML;

            ipID.value = id;
            ipSubject.value = subjectLevelSubjectID.slice(25);
            ipLevel.value = subjectLevelLevelID.slice(23);
            ipHours.value = subjectLevelUnits;
        }
        function deleteSubjectLevel(id){
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
