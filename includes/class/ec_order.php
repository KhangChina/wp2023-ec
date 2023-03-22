<?php
class ec_order
{
    private $_order = '';
    public function __construct()
    {
        global $wpdb;
        $this->_order = $wpdb->prefix . 'orders'; //wp_order
    }
    public function getAll()
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->_order";
        $results = $wpdb->get_results($sql);
        return $results;
    }

    public function countAll()
    {
        global $wpdb;
        $sql = "SELECT count(id) FROM $this->_order WHERE deleted = 0";
        $total_items = $wpdb->get_var($sql); 
        $total_items_pending = $wpdb->get_var($sql." AND status = 'pending'");
        $total_items_completed = $wpdb->get_var($sql." AND status = 'completed'");
        $total_items_canceled = $wpdb->get_var($sql." AND status = 'canceled'");

        return [
            'total_items_all' => $total_items,
            'total_items_pending' => $total_items_pending,
            'total_items_completed' => $total_items_completed,
            'total_items_canceled' => $total_items_canceled
        ];

    }
    public function paginate($limit = 20)
    {
        global $wpdb;

        print_r($_REQUEST);
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
        $status_order  = isset($_REQUEST['status_order']) ? $_REQUEST['status_order'] : '';


        //Lấy tổng số records
        $sql = "SELECT count(id) FROM $this->_order WHERE deleted = 0";
        //Xử lý tìm kiếm
        if ($search) {
            $sql .= " AND ( customer_name LIKE '%$search%' OR customer_phone LIKE '%$search%')";
        }
        //Xử lý lấy danh sách theo status order
        if ($status_order) {
            $sql .= " AND status = '$status_order'";
        }
        // var_dump($sql);

        $total_items = $wpdb->get_var($sql);
        $paged = 1;


        //Fun phần trang
        //-Limit
        //-Total_pages
        //-Offset

        $total_pages = ceil($total_items / $limit);
        $offset = ($paged * $limit) - $limit;
        $sql = "SELECT * FROM $this->_order WHERE deleted = 0";
        //Xử lý tìm kiếm
        if ($search) {
            $sql .= " AND ( customer_name LIKE '%$search%' OR customer_phone LIKE '%$search%')";
        }
        //Xử lý lấy danh sách theo status order
        if ($status_order) {
            $sql .= " AND status = '$status_order'";
        }
        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT $limit OFFSET $offset";

        $results = $wpdb->get_results($sql);
        //return $results;

        return [
            'total_pages' => $total_pages,
            'total_items' => $total_items,
            'results' => $results
        ];
    }
    public function findByID($id)
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->_order WHERE id = $id";
        $result = $wpdb->get_row($sql);
        return $result;
    }
    public function save($data)
    {
        global $wpdb;
        $wpdb->insert($this->_order, $data);
        $lastId = $wpdb->insert_id;
        $item = $this->findByID($lastId);
        return $item;
    }
    public function update($id, $data)
    {
        global $wpdb;
        $wpdb->update($this->_order, $data, [
            'id' => $id
        ]);
        return true;
    }
    public function delete($id)
    {
        global $wpdb;
        $wpdb->delete($this->_order, [
            'id' => $id
        ]);
        return true;
    }
}
