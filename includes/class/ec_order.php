<?php 
class ec_order {
    private $_order='';
    public function __construct()
    {
        global $wpdb;
        $this->_order = $wpdb->prefix.'orders'; //wp_order
    }
    public function getAll()
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->_order";
        $results = $wpdb->get_results($sql );
        return $results;
    }
    public function paginate($limit=20)
    {
        global $wpdb;
        //Lấy tổng số records
        $sql = "SELECT count(id) FROM $this->_order";
        $total_items = $wpdb->get_var($sql);
        $paged = 1;

        //Fun phần trang
        //-Limit
        //-Total_pages
        //-Offset

        $total_pages = ceil($total_items/$limit);
        $offset = ($paged * $limit) - $limit;
        $sql = "SELECT * FROM $this->_order";
        $sql.=" ORDER BY id DESC";
        $sql.=" LIMIT $limit OFFSET $offset";

        $results = $wpdb->get_results($sql);
        //return $results;

        return [
            'total_pages' => $total_pages,
            'total_item' => $total_items,
            'results' => $results
        ];

    }
    public function findByID($id)
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->_order WHERE id = $id";
        $result = $wpdb->get_row($sql );
        return $result;
    }
    public function save($data)
    {
        global $wpdb;
        $wpdb->insert($this->_order,$data);
        $lastId = $wpdb->insert_id;
        $item = $this->findByID($lastId);
        return $item;
    }
    public function update($id,$data)
    {
        global $wpdb;
        $wpdb->update( $this->_order, $data, [
            'id'=>$id
        ] );
        return true;
    }
    public function delete($id)
    {
        global $wpdb;
        $wpdb->delete($this->_order,[
            'id'=>$id
        ]);
        return true;
    }
}