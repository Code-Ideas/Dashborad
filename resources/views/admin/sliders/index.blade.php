<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الصور المتحركة')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.sliders.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>اضافة صورة</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="sliders">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>الحالة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td><img src="{{ $slider->thumb ?: '/front/img/dummy_data/slide2.png' }}"
                                    style="width:100px;"></td>
                            <td>{{ $slider->active ? 'مفعل' : 'غير مفعل' }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                        تعديل </a>
                                    <span class="modal-open button is-danger" status-name="تأكيد الحذف"
                                        traget-modal=".delete-modal" data_id="{{ $slider->id }}"
                                        data_name="الصورة المتحركة"
                                        data-url="{{ route('admin.sliders.destroy', $slider->id) }}">حذف</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- End Card Content -->
    <!-- Start Card Footer -->
    <div class="card-footer with-pagination">
      {{  $sliders->links('vendor.pagination.bulma') }}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->
