@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя: {{$user->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-4">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.user.update', $user->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Название</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Введите новое имя пользователя"
                                               value="{{$user->name}}">
                                        @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"
                                               placeholder="Введите новый email"
                                               value="{{$user->email}}">
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group w-50">
                                        <label>Изменить роль</label>
                                        <select name="role" class="form-control">
                                            @foreach($roles as $id => $role)
                                                <option value="{{$id}}"
                                                    {{$id == $user->role ? 'selected' : ''}}
                                                >{{$role}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-50">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3" value="Изменить">
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
