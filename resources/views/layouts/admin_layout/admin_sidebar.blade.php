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
          @if(Session::get('page')=="" || Session::get('page')=="kitchen" || Session::get('page')=="caffe" || Session::get('page')=="bar" || Session::get('page')=="waiter" )
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

            @if(Session::get('page')=="")
           <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.sale')}}" class="nav-link {{$active}}">
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
          @if(Session::get('page')=="banner" || Session::get('page')=="category" || Session::get('page')=="post" || Session::get('page')=="testimonial" || Session::get('page')=="order" || Session::get('page')=="daily" || Session::get('page')=="monthly")
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
              @if(Session::get('page')=="post")
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
            @if(Session::get('page')=="testimonial")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
                <ul class="nav nav-treeview">
                  @if(Session::get('page')=="post")
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
                  @if(Session::get('page')=="testimonial")
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
            @if(Session::get('page')=="testimonial")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <li class="nav-item">
              <a href="{{route('admin.foodCategory')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p> Food Menu Category</p>
              </a>
            </li>
    </ul>

    <ul class="nav nav-treeview">
              @if(Session::get('page')=="testimonial")
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
          @if(Session::get('page')=="testimonial")
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
            @if(Session::get('page')=="testimonial")
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
            @if(Session::get('page')=="testimonial")
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
              @if(Session::get('page')=="testimonial")
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
              @if(Session::get('page')=="testimonial")
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
              @if(Session::get('page')=="testimonial")
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
              @if(Session::get('page')=="testimonial")
              <?php $active = "active"; ?>
              @else
              <?php $active = ""; ?>
              @endif
              <li class="nav-item">
                <a href="{{route('admin.waiter')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waiter</p>
                </a>
              </li>
            </ul>
        </li>

        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

