@extends('admin.layouts.app')

@section('page.title', 'تعديل اعدادات الموقع')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <div>
              <span class="icon is-small">
            <i class="fa fa-cogs"></i>
          </span>
                <span> اعدادات الموقع</span>
            </div>
        </div>
        {!! Form::model($setting,['method' => 'PATCH', 'files' => true, 'url' => route('admin.settings.update', $setting->id)]) !!}
        @include('admin.settings._form')
        {!! Form::close() !!}
    </div>
@endsection


