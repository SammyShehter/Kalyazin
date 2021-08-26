<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');?></title>
    <?php
        wp_head();
    ?>
</head>
<body>
<header>
<div class="main">
    <h5 class="logo">Калязин</h5>
    <a class="mobile-menu-call flex-center" href="#/"><i class="material-icons">menu</i></a> 
    <?php 
        wp_nav_menu( [
            'theme_location'    =>  'header-custom-menu',
            'container'         =>  'div',
		    'container_class'   =>  'top-navigation',
		    'menu_class'        =>  'menu main-menu',
		    'items_wrap'        =>  '<ul id="%1$s" class="%2$s">%3$s</ul>',
		    'depth'             =>  10
        ] ) 
    ?>
    </div>
</div>
</header>