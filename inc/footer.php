<div class="fotter">
    <div class="container-fluid">
        <div class="row">
            <?php
                $query = "select * from tbl_fotter where id ='1' "; 
                $blog_fotter = $db->select($query);
                if ($blog_fotter) {
                    while ($result = $blog_fotter->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="fotter_left">
                    <span><?php  echo $result['copyright'];  ?> <?php echo date('Y'); ?> </span>
                </div>
            </div>
            <div class="col">
                <div class="fotter_right">
                    <a href="index.php?id=<?php echo $result['id']; ?>">Home</a>
                    <?php  }  }  ?>
                    <a href="page.php?pageid=5">Privecy</a>
                    <a href="page.php?pageid=4">about</a>
                    <a href="404.php">Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery cdn link-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" />
    </script>
<!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"/>   
    </script>
<!-- jQuery and Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"/>
    </script>
<!-- jQuery and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    </script>
<!-- This lines for animate script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>  
    <script>
        // data aos function fade, zoom etc
        AOS.init({
            duration: 1000
        });
    </script>           
</body>
</html>