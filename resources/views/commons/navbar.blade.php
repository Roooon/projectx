
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
            @if (Auth::check())
              <li>
                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-home"></span>
                {!! link_to_route('profile.profile', 'Mypage',['id' => 1]) !!}
            　   </button ></li>
            　<li><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-edit"></span>
    　        
            　</button></li>
            　<li><button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-edit"></span>
    　          {!! link_to_route('intro.create', 'Intro') !!}
            　</button></li>
              @else
              <li>{!! link_to_route('signup.get', 'Sign up now!') !!}</li>
              <li>{!! link_to_route('login', 'Login') !!}</li>
              @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
