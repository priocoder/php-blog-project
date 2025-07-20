<?php include 'inc/header.php'; ?>
<div class="main_wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<?php
					if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
						ob_start();
						echo "<script>window.location = 'index.php';</script>";
						ob_end_flush(); // Flush the output buffer and send headers
						exit; // Exit script execution
					} else {
						$id = $_GET['pageid'];
					} 
				?>
				<?php
					$query = "select * from tbl_pages where id='$id' "; 
					$pages = $db->select($query);
					if ($pages) {
						while ($result = $pages->fetch_assoc()) {
				?> 
				<div class="main_content">
					<h3><?php echo $result['name']; ?></h3>
					<hr>
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="#">
                                    <img src="admin/<?php echo $result['image']; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-justify"><?php echo $fm->textShorten($result['body'],200); ?></p>
                                <a href="pagepost.php?id=<?php echo $result['id']; ?>"><button>Read More</button></a><!--work the section-->
                            </div>
                        </div>
                    </div>
				</div>
				<?php   }  } else {
	                    ob_start();
	                    echo "<script>window.location = '404.php';</script>";
	                    ob_end_flush(); // Flush the output buffer and send headers
	                    exit; // Exit script execution
	                }
	            ?>
			</div>
			<?php include 'inc/sidebar.php'; ?>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>