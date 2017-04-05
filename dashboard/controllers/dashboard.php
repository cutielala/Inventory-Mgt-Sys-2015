<?php
class Dashboard extends MX_Controller 
{

function __construct() {
parent::__construct();

//makes sure user is logged in
 $this->load->module('auth');
/*if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
     echo Modules::run('template/dash_head');           
*/
}

function index(){
$datestring = "%Y-%m-01";
$time = time();

$date =  mdate($datestring, $time);
$this->load->model('mdl_dashboard');

//
$data['mothly_sales'] = $this->mdl_dashboard->get_months_sales($date);
    
$this->load->view('dashboard',$data);
}

function months_sales(){
    

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


function filterByDate(){//viola


//$datepickerFrom =new DateTime($_POST['datepickerFrom']);
//$datepickerTo =new DateTime($_POST['datepickerTo']);
$datepickerFrom =$_POST['datepickerFrom'];
$datepickerTo =$_POST['datepickerTo'];

echo$datepickerFrom.'1</br>';
echo$datepickerTo .'1to</br>';



$datepickerFrom= date_format(date_create_from_format('m/d/Y', $datepickerFrom), 'Y-m-d');
$datepickerTo= date_format(date_create_from_format('m/d/Y', $datepickerTo), 'Y-m-d');

echo$datepickerFrom.'</br>';

echo$datepickerTo .'to';

$data['datepickerFrom'] =$datepickerFrom;

$data['datepickerTo'] =$datepickerTo ;
    $data['inv_date'] =  $this->db->select('*')               
				        ->WHERE ('dateraised >',$datepickerFrom,'AND dateraised <',$datepickerTo)
                        ->get('invoices');
	   
 
	

//$query_shipped=$this->db->select('*')
    $data['query_shipped']=$this->db->select('*')  
                        //->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo,'AND status =','invoiced')
						->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)
						->WHERE ('status =','shipped')
                        ->get('sales_orders');
               
//$num_rows_shipped = $query_shipped->num_rows();
//echo 'num_rows_shipped'.$num_rows_shipped;
    $data['query_pending']=$this->db->select('*')  
						->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)
						->WHERE ('status =','pending')
                        ->get('sales_orders');
    $data['query_invoiced']=$this->db->select('*')                     
						->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)
						->WHERE ('status =','invoiced')
                        ->get('sales_orders');					


	
 			   
	$this->load->view('filterByDate',$data);		
 
}





}