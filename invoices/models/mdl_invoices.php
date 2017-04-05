<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_invoices extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'tablename';
return $table;
}

 

function get(){
    
$this->db->select('*');
$this->db->from('invoices');
$this->db->group_by('invoice_id');
//$this->db->join('businesses', 'invoices.Company_id = businesses.Company_id');
//$this->db->group_by('Company_id');
$invoices=$this->db->get();
return $invoices;
}
function get_company_info($id){
    
$this->db->where('Company_id', $id);
$this->db->from('invoices');
//$this->db->group_by('invoice_id');
//$this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
$this->db->join('businesses', 'invoices.Company_name = businesses.Company_name');
$invoices_company=$this->db->get();
return $invoices_company;
}
function get_inv_comp($id){//20150102 viola add
    
$this->db->where('invoice_id', $id);
$this->db->from('invoices');
//$this->db->group_by('invoice_id');
//$this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
//$this->db->join('businesses', 'invoices.Company_name = businesses.Company_name');
$this->db->join('businesses', 'invoices.Company_id = businesses.Company_id');
$invoices_company=$this->db->get();
return $invoices_company;
}
function get_inv_date($id){//20150111 viola test
    
$this->db->where('invoice_id', $id);
$this->db->from('invoices');
//$this->db->group_by('invoice_id');
//$this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
$this->db->join('businesses', 'invoices.Company_name = businesses.Company_name');
$invoices_company=$this->db->get();
return $invoices_company;
}
function get_where($id){

$this->db->where('Company_id', $id);
$this->db->from('invoices');
$this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');

$company_items=$this->db->get();
return $company_items;
}

function get_items($id){

$this->db->where('Company_id', $id);
$this->db->from('invoices_items');
//$this->db->join('customers', 'businesses.Company_id = customers.Company_id');

$company_items=$this->db->get();
return $company_items;
}
function get_invoice_info($id){
  
    
$this->db->select('*');
$this->db->where('salesorder_id',$id);
$this->db->from('invoices');
$this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
$this->db->join('businesses', 'invoices.Company_id = businesses.Company_id');
$invoice_info=$this->db->get();
return $invoice_info;

}

function get_invoice_info_pdf($id){
  
    
$this->db->select('*');
$this->db->where('invoice_id',$id);
$this->db->from('invoices');
$this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
$this->db->join('businesses', 'invoices.Company_id = businesses.Company_id');



$invoice_info=$this->db->get();
return $invoice_info;

}

function get_invoice_payment($id){
  
    
$this->db->select('*');
$this->db->where('invoice_id', $id);
$this->db->from('payments');
$invoice_payments=$this->db->get();
return $invoice_payments;

}



function get_invoice_items($id){

$this->db->select('*');
$this->db->where('invoice_id', $id);
$this->db->from('invoice_items');
$invoice_items=$this->db->get();
return $invoice_items;

}

function email($id){
    
$this->db->select('*');
$this->db->where('invoice_id',$id);
$this->db->from('invoices');
$this->db->join('businesses', 'invoices.Company_name = businesses.Company_name');
$email=$this->db->get();
return $email;
}


function email_sent($id){
    
    $data = array(
      'sent'  =>'sent',
    );
$this->db->where('invoice_id', $id);
$this->db->update('invoices', $data);
}


function orders($id){
    
$this->db->select('*');
$this->db->where('salesorder_id',$id);
$this->db->from('invoices');
$orders=$this->db->get();
return $orders;
}

function order_items($id){
    
$this->db->select('*');
$this->db->where('invoice_id',$id);
//$this->db->where('backorderitem','NO');
$this->db->from('invoice_items');
$this->db->join('invoices', 'invoices.invoice_id = invoice_items.sales_id');
//$this->db->join('warehouse', 'warehouse.id = invoice_items.wh_item_id');
$order_items=$this->db->get();
return $order_items;

}
function item_amount($id){
    
   $item=$this->db->select('*')->from('sales_orders_items')
                          ->where('sales_id',$id)
                          ->get();
  /* $item=$this->db->select('*')->from('sales_orders_items')
                          ->where('sales_id',$id)
                          ->get();*/
  
   foreach ($item->result() as $i) {
	    if ($i->ItemPrice !='') {
  
	   $ItemPrice=$i->ItemPrice;
	   
   }
   else
	   $ItemPrice=0;
   
   
   
   
	   $amount = array(
                       
                                  
                        'itemlinetotal' =>$i->item_qty*$ItemPrice,
						'ItemPrice' =>$ItemPrice,
						
                    );
	  
	        $this->db->where('so_item_id', $i->item_id);
			$this->db->where('ItemPrice  !=', $ItemPrice);
            $this->db->update('invoice_items', $amount);
   }

   
  }
function item_total($id){
    
    $total=$this->db->select('sum(itemlinetotal) as item_total')
                          ->where('sales_id',$id)
						  ->group_by('sales_id')
                          ->get('invoice_items');
   

   foreach ($total->result() as $t) {}
	   
	   $amount = array(
                       
                                  
                        'Grand_total' => $t->item_total,
						'Subtotal_total' =>$t->item_total
                    );
	   
	       // $this->db->where('salesorder_id', $i->item_id);
		   $this->db->where('salesorder_id', $id);
            $this->db->update('invoices', $amount);
   	
	

	
}

function invoice_total($id){
   
    $invoice_info = $this->get_invoice_info($id);
	
    $this->item_total($id);

    foreach ($invoice_info->result() as $invoice) {}
	$Subtotal_total= $invoice->Subtotal_total;
	$shipping = $invoice->shipping_cost;
	
		 if($invoice->currency!='GBP'){
		       $VAT_Rate=0; }
		  else{
			 $VAT_Rate= 20;
		  }
	//$vat_amount =$invoice->VAT_ammount;
	$vat_amount =($Subtotal_total+$shipping)*($VAT_Rate/100);
	$price = $Subtotal_total + $shipping+$vat_amount; // work out the amount of vat 
    $price_with_vat = round($price, 2); // round to 2 decimal places 
    $date = new DateTime($invoice->dateraised);
                                            $date->add(new DateInterval('P0Y0M30D'));
											$due_date=$date->format('Y-m-d ');                                                       

	   $data_price = array(
                       
                        'VAT_ammount' =>$vat_amount,
                       // 'shipping_cost'=>$shipping,           
                       // 'Grand_total' =>$Subtotal_total,
						//'Subtotal_total' =>$Subtotal_total,
						'inc_vat' => $price_with_vat,
						'due_date' => $due_date,
                    ); 
                   
            $this->db->where('salesorder_id', $id);
            $this->db->update('invoices', $data_price);
	
	
	


}

function payment_made_total($inv_id){
 $q =  $this->db->select('sum(amount) as total')
		 ->where('invoice_id',$inv_id)
					  ->group_by('invoice_id')
                      ->get('payments');
                      
return $q;
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


}