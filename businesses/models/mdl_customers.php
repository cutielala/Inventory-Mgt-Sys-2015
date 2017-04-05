<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_customers extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'businesses';
return $table;
}

 

function get(){

$this->db->select('*');
$this->db->from('businesses');
//$this->db->join('businesses', 'customers.Company_id = businesses.Company_id');
  
$customers=$this->db->get();
return $customers;
}      


function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id){

$this->db->where('customer_id', $id);
$this->db->from('customers');
$this->db->join('businesses', 'customers.Company_id = businesses.Company_id');
$this->db->join('businesses_items', 'businesses.Company_id = businesses_items.Company_id');
$customer=$this->db->get();
return $customer;
}

//fetches items from that company

function get_items($id){

$this->db->where('Company_id', $id);
$this->db->from('business_items');
//$this->db->join('businesses', 'businesses.Company_id = customers.Company_id');
$customer=$this->db->get();
return $customer;
}


function get_busesness(){
$this->db->where('on_hold', 0);
$this->db->select('*');
$this->db->order_by('Company_name');
$this->db->from('businesses');

$businesses=$this->db->get();
return $businesses;
}


function get_customer($id){

$this->db->where('Company_id', $id);
$this->db->from('businesses');
//$this->db->join('businesses', 'customers.Company_id = businesses.Company_id');
//$this->db->join('businesses_items', 'businesses.Company_id = businesses_items.Company_id');
$customer=$this->db->get();
return $customer;
}

function get_so_customers(){

//$this->db->where('customer_id', $id);
$this->db->from('businesses');
//$this->db->join('businesses', 'customers.Company_id = businesses.Company_id');
//$this->db->join('businesses_items', 'businesses.Company_id = businesses_items.Company_id');
$customer=$this->db->get();
return $customer;
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

function _update($id,$data){
$table = $this->get_table();
$this->db->where('customer_id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('Customer_id', $id);
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