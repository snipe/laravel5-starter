@extends('layouts/default')

{{-- Page title --}}
@section('title')
     Register ::
@parent
@stop


{{-- Page content --}}
@section('content')

<section class="container">
    <div class="row">

        <div class="col-md-6 col-sm-12 col-xs-12">

        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div class="form-group col-md-3">
                <label for="name">Name</label>
            </div>
            <div class="form-group col-md-9">
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group col-md-3">
                <label for="email">Email</label>
            </div>
            <div class="form-group col-md-9">
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group col-md-3">
                <label for="password">Password</label>
            </div>
            <div class="form-group col-md-9">
                <input type="password" name="password">
            </div>

            <div class="form-group col-md-3">
                <label for="password_confirmation">Confirm Password</label>
            </div>
            <div class="form-group col-md-9">
                <input type="password" name="password_confirmation">
            </div>

            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>

    </div><!--end row-->
</section>
@stop
