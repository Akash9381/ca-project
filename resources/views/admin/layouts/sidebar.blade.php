<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Logo Light -->
    <a href="{{url('/admin/dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{url('/admin/assets/images/logo.png')}}" alt="logo" height="22">
        </span>
        <span class="logo-sm">
            <img src="{{url('/admin/assets/images/logo-sm.png')}}" alt="small logo" height="22">
        </span>
    </a>

    <!-- Logo Dark -->
    <a href="{{url('/admin/dashboard')}}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{url('/admin/assets/images/logo-dark.png')}}" alt="dark logo" height="22">
        </span>
        <span class="logo-sm">
            <img src="{{url('/admin/assets/images/logo-dark-sm.png')}}" alt="small logo" height="22">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </button>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{url('/admin/assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="{{url('/admin/dashboard')}}"
                     class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="{{url('/admin/users')}}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Users </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{url('/admin/create-user')}}" class="side-nav-link">
                    <i class="uil-plus-circle"></i>
                    <span>Create User</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{url('/admin/upload-documents')}}" class="side-nav-link">
                    <i class="uil-upload"></i>
                    <span>Upload Document</span>
                </a>
            </li>

        </ul>
        <!--- End Sidemenu -->



        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
