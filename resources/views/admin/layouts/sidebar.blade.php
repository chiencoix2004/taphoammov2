<div  class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="{{asset('assets3/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="{{asset('assets3/images/logo-light.png')}}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{asset('assets3/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu" >
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Main</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Dashboard</span>
                            <span class="badge text-bg-info ms-auto">New</span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item {{ request()->is('admin/categories/detailCategory/*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('admin/categories/detailCategory/*') ? 'active' : '' }}" href="{{route('admin.categories.listCategory')}}">
                            {{-- <i class="iconoir-hand-cash menu-icon"></i> --}}
                            <i class="iconoir-task-list menu-icon"></i>
                            <span>Danh Mục</span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item {{ request()->is('admin/users/detailUser/*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('admin/users/detailUser/*') ? 'active' : '' }}" href="{{route('admin.users.listUser')}}">
                            <i class="iconoir-group menu-icon"></i>
                            <span>Tài Khoản</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item {{ request()->is('admin/shops/detailShop/*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('admin/shops/detailShop/*') ? 'active' : '' }}" href="#sidebarTransactions" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarTransactions">
                            <i class="iconoir-shop menu-icon"></i>
                            <span>Gian Hàng</span>
                        </a>
                        <div class="collapse " id="sidebarTransactions">
                            <ul class="nav flex-column">
                                <li class="nav-item {{ request()->is('admin/shops/detailShop/*') ? 'active' : '' }}">
                                    <a class="nav-link {{ request()->is('admin/shops/detailShop/*') ? 'active' : '' }}" href="{{route('admin.shops.listShop1')}}">GH Chưa Duyệt <span class="badge rounded text-success bg-success-subtle ms-1">New</span></a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="new-transaction.html">GH Đã Duyệt</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="new-transaction.html">GH Đã Cấm</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end startbarTables-->
                    </li><!--end nav-item--> --}}

                    {{-- {{ request()->is('admin/shops*') ? 'active' : '' }} --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarTransactions" data-bs-toggle="collapse" role="button"
                            aria-expanded="{{ request()->is('admin/shops*') ? 'true' : 'false' }}" aria-controls="sidebarTransactions">
                            <i class="iconoir-shop menu-icon"></i>
                            <span>Gian Hàng</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/shops*') ? 'show' : '' }}" id="sidebarTransactions">
                            <ul class="nav flex-column">
                                <li class="nav-item {{ request()->is('admin/shops/listShop1') || request()->is('admin/shops/detailShop/*/1') ? 'active' : '' }}">
                                    <a class="nav-link {{ request()->is('admin/shops/detailShop/*/1') ? 'active' : ''  }}" href="{{route('admin.shops.listShop1')}}">GH Chưa Duyệt <span class="badge rounded text-success bg-success-subtle ms-1">New</span></a>
                                </li><!--end nav-item--> 
                                <li class="nav-item {{ request()->is('admin/shops/listShopStatus2') || request()->is('admin/shops/detailShop/*/2') ? 'active' : '' }}">
                                    <a class="nav-link {{ request()->is('admin/shops/detailShop/*/2') ? 'active' : ''  }}" href="{{route('admin.shops.listShopStatus2')}}">GH Đã Duyệt</a>
                                </li><!--end nav-item--> 
                                <li class="nav-item {{ request()->is('admin/shops/listShopStatus3') || request()->is('admin/shops/detailShop/*/3') ? 'active' : '' }}">
                                    <a class="nav-link {{ request()->is('admin/shops/detailShop/*/3') ? 'active' : ''  }}" href="{{route('admin.shops.listShopStatus3')}}">GH Đã Cấm</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end startbarTables-->
                    </li><!--end nav-item-->
                    
                    <li class="nav-item {{ request()->is('admin/banks/detailBank/*') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('admin/banks/detailBank/*') ? 'active' : '' }}" href="{{route('admin.banks.listBank')}}">
                            <i class="iconoir-credit-cards menu-icon"></i>
                            <span>Ngân Hàng</span>
                            {{-- <span class="badge text-bg-pink ms-auto">03</span> --}}
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.transactions.listTransaction')}}">
                            <i class="iconoir-plug-type-l menu-icon"></i>
                            <span>Lịch Sử Nạp Tiền</span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.titles.title')}}">
                            <i class="iconoir-paste-clipboard menu-icon"></i> 
                            <span>Tiêu Đề Trang Chủ</span>
                        </a>
                    </li><!--end nav-item--> 
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="apps-contact-list.html">
                            <i class="iconoir-post menu-icon"></i> 
                            <span>Bài Viết</span>
                        </a>
                    </li><!--end nav-item-->  --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarPosts" data-bs-toggle="collapse" role="button"
                            aria-expanded="{{ request()->is('admin/posts*') ? 'true' : 'false' }}" aria-controls="sidebarPosts">
                            <i class="iconoir-post menu-icon"></i>
                            <span>Bài Viết</span>
                        </a>
                        <div class="collapse {{ request()->is('admin/posts*') ? 'show' : '' }}" id="sidebarPosts">
                            <ul class="nav flex-column">
                                <li class="nav-item {{ request()->is('admin/posts/listPost1') || request()->is('admin/posts/detailPost/*/1') ? 'active' : '' }}">
                                    <a class="nav-link {{ request()->is('admin/posts/detailPost/*/1') ? 'active' : ''  }}" href="{{route('admin.posts.listPost1')}}">Post Chưa Duyệt <span class="badge rounded text-success bg-success-subtle ms-1">New</span></a>
                                </li><!--end nav-item--> 
                                <li class="nav-item {{ request()->is('admin/posts/listPost2') || request()->is('admin/posts/detailPost/*/2') ? 'active' : '' }}">
                                    <a class="nav-link {{ request()->is('admin/posts/detailPost/*/2') ? 'active' : ''  }}" href="{{route('admin.posts.listPost2')}}">Post Đã Duyệt</a>
                                </li><!--end nav-item--> 
                            </ul><!--end nav-->
                        </div><!--end startbarTables-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="apps-calendar.html">
                            <i class="iconoir-calendar menu-icon"></i> 
                            <span>Calendar</span>
                        </a>
                    </li><!--end nav-item-->  
                    <li class="nav-item">
                        <a class="nav-link" href="apps-invoice.html">
                            <i class="iconoir-paste-clipboard menu-icon"></i> 
                            <span>Invoice</span>
                        </a>
                    </li><!--end nav-item-->
               
                    <li class="menu-label mt-2">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Components</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarElements" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarElements">
                            <i class="iconoir-compact-disc menu-icon"></i>
                            <span>UI Elements</span>
                        </a>
                        <div class="collapse " id="sidebarElements">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-alerts.html">Alerts</a>
                                </li><!--end nav-item--> 
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-avatar.html">Avatar</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-buttons.html">Buttons</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-badges.html">Badges</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-cards.html">Cards</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-carousels.html">Carousels</a>
                                </li><!--end nav-item-->                                
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-dropdowns.html">Dropdowns</a>
                                </li><!--end nav-item-->                                   
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-grids.html">Grids</a>
                                </li><!--end nav-item-->                                
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-images.html">Images</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-list.html">List</a>
                                </li><!--end nav-item-->                                   
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-modals.html">Modals</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-navs.html">Navs</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-navbar.html">Navbar</a>
                                </li><!--end nav-item--> 
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-paginations.html">Paginations</a>
                                </li><!--end nav-item-->   
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-popover-tooltips.html">Popover & Tooltips</a>
                                </li><!--end nav-item-->                                
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-progress.html">Progress</a>
                                </li><!--end nav-item-->                                
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-spinners.html">Spinners</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-tabs-accordions.html">Tabs & Accordions</a>
                                </li><!--end nav-item-->                               
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-typography.html">Typography</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="ui-videos.html">Videos</a>
                                </li><!--end nav-item--> 
                            </ul><!--end nav-->
                        </div><!--end startbarElements-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAdvancedUI" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAdvancedUI">
                            <i class="iconoir-peace-hand menu-icon"></i>
                            <span>Advanced UI</span><span class="badge rounded text-success bg-success-subtle ms-1">New</span>
                        </a>
                        <div class="collapse " id="sidebarAdvancedUI">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-animation.html">Animation</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-clipboard.html">Clip Board</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-dragula.html">Dragula</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-files.html">File Manager</a>
                                </li><!--end nav-item--> 
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-highlight.html">Highlight</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-rangeslider.html">Range Slider</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-ratings.html">Ratings</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-ribbons.html">Ribbons</a>
                                </li><!--end nav-item-->                                  
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-sweetalerts.html">Sweet Alerts</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="advanced-toasts.html">Toasts</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end startbarAdvancedUI-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarForms">
                            <i class="iconoir-cube-hole menu-icon"></i>
                            <span>Forms</span>
                        </a>
                        <div class="collapse " id="sidebarForms">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-elements.html">Basic Elements</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-advanced.html">Advance Elements</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-validation.html">Validation</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-wizard.html">Wizard</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-editors.html">Editors</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-uploads.html">File Upload</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="forms-img-crop.html">Image Crop</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end startbarForms-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarCharts">
                            <i class="iconoir-candlestick-chart menu-icon"></i>
                            <span>Charts</span>
                        </a>
                        <div class="collapse " id="sidebarCharts">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="charts-apex.html">Apex</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="charts-justgage.html">JustGage</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="charts-chartjs.html">Chartjs</a>
                                </li><!--end nav-item--> 
                                <li class="nav-item">
                                    <a class="nav-link" href="charts-toast-ui.html">Toast</a>
                                </li><!--end nav-item--> 
                            </ul><!--end nav-->
                        </div><!--end startbarCharts-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarTables">
                            <i class="iconoir-list menu-icon"></i>
                            <span>Tables</span>
                        </a>
                        <div class="collapse " id="sidebarTables">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="tables-basic.html">Basic</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="tables-datatable.html">Datatables</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="tables-editable.html">Editable</a>
                                </li><!--end nav-item--> 
                            </ul><!--end nav-->
                        </div><!--end startbarTables-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarIcons">
                            <i class="iconoir-fire-flame menu-icon"></i>
                            <span>Icons</span>
                        </a>
                        <div class="collapse " id="sidebarIcons">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="icons-fontawesome.html">Font Awesome</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="icons-lineawesome.html">Line Awesome</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="icons-icofont.html">Icofont</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="icons-iconoir.html">Iconoir</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end startbarIcons-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarMaps">
                            <i class="iconoir-map-pin menu-icon"></i>
                            <span>Maps</span>
                        </a>
                        <div class="collapse " id="sidebarMaps">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="maps-google.html">Google Maps</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="maps-leaflet.html">Leaflet Maps</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="maps-vector.html">Vector Maps</a>
                                </li><!--end nav-item--> 
                            </ul><!--end nav-->
                        </div><!--end startbarMaps-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarEmailTemplates" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarEmailTemplates">
                            <i class="iconoir-send-mail menu-icon"></i>
                            <span>Email Templates</span>
                        </a>
                        <div class="collapse " id="sidebarEmailTemplates">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="email-templates-basic.html">Basic Action Email</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="email-templates-alert.html">Alert Email</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="email-templates-billing.html">Billing Email</a>
                                </li><!--end nav-item-->  
                            </ul><!--end nav-->
                        </div><!--end startbarEmailTemplates-->
                    </li><!--end nav-item-->
                    <li class="menu-label mt-2">
                        <small class="label-border">
                            <div class="border_left hidden-xs"></div>
                            <div class="border_right"></div>
                        </small>
                        <span>Crafted</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="iconoir-page-star menu-icon"></i>
                            <span>Pages</span>
                        </a>
                        <div class="collapse " id="sidebarPages">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-profile.html">Profile</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-notifications.html">Notifications</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-timeline.html">Timeline</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-treeview.html">Treeview</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-starter.html">Starter Page</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-pricing.html">Pricing</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-blogs.html">Blogs</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-faq.html">FAQs</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-gallery.html">Gallery</a>
                                </li><!--end nav-item-->  
                            </ul><!--end nav-->
                        </div><!--end startbarPages-->
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuthentication">
                            <i class="iconoir-fingerprint-lock-circle menu-icon"></i>
                            <span>Authentication</span>
                        </a>
                        <div class="collapse " id="sidebarAuthentication">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-login.html">Log in</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-register.html">Register</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-recover-pw.html">Re-Password</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-lock-screen.html">Lock Screen</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-maintenance.html">Maintenance</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-404.html">Error 404</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a class="nav-link" href="auth-500.html">Error 500</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div><!--end startbarAuthentication-->
                    </li><!--end nav-item-->
                </ul><!--end navbar-nav--->
                <div class="update-msg text-center"> 
                    <div class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                        <!-- <i class="iconoir-peace-hand h3 align-self-center mb-0 text-primary"></i> -->
                         <img src="{{asset('assets/images/extra/gold.png')}}" alt="" class="" height="45">
                    </div>                   
                    <h5 class="mt-3">Today's <span class="text-white">$2450.00</span></h5>
                    <p class="mb-3 text-muted">Today's best Investment for you.</p>
                    <a href="javascript: void(0);" class="btn text-primary shadow-sm rounded-pill px-3">Invest Now</a>
                </div>
            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->    
</div>
