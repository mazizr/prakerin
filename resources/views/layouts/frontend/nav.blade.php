<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html"><b class="napbarteks">YURIZA</b></a>
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