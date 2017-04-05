<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_notifications extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'tablename';
return $table;
}

 

//Orders  ///////////////////////////////////////////////
function backorder_check(){
$this->db->select('*');   
$this->db->where('status', 'pending');

$query=$this->db->get('sales_orders');


}





function orders_pending() {
$this->db->where('status', 'pending');
$query=$this->db->get('sales_orders');
$num_rows = $query->num_rows();
return $num_rows;
}

function orders_shipped() {
$this->db->where('status', 'shipped');
$query=$this->db->get('sales_orders');
$num_rows = $query->num_rows();
return $num_rows;
}

function invoiced() {
    
$this->db->where('status', 'invoiced');
$query=$this->db->get('sales_orders');
$num_rows = $query->num_rows();


return $num_rows;
}
////////////////// end customers/////////////////////////



//Warehouse

function low_stock() {


$this->db->where('qty <', '10');
$query=$this->db->get('warehouse');

//qty total
/*
$result=$this->db->select('SUM(qty)<10 as so_total_qty')->from('warehouse')->group_by('CCL_Item');                             while ($row = mysql_fetch_assoc($result)) 
{
    
    $num_rows = $result->num_rows();
	return $num_rows;
}

*/


//return $q;


$num_rows = $query->num_rows();
return $num_rows;
}


function get($order_by){
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
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

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}
//customers ///////////////////////////////////////////////
function count_where() {
$query=$this->db->get('businesses');
$num_rows = $query->num_rows();
return $num_rows;
}
////////////////// end customers/////////////////////////
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