<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.dashboard')}}">
          <img alt="image" src="{{ asset("/assets/img/logo.png") }}" class="header-logo" />
          <span class="logo-name">{{ __("Med Art") }}</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">{{ __("Asosiy") }}</li>
        <li class="dropdown {{ request()->is('admin/dashboard*') ? 'active' : ''  }}">
          <a href="{{ Route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>{{ __("Dashboard") }}</span></a>
        </li>

        {{-- @can('product-list') --}}
          <li class="dropdown {{ request()->is('admin/about-us/*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown" ><i class="fas fa-list-alt"></i><span>{{ __("Biz haqimizda") }}</span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/about-us/home-image*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.about-us.home-image.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Uy rasmi") }}</span></a>
                </li>
                <li class="{{ request()->is('admin/about-us/contents*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.about-us.contents.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Contentlar") }}</span></a>
                </li>
                <li class="{{ request()->is('admin/about-us/faqs*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.about-us.faqs.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("TSS") }}</span></a>
                </li>
              </ul>
          </li>
        {{-- @endcan --}}
        
        {{-- @can('product-list') --}}
          <li class="dropdown {{ request()->is('admin/our-service/*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown" ><i class="fas fa-list-alt"></i><span>{{ __("Bizning xizmatlar") }}</span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/our-service/home-image*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.our-service.header_image.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Uy rasmi") }}</span></a>
                </li>
                <li class="{{ request()->is('admin/our-service/departments*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.our-service.departments.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Bo'limlar") }}</span></a>
                </li>
                <li class="{{ request()->is('admin/our-service/faqs*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.our-service.faqs.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("TSS") }}</span></a>
                </li>
              </ul>
          </li>
        {{-- @endcan --}}

        {{-- @can('product-list') --}}
          {{-- <li class="dropdown {{ request()->is('admin/product-telephones*') ? 'active' : ''  }}">
            <a href="#" class="menu-toggle nav-link has-dropdown" ><i class="fas fa-boxes"></i> <span> {{ __("Telefon Mahsulotlar") }} </span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/product-telephones*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.product-telephones.index') }}" > <i class="fas fa-boxes"></i> <span> {{ __("Telefon mahsulotlari") }} </span></a>
                </li>

                <li class="{{ request()->is('admin/telephone-memories') ? 'active' : ''  }}">
                    <a href="{{ route('admin.telephone-memories.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Telefon xotiralari") }}</span></a>
                </li>
              </ul>
          </li> --}}
        {{-- @endcan --}}

        {{-- <li class="dropdown {{ request()->is('admin/colors*') ? 'active' : ''  }}">
          <a href="{{ route('admin.colors.index') }}" ><i class="fas fa-list-alt"></i><span>{{ __("Ranglar") }}</span></a>
        </li> --}}

        

        {{-- @if (Auth::user()->hasAllPermissions(['role-list', 'user-list']))
            <li class="menu-header"> Xavfsizlik </li>
            <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="user-check"></i><span> Administratsiya </span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/roles*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.roles.index') }}" > <i class="fas fa-universal-access"></i> Rollar</a>
                </li>
                <li class=" {{ request()->is('admin/users*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.users.index') }}" > <i class="fas fa-users-cog"></i><span>Foydalanuvchi&Admin</span></a>
                </li>
            </ul>
            </li>
        @endif --}}
      </ul>
    </aside>
  </div>
  