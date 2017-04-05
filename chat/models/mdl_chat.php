<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_chat extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'chat';
return $table;
}

 

function get($username){
$table = $this->get_table();

$this->db->where('to',$username);
$this->db->order_by('sent','ASC');
$query=$this->db->get($table);
return $query;
}
function get_user($id){
$this->db->select('*'); 
$this->db->where('id',$id);

$query=$this->db->get('users');
    foreach ($query ->result() as $q) {
	
        $username=$q->username;
//$username=$q->email;
         return $username;
    }
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

function count_where($user_id) {

/*$table = $this->get_table();
$this->db->where('to', $username);

$this->db->where('read', '0');
$query=$this->db->get($table);*/
$this->db->where('uid', $user_id);

$this->db->where('read', 'NO');
$query=$this->db->get('message2_recips');
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