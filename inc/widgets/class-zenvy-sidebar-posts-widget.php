<?php

class Zenvy_Sidebar_Posts_Widget extends WP_Widget {


	public function __construct() {
		parent::__construct(
			'zenvy_sidebar_posts_widget',
			esc_html__( 'Zenvy Sidebar Posts', 'zenvy' ),
			[ 'description' => esc_html__( 'Displays a list of dynamic posts in the sidebar.', 'zenvy' ) ]
		);
		// Remove the widget registration from constructor to avoid duplication
	}

	/**
	 * Register widget
	 */
	public function register_widget() {
		register_widget( 'Zenvy_Sidebar_Posts_Widget' );
	}

	public function widget( $args, $instance ) {
		$title           = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Don\'t Miss it', 'zenvy' );
		$number_of_posts = ! empty( $instance['number_of_posts'] ) ? absint( $instance['number_of_posts'] ) : 5;
		$order           = ! empty( $instance['order'] ) ? $instance['order'] : 'DESC';
		$orderby         = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date';

		$fallback = get_theme_mod( 'zenvy_featured_post_fallback_image', get_template_directory_uri() . '/assets/build/images/default-post.jpg' );

		$query_args = [
			'post_type'           => 'post',
			'posts_per_page'      => $number_of_posts,
			'order'               => $order,
			'orderby'             => $orderby,
			'no_found_rows'       => true, // Performance improvement
			'ignore_sticky_posts' => true, // Don't force sticky posts
		];

		$posts_query = new WP_Query( $query_args );

		echo $args['before_widget'];
		?>
		<aside class="widget widget_recent-post">
			<?php if ( $title ) : ?>
				<h3 class="widget-title"><?php echo esc_html( $title ); ?></h3>
			<?php endif; ?>
			<div class="recent-post-wrap">
				<?php
				if ( $posts_query->have_posts() ) :
					while ( $posts_query->have_posts() ) :
						$posts_query->the_post();
						$post_class = [ 'post' ];
						if ( ! has_post_thumbnail() ) {
							$post_class[] = 'no-featured-image';
						}
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
							<div class="featured-image-wrapper">
								<?php zenvy_post_thumbnail( 'medium_large', '1x1' ); ?>
							</div>

							<?php
							$posts_elements = [ 'post-meta', 'post-title' ];
							$meta_elements  = [ 'date', 'categories' ];

							if ( ! empty( $posts_elements ) ) :
								echo '<div class="post-content d-flex flex-column text-left">';

								foreach ( $posts_elements as $post_element ) :

									switch ( $post_element ) :

										case 'post-title':
											Zenvy_Helper::post_title();
											break;

										case 'post-meta':
											echo '<div class="entry-meta">';

											if ( $meta_elements ) {
												foreach ( $meta_elements as $val ) {
													if ( $val === 'categories' ) {
														zenvy_posted_cats();
													} elseif ( $val === 'date' ) {
														zenvy_posted_on();
													}
												}
											}
											echo '</div><!-- .entry-meta -->';
											break;
									endswitch;
								endforeach;

								echo '</div><!-- .post-details-wrap -->';
							endif;

							?>
						</article>
						<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
		</aside>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title           = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Posts', 'zenvy' );
		$number_of_posts = ! empty( $instance['number_of_posts'] ) ? absint( $instance['number_of_posts'] ) : 5;
		$order           = ! empty( $instance['order'] ) ? $instance['order'] : 'DESC';
		$orderby         = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'zenvy' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
				value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php esc_html_e( 'Number of Posts', 'zenvy' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="number"
				step="1" min="1" value="<?php echo esc_attr( $number_of_posts ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php esc_html_e( 'Order', 'zenvy' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
				<option value="DESC" <?php selected( $order, 'DESC' ); ?>><?php esc_html_e( 'Descending', 'zenvy' ); ?></option>
				<option value="ASC" <?php selected( $order, 'ASC' ); ?>><?php esc_html_e( 'Ascending', 'zenvy' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e( 'Order By', 'zenvy' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
				<option value="date" <?php selected( $orderby, 'date' ); ?>><?php esc_html_e( 'Date', 'zenvy' ); ?></option>
				<option value="title" <?php selected( $orderby, 'title' ); ?>><?php esc_html_e( 'Title', 'zenvy' ); ?></option>
				<option value="comment_count" <?php selected( $orderby, 'comment_count' ); ?>><?php esc_html_e( 'Comment Count', 'zenvy' ); ?></option>
				<option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php esc_html_e( 'Random', 'zenvy' ); ?></option>
			</select>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = [];

		$instance['title']           = sanitize_text_field( $new_instance['title'] );
		$instance['number_of_posts'] = absint( $new_instance['number_of_posts'] );
		$instance['order']           = in_array( $new_instance['order'], [ 'ASC', 'DESC' ] ) ? $new_instance['order'] : 'DESC';
		$instance['orderby']         = in_array( $new_instance['orderby'], [ 'date', 'title', 'comment_count', 'rand' ] ) ? $new_instance['orderby'] : 'date';

		return $instance;
	}
}

// Initialize the widget
add_action(
	'widgets_init',
	function () {
		register_widget( 'Zenvy_Sidebar_Posts_Widget' );
	}
);
