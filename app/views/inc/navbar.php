<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>">
            <?php echo SITENAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
            aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contact us</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])&&$_SESSION['user_type']=='admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/managers/register">Welcome <?php echo $_SESSION['user_type']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/admins/logout">Logout</a>
                </li>
                <?php elseif(isset($_SESSION['user_id'])&&$_SESSION['user_type']=='manager') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/rooms/register">Welcome <?php echo $_SESSION['user_name']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/managers/logout">Logout</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/lodges/showAll">Show lodges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/managers/login">Login</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>