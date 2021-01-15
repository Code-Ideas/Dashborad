{{-- Desktop header --}}
<nav class="navbar is-primary desktop">
  <div class="navbar-brand">
    <a class="navbar-item is-hidden-desktop" href="https://github.com/jgthms/bulma" target="_blank">
      <span class="icon" style="color: #333;">
        <i class="fa fa-github"></i>
      </span>
    </a>
    <a class="navbar-item is-hidden-desktop" href="https://twitter.com/jgthms" target="_blank">
      <span class="icon" style="color: #55acee;">
        <i class="fa fa-twitter"></i>
      </span>
    </a>
    <div class="navbar-burger burger" data-target="navMenubd-example">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div id="navMenubd-example" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" id="sidebar_toggle">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link " href="#">          
          <i class="far fa-bell has-text-white fa-lg"></i>          
        </a>
        <div class="navbar-dropdown is-left notification-menu">
          <a class="notification-item" href="#" >
            <figure class="ml-3 image is-48x48">
              <img class="is-rounded" src="https://bootadmin.org/images/demo/user.jpg" alt="">
            </figure>
            <p class="notification-details">
              <span class="name">Gurinder Singh</span>
              <span class="text">Like your post: “Contact Form 7 Multi-Step” Like your post: “Contact Form 7 Multi-Step”</span>
              <time class="time">45 min</time>
            </p>
          </a>
          <a class="notification-item" href="#" >
            <figure class="ml-3 image is-48x48">
              <img class="is-rounded" src="https://bootadmin.org/images/demo/user.jpg" alt="">
            </figure>
            <p class="notification-details">
              <span class="name">Gurinder Singh</span>
              <span class="text">Like your post: “Contact Form 7 Multi-Step” Like your post: “Contact Form 7 Multi-Step”</span>
              <time class="time">45 min</time>
            </p>
          </a>
          <a class="notification-item" href="#" >
            <figure class="ml-3 image is-48x48">
              <i class="mt-3 fas fa-thumbs-up has-text-primary fa-2x"></i>
            </figure>
            <p class="notification-details">
              <span class="name">Gurinder Singh</span>
              <span class="text">Like your post: “Contact Form 7 Multi-Step” Like your post: “Contact Form 7 Multi-Step”</span>
              <time class="time">45 min</time>
            </p>
          </a>
          <a class="notification-item more" href="#" >
            See More Notifications 
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link " href="#">
          <figure class="image is-48x48 avatar">
            <img src="{{ asset('/admin/img/admin_inverted.png') }}">
          </figure>
        </a>
        <div class="navbar-dropdown is-left">
          <a class="navbar-item " href="#" onclick="document.getElementById('logoutForm2').submit()">
            تسجيل الخروج
          </a>
          <form style="display: none;" id="logoutForm2" action="{{ route('admin_logout') }}" method="post">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>

{{-- mobile header --}}
<nav class="navbar is-primary mobile">
  <div class="navbar-brand">
    <div class="navbar-burger burger" data-target="navMenubd">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="side-header ">
      <span class="avatar-name">{{ auth()->guard('admin')->user()->name }}</span>
      <figure class="image is-48x48 avatar">
        <img src="{{ asset('/admin/img/admin.png') }}">
      </figure>      
    </div>
  </div>
  <div id="navMenubd" class="navbar-menu">
    <div class="navbar-start">
      <div class="aside-container mobile">
        @include('admin.includes.main_menu')
      </div>
    </div>
  </div>
</nav>
