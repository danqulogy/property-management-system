@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row col-md-10">
        <h3 class="page-header col-lg-12 text-center"><span style="font-weight: bold;"><a href="{{url('/listings/owners')}}">Owners</a></span>
            <span class="glyphicon glyphicon-chevron-right"></span> {{$owner->full_name}}<small></small></h3>
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
        @if (count($errors) > 0)
            <div id="errorsNotify" class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{$error}}</strong></li>
                    @endforeach
                </ul>
            </div>
            <script>
                window.setTimeout(function () {
                    $('#errorsNotify').hide(1000);
                }, 6000);
            </script>
        @endif

        <div class="row well" style="margin-top: -50px">
            <div class="col-lg-1"></div>
            <div style="margin-top: 15px;" class="col-lg-9">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit Details</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Properties</a></li>
                </ul>

                <!-- Tab panes -->
                <div  class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="well bs-component">
                            <div class="form-horizontal">
                                <fieldset>
                                    <legend>Profile Details</legend>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">First Name</label>
                                        <div class="col-lg-9">
                                            <p class="form-control text-uppercase">{{$owner->first_name}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Other Names</label>
                                        <div class="col-lg-9">
                                            <p class="form-control text-uppercase">{{$owner->other_names}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Email Address</label>
                                        <div class="col-lg-9">
                                            <p class="form-control text-uppercase">{{$owner->email}}</p>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Phone Number</label>
                                        <div class="col-lg-9">
                                            <p class="form-control text-uppercase">{{$owner->phone_number}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">House Number</label>
                                        <div class="col-lg-9">
                                            <p class="form-control text-uppercase">{{$owner->house_number}}</p>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="well bs-component">
                            <form class="form-horizontal" method="post" action="{{url('/owner/'.$owner->id.'/update')}}">
                                {{csrf_field()}}
                                <fieldset>
                                    <legend>Edit Details</legend>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">First Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" required value="{{$owner->first_name}}" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Other Names</label>
                                        <div class="col-lg-9">
                                            <input type="text" required value="{{$owner->other_names}}" class="form-control" id="other_names" name="other_names" placeholder="Other Names">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Email Address</label>
                                        <div class="col-lg-9">
                                            <input type="email" required value="{{$owner->email}}" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Phone Number</label>
                                        <div class="col-lg-9">
                                            <input type="text" required minlength="10" maxlength="10" value="{{$owner->phone_number}}" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">House Number</label>
                                        <div class="col-lg-9">
                                            <input type="text" required value="{{$owner->house_number}}" class="form-control" id="house_number" name="house_number" placeholder="House Number">
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            {{--<button type="reset" class="btn btn-default">Cancel</button>--}}
                                            <button type="submit" class="btn btn-block btn-primary">Update Details</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        <div class="">
                            <button style="margin-top:5px;" data-toggle="modal" data-target="#addNewPropModal" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Add New Property</button>
                            <div class="clearfix"></div>
                            <table style="margin-top: 10px;" id="propertyListingTable" class="propertyListingTable table table-striped col-lg-12">
                                <thead>
                                <tr>
                                    {{--<th>#ID</th>--}}
                                    <th>Name</th>
                                    <th>Type</th>
                                    {{--<th>Location</th>--}}
                                    <th>Actual Value</th>
                                    <th>Rate</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($properties) > 0)
                                        @foreach($properties as $property)
                                        <tr>
                                            {{--<td>{{$property->id}}</td>--}}
                                            <td>{{$property->name}}</td>
                                            <td>{{$property->property_type}}</td>
                                            {{--<td>{{$property->location}}</td>--}}
                                            <td>GHC {{$property->value}}</td>
                                            <td>GHC {{$property->annual_rate}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{url('/owner/'.$owner->id.'/property/'.$property->id)}}" class="btn btn-success">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                        View Property
                                                    </a>
                                                    <a class="btn btn-danger" href="{{url('/delete/property/'.$property->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">No Properties have been registered against this owner!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="modal fade" id="addNewPropModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Properties</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="well bs-component">
                                                <form class="form-horizontal" method="post" action="{{url('/property/register')}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="owner_id" value="{{$owner->id}}">
                                                    <fieldset>
                                                        <legend>Add New Property</legend>
                                                        <div class="form-group">
                                                            <label for="inputEmail" class="col-lg-3 control-label">Property Name</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" value="{{old('name')}}" required class="form-control" id="name" name="name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputEmail" class="col-lg-3 control-label">Property Type</label>
                                                            <div class="col-lg-9">
                                                                <select required class="form-control" name="property_type_id" placeholder="Other Names">
                                                                    <option value="">-- Select the Property Type --</option>
                                                                    @foreach($property_types as $property_type)
                                                                        <option value="{{$property_type->id}}">{{$property_type->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputEmail" class="col-lg-3 control-label">Value (GHC)</label>
                                                            <div class="col-lg-9">
                                                                <input type="number" onkeyup="onPropertyValueChange()" required value="{{old('value')}}" class="form-control" id="value" name="value">
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label for="inputEmail" class="col-lg-3 control-label">Location</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" required  class="form-control" value="{{old('location')}}" id="location" name="location">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputEmail" class="col-lg-3 control-label">Annual Rate (GHC)</label>
                                                            <div class="col-lg-9">
                                                                <input type="number" disabled="disabled" required value="{{old('annual_rate')}}" class="form-control" id="annual_rate" name="annual_rate">
                                                            </div>
                                                        </div>




                                                        <div class="form-group">
                                                            <div class="col-lg-9 col-lg-offset-3">
                                                                {{--<button type="reset" class="btn btn-default">Cancel</button>--}}
                                                                <button type="submit" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Property</button>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Yes, Continue</button>--}}
                                            <button type="button" data-dismiss="modal" class="btn btn-primary">No, Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-1"></div>
        </div>

    </div>
</div>
<script>

    function onPropertyValueChange(){
        document.getElementById('annual_rate').value = 0.2 * $('#value').val();
    }
</script>
@endsection
