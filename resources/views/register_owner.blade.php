@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row well col-md-10">
        <h1 class="page-header col-lg-12 text-center">Register New Owner</h1>
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

        <div class="row" style="margin-top: -50px">
            <div class="col-lg-2"></div>
            <form class="login-form col-lg-8" method="post" action="{{url('/register/owner')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" required placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="first_name">Other Names</label>
                    <input type="text" class="form-control" name="other_names" value="{{old('other_names')}}" required placeholder="Other Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" value="{{old('email')}}" name="email" required placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" minlength="10" maxlength="10" class="form-control" value="{{old('phone_number')}}" required name="phone_number" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="house_number">House Number</label>
                    <input type="text" class="form-control" required name="house_number" value="{{old('house_number')}}" placeholder="House Number">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
            <div class="col-lg-2"></div>
        </div>

    </div>
</div>
@endsection
