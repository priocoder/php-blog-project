<?php 
    include 'inc/header.php'; 
    if (!isset($_GET['id']) || $_GET['id'] == NULL) {
        ob_start();
        echo "<script>window.location = '404.php';</script>";
        ob_end_flush(); // Flush the output buffer and send headers
        exit; // Exit script execution
        } else {
            $id = $_GET['id'];
    }
?>
<!-- Main content start -->
<div class="main_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-xl-8 col-xxl-8">
                <!-- Main content -->
                <div class="main_content">
                    <?php
                        $query = "SELECT * FROM tbl_pages where id='$id'";
                        $privecy = $db->select($query);
                        if ($privecy) {
                            while ($result = $privecy->fetch_assoc()) {
                    ?>
                    <h3><?php echo $result['name']; ?></h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="admin/<?php echo $result['image']; ?>" alt="">
                            </div>
                            <div class="col-sm-8">
                                <p class="text-justify"><?php echo $result['body']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <?php   }   } else {
                        ob_start();
                        echo "<script>window.location = '404.php';</script>";
                        ob_end_flush(); // Flush the output buffer and send headers
                        exit; // Exit script execution
                    }
                ?> 
            </div>
<?php include'inc/sidebar.php';?>                   
<?php include 'inc/footer.php'; ?>