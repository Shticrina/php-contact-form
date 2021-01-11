
<header id="myheader" class="py-3 text-center text-info mb-4 bg-dark">
    <!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-light" href="<?php echo strpos($_SERVER['HTTP_HOST'], 'pages') == false ? '..' : '.'; ?>/index.php">Logo</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColorLight" aria-controls="navbarColorLight" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarColorLight">
            <ul class="navbar-nav nav-carousel">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo strpos($_SERVER['HTTP_HOST'], '/pages/') == false ? '.' : '..'; ?>/index.php" data-abc="true">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo strpos($_SERVER['HTTP_HOST'], '/pages/') == false ? './pages' : '.'; ?>/contact_us.php">Contact us</a>
                </li>
            </ul>

            <h2 class="">PHP Project</h2>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- if connected -->
    <h4 class="hello text-light font-italic d-none">Hello <span class="text-capitalize" id="username">Nickname</span>!</h4>
</header>