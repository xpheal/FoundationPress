<?php
/**
 * The template for displaying all single posts and attachments. Modified by Wayne to include jupyter type post
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php
	// Check if this post is a journal or a jupyter post, if yes, set $isJournal to True or $isJupyter to True
	// Assumes that a post cannot be a journal and a jupyter at the same time, if both are true, it will default to journal
	$cats = wp_get_post_categories(get_the_ID(), array('fields' => 'names'));
	$single_post_id = "single-post";
	$isJournal = False;
	foreach($cats as $cat){
		if($cat == "Journal"){
			$isJournal = True;
			break;
		}
		if($cat == "Jupyter"){
			$isJupyter = True;
			$single_post_id = "single-post-jupyter";
			break;
		}
	}
?>

<?php $isJupyter ? get_header("jupyter") : get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

	
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php $isJournal ? foundationpress_entry_meta_date() : foundationpress_entry_meta();?>
		</header>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php $isJournal or $isJupyter ?:edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php $isJournal or $isJupyter ?:the_post_navigation(); ?>
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php $isJournal ?:comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer();
