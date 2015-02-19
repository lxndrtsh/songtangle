@extends('app')

@section('content')
	<div class="container-fluid jumbo-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="jumbotron">
					<h1>Local musicians rejoice!</h1>
					<p>Connect with local musicians and make something awesome. You can listen to each other's music, read lyrics and even promote your work. Connect with other local musicians and jam together as well.</p>
					<p><a class="btn btn-primary btn-lg">Learn more</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row content">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<div class="col-md-4 text-center">
						<i class="fa fa-user-plus fa-5x"></i>
						<div class="text-justify">
							<h4>Find new musicians in your city. Read their bios, listen to their music, or read their lyrics.</h4>
						</div>
					</div>
					<div class="col-md-4 text-center">
						<i class="fa fa-music fa-5x"></i>
						<div class="text-justify">
							<h4>Connect with musicians and jam out together online or offline. Make plans here, jam out there.</h4>
						</div>
					</div>
					<div class="col-md-4 text-center">
						<i class="fa fa-share-alt fa-5x"></i>
						<div class="text-justify">
							<h4>In a band? Promote it here and on <a href="#">a ton of social media sites</a>. We're a platform for promotion!</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row content">
			<div class="col-md-8 col-md-offset-2">
				<div class="row content">
					<div class="col-md-4">
						<img src="http://www.placecage.com/c/290/175" />
					</div>
					<div class="col-md-8">
						<div class="well">
							<p class="larger-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae <span>blanditiis dolorem</span> libero, nisi pariatur quaerat quia soluta unde vero! Aperiam <span>architecto<span></span> autem ex provident vel? Earum minus necessitatibus recusandae?</p>
						</div>
					</div>
				</div>
				<div class="row content">
					<div class="col-md-8">
						<div class="well">
							<p class="larger-font">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eligendi enim minus odio quas reprehenderit sapiente soluta. Adipisci cumque dolores id non nulla, quae, quia quo reprehenderit repudiandae, velit veritatis.</p>
						</div>
					</div>
					<div class="col-md-4">
						<img src="http://www.placecage.com/g/290/175">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection