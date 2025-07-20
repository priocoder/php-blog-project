<?php include 'inc/header.php';?>
<?php 
    if (!isset($_GET['id']) || $_GET['id'] == NULL) {
        ob_start();
        echo "<script>window.location = '404.php';</script>";
        ob_end_flush(); // Flush the output buffer and send headers
        exit; // Exit script execution
        }  else {
            $id = $_GET['id'];
    }
?>
<!-- Main content start -->
<div class="main_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-xl-8 col-xxl-8">
                <!-- Main tontent -->
                <div class="main_content">
                    <?php
                        $query = "SELECT * FROM tbl_post where id='$id'";
                        $post = $db->select($query);
                        if ($post) {
                            while ($result = $post->fetch_assoc()) {
                    ?>
                    <h3><?php echo $result['title']; ?></h3>
                    <div class="container-fluid">
                        <h4>
                            <?php echo $fm->formatDate($result['time']); ?> By <a href="#"><?php echo $result['author']; ?></a>
                        </h4>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 ">
                                <img class="w-100" src="admin/<?php echo $result['image']; ?>" alt="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 ">
                                <p class="text-justify"><?php echo $result['body']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main tontent -->

                <!-- Related post -->
                <div class="related_post">
                    <div class="row">
                        <?php
                            $catid = $result['cat']; 
                            $queryrelated = "SELECT * FROM tbl_post where cat='$catid' order by rand() limit 3";
                            $relatedpost = $db->select($queryrelated);
                            if ($relatedpost) {
                            while ($rresult = $relatedpost->fetch_assoc()) {
                        ?>
                        <div class="col-2 pb-4">
                            <a href="post.php?id=<?php echo $rresult['id']; ?>">
                                <img src="admin/<?php echo $rresult['image']; ?>" alt="img">
                            </a>
                        </div>
                    <?php } }else { echo "No Related Post Available !!";} ?>
                    </div>
                </div>
                <!-- Related post -->
                <?php } } else {
                    ob_start();
                    echo "<script>window.location = '404.php';</script>";
                    ob_end_flush(); // Flush the output buffer and send headers
                    exit; // Exit script execution
                    }
                ?> 
            </div>
<?php include'inc/sidebar.php';?>                   
<?php include 'inc/footer.php'; ?>