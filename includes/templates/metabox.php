<?php
global $post;
// echo '<pre>';
// print_r($post);
// die();

$product_price = get_post_meta($post->ID,'product_price',true); // Lấy giá trị đơn
$product_price_sale = get_post_meta($post->ID,'product_price_sale',true); // Lấy giá trị đơn
$product_amount = get_post_meta($post->ID,'product_amount',true); // Lấy giá trị đơn
?>
<table class="form-table" role="presentation">

    <tbody>
        <tr>
            <th scope="row"><label for="blogname">Giá sản phẩm:</label></th>
            <td><input name="product_price" type="text" value="<?= $product_price?>" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="blogname">Giá khuyến mại:</label></th>
            <td><input name="product_price_sale" type="text" value="<?= $product_price_sale?>" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="blogname">Số lượng:</label></th>
            <td><input name="product_amount" type="number" value="<?= $product_amount?>" class="regular-text"></td>
        </tr>

    </tbody>
</table>