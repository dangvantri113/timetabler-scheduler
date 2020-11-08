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
            @include('component.klass.add')
            @include('component.klass.list')
        </div>
    </div>
    <div id="delete-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete Klass</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want delete this klass?</p>
                </div>
                <form id="delete-klass-form" method="post" action="/admin/klass/delete" hidden>
                    @csrf
                    <input type="number" name="id" id="ip-delete-id">
                </form>
                <div class="modal-footer">
                    <button type="submit" form="delete-klass-form" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function editKlass(id)
        {
            let formEdit = document.getElementById('form-klass');
            formEdit.action = '/admin/klass/edit';
            let ipID = document.getElementById('ip-id');
            let ipName = document.getElementById('ip-name');
            let ipStudents = document.getElementById('ip-number-students');
            let ipRoom = document.getElementById('sl-room');
            let ipTeacher = document.getElementById('sl-teacher');

            let klassName = document.querySelector('#sb_'+id+' .klass-name').innerHTML;
            let klassStudents = document.querySelector('#sb_'+id+' .klass-students').innerHTML;
            let klassTeacher = document.querySelector('#sb_'+id+' .klass-teacher').id;
            let klassRoom = document.querySelector('#sb_'+id+' .klass-room').id;

            ipID.value = id;
            ipName.value = klassName;
            ipStudents.value = klassStudents;
            ipRoom.value = klassRoom.slice(5);
            ipTeacher.value = klassTeacher.slice(8);
            // debugger;
        }
        function deleteKlass(id){
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
