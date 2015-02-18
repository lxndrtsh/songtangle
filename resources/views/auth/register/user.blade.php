@extends('auth.register')

@section('form')
    <div class="form-group">
        <label class="col-md-4 control-label">Songtangle Alias</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="alias" value="{{ old('alias') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
        </div>
    </div>
    <div class="col-md-12">
        <hr />
        <div class="pull-right">
            <a class="btn btn-primary" href="/auth/register" role="button">Next &raquo;</a>
        </div>
    </div>
@endsection