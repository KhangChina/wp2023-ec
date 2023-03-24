<?php

/*
GET /order - get all
POST /order - insert

GET /order/{id} - get one
POST /order/{id} - update
DELETE /order/{id} - delete

*/

add_action('rest_api_init', 'wp_ec_api');

function wp_ec_api()
{
    $namespace = 'ec-api/v1';
    $base = '/order';
    //http://localhost/wp-json/ec-api/v1/order
    register_rest_route(
        $namespace,
        $base,
        [
            [
                'methods' => 'GET', //Get
                'callback' => 'getAllOrder'
            ],
            [
                'methods' => 'POST', //post
                'callback' => 'insertOrder'
            ]
        ]

    );


    //http://localhost/wp-json/ec-api/v1/order/4
    register_rest_route(
        $namespace,
        $base . '/(?P<id>[\d]+)',
        [
            [
                'methods' => 'GET', //Get
                'callback' => 'findOneOrder',
            ],
            [
                'methods' => 'POST', //PUT,PATCH //Error
                'callback' => 'updateOrder',
            ],
            [
                'methods' => 'DELETE', //DELETE
                'callback' => 'deleteOrder',
            ]
        ]
    );
    //http://localhost/wp-json/ec-api/v1/order/4/order_detail
    register_rest_route(
        $namespace,
        $base . '/(?P<id>[\d]+)/order_detail',
        [
            [
                'methods' => 'GET', //Get
                'callback' => 'getOrderDetail',
            ],
        ]
    );
}
function getAllOrder($req)
{
    $obj =  new ec_order();
    $result = $obj->paginate();
    $data = [
        'success' => true,
        'data' => $result
    ];
    return new WP_REST_Response($data, 200);
}
function insertOrder($req)
{
    /*
    var config = {
        method: 'post',
        url: 'http://localhost/wp-json/ec-api/v1/order',
        headers: { 
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        data : data
      };
    */
    $obj =  new ec_order();
    $result = $obj->save($_POST);
    $data = [
        'success' => true,
        'data' => $result
    ];
    return new WP_REST_Response($data, 201);
}
function findOneOrder($req)
{
    $id = $req['id'];
    $obj =  new ec_order();
    $result = $obj->findByID($id);
    $data = [
        'success' => true,
        'data' => $result
    ];
    return new WP_REST_Response($data, 200);
}
function updateOrder($req)
{
    $id = $req['id'];
    $obj =  new ec_order();
    $result = $obj->update($id, $_POST);
    $data = [
        'success' => true,
        'data' => $result
    ];
    return new WP_REST_Response($data, 201);
}
function deleteOrder($req)
{
    $id = $req['id'];
    $obj =  new ec_order();
    $result = $obj->delete($id);
    $data = [
        'success' => true,
        'data' => $result
    ];
    return new WP_REST_Response($data, 201);
}
function getOrderDetail($req)
{
    $id = $req['id'];
    $data = [
        'success' => true,
        'data' => "OK getOrderDetail $id"
    ];
    return new WP_REST_Response($data, 200);
}
