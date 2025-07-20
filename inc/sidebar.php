            <div class="col-sm-4 col-md-4 col-xl-4 col-xxl-4 d-none d-md-block">
                <div class="sidebar">
                    <h3>Categories</h3>
                    <div class="sidebar-item">
                        <?php
                            $query = "select * from  tbl_category";
                            $category = $db->select($query);
                            if ($category) {
                                while ($result = $category->fetch_assoc()) {
                        ?>
                        <a href="posts.php?category=<?php echo $result['id']; ?>">
                            <?php echo $result['name']; ?>
                        </a>
                            
                        <?php  }  } else {
                                echo "There are no categories here!";
                            } 
                        ?>
                    </div>
                    
                    <div class="row">
                       <div class="col-12">
                            <h3>Latest Article</h3>
                       </div>
                       <div class="col-12">
                            <div class="letest-article">
                                <div class="row">
                                    <?php
                                        $query = "select * from tbl_post order by id desc limit 2";
                                        $post = $db->select($query);
                                        if ($post) {
                                        while ($result = $post->fetch_assoc()) {
                                    ?>
                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                        <a href="post.php?id=<?php echo $result['id']; ?>">
                                            <img src="admin/<?php echo $result['image']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-xl-8">
                                        <a href="post.php?id=<?php echo $result['id']; ?>">
                                            <?php echo $fm->textShorten($result['title'],35); ?>
                                        </a>
                                        <hr>
                                        <p class="text-justify">
                                            <?php echo $fm->textShorten($result['body'],70);?>        
                                        </p>
                                    </div>
                                    <?php  }  } else { 
                                            header('Location:404.php');
                                            exit;
                                        } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>           
<!-- Main content close -->