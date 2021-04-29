        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="/"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-book"></i>Buat Kuis</a>
                                </li>
                                <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-table"></i>Daftar Kuis</a></li>
                            </ul> 
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('question.create')}}"><i class="menu-icon icon-book"></i> Buat Soal</a></li>
                                <li><a href="{{route('question.index')}}"><i class="menu-icon icon-paste"></i>Daftar Soal</a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('user.create')}}"><i class="menu-icon icon-paste"></i>Buat User</a></li>
                                <li><a href="{{route('user.index')}}"><i class="menu-icon icon-table"></i>Daftar User </a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('exam.create')}}"><i class="menu-icon icon-paste"></i>Pilihkan Kuis</a></li>
                                <li><a href="{{route('exam.index')}}"><i class="menu-icon icon-table"></i>Daftar Kuis dan User</a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                        <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="menu-icon icon-signout"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>