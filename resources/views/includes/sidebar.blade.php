<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-bar-chart"></i> <span>TPAS</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        {{--  <div class="profile">
            <div class="profile_pic">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>  --}}
        <!-- /menu profile quick info -->
        
        <br />
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>TEACHER ADMINISTRATION</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboards <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Teacher Projections</a></li>
                            <li><a href="#">Teacher Vancancies</a></li>
                            <li><a href="#">Teacher Transfers</a></li>
                        </ul>
                    </li>
                     @can('control_teachers')
                    <li><a><i class="fa fa-sitemap" aria-hidden="true"></i> Teacher Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href=" {{ url('/teachers/') }}">Manage Teachers</a></li>
                            <li><a href="#">Manage Transfers</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('control_transfers')
                    <li><a><i class="fa fa-exchange" aria-hidden="true"></i> Transfer Applications<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Manage Applications</a></li>
                            <li><a href="#">View Application Status</a></li>
                            <li><a href="#">Contact / Follow-up</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('control_projections')
                    <li><a><i class="fa fa-pie-chart" aria-hidden="true"></i> Project Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Manage Projections</a></li>
                            <li><a href="#">Log Teacher Projections</a></li>
                        </ul>
                    </li>
                   @endcan
                </ul>
            </div>
            
            <div class="menu_section">
                <h3>SYSTEM ADMINISTRATION</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-table"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Classes</a></li>
                            <li><a href="#">School Levels</a></li>
                            <li><a href="#">Subjects</a></li>
                            <li><a href="#">Standard Teaching Hours</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> User Access Control <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/')}}/users/">Users</a></li>
                            <li><a href="{{url('/')}}/roles/">Roles</a></li>
                            <li><a href="{{url('/')}}/permissions/">Permissions</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-hdd-o"></i>
                            System Backup
                        </a>
                    </li> 
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-file-text"></i>
                            View System Logs
                        </a>
                    </li> 
                    
                </ul>
            </div>
            @can('control_reports')
            <div class="menu_section">
                <h3>SYSTEM REPORTS</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-area-chart"></i> MIS Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Report One</a></li>
                            <li><a href="#">Report Two</a></li>
                            <li><a href="#">Report Three</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @endcan
            {{--  <div class="menu_section">
                <h3>OTHERS</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="#">Level One</a>
                                <li>
                                    <a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu">
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                    </ul>
                                </li>
                            <li>
                                <a href="#">Level One</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>  --}}
        
        </div>
        <!-- /sidebar menu -->
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>