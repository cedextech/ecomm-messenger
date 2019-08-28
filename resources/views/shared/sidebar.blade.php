<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->shop->logo }}" class="img-circle" alt="{{ Auth::user()->name }}">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->shop->name }}</p>
                <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Store</li>
            
            <li class="{{ set_active(['shop/dashboard']) }}">
                <a href="{{ url('shop/dashboard') }}">
                    <i class="fa fa-dashboard"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="{{ set_active(['shop/categories*']) }}">
                <a href="{{ url('shop/categories') }}">
                    <i class="fa fa-server"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="{{ set_active(['shop/products*']) }}">
                <a href="{{ url('shop/products') }}">
                    <i class="fa fa-cube"></i>
                    <span>Products</span>
                </a>
            </li>
            
            <li class="{{ set_active(['shop/orders']) }}">
                <a href="{{ url('shop/orders') }}">
                    <i class="fa fa-cart-plus"></i>
                    <span>Orders</span>
                </a>
            </li>
            
            <li class="{{ set_active(['shop/reports']) }}">
                <a href="{{ url('shop/reports') }}">
                    <i class="fa fa-bar-chart"></i>
                    <span>Reports</span>
                </a>
            </li>

            <li class="{{ set_active(['shop/working-hours']) }}">
                <a href="{{ url('shop/working-hours') }}">
                    <i class="fa fa-clock-o"></i>
                    <span>Working Hours</span>
                </a>
            </li>

            <li class="{{ set_active(['shop/apps/messenger']) }}">
                <a href="{{ url('shop/apps/messenger') }}">
                    <i class="fa fa-wechat"></i>
                    <span>Facebook Messenger</span>
                </a>
            </li>

            <li class="treeview {{ set_active(['shop/settings', 'shop/settings/order', 'shop/settings/payments', 'shop/settings/services']) }}">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ set_active(['shop/settings']) }}">
                        <a href="{{ url('shop/settings') }}">
                            <i class="fa fa-laptop"></i> 
                            Online Shop
                        </a>
                    </li>

                    <li class="{{ set_active(['shop/settings/order']) }}">
                        <a href="{{ url('shop/settings/order') }}">
                            <i class="fa fa-cart-arrow-down"></i> 
                            Online Ordering
                        </a>
                    </li>

                    <li class="{{ set_active(['shop/settings/payments']) }}">
                        <a href="{{ url('shop/settings/payments') }}">
                            <i class="fa  fa-credit-card"></i> 
                            Payments
                        </a>
                    </li>

                    <li class="{{ set_active(['shop/settings/services']) }}">
                        <a href="{{ url('shop/settings/services') }}">
                            <i class="fa fa-truck"></i> 
                            Services
                        </a>
                    </li>

<!--                     <li>
                        <a href="{{ url('shop/settings/seo') }}">
                            <i class="fa fa-search-plus"></i> 
                            SEO & Social Media
                        </a>
                    </li> -->
                </ul>
            </li>

            <li class="header">Account</li>
            
            <li class="{{ set_active(['account/profile']) }}">
                <a href="{{ url('account/profile') }}">
                    <i class="fa fa-circle-o"></i> 
                    <span>Profile</span>
                </a>
            </li>
            
           <!-- <li class="{{ set_active(['account/plans']) }}">
                <a href="{{ url('account/plans') }}">
                    <i class="fa fa-circle-o"></i> 
                    <span>Plan</span>
                </a>
            </li>-->

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-circle-o"></i> 
                    <span>Sign out</span>
                </a>
            </li>
        </ul>
    </section>
</aside>