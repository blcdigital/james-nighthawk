<?php
    /**
     * Starkers functions and definitions
     *
     * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
     *
     * @package     WordPress
     * @subpackage  Starkers
     * @since       Starkers 4.0
     */

    /* ========================================================================================================================

    Required external files

    ======================================================================================================================== */

    require_once( 'external/starkers-utilities.php' );

    /* ========================================================================================================================

    Theme specific settings

    Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

    ======================================================================================================================== */

    add_theme_support( 'post-thumbnails' );


    register_nav_menus(
        array( 'primary' => 'Primary Navigation' )
    );


    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'blacklabelcreative' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'blacklabelcreative' ),
        'id' => 'sidebar-2',
        'description' => __( 'The sidebar for the Blog Template', 'blacklabelcreative' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Area One', 'blacklabelcreative' ),
        'id' => 'sidebar-3',
        'description' => __( 'An optional widget area for your site footer', 'blacklabelcreative' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Area Two', 'blacklabelcreative' ),
        'id' => 'sidebar-4',
        'description' => __( 'An optional widget area for your site footer', 'blacklabelcreative' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Area Three', 'blacklabelcreative' ),
        'id' => 'sidebar-5',
        'description' => __( 'An optional widget area for your site footer', 'blacklabelcreative' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );


    /* ========================================================================================================================

    Actions and Filters

    ======================================================================================================================== */

    // remove the Wordpress version number
    remove_action( 'wp_head', 'wp_generator' );

    // add slug to the body class
    add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

    // make links relative
    function rw_relative_urls() {
        // Don't do anything if:
        // - In feed
        // - In sitemap by WordPress SEO plugin
        if ( is_feed() || get_query_var( 'sitemap' ) )
            return;

        $filters = array(
            'attachment_link',
            'day_link',
            'get_comments_pagenum_link',
            'get_pagenum_link',
            'get_shortlink',
            'month_link',
            'page_link',
            'post_link',
            'post_type_archive_link',
            'post_type_link',
            'search_link',
            'term_link',
            'year_link'
        );

        foreach ( $filters as $filter ) {
            add_filter( $filter, 'wp_make_link_relative' );
        }
    }
    add_action( 'template_redirect', 'rw_relative_urls' );


    /**
     * Returns a "Continue Reading" link for excerpts
     */
    function continue_reading_link() {
        return ' <a class="read-more" href="'. esc_url( get_permalink() ) . '">' . 'Read more' . '</a>';
    }

    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and blacklabelcreative_continue_reading_link().
     *
     * To override this in a child theme, remove the filter and add your own
     * function tied to the excerpt_more filter hook.
     */
    function auto_excerpt_more( $more ) {
        return ' &hellip;' . continue_reading_link();
    }
    add_filter( 'excerpt_more', 'auto_excerpt_more' );


    function posted_on() {
        printf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( 'View all posts by %s', get_the_author() ) ),
            get_the_author()
        );
    }


    /**
     * Display navigation to next/previous pages when applicable
     */
    function post_content_nav( $nav_id ) {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo $nav_id; ?>" class="pagination">
                <div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts' ); ?></div>
                <div class="nav-next"><?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>' ); ?></div>
            </nav>
        <?php endif;
    }

    /* ========================================================================================================================

    Custom Post Types - include custom post types and taxonimies here e.g.

    e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

    ======================================================================================================================== */

    // Videos custom post type
    register_post_type('videos', array(
        'label' => 'Videos',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array(
            'slug' => 'videos'
        ),
        'query_var' => true,
        'supports' => array(
            'custom-fields',
            'thumbnail',
            'title'
        )
    ));

    // Albums custom post type
    register_post_type('albums', array(
        'label' => 'Albums',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array(
            'slug' => 'albums'
        ),
        'query_var' => true,
        'supports' => array(
            'custom-fields',
            'thumbnail',
            'title'
        )
    ));


    // Gigs custom post type
    register_post_type('gigs', array(
        'label' => 'Gigs',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'gigs'
        ),
        'query_var' => true,
        'supports' => array(
            'editor',
            'title'
        ),
        'register_meta_box_cb' => 'add_gigs_metaboxes'
    ));
    // add_action( 'init', 'custom_post_gigs' );

    // add custom post type meta boxes
    function add_gigs_metaboxes() {
        add_meta_box('gig_meta', 'Gig Information', 'gig_meta_boxes', 'gigs', 'normal', 'default');
    }

    // display custom post type meta boxes
    function gig_meta_boxes() {
        global $post;

        // Noncename needed to verify where the data originated
        echo '<input type="hidden" name="quote_meta_noncename" id="quote_meta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

        // Get the $price data if its already been entered
        $venue = get_post_meta($post->ID, '_venue', true);
        $date = get_post_meta($post->ID, '_date', true);

        // Echo out the field
        echo '<p><label for="_venue">Venue</label>';
        echo '<input type="text" name="_venue" id="_name" value="', $venue, '" class="widefat" /></p>';
        echo '<p><label for="_date">Date</label>';
        echo '<input type="date" name="_date" id="_date" value="', $date, '" class="widefat" /></p>';
    }

    // save custom post type metabox data
    function save_gig_meta($post_id, $post) {
        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !wp_verify_nonce( $_POST['quote_meta_noncename'], plugin_basename(__FILE__) )) {
            return $post->ID;
        }
        // Is the user allowed to edit the post or page?
        if ( !current_user_can( 'edit_post', $post->ID ))
            return $post->ID;

        // OK, we're authenticated: we need to find and save the data
        // We'll put it into an array to make it easier to loop though.
        $brief_meta['_venue'] = sanitize_text_field( $_POST['_venue'] );
        $brief_meta['_date'] = sanitize_text_field( $_POST['_date'] );

        // Add values of $brief_meta as custom fields
        foreach ($brief_meta as $key => $value) { // Cycle through the $brief_meta array!
            if( $post->post_type == 'revision' ) return; // Don't store custom data twice

            $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)

            if (get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
                update_post_meta($post->ID, $key, $value);
            } else { // If the custom field doesn't have a value
                add_post_meta($post->ID, $key, $value);
            }

            if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
        }
    }
    add_action('save_post', 'save_gig_meta', 1, 2); // save the custom fields


    /* ========================================================================================================================

    Comments

    ======================================================================================================================== */

    /**
     * Custom callback for outputting comments
     *
     * @return void
     * @author Keir Whitaker
     */
    function starkers_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        ?>
        <?php if ( $comment->comment_approved == '1' ): ?>
        <li>
            <article id="comment-<?php comment_ID() ?>">
                <header>
                    <?php echo get_avatar( $comment ); ?>
                    <h4><?php comment_author_link() ?></h4>
                    <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
                </header>
                <?php comment_text() ?>
            </article>
        <?php endif;
    }
?>
