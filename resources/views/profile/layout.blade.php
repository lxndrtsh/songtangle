@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-3">
                        @include('profile.me.left')
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-8">
                        @include('profile.me.feed')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection