<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

?>

<a id="post-<?php the_ID(); ?>" class="post flex column" href="<?php the_permalink(); ?>">
	<div class="post-img">
		<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
	</div>

	<div class="post-content flex column justify-between">
		<div class="post-date flex justify-between">
			<p class="tag">
				<?php
				$posttags = get_the_tags();
				if ($posttags) {
					foreach ($posttags as $tag) {
						echo $tag->name . ' ';
					}
				}
				?>
			</p>
			<p><?php echo get_the_date(); ?></p>
		</div>
		<div class="post-text flex align-center">
			<h3><?php the_title(); ?></h3>
		</div>

	</div>
</a>