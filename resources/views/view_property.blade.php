@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row col-md-10">
        <h3 class="page-header col-lg-12 text-center"><span style="font-weight: bold;">Owner</span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <a href="{{url('/owner/'. $owner->id.'/profile')}}">{{$owner->full_name}}</a>
            <span class="glyphicon glyphicon-chevron-right"></span>
            {{$property->name}}
        </h3>
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
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Property Details</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit Property Details</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Bill Payment</a></li>
                </ul>

                <!-- Tab panes -->
                <div  class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="well row">
                            <div class="form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Property Name</label>
                                        <div class="col-lg-9">
                                            <p class="form-control">{{$property->name}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Property Type</label>
                                        <div class="col-lg-9">
                                            <p class="form-control">{{$property->property_type}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Value (GHC)</label>
                                        <div class="col-lg-9">
                                            <p class="form-control">{{$property->value}}</p>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Location</label>
                                        <div class="col-lg-9">
                                            <p class="form-control">{{$property->location}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Annual Rate (GHC)</label>
                                        <div class="col-lg-9">
                                            <p class="form-control">{{$property->annual_rate}}</p>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="well row bs-component">
                            <form class="form-horizontal" method="post" action="{{url('/property/update')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="owner_id" value="{{$owner->id}}">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Property Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" value="{{$property->name}}" required class="form-control" id="name" name="name">
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
                                            <input type="number" onkeyup="onPropertyValueChange()" required value="{{$property->value}}" class="form-control" id="value" name="value">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Location</label>
                                        <div class="col-lg-9">
                                            <input type="text" required  class="form-control" value="{{$property->location}}" id="location" name="location">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Annual Rate (GHC)</label>
                                        <div class="col-lg-9">
                                            <input type="number" disabled="disabled" required value="{{$property->annual_rate}}" class="form-control" id="annual_rate" name="annual_rate">
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            {{--<button type="reset" class="btn btn-default">Cancel</button>--}}
                                            <button type="submit" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-plus"></span> Update Property Details</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="clearfix"><br></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h4>Arrears: GHC {{$property->arrears . ' '. count($property->unpaid_years)}}</h4>
                            </div>
                            @if(count($property->unpaid_years)> 0)
                                <form action="{{url('/make-payment/owner/'.$owner->id.'/property/'.$property->id)}}" method="post" class="form-horizontal col-lg-8">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-4 control-label">Select Year: </label>
                                    <div class="col-lg-4">
                                        <select name="year" class="form-control" id="">
                                            @foreach($property->unpaid_years as $year)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn col-lg-4 btn-primary">Make Payment</button>
                                </div>
                            </form>
                            @else
                                <form action="{{url('/make-payment/owner/'.$owner->id.'/property/'.$property->id)}}" method="post" class="form-horizontal col-lg-8">

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-11 control-label">
                                            This owner have not incurred any bill yet.
                                        </label>
                                        <div class="col-lg-1">
                                        </div>

                                    </div>
                                </form>
                            @endif
                        </div>
                        <table  class="table table-striped col-lg-12">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Property</th>
                                <th>Clearance For</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($transactions) > 0)
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($transaction->created_at)->toFormattedDateString()}}</td>
                                        <td>{{$transaction->property_name}}</td>
                                        <td>{{$transaction->clearance_for}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No Transactions have been made by owner!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
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
