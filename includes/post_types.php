<?php
// Đăng ký loại bài viết là sản phẩm - móc vào init
add_action('init', 'ec_custom_post_type');
function ec_custom_post_type() {
    //Tạo type product
	register_post_type('product',
		array(
			'labels'      => array(
				'name'          => __('Các sản phẩm', 'wp2023-ec'),
				'singular_name' => __('Sản phẩm', 'wp2023-ec'),
			),
				'public'      => true,
				'has_archive' => true,
                'rewrite'     => array( 'slug' => 'products' ),
                'supports'    => array( 'title', 'editor','thumbnail', 'excerpt' ),
		)
	);
}

// Đăng ký loại taxonomy (loại danh mục - products_category)
add_action( 'init', 'ec_register_taxonomy_products' );
function ec_register_taxonomy_products()
{
    $labels = array(
        'name'              => _x( 'Danh mục', 'taxonomy general name' ),
        'singular_name'     => _x( 'Danh mục', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Danh mục' ),
        'all_items'         => __( 'All Danh mục' ),
        'parent_item'       => __( 'Parent Danh mục' ),
        'parent_item_colon' => __( 'Parent Danh mục:' ),
        'edit_item'         => __( 'Edit Danh mục' ),
        'update_item'       => __( 'Update Danh mục' ),
        'add_new_item'      => __( 'Thêm danh mục' ),
        'new_item_name'     => __( 'New Danh mục Name' ),
        'menu_name'         => __( 'Danh mục' ),
    );
    $args   = array(
        'hierarchical'      => true, // phân cấp danh mục
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'products-category' ],
    );
    register_taxonomy( 'products_category', [ 'product' ], $args ); //làm việc với post type product ở trên
}