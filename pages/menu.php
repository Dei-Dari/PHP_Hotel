<!--<ul class="nav nav-pills nav-justified">
    <li <?php echo ($page == 1) ? "class='active'" : "" ?>>
        <a href="index.php?page=1">Tours</a>
    </li>
    <li <?php echo ($page == 2) ? "class='active'" : "" ?>>
        <a href="index.php?page=2">Comments</a>
    </li>
    <li <?php echo ($page == 3) ? "class='active'" : "" ?>>
        <a href="index.php?page=3">Registration</a>
    </li>
    <li <?php echo ($page == 4) ? "class='active'" : "" ?>>
        <a href="index.php?page=4">Admin Forms</a>
    </li>
    <?php

    if (isset($_SESSION['radmin'])) {
        if ($page == 6)
            $c = 'active';
        else
            $c = '';
        echo '<li class="' . $c . '"><a href="index.php?page=6">Private</a></li>';
    }
    ?>
</ul>-->

<nav class="nav nav-pills nav-justified">
    <?php
    if (isset($_SESSION['ruser']) || isset($_SESSION['radmin'])) {
    ?>
        <a class="nav-link <?php echo ($page == 1) ? "active" : "" ?>" href="index.php?page=1">Tours</a>
        <!--<a class="nav-link <?php echo ($page == 2) ? "active" : "" ?>" href="index.php?page=2">Comments</a>-->
    
    <?php
    }
    else {
    ?>
    <a class="nav-link <?php echo ($page == 3) ? "active" : "" ?>" href="index.php?page=3">Registration</a>
    <?php
    }
    if (isset($_SESSION['radmin'])) {
        ?>
        <a class="nav-link <?php echo ($page == 4) ? "active" : "" ?>" href="index.php?page=4">Admin Forms</a>
        <a class="nav-link <?php echo ($page == 6) ? "active" : "" ?>" href="index.php?page=6">Private</a>
    <?php
    }
    ?>


</nav>

