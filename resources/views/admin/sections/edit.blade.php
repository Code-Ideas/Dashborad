<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  قسم')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.sections.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-sitemap"></i>
        </span>
        <span>قائمة اقسام الموقع</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($section,['method' => 'PATCH', 'files' => true, 'url' => route('admin.sections.update', $section->id)]) !!}
      @include('admin.sections._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


