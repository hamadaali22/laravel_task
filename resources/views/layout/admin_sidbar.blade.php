    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <!-- <li class=" nav-item"><a href="#"><i class="la la-bolt"></i><span class="menu-title" data-i18n="nav.flot_charts.main">الرئيسية</span></a>
          <ul class="menu-content">
            <li  class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="menu-item" href="{{url('admin/dashboard')}}" data-i18n="nav.flot_charts.flot_pie_charts">الرئيسية</a>
            </li>
          </ul>
        </li> -->



        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{url('admin/dashboard')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">الرئيسية</span></a>
        </li>
        @can('الرئيسية')
        @endcan

        <li class="nav-item {{ Request::is('admin/customers') ? 'active' : '' }}">
            <a href="{{url('admin/customers')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">العملاء</span></a>
        </li>


      </ul>
    </div>
  </div>
