<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Yuriza - Website Artikel</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets/frontend/img/core-img/favicon.ico') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/style.css') }}">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" href="/tampilan"><b class="napbarteks">YURIZA</b></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('blog') }}">Horor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('blog')}}">Misteri</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengetahuan</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('blog') }}">Sejarah</a>
                                        <a class="dropdown-item" href="{{ url('blog') }}">Budaya</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gaya Hidup</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('blog') }}">travelling</a>
                                        <a class="dropdown-item" href="{{ url('blog') }}">ehe</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('about')}}">About</a>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
<div class="hero-area height-600 bg-img background-overlay" style="background-image: url({{asset('assets/img/artikel/' .$artikel->foto)}});">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="single-blog-title text-center">
                    <!-- Catagory -->
                    <div class="post-cta"><a href="#">{{ $artikel->kategori->nama_kategori }}</a></div>
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
                                <li><a href="#">{{ $item->nama_tag }}</a></li>
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
                                <div class="widget-content">
                                        <ul>
                                            @foreach ($kategori as $data)
                                                <li>
                                                    <div class="post-cta"><a href="#">{{ $data->nama_kategori }}</a></div>
                                                    <hr>
                                                </li>
                                            @endforeach
                                        </ul>
                                </div>
                        </div>
                        <br>
                        <!-- Semua Tag -->
                        <div class="sidebar-widget-area">
                                <h5 class="title">Tag</h5>
                                <div class="widget-content" id="tag">
                                        <ul>
                                                @foreach ($tag as $data)
                                                    <li>
                                                        <div class="post-cta"><a href="#">{{ $data->nama_tag }}</a></div>
                                                        <hr>
                                                    </li>
                                                @endforeach
                                        </ul>    
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


    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <a href="#"><img src="{{ asset('assets/frontend/img/core-img/logo.png') }}" alt=""></a>
                        <div class="copywrite-text mt-30">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <ul class="footer-menu d-flex justify-content-between">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Video</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <h5>Subscribe</h5>
                        <form action="#" method="post">
                            <input type="email" name="email" id="eemail" placeholder="Enter your mail">
                            <button type="button"><i class="fa fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('assets/frontend/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/frontend/js/active.js') }}"></script>
    <!-- JS nya Index -->
    <script src="{{ asset('js/frontend.js') }}"></script>

    <script src="{{ asset('js/single-blog.js') }}"></script>

    <script id="dsq-count-scr" src="//yuriza.disqus.com/count.js" async></script>

</body>

</html>