<!-- resources/views/layouts/header.blade.php -->

<header class="header_area sticky-header">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{ route('promote.index') }}">
            <img src="{{ asset('promote/img/icon/mekar logo white.png') }}" width="60px" height="60px" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="nav-item submenu">
                <a class="nav-link" href="{{ route('promote.index') }}">Home</a>
              </li>
              <li class="nav-item submenu">
                <a href="{{ route('promote.menu') }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true"
                  aria-expanded="false">MENU</a>
              </li>
              <li class="nav-item submenu">
                <a href="{{ route('promote.promotion') }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true"
                  aria-expanded="false">PROMOTION</a>
              </li>
              <li class="nav-item submenu">
                <a href="{{ route('promote.gallery') }}" class="nav-link dropdown-toggle" role="button" aria-haspopup="true"
                  aria-expanded="false">GALLERY</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <button class="search" id="search">
                  <svg xmlns="http://www.w3.org/2000/svg" style="color: #fff; transition: color 0.3s ease" width="16"
                    height="16" fill="currentColor" class="bi bi-search" onmouseover="this.style.color='#ffd45f'"
                    onmouseout="this.style.color='#fff'" viewBox="0 0 16 16">
                    <path
                      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                    />
                  </svg>
                </button>
              </li>
              <li class="nav-item">
                <a href="{{ route('promote-w.indexw') }}">
                  <button class="swop" onclick="toggleBackgroundColor()">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color: #fff; transition: color 0.3s ease" width="16"
                      height="16" fill="currentColor" class="bi bi-sun-fill" onmouseover="this.style.color='#ffd45f'"
                      onmouseout="this.style.color='#fff'" viewBox="0 0 16 16">
                      <path
                        d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"
                      />
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
        <form class="d-flex justify-content-between" action="{{ route('promote.search') }}" method="get">
          <input type="text" class="form-control" name="keyword" id="search_input" placeholder="Search Here" />
          <button type="submit" class="btn"></button>
          <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
      </div>
    </div>
  </header>
