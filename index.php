<?php
    // set headers to not cache a page
    header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");// Date in the past
    // or, if you DO want a file to cache, use:
    header("Cache-Control: max-age=2592000"); 
    // 30days (60sec * 60min * 24hours * 30days)
?>
<?php
    include 'inc/header.php';
    include 'inc/slider.php';
?>
<!-- Main content start -->
<div class="main_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-xl-8 col-xxl-8">
                <!-- Pagination calculation -->
                <?php
                    // 3 posts per page, calculate starting position
                    $per_page = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                     } else {
                        // If page number not set in URL, default to page 1
                        $page = 1;
                     }
                     $start_form = ($page-1) * $per_page;
                ?>

                <?php
                    // Fetch posts from tbl_post table with pagination, ordered by latest first 
                    $query = "SELECT * FROM tbl_post order by id desc limit $start_form, $per_page";
                    $post = $db->select($query);
                    if ($post) {
                        // Loop through each post and display them
                        while ($result = $post->fetch_assoc()) {
                ?>
                <div class="main_content" data-aos="slide-up">
                    <!-- title start and open post section start-->
                    <h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
                    <!-- title start and open post section close -->
                    <div class="container-fluid">
                        <h4><?php echo $fm->formatDate($result['time']); ?> By <a href="#"><?php echo $result['author']; ?></a></h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="post.php?id=<?php echo $result['id']; ?>">
                                    <img src="admin/<?php echo $result['image']; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-justify"><?php echo $fm->textShorten($result['body'],250); ?></p>
                                <a href="post.php?id=<?php echo $result['id']; ?>"><button>Read More</button></a>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php } ?>
                <!-- end while loop -->

                <!-- Pagination start -->
                <?php
                    $query = "select * from tbl_post";
                    $result = $db->select($query);
                    $total_rows = mysqli_num_rows($result);
                    $total_pages = ceil($total_rows/$per_page);
                    echo "<span class = 'pagination'><a href = 'index.php?page=1'>".'Frist Page'."</a>";
                    for ($i=1; $i<=$total_pages; $i++) { 
                         echo "<a href ='index.php?page=".$i."'>".$i."</a>";
                     }; 
                    echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>" 
                ?>
                <!-- Pagination close -->
                <?php } else { echo "<span class='error'>No Data Available !</span>";} ?>
            </div>
<?php include'inc/sidebar.php';?>            
<?php include'inc/footer.php'; ?>