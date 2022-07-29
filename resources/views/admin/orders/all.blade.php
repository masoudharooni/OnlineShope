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
                            سفارشات
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست سفارشات</h3>

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
                                            <th>مشاهده سفارش</th>
                                            <th>تاریخ</th>
                                            <th>کاربر</th>
                                            <th>مبلغ</th>
                                            <th>کد رهگیری</th>
                                            <th>وضعیت</th>
                                        </tr>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-default btn-icons" data-toggle="modal"
                                                        data-target="#order_items" title="مشاهده سبد خرید"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->amount }}</td>
                                                <td>{{ $order->ref_code }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $order->status == 'paid' ? 'success' : 'danger' }}">{{ $order->status == 'paid' ? 'موفق' : 'ناموفق' }}</span>
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
                            {{ $orders->links() }}
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

    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="order_items" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">آیتم های سبد خرید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="table table-striped table-valign-middle mb-0">
                        <table class="table table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th>عنوان</th>
                                    <th>دسته بندی</th>
                                    <th>لینک دمو</th>
                                    <th>لینک دانلود</th>
                                    <th>قیمت</th>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/user6-128x128.jpg" class="product_img">
                                        کارت ویزیت مشاور املاک
                                    </td>
                                    <td>کارت ویزیت</td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دمو"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دانلود"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>۳۹۰۰۰ تومان</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/user6-128x128.jpg" class="product_img">
                                        کارت ویزیت مشاور املاک
                                    </td>
                                    <td>کارت ویزیت</td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دمو"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دانلود"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>۳۹۰۰۰ تومان</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/user6-128x128.jpg" class="product_img">
                                        کارت ویزیت مشاور املاک
                                    </td>
                                    <td>کارت ویزیت</td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دمو"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دانلود"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>۳۹۰۰۰ تومان</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="dist/img/user6-128x128.jpg" class="product_img">
                                        کارت ویزیت مشاور املاک
                                    </td>
                                    <td>کارت ویزیت</td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دمو"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-default btn-icons" title="لینک دانلود"><i
                                                class="fa fa-link"></i></a>
                                    </td>
                                    <td>۳۹۰۰۰ تومان</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
@endsection
