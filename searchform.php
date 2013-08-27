<?php
/**
 * The template for displaying search forms in black label creative
 *
 * @package WordPress
 * @subpackage black_label_creative
 * @since black label creative 2.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'blacklabelcreative' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'blacklabelcreative' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'blacklabelcreative' ); ?>" />
	</form>
