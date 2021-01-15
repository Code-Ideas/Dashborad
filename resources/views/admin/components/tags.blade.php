@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Tags')
<!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Tags</h1>
            <p>Add & Edit tags</p>
            <div class="columns">
                <div class="column is-6">
                    <strong>Props</strong>
                    <ul class="list-disc is-list">
                        <li>name (optional : default "tags")</li>
                        <li>old-values (optional : Array)</li>
                        <li>label (optional : default "Add Tags")</li>
                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                <code>
                    <span><</span>tags name="test" :old-values="['test1', 'test2']" label="اضف لون"><span><</span>/tags>
                </code>
            </pre>
            <!-- Demo -->
            <h2 class="my-3 mb-3 has-text-black has-text-weight-bold">Example</h2>
            <tags name="test" :old-values="['test1', 'test2']" label="اضف لون"></tags>
        </div>
    </div>
@endsection
