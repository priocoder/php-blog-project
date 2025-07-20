<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
    if (!isset($_GET['category']) || $_GET['category'] == NULL) {
        ob_start();
        echo "<script>window.location = '404.php';</script>";
        ob_end_flush(); // Flush the output buffer and send headers
        exit; // Exit script execution
        }  else {
            $id = $_GET['category'];
    }
?>
<!-- Main content start -->
<div class="main_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-xl-8 col-xxl-8">
                <?php
                    $query = "SELECT * FROM tbl_post where cat='$id'";
                    $post = $db->select($query);
                    if ($post) {
                        // Start while loop
                        while ($result = $post->fetch_assoc()) {
                ?>
                <!-- Main content -->
                <div class="main_content">
                    <h3>
                        <a href="post.php?id=<?php echo $result['id']; ?>">
                            <?php echo $result['title']; ?>
                        </a>
                    </h3>
                    <div class="container-fluid">
                        <h4>
                            <?php echo $fm->formatDate($result['time']); ?> By 
                            <a href="#">
                                <?php echo $result['author']; ?>
                            </a>
                        </h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="#">
                                    <img src="admin/<?php echo $result['image']; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-justify">
                                    <?php echo $fm->textShorten($result['body']); ?>
                                        
                                </p>
                                <a href="post.php?id=<?php echo $result['id']; ?>">
                                    <button>Read More</button>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- Main content -->
                <?php } ?>
                <!-- End while loop -->
                <?php } else { 
                        echo "<span class='error'>No data available !</span>";
                    } 
                ?>
            </div>
<?php include'inc/sidebar.php';?>            
<?php include'inc/footer.php'; ?>