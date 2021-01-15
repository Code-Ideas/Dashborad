<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل الصورة')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.sliders.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-image"></i>
        </span>
        <span>قائمة الصور</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($slider, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.sliders.update',$slider->id)]) !!}
      @include('admin.sliders._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
