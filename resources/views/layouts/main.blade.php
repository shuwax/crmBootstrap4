<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials._head')
    @include('partials._style')
    {{--@yield('style')--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<!--     Wapper Conntent (Cała strona)    -->
<div class="wrapper">
    <!--   Sidebar Conntent (lewy)    -->
    <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="{{asset("/assets/img/sidebar-1.jpg")}}">
        <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
        -->
        @include('partials._nav')
    </div>
    <!--     Start Main Panel (Treść strony bez lewego panelu)    -->
    <div class="main-panel">
        <!--     Start nav    -->
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--     Start Name Current Page    -->
                    <a class="navbar-brand" href="#"> Dashboard </a>
                    <!--     Strop Name Current Page    -->
                </div>
                <!--     Start main panel component    -->
                <div class="collapse navbar-collapse">
                    <!--     Start main panel item    -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mike John responded to your email</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mike John responded to your email</a>
                                </li>
                            </ul>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                    <!--     End main panel item    -->
                </div>
            </div>
            <!--     Stop main panel component    -->
        </nav>
        <!--     Stop nav    -->
        <!--     Start Page Side    -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="green">
                                <i class="material-icons">&#xE894;</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Global Sales by Top Locations</h4>
                                <div class="row">
                                    <div class="col-md-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--     Start footer    -->
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.creative-tim.com"> Creative Tim </a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>

</body>

</html>
@include('partials._javascript')
