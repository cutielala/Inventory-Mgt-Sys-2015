<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_sales_orders extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'sales_orders';
return $table;
}

function orders($id){
    
$this->db->select('*');
$this->db->where('salesorder_id',$id);
$this->db->from('sales_orders');
$orders=$this->db->get();
return $orders;
}
function get(){

    
$this->db->select('*');
$this->db->where('status', 'pending');
$this->db->order_by('dateraised','DESC');
$salesorders=$this->db->get('sales_orders');

return $salesorders;
}
function get_order_pending(){

$this->db->select('*');
$this->db->where('status', 'pending');
$this->db->order_by('salesorder_id','DESC');

//$this->db->join('businesses', 'sales_orders.Company_name = businesses.Company_name');
$query=$this->db->get('sales_orders');
return $query;
}

function get_order_shipped(){

$this->db->select('*');
$this->db->where('status', 'shipped');
$this->db->order_by('dateraised','DESC');
$this->db->join('businesses', 'sales_orders.Company_id = businesses.Company_id');
//$this->db->join('businesses', 'sales_orders.Company_name = businesses.Company_name');
$query=$this->db->get('sales_orders');
return $query;
}
function get_order_invoiced(){

$this->db->select('*');
$this->db->where('status', 'invoiced');
$this->db->order_by('salesorder_id','DESC');
$this->db->join('businesses', 'sales_orders.Company_id = businesses.Company_id');
//$this->db->join('businesses', 'sales_orders.buyername = businesses.Company_name');
$query=$this->db->get('sales_orders');
return $query;
}

function order_items($id){
    
$this->db->select('*');
$this->db->where('sales_id',$id);
//$this->db->where('backorderitem','NO');
$this->db->from('sales_orders_items');
$this->db->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
//$this->db->join('warehouse', 'warehouse.CCL_Item = sales_orders_items.CCL_Item');
$order_items=$this->db->get();
return $order_items;

}

function bk_items($id){
    
$this->db->select('*');
$this->db->where('sales_id',$id);
//$this->db->where('backorderitem','NO');
//$this->db->from('backorders_items');
$this->db->from('sales_orders_items');
//$this->db->join('sales_orders', 'sales_orders.salesorder_id = backorders_items.sales_id');
$this->db->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
//$this->db->join('warehouse', 'warehouse.CCL_Item = sales_orders_items.CCL_Item');
$order_items=$this->db->get();
return $order_items;

}






function order_items_invoiced($id){
    
$this->db->select('*');
$this->db->where('sales_id',$id);
//$this->db->where('backorderitem','NO');
$this->db->from('sales_orders_items');
$this->db->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id');

$order_items=$this->db->get();
return $order_items;

}
function bo_order_items($id){
    
    $this->db->select('*');
$this->db->where('sales_id',$id);
$this->db->where('backorderitem','YES');
$this->db->from('sales_orders_items');
$this->db->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id');
$order_items=$this->db->get();
return $order_items;
}



function getbackorders(){

    
$this->db->select('*');
$this->db->from('sales_orders');
$this->db->where('backorder','YES');
$this->db->group_by('salesorder_id');
$this->db->order_by('dateraised','ASC');
$this->db->join('businesses', 'sales_orders.Company_id = businesses.Company_id');
//$this->db->join('businesses', 'sales_orders.Company_name = businesses.Company_name');
//$this->db->join('backorders', 'sales_orders.salesorder_id = backorders.salesorder_id','LEFT');


$salesorders=$this->db->get();
return $salesorders;
}

function ifbackorders(){
    
$this->db->select('salesorder_id');
$this->db->from('sales_orders');
$query = $this->db->get();
return $query;

    foreach ($query->result() as $q) {
   $id = $q->salesorder_id;
   

    }

$this->db->select('*');
$this->db->from('sales_orders');
$this->db->where('salesorder_id',$id);
$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
$needsbackoders=$this->db->get();
return $needsbackoders;

}
function if_has_split($id){
    
$this->db->select('*');
$this->db->from('sales_orders');
$this->db->where('sales_orders_rev',$id);
$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db-> group_by('sales_orders_rev');
$query=$this->db->get();;


$num_rows = $query->num_rows();
      if($num_rows>0){
return $query;

   }



}
function count_split($id){
    $this->db->select('*');
$this->db->from('sales_orders');
$this->db->where('sales_orders_rev',$id);
$this->db->where('status','pending');
$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db-> group_by('sales_orders_rev');
$query=$this->db->get();;
return $num_rows;

   }




function isabackorder(){
$this->db->select('*');
$this->db-> group_by('salesorder_id');
$this->db->from('backorders');
$query=$this->db->get();
return $query;
 
$needsbackoders=$this->db->get();
return $needsbackoders;
}

