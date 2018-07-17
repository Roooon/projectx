
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
            
              <li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span>
              {!! link_to_route('profile.profile','Mypage' ,['id' => Auth::User()->id]) !!}
            　</button ></li>
            　<li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>
            　{!! link_to_route('skills.create','Skill' ,['id' => Auth::User()->id]) !!}
            　</button></li>
            　<li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>
    　         {!! link_to_route('postintro.create','Intro' ,['id' => Auth::User()->id]) !!}
            　</button></li>
            　<li><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>
    　         {!! link_to_route('logout.get', 'Logout') !!}
            　</button></li>
            　
              <li role="separator" class="divider"></li>
              @else
              <li>{!! link_to_route('signup.get', 'Sign up now!') !!}</li>
              <li>{!! link_to_route('login', 'Login') !!}</li>
              </ul>

              @endif
        </li>
  
</nav>
