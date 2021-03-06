<div class="header dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                    <a class="navbar-brand" href="{{backend()}}">
                        <img src="/vendor/eshop/assets/img/e-shop--LOGO.png" alt="">
                    </a>

                    <div class="dashboard_log my-2">
                        <div class="d-flex align-items-center">
                            <div class="account_money">
                                <ul>
                                    <li class="crypto">
                                        <span>0.0025</span>
                                        <i class="cc BTC"></i>
                                    </li>
                                    <li class="usd">
                                        <span>19.93 USD</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile_log dropdown">
                                <div class="user" data-toggle="dropdown">
                                    <span class="thumb"><i class="la la-user"></i></span>
                                    <span class="name">{{eshop()->auth()->admin()->email}}</span>
                                    <span class="arrow"><i class="la la-angle-down"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="accounts.html" class="dropdown-item">
                                        <i class="la la-user"></i> Account
                                    </a>
                                    <a href="history.html" class="dropdown-item">
                                        <i class="la la-book"></i> History
                                    </a>
                                    <a href="settings.html" class="dropdown-item">
                                        <i class="la la-cog"></i> Setting
                                    </a>
                                    <a href="/" class="dropdown-item" target="_blank">
                                        <i class="far fa-window-maximize"></i> Front End
                                    </a>
                                    <a href="{{route('eshop-logout')}}" class="dropdown-item logout">
                                        <i class="la la-sign-out"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
