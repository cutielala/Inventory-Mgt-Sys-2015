<?php
class Vendors extends MX_Controller 
{

    function __construct() {
        parent::__construct();


        $this->load->module('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

             $datestring = " %Y-%m-%d";
$time = time();

$dateraised =  mdate($datestring, $time);   
    }

    function index() {
echo Modules::run('template/dash_head');
        $this->load->model('mdl_vendors');
        $data['vendors'] = $this->mdl_vendors->get();
     // $data['po_payments'] = $this->mdl_po->payment();
        $this->load->view('main', $data);
        
    }
    
    function add_new() {
       
        $this->load->view('add_new');
        
    }

    
    
    function add_vendor(){
    $data =array(
        'vendor_name'=>  $this->input->post('vendor_name'), 
        'address'=>  $this->input->post('address'), 
        'email'=>  $this->input->post('email'), 
        'currency'=>  $this->input->post('currency'), 
        'contact'=>  $this->input->post('contact'), 
    );
    $this->db->insert('vendors',$data);
    
    redirect('vendors');
    
    
}    


    function view($id) {
       
      echo Modules::run('template/dash_head');
      $this->load->library('form_validation');
      $this->load->model('mdl_vendors');
      $data ['vendor'] = $this->mdl_vendors->get_where($id);
//$data ['business'] = $this->mdl_customers->get_where($id);
$this->load->view('view',$data);

        
    }

    function get(){
    $this->load->model('mdl_vendors');
    $query = $this->mdl_vendors->get();

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

function update(){
$id = $this->input->post('id');
echo $this->input->post('vendor_name');
$data = array(
  'vendor_name' =>  $this->input->post('vendor_name'),  
  'address' =>  $this->input->post('address'),
  'email' =>  $this->input->post('email'),
   'Contact' =>  $this->input->post('phone'),
   'notes' =>  $this->input->post('notes'), 
    'currency'=>  $this->input->post('currency'), 
);
    
    $this->db->where('vendor_id',$id)->update('vendors',$data);
    redirect(''.  base_url().'vendors/view/'.$id.'');
	
}

function delete($id){
$this->db->where('vendor_id',$id)->delete('vendors');
redirect('vendors');
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