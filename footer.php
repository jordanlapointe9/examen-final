<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TP2_-_Programmation_et_Veille_Technologique
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href='<?php get_home_url() ?>'>Examen Final</a>
			<p>&mdash; Crée par Jordan Lapointe</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/headerHide.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/menuControl.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/animations.js"></script>

</body>
</html>
