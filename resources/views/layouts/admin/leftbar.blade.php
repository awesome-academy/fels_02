<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('home.index') }}">
            <img class="
            logo-admin" src="/layouts/home/images/logo.jpg" alt="Framgia E-Learning"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="">
                        <i class="fas fa-tachometer-alt"></i>@lang('adminMess.lb_home')</a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-suitcase"></i>@lang('adminMess.lb_manage')</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        @if(Auth::user()->role_id === config('setting.numberDefault1'))
                            <li>
                                <a href="{{ route('user.index') }}">
                                    <i class="fas fa-user"></i>@lang('adminMess.lb_user')
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('topic-admin.index') }}">
                                    <i class="fas fa-book"></i>@lang('adminMess.lb_topic')
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
