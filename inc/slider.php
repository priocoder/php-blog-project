<!-- Carousel -->
<div id="demo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
            $query = "SELECT * FROM tbl_slider";
            $slider = $db->select($query);
            if ($slider) {
                $active = 'active';
                while ($result = $slider->fetch_assoc()) {
        ?>
        <div class="carousel-item <?php echo $active; ?>">
            <a href="">
                <img src="admin/<?php echo $result['image']; ?>" class="d-block w-100" alt="Slider Image">
            </a>
            <div class="carousel-caption">
                <a href="">
                    <?php echo $result['title']; ?>    
                </a>
            </div>
        </div>
        <?php
            // It is emptied once the active class is implemented
            $active = '';  
                }
            }
        ?>
        <!-- Carousel btn -->
        <a href="#demo" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"> 
            </span>
        </a>
        <a href="#demo" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"> 
            </span>
        </a>
        <!-- Carousel btn -->
    </div> 
</div>
<!-- Carousel -->