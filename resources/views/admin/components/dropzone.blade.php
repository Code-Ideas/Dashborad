@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'DropZone')
    <!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">DropZone</h1>
            <p>DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.</p>
            <p>Credits to Modal FX (
                <a class="has-text-link" href="https://www.dropzonejs.com/">https://www.dropzonejs.com/</a>
                ) . We converted it to VUE Component
            </p>
            <div class="columns">
                <div class="column is-6">
                    <strong>Component Props</strong>
                    <ul class="list-disc is-list">
                        <li>url (Required)</li>
                        <li>delete-url (Required)</li>
                        <li>accepted (optional : default=image/*>)</li>
                        <li>max-size (optional)</li>
                        <li>max-files (optional)</li>
                        <li>old-values (optional: if Edit mode to show Existing images)</li>
                        <li>delete-modal-title (optional: if Edit mode)</li>
                        <li>delete-modal-message (optional: if Edit mode)</li>
                        <li>redirect-link (optional: if Edit mode)</li>
                        <li>storage-link (optional: if Edit mode)</li>
                        <li>id (optional)</li>
                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                <code>
                    <span><<span>dropzone
                        url="route('admin.photos.store', $product->slug)"
                        delete-url=" route('admin.photos.destroy', [$product->slug, '']) "
                        delete-modal-message="هل تريد حذف هذه الصورة"
                        :old-values=" $product->images "
                        storage-link=" asset('storage/') "
                        :max-size="1"
                        :max-files="2"
                        redirect-link=" route('admin.products.index') "
                        >
                    <span><<span>dropzone>
                </code>      
            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <dropzone
                url="/"
                delete-url="/"
                delete-modal-message="هل تريد حذف هذه الصورة"
                storage-link="/"
                :max-size="1"
                :max-files="2"
                redirect-link="/"
                >
            </dropzone>
        </div>
    </div>
@endsection
