<?php
//Screen Products--------------------------------------------------------------------
// Ở màn hình thêm sản phẩm thêm 1 thuộc tính mới
add_action('add_meta_boxes', 'ec_meta_box_customize');
function ec_meta_box_customize()
{
    add_meta_box(
        'ec_box_id',                 // Unique ID
        'Cấu hình sản phẩm',      // Box title
        'ec_custom_box_html',  // Content callback, must be of type callable
        'product'                           // Post type
    );
}
//Tạo UI cho box
function ec_custom_box_html()
{
    include_once WP2023_PATH . 'includes/templates/metabox.php';
}

//Bắt sự kiện save post để insert data 
add_action('save_post', 'ec_save_post_data_product');
function ec_save_post_data_product($post_id)
{
    // echo '<pre>';
    // print_r($_REQUEST);
    // die();

    if ($_REQUEST['post_type'] == 'product') {
        //Lấy giá trị từ request
        $product_price = $_REQUEST['product_price'];
        $product_price_sale = $_REQUEST['product_price_sale'];
        $product_amount = $_REQUEST['product_amount'];
        //Lưu vào CSDL: postmeta
        update_post_meta($post_id,'product_price',$product_price);
        update_post_meta($post_id,'product_price_sale',$product_price_sale);
        update_post_meta($post_id,'product_amount',$product_amount);

    }
}
//Screen Danh mục--------------------------------------------------------------------
//Đăng kí thêm thuộc tính cho danh mục 
add_action('products_category_add_form_fields','ec_meta_box_products_category_add',10,1);
function ec_meta_box_products_category_add ($taxonomy)
{
    include_once WP2023_PATH.'includes/templates/metabox_add_categories.php';
}
//Đăng kí edit thuộc tính cho danh mục 
add_action('products_category_edit_form_fields','ec_meta_box_products_category_edit',10,2);
function ec_meta_box_products_category_edit ($tag,$taxonomy)
{
    include_once WP2023_PATH.'includes/templates/metabox_edit_categories.php';
}

//Xử lý action danh mục term
/*
    do_action('edit_<taxonomy_name>');
    do_action('create_<taxonomy_name>');
*/

//2 cái này điều update và tạo mới chung
add_action('create_products_category','ec_create_products_category');
add_action('edit_products_category','ec_create_products_category');
function ec_create_products_category($term_id)
{
    //  echo '<pre>';
    // print_r($_REQUEST);
    // die();
    $status_category = $_REQUEST['status_category'];
    update_term_meta($term_id,'status_category',$status_category);
}
