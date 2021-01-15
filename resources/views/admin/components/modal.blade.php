@extends('admin.layouts.app')
<!-- SEO and Breadcrumb Section -->
@section('page.title', 'Modal')
<!-- Main content Section -->
@section('content')
    <!-- Main Card -->
    <div class="card main-card">
        <!-- Main Content -->
        <div class="card-content">
            <!-- Instructions -->
            <h1 class="has-text-black is-size-4 has-text-weight-bold">Modals</h1>
            <p>A classic modal overlay, in which you can include any content you want</p>
            <p>Credits to Modal FX (
                <a class="has-text-link" href="https://postare.github.io/bulma-modal-fx/">https://postare.github.io/bulma-modal-fx/</a>
                ) . We converted it to VUE Component
            </p>
            <div class="columns">
                <div class="column is-6">
                    <strong>Available animations</strong>
                    <ul class="list-disc is-list">
                        <li>modal-fx-slideRight</li>
                        <li>modal-fx-slideLeft</li>
                        <li>modal-fx-slideTop</li>
                        <li>modal-fx-slideBottom</li>
                        <li>modal-fx-fall</li>
                        <li>modal-fx-slideFall</li>
                        <li>modal-fx-newsPaper</li>
                        <li>modal-fx-3dFlipVertical</li>
                        <li>modal-fx-3dFlipHorizontal</li>
                        <li>modal-fx-3dSign</li>
                        <li>modal-fx-3dSignDown</li>
                        <li>modal-fx-superScaled</li>
                        <li>modal-fx-3dSlit</li>
                        <li>modal-fx-3dRotateFromBottom</li>
                        <li>modal-fx-3dRotateFromLeft</li>
                        <li>modal-fx-superScaled</li>
                        <li>modal-pos-top modal-fx-3dSign</li>
                        <li>modal-pos-bottom modal-fx-3dSignDown</li>
                    </ul>
                </div>
                <div class="column is-6">
                    <strong>Component Props</strong>
                    <ul class="list-disc is-list">
                        <li>animation</li>
                        <li>button-classes</li>
                        <li>modal-classes</li>
                        <li>button-text</li>
                        <li>button-icon</li>
                    </ul>
                </div>
            </div>
            <!-- Code -->
            <pre class="mt-4" dir="ltr">
                <code>
                    <span><</span>modal animation="modal-fx-slideTop" button-classes="" modal-classes="" button-text="" button-icon="">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae cum enim quisquam ducimus, facilis,
                        esse
                        nesciunt porro,
                        officiis totam veniam libero! Nisi hic vel aspernatur doloremque enim ut blanditiis perferendis,
                        repudiandae
                        assumenda quibusdam delectus quam eum non maxime ullam quod qui ab in dolorem dolores vero amet!
                        Perferendis
                        incidunt unde blanditiis harum vel velit, accusantium praesentium autem ut voluptas, voluptatibus
                        fugiat.
                        Molestiae maiores aspernatur expedita, magnam commodi suscipit explicabo labore temporibus tenetur
                        distinctio
                        mollitia facere eum ad officia? Sit eaque culpa ea saepe facilis. Consequatur, architecto. Optio eveniet
                        cupiditate accusantium vero consectetur, maiores eum culpa assumenda reprehenderit sequi aut nihil!
                    <span><</span>modal>
                </code>      
            </pre>
            <!-- Demo -->
            <h2 class="mb-3 has-text-black has-text-weight-bold">Example</h2>
            <modal animation="" button-classes="" modal-classes="" button-text="Open Modal" button-icon="">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae cum enim quisquam ducimus, facilis,
                esse
                nesciunt porro,
                officiis totam veniam libero! Nisi hic vel aspernatur doloremque enim ut blanditiis perferendis,
                repudiandae
                assumenda quibusdam delectus quam eum non maxime ullam quod qui ab in dolorem dolores vero amet!
                Perferendis
                incidunt unde blanditiis harum vel velit, accusantium praesentium autem ut voluptas, voluptatibus
                fugiat.
                Molestiae maiores aspernatur expedita, magnam commodi suscipit explicabo labore temporibus tenetur
                distinctio
                mollitia facere eum ad officia? Sit eaque culpa ea saepe facilis. Consequatur, architecto. Optio eveniet
                cupiditate accusantium vero consectetur, maiores eum culpa assumenda reprehenderit sequi aut nihil!

            </modal>
        </div>
    </div>
@endsection
