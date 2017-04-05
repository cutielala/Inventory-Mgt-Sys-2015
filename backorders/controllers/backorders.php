<?php
class Backorders extends MX_Controller 
{

function __construct() {
parent::__construct();


 $this->load->module('auth');
if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
                
             echo Modules::run('template/dash_head'); 
}


function index(){
$this->load->model('mdl_sales_orders');
$data['backorders'] = $this->mdl_sales_orders->get();
$this->load->view('backorders',$data);
}


function add_new(){
$this->load->model('mdl_sales_orders');
$this->load->model('customers/mdl_customers');
$data ['businesses'] = $this->mdl_customers->get_busesness();
$data ['customers'] = $this->mdl_customers->get_so_customers();
$this->load->view('add_new',$data);
}

function add_so(){
    
    $data = array(
        'dateraised'=>  $this->input->post('dateraised'),  
        'Company_id'=>  $this->input->post('company'),  
        'Customer_id'=>  $this->input->post('customer_id'),  
        'po_number'=>  $this->input->post('po_number'), 
    );
    
$this->load->model('mdl_sales_orders');
$this->db->insert('sales_orders',$data);
redirect('salesorders');

}



//---------------------------------
// All sales orders viewsbelow
//---------------------------------
function view($id){
    
$this->load->model('mdl_sales_orders');
$this->load->model('warehouse/mdl_warehouse');
$this->load->model('businesses/mdl_customers');


$data ['addresses'] = $this->mdl_sales_orders->addresses();
$data ['query'] = $this->mdl_warehouse->get();
$data ['customer'] = $this->mdl_customers->get_customer($id);
$data ['orders'] = $this->mdl_sales_orders->orders($id);
$data ['order_items'] = $this->mdl_sales_orders->order_items($id);
$data['total'] = $this->mdl_sales_orders->total($id);
$this->load->view('view',$data);

}

function add_items()
{
$qty = $this->input->post('item_qty');
$itemPrice =$this->input->post('itemPrice');

$lineprice =  $itemPrice *  $qty;
//adds the the sales orders +1 for-revision
$addone = 1;
$sorev = $this->input->post('soid') + $addone;   

   $data= array(
       'sales_id'=> $this->input->post('sales_id'),
       'CCL_Item'=> $this->input->post('CCL_Item'),
       'Description'=> $this->input->post('Description'),
       'item_qty'=> $this->input->post('item_qty'),
       'itemPrice'=> $this->input->post('itemPrice'),
       'itemlinetotal'=> $lineprice,
      'sales_orders_rev'=> $sorev +1,
       
   );
   $item_id = $this->input->post('item_id');
   $newso_qty = $this->input->post('new_so_qty');
   //print_r($data);
   
$this->db->insert('backorders_items',$data);
   
   $array = array(
     
     'item_qty'=> $newso_qty, 
   );
$this->db->where('item_id', $item_id);
$this->db->update('sales_orders_items', $array);
    
     $id = $this->input->post('sales_id');
   $redirect = ''.base_url().'salesorders/view/'.$id.'';
   redirect($redirect);
}

function delete_item()
{
    $id = $this->input->post('itemID');
    echo $id;
    $soid = $this->input->post('soid');
    $this->db->where('item_id',$id)->delete('sales_orders_items');
    
    //$this->load->model('mdl_sales_orders');
    //$this->mdl_sales_orders->_delete($id);
    
   $redirect = ''.base_url().'salesorders/view/'.$soid.'';
   redirect($redirect);
   
  // echo $id;
    
    
}

function save(){
    
    $GT = $this->input->post('total') + $this->input->post('vat_amount');
    $id = $this->input->post('sales_id');
    $data= array(
        
       'VAT_Rate'=> $this->input->post('vat_rate'),
       'VAT_ammount'=> $this->input->post('vat_amount'),
        'inc_vat'=> $this->input->post('inc_vat'),
         'Company_name'=> $this->input->post('Company_name'),
       'Grand_total'=> $GT,
      
   );
    
    
     $this->load->model('mdl_sales_orders');
    $this->mdl_sales_orders->_update_so($id,$data);
    
  $redirect = ''.base_url().'salesorders/';
   redirect($redirect);
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