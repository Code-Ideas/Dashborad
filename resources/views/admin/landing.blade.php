<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الرئيسية')
<!-- Start Content Section -->
@section('content')
    <header class="hero is-fullheight">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <header class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <span class="navbar-burger" data-target="navbarMenuHeroC">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroC" class="navbar-menu">
                        <div class="navbar-end">
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="mb-6 title has-text-white is-size-1">
                    ابدأ
                    <img class="your-text" src="{{ asset('/admin/img/illustrations/project.svg') }}" alt="">
                    الأن
                </h1>
                <div>
                    <a href="{{ route('login_form') }}" class="ml-6 button is-link is-rounded is-medium">لوحة التحكم</a>
                    <a href="{{ route('landing') }}" class="button is-white is-rounded is-medium">الرئيسية</a>
                </div>
                <figure class="mt-6">
                    <img src="{{ asset('/admin/img/illustrations/hero-img.svg') }}" alt="">
                </figure>
                <p class="mt-5"> CopyRights Reserved CodeIdeas 2021</p>
            </div>
        </div>
    </header>
@endsection<!-- End Content Section -->
