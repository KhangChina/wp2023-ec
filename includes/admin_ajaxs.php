<?php
//Sử dụng ajax
//add_action( 'wp_ajax_<nameFunction>', '<nameFunction>' );
//Đã đăng nhập admin
add_action( 'wp_ajax_ec_change_status_order', 'ec_change_status_order' );
function ec_change_status_order(){
    $order_id = $_REQUEST['order_id'];
    $status = $_REQUEST['status'];
    $obj = new ec_order();
    $obj->changeStatus($order_id,$status);
    $res = [
        'success' => true
    ];
    echo json_encode($res);
    die();
}
//Chưa đăng nhập admin dùng phía client
//add_action( 'wp_ajax_nopri_<func>', 'func' );