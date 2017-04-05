<?php
class Chat extends MX_Controller 
{

function __construct() {
parent::__construct();

//$this->load->module('auth');
//if (!$this->ion_auth->logged_in())
		{
			//redirect('auth/login');
		}

             
               
}

function index(){
	
	 $this->load->library('session');
 $username = $this->session->userdata('email');
 $this->load->model('mdl_chat');
$data['chat'] = $this->mdl_chat->get($username);
 $data['currentUserName'] =  $username;
 $data['currentUser'] = $this->session->userdata('user_id');
 $this->load->view('chat',$data);
 
 
 
 
}

function inbox(){
	 $this->load->library('session');
 $username = $this->session->userdata('email');
 $this->load->model('mdl_chat');
 $data['chat'] = $this->mdl_chat->get($username);
 $data['currentUserName'] =  $username;
 $data['currentUser'] = $this->session->userdata('user_id');
 $this->load->view('inbox',$data);
 
 
 
 
}

function view($mid){
	$this->load->library('session');
 $username = $this->session->userdata('email');
   $data['currentUserName'] =  $username;
 $data['currentUser'] = $this->session->userdata('user_id');
 $data['mid'] = $mid;
 $this->load->model('mdl_chat');
 $data['chat'] = $this->mdl_chat->get($username);
 $read = array(
                        'read' => 'YES',
                    
                    );
 $this->db->where('mid', $mid);
 $this->db->update('message2_recips', $read);
 
 
 
 $this->load->view('view',$data);
 
 
 
 
}
function compose(){
 $username = $this->session->userdata('email');
   $data['currentUserName'] =  $username;
 $data['currentUser'] = $this->session->userdata('user_id');
 $this->load->model('mdl_chat');
 $data['chat'] = $this->mdl_chat->get($username);
 $this->load->view('compose',$data);
 
 
 
 
}
function post(){
 $username = $this->session->userdata('email');
   $username = $this->session->userdata('email');
  $data['currentUserName'] =  $username;
 $data['currentUser'] = $this->session->userdata('user_id');
 $this->load->model('mdl_chat');
 $data['chat'] = $this->mdl_chat->get($username);
 


 $this->load->view('post',$data);
 
 
} 

function sent(){
 $username = $this->session->userdata('email');
  $data['currentUserName'] =  $username;
$data['currentUser'] = $this->session->userdata('user_id');
 $this->load->model('mdl_chat');
 $data['chat'] = $this->mdl_chat->get($username);
 
 

 $this->load->view('sent',$data);
 
 
} 
function delete($id){
	
$username = $this->session->userdata('email');	

 $currentUser = $this->session->userdata('user_id');
		  
$dsn = 'mysql:host=localhost;dbname=earth';

$PDO = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
 
//$mid = isset($_GET['id']) ? $_GET['id'] : 0;
$mid = isset($id) ? $id : 0;
$sql = "update message2_recips set status='D' where mid=? and status != 'D' and uid=?";
$stmt = $PDO->prepare($sql);
$args = array($mid, $currentUser);
 
if (!$stmt->execute($args)) {
	die('error');
}
 
die(header('Location:'. base_url().'chat/inbox'));
 
 
 
 
}       
function notify_new(){
//$username = $this->session->userdata('email');
$user_id = $this->session->userdata('user_id');
 $this->load->model('mdl_chat');
 
 echo $this->mdl_chat->count_where($user_id);

 
 
}
function notify_total(){
	$user_id = $this->session->userdata('user_id');
$this->db->where('uid', $user_id);
$query=$this->db->get('message2_recips');
$num_rows = $query->num_rows();
 echo $num_rows;

 
 
}


function get($order_by){
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_perfectcontroller');
$this->mdl_perfectcontroller->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_perfectcontroller');
$this->mdl_perfectcontroller->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_perfectcontroller');
$this->mdl_perfectcontroller->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_perfectcontroller');
$count = $this->mdl_perfectcontroller->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_perfectcontroller');
$max_id = $this->mdl_perfectcontroller->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_perfectcontroller');
$query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
return $query;
}

}