<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile position-relative" style="background: url(assets/admin/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img">
            @if(Session::has('id'))
            <img src="{{url('/')}}/{{\App\Models\User::where('id',Session::get('id'))->pluck('image')[0]}}" alt="user" class="w-100 rounded-circle" />
            @else
            <img src="url('/')/{{assets/admin/images/users/profile.png}}" alt="user" class="w-100" />
            @endif
            </div>
            <!-- User profile text-->
            <div class="profile-text pt-1 dropdown">
                <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">{{\App\Models\User::where('id',Session::get('id'))->pluck('name')[0]}}</a>
                <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/my_profile')}}"><i data-feather="user" class="feather-sm text-info me-1 ms-1"></i> My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('logout') }}"><i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i> Logout</a>
                    <div class="dropdown-divider"></div>
                    <div class="pl-4 p-2 d-none"><a href="#" class="btn d-block w-100 btn-info rounded-pill">View Profile</a></div>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item d-none" >
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customers.php" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Customers</span>
                    </a>
                </li>
				
                <li class="sidebar-item d-none" >
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="product.php" aria-expanded="false">
                        <i class="mdi mdi-cart-outline"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>
				
                <li class="sidebar-item d-none" >
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.php" target="_blank" aria-expanded="false">
                        <i class="mdi mdi-alert-box"></i>
                        <span class="hide-menu">404</span>
                    </a>
                </li>
				
                <li class="sidebar-item d-none">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="create.php" aria-expanded="false">
                        <i class="mdi mdi-file"></i>
                        <span class="hide-menu">Create Page</span>
                    </a>
                </li>


                <li class="sidebar-item d-none">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">Master</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="category.php" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">Category</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item d-none">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="contact.php" aria-expanded="false">
                        <i class="mdi mdi-email"></i>
                        <span class="hide-menu">Contact Us</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="hide-menu">CMS Pages</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level ">
                        <li class="sidebar-item d-none">
                            <a href="about.php" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">About Us</span>
                            </a>
                        </li>
                        <li class="sidebar-item d-none">
                            <a href="faq.php" class="sidebar-link ">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">FAQ</span>
                            </a>
                        </li>
                        <li class="sidebar-item d-none">
                            <a href="privacy.php" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">Privacy Policy</span>
                            </a>
                        </li>
                        <li class="sidebar-item d-none">
                            <a href="terms.php" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">Terms & Conditions</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-playlist-plus"></i>
                                <span class="hide-menu">Blog</span>
                            </a>
                            <ul aria-expanded="false" class="collapse second-level">
                                <li class="sidebar-item">
                                    <a href="{{url('/blogcategory_list')}}" class="sidebar-link">
                                        <i lass="mdi mdi-octagram"></i>
                                        <span class="hide-menu">Blog Category</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('/blog_list')}}" class="sidebar-link">
                                        <i lass="mdi mdi-octagram"></i>
                                        <span class="hide-menu">Blog List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-playlist-plus"></i>
                                <span class="hide-menu">Services</span>
                            </a>
                            <ul aria-expanded="false" class="collapse second-level">
                                <li class="sidebar-item">
                                    <a href="{{url('/services_list')}}" class="sidebar-link">
                                        <i lass="mdi mdi-octagram"></i>
                                        <span class="hide-menu">Services List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{url('/services_details_list')}}" class="sidebar-link">
                                        <i lass="mdi mdi-octagram"></i>
                                        <span class="hide-menu">services Details List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><!--
        <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings"><i class="ti-settings"></i></a>
        <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><i class="mdi mdi-gmail"></i></a>-->
        <a href="{{url('/logout')}}" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
