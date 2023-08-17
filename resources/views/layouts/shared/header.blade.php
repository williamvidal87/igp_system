<header id="navbar">
  <div id="navbar-container" class="boxed">
    <div class="navbar-header">
      <a href="dashboard" class="navbar-brand">
        <img src="img/norsulogo.png" alt="Nifty Logo" class="brand-icon">
        <div class="brand-title">
          <span class="brand-text">NORSU-G IGP</span>
        </div>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="nav navbar-top-links">
        <li class="tgl-menu-btn">
          <a class="mainnav-toggle" href="#">
            <i class="demo-pli-list-view"></i>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-top-links">
        <li id="dropdown-user" class="dropdown">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
            <span class="ic-user pull-right">
              <i class="demo-pli-male"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
            <ul class="head-list">
              <li>
                <a href="editprofileform"><i class="demo-pli-male icon-lg icon-fw"></i>Edit Profile</a>
              </li>
              <li>
                <a href="passwordupdate"><i class="demo-pli-gear icon-lg icon-fw"></i> Update Password</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <a href="{{ route('logout') }}"
                  @click.prevent="$root.submit();">
                    <i class="demo-pli-unlock icon-lg icon-fw"></i> {{ __('Log Out') }}
                  </a>
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>