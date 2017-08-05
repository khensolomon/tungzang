<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ): ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	endif;
?>
<?php if ( comments_open() ) : ?>
<div id="respond">
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( is_user_logged_in() ) : ?>
				<h3 class="display-4">
					Hi, <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> what do you have in mind?
				</h3>
			<?php else : ?>
				<h3 class="display-4">
					...please feel free to contact us if you have any questions!
				</h3>
				<div class="form-group">
				  <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" class="form-control" placeholder="Name" <?php if ($req) echo "aria-required='true'"; ?>>
				</div>
				<div class="form-group">
				  <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" class="form-control" placeholder="E-mail" <?php if ($req) echo "aria-required='true'"; ?>>
				</div>
				<div class="form-group">
				  <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" class="form-control" placeholder="Url">
				</div>
			<?php endif; ?>
				<div class="form-group">
				  <textarea class="form-control" rows="5" name="comment" id="comment" tabindex="4" placeholder="Message"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block" name="submit" id="submit" tabindex="6">Send</button>
					<?php comment_id_fields(); ?>
				</div>

				<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif;?>
</div>
<?php endif; ?>
