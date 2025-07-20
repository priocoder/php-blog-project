<meta charset="uft-8">
    <meta name="language" content="English">
    <meta name="Description" content="Discover the best blogging tips, tools, and strategies to grow your audience and create engaging content. Perfect for beginners and experts alike!">
<?php
    if (isset($_GET['id'])) {
        $keywordid = $_GET['id'];
        $query = "SELECT * FROM tbl_post where id='$keywordid' "; 
        $keywords = $db->select($query);
        if ($keywords) {
            while ($result = $keywords->fetch_assoc()) {    ?>
    <meta name="Keywords" content="<?php echo $result['tags']; ?>">
        <?php   }   }   } else{ ?>
    <meta name="Keywords" content="<?php echo KEYWORDS; ?>">
<?php   }   ?>
    <meta name="Author" content="Jahirul islam">
<!-- This line for respoonsive any browser -->     
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- side title -->
<?php
    if (isset($_GET['pageid'])) {
        $pagetitleid = $_GET['pageid'];
        $query = "SELECT * from tbl_pages where id='$pagetitleid' "; 
        $pages = $db->select($query);
        if ($pages) {
            while ($result = $pages->fetch_assoc()) {?>
    <title><?php echo $result['name']; ?>-<?php echo Title;?></title>

<?php  }  }  }  elseif (isset($_GET['id'])) {
        $postid = $_GET['id'];
        $query = "SELECT * from tbl_post where id='$postid' "; 
        $posts = $db->select($query);
        if ($posts) {
            while ($result = $posts->fetch_assoc()) {?>
    <title><?php echo $result['title']; ?>-<?php echo Title;?></title>
<?php  }  }  } else{ ?>
    <title><?php echo $fm->title(); ?>-<?php echo Title;?></title>
<?php } ?>
<!-- brand logo section -->
<?php
    $query = "select * from title_slogan where id ='1' "; 
    $blog_title = $db->select($query);
    if ($blog_title) {
         while ($result = $blog_title->fetch_assoc()) {
?>
<link rel="icon" href="admin/<?php  echo $result['logo'];  ?>">
<?php  }  } ?>