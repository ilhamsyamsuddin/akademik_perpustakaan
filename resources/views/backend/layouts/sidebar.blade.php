        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar-user">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="/"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-book"></i>Buat Kuis</a>
                                </li>
                                <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-table"></i>Daftar Kuis</a></li>
                            </ul> 
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li class="sidebar-color"><a href="{{route('question.create')}}"><i class="menu-icon icon-book"></i> Buat Soal</a></li>
                                <li><a href="{{route('question.index')}}"><i class="menu-icon icon-paste"></i>Daftar Soal</a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('category.create')}}"><i class="menu-icon icon-book"></i> Buat Kelas</a></li>
                                <li><a href="{{route('category.index')}}"><i class="menu-icon icon-paste"></i>Daftar Kelas</a></li>
                            </ul>

                            <ul class="widget-menu unstyled">
                                <li><a class="sidebar-color" href="{{route('material.create')}}"><i class="menu-icon icon-book"></i> Buat Materi</a></li>
                                <li><a href="{{route('material.index')}}"><i class="menu-icon icon-paste"></i>Daftar Materi</a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('user.create')}}"><i class="menu-icon icon-paste"></i>Buat User</a></li>
                                <li><a href="{{route('user.index')}}"><i class="menu-icon icon-table"></i>Daftar User </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('zoom.create')}}"><i class="menu-icon icon-paste"></i>Buat Zoom</a></li>
                                <li><a href="{{route('zoom.index')}}"><i class="menu-icon icon-table"></i>Daftar Zoom</a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('exam.create')}}"><i class="menu-icon icon-paste"></i>Pilihkan Kuis</a></li>
                                <li><a href="{{route('exam.index')}}"><i class="menu-icon icon-table"></i>Daftar Kuis dan User</a></li>
                                <li><a href="{{route('result')}}"><i class="menu-icon icon-table"></i>Hasil Kuis user </a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('lesson.create')}}"><i class="menu-icon icon-paste"></i>Pilihkan Materi</a></li>
                                <li><a href="{{route('lesson.index')}}"><i class="menu-icon icon-table"></i>Daftar Materi dan User</a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
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