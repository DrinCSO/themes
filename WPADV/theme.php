<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My awesome theme</title>
    <?php wp_head();?>
    
</head>

    <?php
        if( is_front_page());
            $awesome_classes = array('ds-class', 'my-ds-class');
        else():
            $awesome_classes = array('no-ds-class');
        endif;
    ?>
<body <?php  body_class( $awesome_classes);?>>
        <?php wp_nav_menu(array('theme_location' => 'primary'));?>
</body>
</html>