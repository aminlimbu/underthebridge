<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-2">
    <!-- brand -->
    <div class="container-fluid">
            <a href="<?php echo URLROOT;?>" class="navbar-brand">Unter The Bridge</a>
            <!-- menu toggler -->
            <button class="navbar-toggler ms-auto"
                type="button"
                data-bs-target="#navbarNav"
                data-bs-toggle="collapse"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-lable="Toggle Navbar"
                >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a class="nav-link text-light" href="<?php echo URLROOT . '/Blogs';?>">Blogs</a>
                    <a class="nav-link text-light" href="#">About</a>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="" class="nav-link text-light">
                        <?php echo 'Welcome ' . ucwords($_SESSION['user_name']);?></a>
                        <a href="<?php echo URLROOT . '/users/logout';?>" class="nav-link text-light">Logout</a>
                    <?php else: ?>
                    <a class="nav-link text-light" href="<?php echo URLROOT . '/users/login';?>">Login</a>
                    <?php endif;?>
                    <a class="nav-link text-light" href="#"></a>
                </ul>
            </div>    
    </div>
</nav>