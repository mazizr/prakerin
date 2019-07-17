@extends('layouts.frontend')
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    @section('content')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url({{ asset('assets/frontend/img/blog-img/kategori.jpg') }});"></div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area mb-100">
                        <!-- Catagory Area -->
                        <div class="world-catagory-area">

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <!-- Single Blog Post -->
                                    @foreach ($artikel as $data)
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset('assets/img/artikel/'.$data->foto.'')}}" alt="">
                                            <div class="post-cta"><a href="/blog-kategori/{{ $data->kategori->slug }}">{{ $data->kategori->nama_kategori }}</a></div>
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="/blog/{{ $data->slug }}" class="headline">
                                                <h5>{{ $data->judul }}</h5>
                                            </a>
                                            <p>{!! str_limit($data->konten,50) !!}</p>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="#" class="post-author">{{ $data->user->name }}</a> on <a href="#" class="post-date">{{ $data->created_at }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area">
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <!-- Kategori Semua -->
                            <div class="sidebar-widget-area">
                                    <h5 class="title">Kategori</h5>
                                    <div class="widget-content kategori">
                                        
                                    </div>
                            </div>
    
                            <!-- Semua Tag -->
                            <div class="sidebar-widget-area">
                                    <h5 class="title">Tag</h5>
                                    <div class="widget-content tag">
                                        
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection
