<div class="page-header">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon is-small">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>
                    <span>الرئيسية </span>
                </a>
            </li>
            @if (Route::current()->getName() != 'admin.dashboard')
                <li class="is-active">
                    <a href="#">
                        <span>@yield('page.title')</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
