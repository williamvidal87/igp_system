<nav id="mainnav-container">
  <div id="mainnav">
    <div id="mainnav-menu-wrap">
      <div class="nano">
        <div class="nano-content">
          <div id="mainnav-profile" class="mainnav-profile">
            <div class="profile-wrap text-center">
              <div class="pad-btm">
                <img class="img-circle img-md" src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}" alt="Profile Picture">
              </div>
              <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                <span class="pull-right dropdown-toggle">
                  <i class="dropdown-caret"></i>
                </span>
                <p class="mnp-name">{{ Auth::user()->name }}</p>
                <span class="mnp-desc">{{ Auth::user()->email }}</span>
              </a>
            </div>
            <div id="profile-nav" class="collapse list-group bg-trans">
              <a href="editprofileform" class="list-group-item">
                <i class="demo-pli-male icon-lg icon-fw"></i> Edit Profile
              </a>
              <a href="passwordupdate" class="list-group-item">
                <i class="demo-pli-gear icon-lg icon-fw"></i> Update Password
              </a>
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}"
                  @click.prevent="$root.submit();" class="list-group-item">
                  <i class="demo-pli-unlock icon-lg icon-fw"></i> {{ __('Log Out') }}
                </a>
              </form>
            </div>
          </div>
          <ul id="mainnav-menu" class="list-group">
          
            <li>
              <a href="dashboard">
                <i class="demo-pli-home"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            
            <!-- for admin nav -->
            @if(Auth::user()->rule_id==1)
              @include('layouts.shared.main_navs.admin_nav')
            @endif
            
            <!-- for client nav -->
            @if(Auth::user()->rule_id==2)
              @include('layouts.shared.main_navs.client_nav')
            @endif
            
            <li class="list-divider"></li>
            
          </ul>
        
        </div>
      </div>
    </div>
  </div>
</nav>