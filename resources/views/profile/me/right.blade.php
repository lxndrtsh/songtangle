<div class="row">
    <div class="col-md-12">
        <h4>Almost done!</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="progress progress-striped">
            <div class="progress-bar progress-bar-warning" style="width: {{ $show['percentage'] }}%"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>You're nearly done completing your Songtangle account! Before people can search you, you need to complete these.</p>
    </div>
</div>
@if($show['basicInformation'] === true)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Basic Information</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/profile/basics" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="inputFirstname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="inputLastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <select name="inputGender" class="form-control">
                                        <option value="">Select one</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label>Date of Birth:</label>
                                    <input type="date" class="form-control" name="inputDateOfBirth" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@if($show['address'] === true)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Your Location</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/profile/address" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="inputAddress1" placeholder="Street Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="inputAddress2" placeholder="Apt/Suite">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="inputCity" placeholder="City">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <select class="form-control" name="inputState">
                                        @foreach($states as $state)
                                            <option>{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="inputPostalCode" placeholder="Postal Code">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Upload a Song</h3>
            </div>
            <div class="panel-body">
                [[ SONG UPLOAD PLUGIN ]]
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Instruments You Play</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="/profile/instruments" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="instrumentInput" placeholder="Enter an instrument..." autocomplete="off">
                            <div class="autoResults" id="instrumentResults"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary pull-right" id="instrumentAddFinish">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Genres You Play</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="/profile/genres" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="genreInput" placeholder="Enter a genre..." autocomplete="off">
                            <div class="autoResults" id="genreResults"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary pull-right" id="genreAddFinish">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if($show['settings'] === true)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Settings</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/profile/settings" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="settingsAllowFriendRequest" id="settingsAllowFriendRequest" checked aria-checked="true">
                                            Allow Friend Requests
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="settingsAllowViewProfile" id="settingsAllowViewProfile" checked aria-checked="true">
                                            Public Profile
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="settingsAllowBandRequest" id="settingsAllowBandRequest" aria-checked="false">
                                            Allow Band Requests
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="settingsAllowViewAge" id="settingsAllowViewAge" aria-checked="false">
                                            Show Age
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="settingsAllowViewGender" id="settingsAllowViewGender" aria-checked="false">
                                            Show Gender
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="settingsAllowViewPhone" id="settingsAllowViewPhone" aria-checked="false">
                                            Show Phone Number
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif