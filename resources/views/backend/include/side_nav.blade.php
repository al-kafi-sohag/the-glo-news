

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ config('app.url') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/default/admin.png') }}" class="img-circle elevation-2"
                    alt="{{ auth()->user()->name }}">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('b.dashboard') }}"
                        class="nav-link {{ $pageSlug == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('b.category.index') }}"
                        class="nav-link {{ $pageSlug == 'category' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>{{ __('Category') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('b.subCategory.index') }}"
                        class="nav-link {{ $pageSlug == 'sub-category' ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>{{ __('Sub-Category') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="logout">
        <a href="javascript:void(0)" class="btn btn-default btn-flat w-100"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Sign out') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>
