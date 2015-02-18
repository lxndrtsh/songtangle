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
						@endif
						@yield('form')
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection