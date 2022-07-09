@extends('layouts.admin.master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                <a class="nav-link drawer" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                داشبورد</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>150</h3>

                          <p>سفارشات جدید</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-shopping-cart"></i>
                      </div>
                      <a href="#" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>53</h3>

                          <p>دسته بندی</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-sitemap"></i>
                      </div>
                      <a href="#" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>44</h3>

                          <p>محصول</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-image"></i>
                      </div>
                      <a href="#" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>65</h3>

                          <p>کاربر</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-user"></i>
                      </div>
                      <a href="#" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header no-border">
                          <div class="d-flex justify-content-between">
                              <h3 class="card-title">فروش</h3>
                              <a href="javascript:void(0);">مشاهده گزارش</a>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="d-flex">
                              <p class="d-flex flex-column">
                                  <span class="text-bold text-lg">تومان 18,230.00</span>
                                  <span>فروش در طول زمان</span>
                              </p>
                              <p class="mr-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fa fa-arrow-up"></i> 33.1%
                    </span>
                                  <span class="text-muted">از ماه گذشته</span>
                              </p>
                          </div>
                          <!-- /.d-flex -->

                          <div class="position-relative mb-4">
                              <canvas id="sales-chart" height="200"></canvas>
                          </div>

                          <div class="d-flex flex-row justify-content-end">
                  <span class="ml-2">
                    <i class="fa fa-square text-primary"></i> امسال
                  </span>

                              <span>
                    <i class="fa fa-square text-gray"></i> سال گذشته
                  </span>
                          </div>
                      </div>
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