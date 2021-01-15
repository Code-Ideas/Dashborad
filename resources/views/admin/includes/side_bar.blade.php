<div class="aside-container desktop">
    @if (auth()
        ->guard('admin')
        ->check())
        <div class="side-header">
            <figure class="image is-48x48 avatar">
                <img src="{{ auth()->guard('admin')->user()->image
                    ?: asset('/admin/img/admin.png') }}">
            </figure>
            <span class="avatar-name">{{ auth()->guard('admin')->user()->name }}</span>
        </div>
    @endif
    @include('admin.includes.main_menu')
</div>
