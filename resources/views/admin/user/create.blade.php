@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Добавление пользователя</li>
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
                            <form action="{{route('admin.user.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Имя пользователя</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Введите имя пользователя">
                                        @error('name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"
                                               placeholder="Введите email">
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label>Пароль</label>--}}
{{--                                        <input type="text" class="form-control" name="password"--}}
{{--                                               placeholder="Введите пароль">--}}
{{--                                        @error('password')--}}
{{--                                        <div class="text-danger">{{$message}}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
                                    <div class="form-group w-50">
                                        <label>Выбрать роль</label>
                                        <select name="role" class="form-control">
                                            @foreach($roles as $id => $role)
                                                <option value="{{$id}}"
                                                    {{$id == old('role_id') ? 'selected' : ''}}
                                                >{{$role}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                        <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                                    </div>
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
