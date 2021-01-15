@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Uploader')
    <!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Uploader & Uploader Repeater</h1>
            <p>Uploader : file Uploader Vue Component (single file and multiple files )</p>
            <p>Uploader Repeater : file Uploader Vue Component with a repeater (another way for multiple images)</p>
            <div class="columns">
                <div class="column is-6">
                    <strong>Uploader Component Props</strong>
                    <ul class="list-disc is-list">
                        <li>classes (optional)</li>
                        <li>name (Required)</li>
                        <li>file (optional: if Edit mode to show Existing image)</li>
                        <li>files (optional: if Edit mode to show Existing images if multiple only)</li>
                        <li>is-multiple (optional : if multiple only)</li>
                        <li>add-icon (optional)</li>
                        <li>edit-icon (optional)</li>
                        <li>label (optional)</li>
                        <li>accept (optional : default=>image )
                            <p>it's an array you can choose from the existing types</p>
                            <ul class="list-disc is-list">
                                <li>image</li>
                                <li>file</li>
                                <li>video</li>
                                <li>audio</li>
                                <li>pdf</li>
                                <li>word</li>
                                <li>excel</li>
                                <li>zip</li>
                                <li>ppt</li>
                                <li>doc => must write the doc-types on your own</li>
                            </ul>
                        </li>
                        <li>doc-typs (optional : only used when the type is doc and then you can type the doc types on your
                            own)</li>
                        <li>max-size (optional)</li>
                    </ul>
                </div>
                <div class="column is-6">
                    <strong>Uploader Component Props</strong>
                    <ul class="list-disc is-list">
                        <li>classes (optional)</li>
                        <li>name (Required)</li>
                        <li>add-icon (optional)</li>
                        <li>edit-icon (optional)</li>
                        <li>label (optional)</li>
                        <li>accept (optional : default=>image )
                            <p>it's an array you can choose from the existing types</p>
                            <ul class="list-disc is-list">
                                <li>image</li>
                                <li>file</li>
                                <li>video</li>
                                <li>audio</li>
                                <li>pdf</li>
                                <li>word</li>
                                <li>excel</li>
                                <li>zip</li>
                                <li>ppt</li>
                                <li>doc => must write the doc-types on your own</li>
                            </ul>
                        </li>
                        <li>doc-typs (optional : only used when the type is doc and then you can type the doc types on your
                            own)</li>
                        <li>max-size (optional)</li>
                        <li>photos (optional: if Edit mode to show Existing image)</li>
                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                /*========Single File=======*/
                <code>
                    <span><</span>uploader label="اختر صورة" name="image"  file=""><span><</span>/uploader>
                </code>
                /*========Multiple Files=======*/
                <code>
                    <span><</span>uploader label="اختر صورة" name="image" :is-multiple="true" files="[]"><span><</span>/uploader>
                </code>
                /*========Repeater Single File=======*/
                <span><</span>multiple-uploader label="اختر صورة" name="image" ><span><</span>/multiple-uploader>

            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <uploader label="اختر صورة" name="image"></uploader>
            <hr/>
            <uploader label="اختر صورة" name="image" :is-multiple="true"></uploader>
            <hr/>
            <multiple-uploader label="اختر صورة" name="image" ></multiple-uploader>
        </div>
    </div>
@endsection
