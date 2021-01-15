@extends('admin.layouts.app')

@section('page.title', 'تعديل صفحة')

@section('content')
  <div class="card main-card">
    <div class="card-header">
      <a href="{{ route('admin.pages.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list"></i>
          </span>
        <span>قائمة الصفحات</span>
      </a>
    </div>
    {!! Form::model($page,['method' => 'PATCH', 'files' => true, 'url' => route('admin.pages.update', $page->slug)]) !!}
    @include('admin.pages._form')
    {!! Form::close() !!}
  </div>
@endsection