<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_po extends CI_Model {

function __construct() {
parent::__construct();
}


 

function get(){
$this->db->select('*');
$this->db->join('po_payments', 'po_orders.PO_id = po_payments.po_id','LEFT');
$this->db->where('status ','Pending');
$this->db->group_by('po_orders.po_id');
//$this->db->group_by('po_payments.po_id');
$this->db->select_sum('po_payments.amount');
$po_orders=$this->db->get('po_orders');
return $po_orders;
}

function get_payment(){
    
$this->db->select('*');
//$this->db->join('po_payments', 'po_orders.PO_id = po_payments.po_id','LEFT');
$this->db->select_sum('amount');
$po_orders=$this->db->get('po_payments');
return $po_orders;
}


function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}


  function get_po($id){
$this->db->select('*');
$this->db->where('po_id',$id);
$this->db->from('po_orders');
//$this->db->join('po_orders', 'po_orders.PO_id = po_orders_items.po_id');
$po=$this->db->get();
return $po;
}
  

function recevied($id,$id1){
  
$this->db->select('*');
$this->db->where('item_id',$id);
//$this->db->where('wh_item_id',$id1);
$this->db->from('po_orders_items');
$po_items=$this->db->get();
return $po_items;
    
}

function get_where($id){
  
 
  /*
$this->db->select('*');*/
$this->db->where('po_id',$id);
//$this->db->join('warehouse', 'warehouse.po_item_id = po_orders_items.item_id');
//$this->db->from('po_orders_items');
$po_items=$this->db->get('po_orders_items');
 

    
    return $po_items;
 
}

 function total($id) {

$this->db->select('SUM(itemlinetotal) as score');
$this->db->where('po_orders_items.po_id', $id);
$this->db->from('po_orders_items');
//$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.sales_id');
$totals=$this->db->get();
$row=$totals->row();
$score=$row->score;


return $score;
}  

 function totalCBM($id) {

$this->db->select('SUM(CBM) as score');
$this->db->where('po_orders_items.po_id', $id);
$this->db->from('po_orders_items');
//$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.sales_id');
$totals=$this->db->get();
$row=$totals->row();
$score=$row->score;


return $score;
} 

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}