@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row well col-md-10">
        <h1 class="page-header col-lg-12 text-center">Property Owners Index</h1>
        @if (session('message'))
            <div id="messageNotify" class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Notification!</strong> {{session('message')}}
            </div>
            <script>
                window.setTimeout(function () {
                    $('#messageNotify').hide(1000);
                }, 6000);
            </script>
        @endif
        <table id="dataTable" class="table table-striped col-lg-12">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>House No.</th>
                <th class="text-center">No. of Props.</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($owners as $owner)
            <tr>
                <td>{{$owner->full_name}}</td>
                <td>{{$owner->email}}</td>
                <td>{{$owner->phone_number}}</td>
                <td>{{$owner->house_number}}</td>
                <td class="text-center">{{$owner->number_of_props}}</td>
                <td><a href="{{url('/owner/'.$owner->id.'/profile')}}" class="btn btn-success" >
                        <span class="glyphicon glyphicon-search"></span> View Details </a></td>
                <td>
                    <form id="deleteOwnerForm" method="post" action="{{url('/owner/'.$owner->id.'/delete')}}">
                        {{csrf_field()}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">
                            <span class="glyphicon glyphicon-remove"></span>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to permanently remove owner and his/her Properties?</p>
                    </div>
                    <div class="modal-footer">
                        <button onclick="return document.getElementById('deleteOwnerForm').submit();" type="button"
                                class="btn btn-default" data-dismiss="modal">
                                Yes, Continue
                        </button>
                        <button type="button" data-dismiss="modal" class="btn btn-primary">No, Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('local-scripts')

@endsection