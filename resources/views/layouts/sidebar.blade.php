<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::url() == url('/home') ? 'active' : '' }}"><a href="{{ url('/home') }}">
                <i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::url() == url('/tickets') ? 'active' : '' }}">
                <a href="{{ url('/tickets') }}"><i class="fa fa-ticket"></i>
                    <span>Tickets</span>
                </a>
            </li>
            <li class="{{ Request::url() == url('/customers') ? 'active' : '' }}">
                <a href="{{ url('/customers') }}"><i class="fa fa-users"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="{{ Request::url() == url('/project') ? 'active' : '' }}">
                <a href="{{ url('/projects') }}"><i class="fa fa-laptop"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="{{ Request::url() == url('/users') ? 'active' : '' }}">
                <a href="{{ url('/users') }}"><i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-book"></i>
                    <span>Report</span>
                </a>
            </li>
            
            {{-- <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Product Inventory</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::url() == url('/products') ? 'active' : '' }}">
                        <a href="{{url('/products')}}"><i class="fa fa-edit"></i> Products</a>
                    </li>
                    <li class="{{ Request::url() == url('/cetegory') ? 'active' : '' }}">
                        <a href="{{url('/cetegory')}}"><i class="fa fa-edit"></i> Category Products</a>
                    </li> --}}
                    {{-- <li class="{{ Request::routeIs('categories.index') ? 'active' : '' }}">
                        <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i> Category Products</a>
                    </li> --}}
                    {{-- <li class="{{ Request::url() == url('/sizeproducts') ? 'active' : '' }}">
                        <a href="{{ url('/sizeproducts') }}"><i class="fa fa-edit"></i> Master Size Products</a>
                    </li>
                    <li class="{{ Request::url() == url('/masterpengiriman') ? 'active' : '' }}">
                        <a href="{{ url('/masterpengiriman') }}"><i class="fa fa-edit"></i> Master Pengiriman/Ekspedisi</a>
                    </li>
                </ul>
            </li>
            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="ion ion-bag"></i>
                    <span>Transactions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::url() == url('/customers') ? 'active' : '' }}"><a href="{{ url('/customers') }}"><i class="fa fa-check-square-o"></i> Data Customers</a></li>
                    <li ><a href="{{ url('/hutang-pembelian')}}"><i class="fa fa-check-square-o"></i> Data Hutang Pembelian</a></li>
                    <li class="{{ Request::url() == url('/hutang') ? 'active' : '' }}"><a href="{{ url('/hutang') }}"><i class="fa fa-check-square-o"></i> Data Hutang Penjualan</a></li>
                    <li class="{{ Request::url() == url('/getAllOrders') ? 'active' : '' }}"><a href="{{ url('/getAllOrders')}}"><i class="fa fa-check-square-o"></i> Data Order</a></li>
                    <li class="{{ Request::url() == url('/orders') ? 'active' : '' }}"><a href="{{ url('/orders')}}"><i class="fa fa-check-square-o"></i> Purchase Orders</a></li>
                </ul>
            </li>
            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::url() == url('/user') ? 'active' : '' }}"><a href="{{ url('/user') }}"><i class="fa fa-user"></i> Data Admin</a></li>
                    <li class="{{ Request::url() == url('/sales') ? 'active' : '' }}">
                        <a href="{{ url('/sales') }}"><i class="fa fa-user"></i> Data Sales</a>
                    </li>
                </ul>
            </li>
            <li class="treeview" style="height: auto;">
                <a href="#">
                    <i class="ion ion-stats-bars"></i>
                    <span>Report / Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="ion ion-calendar"></i> Daily / Harian</a></li>
                    <li><a href="#"><i class="ion ion-calendar"></i> Monthly / Bulanan</a></li>
                </ul>
            </li> --}}


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
