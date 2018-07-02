<!--     Start Logo    -->
<div class="logo">
    <a href="{{url('/')}}" class="simple-text logo-mini">
        TB
    </a>
    <a href="{{url('/')}}" class="simple-text logo-normal">
        TeamBox
    </a>
</div>
<!--     Stop Left Sidebar (Lewy Panel)-->
<div class="sidebar-wrapper">
    <!--     Start User Info    -->
    <div class="user">
        <div class="photo">
            <img src="{{asset("/assets/img/sidebar-1.jpg")}}"/>
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                                <b class="caret"></b>
                            </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
                <ul class="nav">
                    <li>
                        <a href="#">
                            <span class="sidebar-mini"> MP </span>
                            <span class="sidebar-normal"> My Profile </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--     Start Left Panel Content    -->
    <ul class="nav">
        <li class="active">
            <a href="{{url('/')}}">
                <i class="material-icons">dashboard</i>
                <p> TeamBox </p>
            </a>
        </li>




        @if(Auth::user()->department_info->blocked == 0)
            @foreach($groups->where('id','!=',8) as $group)

                <li>
                    <a data-toggle="collapse" href={{'#'.$group->name}}>
                        <i class="material-icons">image</i>
                        <p> {{$group->name}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id={{$group->name}}>
                        <ul class="nav">
                            @foreach($links as $link)
                                @if($group->id == $link->group_link_id)
                                    @if($link->group_link_id == 12)
                                        <li>
                                            <a href="{{url($link->link)}}" target="_blank">
                                                <span class="sidebar-mini"> TT </span>
                                                <span class="sidebar-normal"> {{$link->name}} </span>
                                            </a>

                                        </li>
                                    @else
                                        <li>
                                            <a href="{{url($link->link)}}">
                                                <span class="sidebar-mini"> TT </span>
                                                <span class="sidebar-normal"> {{$link->name}} </span>
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        @endif


        <li>
            <a href="./widgets.html">
                <i class="material-icons">widgets</i>
                <p> Widgets </p>
            </a>
        </li>
    </ul>
    <!--     End Left Panel Content    -->
</div>

















{{--<!-- Navigation -->--}}

{{--<style>--}}
    {{--.toggle.btn--}}
    {{--{--}}
        {{--margin-top: 7px;--}}
    {{--}--}}
{{--</style>--}}
{{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">--}}
    {{--<div class="navbar-header">--}}
      {{--<ul class="nav navbar-top-links navbar-right">--}}
            {{--<li>--}}
            	{{--<!--menu toggle button -->--}}
                {{--<input id="menu-toggle" type="checkbox" data-toggle="toggle">--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<a class="navbar-brand" style="" href="{{url('/')}}">TeamBox</a>--}}

    {{--</div>--}}
    {{--<!-- /.navbar-header -->--}}

     {{--Logout info change password--}}

    {{--<ul class="nav navbar-top-links navbar-right">--}}
{{--@if(Auth::user()->department_info->blocked == 0)--}}

        {{--Including active test notification--}}
       {{--@include('partials.nav_includes._test_active')--}}

       {{--Including multiple departments selector--}}
      {{--@include('partials.nav_includes._multiple_departments')--}}
      {{--@foreach($links as $link)--}}

           {{--Flag for janky moving notifications--}}
          {{--@if($link->link == 'janky_notification')--}}
              {{--@php $show_moving_notifications = true;  @endphp--}}
          {{--@endif--}}

           {{--Including IT notifications--}}
          {{--@include('partials.nav_includes._blocked_for_it')--}}

           {{--Including DKJ table small--}}
          {{--@include('partials.nav_includes._blocked_for_dkj_small')--}}

           {{--Including DKJ table big--}}
          {{--@include('partials.nav_includes._blocked_for_dkj_big')--}}

           {{--Including table for DKJ users--}}
          {{--@include('partials.nav_includes._users_table')--}}

      {{--@endforeach--}}


{{--@endif--}}
        {{--<li class="dropdown">--}}
            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->first_name.' '.Auth::user()->last_name}}--}}
                {{--<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu dropdown-user">--}}
                {{--<li><a style="background-color: #fff" href="{{URL::to('/password_change')}}"><i class="fa fa-user fa-fw"></i>Zmiana hasła</a>--}}
                {{--</li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li>--}}
                    {{--<a style="background-color: #fff" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
                                           {{--document.getElementById('logout-form').submit();">--}}
                        {{--<i class="fa fa-sign-out fa-fw"></i>--}}
                        {{--Wyloguj</a>--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--{{ csrf_field() }}--}}
                    {{--</form>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    {{--</ul>--}}

    {{--<div class="navbar-default sidebar pre-scrollable" role="navigation" style="min-height: 93vh"  id="sidebar-wrapper">--}}
        {{--<div class="sidebar-nav navbar-collapse">--}}
            {{--<ul class="nav" id="side-menu">--}}
                {{--<li>--}}
                    {{--<a href="{{url('/')}}"><i class="fa fa-dashboard fa-fw"></i> Strona główna</a>--}}
                {{--</li>--}}
                {{--@if(Auth::user()->department_info->blocked == 0)--}}
                  {{--@foreach($groups->where('id','!=',8) as $group)--}}
                              {{--<li>--}}
                                  {{--<a href="#"><i class="fa fa-files-o fa-fw"></i>{{$group->name}}<span class="fa arrow"></span></a>--}}
                                  {{--<ul class="nav nav-second-level">--}}

                              {{--@foreach($links as $link)--}}
                                  {{--@if($group->id == $link->group_link_id)--}}
                                      {{--@if($link->group_link_id == 12)--}}
                                          {{--<li>--}}
                                              {{--<a href="{{url($link->link)}}" target="_blank">{{$link->name}}</a>--}}
                                          {{--</li>--}}
                                      {{--@else--}}
                                          {{--<li>--}}
                                              {{--<a href="{{url($link->link)}}">{{$link->name}}</a>--}}
                                          {{--</li>--}}
                                      {{--@endif--}}
                                  {{--@endif--}}
                              {{--@endforeach--}}
                                  {{--</ul>--}}
                              {{--</li>--}}
                              {{--@endforeach--}}
                {{--@endif--}}

            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--@if(isset($show_moving_notifications) && $show_moving_notifications == true)--}}

        {{--@include('partials.nav_includes._canvas_janky')--}}
    {{--@else--}}
        {{--<div id="blok" style="display: none; width: 0px; height: 0px">--}}
            {{--<p><span id="notification_janky_count" style="display: none"></span></p>--}}
        {{--</div>--}}
    {{--@endif--}}
{{--</nav>--}}
