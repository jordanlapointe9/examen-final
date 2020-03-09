<?php 

$args = array(
    'category_name' => 'Atelier',
    'posts_per_page' => 10,
    'orderby' => 'date'
);

//Query des articles de la catégorie : Nouvelles
$queryNouvelles = new WP_Query( $args );

$args = array(
    'post_type'=>'post',
    'posts_per_page' => 10,
    'order' => 'ASC',
    'post_status' => 'future'
);

//Query des articles de la catégorie : Nouvelles
$queryEvenementsFutur = new WP_Query( $args );

//Appel du header
get_header();

?>

<div id="primary" class="content-area">
    <!-- Figure qui controle la cadre de l'image de mise en avant -->
    <figure class="figure-post-thumbnail">
        <!-- Appel de la fonction qui affiche l'image de mise en avant -->
        <?php examen_final_post_thumbnail(); ?>
    </figure>

	<main id="main" class="site-main">
        <?php
        // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) : the_post(); 
        ?>

        <!--
        <div class="entry-content-page">
            Page Title
            <h1 class="entry-title"><?php //the_title(); ?></h1> 
            
            Page Content
            <?php //the_content(); ?>
        </div>
        -->

        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query.
        ?>

        <?php
        echo '<h1>Nos ateliers :</h1>';
        echo '<div class="categories-container">';
            while ( $queryNouvelles->have_posts() ) {
                $queryNouvelles->the_post();
                echo '
                
                <article class="categories-ateliers">
                    <div class="content-post">
                        <h3 class="title-article"><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>
                    </div>
                </article>
                ';
            }
            wp_reset_postdata();
        echo '</div>';
        ?>

        <?php
        echo '<div class="categories-container">';
            while ( $queryEvenementsFutur->have_posts() ) {
                $queryEvenementsFutur->the_post();
                echo '
                <article class="categories-articles">
                    <img src="'.get_the_post_thumbnail_url().'" alt="" class="image-article">
                    <div class="content-post">
                        <h3 class="title-article"><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>
                        <h4 class="post-date">'.get_the_date().'</h4>
                        <p class="text-extract">'.substr(get_the_excerpt(),0,200).'</p>
                    </div>
                </article>
                ';
            }
            wp_reset_postdata();
        echo '</div>';
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php 

//Appel du footer
get_footer();

?>