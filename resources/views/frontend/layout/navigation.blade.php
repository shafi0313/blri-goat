
<nav class="navbar navbar-expand-lg">
    <div class="container">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-left"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Services <i class="fas fa-chevron-down"></i> </a>
                    <ul>
                        <li><a href="#">Services 1</a></li>
                        <li><a href="#">Services 2</a></li>
                        <li><a href="#">Services 3</a></li>
                        <li><a href="#">Services 4</a></li>
                    </ul>
                </li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div class="col"></div>


            <div class="header-info d-flex align-items-center">
                {{-- <div class="header-search">
                    <span> <i class="fab fa-skype"></i> </span>
                </div> --}}
                <div class="header-search">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="header-call clearfix d-flex">
                    <div class="header-call-icon float-left mr-3 h-100">
                        <span> <i class="fas fa-phone-volume"></i> </span>
                    </div>
                    <div class="header-call-info">
                        <span class="">Tel</span>
                        <a class="" href="tel:+15143125678">+88 01720 000000</a>
                    </div>
                </div>
                <div class="header-button">
                    <a href="#" class="btn btn-primary" style="width: 200px">Login</a>
                </div>
            </div>

        </div>
    </div>
</nav>
