<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <title>Kampuzz - Welcome to Kampuzz.com </title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/font-awesome.css') }}
    {{ HTML::style('css/style.css'); }}
    {{ HTML::style('css/shop.css') }}
    {{ HTML::style('css/prettyphoto.css') }}
    {{ HTML::style('css/color-switcher.css') }}

    {{ HTML::style('css/widget.css') }}
    {{ HTML::style('js/vendor/mediaelement/mediaelementplayer.min.css') }}
    {{ HTML::style('js/vendor/mediaelement/wp-mediaelement.css') }}
    {{ HTML::style('css/responsive.css') }}
    {{ HTML::script('js/vendor/jquery/jquery.js') }}
    {{ HTML::script('js/vendor/jquery/jquery-migrate.min.js') }}
    {{ HTML::script('js/vendor/revslider/rs-plugin/js/jquery.themepunch.plugins.min.js') }}
    {{ HTML::script('js/vendor/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}
</head>
<body>

<!-- Wrapper Start -->
<div class="wrapper wrapper_boxed" id="wrappermain-pix">
    <!-- Header Start -->
    <header id="header" class="headermain fullwidth">
        <div id="loginheader" class="fullwidth" style="text-align: right;">
            <div class="container">
                <i class="fa fa-lock"></i> <a href="#">Login</a> | <i class="fa fa-user"></i> <a href="#">Create
                    Account</a> | <i class="fa fa-briefcase"></i> <a href="#">Institution Login</a></div>
        </div>
        <!-- Main Header -->

        <div id="mainheader" class="fullwidth">
            <div class="container">

                <div id="logo" class="float-left">
                    <a href="{{ URL::route('home') }}"><img src="{{ URL::asset('images/logo.png') }}" width="122"
                                                            height="62" alt="Kampuzz.com"/></a>

                </div>
                <!-- Right Header -->

                <div id="rightheader" class="flaot-right">

                    <!-- SearcH Area -->

                    <form action="courses.php" id="searchform" method="post" role="search">

                        <div class="searcharea float-right">

                            <a href="#searchbox" class="btnsearch"><em class="fa fa-search"></em></a>

                            <div id="searchbox">

                                <input type="text" name="keyword" value="Search for:">
                                <button type="submit" class="bgcolr"><em class="fa fa-search"></em></button>

                            </div>

                        </div>

                    </form>

                    <!-- SearcH Area Close-->


                    <!-- Navigation  -->

                    <nav class="navigation float-right">
                        {{ ($menu); }}

                    </nav>
                    <!-- Navigation Close -->


                </div>

                <!-- Right Header Close -->


            </div>

        </div>

        <!-- Main Header Close -->

    </header>

    <!-- Header Close -->

    <script type="text/javascript">
        jQuery(document).ready(function () {
            cs_menu_sticky();
        });
    </script>
    @if(Route::currentRouteName()=='home')
        @include('includes.home-banner')
    @else
        @include('includes.breadcrumb')
    @endif

    <div class="clear"></div>

    <div class="clear"></div>
    <div id="main" role="main">
        <!-- Container Start -->
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Content Section End -->
    <div class="clear"></div>


    @yield('sponsors')


    <!-- Footer Widgets Start -->
    <div id="footer-widgets" class="fullwidth">
        <!-- Container Start -->
        <div class="container">
            <!-- Footer Widgets Start -->


            <div class="widget widget_categories">
                <header class="cs-heading-title"><h2 class="cs-section-title">Career Options</h2></header>
                @include('includes.widget_career_options')
            </div>
            <div class="widget widget_categories">
                <header class="cs-heading-title"><h2 class="cs-section-title">Study Abroad</h2></header>
                @include('includes.widget_abroad')
            </div>
            <div class="widget widget_categories">
                <header class="cs-heading-title"><h2 class="cs-section-title">Government Jobs</h2></header>
                 @include('includes.widget_article_cat')
                <!-- <ul>

                    <li class="cat-item"><a href="articles.php?id=1">Recruitments</a></li>
                    <li class="cat-item"><a href="articles.php?id=56">Results</a></li>
                    <li class="cat-item"><a href="articles.php?id=3">Banking</a></li>
                    <li class="cat-item"><a href="articles.php?id=5">Defence</a></li>
                    <li class="cat-item"><a href="articles.php?id=71">Law</a></li>
                    <li class="cat-item"><a href="articles.php?id=2">MBA Entrance</a></li>
                    <li class="cat-item"><a href="articles.php?id=55">Medical</a></li>
                    <li class="cat-item"><a href="articles.php?id=6">Railways</a></li>
                    <li class="cat-item"><a href="articles.php?id=7">Staff Selection Committee</a></li>
                    <li class="cat-item"><a href="articles.php?id=8">State PSC</a></li>
                    <li class="cat-item"><a href="articles.php?id=11">Technical</a></li>
                    <li class="cat-item"><a href="articles.php?id=10">UPSC</a></li>
                </ul> -->
            </div>

            <div class="widget widget-recent-blog">
                <header class="cs-heading-title"><h2 class="cs-section-title">Latest Blogs</h2></header>
                <!-- Recent Posts Start -->


                <!-- Upcoming Widget Start -->

                <article class="">


                    <figure><a class='fa fa-hover' href='choosing-the-paths-of-life/index.html'><img
                                    src='uploads/2014/01/02-stat-fort-uni-150x150.jpg' alt='' width='60'></a></figure>


                    <div class="text">

                        <h6><a class="colrhvr" href="choosing-the-paths-of-life/index.html">Choosing the paths of
                                life.</a></h6>

                        <time datetime="2013-08-22">August 22, 2013</time>

                    </div>


                </article>


                <!-- Upcoming Widget Start -->

                <article class="">


                    <figure><a class='fa fa-hover' href='whats-up-with-the-microbiologoy/index.html'><img
                                    src='uploads/2014/01/03-stat-fort-uni-150x150.jpg' alt='' width='60'></a></figure>


                    <div class="text">

                        <h6><a class="colrhvr" href="whats-up-with-the-microbiologoy/index.html">What’s up with the
                                Microbiol...</a></h6>

                        <time datetime="2013-08-22">August 22, 2013</time>

                    </div>


                </article>


                <!-- Upcoming Widget Start -->

                <article class="">


                    <figure><a class='fa fa-hover' href='stuyding-music-at-academy/index.html'><img
                                    src='uploads/2014/01/04-stat-fort-uni-150x150.jpg' alt='' width='60'></a></figure>


                    <div class="text">

                        <h6><a class="colrhvr" href="stuyding-music-at-academy/index.html">Stuyding music at
                                Academy.</a></h6>

                        <time datetime="2013-08-22">August 22, 2013</time>

                    </div>


                </article>


                <!-- Recent Posts End -->

            </div>
            <!-- Footer Widgets End -->
        </div>
        <!-- Container End -->
        <footer id="footer">
            <div class="container">
                <header>
                    <a href="{{ URL::route('home') }}">
                        <img src="{{ URL::asset('images/footer-logo.png') }}" alt="Kampuzz">
                    </a>
                </header>
                <p class="copright">
                    &copy; {{ date('Y') }} Kampuzz.com - All rights reserved<br>
                    <a href="http://www.netfunda.com">Powered by Netfunda Technologies</a>
                </p>
                <!-- Language Section Start -->

                <div class="language-sec">

                    <!-- Wp Language Start -->


                </div>

                <!-- Language Section End -->
                <a class="back-to-top bgcolrhvr" id="btngotop" href="#"><em class="fa fa-chevron-up"></em></a>
            </div>
        </footer>
    </div>
    <!-- Footer Start -->
    <div class="clear"></div>
</div>
<!-- Wrapper End -->

{{ HTML::style('css/flexslider.css') }}

{{ HTML::script('js/vendor/mediaelement/mediaelement-and-player.min.js') }}
{{ HTML::script('js/vendor/mediaelement/wp-mediaelement.js') }}
{{ HTML::script('js/vendor/bootstrap.min.js') }}
{{ HTML::script('js/vendor/modernizr.js') }}
{{ HTML::script('js/vendor/jquery.prettyphoto.js') }}
{{ HTML::script('js/vendor/functions.js') }}
{{ HTML::script('js/vendor/jquery-scrolltofixed.js') }}
{{ HTML::script('js/vendor/jquery/ui/core.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/widget.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/mouse.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/draggable.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/slider.min.js') }}
{{ HTML::script('js/vendor/jquery/jquery.ui.touch-punchc.js') }}
{{ HTML::script('js/vendor/jquery.flexslider-min.js') }}
{{ HTML::script('js/vendor/jquerycycle2.js') }}
{{ HTML::script('js/vendor/cycle2carousel.js') }}

<!-- Google Analytics JS Goes here -->
</body>
</html><!-- Columns End -->