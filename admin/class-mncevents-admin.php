<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mainetcare.de
 * @since      1.0.0
 *
 * @package    Mncevents
 * @subpackage Mncevents/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mncevents
 * @subpackage Mncevents/admin
 * @author     MaiNetCare GmbH <m.mai@mainetcare.de>
 */
class Mncevents_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mncevents_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mncevents_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mncevents-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mncevents_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mncevents_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mncevents-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_custom_post_types() {
		$this->register_veranstaltungen();
	}

	protected  function register_veranstaltungen() {

		$labels  = array(
			'name'                  => _x( 'Veranstaltung', 'Post Type General Name', 'mncevents' ),
			'singular_name'         => _x( 'Veranstaltung', 'Post Type Singular Name', 'mncevents' ),
			'menu_name'             => __( 'Veranstaltung', 'mncevents' ),
			'name_admin_bar'        => __( 'Veranstaltung', 'mncevents' ),
			'archives'              => __( 'Archiv Veranstaltungen', 'mncevents' ),
			'attributes'            => __( 'Archiv veranstaltungen', 'mncevents' ),
			'parent_item_colon'     => __( 'Parent Item:', 'mncevents' ),
			'all_items'             => __( 'Alle Veranstaltungen', 'mncevents' ),
			'add_new_item'          => __( 'Neu', 'mncevents' ),
			'add_new'               => __( 'Neu', 'mncevents' ),
			'new_item'              => __( 'Neu', 'mncevents' ),
			'edit_item'             => __( 'Edit Veranstaltung', 'mncevents' ),
			'update_item'           => __( 'Update', 'mncevents' ),
			'view_item'             => __( 'Detail', 'mncevents' ),
			'view_items'            => __( 'Details', 'mncevents' ),
			'search_items'          => __( 'Suche', 'mncevents' ),
			'not_found'             => __( 'Not found', 'mncevents' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'mncevents' ),
			'featured_image'        => __( 'Featured Image', 'mncevents' ),
			'set_featured_image'    => __( 'Set featured image', 'mncevents' ),
			'remove_featured_image' => __( 'Remove featured image', 'mncevents' ),
			'use_featured_image'    => __( 'Use as featured image', 'mncevents' ),
			'insert_into_item'      => __( 'Insert into item', 'mncevents' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'mncevents' ),
			'items_list'            => __( 'Items list', 'mncevents' ),
			'items_list_navigation' => __( 'Items list navigation', 'mncevents' ),
			'filter_items_list'     => __( 'Filter items list', 'mncevents' ),
		);
		$rewrite = array(
			'slug'       => 'veranstaltungen',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);
		$args    = array(
			'label'               => __( 'meldungen', 'mncevents' ),
			'description'         => __( 'Veranstaltungen', 'mncevents' ),
			'labels'              => $labels,
			'supports'            => array( 'author', 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', ),
			'taxonomies'          => array( 'eventgroups', 'category', 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-id',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'mncevents', $args );
		// @TODO Hat hier nichts verloren:


		$labels = array(
			'name'                       => _x( 'Eventkategorien', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Eventkategorie', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Eventkategorie', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'eventgroups', array( 'mncevents' ), $args );

		$labels = array(
			'name'                       => _x( 'EventStatus', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'EventStatus', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Event-Status', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'eventstatus', array( 'mncevents' ), $args );


	}

}
