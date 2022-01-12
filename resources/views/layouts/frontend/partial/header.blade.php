        <header class="new-block main-header">
            <div class="main-nav new-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="logo">
                                <a href="{{ url('/') }}" title="Home" itemprop="url"><img src="{{ file_exists($logo->logo) ? url($logo->logo) : '' }}" alt="logo.png" itemprop="image"></a>
                            </div>
                            <div class="location-block">
                                <p>Austrlia</p>
                                <span>+00 123 456 789</span>
                            </div>
                            <a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
                            <nav class="nav">
                                <ul class="list-unstyled">
                                    <li class="drop"><a href="{{ url('/') }}">Home</a></li>
                                    <li>
                                        <a href="{{ route('reservations') }}">Reservations</a>
                                    </li>
                                    <li>
                                        <a  href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" title="Coupon" itemprop="url">Coupons</a>
                                    </li>
                                    <li>
                                        @if(!Auth::check())
                                            <a href="{{ route('user.login') }}">Login</a>
                                        @endif

                                        @if(Auth::check())
                                            <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i> Log Out
                                            </a>
                                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                            <a href="{{ route('account') }}" title="Account" itemprop=><i class="fa fa-user"></i> {{ Auth::user()->email }}</a>
                                        @endif
                                    </li>
                                    @php
                                          $contents = Cart::content();
                                                $cart_type = [];
                                                $all_vals = []; 
                                                $cart_vals = []; 
                                    @endphp
                                        @foreach ($contents as $value)
                                        @php
                                            $cart_type[]    = $value->options->cart_type;
                                                if($value->options->cart_type=='cat_product_cart'){
                                                        $all_vals[] = $value;
                                                }
                                                if($value->options->cart_type=='product_cart'){
                                                        $cart_vals[] = $value;
                                                }

                                            @endphp
                                        @endforeach
                                    <li>
                                        <a href="{{ route('cat_cart') }}">
                                            <i class="fa fa-shopping-cart"></i><span>&nbsp;({{ count($all_vals) }})</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="nav-right-block">
                                <ul class="list-unstyled">

                                    <li><a href="{{ route('cart') }}"><span>Cart ({{ count($cart_vals) }})</span></a></li>
                                </ul>
                            </div><!-- nav-login -->
                        </div>
                    </div>
                </div>
            </div>
        </header> <!-- header -->