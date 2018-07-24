
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
      <a href="/" class="navbar-brand">ProjectX</a>
    </div>

    <!-- menu items -->
    <div id="navbar" class="collapse navbar-collapse">
      　<ul class="nav navbar-nav">
      　  <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
              <li class="nav-serch">
              <form class="form-inline" action="/search" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="User Search" aria-label="Search" name='keyword'>
                    
                    <input type="image" src="images/btn2.gif" alt="検索" name="search" class="search" />
                    
              </form>
              </li>
              
              <div class="aaaaa">
              <li class="bb">
              <button class="link_mypage"><span class="glyphicon glyphicon-home"></span>
              {!! link_to_route('profile.show','Mypage' ,['id' => Auth::User()->id]) !!}
            　</button ></li>
            　
            　
            　<button class="link_logout"><span class="glyphicon glyphicon-log-out"></span> {!! link_to_route('logout.get', 'Logout') !!}
            　</button></li>
            　</div>
            　
            　
              <li role="separator" class="divider"></li>
              @else
              <li>{!! link_to_route('signup.get', 'Sign up now!') !!}</li>
              <li>{!! link_to_route('login', 'Login') !!}</li>
              

              @endif
        </ul>
        </ul>
  
</nav>
