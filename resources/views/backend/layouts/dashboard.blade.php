                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('quiz.index')}}" class="btn-box medium btn-primary span4"><i class=" icon-copy" style="color: white"></i><b style="color:white">{{App\Models\Quiz::count()}}</b>
                                                    <p><b style="color:white">Kuis</b></p>
                                                </a>
                                                <a href="{{route('question.index')}}" class="btn-box btn-success medium span4"><i class="icon-file" style="color: white"></i><b style="color:white">{{App\Models\Question::count()}}</b>
                                                    <p class="text-muted"><b style="color:white">Soal</b></p>
                                                </a>
                                                <a href="{{route('category.index')}}" class="btn-box btn-warning medium span4"><i class="icon-book" style="color: black"></i><b style="color:white">{{App\Models\Category::count()}}</b>
                                                    <p class="text-muted"><b style="color:#0D0D0D">Kelas</b></p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('material.index')}}" class="btn-box btn-danger medium span4"><i class="icon-file-alt" style="color: white"></i><b style="color:white">{{App\Models\Material::count()}}</b>
                                                    <p class="text-muted"><b style="color:white">Material</b></p>
                                                </a>
                                                <a href="{{route('user.index')}}" class="btn-box btn-info medium span4"><i class="icon-user" style="color: white"></i><b style="color:white">{{App\Models\User::where('is_admin',0)->count()}}</b>
                                                    <p class="text-muted"><b style="color:white">User</b></p>
                                                </a>
                                                <a href="{{route('zoom.index')}}" class="btn-box medium span4" style="background-color: lawngreen"><i class="icon-desktop" style="color: black"></i><b>{{App\Models\zoom_class::count()}}</b>
                                                    <p class="text-muted"><b>Kelas Zoom</b></p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="{{route('exam.create')}}" class="btn-box medium span4"><i class="icon-hand-right" style="color: black"></i><b>Pilihkan Kuis</b></a>
                                                <a href="{{route('lesson.create')}}" class="btn-box medium span4"><i class="icon-hand-left" style="color: black"></i><b>Pilihkan Kelas</b></a>
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