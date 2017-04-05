<?php
class Po extends MX_Controller 
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
         $this->load->model('mdl_po');
         $data['po_orders'] = $this->mdl_po->get();
       // $data['po_orders_payments'] = $this->mdl_po->get_payment();
         $this->load->view('main', $data);
        
    }
    function po_placed() {
         echo Modules::run('template/dash_head');
         $this->db->select('*');
		 $this->db->where('status','Placed');
         $this->db->join('po_payments', 'po_orders.PO_id = po_payments.po_id','LEFT');
         $this->db->group_by('po_orders.po_id');
         $this->db->select_sum('po_payments.amount');
         $data['po_orders'] = $this->db->get('po_orders');
			                
      
         $this->load->view('main', $data);
        
    }
	function po_received() {
         echo Modules::run('template/dash_head');
         $this->db->select('*');
		 $this->db->where('status','Received');
         $this->db->join('po_payments', 'po_orders.PO_id = po_payments.po_id','LEFT');
         $this->db->group_by('po_payments.po_id');
         $this->db->select_sum('po_payments.amount');
         $data['po_orders'] = $this->db->get('po_orders');
			                
      
         $this->load->view('main', $data);
        
    }
	function po_complete() {
         echo Modules::run('template/dash_head');
         $this->db->select('*');
		 $this->db->where('status','Completed');
         $this->db->join('po_payments', 'po_orders.PO_id = po_payments.po_id','LEFT');
         $this->db->group_by('po_orders.po_id');
         $this->db->select_sum('po_payments.amount');
         $data['po_orders'] = $this->db->get('po_orders');
			                
      
         $this->load->view('main', $data);
        
    }
	
	function view($id){
        
        echo Modules::run('template/dash_head');
            
        //$this->load->model('warehouse/mdl_warehouse');
        $this->load->model('mdl_po');
        
        $this->db->select('*');
        $this->db->where('PO_id', $id);
        $this->db->from('po_orders');
        $vendor_item = $this->db->get();
        
        foreach ($vendor_item->result() as $r) {
            
        }
        $items = $r->Vendor_name;
       // $wh_item_id= $r->wh_item_id;
       
        $this->load->model('warehouse/mdl_warehouse');
       // $data ['query'] = $this->mdl_warehouse->get_factory_items($items);
		
		 $data ['query'] = $this->db->select('*')
                            ->where('vendors_name like',$items)
                            ->group_by('CCL_Item')
							->get('warehouse');
		//$data ['query'] =mysql(SELECT * FROM `warehouse` WHERE `CCL_Item` LIKE '%KPC 030%' );
	//	$data ['wh_item'] = $this->mdl_warehouse->get_items($wh_item_id);
		/*$data ['po_item_id']= $this->db->select('*')
                             ->where('po_item_id',$r->item_id)
                             ->get('warehouse');*/
        $data ['po'] = $this->mdl_po->get_po($id);
      //  $data ['po_items'] = $this->mdl_po->get_where($id);
	     $data ['po_items']=$this->db->where('po_id',$id) 
						          //->join('warehouse', 'warehouse.po_item_id = po_orders_items.item_id')
                                  ->get('po_orders_items');
	  
	    $po_items=$this->db->where('po_id',$id) 
						       
						       ->join('warehouse', 'warehouse.po_item_id = po_orders_items.item_id')
                                ->get('po_orders_items');


        $data['total'] = $this->mdl_po->total($id);
        $data['totalCBM'] = $this->mdl_po->totalCBM($id);
    
         															
        $this->load->view('view', $data);

    }
    
  
	function eta_etd(){
       
    
      $this->load->view('eta_etd');

}
	
	
	
	
	
    function add_new() {
        //$this->load->model('mdl_po');
        $this->load->model('vendors/mdl_vendors');
        $data ['vendors']=$this->db->select('*')
			                    ->group_by('vendor_id')			  
			                    ->get('vendors');
     
        $this->load->view('add_new',$data);
    }
    
    function add_po() {
        $datestring = " %Y-%m-%d";
        $time = time();

        $dateraised =  mdate($datestring, $time);
        $data = array(
            'dateraised' => $dateraised,
            'Vendor_name' => $this->input->post('factory'),
            'po_notes'=>  $this->input->post('po_notes'),
            'currency'=>  $this->input->post('currency'),
        );

        
        
        $this->load->model('mdl_po');
        $this->db->insert('po_orders', $data);
        //gets last inserted id 
         $id = $this->db->insert_id();
               
         
           $payments = array(
            'po_id' => $id,
				'payment_dateraised' =>$dateraised,
        );
         
          //$this->db->insert('po_payments', $payments);

        $redirect = '' . base_url() . 'index.php/po/view/' . $id . '';
        redirect($redirect);
    }

  
	function save_notes(){
       $id =  $this->input->post('poid');
        $data = array(
            'po_notes' => $this->input->post('po_notes'),
        );
        
        $this->db->where('PO_id',$id)->update('po_orders',$data);
        
    }
    
    
    function item_added() {
        $qty = $this->input->post('qty');
        $itemPrice = $this->input->post('itemprice');

        $lineprice = $itemPrice * $qty;

        $data = array(
            'po_id' => $this->input->post('poid'),
            'vendor_code' => $this->input->post('vendor_code'),
			'wh_item_id'=> $this->input->post('product_id'),
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'CTN_QTY' => $this->input->post('CTN_QTY'),
            'item_qty' => $this->input->post('qty'),
            'carton_ordered' =>  $this->input->post('carton_ordered'),
            'CBM' => $this->input->post('cbm'),
            'ItemPrice'=>  $this->input->post('itemprice'),
            'itemlinetotal' => $lineprice,
           'CTN_W'=>$this->input->post('CTN_W'),
            'CTN_L'=>$this->input->post('CTN_L'),
            'CTN_H'=>$this->input->post('CTN_H'),
            'vendor'=>$this->input->post('vendor_name'),
            'product_id' => $this->input->post('product_id'),
        );


        $this->db->insert('po_orders_items', $data);
        
      //  echo $qty.'</br>'.$itemPrice.'</br>'.$lineprice;
        $id = $this->input->post('poid');
        $redirect = '' . base_url() . 'index.php/po/view/' . $id . '';
       redirect($redirect);
    }
    
    function delete_item($id) {
        $id = $this->input->post('itemID',True);
       $poid = $this->input->post('poid');
        //$this->db->select('*');
        //$this->db->where('item_id', $id);
        //$this->db->from('po_orders_items');
       //$vendor_item = $this->db->get();
        //foreach ($vendor_item->result() as $r) {
       //}
        //$po = $r->po_id;
        
        $this->db->where('item_id', $id)->delete('po_orders_items');

        //$this->load->model('mdl_sales_orders');
        //$this->mdl_sales_orders->_delete($id);
        //$redirect = '' . base_url() . 'po/view/' . $poid . '';
        //redirect($redirect);
  
       $redirect = '' . base_url() . 'index.php/po/view/' . $poid . '';
        redirect($redirect);
    }

    
    function save(){
        $id = $this->input->post('id');
        $data = array(
          'Grand_total' => $this->input->post('total'),
          'total_cbm' => $this->input->post('cbm'),  
        );
        
        $this->db->where('PO_id',$id)
                ->update('po_orders',$data);
        
        $redirect = '' . base_url() . 'index.php/po/view/'.$id.'';
        redirect($redirect);
    }
    
    
    function saveandexit(){
        $id = $this->input->post('id');
        $data = array(
          'Grand_total' => $this->input->post('total'),
            'total_cbm' => $this->input->post('cbm'),
        );
        
        $this->db->where('PO_id',$id)
                ->update('po_orders',$data);
        
        $redirect = '' . base_url() . 'index.php/po';
        redirect($redirect);
    }
    
    function addtowarehouse(){
  
    $id = $this->input->post('id');
    $data= array(
     'CCL_Item'=> $this->input->post('CCL_Item'),
     'Description'=> $this->input->post('Description'),
     
     'CTN_L'=> $this->input->post('L'),
     'CTN_W'=> $this->input->post('W'),
     'CTN_H'=> $this->input->post('H'),
     'QTY_CTN'=> $this->input->post('QTY_CTN'),
     'qty'=> $this->input->post('qty'),
     'DDU_Px'=> $this->input->post('DDU_Px'),
        'EUR_Px'=> $this->input->post('DDU_Px'),
        'buy_price'=> $this->input->post('buy_price'),
     'sell_price'=> $this->input->post('sell_price'),
        'vendors_name'=> $this->input->post('vendor')
		
            );
    
            $this->db->insert('warehouse',$data);
            
            
             $redirect = '' . base_url() . 'index.php/po/view/'.$id.'';
            redirect($redirect);
}
      
    function stock_location( $id , $received){
        
        //$id = $this->input->post('myitemid');
       // $location = $this->input->post('location');
       // $qty  = $this->input->post('qty');
     
       
         $new_location = $this->input->post('newlocation');  
         $new_qty =  $this->input->post('moveqty');
          
       $qty_newqty = $qty - $new_qty;
  
 
       $update = array(
           'qty'=>$qty_newqty
       );
          $this->db->where('id',$id)
                  ->update('warehouse',$update);
          
          
          
        
        $this->db->select('*');
        $this->db->where('id',$id);
        $move_item = $this->db->get('warehouse');
         
        
        foreach ($move_item->result() as $field) {
            $data = array(
                    
                    'CCL_Item' => $field->CCL_Item,
                    'Description' => $field->Description,
                    'qty' => $new_qty,
                    'sell_price' => $field->sell_price,
                    'buy_price' => $field->buy_price,
                    'PO' => $field->PO,
                    
                   'Product_Weight' => $field->Product_Weight,
                    'L' => $field->L,
                    'W' => $field->W,
                    'H' => $field->H,
                    'Material' => $field->Material,
                    'location' => $new_location,
                     'DDU_Px' => $field->DDU_Px,
                    'QTY_CTN' => $field->QTY_CTN,
                    'CTN_CBM' => $field->CTN_CBM,
                    'GW_CTN' => $field->GW_CTN,
                    'CTN_L' => $field->CTN_L,
                    'CTN_W' => $field->CTN_W,
                    'CTN_H' => $field->CTN_H,
                     'notes' => $field->notes,
                    'vendor_code' => $field->vendor_code,
                    'vendors_name' => $field->vendors_name,
                    
                );
                
            
        }
        $this->db->insert('warehouse',$data);
         $redirect = '' . base_url() . 'index.php/warehouse/';
            redirect($redirect);
        
    }

	
	//update qty price/ total
	
    function update_po( $id ){
        
             $item_id= $this->input->post('item_id');
             $carton_ordered= $this->input->post('carton_ordered');	
		     $CTN_QTY= $this->input->post('CTN_QTY');
		     $CBM= $this->input->post('CBM');
	         $po_refer= $this->input->post('po_refer');
	         $product_id= $this->input->post('wh_id');
		 
		     $ItemPrice= $this->input->post('ItemPrice');          
             $new_qty=$carton_ordered*$CTN_QTY;
  
 
       $update = array(
           'item_qty'=>$new_qty,
		   'ItemPrice'=>$ItemPrice,
		   'itemlinetotal'=>$carton_ordered*$CTN_QTY*$ItemPrice,
		   'carton_ordered'=> $carton_ordered,
		   'CBM'=>$CBM*$carton_ordered
       );
          $this->db->where('item_id',$item_id)
                   ->update('po_orders_items',$update);
          
          

         
        
        
          $redirect = '' . base_url() . 'index.php/po/view/' . $id . '';
        redirect($redirect);
        
    }

	
    function update_total( $id ){
        
            
             $Grand_total= $this->input->post('Grand_total');	
		     $freight_cost= $this->input->post('freight_cost');
		     $duty= $this->input->post('duty');
	         $vat_percent= $this->input->post('vat_percent');
            $vat_amount=($vat_percent/100)*($Grand_total);
            $inc_vat= ($vat_amount+$Grand_total);
 
       $update = array(
           
		   'freight_cost'=>$freight_cost,
		   'duty'=>$duty,
		   'vat_percent'=>$vat_percent,
		   'VAT_ammount'=> $vat_amount,
		   'inc_vat'=>$inc_vat
       );
          $this->db->where('PO_id',$id)
                   ->update('po_orders',$update);
          
        
          $redirect = '' . base_url() . 'index.php/po/view/' . $id . '';
        redirect($redirect);
        
    }

	
	
	
	
  // edit po
    function pending_to_placed(){
     
	 $po_id =$this->input->post('po_id');
     $po_status = array('status' => 'Placed',);
    


    $this->db->where('PO_id',$po_id); 
    $this->db->update('po_orders',$po_status); 
   $redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
    }
    function placed_to_received(){
     
	 $po_id =$this->input->post('po_id');
     $po_status = array('status' => 'Received',);
    


    $this->db->where('PO_id',$po_id); 
    $this->db->update('po_orders',$po_status); 
	$redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
  
    }
    function received_to_completed(){
     
	 $po_id =$this->input->post('po_id');
     $po_status = array('status' => 'Completed',);
    


    $this->db->where('PO_id',$po_id); 
    $this->db->update('po_orders',$po_status); 
  $redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
    }
  
  
  
  
	 function po_eta(){
    $id = $this->input->post('po_Id');
	 $ETA = $this->input->post('ETA');
	  $ETD = $this->input->post('ETD');
    echo $id;
    $data = array(
        
        'ETA'=> $this->input->post('ETA'),
        'ETD'=> $this->input->post('ETD'),
        
    );
    
    $this->db->where('PO_id',$id)
                ->update('po_orders',$data);
    
    
       $redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
}
	 

    function notes(){
    
    echo  $this->input->post('po_notes');
    $id = $this->input->post('poid');
    echo $id;
        $data = array(
       'po_notes'=>  $this->input->post('po_notes'),
         
     );
    $this->db->where('PO_id',$id)
            ->update('po_orders',$data);
    
}
	
    function delete($id){
    $this->db->where('PO_id',$id)
            ->delete('po_orders');
	$this->db->where('po_id',$id)
            ->delete('po_orders_items');		
	$this->db->where('po_id',$id)
            ->delete('po_payments');		
     $redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
}

    function shippingupdate(){
        $this->load->model('mdl_po');
	    $id= $this->input->post('elementid');
	    
		$Grand_total = $this->mdl_po->total($id);
        $newvalue =$this->input->post('newvalue');
       
        $data = array(
         'freight_cost'=>$newvalue,
         'VAT_ammount'=>($newvalue+$Grand_total)*(0.2),
         'inc_vat'=>($newvalue+$Grand_total)*(1.2), 
  		 
        );
       
       //$this->db->where('salesorder_id',$id);
      // $this->db->update('sales_orders',$data);
        $query=$this->db->where('PO_id',$id)
	                     ->update('po_orders',$data);
	    echo $newvalue;
	   
   }   

    //<!--  receive + SPLIT ORDER-------------------------->
   
   
    function received_(){
    $datestring = " %Y-%m-%d";
    $time = time();
    $dateraised =  mdate($datestring, $time);
    
	$currency= $this->input->post('currency');   
    $id= $this->input->post('id');
    $itemQty= $this->input->post('itemQty');
    $received= $this->input->post('recevied');
	$location= $this->input->post('location');
	$po_refer= $this->input->post('po_refer');
	$product_id= $this->input->post('wh_id');
	
	
	
		$this->db->select('*');
        $product_item =$this->db->where('id', $product_id)
		                           ->get('warehouse');
     
		foreach ($product_item->result() as $p) {
		
		}
		
		
		$this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        $po_item = $this->db->get();

        //inputs po information from sales table
       
	
	
	 
   


 foreach ($po_item->result() as $r) { // loop over results
          
		   }

        if($received === $itemQty)
       {
       
//inputs po information from sales table
        //foreach ($po_item->result() as $r) 
		{ // loop over results
          $po_items = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $r->item_qty,
                'buy_price' => $r->ItemPrice,
             // 'location' => 'holding area',
			 'location' => $location,
              //'vendor_name'=>$r->vendor,
                'date_delivered'=>$dateraised,
			    'po_item_id' => $r->item_id,
				'product_id'  => $r->product_id,
				 'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   
            );  
          
        $this->db->insert('warehouse', $po_items); // insert each row to another table
        $wh_id = $this->db->insert_id();
         $data = array(
        'booked_in'=>'Yes',
		'received'=>'YES',
		//'wh_item_id' => $wh_id ,
      ); 
       
        $this->db->where('item_id', $id);
        $this->db->update('po_orders_items',$data);
        //echo 'done all is fine';
		
    }
    
        }
    
    else{
         if($received < $itemQty){

        $this->db->select('*');
        $this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        //$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $po_item = $this->db->get();

        $totalrecevied = $itemQty - $received;
  
//inputs invoice information from sales table
        //foreach ($po_item->result() as $r) 
		{ // loop over results
            
        $newtotal =  $r->ItemPrice * $received ;
        
          $po_items_less = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $received,
                'buy_price' => $r->ItemPrice,
              // 'location' => 'holding area',
			   'location' => $location,
               'date_delivered'=>$dateraised,
			    'po_item_id' => $r->item_id,
				'product_id'  => $r->product_id,
				 'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   
            );  
          
        $this->db->insert('warehouse', $po_items_less);
		$wh_id = $this->db->insert_id();
    
		 // this array inserts new total and books item in as booked 
        $data = array(
        'booked_in'=>'Yes',
            'itemlinetotal'=>$newtotal,
            'item_qty'=>$received,
			'received'=>'YES',
			
      );
        
        $this->db->where('item_id', $r->item_id);
        $this->db->update('po_orders_items',$data);// insert each row to another table  
         
       
	   
	   $this->db->where('po_refer', $id);
       $query=$this->db->get('po_orders');   
       $num_rows = $query->num_rows();
		if ($po_refer ===null)
		{
		//2015/02/10   viola add
		 $rec = array(
		 
		
		            );
		}
		else
		{
		
	        $rec = array(
		       'po_refer'=>$po_refer,
		       //'status'=>'Received',
			   'po_refer_num'=>'1',
			   'split_po'=>'YES',
		     );
		}
		$this->db->where('PO_id', $r->po_id);
        $this->db->update('po_orders',$rec);
         //****begin to split po which for less qtY** 
		
		
		
		
		{   //1. split po
		      
		             if ($num_rows >'0'){
	                        $po_refer_num =$num_rows+2;
							$po_refer=$query;
		                }
	                   else
	                    {
                            $po_refer_num='2';
							$po_refer=$r->po_id;
	                    }
		 
		 
		 /*if($r->backorder === 'Yes')
			{
			    $po_refer=$r->po_refer;
			}
			else
			{
			    $po_refer= $r->po_id;
			}*/
                 $po_split = array(
                        'dateraised' => $dateraised,
                        'split_po'=>'YES',
			            'po_refer'=>$po_refer,
			            'po_refer_num'=>$po_refer_num,
			            'Vendor_name' => $r->vendor,
                        'currency'=> $currency,
                 );
                $this->load->model('mdl_po');
                $this->db->insert('po_orders', $po_split);
                //gets last inserted id 
                $split_po_id = $this->db->insert_id();
               
         
           $payments = array(
                'po_id' => $split_po_id,
				'payment_dateraised' =>$dateraised,
				//'po_id' => $split_po_id,
				'vendor' =>$r->vendor,
        );
         
          $this->db->insert('po_payments', $payments);
        
		//2. creat new po_order_item for backorder  
		$po_split_item = array(
            'po_id' =>  $split_po_id,
            'vendor_code' => $r->vendor_code,
            'CCL_Item' => $r->CCL_Item,
            'Description' => $r->Description,
            'CTN_QTY' => $r->CTN_QTY,
            'item_qty' => $totalrecevied,
            //'carton_ordered' =>  $this->input->post('carton_ordered'),
            'CBM' => $r->CBM,
            'ItemPrice'=>  $r->ItemPrice,
            'itemlinetotal' =>  $r->ItemPrice*$totalrecevied,
           'CTN_W'=>$r->CTN_W,
            'CTN_L'=>$r->CTN_L,
            'CTN_H'=>$r->CTN_H,
            'vendor'=>$r->vendor,
            'wh_item_id' => $r->wh_item_id,
			'backorder' => 'YES',
               );


        $this->db->insert('po_orders_items', $po_split_item);
		
		}
         //****end to split po which for less qtY**  

       // echo ' Done but did not receive full amount'.$totalrecevied.'is on backorder';
    }
 
    }

        }
	
	 $redirect = '' . base_url() . 'index.php/po/view/' .$r->po_id . '';
        redirect($redirect);

	
	
	
	
	
	
	
	
	
	
	//$data ['item'] = $this->stock_location($id,$received);
}


   
   
   
   
    function received_USD(){
    
    $datestring = " %Y-%m-%d";
    $time = time();

    $dateraised =  mdate($datestring, $time);
    $id= $this->input->post('id');
    $itemQty= $this->input->post('itemQty');
    $received= $this->input->post('recevied');
    $location= $this->input->post('location');
	$po_refer= $this->input->post('po_refer');
    $product_id= $this->input->post('wh_id');
	
	
	
		$this->db->select('*');
        
		
		
		  $product_item =$this->db->where('id', $product_id)
		                           ->get('warehouse');
      //  $this->db->from('warehouse_product');
       // $product_item = $this->db->get(warehouse_product);
		foreach ($product_item->result() as $p) {
		
		}
		
		
		$this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        $po_item = $this->db->get();

//inputs po information from sales table
        foreach ($po_item->result() as $r) { // loop over results
          
		   }
	
	
	
	
	
	
	
	
	
	
	
	if($received === $itemQty)
    {
        


		
		  
		  
		  $po_items = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $r->item_qty,
                'DDU_Px' => $r->ItemPrice,             
			    'location' => $location,             
                'date_delivered'=>$dateraised,
              //'CTN_L' => $r->CTN_L,
             // 'CTN_H' => $r->CTN_H,
             // 'CTN_W' => $r->CTN_W,
			   'po_item_id' => $r->item_id,
			   'product_id'  => $r->product_id,
			   
			   
			   
			   'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   
			   

			   
            );  
          
            $this->db->insert('warehouse', $po_items); // insert each row to another table
        
        
        
        $data = array(
        'booked_in'=>'Yes',
		'received'=>'YES',
      );
       
        $this->db->where('item_id', $id);
        $this->db->update('po_orders_items',$data);
       // echo 'done all is fine';
   
    
        }
    
    else{
        if($received < $itemQty)
    {
        $this->db->select('*');
        $this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        //$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $po_item = $this->db->get();

        $totalrecevied = $itemQty - $received;
//inputs invoice information from sales table
        

		
		
		
		//foreach ($po_item->result() as $r) 
		{ // loop over results
            
        $newtotal =  $r->ItemPrice * $received ;
        
          $po_items_less = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $received,				
                'DDU_Px' => $r->ItemPrice,
               //'location' => 'holding area',
			    'location' => $location,
               //'vendor_name'=>$r->vendor,
               'date_delivered'=>$dateraised,
			    'po_item_id' => $r->item_id,
				'product_id'  => $r->product_id,
				
				
				'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
				
				
				
				
            );  
         $this->db->insert('warehouse', $po_items_less);
		 $wh_id = $this->db->insert_id(); 
          
		  // this array inserts new total and books item in as booked 
        $data = array(
        'booked_in'=>'Yes',
            'itemlinetotal'=>$newtotal,
             'item_qty'=>$received,
            'received'=>'YES',
      );
          
            
        $this->db->where('item_id', $id);
        $this->db->update('po_orders_items',$data);// insert each row to another table
        
		//2015/02/10   viola add
		 $rec = array(
		 
		// 'status'=>'Received',
		 'po_refer_num'=>'1',
		);
		$this->db->where('PO_id', $r->po_id);
        $this->db->update('po_orders',$rec);
         //****begin to split po which for less qtY** 
		 
		 $this->db->where('po_refer', $id);
         $query=$this->db->get('po_orders');   
         $num_rows = $query->num_rows();
		if ($po_refer ===null) //if(empty($a1))
		{
		//2015/02/10   viola add
		 $rec = array(
		 
		// 'status'=>'Received',
		 'po_refer_num'=>'1',
		 'split_po'=>'YES',
		            );
		}
		else
		{
		
	        $rec = array(
		 'po_refer'=>$po_refer,
		 //'status'=>'Received',
		     );
		}
		$this->db->where('PO_id', $r->po_id);
        $this->db->update('po_orders',$rec);
         //****begin to split po which for less qtY** 
		
		
		}
		

		 //1. split po
		 if ($num_rows >'0'){
	                        $po_refer_num =$num_rows+2;
							$po_refer=$query;
		    }
	     else
	        {
                            $po_refer_num='2';
							$po_refer=$r->po_id;
	        }
         $po_split = array(
            'dateraised' => $dateraised,
            'split_po'=>'YES',
			'po_refer'=>$po_refer,
			'po_refer_num'=>$po_refer_num,
		
			'Vendor_name' => $r->vendor,
            'currency'=> 'USD',
        );
        $this->load->model('mdl_po');
        $this->db->insert('po_orders', $po_split);
        //gets last inserted id 
         $split_po_id = $this->db->insert_id();
               
         
           $payments = array(
            'po_id' => $split_po_id,
			'payment_dateraised' =>$dateraised,
			'vendor' =>$r->vendor,
        );
         
          $this->db->insert('po_payments', $payments);
        
		//2. creat new po_order_item for backorder  
		$po_split_item = array(
            'po_id' =>  $split_po_id,
            'vendor_code' => $r->vendor_code,
            'CCL_Item' => $r->CCL_Item,
            'Description' => $r->Description,
            'CTN_QTY' => $r->CTN_QTY,
            'item_qty' => $totalrecevied,
            //'carton_ordered' =>  $this->input->post('carton_ordered'),
            'CBM' => $r->CBM,
            'ItemPrice'=>  $r->ItemPrice,
            'itemlinetotal' =>  $r->ItemPrice*$totalrecevied,
           'CTN_W'=>$r->CTN_W,
            'CTN_L'=>$r->CTN_L,
            'CTN_H'=>$r->CTN_H,
            'vendor'=>$r->vendor,
            'wh_item_id' => $r->wh_item_id,
			'backorder' => 'Yes',
        );


        $this->db->insert('po_orders_items', $po_split_item);
		
		
         //****end to split po which for less qtY**  
		
		
	
		
		
		
		//echo ' Done but did not receive full amount'.$totalrecevied.'is on backorder';
    


	
	}
 
   }
    $redirect = '' . base_url() . 'index.php/po/view/' .$r->po_id . '';
        redirect($redirect);
}

