@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
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
                    <div class="col-8">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.post.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group w-25">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="title"
                                                   placeholder="Введите название поста" value="{{old('title')}}">
                                            @error('title')
                                            <div class="text-danger">Заполните поле</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Контент</label>
                                            <textarea id="summernote" name="content">{{old('content')}}</textarea>
                                            @error('content')
                                            <div class="text-danger">Заполните поле</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                                        </div>
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
