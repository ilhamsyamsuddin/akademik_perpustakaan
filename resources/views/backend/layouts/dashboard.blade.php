                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('quiz.index')}}" class="btn-box medium span4"><i class=" icon-copy"></i><b>{{App\Models\Quiz::count()}}</b>
                                                    <p class="text-muted"><b>Daftar Kuis</b></p>
                                                </a>
                                                <a href="{{route('question.index')}}" class="btn-box medium span4"><i class="icon-file"></i><b>{{App\Models\Question::count()}}</b>
                                                    <p class="text-muted"><b>Daftar Soal</b></p>
                                                </a>
                                                <a href="{{route('category.index')}}" class="btn-box medium span4"><i class="icon-book"></i><b>{{App\Models\Category::count()}}</b>
                                                    <p class="text-muted"><b>Daftar Kelas</b></p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('material.index')}}" class="btn-box medium span4"><i class="icon-file-alt"></i><b>{{App\Models\Material::count()}}</b>
                                                    <p class="text-muted"><b>Daftar Material</b></p>
                                                </a>
                                                <a href="{{route('user.index')}}" class="btn-box medium span4"><i class="icon-user"></i><b>{{App\Models\User::where('is_admin',0)->count()}}</b>
                                                    <p class="text-muted"><b>Daftar User</b></p>
                                                </a>
                                                <a href="{{route('material.index')}}" class="btn-box medium span4"><i class="icon-desktop"></i><b>{{App\Models\zoom_class::count()}}</b>
                                                    <p class="text-muted"><b>Daftar Kelas Zoom</b></p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('exam.create')}}" class="btn-box medium span4"><i class="icon-hand-right"></i><b>Pilihkan Kuis</b></a>
                                                <a href="{{route('lesson.create')}}" class="btn-box medium span4"><i class="icon-hand-left"></i><b>Pilihkan Kelas</b></a>
                                                <!--<a href="#" class="btn-box medium span4"><i class="icon-sort-down"></i><b>Bounce Rate</b> </a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>