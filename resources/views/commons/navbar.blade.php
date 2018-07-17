
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- hamburger button which shows narrow width -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- link back to the home -->
      <a class="navbar-brand" href="#">ProjectX</a>
    </div>

    <!-- menu items -->
    <div id="navbar" class="collapse navbar-collapse">
      　<ul class="nav navbar-nav">
      　  <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->email }}</a>
              <ul class="dropdown-menu">
              <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                </ul>
              <li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span>
              {!! link_to_route('profile.profile','Mypage' ,['id' => Auth::User()->id]) !!}
            　   </button ></li>
            　<li><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-edit"></span>
    　         
            　<li><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-edit"></span>
    　       
            　<li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>
    　         Skills

            　</button></li>
            　<li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>
    　         Intro
            　</button></li>
              <li role="separator" class="divider"></li>
              @else
              <li>{!! link_to_route('signup.get', 'Sign up now!') !!}</li>
              <li>{!! link_to_route('login', 'Login') !!}</li>
              @endif
          </ul>
        </li>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
