@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row col-md-10">
        <h1 class="page-header col-lg-12 text-center">Register New Property</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row" style="margin-top: -50px">
            <div class="col-lg-2"></div>
            <form class="login-form col-lg-8">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Property Name">
                </div>
                <div class="form-group">
                    <label for="property_type">Property Type</label>
                    <select type="text" class="form-control" id="property_type">
                        <option value="">Cars</option>
                        <option value="">Trucks</option>
                        <option value="">Vehicles</option>
                        <option value="">Buildings</option>
                        <option value="">Stores</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="value">Value (GH¢)</label>
                    <input type="number" class="form-control" id="value">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location">
                </div>
                <div class="form-group">
                    <label for="monthly_rate">Monthly Rate (GH¢)</label>
                    <input type="text" class="form-control" id="monthly_rate">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
            <div class="col-lg-2"></div>
        </div>

    </div>
</div>
@endsection
