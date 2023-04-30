<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark mb-3 " style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL_ROOT; ?>">
            <!-- TODO: fix favicon -->
            <!-- <img src="./img/SVG/br_logo_white_horizontal_logo-cropped.svg" alt="" width="150" height="50"> -->
            <img src="<?php echo NAV_IMAGE ?>" alt="nav brand image" width="150" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo URL_ROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROOT; ?>/pages/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROOT; ?>/artists/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROOT; ?>/artists/register">Register</a>
                </li>

                <!-- TBD what to add here -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> -->

            </ul>
        </div>
    </div>
</nav>