@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-2">
                        @include('profile.me.left')
                    </div>
                    <div class="col-md-7">
                        @include('profile.me.feed')
                    </div>
                    <div class="col-md-3">
                        @include('profile.me.right')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection