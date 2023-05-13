<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Paninti - Ekspor Import media</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/chblue.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/theme-responsive.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/dtb/jquery.dataTables.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" media="screen">        
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui.1.10.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/modernizr.js')}}"></script>
    @livewireStyles
</head>
<body>
    <div id="layout">
        <div class="info-head">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="visible-md visible-lg text-left">
                            <li><a href="tel:+6288224464843"><i class="fa fa-phone"></i> +62-88224464843</a></li>
                            <li><a href="mailto:kaisarhullio@gmail.com"><i class="fa fa-envelope"></i>
                                    kaisarhullio@gmail.com</a></li>
                        </ul>
                        <ul class="visible-xs visible-sm">
                            <li class="text-left"><a href="tel:+6288224464843"><i class="fa fa-phone"></i>
                                    +62-88224464843</a></li>
                            <li class="text-right"><a href="index.php/changelocation.html"><i
                                        class="fa fa-map-marker"></i> Indonesia</a></li>
                        </ul>
                    </div>
                    @livewire('location-component')
                </div>
            </div>
        </div>
        <header id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <label for="mobile-button"> <i class="fa fa-bars"></i></label>
                <input id="mobile-button" type="checkbox">

                <ul class="collapse">
                    <li class="title">
                        <a href="/"><img src="{{asset('images/logo.png')}}"></a>
                    </li>
                    <li> <a href="/">Home</a></li>
                    <li><a href="{{route('home.service_categories')}}">Service Categories</a></li>
                    <li> <a href="{{route('home.contact')}}">Contact Us</a></li>
                    <li> <a href="{{route('home.about')}}">About Us</a></li>
                    @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->utype=== 'ADM')
                                <li class="login-form"><a href="#" title="register">My Account (Admin)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('admin.service-categories')}}">Service Categories</a></li>
                                    <li><a href="{{route('admin.all-services')}}">All Categories</a></li>
                                    <li><a href="{{route('admin.slider')}}">Manage Slider</a></li>
                                    <li><a href="{{route('admin.contacts')}}">All Contact</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>Logout</li>
                                </ul>
                                </li>
                                @elseif(Auth::user()->utype=== 'SVP')
                                <li class="login-form"><a href="#" title="register">My Account (S Provider)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('sprovider.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('sprovider.profile')}}">Profile</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>Logout</li>
                                </ul>
                                </li>
                                @else
                                <li class="login-form"><a href="#" title="register">My Account (Customer)</a>
                                <ul class="drop-down one-column hover-fade">
                                    <li><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>Logout</li>
                                </ul>
                                </li>
                            @endif
                                <form id="logout-form" method="POST" action="{{route ('logout')}}" style="display: none">
                                @csrf
                                </form>
                            @else
                            <li class="login-form"> <a href="{{route('register')}}" title="Register">Register</a></li>
                            <li class="login-form"> <a href="{{route('login')}}" title="Login">Login</a></li>
                            @endif
                    @endif
                    
                    <li class="search-bar">
                    </li>
                </ul>
            </nav>
        </header>
        {{$slot}}
        <footer id="footer" class="footer-v1">
            <div class="container">
                <div class="row visible-md visible-lg">
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>Categories </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a href="#">TV</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Geyser</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Refrigerator</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Washing Machine</a>
                            </li>
                            <li><i class="fa fa-check"></i> <a href="#">Microwave Oven</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Water Purifier</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>AC SERVICES </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a
                                    href="#">Installation</a></li>
                            <li><i class="fa fa-check"></i> <a
                                    href="#">Uninstallation</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">AC Repair</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Gas Refill</a>
                            </li>
                            <li><i class="fa fa-check"></i> <a href="#">Wet
                                    Servicing</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Dry
                                    Servicing </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>HOME NEEDS </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a href="#">Laundry </a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Electrical</a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Pest Control </a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Carpentry </a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Plumbing </a></li>
                            <li><i class="fa fa-check"></i> <a href="#">Painting </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>CONTACT US</h3>
                        <ul class="contact_footer">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="#"> Cimahi, Jawa Barat, Indonesia</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:kaisarhullio@gmail.com">Kaisarhullio@gmail.com</a>
                            </li>
                            <li>
                                <i class="fa fa-headphones"></i> <a href="tel:+628822446443">+62-88224464843</a>
                            </li>
                        </ul>
                        <h3 style="margin-top: 10px">FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#"></a></li>
                            <li class="github"><span><i class="fa fa-github"></i></span><a href="#"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row visible-sm visible-xs">
                    <div class="col-md-6">
                        <h3 class="mlist-h">CONTACT US</h3>
                        <ul class="contact_footer mlist">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="#"> Cimahi, Jawa Barat, Indonesia</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:kaisarhullio@gmail.com">kaisarhullio@gmail.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> <a href="tel:+6288224464843">+62-8822446443</a>
                            </li>
                        </ul>
                        <ul class="social mlist-h">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#"></a></li>
                            <li class="github"><span><i class="fa fa-github"></i></span><a href="#"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav-footer">
                                <li><a href="{{route('home.about')}}">About Us</a> </li>
                                <li><a href="{{route('home.contact')}}">Contact Us</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                           
                        </div>
                    </div>
                </div>                
            </div>            
        </footer>
    </div>
    <script type="text/javascript" src="{{asset('assets/js/nav/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/totop/jquery.ui.totop.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/accordion/accordion.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/maps/gmap3.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/fancybox/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/carousel/carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/filters/jquery.isotope.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/twitter/jquery.tweet.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/flickr/jflickrfeed.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme-options/theme-options.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/theme-options/jquery.cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap/bootstrap-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.table2excel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dtb/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/validation-rule.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap3-typeahead.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 5000,
                startwidth: 1170,
                startheight: 480,
                minHeight: 250,
                navigationType: "none",
                navigationArrows: "solo",
                navigationStyle: "preview1"
            });
        });
    </script>
     <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
    @stack('scripts')
    @livewireScripts
</body>
</html>