<!-- resources/views/layouts/header.blade.php -->

<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('promote.index') }}">
                    <img src="{{ asset('promote/img/icon/mekar logo black.png') }}" width="60px" height="60px" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item submenu">
                            <a class="nav-link" href="{{ route('promote-w.indexw') }}">Home</a>
                        </li>
                        <li class="nav-item submenu">
                            <a href="{{ route('promote-w.menuw') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">MENU</a>
                        </li>
                        <li class="nav-item submenu">
                            <a href="{{ route('promote-w.promotionw') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">PROMOTION</a>
                        </li>
                        <li class="nav-item submenu">
                            <a href="{{ route('promote-w.galleryw') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">GALLERY</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <button class="search" id="search">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="color: #000000; transition: color 0.3s ease" width="16" height="16"
                                    fill="currentColor" class="bi bi-search" onmouseover="this.style.color='#FF8311'"
                                    onmouseout="this.style.color='#000000'" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('promote.index') }}">
                                <button class="swop" onclick="toggleBackgroundColor()">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        style="color: #000; transition: color 0.3s ease" width="16" height="16"
                                        fill="currentColor" class="bi bi-moon-fill"
                                        onmouseover="this.style.color='#FF8311'" onmouseout="this.style.color='#000'"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278" />
                                    </svg>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Search bar -->
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
