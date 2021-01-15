@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Maps')
<!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Google Maps</h1>
            <p>Add & Edit Address based on drag marker </p>
            <div class="columns">
                <div class="column is-12">
                    <strong>Props</strong>
                    <ul class="list-disc is-list">
                        <li>editable (optional : default "true")</li>
                        <li>address (optional : default "current location") address = { latitude: 24.774265, longitude: 46.738586 }</li> 
                        <li>map-height (optional : default "400px")</li>                      
                    </ul>
                </div>                
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                /*========Editable=======*/
                <code>                    
                    <span><</span>google-map><span><</span>/google-map>
                </code>
                /*========None Editable=======*/
                <code>                    
                    <span><</span>google-map :editable="false"><span><</span>/google-map>
                </code>      
            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <google-map></google-map>
        </div>
    </div>
@endsection
