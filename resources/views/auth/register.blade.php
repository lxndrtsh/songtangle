@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Songtangle Registration</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@else
							<div class="alert alert-dismissible alert-info">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Welcome!</strong> We'll make this simple. Give us the requested information below, and we'll give you an account. Once you are at your account, we'll ask you to fill out some extra stuff before connecting to local musicians. No fuss!
							</div>
						@endif
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
								<button type="submit" class="btn btn-primary">Register</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection