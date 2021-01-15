@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Date and Time Picker')
<!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Date and Time Picker</h1>
            <p>A VueJs component for select date & time </p>
            <p>Credits to CtkDatetimePicker (
                <a class="has-text-link" href="https://chronotruck.github.io/vue-ctk-date-time-picker/ ">https://chronotruck.github.io/vue-ctk-date-time-picker/ </a>
                ) .
            </p>
            <div class="columns">
                <div class="column is-12">
                    <strong>Props</strong>

                    <ul class="list-disc is-list">
                        <li>old-value (optional : only if Edit Mode)</li>
                        <li>input-name (Required)</li>
                        <li>format (optional : default:"YYYY-MM-DD HH:mm")</li>
                        <li>formatted (optional : default:"YYYY-MM-DD HH:mm")</li>
                        <li>color (optional : default:"#54cc96"	)</li>
                        <li>only-time (optional : default:false)</li>
                        <li>only-date (optional : default:false)</li>
                        <li>now (optional : default:"2020-11-22 00:07")</li>
                        <li>no-label (optional : default:false)</li>
                        <li>inline (optional : default:true)</li>
                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                <code>
                    <span><</span>date-time-picker now="{{date('Y-m-d H:i')}}"><span><</span>/date-time-picker>
                </code>
            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <div class="columns is-multiline">
                <div class="column is-12">
                    <date-time-picker input-name="test"></date-time-picker>
                </div>
                <div class="column is-5">
                    <date-time-picker input-name="test2" format="hh:mm a" formatted="hh:mm a" :only-time="true" :inline="false" :no-label="true"></date-time-picker>
                </div>
                <div class="column is-5">
                    <date-time-picker input-name="test3" :only-date="true"></date-time-picker>
                </div>
            </div>

        </div>
    </div>
@endsection
