<div class="row no-padding">
    <div class="col-md-5 no-padding">
        <a href="/me/settings/profile-image"><img src="http://www.placecage.com/c/250/250" /></a>
    </div>
    <div class="col-md-7 me-area no-padding">
        <h4>{{ $u_userSettings->getBasicInformation__Template_FullName()->firstname }} {{ $u_userSettings->getBasicInformation__Template_FullName()->lastname }}</h4>
    </div>
</div>
@if($u_userSettings->getSetting__AllowViewProfile() == 1)
    <div class="row">
        <div class="col-md-12">
            <hr />
            <div class="listing">
                <h5>Bands You Follow</h5>
                <ul>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">Deathklock</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">Molly Hatchet</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">Fourskin</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">Mouse Rat</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">The Beatles</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">view more...</a></li>
                </ul>
            </div>
            <div class="listing">
                <h5>Venues You Play At</h5>
                <ul>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">The Rio</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">The Grenada</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">Tom's Place</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">Hip and Whatnot</a></li>
                    <li><img src="http://www.placecage.com/c/25/25" /><a href="#">view more...</a></li>
                </ul>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            <hr />
            <div class="listing">
                <h5>About {{ $u_userSettings->getBasicInformation__Template_FullName()->firstname }} </h5>
                <ul>
                    <li>X Friends</li>
                    <li>Member since X</li>
                    @if($u_userSettings->getSetting__AllowViewAge() == 1)
                        <li>Born in {{ date_format(new DateTime($u_userSettings->getBasicInformation__DateOfBirth()), 'Y') }}</li>
                    @endif
                    @if($u_userSettings->getSetting__AllowViewGender() == 1)
                        <li>{{ $u_userSettings->getBasicInformation__Gender() }}</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif