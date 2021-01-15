@extends('admin.layouts.app')

@section('page.title', 'اضافة صفحة')

@section('content')
  <div class="card main-card">
    <header class="card-header">
      <a href="{{ route('admin.pages.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list"></i>
          </span>
        <span>قائمة الصفحات</span>
      </a>
    </header>
    {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.pages.store']]) !!}
    @include('admin.pages._form')
    {!! Form::close() !!}
  </div>
@endsection