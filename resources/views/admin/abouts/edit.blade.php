<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل عن الموقع')
<!-- Start Content Section -->
@section('content')
<!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <div>
        <span class="icon is-small">
          <i class="fa fa-info-circle"></i>
        </span>
        <span> عن الموقع</span>
      </div>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($about,['method' => 'PATCH', 'files' => true, 'url' => route('admin.abouts.update', $about->id)]) !!}
      @include('admin.abouts._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