function addresses($id){
$this->db->select('*');
$this->db->where('salesorder_id',$id);
$this->db->from('sales_orders');
//$this->db->join('customers', 'sales_orders.Customer_id = customers.customer_id');
$addresses=$this->db->get(); 
return $addresses;

}
 function if_returnitem($id){
    
 $salesorders = $this->db->select('*')
                                ->where('salesorder_id', $id)
								->join('sales_orders_items','sales_orders_items.sales_id =sales_orders.salesorder_id  ')						          								
								->where('so_item_note','return')
								->group_by('sales_orders.salesorder_id')
                                ->get('sales_orders');
return $salesorders;

}       
function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}


function packingslip($id){
    
 
        $this->db->select('*');
        $this->db->from('sales_orders_items');
        $this->db->where('sales_id',$id);
        $query=$this->db->get();
        return  $query;
    
}




function item_amount($id){
    
    $item=$this->db->select('*')->from('sales_orders_items')
                          ->where('sales_id',$id)
                          ->get();
   

   foreach ($item->result() as $i) {
	   
	   $amount = array(
                       
                                  
                        'itemlinetotal' =>$i->item_qty*$i->ItemPrice,
						
                    );
	   
	        $this->db->where('item_id', $i->item_id);
            $this->db->update('sales_orders_items', $amount);
   }

   
  }
function item_total($id){
    
    $total=$this->db->select('sum(itemlinetotal) as item_total')
                          ->where('sales_id',$id)
						  ->group_by('sales_id')
                          ->get('sales_orders_items');
   

   foreach ($total->result() as $t) {}
	   
	   $amount = array(
                       
                                  
                        'Grand_total' => $t->item_total,
						'Subtotal_total' =>$t->item_total
                    );
	   
	       // $this->db->where('salesorder_id', $i->item_id);
		   $this->db->where('salesorder_id', $id);
            $this->db->update('sales_orders', $amount);
   	
	

	
}
function total($id) {


$orders=$this->orders($id);

 foreach ($orders->result() as $o){}
 if ($o->backorder==='NO'){
	 
	 $this->db->select('SUM(itemlinetotal) as score');
     $this->db->where('sales_orders_items.sales_id', $id);
     //$this->db->where('sales_orders_items.refund', 'NO');
      $this->db->from('sales_orders_items');
      //$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.sales_id');
	
	 
 }
 else{

	 $this->db->select('SUM(itemlinetotal) as score');
    // $this->db->where('backorders_items.sales_id', $id);
	  $this->db->where('sales_orders_items.sales_id', $id);
	  $this->db->from('sales_orders_items');
     //$this->db->where('sales_orders_items.refund', 'NO');
     // $this->db->from('backorders_items');
	 
 }

    $totals=$this->db->get();
    $row=$totals->row();
    $score=$row->score;
    $amount = array(
                                                       
                        'Grand_total' => $score,
						'Subtotal_total' =>$score
                    );	   
	       // $this->db->where('salesorder_id', $i->item_id);
		     $this->db->where('salesorder_id', $id);
             $this->db->update('sales_orders', $amount);
   	

return $score;
}
 


function sales_total($id){
     
   
	$this->item_amount($id);
    $total= $this->total($id);
   
    $addresses= $this->addresses($id);
   
			                                    	foreach ($addresses->result() as $address) {
                                                               
                                                         }
                                                    $shipping = $address->shipping_cost;
												    $incship = $total + $shipping;
														
											        $vat_rate=$this->mdl_settings->get_vat();
                                                    foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                     }
													
                                                   
                
				                                    
                                                            
                                                    if(( $address->vat_exempt === 'NO')&&($address->currency === 'GBP')){
                                                          $vat = $vat_rate->vat_rate;;  // define what % vat is 
                                                    }
													
                                                    else{
														
                                                        $vat = 0;
                                               
													
													}
                                                           
                                                            $vat_amount = $vat * ($incship / 100);
                                                            $price = $incship + $vat_amount; // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                           

               
                     
                    $data_price = array(
                        'VAT_Rate' => $vat,
                        'VAT_ammount' => $vat_amount,
                        'inc_vat' => $price_with_vat,           
                       // 'Grand_total' =>$total,
					   //	'Subtotal_total' =>$total,
                    ); 
                   
                $this->db->where('salesorder_id', $id);
$this->db->update('sales_orders', $data_price);
	
	
	


}

function count_item($id){

$query=$this->db->select('*')->from('sales_orders_items')->where('sales_id',$id)->get();




$num_rows = $query->num_rows();
return $num_rows;
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

function _update_so($id, $data){
$table = $this->get_table();
$this->db->where('salesorder_id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$this->db->where('item_id', $id);
$this->db->delete('sales_orders_items');
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