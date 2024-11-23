 <!-- Sidebar Start -->
 <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div
        class="brand-logo d-flex align-items-center justify-content-between"
      >
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{asset('../backend/images/logos/logo.png')}}" alt="" width="70px" />
          <span style="font-size: 14px">Mekar Cafe </span>
        </a>
        <div
          class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
          id="sidebarCollapse"
        >
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <iconify-icon
              icon="solar:menu-dots-linear"
              class="nav-small-cap-icon fs-4"
            ></iconify-icon>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link"
              href="{{ route('admin.dashboard') }}"
              aria-expanded="false"
            >
              <iconify-icon
                icon="solar:widget-add-line-duotone"
              ></iconify-icon>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li>
            <span class="sidebar-divider lg"></span>
          </li>
          <li class="nav-small-cap">
            <iconify-icon
              icon="solar:menu-dots-linear"
              class="nav-small-cap-icon fs-4"
            ></iconify-icon>
            <span class="hide-menu">Menu Function</span>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link"
              href="{{ route('admin.c.index') }}"
              aria-expanded="false"
            >
              <iconify-icon
                icon="solar:layers-minimalistic-bold-duotone"
              ></iconify-icon>
              <span class="hide-menu">Category</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link"
              href="{{ route('admin.m.index') }}"
              aria-expanded="false"
            >
              <iconify-icon
                icon="lineicons:menu-cheesburger"
              ></iconify-icon>
              <span class="hide-menu">Menu</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link"
              href="{{ route('admin.p.index') }}"
              aria-expanded="false"
            >
              <iconify-icon
                icon="lsicon:badge-promotion-outline"
              ></iconify-icon>
              <span class="hide-menu">Promotion</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link"
              href="{{ route('admin.g.index') }}"
              aria-expanded="false"
            >
              <iconify-icon icon="uil:picture"></iconify-icon>
              <span class="hide-menu">Gallery</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a
              class="sidebar-link"
              href="{{ route('admin.o.index') }}"
              aria-expanded="false"
            >
              <iconify-icon icon="lets-icons:order"></iconify-icon>
              <span class="hide-menu">Order</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
