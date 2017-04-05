<?php
class Businesses extends MX_Controller 
{

function __construct() {
parent::__construct();


 $this->load->module('auth');
if (!$this->ion_auth->logged_in())
		{
			//redirect('auth/login');
		}
                
             echo Modules::run('template/dash_head'); 
}



function index(){
$this->load->model('mdl_company');
$data ['company'] = $this->mdl_company->get();
$this->load->view('businesses',$data);


}


function view(){
    
$this->load->library('form_validation');
$id = $this->uri->segment(3);  
$this->load->model('mdl_company');
$this->load->model('warehouse/mdl_warehouse');
$data ['query'] = $this->mdl_warehouse->get();
$data ['company'] = $this->mdl_company->get_where($id);
$data ['company_items'] = $this->mdl_company->get_items($id);
//$data ['business'] = $this->mdl_customers->get_where($id);
$this->load->view('view',$data);

}

function item_added(){

$key = $this->input->post('CCL_Item');
$companyid = $this->input->post('id');

   $data= array(
       'Company_id'=> $this->input->post('id'),
       'itemCode'=> $this->input->post('CCL_Item'),
       'itemDesc'=> $this->input->post('Description'),
       'Price'=> $this->input->post('itemPrice'),
       
   );
   
   $this->db->insert('businesses_items',$data);
   

   //$this->db->where('itemCode',$key);
   //$this->db->where('Company_id',$companyid);
  // $query = $this->db->get('businesses_items');
    //if ($query->num_rows() > 0){
     
          
  
 // $this->session->flashdata('message');
   $redirect = ''.base_url().'index.php/businesses/view/'.$companyid.'';
   redirect($redirect);
    
}
function edit_item(){

$Item_id = $this->input->post('item_id');
$companyid = $this->input->post('companyid');
$itemCode= $this->input->post('itemCode');
   $data= array(
      
       'Price'=> $this->input->post('itemPrice'),
       
   );
   
    
   //$this->db->where('itemCode',$key);
   //$this->db->where('Company_id',$companyid);
  // $query = $this->db->get('businesses_items');
     $this->db->where('id',$Item_id )
	         // ->where('Company_id',$companyid)
					                  //  ->where('itemCode',$itemCode)
					                    ->update('businesses_items',$data);
     
           
  
 // $this->session->flashdata('message');
   $redirect = ''.base_url().'index.php/businesses/view/'.$companyid.'';
   redirect($redirect);
    
}
function update_so_price(){

$Company_id = $this->input->post('Company_id');
$Company_name = $this->input->post('Company_name');

 

  // $this->db->where('itemCode',$key);
   $this->db->where('Company_id',$Company_id);
   $company_items = $this->db->get('businesses_items');
    //if ($query->num_rows() > 0){
     foreach ($company_items->result() as $table) { 
	 
	     $itemCode=$table->itemCode;
	     $Price=$table->Price;
		 
	
         $SO =$this->db->where('Company_id',$Company_id)
		               ->where('status','pending')	
                  ->get('sales_orders');
				  
		 		  
				  
             foreach ($SO->result() as $s) { 
                    
					
					$salesorder_id=$s->salesorder_id;
					
					 
					
									
					
					$SO_items=$this->db->where('sales_id',$salesorder_id)
					                    ->where('CCL_Item',$itemCode)
						                ->get('sales_orders_items');	
						foreach ($SO_items->result() as $so_item) { 	
									$item_qty=$so_item->item_qty;	
												
						
						 $data= array(
                            'ItemPrice'=>  $Price,
							'itemlinetotal' =>  $Price*$item_qty,
					        );
                               $this->db->where('sales_id',$salesorder_id)
					                    ->where('CCL_Item',$itemCode)
					                    ->update('sales_orders_items',$data);
                            }

						
			 }
	 }			 
       
   $redirect = ''.base_url().'index.php/businesses/view/'.$Company_id.'';
   redirect($redirect);
    
    }
    function update_so_each_price(){

    $Company_id = $this->input->post('Company_id');
    $Company_name = $this->input->post('Company_name');
    $CCL_Item = $this->input->post('CCL_Item');
    $Price = $this->input->post('Price');
 
  // $this->db->where('itemCode',$key);
   $this->db->where('Company_id',$Company_id);
   $this->db->where('itemCode',$CCL_Item);
   $company_items = $this->db->get('businesses_items');
    //if ($query->num_rows() > 0){
     foreach ($company_items->result() as $table) { 
	 
	     $itemCode=$table->itemCode;
	     $Price=$table->Price;
		 
	
         $SO =$this->db->where('Company_id',$Company_id)
		               ->where('status','pending')		
                       ->get('sales_orders');
				  
		 		  
				  
             foreach ($SO->result() as $s) { 
                    
					
					$salesorder_id=$s->salesorder_id;
					
					 
					
									
					
					$SO_items=$this->db->where('sales_id',$salesorder_id)
					                    ->where('CCL_Item',$CCL_Item)
						                ->get('sales_orders_items');	
						foreach ($SO_items->result() as $so_item) { 	
									$item_qty=$so_item->item_qty;	
												
						
						 $data= array(
                            'ItemPrice'=>  $Price,
							'itemlinetotal' =>  $Price*$item_qty,
					        );
                               $this->db->where('sales_id',$salesorder_id)
					                    ->where('CCL_Item',$CCL_Item)
					                    ->update('sales_orders_items',$data);
}

						
			 }			 
        
	   
	 }

  
  
 // $this->session->flashdata('message');
   $redirect = ''.base_url().'index.php/businesses/view/'.$Company_id.'';
   redirect($redirect);
    
}


function add_company(){
    
    $this->load->view('add_company');
}
function add_company_form(){
    
    $this->load->view('add_company_form');
}

function add(){


 
	  
	  
	  
     $data = array(
    'Company_name'=> $this->input->post('Company_name'),
	'email'=> $this->input->post('email'),
	'accounts_email'=> $this->input->post('accounts_email'),

	 'number'=> $this->input->post('number'),

     
     'address1'=> $this->input->post('address1'),
     'address2'=> $this->input->post('address2'),
     'County'=> $this->input->post('County'),
	 'Country'=> $this->input->post('Country'),
     'postcode'=> $this->input->post('postcode'),
	 
	 'first_name'=> $this->input->post('first_name'),
     //'last_name'=> $this->input->post('last_name'),
	

     'Phone_number'=> $this->input->post('phone_number'),
	 //'Phone_number'=>$phone_number_result,
     'mobile_number'=> $this->input->post('mobile_number'),
	// 'mobile_number'=>$mobile_number_result,
     'website'=> $this->input->post('website'),
     'VAT_Number'=> $this->input->post('vat_number'),
         'vat_exempt'=>$this->input->post('vat_exempt'),
     'terms'=> $this->input->post('terms'),
     'notes'=> $this->input->post('notes'),
     
    'accounts_name'=> $this->input->post('accounts_name'),
	
);
   
    $this->db->insert('businesses',$data);
    redirect(''.base_url().'index.php/businesses');
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


function update(){
$id = $this->input->post('id');

$data = array(
    'Company_name'=> $this->input->post('Company_name'),
     'first_name'=> $this->input->post('first_name'),
     //'last_name'=> $this->input->post('last_name'),
     'Phone_number'=> $this->input->post('Phone_number'),
     'mobile_number'=> $this->input->post('mobile_number'),
	 'email'=> $this->input->post('email'),
    'accounts_email'=> $this->input->post('accounts_email'),
    'on_hold'=>  $this->input->post('on_hold'),
	'notes'=> $this->input->post('notes'),
	  'website'=> $this->input->post('website'),
	  
	  
	  
     'address1'=> $this->input->post('address1'),
     'address2'=> $this->input->post('address2'),
	 'City'=> $this->input->post('City'),
     'County'=> $this->input->post('County'),
	 'Country'=> $this->input->post('Country'),
     'postcode'=> $this->input->post('postcode'),
	 'ship_address1'=> $this->input->post('ship_address1'),
     'ship_address2'=> $this->input->post('ship_address2'),
	 'ship_County'=> $this->input->post('ship_County'),
     'ship_Country'=> $this->input->post('ship_Country'),
     'ship_postcode'=> $this->input->post('ship_postcode'),
	 
    
     'VAT_Number'=> $this->input->post('VAT_Number'),
     'vat_exempt'=>$this->input->post('vat_exempt'),
     'terms'=> $this->input->post('terms'),
     'number'=> $this->input->post('number'),
	 

   

);
    
$this->db->where('Company_id',$id)->update('businesses',$data);


 $redirect = ''.base_url().'index.php/businesses/view/'.id.'';
   redirect($redirect);

}

function import_it(){

echo form_open_multipart('company/import');

echo '<input type="file" name="userfile" size="20" />
<br /><br />

<input type="submit" value="upload" />

</form>';
}
//importing files 

    function import() {
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));

