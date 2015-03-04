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

@section('customjs')
    <script>
        var autoInput;
        autoInput = {
                instrument: $('#instrumentInput'),
                genres: $('#genreInput')
                };

        if(autoInput.instrument.length) {
            autoInput.instrument.on('keyup', function() {
                var q = $(this).val();
                if(q.length >= 3) {
                    $.ajax({
                        url: "http://songtangle.dev/api/instruments?via=wildcard",
                        data: "q="+q,
                        success: function(data) {
                            $("#instrumentResults").html('');
                            $.each(data.items, function() {
                                console.log(this.instrument);
                                $("#instrumentResults").append(
                                        '<div class="checkbox">' +
                                            '<label>' +
                                                '<input type="checkbox" name="instrumentsToSelect['+this.id+']" aria-checked="false"> '+this.instrument+
                                            '</label>' +
                                        '</div>'
                                );
                            });
                            $('#instrumentResults').show();
                        },
                        dataType: "json"
                    });
                }
            });
        }

        if(autoInput.genres.length) {
            if(autoInput.genres.length) {
                autoInput.genres.on('keyup', function() {
                    var q = $(this).val();
                    console.log(q.length);
                    if(q.length >= 3) {
                        $.ajax({
                            url: "http://songtangle.dev/api/genres?via=wildcard",
                            data: "q="+q,
                            success: function(data) {
                                $("#genreResults").html('');
                                $.each(data.items, function() {
                                    console.log(this.genres);
                                    $("#genreResults").append(
                                            '<div class="checkbox">' +
                                            '<label>' +
                                            '<input type="checkbox" name="genresToSelect['+this.id+']" aria-checked="false"> '+this.genre+
                                            '</label>' +
                                            '</div>'
                                    );
                                });
                                $('#genreResults').show();
                            },
                            dataType: "json"
                        });
                    }
                });
            }

        }
    </script>
@endsection