<!-- brand icon link -->        
    <link rel="icon" href="#">

<!-- boxicon icon cdn link -->    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!-- font awesome cdn link -->        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- bootstrap cdn link -->        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />

<!-- bootstrap icon link-start -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<!-- This line for js animate cdn -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
<!-- style.css link -->        
    <link rel="stylesheet"  href="inc/style.css"/>
    
<?php
    $query = "SELECT * FROM tbl_theme where id='1'";
    $themes = $db->select($query);
    while ($result = $themes->fetch_assoc()) {
        if ($result['theme'] == 'defolt') { ?>
    <link rel="stylesheet"  href="theme/defolt.css"/>
        <?php }elseif($result['theme'] == 'green'){ ?>
    <link rel="stylesheet"  href="theme/green.css"/>
        <?php } elseif($result['theme'] == 'lightblue'){ ?>
    <link rel="stylesheet"  href="theme/lblue.css"/>
<?php  }  }  ?> 