function received_EUR(){
    
       $datestring = " %Y-%m-%d";
$time = time();

$dateraised =  mdate($datestring, $time);
    $id= $this->input->post('id');
    $itemQty= $this->input->post('itemQty');
    $received= $this->input->post('recevied');
     $location= $this->input->post('location');
	 $po_refer= $this->input->post('po_refer');
	 $product_id= $this->input->post('wh_id');
	
	
	
		$this->db->select('*');
        
		
		
		  $product_item =$this->db->where('id', $product_id)
		                           ->get('warehouse');
      //  $this->db->from('warehouse_product');
       // $product_item = $this->db->get(warehouse_product);
		foreach ($product_item->result() as $p) {
		
		}
		
		
		$this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        $po_item = $this->db->get();

//inputs po information from sales table
        foreach ($po_item->result() as $r) { // loop over results
          
		   }
    if($received === $itemQty){
    
        $this->db->select('*');
        $this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
       $po_item = $this->db->get();

//inputs po information from sales table
        //foreach ($po_item->result() as $r) 
		{ // loop over results
          $po_items = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $r->item_qty,
                'EUR_Px' => $r->ItemPrice,
              //'location' => 'holding area',
			   'location' => $location,
              //'vendor_name'=>$r->vendor,
               'date_delivered'=>$dateraised,
			    'po_item_id' => $r->item_id,
				'product_id'  => $r->product_id,
				
				 'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   
				
            );  
          
        $this->db->insert('warehouse', $po_items); // insert each row to another table
        $wh_id = $this->db->insert_id();
        
        
        $data = array(
        'booked_in'=>'Yes',
		//'wh_item_id' => $wh_id ,
		'received'=>'YES',
      );
       
        $this->db->where('item_id', $id);
        $this->db->update('po_orders_items',$data);
       // echo 'done all is fine';
    }
    
        }
    
    else if($received < $itemQty){
                                
        $this->db->select('*');
        $this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        //$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $po_item = $this->db->get();

        $totalrecevied = $itemQty - $received;
//inputs invoice information from sales table
        //foreach ($po_item->result() as $r) 
        { // loop over results
            
        $newtotal =  $r->ItemPrice * $received ;
        
          $po_items_less = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $received,
                'EUR_Px' => $r->ItemPrice,
              // 'location' => 'holding area',
			   'location' => $location,
              // 'vendor_name'=>$r->vendor,
               'date_delivered'=>$dateraised,
			     'po_item_id' => $r->item_id,
				 'product_id'  => $r->product_id,
				 
				  'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   

				 
            );  
           $this->db->insert('warehouse', $po_items_less);
		  $wh_id = $this->db->insert_id();
          // this array inserts new total and books item in as booked 
  
         $data = array(
        'booked_in'=>'Yes',
		'itemlinetotal'=>$newtotal,
             'item_qty'=>$received,
			   'received'=>'YES',
		//'wh_item_id' => $wh_id ,
         );

        $this->db->where('item_id', $id);
        $this->db->update('po_orders_items',$data);// insert each row to another table
 

   
		if ($po_refer ===null) //if the first/original  PO to be splited as 1.1
		{
		//2015/02/10   viola add
		 $rec = array(
		 
		// 'status'=>'Received',
		 'po_refer_num'=>'1',
		// 'split_po'=>'YES',
		            );
		}
		else //if the PO been splited as 1.2/1.3/1.4....
		{
		
	               
		}	 
		            $this->db->where('PO_id', $r->po_id);
                    $this->db->update('po_orders',$rec);
        
		
		//****begin to split po which for less qtY** 
		            //1. split po
		$this->db->where('po_refer', $id);
        $query=$this->db->get('po_orders');   
        $num_rows = $query->num_rows();
		            if ($num_rows >'0'){
	                        $po_refer_num =$num_rows+2;
			                $po_refer=$query;
		                }
	               else
	                {
                             $po_refer_num='2';
				             $po_refer=$r->po_id;
	                }
		
	
         $po_split = array(
            'dateraised' => $dateraised,
            'split_po'=>'YES',
			'po_refer'=>$po_refer,
			//'po_refer_num'=>
			'Vendor_name' => $r->vendor,
            'currency'=> 'EUR',
        );
        $this->load->model('mdl_po');
        $this->db->insert('po_orders', $po_split);
        //gets last inserted id 
         $split_po_id = $this->db->insert_id();
               
         
           $payments = array(
            'po_id' => $split_po_id,
		    'payment_dateraised' =>$dateraised,
			'vendor' =>$r->vendor,
        );
         
          $this->db->insert('po_payments', $payments);
        
		//2. creat new po_order_item for backorder  
		$po_split_item = array(
            'po_id' =>  $split_po_id,
            'vendor_code' => $r->vendor_code,
            'CCL_Item' => $r->CCL_Item,
            'Description' => $r->Description,
            'CTN_QTY' => $r->CTN_QTY,
            'item_qty' => $totalrecevied,
            //'carton_ordered' =>  $this->input->post('carton_ordered'),
            'CBM' => $r->CBM,
            'ItemPrice'=>  $r->ItemPrice,
            'itemlinetotal' =>  $r->ItemPrice*$totalrecevied,
           'CTN_W'=>$r->CTN_W,
            'CTN_L'=>$r->CTN_L,
            'CTN_H'=>$r->CTN_H,
            'vendor'=>$r->vendor,
            'wh_item_id' => $r->wh_item_id,
			'backorder' => 'Yes',
			
        );


        $this->db->insert('po_orders_items', $po_split_item);
		
		
         //****end to split po which for less qtY**  

	   echo ' Done but did not receive full amount'.$totalrecevied.'is on backorder';
                 }
 
            }

		 $redirect = '' . base_url() . 'index.php/po/view/' .$r->po_id . '';
        redirect($redirect);  
	}

