<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block menu-left">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right menu-right">
                <ul class="list-inline">
                    @guest
                        <li class="list-inline-item"><a href="{{ url('register') }}"><i class="fa fa-user-plus"></i>Register</a></li>
                        <li class="list-inline-item"><a href="{{ url('login') }}" class="pr-0 border-right-0""><i class="fa fa-sign-in"></i>Login In</a></li>
                    @else
                        <li class="list-inline-item"><a href="{{ url('register') }}"><i class="fa fa-user"></i>{{ Auth::user()->name }}</a></li>
                        <li class="list-inline-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="pr-0 border-right-0""><i class="fa fa-sign-out"></i>Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
