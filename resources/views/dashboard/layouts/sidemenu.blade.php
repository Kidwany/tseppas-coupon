<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{adminUrl('/')}}">{{--<img src="{{asset('dashboard/assets/images/LRC-logo-white.png')}}" width="80" alt="Aero">--}}<span class="m-l-10"> {{config('app.name')}} Dashboard</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="{{adminUrl('admin/' . auth()->user()->id . '/edit')}}"><img src="{{asset('dashboard/assets/images/user.png')}}" alt="User"></a>
                    <div class="detail">
                        <h6> {{auth()->user()->name}} </h6>
                        <small>Admin</small>
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i><span>Dashboard </span></a></li>
            <li class="{{request()->segment(2) == 'sales-quotations' || request()->segment(2) == 'enrollment' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comment-list"></i><span>Sales Quotations </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('sales-quotations')}}">Show Sales Quotations</a></li>
                    <li><a href="{{adminUrl('sales-quotations/create')}}">New Quotation</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'sales-orders' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-filter-list"></i><span>Sales Orders </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('sales-orders')}}">Show Sales Orders</a></li>
<!--                    <li><a href="{{adminUrl('sales-orders/create')}}">New Order</a></li>-->
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'customers' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Customers </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('customers')}}">Customers</a></li>
                    <li><a href="{{adminUrl('customers/create')}}">New Customer</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'clients' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-case"></i><span>Clients </span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('clients')}}">Clients</a></li>
                    <li><a href="{{adminUrl('clients/create')}}">New Client</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'coupons' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-book"></i><span>Coupons</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('coupons')}}">All Coupons</a></li>
                    <li><a href="{{adminUrl('coupons/create')}}"> Generate Coupons </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'sales-agents' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-case"></i><span>Sales Agents</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('sales-agents')}}">Show Sales Agents</a></li>
                    <li><a href="{{adminUrl('sales-agents/create')}}">  New Sales Agent </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'admins' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-key"></i><span>Admins</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('admin')}}">Admins</a></li>
                    <li><a href="{{adminUrl('admin/create')}}">  New Admin </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'permissions' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Permissions</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('permissions')}}">Permission</a></li>
                    <li><a href="{{adminUrl('permissions/create')}}">  New Permission </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'setting' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>Setting</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('setting')}}">Edit Setting</a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'category' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-list"></i><span>Category</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('category')}}">Show Categories</a></li>
                    <li><a href="{{adminUrl('category/create')}}"> New Category </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'products' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-view-web"></i><span>Products</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('products')}}">Show Products</a></li>
                    <li><a href="{{adminUrl('products/create')}}"> New Product </a></li>
                </ul>
            </li>
            <li class="{{request()->segment(2) == 'branches' ? 'active open' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-my-location"></i><span>Branches</span></a>
                <ul class="ml-menu">
                    <li><a href="{{adminUrl('branches')}}">Show Branches</a></li>
                    <li><a href="{{adminUrl('branches/create')}}"> New Branch </a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
