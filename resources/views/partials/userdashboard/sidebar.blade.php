<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="active clearfix" href="javascript:void(0);">
              <div class="pull-left">
                  <i class="zmdi zmdi-sort-amount-desc mr-20"></i>
                  <span class="right-nav-text">Dashboard</span>
              </div>
            </a>
        </li>
        <li>
            <a class="clearfix" href="{{route('transactions')}}"><div class="pull-left"><i class="zmdi zmdi-balance-wallet mr-20"></i><span class="right-nav-text">Transactions</span></div></a>
        </li>
        <li>
            <a class="clearfix" href="{{route('digitalWallets')}}"><div class="pull-left"><i class="zmdi zmdi-labels mr-20"></i><span class="right-nav-text">Digital Wallet</span></div></a>
        </li>
        <li>
            <a class="clearfix" href="{{route('coin-exchange')}}"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Coin Exchange</span></div></a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="zmdi zmdi-developer-board mr-20"></i><span class="right-nav-text">Assets</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div></a>
                <ul id="ecom_dr" class="collapse collapse-level-1">
                    <li>
                        <a href="{{route('customerDeposit')}}">Deposit & Buy Asset</a>
                    </li>
                </ul>
        </li>
        <li>
            <a href="{{ route('low-interest') }}"><div class="pull-left"><i class="zmdi zmdi-equalizer mr-20"></i><span class="right-nav-text">Low interest Savings</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#invest">
                <div class="pull-left"> <i class="zmdi zmdi-store mr-20"></i><span class="right-nav-text">Real Estate Investment</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div></a>
                <ul id="invest" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('real-esate-investments') }}">Estate Investment</a>
                    </li>
                    <li>
                        <a href="{{ route('list-investments') }}">All Investment</a>
                    </li>
                </ul>
        </li>
        <li>
            <a href="#"><div class="pull-left"><i class="zmdi zmdi zmdi-receipt mr-20"></i><span class="right-nav-text">Purchase Shares</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>

        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Others</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{route('fundsRecovery')}}"><div class="pull-left"><i class="zmdi zmdi-shield-check mr-20"></i><span class="right-nav-text">Funds Recovery</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>
        <li><hr class="light-grey-hr mb-10"/></li>

        <li class="navigation-header">
            <span>Account</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">My Account</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="panels-wells.html">Account Information</a>
                </li>
                <li>
                    <a href="modals.html">Logout</a>
                </li>
            </ul>
        </li>

    </ul>
</div>
<!-- /Left Sidebar Menu -->
