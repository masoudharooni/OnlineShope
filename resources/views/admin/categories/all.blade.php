@extends('layouts.admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">
                            <a class="nav-link drawer" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                            دسته بندی ها
                            <a class="btn btn-primary float-left text-white py-2 px-4"
                                href="{{ route('admin.categories.create') }}">افزودن دسته
                                بندی جدید</a>
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @include('layouts.errors.message')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست دسته بندی ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="table table-striped table-valign-middle mb-0">
                                <table class="table table-hover mb-0">
                                    <tbody>

                                        <tr>
                                            <th>آیدی</th>
                                            <th>نامک</th>
                                            <th>عنوان</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($categories as $cat)
                                            <tr>
                                                <td>{{ $cat['id'] }}</td>
                                                <td>{{ $cat['slug'] }}</td>
                                                <td>{{ $cat['title'] }}</td>
                                                <td>{{ new Verta($cat['created_at']) }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-default btn-icons"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('admin.categories.delete', $cat['id']) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-default btn-icons"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="d-flex justify-content-center">
                            <ul class="pagination mt-3">
                                {{ $categories->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
