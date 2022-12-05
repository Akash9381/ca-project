<div class="sidebar" data-color="orange">

    <div class="logo">
      <a href="{{route('home')}}" class="simple-text logo-mini">
        <img src="{{asset('login/img/tall img.jpg')}}" alt="logo">
      </a>
      <a href="{{route('home')}}" class="simple-text logo-normal">
        TAX MALL
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="active ">
          <a href="{{url('/dashboard')}}">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <div class="dropdown ml-3 ">
          <a class="btn btn-secondary dropdown-toggle bg-transparent pl-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="now-ui-icons users_single-02"></i>
           <span style="padding-top: 5px; font-size:medium ">USER PROFILE</span>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item text-white" href="#">USER ID: {{auth()->user()->id}}</a>
            <a class="dropdown-item text-white" href="#">{{auth()->user()->name}}</a>
            <a class="dropdown-item text-white" href="#">{{auth()->user()->number}}</a>
            <a class="dropdown-item text-white" href="{{url('/logout')}}">Log Out</a>
          </div>
        </div>





      </ul>
    </div>
  </div>
