<?php
//-------------------------Hiển thị các cột của post sản phẩm------------------------------------
//add_filter('manage_<post_type>_posts_columns','namefunction');
add_filter('manage_product_posts_columns', 'ec_product_customize_col');
function ec_product_customize_col($columns)
{
    $columns['product_price'] = "Giá bán";
    $columns['product_price_sale'] = "Giảm giá";
    $columns['product_amount'] = "Số lượng";
    return $columns;
}
//Hiển thị giá trị theo từng cột
//add_action('manage_<post_type>_posts_custom_column', 'namefunction', 10, 2);
add_action('manage_product_posts_custom_column', 'ec_product_customize_col_get_data', 10, 2);
function ec_product_customize_col_get_data($columns, $post_id)
{
    switch ($columns) {
        case 'product_price':
            $product_price = get_post_meta($post_id,'product_price',true);
            echo number_format($product_price);
            break;

        case 'product_price_sale':
            $product_price_sale = get_post_meta($post_id,'product_price_sale',true);
            echo number_format($product_price_sale);
            break;

        case 'product_amount':
            echo get_post_meta($post_id,'product_amount',true);
            break;
    }
}
//-------------------------Hiển thị các cột của danh mục sản phẩm------------------------------------
//add_filter('manage_edit-<taxonomy>_columns','nameFunc');
add_filter('manage_edit-products_category_columns','ec_product_categories_customize_col',10,1);
function ec_product_categories_customize_col($columns)
{
    $columns['status_category'] = 'Trạng Thái';
    return $columns;
}
add_action('manage_products_category_custom_column', 'ec_product_categories_customize_col_get_data', 10, 3);
function ec_product_categories_customize_col_get_data($out,$columns,$term_id)
{
    if($columns == 'status_category')
    {
        $status = get_term_meta($term_id,'status_category',true);
        echo $status;
    }
}