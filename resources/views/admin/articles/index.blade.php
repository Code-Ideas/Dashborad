<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'المقالات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header is-justify-content-space-between">
      <a href="{{ route('admin.articles.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
        <span>اضافة مقال</span>
      </a>
        @include('admin.partials.search')
    </div><!-- End Card Header -->

    <!-- Start Card Content -->
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="articles">
          <thead>
          <tr>
            <th>صورة المقال</th>
            <th>عنوان المقال</th>
            <th>الاجراءات</th>
          </tr>
          </thead>
          <tbody>
            @foreach($articles as $article)
              <tr>
                <td><img src="{{ $article->image }}"></td>
                <td>{{ $article->title }}</td>
                <td>
                  <div class="buttons has-addons">
                    <a class="button is-info" href="{{ route('admin.articles.edit', $article->id) }}"> تعديل </a>
                      <a class="button is-warning" href="{{ route('admin.articles.show', $article->id) }}">معرض الصور</a>
                    <span class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $article->id }}" data_name="{{ $article->title }}" data-url="{{ route('admin.articles.destroy', $article->id) }}">حذف</span>
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
      {{ $articles->appends(['filter' => $filter])->links('vendor.pagination.bulma') }}
    </div><!-- End Card Content -->
  </div><!-- End Card -->

  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->


