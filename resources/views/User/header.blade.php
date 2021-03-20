<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Manhar Bank</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav me-auto mb-4 mb-lg-0 heading">
          
          <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="/transfermoney">TransferMoney</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="/history">History </a>
          </li>

        </ul>
        
        <ul class="nav navbar-nav navbar-right">
        
          @if(Session::has('user'))
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{session::get('user')['Fname']}}  {{session::get('user')['Lname']}}
              </a>
              <ul class="dropdown-menu">
                <li><a href="/profile">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
            </li>
          @else
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>  
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>