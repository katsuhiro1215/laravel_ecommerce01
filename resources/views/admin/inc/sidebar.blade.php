@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $route == 'brand' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brand</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'brand.create' ? 'active' : '' }}"><a
                            href="{{ route('brand.create') }}"><i class="ti-more"></i>一覧</a></li>
                </ul>
            </li>

            <li class="treeview {{ $route == 'category' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>カテゴリー</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'category.create' ? 'active' : '' }}"><a
                            href="{{ route('category.create') }}"><i class="ti-more"></i>カテゴリー一覧</a></li>
                    <li class="{{ $route == 'subCategory.create' ? 'active' : '' }}"><a
                            href="{{ route('subCategory.create') }}"><i class="ti-more"></i>サブカテゴリー一覧</a></li>
                    <li class="{{ $route == 'subSubCategory.create' ? 'active' : '' }}"><a
                            href="{{ route('subSubCategory.create') }}"><i class="ti-more"></i>サブサブカテゴリー一覧</a></li>
                </ul>
            </li>

            <li class="treeview {{ $route == 'product' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>商品</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'product.index' ? 'active' : '' }}"><a
                            href="{{ route('product.index') }}"><i class="ti-more"></i>商品一覧</a></li>
                    <li class="{{ $route == 'product.create' ? 'active' : '' }}"><a
                            href="{{ route('product.create') }}"><i class="ti-more"></i>商品作成</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview {{ $route == 'hero' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Hero</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'hero.create' ? 'active' : '' }}"><a
                        href="{{ route('hero.create') }}"><i class="ti-more"></i>一覧</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Content</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
                    <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
                    <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="package"></i>
                    <span>Utilities</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
                    <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
                    <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
                    <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
                    <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="edit-2"></i>
                    <span>Icons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
                    <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
                    <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>
                    <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
                    <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
                    <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
                    <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
                    <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="inbox"></i>
                    <span>Forms</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="forms_advanced.html"><i class="ti-more"></i>Advanced Elements</a></li>
                    <li><a href="forms_editors.html"><i class="ti-more"></i>Editors</a></li>
                    <li><a href="forms_code_editor.html"><i class="ti-more"></i>Code Editor</a></li>
                    <li><a href="forms_validation.html"><i class="ti-more"></i>Form Validation</a></li>
                    <li><a href="forms_wizard.html"><i class="ti-more"></i>Form Wizard</a></li>
                    <li><a href="forms_general.html"><i class="ti-more"></i>General Elements</a></li>
                    <li><a href="forms_dropzone.html"><i class="ti-more"></i>Dropzone</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="server"></i>
                    <span>Tables</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
                    <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="pie-chart"></i>
                    <span>Charts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
                    <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
                    <li><a href="charts_inline.html"><i class="ti-more"></i>Inline</a></li>
                    <li><a href="charts_morris.html"><i class="ti-more"></i>Morris</a></li>
                    <li><a href="charts_peity.html"><i class="ti-more"></i>Peity</a></li>
                    <li><a href="charts_chartist.html"><i class="ti-more"></i>Chartist</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="map"></i>
                    <span>Map</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="map_google.html"><i class="ti-more"></i>Google Map</a></li>
                    <li><a href="map_vector.html"><i class="ti-more"></i>Vector Map</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="alert-triangle"></i>
                    <span>Authentication</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
                    <li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
                    <li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
                    <li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
                    <li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
                    <li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">EXTRA</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Multilevel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Level One</a></li>
                    <li class="treeview">
                        <a href="#">Level One
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Level Two</a></li>
                            <li class="treeview">
                                <a href="#">Level Two
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Level Three</a></li>
                                    <li><a href="#">Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Level One</a></li>
                </ul>
            </li>

            <li>
                <a href="auth_login.html">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
