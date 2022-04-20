<header class="app-header">
    <a class="app-header__logo" href="{{url('/')}}">Shola Blog</a>
    <a class="app-sidebar__toggle" href="" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i> <span class="font-weight-bold px-2 bg-white text-danger">{{Auth()->user()->unreadNotifications->count()}}</span> </a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    You have {{Auth()->user()->unreadNotifications->count()}} new notifications.
                </li>
                <div class="app-notification__content">
                    <li>
                        @foreach(Auth()->user()->notifications as $notify)
                         @php $bgColor = $notify->read_at ? '': 'bg-light' @endphp
                       
                        <a id="notify{{$notify->id}}"class="{{$bgColor}} app-notification__item" href="{{url('notification/view?post_slug='.$notify->data['post_slug'].'&notify_id='.$notify->id)}}">
                            <div class="">
                                <p class=" app-notification__message">
                                <span class="font-weight-bold">{{$notify->data['commenter_name']}}</span> {{$notify->data['message']}}  <span class="">{{$notify->data['post_title']}}</span> 
                                </p>
                                <p class="mt-2 app-notification__meta"> {{$notify->created_at->diffForHumans()}}</p> <span class="float-right delete"  data-id="{{$notify->id}}" style="margin-top: -20px"><i class="fa  fa-trash fa-lg text-danger"></i></span>
                            </div>
                        </a>
                       
                    </li>
                    @endforeach
                </div>
                <li class="app-notification__footer">
                    <a href="#"></a>
                </li>
              
            </ul>
        </li>

        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa fa-cog fa-lg"></i>account</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>