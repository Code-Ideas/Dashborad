@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Icon Picker')
<!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Icon Picker</h1>
            <p>Display an input as an Icon Picker to ease the user icon selection.</p>
            <p>Credits to Bulma-Extensions
                (
                <a class="has-text-link" href="https://wikiki.github.io/form/iconpicker/">https://wikiki.github.io/form/iconpicker/</a>
                ) . We converted it to VUE Component
            </p>
            <div class="columns">
                <div class="column is-6">
                    <strong>Available animations</strong>
                    <ul class="list-disc is-list">
                        <li>icon (required)</li>
                        <li>id (required)</li>
                        <li>icon-sets (required =>  Array of objects)</li>

                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                <code>
                    <span><</span>icon-picker icon="fa fa-star" id="icon"
                        :icon-sets = "[{
                            name: 'ايقونات الموقع', // Name displayed on tab
                            css: '/front/css/icons.css', // CSS url containing icons rules
                            prefix: 'icon-', // CSS rules prefix to identify icons
                            displayPrefix: ''
                        },
                        {
                            name: 'ايقونات الموقع', // Name displayed on tab
                            css: '/front/css/icons.css', // CSS url containing icons rules
                            prefix: 'icon-', // CSS rules prefix to identify icons
                            displayPrefix: ''
                        }]"

                    > <span><</span>/icon-picker>
                </code>
            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <icon-picker icon="fa fa-star" id="icon"
                :icon-sets = "[{
                    name: 'ايقونات الموقع', // Name displayed on tab
                    css: '/front/css/icons.css', // CSS url containing icons rules
                    prefix: 'icon-', // CSS rules prefix to identify icons
                    displayPrefix: ''
                },
                {
                    name: 'ايقونات الموقع', // Name displayed on tab
                    css: '/front/css/icons.css', // CSS url containing icons rules
                    prefix: 'icon-', // CSS rules prefix to identify icons
                    displayPrefix: ''
                }]"

            ></icon-picker>
        </div>
    </div>
@endsection
