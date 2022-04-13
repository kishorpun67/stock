 @extends('layouts.admin_layout.admin_layout')
@section('content')
<?php 
use App\OrderDetail;
use App\User;
use App\foodMenu;
use App\Purchase;
use App\Expense;
use App\Customer;
use App\Attendance;
use App\Supplier;
use App\paymentMethod;


$foodMenu = foodMenu::count();
$purchase = Purchase::count();
$expense = Expense::count();
$customer = Customer::count();
$attendance = Attendance::count();
$supplier = Supplier::count();
$paymentMethod = paymentMethod::count();

if(auth('admin')->user()->parent_id > 0){
      $admin_id = auth('admin')->user()->parent_id;
  }else{
      $admin_id = auth('admin')->user()->id;
  }

// $user = User::count();
// $total_order = OrderDetail::where('admin_id', $admin_id)->sum('quantity');




?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
              {{ Session::get('error_message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $foodMenu }}</h3>
                <p>foodMenus</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.add.edit.food.menu')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          {{-- purchase --}}
          <div class="col-lg-3 col-6">
            {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $purchase }}</h3>
                <p>Purchase</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.add.edit.purchase')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

              {{-- expense --}}
        <div class="col-lg-3 col-6">
          {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $expense }}</h3>
              <p>Expense</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.add.edit.purchase')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

                 {{-- customer --}}
                 <div class="col-lg-3 col-6">
                  {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{ $customer }}</h3>
                      <p>Customer</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.add.edit.customer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                   {{-- attendance --}}
                   <div class="col-lg-3 col-6">
                    {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{ $attendance }}</h3>
                        <p>Attendance</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{route('admin.add.edit.attendance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                    {{-- supplier --}}
                    <div class="col-lg-3 col-6">
                      {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{ $supplier }}</h3>
                          <p>Supplier</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.add.edit.supplier')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                       {{-- paymentMethod --}}
                       <div class="col-lg-3 col-6">
                        {{-- <iframe src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe> --}}
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>{{ $paymentMethod }}</h3>
                            <p>PaymentMethod</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="{{route('admin.add.edit.paymentMethod')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
        </div>
      </div>
    </section>




</div>
<!-- /.content-wrapper -->

@endsection
