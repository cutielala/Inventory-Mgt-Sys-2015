<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_warehouse extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'warehouse';
return $table;
}

 function get_factory_items($items){
     
    
$table = $this->get_table();
$this->db->where('vendors_name', $items);
$items=$this->db->get($table);
return $items;
}


function get(){
  
$this->db->select('*');
$this->db->select_sum('qty');
$this->db-> group_by('CCL_Item');
$this->db->from('warehouse');
$query=$this->db->get();
return $query;
}

function get1(){
  
$this->db->select('*');

$this->db->from('warehouse');
$query=$this->db->get();
return $query;
}

function getlowstock(){
 
/* 
$this->db->select('*');
$this->db->select_sum('qty');
$this->db-> group_by('CCL_Item');
$this->db->where('qty <','10');
//$this->db->where('qty','<9');
$this->db->from('warehouse');
$query=$this->db->get();*/
$this->db->select('*');
$this->db->select('sum(qty) as sum');
$this->db->from('warehouse');
$this->db-> group_by('CCL_Item');
$this->db->having('sum <','10');
//$this->db->where('qty','<9');

$query=$this->db->get();

//$low=mysql_query('select *, sum(qty) from warehouse group by CCL_Item having sum(qty) < 10');

return $query;
}


function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_items($id){
$table = $this->get_table();
$this->db->where('id', $id);
$items=$this->db->get('warehouse');
return $items;
}

function edit($itemid){
	

     $this->db->select('*');
   $this->db->where('id',$itemid);
   $qerry =$this->db->get('warehouse');
   return $qerry;
}
 function get_all_items(){
    
	
	$id = $this->uri->segment(3);
    $item = $this->get_items($id);
    
    foreach ($item->result() as $value) {}     
     
	if (!empty($value)){              

	    $CCL_Item = $value->CCL_Item;
    
        $table = $this->get_table();
        $this->db->select('*');
		 $this->db->where('CCL_Item',$CCL_Item.'');
       //  $this->db->where('CCL_Item LIKE',$CCL_Item.'%');
        $this->db->order_by('id','DESC');
        $items=$this->db->get($table);
        return $items;

    }
            
	else
		echo '<h2>Sorry,the Item ID does not exist .</h2>';

         exit;	
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