        //$sales_id = $this->input->post('salesid');

        $config['upload_path'] = 'C:\wamp\www\earth\uploads\customers';
        $config['allowed_types'] = 'csv';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());



            $upload_data = $this->upload->data();
            $file_name = $upload_data['full_path'];


            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file($file_name); //path to csv file


            foreach ($result as $field) {

                $data = array(
                    'Company_id' => $field['Company_id'],
                    'Company_name' => $field['Company_name'],
                    'buyer_name' => $field['buyer_name'],
                    'Phone_number' => $field['Phone_number'],
                    
                    
                    'accounts_email' => $field['accounts_email'],
                    'email' => $field['email'],
                    'Address_1' => $field['Address_1'],
                    
                    
                    'Address_2' => $field['Address_2'],
                    'Town_city' => $field['Town_city'],
                    'Country' => $field['Country'],
                    'Post_code' => $field['Post_code'],
                    'terms' => $field['terms'],
                    
                    
                    
                );

                $this->db->insert('businesses', $data);
            }
            $redirect = '' . base_url() . 'index.php/company/';
            redirect($redirect);
        }
    }


    function remove_item(){

$id= $this->input->post('item_id');
$comp_id= $this->input->post('comp_id');
$this->db->where('id', $id);
$this->db->delete('businesses_items');

$redirect = '' . base_url() . 'index.php/businesses/view/'.$comp_id.'';
redirect($redirect);
            
}

function delete($id){
echo '<script type="text/javascript">alert("hello!");</script>';
echo "<script type='text/javascript'>alert('Invoice Sent successfully!')</script>";
echo "<script>javascript: alert('test msgbox')></script>";
$this->db->where('Company_id', $id);
$this->db->delete('businesses');


$redirect = '' . base_url() . 'index.php/businesses/';

redirect($redirect);
 

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