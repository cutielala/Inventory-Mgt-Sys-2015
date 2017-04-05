<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_quotes extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'quotes';
return $table;
}

function orders($id){
    
$this->db->select('*');
$this->db->where('salesorder_id',$id);
$this->db->from('sales_orders');
$this->db->join('businesses_items', 'sales_orders.Company_id = businesses_items.Company_id');
$orders=$this->db->get();
return $orders;
}

function order_items($id){
    
$this->db->select('*');
$this->db->where('quotes_id',$id);
$this->db->from('quote_items');
$this->db->join('quotes', 'quote_items.quote_id = quotes.quotes_id');
$this->db->join('warehouse', 'warehouse.id = quote_items.wh_item_id');
$order_items=$this->db->get();
return $order_items;
}

function quotes($id){
    $this->db->select('*');
    $this->db->where('quotes_id',$id);
    $this->db->from('quotes');



$quotes=$this->db->get();
return $quotes;
    
}
        
function total($id) {

$this->db->select('SUM(itemlinetotal) as score');
$this->db->where('quote_items.quote_id', $id);
$this->db->from('quote_items');
//$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.sales_id');
$totals=$this->db->get();
$row=$totals->row();
$score=$row->score;


return $score;
}
 

function get(){

    
$this->db->select('*');
$this->db->from('quotes');
$this->db->order_by('dateraised','ASC');
$this->db->join('businesses', 'quotes.Company_id = businesses.Company_id');


$quotes=$this->db->get();
return $quotes;
}

function ifbackorders(){
    
$this->db->select('salesorder_id');
$this->db->from('sales_orders');
$query = $this->db->get();
return $query;

foreach ($query->result() as $q) {
   $id = $q->salesorder_id;
   
   echo $id;
}





$this->db->select('*');
$this->db->from('sales_orders');
$this->db->where('salesorder_id',$id);
$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
$needsbackoders=$this->db->get();
return $needsbackoders;

}


function addresses($id){
$this->db->select('*');
$this->db->where('quotes_id',$id);
$this->db->from('quotes');
//$this->db->join('customers', 'sales_orders.Customer_id = customers.customer_id');
$addresses=$this->db->get(); 
return $addresses;

}
        
function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function _deletequote($id){
$this->db->where('quotes_id', $id);
$this->db->delete('quotes');
$this->db->where('quote_id', $id);
$this->db->delete('quote_items');



}
function get_invoice_info($id){
  
    
$this->db->select('*');
$this->db->where('quotes_id',$id);
$this->db->from('quotes');
$this->db->join('quote_items', 'quotes.quotes_id = quote_items.quote_id');
$this->db->join('businesses', 'quotes.Company_id = businesses.Company_id');



$invoice_info=$this->db->get();
return $invoice_info;

}
function packingslip($id){
    
 
        $this->db->select('*');
        $this->db->from('sales_orders_items');
        $this->db->where('sales_id',$id);
        $query=$this->db->get();
        return  $query;
    
}

function  get_items($sales_id){
$this->db->select('*');
        $this->db->where('quote_id', $sales_id);
        $this->db->from('quote_items');
        $items = $this->db->get();
        return $items;
}


function get_where($id){
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
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

function _update_so($id, $data){
$table = $this->get_table();
$this->db->where('quotes_id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$this->db->where('item_id', $id);
$this->db->delete('sales_orders_items');
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