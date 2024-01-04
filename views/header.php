<!DOCTYPE html>
<html>
<head>
    <title> BuyLand </title>
    <meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/uikit.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
        <script src="https://js.paystack.co/v1/inline.js"></script>
        
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
          <link rel="stylesheet" href="<?php echo URL; ?>public/css/icons.css">
          <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css">
          <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.min.css">
          <link rel="stylesheet" href="<?php echo URL; ?>public/css/hoogpay.css">

          <link href="<?php echo URL; ?>public/images/favicon.png" rel="icon" type="image/png">

    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.3.min.js"></script>
    <?php
    if (isset($this->js))
    {
        foreach ($this->js as $js)
        {
            echo ' <script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }

    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <script src="<?php echo URL; ?>public/js/tippy.all.min.js"></script>
   <script src="<?php echo URL; ?>public/js/uikit.js"></script>
   <script src="<?php echo URL; ?>public/js/simplebar.js"></script>
   <script src="<?php echo URL; ?>public/js/custom.js"></script>
   <script src="<?php echo URL; ?>public/js/bootstrap-select.min.js"></script>
   <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
   <script src="https://kit.fontawesome.com/9072ac7c6b.js" crossorigin="anonymous"></script>





</head>
<body>

<div id="header" class="header">


</div>
<div id="content">


