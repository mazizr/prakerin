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
<div class="hero-area height-600 bg-img background-overlay" style="background-image: url({{asset('assets/img/artikel/' .$artikel->foto)}});">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="single-blog-title text-center">
                    <!-- Catagory -->
                    <div class="post-cta"><a href="/blog-kategori/{{ $artikel->kategori->slug }}"">{{ $artikel->kategori->nama_kategori }}</a></div>
                    <h3>{{ $artikel->judul }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ============= Post Content Area ============= -->
            <div class="col-12 col-lg-8">
                <div class="single-blog-content mb-100">
                    <!-- Post Meta -->
                    <div class="post-meta">
                        <p><a href="#" class="post-author">{{ $artikel->user->name }}</a> on <a href="#" class="post-date">{{ $artikel->created_at }}</a></p>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <h6>{!! $artikel->konten !!}</h6>
                        <!-- Post Tags -->
                        <ul class="post-tags">
                            @foreach ($artikel->tag as $item)
                                <li><a href="/blog-tag/{{ $item->slug}}">{{ $item->nama_tag }}</a></li>
                            @endforeach
                        </ul>
                        <!-- Post Meta -->
                        <div class="post-meta second-part">
                            <p><a href="#" class="post-author">{{ $artikel->user->name }}</a> on <a href="#" class="post-date">{{ $artikel->created_at }}</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========== Sidebar Area ========== -->
            <div class="col-12 col-md-8 col-lg-4">
                <div class="post-sidebar-area mb-100">
                    <!-- Kategori Semua -->
                        <div class="sidebar-widget-area">
                                <h5 class="title">Kategori</h5>
                                <div class="widget-content kategori">
                                        
                                </div>
                        </div>
                        <br>
                        <!-- Semua Tag -->
                        <div class="sidebar-widget-area">
                                <h5 class="title">Tag</h5>
                                <div class="widget-content tag">
                                          
                                </div>
                        </div>

                </div>
            </div>
        </div>
        <div id="disqus_thread"></div>
            <script>
            
            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://yuriza.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    </div>
    
</div>

</div>

@endsection


