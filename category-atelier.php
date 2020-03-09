<?php 

$args = array(
    'category_name' => 'Atelier',
    'posts_per_page' => 16,
    'orderby' => 'date'
);

//Query des articles de la catégorie : Nouvelles
$queryNouvelles = new WP_Query( $args );

$args = array(
    'post_type'=>'post',
    'posts_per_page' => 16,
    'order' => 'ASC',
    'post_status' => 'future'
);

//Query des articles de la catégorie : Nouvelles
$queryEvenementsFutur = new WP_Query( $args );

function convertHeureEnColone($value){
    switch ($value) {
        case 2:
            return 1;
            break;
        case 5:
            return 2;
            break;
        case 4:
            return 3;
            break;
        case 6:
            return 4;
            break;
        default: 
            return 0;
            break;
    }
}

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
        echo '<h1>'.category_description(2).'</h1>';
        echo '<div class="categories-container">';
            while ( $queryNouvelles->have_posts() ) {
                $queryNouvelles->the_post();
                echo '
                
                <article class="categories-ateliers">
                    <div class="content-post">
                        <h3 class="title-article"><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>
                        <p class="field-article">'.get_post_field('post_name').'</p>
                        <p class="author-article">'.get_the_author_meta( 'display_name', $post->post_author ).'</p>
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

        if ( have_posts() ) :
            echo '<div class="container-evenements">';
                while ( $queryNouvelles->have_posts() ) : $queryNouvelles->the_post();
                    $heure = (int) substr(get_post_field( 'post_name'),-2);
                    $auteur = (int) get_post_field( 'post_author', $post_author_id );
                    $heureGrid = (int) substr(get_post_field( 'post_name'),-2);
                    $auteurGrid = convertHeureEnColone($auteur);

                    $gridArea = ''.$heure.'/'.$auteurGrid.'/'.$heureGrid.'/'.$auteurGrid.'';

                    echo '
                    <article class="articles-evenements" style="
                        grid-area: '.$gridArea.';
                    ">
                        <div class="content-post">
                            <h3 class="title-article"><a href='.get_the_permalink().'>'.get_the_title().'</a></h3>
                            <p class="field-article">'.get_post_field('post_name').'</p>
                            <p class="author-article">'.get_the_author_meta( 'display_name', $post->post_author ).'</p>
                        </div>
                    </article>
                    ';
                endwhile;
            echo '</div>';
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php 

//Appel du footer
get_footer();

?>