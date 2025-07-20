<?php 

    //set headers to not cache a page
    header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    //or, if you DO want a file to cache, use:
    header("Cache-Control: max-age=2592000"); 
    //30days (60sec * 60min * 24hours * 30days)

    // Include classes and files
    include 'config/config.php';
    include 'lib/database.php';
    include 'helpers/format.php';

    // Create object of classes
    $db = new Database();
    $fm = new Format();  

?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'asset/meta.php';?>
    <?php include 'asset/css.php';?>
</head>
<body>  
    <!-- Header area -->        
    <div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 col-sm-6 col-md-6 col-xl-6 col-xxl-6">
                    <div class="header_left">
                        <?php
                            $query = "select * from title_slogan where id ='1' "; 
                            $blog_title = $db->select($query);
                            if ($blog_title) {
                                 while ($result = $blog_title->fetch_assoc()) {
                        ?>
                        <div class="brand_img">
                            <a href="index.php?id=<?php echo $result['id']; ?>">
                                <img src="admin/<?php  echo $result['logo'];  ?>">
                            </a>
                        </div>
                        <div class="title_slo">
                            <a href="index.php" class="d-none d-sm-block">
                                <h1><?php  echo $result['title'];  ?></h1>
                            </a>
                            <p class="d-none d-sm-block">
                                <?php  echo $result['slogan'];  ?>
                            </p>
                        </div>
                        <?php  }  }  ?>
                    </div>
                </div>
                <div class="col-8 col-sm-6 col-md-6 col-xl-6 col-xxl-6">
                    <div class="header_right">
                        <?php // Query for social media from tbl_sc 
                            $query = "select * from tbl_sc where id ='1' "; 
                            $blog_sc = $db->select($query);
                            if ($blog_sc) {
                                while ($result = $blog_sc->fetch_assoc()) {
                        ?>
                        <a class="" href="<?php  echo $result['fb'];  ?>">
                            <i class="bx bxl-facebook"></i>
                        </a>
                        <a class="" href="<?php  echo $result['tw'];  ?>">
                            <i class="bx bxl-twitter"></i>
                        </a>
                        <a class="" href="<?php  echo $result['ln'];  ?>">
                            <i class="bx bxl-linkedin"></i>
                        </a>
                        <a class="" href="<?php  echo $result['ins'];  ?>">
                            <i class="bx bxl-instagram-alt"></i>
                        </a>
                    <?php  }  }  ?>
                    </div>
                    <div class="search-section d-none d-sm-block">
                        <form class="d-flex" role="search" action="search.php" method="get">
                            <input name="search" class="form-control me-2" type="search" placeholder="Search Keyword..." aria-label="Search">
                            <button name="submit" class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header area -->

    <!-- Navbar section -->            
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                <ul class="navbar-nav">

                    <?php // this lines for active page
                        $path = $_SERVER['SCRIPT_FILENAME'];
                        $currentpage = basename($path, '.php');
                    ?>
                    <li class="nav-item">
                        <a <?php if ($currentpage == 'index') { echo 'id="active"'; } ?>
                         style="padding-bottom: 0;" class="nav-link" href="index.php">Home</a>
                    </li>
                    <!--dynamic page create section start-->
                        <?php
                            $query = "select * from tbl_pages order by id desc"; 
                            $pages = $db->select($query);
                            if ($pages) {
                                 while ($result = $pages->fetch_assoc()) {
                        ?>
                        <a
                        <?php
                        if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) {
                            echo 'id="active"';
                         } 
                        ?>
                         style="padding-bottom: 0; color: #fff" class="nav-link" href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
                        <?php } } ?>
                    <!--dynamic page create section close-->
                    <li style="padding-bottom: 0;" class="nav-item">
                        <a <?php if ($currentpage == 'contact') { echo 'id="active"'; } ?> class="nav-link" href="https://priocoder.xyz/contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown d-block d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                            <?php
                                $query = "select * from  tbl_category";
                                $category = $db->select($query);
                                if ($category) {
                                    while ($result = $category->fetch_assoc()) {
                            ?>
                                <a class="dropdown-item" href="posts.php?category=<?php echo $result['id']; ?>">
                                    <?php echo $result['name']; ?>
                                </a>
                                
                            <?php  }  } else {
                                    echo "There are no categories here!";
                                } 
                            ?>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown d-block d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Latest Article
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php
                                    $query = "select * from tbl_post order by id desc limit 2";
                                    $post = $db->select($query);
                                    if ($post) {
                                    while ($result = $post->fetch_assoc()) {
                                ?>
                                <a class="dropdown-item" href="post.php?id=<?php echo $result['id']; ?>">
                                    <?php echo $fm->textShorten($result['title'],35); ?>
                                </a>
                                <?php  }  } else {
                                        echo "There are no latest article here!";
                                    } 
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="mobile-search pb-1 d-block d-sm-none">
                <form class="d-flex" role="search" action="search.php" method="get">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search Keyword..." aria-label="Search">
                    <button name="submit" class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar section -->