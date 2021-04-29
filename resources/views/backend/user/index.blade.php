@extends('backend.layouts.master')

	@section('title','Daftar Soal')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Semua Soal</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nomor Induk</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Profesi</th>
                                <th>Alamat</th>
                                <th>No Tlp</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users)>0)
                                    @foreach ($users as $key=>$user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->reg_id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->visible_password}}</td>
                                        <td>
                                            @if (is_null($user->occupation))
                                                <span>kosong</span>
                                            @else
                                                {{$user->occupation}}
                                            @endif
                                        </td>

                                        <td>
                                            @if (is_null($user->address))
                                                <span>kosong</span>
                                            @else
                                                {{$user->address}}
                                            @endif
                                        </td>

                                        <td>
                                            @if (is_null($user->phone))
                                                <span>kosong</span>
                                            @else
                                                {{$user->phone}}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->is_admin == 1)
                                                <span class="badge badge-success pull-right">Admin</b></span>
                                            @else
                                                <span>User</span>
                                            @endif
                                        <td>
                                            <a href="{{route('user.edit',[$user->id])}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                        <!--Tombol hapus-->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                            Delete
                                        </button>
                                  
      
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('user.destroy',[$user->id])}}" method="post">@csrf
                                                {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Yakin ingin menghapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-outline-danger">Ya</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <td>Belum ada Soal</td>
                                @endif

                            </tbody>
                        </table>
                        <div class="pagination pagination-centered">
                            {{ $users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div> 

    @endsection