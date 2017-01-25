<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'blocatg_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function blocatg_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = MB_PREFIX;
	// Gallery meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'gallery_settings',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Gallery Settings', 'blocatg' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
            // PLUPLOAD IMAGE UPLOAD (ALIAS OF IMAGE UPLOAD)
			array(
				'name'             => esc_html__( 'Upload Or selecte Gallery images', 'blocatg' ),
				'id'               => "{$prefix}gallery_img",
				'type'             => 'image_advanced',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 7,
				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
			),
		),

	);
    // Quote meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'quote_settings',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Quote Settings', 'blocatg' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
            // TEXT
			array(
				// Field name - Will be used as label
				'name'  => esc_html__( 'Quote Author', 'blocatg' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}quote_writer",
				// Field description (optional)
				'desc'  => esc_html__( 'Write the name of the person or the book author u get this quote from', 'blocatg' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => esc_html__( 'Anonymous', 'blocatg' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
            // TEXTAREA
			array(
				'name' => esc_html__( 'The Quote', 'blocatg' ),
				'desc' => esc_html__( 'Write the quote content in this box', 'blocatg' ),
				'id'   => "{$prefix}quote_content",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),

	);
    // Audio meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'audio_settings',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Audio Settings', 'blocatg' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
            // OEMBED
			array(
				'name' => esc_html__( 'Soundcloud link', 'blocatg' ),
				'id'   => "{$prefix}oembed",
				'desc' => esc_html__( 'be sure to put soundcloud link and preview it before saving', 'blocatg' ),
				'type' => 'oembed',
			),
		),

	);
	return $meta_boxes;
}
