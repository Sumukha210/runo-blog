<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>


<?php
$pageName = "";
if (is_front_page()) {
    $pageName = "frontPage";
} elseif (is_page("about")) {
    $pageName = "about";
} elseif (is_home()) {
    $pageName = "articles";
} elseif (is_page("contact")) {
    $pageName = "contact";
}
?>

<body class="<?php body_class() ?>" data-pagename="<?php echo $pageName ?>">

    <!-- navbar -->
    <?php get_template_part("template-parts/header/navbar") ?>

    <div class="content">