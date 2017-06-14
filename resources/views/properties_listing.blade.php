@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row col-md-10">
        <h1 class="page-header col-lg-12 text-center">Properties Listings</h1>
        <table id="propertyListingTable" class="propertyListingTable table table-striped col-lg-12">
            <thead>
            <tr>
                <th>#Prop ID</th>
                <th>Prop. Name</th>
                <th>Property Type</th>
                <th>Owner Name</th>
                <th>Monthly Rate</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

            <tr>
                <td>1011</td>
                <td>Storer Building</td>
                <td>Building</td>
                <td>Bernard White</td>
                <td>23.89</td>
                <td><button class="btn btn-success">View</button></td>
                <td><button class="btn btn-toolbar">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>






            </tbody>
        </table>

    </div>


</div>
@endsection

@section('local-scripts')
    <script>
        $(document).ready(function(){
            $(".propertyListingTable").dataTable();
        });
    </script>
@endsection


