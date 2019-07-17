@extends('layouts.frontend')

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    @section('content')
    {{--  {{ Auth::user()->name }}  --}}
    

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">

        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel" >
            @foreach ($artikel as $data)
                <!-- Single Slide -->
                <div class="single-hero-slide bg-img background-overlay"><img class="background-image" src="../assets/img/artikel/{{$data->foto}}"> </div>
            @endforeach
        </div>

        <!-- Hero Post Slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                            <!-- Single Slide -->
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($artikel as $data)
                            
                            <div class="single-slide d-flex align-items-center">
                                <div class="post-number">
                                    <p>{{ $no++ }}</p>
                                </div>
                                <div class="post-title">
                                    <a href="/index/blog/{{$data->slug}}">{{ $data->judul }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="world-latest-articles">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="title">
                                <h5>Latest Articles</h5>
                            </div>
    
                            <div id="isinya">
    
                            </div>
                        </div>
    
                        <div class="col-12 col-lg-4">
    
                            <!-- Kategori Semua -->
                            <div class="sidebar-widget-area">
                                    <h5 class="title">Kategori</h5>
                                    <div class="widget-content" id="kategori">
                                        
                                    </div>
                            </div>
    
                            <!-- Semua Tag -->
                            <div class="sidebar-widget-area">
                                    <h5 class="title">Tag</h5>
                                    <div class="widget-content" id="tag">
                                        
                                    </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection

    

  