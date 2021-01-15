@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Color Picker')
<!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Color Picker</h1>
            <p>Picking color single and multi colors for ecommerce products</p>
            <p>based on vue color
            </p>
            <div class="columns">
                <div class="column is-6">
                    <strong>Single Color</strong>
                    <ul class="list-disc is-list">
                        <li>name (optional : default "color")</li>
                        <li>color(optional : if Edit mode)</li>
                    </ul>
                </div>
                <div class="column is-6">
                    <strong>Multi Colors</strong>
                    <ul class="list-disc is-list">
                        <li>name (optional : default "colors")</li>
                        <li>colors(optional : if Edit mode)</li>
                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                /*========Single Color=======*/
                <code>
                    <span><</span> single-color-picker name="color"> <span><</span>/single-color-picker>
                </code>
                /*========Multi Colors=======*/
                <code>
                    <span><</span>repeater-color name="color" ><span><</span>/repeater-color>
                </code>
            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <single-color-picker name="color" style="min-height: 200px;"></single-color-picker>
            <hr/>
            <repeater-color name="color" style="min-height: 300px;"></repeater-color>
        </div>
    </div>
@endsection