function received_GBP(){
    $datestring = " %Y-%m-%d";
    $time = time();
    $dateraised =  mdate($datestring, $time);
       
    $id= $this->input->post('id');
    $itemQty= $this->input->post('itemQty');
    $received= $this->input->post('recevied');
	$location= $this->input->post('location');
	$po_refer= $this->input->post('po_refer');
	$product_id= $this->input->post('wh_id');
	
	
	
		$this->db->select('*');
        
		
		
		  $product_item =$this->db->where('id', $product_id)
		                           ->get('warehouse');
      //  $this->db->from('warehouse_product');
       // $product_item = $this->db->get(warehouse_product);
		foreach ($product_item->result() as $p) {
		
		}
		
		
		$this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        $po_item = $this->db->get();

//inputs po information from sales table
        foreach ($po_item->result() as $r) { // loop over results
          
		   }
	
	
	 
   




   if($received === $itemQty)
    {
       
//inputs po information from sales table
        //foreach ($po_item->result() as $r) 
		{ // loop over results
          $po_items = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $r->item_qty,
                'buy_price' => $r->ItemPrice,
             // 'location' => 'holding area',
			 'location' => $location,
              //'vendor_name'=>$r->vendor,
                'date_delivered'=>$dateraised,
			    'po_item_id' => $r->item_id,
				'product_id'  => $r->product_id,
				 'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   
            );  
          
        $this->db->insert('warehouse', $po_items); // insert each row to another table
        $wh_id = $this->db->insert_id();
         $data = array(
        'booked_in'=>'Yes',
		'received'=>'YES',
		//'wh_item_id' => $wh_id ,
      ); 
       
        $this->db->where('item_id', $id);
        $this->db->update('po_orders_items',$data);
        //echo 'done all is fine';
		
    }
    
        }
    
    else{
        if($received < $itemQty)
    {
        $this->db->select('*');
        $this->db->where('item_id', $id);
        $this->db->from('po_orders_items');
        //$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $po_item = $this->db->get();

        $totalrecevied = $itemQty - $received;
  
//inputs invoice information from sales table
        //foreach ($po_item->result() as $r) 
		{ // loop over results
            
        $newtotal =  $r->ItemPrice * $received ;
        
          $po_items_less = array(
                //'item_id' => $r->item_id,
                'PO' => $r->po_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'qty' => $received,
                'buy_price' => $r->ItemPrice,
              // 'location' => 'holding area',
			   'location' => $location,
               'date_delivered'=>$dateraised,
			    'po_item_id' => $r->item_id,
				'product_id'  => $r->product_id,
				 'Category'=> $p->Category,
			    'sell_price' => $p->sell_price,
               // 'buy_price' => $p->buy_price,
			  
                    'L' => $p->L,
                    'W' => $p->W,
                    'H' => $p->H,
					 'QTY_CTN' => $p->QTY_CTN,
					  'Product_Weight' => $p->Product_Weight,
                    'CTN_CBM' => $p->CTN_CBM,
                    'GW_CTN' => $p->GW_CTN,
                    'Material' => $p->Material,             
                    'vendor_code' => $p->vendor_code,
                    'vendors_name' => $p->vendors_name,
					'CTN_L' => $p->CTN_L,
                    'CTN_W' => $p->CTN_W,
                    'CTN_H' => $p->CTN_H,
                     'notes' => $p->notes,
                   
            );  
          
        $this->db->insert('warehouse', $po_items_less);
		 $wh_id = $this->db->insert_id();
    
		 // this array inserts new total and books item in as booked 
        $data = array(
        'booked_in'=>'Yes',
            'itemlinetotal'=>$newtotal,
            'item_qty'=>$received,
			'received'=>'YES',
			
      );
        
        $this->db->where('item_id', $r->item_id);
        $this->db->update('po_orders_items',$data);// insert each row to another table  
         
$this->db->where('po_refer', $id);
$query=$this->db->get('po_orders');   
$num_rows = $query->num_rows();
		if ($po_refer ===null)
		{
		//2015/02/10   viola add
		 $rec = array(
		 
		// 'status'=>'Received',
		 'po_refer_num'=>'1',
		 'split_po'=>'YES',
		            );
		}
		else
		{
		
	        $rec = array(
		 //'po_refer'=>$po_refer,
		// 'status'=>'Received',
		     );
		}
		$this->db->where('PO_id', $r->po_id);
        $this->db->update('po_orders',$rec);
         //****begin to split po which for less qtY** 
		
		
		
		
		{   //1. split po
		      
		             if ($num_rows >'0'){
	                        $po_refer_num =$num_rows+2;
							$po_refer=$query;
		                }
	                   else
	                    {
                            $po_refer_num='2';
							$po_refer=$r->po_id;
	                    }
		 
		 
		 /*if($r->backorder === 'Yes')
			{
			    $po_refer=$r->po_refer;
			}
			else
			{
			    $po_refer= $r->po_id;
			}*/
                 $po_split = array(
                        'dateraised' => $dateraised,
                        'split_po'=>'YES',
			            'po_refer'=>$po_refer,
			            'po_refer_num'=>$po_refer_num,
			            'Vendor_name' => $r->vendor,
                        'currency'=> 'GBP',
                 );
                $this->load->model('mdl_po');
                $this->db->insert('po_orders', $po_split);
                //gets last inserted id 
                $split_po_id = $this->db->insert_id();
               
         
           $payments = array(
                'po_id' => $split_po_id,
				'payment_dateraised' =>$dateraised,
				//'po_id' => $split_po_id,
				'vendor' =>$r->vendor,
        );
         
          $this->db->insert('po_payments', $payments);
        
		//2. creat new po_order_item for backorder  
		$po_split_item = array(
            'po_id' =>  $split_po_id,
            'vendor_code' => $r->vendor_code,
            'CCL_Item' => $r->CCL_Item,
            'Description' => $r->Description,
            'CTN_QTY' => $r->CTN_QTY,
            'item_qty' => $totalrecevied,
            //'carton_ordered' =>  $this->input->post('carton_ordered'),
            'CBM' => $r->CBM,
            'ItemPrice'=>  $r->ItemPrice,
            'itemlinetotal' =>  $r->ItemPrice*$totalrecevied,
           'CTN_W'=>$r->CTN_W,
            'CTN_L'=>$r->CTN_L,
            'CTN_H'=>$r->CTN_H,
            'vendor'=>$r->vendor,
            'wh_item_id' => $r->wh_item_id,
			'backorder' => 'YES',
               );


        $this->db->insert('po_orders_items', $po_split_item);
		
		}
         //****end to split po which for less qtY**  

       // echo ' Done but did not receive full amount'.$totalrecevied.'is on backorder';
    }
 
    }

        }
	
	 $redirect = '' . base_url() . 'index.php/po/view/' .$r->po_id . '';
        redirect($redirect);
}

    //<!--  make payment-------------------------->


    function paid(){

	
	$datestring = " %Y-%m-%d";
    $time = time();

    $dateraised =  mdate($datestring, $time);
     
        $id = $this->input->post('id');
        $data = array(
          'amount' => $this->input->post('paid'),
            'date_paid' =>$dateraised,
            'po_id' => $this->input->post('id'),
            'vendor' => $this->input->post('vendor'),
            
        );
    $this->db->insert('po_payments',$data);
        
 
        
        $redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
    
    }

    function payment(){
    $id = $this->input->post('bookId');
    echo $id;
    $data = array(
        'po_id'=> $this->input->post('bookId'),
        'amount'=> $this->input->post('Amount'),
        'method'=> $this->input->post('method'),
        'date_paid'=> $this->input->post('date_paid'),
    );
    
    $this->db->insert('po_payments',$data);
    
    
       $redirect = '' . base_url() . 'index.php/po/';
        redirect($redirect);
}


    function payments_made($payment_id){
    
     $q =  $this->db->select('*')
                ->where('po_id',$payment_id)
                ->get('po_payments');
    
    echo '<table class="table table-striped table-hover font-400 font-14">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>PaymentType</th>
                                                    <th>
                                            <div class="text-center">Amount</div>
                                            </th>
                                            <th>
                                            <div class="text-right hidden-xs">Date Logged</div>
                                            </th>
                                            <th>
                                            <div class="text-right"></div>
                                            </th>
                                            </tr>
                                            </thead>
                                            <tbody>';
        foreach ($q->result() as $value) {
            
         
                                                
                                             echo'   <tr>
                                                    <td>'.$value->payment_id.'</td>
                                                    <td>'.$value->method.'</td>
                                                    <td>
                                                        <div class="text-center"></i>'.$value->amount.'</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right hidden-xs"> <strong>'.$value->payment_dateraised.'</strong></div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"></div>
                                                    </td>
                                                </tr> ';                                              
                                       
            
        }
        echo'     </tbody>
                                        </table>';
    
}
        

    function pdf($id) {
   
	  	     

	  	$data['page_title'] = $this->lang->line("Sales Order");
                
                
        $this->load->model('mdl_po');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('businesses/mdl_customers');

         $data ['po'] = $this->mdl_po->get_po($id);
        $data ['po_items'] = $this->mdl_po->get_where($id);
        //$data['total'] = $this->mdl_sales_orders->total($id);
	$this->load->view('pdf_po_view', $data);
        
         $html =  $this->load->view('pdf_po_view', $data, TRUE);
	 
	 	$this->load->library('MPDF/mpdf');
			  $id = '11';
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		$name = "PO_".$id.".pdf";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		$mpdf->Output($name, 'D'); 

		exit;

               
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