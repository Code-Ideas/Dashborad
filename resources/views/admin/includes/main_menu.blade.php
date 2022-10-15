<collapse class="outer " accordion is-fullwidth>
    <a href="{{ route('landing') }}" target="_blank" class="card link-item-no-collapse "><i
            class="fa fa-home"></i><span>{{ __('labels.home') }}</span></a>
    <a href="{{ route('admin.dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-tachometer-alt"></i><span>{{ __('labels.dashboard') }}</span></a>
    <collapse-item title="{{ __('labels.ui_elements') }}" icon="fa fa-image">
        <a class="link-item" href="{{ route('admin.modal_component') }}">Modal</a>
        <a class="link-item" href="{{ route('admin.dropzone_component') }}">DropZone</a>
        <a class="link-item" href="{{ route('admin.uploader_component') }}">File Uploader</a>
        <a class="link-item" href="{{ route('admin.iconpicker_component') }}">Icon Picker</a>
        <a class="link-item" href="{{ route('admin.colorpicker_component') }}">Color Picker</a>
        <a class="link-item" href="{{ route('admin.datepicker_component') }}">Date Picker</a>
        <a class="link-item" href="{{ route('admin.maps_component') }}">Google Maps</a>
        <a class="link-item" href="{{ route('admin.tags_component') }}">Tags</a>


    </collapse-item>
    <collapse-item title="اقسام الموقع" icon="fa fa-sitemap">
        <a class="link-item" href="{{ route('admin.sections.create') }}">اضافة قسم</a>
        <a class="link-item" href="{{ route('admin.sections.index') }}">قائمة الاقسام</a>
    </collapse-item>
    <collapse-item title="المقالات" icon="fa fa-newspaper">
        <a class="link-item" href="{{ route('admin.articles.create') }}">اضافة مقال</a>
        <a class="link-item" href="{{ route('admin.articles.index') }}">قائمة المقالات</a>
    </collapse-item>
    <collapse-item title="الصور المتحركة" icon="fa fa-image">
        <a class="link-item" href="{{ route('admin.sliders.create') }}">اضافة صورة</a>
        <a class="link-item" href="{{ route('admin.sliders.index') }}">قائمة الصور</a>
    </collapse-item>
    <a href="{{ route('admin.contacts.index') }}" class="card link-item-no-collapse"><i class="fa fa-envelope"></i><span>رسائل التواصل</span></a>
    <a href="{{ route('admin.settings.edit') }}" class="card link-item-no-collapse"><i class="fa fa-cogs"></i><span>{{ __('labels.settings') }}</span></a>
    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();
  document.getElementById('logout-form').submit();" class="card link-item-no-collapse"><i
            class="fas fa-sign-out-alt"></i><span>{{ __('labels.logout') }}</span></a>
    <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
