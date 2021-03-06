<?php
/**
 * Template for displaying password protected form in Transitions
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

function trns_password_form( $title = '<h2 class="password-form__title">This post is password protected.</h2>' ) {

	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$siteUrl = get_option('siteurl');	
	$icon = trns_icon_component(array('name'=>'Unlock', 'class'=>'password-form__button-icon'));
	
	// https://wpartisan.me/tutorials/wordpress-failing-redirect-protected-posts
	$link = get_the_permalink();

	$output = <<<HTML
	<!-- password-form.php -->
	$title
	<form 
		class="password-form" 
		action="$siteUrl/wp-login.php?action=postpass" 
		method="post"
		>
		<input 
			class="password-form__input"
			name="post_password" 
			id="$label" 
			type="password" 
			size="20"
			placeholder="Password"
			/>
		<button class="password-form__button button--icon" name="submit" type="submit" >
			$icon
		</button>
		<input type="hidden" name="_wp_http_referer" value="$link"/>
	</form><!--/ password-form.php -->

HTML;
	return $output;
}
add_filter( 'the_password_form', 'trns_password_form', 10, 0 );


// Include Password Protected Posts in Search Results
// https://www.isitwp.com/include-password-protected-posts-in-search-results/
add_filter( 'posts_search', 'include_password_posts_in_search' );
function include_password_posts_in_search( $search ) {
    global $wpdb;
    if( !is_user_logged_in() ) {    
        $pattern = " AND ({$wpdb->prefix}posts.post_password = '')";
        $search = str_replace( $pattern, '', $search );
    }
    return $search;
}

// MAKING IT A WIDGET
// https://codex.wordpress.org/Widgets_API

/**
 * Adds Unlock_Widget widget.
 */
class Unlock_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'unlock_widget', // Base ID
			'Unlock All Protected Posts', // Name
			array( 'description' => 'Displays a password field to unlock all protected posts' ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo trns_password_form();
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Unlock Hidden Content';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php 'Title:'; ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Unlock_Widget

// register Unlock_Widget widget
function register_unlock_widget() {
    register_widget( 'Unlock_Widget' );
}
add_action( 'widgets_init', 'register_unlock_widget' );

?>