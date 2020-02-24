<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name') ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-red"><?php bloginfo('name') ?></h1>
            <h5><?php bloginfo('description') ?></h5>
        </div>
    </div>
</div>

<header>
    <?php wp_nav_menu(); ?>
</header><br>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <!-- <?php the_post(); ?> -->
                        <div class="container text-left">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            Writen by <?php the_author(); ?> Date<?php the_date(); ?><br><br>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif ?>
                            <br>
                            <?php
                                    $caters = get_the_category();
                                    $output = "";
                                    if ($caters) {
                                        foreach ($caters as $cater) {
                                            $output = '<a href="' . get_category_link($cater->term_id) . '">' . $cater->cat_name . '<a>';
                                        }
                                    }
                                    echo $output;
                                    ?>
                            <div class="row mt-5">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif ?>
                <footer class="red">
                    <?php bloginfo('name')?>
                    <?php bloginfo('description')?>
                </footer>
            </div>
        </div>
    </div>

</body>

</html>