@extends('admin.layouts.app')

@section('page.title', 'الصفحات')


@section('content')

  <div class="card main-card">
    <div class="card-header">
      <a href="{{ route('admin.pages.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>اضافة صفحة</span>
      </a>
    </div>
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="pages">
          <thead>
          <tr>
            <th> اسم الصفحة</th>
            <th>الاجراءات</th>
          </tr>
          </thead>
          <tbody>
          @foreach($pages as $page)
            <tr>
              <td>{{ $page->name }}</td>
              <td>
                <div class="buttons has-addons">
                  <a class="button is-info" href="{{ route('admin.pages.edit', $page->slug) }}"> تعديل </a>
                  @if($page->id != 1)
                      <span class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $page->slug }}" data_name="{{ $page->name }}" data-url="{{ route('admin.pages.destroy', $page->slug) }}">مسح</span>
                  @endif
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <footer class="card-footer">
    </footer>
  </div>
  @include('admin.partials.deleteModal')
@endsection



