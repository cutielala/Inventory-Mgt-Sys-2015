<?php
class Status extends MX_Controller 
{

function __construct() {
parent::__construct();
}



function get_status(){
$id = $this->uri->segment(3);
$this->load->model('mdl_status');
$data ['status'] = $this->mdl_status->get($id);
$this->load->view('status',$data);
}

function update(){
 $id = $this->input->post('id');
  $data  = array(
    'status' =>  $this->input->post('status'),
  );
//$this->db->where('salesorder_id',$id);
//$this->db->update('sales_orders',$data);
        print_r($data);
}


function status_update($id, $data){
$this->load->model('mdl_status');
$this->mdl_status->_update($id, $data);
}




function pending_to_shipped(){

$qty=$_POST['qty'];
$wt=$_POST['wt'];
$add_info=$_POST['add_info'];
    //gets post info from modal///
$sales_id =$this->input->post('salesid');
$customer_id = $this->input->post('salesid');
$pallet = $this->input->post('pallet');


if (($pallet === '1')OR($pallet === 1)){
//cahnges status in sales orders/////
$so_status = array('status' => 'shipped','pallet' => '1',);
    


$this->db->where('salesorder_id',$sales_id); 
$this->db->update('sales_orders',$so_status); 


//sellects all sales order info and items 
        
$this->db->select('*');
$this->db->where('sales_id',$sales_id);
$this->db->from('sales_orders_items');
$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
$status=$this->db->get(); 



    
 $redirect = ''.base_url().'index.php/salesorders/';
  redirect($redirect);

 
 
}
 else {
    
     //cahnges status in sales orders/////
$so_status = array('status' => 'shipped',
        
    
    );
    


$this->db->where('salesorder_id',$sales_id); 
$this->db->update('sales_orders',$so_status); 


//sellects all sales order info and items 
        
$this->db->select('*');
$this->db->where('sales_id',$sales_id);
$this->db->from('sales_orders_items');
$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
//$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.salesorder_id');
$status=$this->db->get(); 


Modules::run('dpd/shipped',$sales_id,$add_info,$qty,$wt);//2015/01/08 viola edit

    
 $redirect = ''.base_url().'index.php/salesorders/';
redirect($redirect);

     
     
     
}

}



function pending_to_shipped_viewpage(){

$qty=$_POST['qty'];
$wt=$_POST['wt'];
$add_info=$_POST['add_info'];
    //gets post info from modal///
$sales_id =$this->input->post('salesid');
$customer_id = $this->input->post('salesid');
$pallet = $this->input->post('pallet');


    if (($pallet === '1')OR($pallet === 1)){
//cahnges status in sales orders/////
    $so_status = array('status' => 'shipped','pallet' => '1',);
    


$this->db->where('salesorder_id',$sales_id); 
$this->db->update('sales_orders',$so_status); 


//sellects all sales order info and items 
        
$this->db->select('*');
$this->db->where('sales_id',$sales_id);
$this->db->from('sales_orders_items');
$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
$status=$this->db->get(); 


 $redirect = ''.base_url().'index.php/salesorders/view/'.$sales_id;
 redirect($redirect);
//$this->new_invoice($sales_id,$customer_id);
//$this->insert_items_to_invoice($sales_id);
//$this->index();
 
 
    }
    else {
    
     //cahnges status in sales orders/////
$so_status = array('status' => 'shipped',
        
    
    );
    


$this->db->where('salesorder_id',$sales_id); 
$this->db->update('sales_orders',$so_status); 


//sellects all sales order info and items 
        
$this->db->select('*');
$this->db->where('sales_id',$sales_id);
$this->db->from('sales_orders_items');
$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
//$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.salesorder_id');
$status=$this->db->get(); 


echo Modules::run('dpd/shipped',$sales_id,$add_info,$qty,$wt);//2015/01/08 viola edit
    
    
 $redirect = ''.base_url().'index.php/salesorders/view/'.$sales_id;
redirect($redirect);

     
         }

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