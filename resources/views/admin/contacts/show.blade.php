@extends('admin.layouts.app')

@section('page.title', 'مشاهدة الرسالة')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.contacts.index') }}" class="button is-success">
        <span class="icon is-small"><i class="fa fa-envelope"></i></span>
            <span>قائمة الرسائل</span>
        </a>
    </div>
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="محتوي الرسالة" icon="fa fa-envelope-open" selected>
                <div class="columns is-vcentered">
                    <div class="column is-12">
                        <div class="info-content">
                            <div class="info">
                                <label class="label">اسم المرسل</label>
                                <span class="value">{{ $contact->name }}</span>
                            </div>
                            <div class="info">
                                <label class="label">رقم الهاتف </label>
                                <span class="value"><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">البريد الإلكتروني </label>
                                <span class="value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">محتوي الرسالة </label>
                                <span class="value">{{ $contact->message }}</span>
                            </div>
                            <div class="info left-buttons">
                                <ul>
                                    <li class=" tooltip is-tooltip-right" data-tooltip="تاريخ الرسالة">
                                        <div class="available">
                                            {{ $contact->created_at->toDayDateTimeString() }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </collapse-item>
        </collapse>
    </div>
</div>
@endsection



