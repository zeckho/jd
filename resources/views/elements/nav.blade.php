<header>
    <!-- Navigation -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Achmad Joko Priyono</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tcpdf
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('firstPage') }}">First Page</a>
                            <a class="dropdown-item" href="{{ route('secondPage') }}">Second Page</a>
                            <a class="dropdown-item" href="{{ route('downloadPDF') }}">Download PDF</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Commerce
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('products') }}">Products</a>
                        </div>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <a href="{{ route('carts') }}" class="btn btn-outline-success my-2 my-sm-0">{{ $totCart }}<i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
        
    </nav> --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
        <a class="navbar-brand" href="#">achmadjp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tcpdf
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('firstPage') }}">First Page</a>
                        <a class="dropdown-item" href="{{ route('secondPage') }}">Second Page</a>
                        <a class="dropdown-item" href="{{ route('downloadPDF') }}">Download PDF</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Commerce
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('products') }}">Products</a>
                        <a class="dropdown-item" href="{{ route('carts') }}">Carts</a>
                    </div>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <a href="{{ route('carts') }}" class="btn btn-outline-success my-2 my-sm-0">{{ $totCart }}<i class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
    </nav>
</header>