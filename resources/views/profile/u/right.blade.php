<div class="row">
    <div class="col-md-12">
        @if($u_userSettings->getSetting__AllowFriendRequests() == 1)
            <button type="submit" class="btn btn-primary btn-block" id="sendFriendRequest" rel="{{$u_User->id}}">Send Friend Request</button>
        @endif
        @if($u_userSettings->getSetting__AllowBandRequests() == 1)
                <button type="submit" class="btn btn-primary btn-block" id="sendBandRequest" rel="{{$u_User->id}}">Send Band Request</button>
        @endif
    </div>
</div>