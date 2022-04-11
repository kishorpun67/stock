  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <a href="{{route('admin.dashboard')}}" class="brand-link">
      {{-- <img src="{{asset('image/admin_image/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Admin | Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          @if(Session::get('page')=="dashboard")
           <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          @if(Session::get('page')=="dfd" || Session::get('page')=="kitchen" || Session::get('page')=="caffe" || Session::get('page')=="bar" || Session::get('page')=="waiter" )
           <?php $active = "active";
           $menuOpen="menu-open"; ?>
            @else
            <?php $active = "";
            $menuOpen=""; ?>
          @endif
          <li class="nav-item has-treeview {{$menuOpen ??''}} ">
            <a href="#" class="nav-link {{$active}}">
              <i class="fas fa-menu"></i>
              <p>
                All Screen
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger"></span>
              </p>
            </a>

            @if(Session::get('page')=="dfdf")
           <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.add.edit.sale')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>POS</p>
                </a>
              </li>
              @if(Session::get('page')=="kitchen")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.kitchen')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kitchen</p>
                </a>
              </li>
              @if(Session::get('page')=="caffe")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.caffe')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Caffe</p>
                </a>
              </li>
              @if(Session::get('page')=="bar")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.bar')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bar</p>
                </a>
              </li>
              @if(Session::get('page')=="waiter")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.waiter.collect.food')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waiter</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Session::get('page')=="ingredientCategory" || Session::get('page')=="ingredientUnit" || Session::get('page')=="ingredientItem" || Session::get('page')=="foodCategory" || Session::get('page')=="foodMenu" || Session::get('page')=="purchase" || Session::get('page')=="customer" || Session::get('page')=="supplier" || Session::get('page')=="waste"|| Session::get('page')=="table" || Session::get('page')=="stock" || Session::get('page')=="paymentMethod" || Session::get('page')=="expense"|| Session::get('page')=="sale" || Session::get('page')=="stock" || Session::get('page')=="paymentMethod" || Session::get('page')=="expense"

          )
          <?php $active = "active";
          $menuOpen="menu-open"; ?>
           @else
           <?php $active = "";
           $menuOpen=""; ?>
         @endif
         <li class="nav-item has-treeview {{$menuOpen ??''}} ">
           <a href="#" class="nav-link {{$active}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <p>
               Master
               <i class="fas fa-angle-left right"></i>
               <span class="right badge badge-danger"></span>
             </p>
           </a>
        
            {{-- here i added new haha --}}
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="ingredientCategory")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.ingredientCategory')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Ingredient Category </p>
                </a>
              </li>
            </ul>
            
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="ingredientUnit")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.ingredientUnit')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Ingredient Units </p>
                </a>
              </li>
            </ul>
  
          <ul class="nav nav-treeview">
            @if(Session::get('page')=="ingredientItem")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <li class="nav-item">
              <a href="{{route('admin.ingredientItem')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p> Ingredient Items</p>
              </a>
            </li>
          </ul>
          
          <ul class="nav nav-treeview">
            @if(Session::get('page')=="foodCategory")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <li class="nav-item">
              <a href="{{route('admin.foodCategory')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p> Food Category</p>
              </a>
            </li>
          </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="foodMenu")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.foodMenu')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p> Food Menu</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="purchase")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.purchase')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p> Purchase</p>
            </a>
          </li>
        </ul>

          <ul class="nav nav-treeview">
            @if(Session::get('page')=="customer")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <li class="nav-item">
              <a href="{{route('admin.customer')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Customers</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            @if(Session::get('page')=="supplier")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <li class="nav-item">
              <a href="{{route('admin.supplier')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Suppliers</p>
              </a>
            </li>
          </ul>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="waste")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.waste')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waste</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="table")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.table')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tables</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="sale")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.sale')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales</p>
                </a>
              </li>
            </ul>
            
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="order")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.order')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="paymentMethod")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.paymentMethod')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Methods</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="stock")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.stock.report')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
            </ul>
            
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="expense")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.expense')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense</p>
                </a>
              </li>
            </ul>
        </li>
        @if(Session::get('page')=="attendance" || Session::get('page')=="task" || Session::get('page')=="leave" 
        || Session::get('page')=="salary" || Session::get('page')=="dfd")
        <?php $active = "active";
        $menuOpen="menu-open"; ?>
         @else
         <?php $active = "";
         $menuOpen=""; ?>
       @endif
       <li class="nav-item has-treeview {{$menuOpen ??''}} ">
         <a href="#" class="nav-link {{$active}}">
          <i class="fas fa-user-plus"></i><p>
            Employe Management
             <i class="fas fa-angle-left right"></i>
             <span class="right badge badge-danger"></span>
           </p>
         </a>
         <ul class="nav nav-treeview">
          @if(Session::get('page')=="attendance")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.attendance')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Attendance</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="task")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.task')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Task</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="leave")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.leave')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>leave</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="salary")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.view.salary')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>salary</p>
            </a>
          </li>
        </ul>
       </li>


       
       @if(Session::get('page')=="supplierDeuPayment" || Session::get('page')=="customerDeuReceives" || Session::get('page')=="miscellaneous")
        <?php $active = "active";

        $menuOpen="menu-open"; ?>
         @else
         <?php $active = "";
         $menuOpen=""; ?>
       @endif
       <li class="nav-item has-treeview {{$menuOpen ??''}} ">
         <a href="#" class="nav-link {{$active}}">

          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
           <p>
            Accounts
             <i class="fas fa-angle-left right"></i>
             <span class="right badge badge-danger"></span>
           </p>
         </a>

         @if(Session::get('page')=="setting")
        <?php $active = "active"; ?>
         @else
         <?php $active = ""; ?>
         @endif

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="supplierDeuPayment")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.view.supplier.deu.payments')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Supplier Due Payments</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="customerDeuReceives")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.view.customer.deu.receives')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Customer Due Receives</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="miscellaneous")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.miscellaneous')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Miscellaneous</p>
            </a>
          </li>
        </ul>

         
        <ul class="nav nav-treeview">
          @if(Session::get('page')=="taxVat")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.taxVat')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Tax And Vat</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="bankDeposit")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.bankDeposit')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Deposit Into Bank</p>
            </a>
          </li>
        </ul>

        
        <ul class="nav nav-treeview">
          @if(Session::get('page')=="bank")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.bank')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Bank</p>
            </a>
          </li>
        </ul>

           
        <ul class="nav nav-treeview">
          @if(Session::get('page')=="cashHand")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.cashHand')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Cash In Hand</p>
            </a>
          </li>
        </ul>


       
       
        @if(Session::get('page')=="setting" || Session::get('page')=="updateAdminDetail" || Session::get('page')=="admin_roles" )
        <?php $active = "active";
        $menuOpen="menu-open"; ?>
         @else
         <?php $active = "";
         $menuOpen=""; ?>
       @endif
       <li class="nav-item has-treeview {{$menuOpen ??''}} ">
         <a href="#" class="nav-link {{$active}}">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
           <p>

          <i class="fa fas-analytics"></i>          <p>

            Reports
             <i class="fas fa-angle-left right"></i>
             <span class="right badge badge-danger"></span>
           </p>
         </a>
         <ul class="nav nav-treeview">
          @if(Session::get('page')=="daily_sale_report")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.daily.summary.report')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Daily Summary Report</p>
            </a>
          </li>
        </ul>
         <ul class="nav nav-treeview">
          @if(Session::get('page')=="waste_report")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.waste.report')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Waste Report</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="purchase_report")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.purchase.report')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Purchase Report</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="attendance_report")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.attendance.report')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Attendance Report</p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-treeview">
          @if(Session::get('page')=="sale_report")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.sale.report')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Sale Report</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          @if(Session::get('page')=="miscellaneous_report")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.miscellaneous.report')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Miscellaneous Report</p>
            </a>
          </li>
        </ul>

       </li>
       @if(Session::get('page')=="payments" || Session::get('page')=="receives" || Session::get('page')=="miscellaneous" )
       <?php $active = "active";
       $menuOpen="menu-open"; ?>
        @else
        <?php $active = "";
        $menuOpen=""; ?>
      @endif
      <li class="nav-item has-treeview {{$menuOpen ??''}} ">
        <a href="#" class="nav-link {{$active}}">
         <i class="fa fa-solid fa-user" aria-hidden="true"></i>
          <p>
           Accounts
            <i class="fas fa-angle-left right"></i>
            <span class="right badge badge-danger"></span>
          </p>
        </a>

        @if(Session::get('page')=="payments")
       <?php $active = "active"; ?>
        @else
        <?php $active = ""; ?>
        @endif
    
       <ul class="nav nav-treeview">
         @if(Session::get('page')=="payments")
         <?php $active = "active"; ?>
         @else
         <?php $active = ""; ?>
         @endif
         <li class="nav-item">
           <a href="{{route('admin.view.supplier.deu.payments')}}" class="nav-link {{$active}}">
             <i class="far fa-circle nav-icon"></i>
             <p>Supplier Deu Payments</p>
           </a>
         </li>
       </ul>

       <ul class="nav nav-treeview">
         @if(Session::get('page')=="receives")
         <?php $active = "active"; ?>
         @else
         <?php $active = ""; ?>
         @endif
         <li class="nav-item">
           <a href="{{route('admin.view.customer.deu.receives')}}" class="nav-link {{$active}}">
             <i class="far fa-circle nav-icon"></i>
             <p>Customer Deu Receives</p>
           </a>
         </li>
       </ul>

       
       <ul class="nav nav-treeview">
         @if(Session::get('page')=="miscellaneous")
         <?php $active = "active"; ?>
         @else
         <?php $active = ""; ?>
         @endif
         <li class="nav-item">
           <a href="{{route('admin.miscellaneous')}}" class="nav-link {{$active}}">
             <i class="far fa-circle nav-icon"></i>
             <p>Miscellaneous</p>
           </a>
         </li>
       </ul>

      </li>
       @if(Session::get('page')=="setting" || Session::get('page')=="updateAdminDetail" || Session::get('page')=="admin_roles" )
       <?php $active = "active";
       $menuOpen="menu-open"; ?>
        @else
        <?php $active = "";
        $menuOpen=""; ?>
      @endif
      <li class="nav-item has-treeview {{$menuOpen ??''}} ">
        <a href="#" class="nav-link {{$active}}">
          <i class="fas fa-cogs"></i>
          <p>
            Settings
            <i class="fas fa-angle-left right"></i>
            <span class="right badge badge-danger"></span>
          </p>
        </a>

        @if(Session::get('page')=="setting")
       <?php $active = "active"; ?>
        @else
        <?php $active = ""; ?>
        @endif
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.settings')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Update Admin Password</p>
            </a>
          </li>
          @if(Session::get('page')=="updateAdminDetail")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.update.admin.details')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Update Admin Details</p>
            </a>
          </li>
          {{-- @if (in_array(auth('admin')->user()->role_id, [2] )) --}}

           @if(Session::get('page')=="admin_roles")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{route('admin.user')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>User</p>
            </a>
          </li>
          {{-- @endif --}}
        </ul>
      </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

