<div class="col-md-12">
    <hr />
    @if(Request::path() == 'auth/register' || Request::path() == 'auth/register/one')
        <div class="pull-right">
            <a class="btn btn-default" href="/auth/register/two" role="button">Next &raquo;</a>
        </div>
    @elseif(Request::path() == 'auth/register/two')
        <div class="pull-left">
        <a class="btn btn-default" href="/auth/register/one" role="button">&laquo; Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-default" href="/auth/register/three" role="button">Next &raquo;</a>
        </div>
    @elseif(Request::path() == 'auth/register/three')
        <div class="pull-left">
            <a class="btn btn-default" href="/auth/register/two" role="button">&laquo; Back</a>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
            Register
            </button>
        </div>
    @else
        <div class="pull-right">
            <a class="btn btn-default" href="/auth/register/two" role="button">Next &raquo;</a>
        </div>
    @endif
</div>