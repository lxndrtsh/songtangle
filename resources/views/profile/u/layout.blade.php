@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-2">
                        @include('profile.u.left')
                    </div>
                    <div class="col-md-7">
                        @if($u_userSettings->getSetting__AllowViewProfile() == 1)
                            @include('profile.u.feed')
                        @else
                            @include('profile.u.hidden_profile')
                        @endif
                    </div>
                    <div class="col-md-3">
                        @include('profile.u.right')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    <script>
        var feed;

        feed = {
            area: $('.feed'),
            page: 1,
            api: '{{ $endpoint }}postings?u={{ $u_User->id }}'
        }

        function postingType(id)
        {
            var types = [
                    'said',
                    'posted',
                    'shared',
                    'posted an image',
                    'posted a video'
            ];

            return types[id];
        }

        function throwMessage(type, content)
        {
            var message;
            message = '<div class="alert alert-dismissible alert-danger">';
                message += '<button type="button" class="close" data-dismiss="alert">×</button>'
                message += '<strong>Uh-oh!</strong> '+content
            message += '</div>';

            return message;
        }

        function createFeedItem(data)
        {
            var feeditem;
            feeditem = '<div class="feed-item posting-'+data.id+'">';
                feeditem += '<div class="posting">';
                    feeditem += '<div class="posting-head">';
                        feeditem += '<div class="row">';
                            feeditem += '<div class="col-md-11">';
                                feeditem += '<img src="http://www.placecage.com/c/50/50" class="pull-left who-img" />'
                                feeditem += '<a href="#">'+data.posting_user_information.firstname+' '+data.posting_user_information.lastname+'</a> '+postingType(data.type);
                                feeditem += '<br />';
                                feeditem += data.created_at.date+' - [Location Not Added Yet]';
                            feeditem += '</div>';
                            feeditem += '<div class="col-md-1">';
                                feeditem += '<a href="#" class="dropdown-toggle glyphicon glyphicon-chevron-down" data-toggle="dropdown" role="button" aria-expanded="false"></a>';
                                feeditem += '<ul class="dropdown-menu" role="menu">';
                                    feeditem += '<li><a href="">Remove from feed</a></li>';
                                    feeditem += '<li><a href="">Report feed posting</a></li>';
                                feeditem += '</ul>';
                            feeditem += '</div>';
                        feeditem += '</div>';
                    feeditem += '</div>';
                    feeditem += '<div class="posting-content">';
                        feeditem += data.content
                    feeditem += '</div>';
                    feeditem += '<div class="posting-action">';
                        feeditem += '<a href="">Like</a> - <a href="">Share</a>';
                    feeditem += '</div>';
                feeditem += '</div>';
                feeditem += '<div class="posting-comments">';
                    feeditem += '<div class="posting-likes">';
                        feeditem += '<a href="">Such and such</a> likes this';
                    feeditem += '</div>';
                    feeditem += '<div class="row no-padding">';
                        feeditem += '<div class="col-md-1 no-padding">';
                            feeditem += '<img src="http://www.placecage.com/c/40/40" class="posting-me-img" />';
                        feeditem += '</div>';
                        feeditem += '<div class="col-md-11 no-padding">';
                            feeditem += '<textarea class="comment-box" placeholder="write a comment"></textarea>';
                        feeditem += '</div>';
                    feeditem += '</div>';
                feeditem += '</div>';
            feeditem += '</div>';

            return feeditem
        }

        if(feed.area.length) {
            function update() {
                $.ajax({
                    type: 'GET',
                    url: feed.api,
                    timeout: 2000,
                    success: function(data) {
                        $.each(data.items, function() {
                            if(!$('.posting-'+this.id).length) {
                                $('.feed').prepend(createFeedItem(this));
                            }
                        });
                        window.setTimeout(update, 10000);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log('there was an error');
                        $('.feed').html('');
                        $('.feed-notice').html(throwMessage('error','There was an error getting a response from our server. Please refresh the page to try again.'));
                        window.setTimeout(update, 10000);
                    }
                });
            }
            update();
        }
    </script>
@endsection