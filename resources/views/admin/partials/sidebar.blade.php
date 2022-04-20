<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name"></p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'profile.dashboard' ? 'active' : '' }}" href="{{ route('profile.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
           <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
             <i class="app-menu__icon fa fa-institution"></i>
              <span class="app-menu__label">Categories</span>
          </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}" href="{{ route('user.index') }}">
              <i class="app-menu__icon fa fa-users"></i>
              <span class="app-menu__label">Users</span>
           </a>
        </li>
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}" href="{{ route('blog') }}"><i class="app-menu__icon fa fa-newspaper-o"></i>
                <span class="app-menu__label">All Posts</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'user.post' ? 'active' : '' }}" href="{{ route('user.post') }}"><i class="app-menu__icon fa fa-folder-o"></i>
                <span class="app-menu__label">My Posts</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="{{ route('logout') }}"><i class="fa fa-sign-out fa-lg"></i>
                 <span class="app-menu__label"> Logout</span>
            </a>
        </li>
    </ul>
</aside>