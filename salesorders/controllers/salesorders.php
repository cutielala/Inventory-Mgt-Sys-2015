
<?php

class Salesorders extends MX_Controller {

    function __construct() {
        parent::__construct();


        $this->load->module('auth');
     /*   if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
		 echo Modules::run('template/dash_head'); 
		 */
    }

    function index() {
        echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
        $data['salesorders'] = $this->mdl_sales_orders->get_order_pending();		                      
        $data['backorders'] = $this->mdl_sales_orders->getbackorders();
        $data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
        //$data['isabackorder'] = $this->mdl_sales_orders->isabackorder();
		$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
		$this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
		// $data ['count_split'] = $this->mdl_sales_orders->count_split($id);
        //$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
        $this->load->view('sales_orders', $data);
    }

 
	    
	function add_inv() {

       /* $this->load->model('mdl_sales_orders');
        $this->load->model('businesses/mdl_customers');
		$this->load->model('invoices/mdl_invoices');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
        $data ['customers'] = $this->mdl_customers->get_so_customers();
		$data ['customers'] = $this->mdl_customers->get_so_customers();
        $this->load->view('add_inv', $data);
    	*/
	
	
        $datestring = " %Y-%m-%d";
        $time = time();
        $datestring2 = " %Y-%m-%d";
        $time2 = time();
		
        $dateraised = mdate($datestring, $time);
		$dateraised2 = mdate($datestring2, $time2);
		
        $data = array(
            'dateraised' => $dateraised,
            'Company_id' => $this->input->post('company'),
            'Customer_id' => $this->input->post('customer_id'),
            'po_number' => $this->input->post('po_number'),
            'buyername' => $this->input->post('buyer_name'),
            'Company_name' => $this->input->post('buyer_name'),
            'Address_1' => $this->input->post('address1'),
            'Address_2' => $this->input->post('address2'),
            'Town_city' => $this->input->post('town_city'),
            'Buyer_Phone_Numbe' => $this->input->post('Phone_number'),
            'Postcode' => $this->input->post('Post_code'),
            'vat_exempt' => $this->input->post('vat_exempt'),
            'County' => $this->input->post('County'),
            'notes' => $this->input->post('notes'),
        );

        $this->load->model('mdl_sales_orders');
        $this->db->insert('sales_orders', $data);
        $id = $this->db->insert_id();
        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $id . '';
        redirect($redirect);
    }

	
    function add_so() {
        $datestring = " %Y-%m-%d";
        $time = time();
		

																			

        $dateraised = mdate($datestring, $time);
		//$dateraised2 = mdate($datestring2, $time2);
        $data = array(
            'dateraised' => $dateraised,
			 'Company_name' => $this->input->post('buyer_name'),
            'Company_id' => $this->input->post('company'),
			 'status' => $this->input->post('status'),
           // 'Customer_id' => $this->input->post('customer_id'),
          /*  'po_number' => $this->input->post('po_number'),
            'status' => $this->input->post('status'),
            'Company_name' => $this->input->post('buyer_name'),
			'buyername' => $this->input->post('contact'),
             'terms' => $this->input->post('terms'),
			
			'Address_1' => $this->input->post('address1'),
            'Address_2' => $this->input->post('address2'),
            //'Town_city' => $this->input->post('town_city'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
            'Buyer_Phone_Numbe' => $this->input->post('Phone_number'),
            'Postcode' => $this->input->post('Post_code'),
            'vat_exempt' => $this->input->post('vat_exempt'),
            'County' => $this->input->post('County'),			
            'so_notes' => $this->input->post('so_notes'),
			
			'ShipToCompanyName' => $this->input->post('ShipToCompanyName'),
			'ship_Address_1' => $this->input->post('ship_address1'),
            'ship_Address_2' => $this->input->post('ship_address2'),
            'ship_County' => $this->input->post('ship_County'),
            'ship_Country' => $this->input->post('ship_Country'),
            'ship_Postcode' => $this->input->post('ship_Post_code'),
			*/
			
			

        );

        $this->load->model('mdl_sales_orders');
        

		$this->db->insert('sales_orders', $data);
      
        $id = $this->db->insert_id();
        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $id . '';
		
		
	  redirect($redirect);
	 
    }
   
    function add_new() {

        $this->load->model('mdl_sales_orders');
        $this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
        $data ['customers'] = $this->mdl_customers->get_so_customers();
        $this->load->view('select_buyer', $data);
    }
   
   
    function select_buyer($id) {
        $datestring = " %Y-%m-%d";
        $time = time();
		
		

        $dateraised = mdate($datestring, $time);
		//$dateraised2 = mdate($datestring2, $time2);
        $data = array(
          //  'dateraised' => $dateraised,
            'Company_id' => $this->input->post('company'),
           // 'Customer_id' => $this->input->post('customer_id'),
         // 'po_number' => $this->input->post('po_number'),
          
            'Company_name' => $this->input->post('buyer_name'),
			'buyername' => $this->input->post('contact'),
             'terms' => $this->input->post('terms'),
			
			'Address_1' => $this->input->post('address1'),
            'Address_2' => $this->input->post('address2'),
            //'Town_city' => $this->input->post('town_city'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
            'Buyer_Phone_Numbe' => $this->input->post('Phone_number'),
            'Postcode' => $this->input->post('Post_code'),
            'vat_exempt' => $this->input->post('vat_exempt'),
            'County' => $this->input->post('County'),			
            'so_notes' => $this->input->post('so_notes'),
			
			
			
			'ShipToCompanyName' => $this->input->post('ShipToCompanyName'),
			'ship_Address_1' => $this->input->post('ship_address1'),
            'ship_Address_2' => $this->input->post('ship_address2'),
            'ship_County' => $this->input->post('ship_County'),
            'ship_Country' => $this->input->post('ship_Country'),
            'ship_Postcode' => $this->input->post('ship_Post_code'),
			 
			
			

        );

        $this->load->model('mdl_sales_orders');
        $this->db->where('salesorder_id', $id);
		$this->db->update('sales_orders', $data);

		//$this->db->insert('sales_orders', $data);
      
        //$id = $this->db->insert_id();
        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $id . '';
		
		
	  redirect($redirect);
	 
    }
   
    function filterByDate(){   //viola
        echo Modules::run('template/dash_head'); 
      $datepickerFrom =$_POST['datepickerFrom'];
      $datepickerTo =$_POST['datepickerTo'];
      $status =$_POST['status'];

       $df=$datepickerFrom;
       $dt=$datepickerTo;
       $datepickerF = substr($df,6,4).'-'.substr($df,0,2).'-'.substr($df,3,2);
       $datepickerT = substr($dt,6,4).'-'.substr($dt,0,2).'-'.substr($dt,3,2);

  
        $data['salesorders'] =  $this->db->select('*') 
	                                     ->where('status',$status )	
				                         ->WHERE ('dateraised >=',$datepickerF,'AND dateraised <=',$datepickerT)
								      //->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerT)
                                         ->get('sales_orders');
					
	    $data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
		$this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();			
	
					
	    $data['date']=array(
                       
                         $datepickerFrom,$datepickerTo,
                         );   
	    if ($status==""){
	       $this->load->view('sales_orders',$data);	
        }
        else		
	        $this->load->view('order_'.$status,$data);			   

 
 
}

	//---------------------------------
// All sales orders viewsbelow
//---------------------------------
    function view($id) {
       
        $this->load->model('mdl_sales_orders');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('businesses/mdl_customers');

        $data ['vat_rate'] = $this->mdl_settings->get_vat();
        $data ['addresses'] = $this->mdl_sales_orders->addresses($id);
		
        $data ['query'] = $this->mdl_warehouse->get1();
		$data ['nostock'] = $this->db->select('*')
                                    // ->where('qty <',' 1')
								     ->group_by('CCL_Item')
									 ->get('warehouse');
        $data ['customer'] = $this->mdl_customers->get_customer($id);
        
        $data ['orders'] = $this->mdl_sales_orders->orders($id);
      

        $data['salesorders'] = $this->db->select('*')
                                        ->where('salesorder_id', $id)
								        ->get('sales_orders');

	    $data ['order_items'] = $this->mdl_sales_orders->order_items($id);
        
		$data ['bk_items'] = $this->mdl_sales_orders->bk_items($id);
        $data ['split'] = $this->mdl_sales_orders->if_has_split($id);
	    $data['total'] = $this->mdl_sales_orders->total($id);
        $this->mdl_sales_orders->sales_total($id);


                //*************************update rate/price**********************************
               /*                                 $addresses= $this->mdl_sales_orders->addresses($id);
			                                    	foreach ($addresses->result() as $address) {
                                                               
                                                         }
                                                    $shipping = $address->shipping_cost;
												    $total= $this->mdl_sales_orders->total($id);
														
											
													
                                                    $incship = $total + $shipping;
                
				                                    $vat_rate=$this->mdl_settings->get_vat();
                                                    foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                     }
                                                            
                                                    if( $address->vat_exempt === 'YES'){
                                                         $vat = 0;  // define what % vat is 
                                                    }
                                                    else{
                                                        $vat = $vat_rate->vat_rate;
                                                    }
                                                           
                                                            $vat_amount = $vat * ($incship / 100);
                                                            $price = $incship + ($vat * ($incship / 100)); // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                           

               
                     
                    $data_price = array(
                        'VAT_Rate' => $vat,
                        'VAT_ammount' => $vat_amount,
                        'inc_vat' => $price_with_vat,           
                        'Grand_total' =>$total,
						'Subtotal_total' =>$total,
                    ); 
                   
$this->db->where('salesorder_id', $id);
$this->db->update('sales_orders', $data_price);*/

			   //*************************update rate/price**********************************
               








    
			
			$this->load->view('view', $data);
			
		



	   
    }

	function view_invoiced($id) {
       
        $this->load->model('mdl_sales_orders');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('businesses/mdl_customers');
         $this->load->model('invoices/mdl_invoices');
		
		
        $data ['vat_rate'] = $this->mdl_settings->get_vat();
        $data ['addresses'] = $this->mdl_sales_orders->addresses($id);
		
        $data ['return_item'] =  $this->db->select('*')
		                            ->where('sales_id',$id)
		                            ->where('so_item_note','return')
		                            ->get('sales_orders_items');
        $data ['customer'] = $this->mdl_customers->get_customer($id);
        
        $data ['orders'] = $this->mdl_sales_orders->orders($id);
      

        $data['salesorders'] = $this->db->select('*')
                                ->where('salesorder_id', $id)
								->join('sales_orders_items','sales_orders_items.sales_id =sales_orders.salesorder_id  ')						          								
								->group_by('sales_orders.salesorder_id')
                                ->get('sales_orders');
	   
	    $data ['order_items'] = $this->mdl_sales_orders->order_items_invoiced($id);
        
        $data['total'] = $this->mdl_sales_orders->total($id);
		$this->mdl_sales_orders->sales_total($id);
		$invoice_info = $this->mdl_invoices->get_invoice_info($id);
		foreach ($invoice_info->result() as $invoice) {}
        if (!empty($invoice)){
	
		    
   
	        $data['payment_made_total'] =$this->mdl_invoices->payment_made_total($invoice->invoice_id);
           
		}
		else
			echo '<h2><STRONG>Important!The invoice has been deleted .</strong></h2>';
		
                //*************************update rate/price**********************************
                          /*                      $addresses= $this->mdl_sales_orders->addresses($id);
			                                    	foreach ($addresses->result() as $address) {
                                                                
                                                         }
                                                    $shipping = $address->shipping_cost;
				                                    $total= $this->mdl_sales_orders->total($id);
                                                    $incship = $total + $shipping;
                
				                                    $vat_rate=$this->mdl_settings->get_vat();
                                                    foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                     }
                                                            
                                                    if( $address->vat_exempt === 'YES'){
                                                         $vat = 0;  // define what % vat is 
                                                    }
                                                    else{
                                                        $vat = $vat_rate->vat_rate;
                                                    }
                                                           
                                                            $vat_amount = $vat * ($incship / 100);
                                                            $price = $incship + ($vat * ($incship / 100)); // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                           

               
                     
                    $data_price = array(
                        'VAT_Rate' => $vat,
                        'VAT_ammount' => $vat_amount,
                        'inc_vat' => $price_with_vat,           
                        'Grand_total' =>$total,
						'Subtotal_total' =>$total,
                    ); 
                   
                    $this->db->where('salesorder_id', $id);
                    $this->db->update('sales_orders', $data_price);
                     $this->db->where('salesorder_id', $id);
					 $this->db->update('invoices', $data_price);*/
			   //*************************update rate/price**********************************
               


	   $this->load->view('view_invoiced', $data);
    }

	
    function view_returned($id) {
       		echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('businesses/mdl_customers');
         $this->load->model('invoices/mdl_invoices');
		
		
        $data ['vat_rate'] = $this->mdl_settings->get_vat();
        $data ['addresses'] = $this->mdl_sales_orders->addresses($id);
		
        $data ['return_item'] =  $this->db->select('*')
		                            ->where('sales_id',$id)
		                            ->where('so_item_note','return')
		                            ->get('sales_orders_items');
        $data ['customer'] = $this->mdl_customers->get_customer($id);
        
        $data ['orders'] = $this->mdl_sales_orders->orders($id);
     

        $data['salesorders'] = $this->mdl_sales_orders->if_returnitem($id);
	   
	   $data ['order_items'] = $this->mdl_sales_orders->order_items_invoiced($id);
        
        $data['total'] = $this->mdl_sales_orders->total($id);
       
$this->mdl_sales_orders->sales_total($id);

                //*************************update rate/price**********************************
                                      /*          $addresses= $this->mdl_sales_orders->addresses($id);
			                                    	foreach ($addresses->result() as $address) {
                                                                
                                                         }
                                                    $shipping = $address->shipping_cost;
				                                    $total= $this->mdl_sales_orders->total($id);
                                                    $incship = $total + $shipping;
                
				                                    $vat_rate=$this->mdl_settings->get_vat();
                                                    foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                     }
                                                            
                                                    if( $address->vat_exempt === 'YES'){
                                                         $vat = 0;  // define what % vat is 
                                                    }
                                                    else{
                                                        $vat = $vat_rate->vat_rate;
                                                    }
                                                           
                                                            $vat_amount = $vat * ($incship / 100);
                                                            $price = $incship + ($vat * ($incship / 100)); // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                           

               
                     
                    $data_price = array(
                        'VAT_Rate' => $vat,
                        'VAT_ammount' => $vat_amount,
                        'inc_vat' => $price_with_vat,           
                        'Grand_total' =>$total,
						'Subtotal_total' =>$total,
                    ); 
                   
                    $this->db->where('salesorder_id', $id);
                    $this->db->update('sales_orders', $data_price);
                     $this->db->where('salesorder_id', $id);
					 $this->db->update('invoices', $data_price);*/
			   //*************************update rate/price**********************************
               













	   $this->load->view('view_returned', $data);
    }

	function view_refund($id) {
        $this->load->model('mdl_sales_orders');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('businesses/mdl_customers');
         $this->load->model('invoices/mdl_invoices');
        $data ['vat_rate'] = $this->mdl_settings->get_vat();
        $data ['addresses'] = $this->mdl_sales_orders->addresses($id);
		
        $data ['return_item'] =  $this->db->select('*')
		                            ->where('sales_id',$id)
		                            ->where('so_item_note','return')
		                            ->get('sales_orders_items');
        $data ['refund'] = $this->db->select('*')
                                    ->where('so_id', $id)
								    ->get('refund');
		
		$data ['customer'] = $this->mdl_customers->get_customer($id);
        
        $data ['orders'] = $this->mdl_sales_orders->orders($id);
      

        $data['salesorders'] = $this->db->select('*')
                                ->where('salesorder_id', $id)
								->join('sales_orders_items','sales_orders_items.sales_id =sales_orders.salesorder_id  ')						          								
								->group_by('sales_orders.salesorder_id')
                                ->get('sales_orders');
	   
	   $data ['order_items'] = $this->mdl_sales_orders->order_items_invoiced($id);
        
        $data['total'] = $this->mdl_sales_orders->total($id);
$this->mdl_sales_orders->sales_total($id);

                //*************************update rate/price**********************************
                 /*                               $addresses= $this->mdl_sales_orders->addresses($id);
			                                    	foreach ($addresses->result() as $address) {
                                                                
                                                         }
                                                    $shipping = $address->shipping_cost;
				                                    $total= $this->mdl_sales_orders->total($id);
                                                    $incship = $total + $shipping;
                
				                                    $vat_rate=$this->mdl_settings->get_vat();
                                                    foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                     }
                                                            
                                                    if( $address->vat_exempt === 'YES'){
                                                         $vat = 0;  // define what % vat is 
                                                    }
                                                    else{
                                                        $vat = $vat_rate->vat_rate;
                                                    }
                                                           
                                                            $vat_amount = $vat * ($incship / 100);
                                                            $price = $incship + ($vat * ($incship / 100)); // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                           

               
                     
                    $data_price = array(
                        'VAT_Rate' => $vat,
                        'VAT_ammount' => $vat_amount,
                        'inc_vat' => $price_with_vat,           
                        'Grand_total' =>$total,
						'Subtotal_total' =>$total,
                    ); 
                   
$this->db->where('salesorder_id', $id);
$this->db->update('sales_orders', $data_price);*/

			   //*************************update rate/price**********************************
               













	   $this->load->view('view_refund', $data);
    }

	
	//update SO info
    function pick() { 
        $soid = $this->input->post('sales_id');    
        $id = $this->input->post('so_item_id');
        $pick = array(
             'pick'  => 'YES',
            );
             
        $this->db->select('*');
        $this->db->where('item_id',$id);
        $this->db->update('sales_orders_items',$pick);

        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
        redirect($redirect); 
   
    }
	
	function pick_all() { 
    
	    $soid = $this->input->post('sales_id');    
 
        $pick = array(
             'pick'  => 'YES',
            );
             
        $this->db->select('*');
        $this->db->where('sales_id',$soid );
        $this->db->update('sales_orders_items',$pick);

        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
        redirect($redirect); 
   
    }
    
	function edit_shipinfo() {
     
		
		$status=$this->input->post('status');
        $id = $this->input->post('salesorder_id');
		 $currency=$this->input->post('currency');
		 
		 if($currency!='GBP'){
		       $vat_exempt='YES'; }
		  else{
			 $vat_exempt= 'NO';
		  }
		  
		  
     // echo $status;
     if (($status ==='pending')or($status ==='shipping')){
		 $data = array(
            
           
         
            'po_number' => $this->input->post('po_number'),
           
            //'status' => $this->input->post('onhold'),
			'Company_name' => $this->input->post('Company_name'),
			'ShipToCompanyName' => $this->input->post('ShipToCompanyName'),
			 'Shipping_Contact_No' => $this->input->post('Shipping_Contact_No'),
           'ship_Address_1' => $this->input->post('ship_Address_1'),
            'ship_Address_2' => $this->input->post('ship_Address_2'),
            'ship_County' => $this->input->post('ship_County'),
            'ship_Postcode' => $this->input->post('ship_Postcode'),
			'Shipping_Email' => $this->input->post('Shipping_Email'),
			'vat_exempt' => $vat_exempt,
			'currency' => $this->input->post('currency'),
			'Buyer_Phone_Numbe' => $this->input->post('Buyer_Phone_Numbe'),
             'Address_1' => $this->input->post('Address_1'),
            'Address_2' => $this->input->post('Address_2'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
			'Postcode' => $this->input->post('Postcode'),

        );

        $this->db->where('salesorder_id', $this->input->post('salesorder_id'));
        $this->db->update('sales_orders', $data);	
		
		 $redirect = '' . base_url() . 'index.php/salesorders/view/' .$this->input->post('salesorder_id'). '';
 
		
	}
	elseif ($status ==='invoiced'){
			$so_data = array(
                     
           
            'po_number' => $this->input->post('po_number'),          
           	'Company_name' => $this->input->post('Company_name'),
			'currency' => $this->input->post('currency'),
			'Buyer_Phone_Numbe' => $this->input->post('Buyer_Phone_Numbe'),
            'Address_1' => $this->input->post('Address_1'),
            'Address_2' => $this->input->post('Address_2'),
			'Town_city' => $this->input->post('County'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
			'Postcode' => $this->input->post('Postcode'),
            'vat_exempt' => $vat_exempt,
			'currency' => $this->input->post('currency'),
			
        );
		 $this->db->where('salesorder_id', $this->input->post('salesorder_id'));
        $this->db->update('sales_orders', $so_data);	
			      $inv_data = array(
                     
            'po_number' => $this->input->post('po_number'),          
           	'Company_name' => $this->input->post('Company_name'),
			'currency' => $this->input->post('currency'),
			'Buyer_Phone_Numbe' => $this->input->post('Buyer_Phone_Numbe'),
            'Address_1' => $this->input->post('Address_1'),
            'Address_2' => $this->input->post('Address_2'),
			'Town_city' => $this->input->post('County'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
			'Postcode' => $this->input->post('Postcode'),

			'currency' => $this->input->post('currency'),
        );
	
	    $this->db->where('salesorder_id', $id);
        $this->db->update('invoices', $inv_data);
		// $redirect = '' . base_url() . 'salesorders/view_invoiced/'.$id.'';
		$redirect = '' . base_url() . 'index.php/salesorders/view_invoiced/' .$this->input->post('salesorder_id'). '';
   // $redirect = '' . base_url() . 'salesorders/view/' . $this->input->post('salesorder_id') . '';
    
	}
	else if ($status==='return'){
		
	}	
    else{
	 $redirect = '' . base_url() . 'index.php/salesorders/view/' .$this->input->post('salesorder_id'). '';
    
    }
	
 
	redirect($redirect);
	 
    }
   
	
    function same_as_billing($id) {
     
        $this->db->where('salesorder_id',$id );
        $this->db->from('sales_orders');
        $boorders=$this->db->get();
        foreach ($boorders->result() as $value) {    
       
        $data = array(
            
           
			'Shipping_Contact_No' => $value->Buyer_Phone_Numbe,
             'ship_Address_1' => $value->Address_1,
            'ship_Address_2' => $value->Address_2,
			'ship_County' => $value->County,
			'ship_Postcode' => $value->Postcode,

        );

       $this->db->where('salesorder_id',$id );
            $this->db->update('sales_orders', $data);	
	    }
	   echo $this->input->post('salesorder_id');
	   $redirect = '' . base_url() . 'index.php/salesorders/view/' .$id. '';
     redirect($redirect);
	 
    }
	
	
	function save_note() { 
	
	$so_id = $this->input->post('so_id');
	 $data = array(
	 'so_notes'=> $this->input->post('so_notes'),
	
	
	);
	
	  $this->db->where('salesorder_id', $so_id);
            $this->db->update('sales_orders',$data);	
		$redirect = '' . base_url() . 'index.php/salesorders/view/' . $so_id . '';
       redirect($redirect); 
   
	
	}
		
	function update_item_qty_price() { 
    
	
	        $this->load->helper('date');
            $onhand_qty = $this->input->post('onhand_qty');
            $new_order_qty = $this->input->post('new_order_qty');
            $org_order_qty = $this->input->post('org_order_qty');
            $itemPrice =$this->input->post('ItemPrice');
			
			
			$CCL_Item = $this->input->post('CCL_Item');
		    $location = $this->input->post('location');
			
			
            $wh_item_id =$this->input->post('wh_item_id');
            $sales_id =$this->input->post('sales_id');
            $sales_orders_rev=$this->input->post('sales_orders_rev');
       // echo $sales_orders_rev;


            $date = date('Y-m-d');
  
  
            $unstock_qty= $new_order_qty-($onhand_qty+$org_order_qty);
  
    if  ($unstock_qty>'0') {//needs split order
   
   //1. update original order/wh qty		
        $lineprice =  $itemPrice * ($onhand_qty+$org_order_qty);
       // $newsoprice = $lineprice * $itemPrice;
		
		
		
        $update_item_qty_price_soitem=array(
              'item_qty'=> $onhand_qty+$org_order_qty,
              //'itemPrice'=> $this->input->post('itemPrice'),
			  'itemPrice'=> $itemPrice,
              'itemlinetotal'=> $lineprice,
            );
        $item_id = $this->input->post('item_id');            
        //$this->db->select('*');
        $this->db->where('item_id', $item_id);
        $this->db->update('sales_orders_items', $update_item_qty_price_soitem);
		
		
	$update_item_qty_price_warehouse= array(
              'qty'=> '0',
          
            );
                    
            $this->db->where('CCL_Item', $CCL_Item);
            $this->db->where('location', $location);
            $this->db->update('warehouse',$update_item_qty_price_warehouse);



        //2. create split order		
	
   
   /////////////////////////
         // if( $bo < '0') 
		  {
           

        //$this->db->select('*');
       

        if ($sales_orders_rev!= null)
		{}
       else //( empty($sales_orders_rev))
		{

        //split so ex:xxxx-1			
                $num = array(
             'sales_orders_rev_num'  => '1',
			 'sales_orders_rev'=>$sales_id,
                 );			
            $this->db->select('*');
            $this->db->where('salesorder_id',$sales_id);
            $this->db->update('sales_orders',$num );			

       }
	  // else{}
	 
	   
	   
	   //split so  ex -2,3,4	
	   $this->db->where('sales_orders_rev', $sales_id);
       $query=$this->db->get('sales_orders');      
       $num_rows = $query->num_rows();
	   

	   
	   if ($num_rows >'0'){
	      $num_rows ++;
		  }
	   else
	   {
       $num_rows='2';
	   }
 $this->db->where('salesorder_id',$sales_id );
        $this->db->from('sales_orders');
        $boorders=$this->db->get();
foreach ($boorders->result() as $value) {    
}
//$total = 
//this adds item as backorder to SO    
       $bosdata = array(
            
			
			'sales_orders_rev' => $value->salesorder_id,
			'sales_orders_rev_num'=> $num_rows,
           // 'Company_name' => $value->buyername,
            'buyername' => $value->buyername,
            'Company_name' => $value->Company_name,
            'Company_id' => $value->Company_id,
         
            'shipping_cost' => $value->shipping_cost,
            //'Grand_total' => $value->Grand_total,
			'vat_exempt' => $value->vat_exempt,
            'VAT_Rate' => $value->VAT_Rate,
           // 'VAT_ammount' => $value->VAT_ammount,
            //'inc_vat' => $value->inc_vat,
            
            'dateraised' => $value->dateraised,
            'po_number' => $value->po_number,
            'status' => $value->status,
            'Address_1' => $value->Address_1,
            'Address_2' => $value->Address_2,
            'Town_city' => $value->Town_city,
			'County' => $value->County,
			 'Country' => $value->Country,
            'Postcode' => $value->Postcode,
            'Buyer_Phone_Numbe' => $value->Buyer_Phone_Numbe,
			
			'ship_Address_1' => $value->ship_Address_1,
            'ship_Address_2' => $value->ship_Address_2,
            'ShipToCompanyName' => $value->ShipToCompanyName,
			'ship_County' => $value->ship_County,
			 'ship_Country' => $value->ship_Country,
            'ship_Postcode' => $value->ship_Postcode,


			
            'so_notes' => $value->so_notes,


            'backorder'=>'YES'
           
      );
       

        $this->db->insert('sales_orders',$bosdata);
        $bosid = $this->db->insert_id();
      
    
       
    //this adds item as backorder to SO    
       $databo = array(
            'sales_id' => $bosid,
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $unstock_qty,
           // 'itemPrice' => $this->input->post('itemPrice'),
		     'itemPrice'=> $itemPrice,
            'itemlinetotal' => $itemPrice *$unstock_qty,
            'location' => $this->input->post('location'),
            'wh_item_id' => $this->input->post('wh_item_id'),
           'backorderitem'=>'YES'
      );
      $this->db->insert('sales_orders_items', $databo);
      
      //$id = $this->input->post('item_id');


       


	   
	   
	   
	   
	   
       
       }  
   
   

   
   
   
    }
    else
   {
   
        $lineprice =  $itemPrice *  $new_order_qty;
         // $newsoprice = $lineprice * $itemPrice;
		
		
		
        $update_item_qty_price_soitem=array(
              'item_qty'=> $new_order_qty,
              //'itemPrice'=> $this->input->post('itemPrice'),
			    'itemPrice'=> $itemPrice,
              'itemlinetotal'=> $lineprice,
            );
        $item_id = $this->input->post('item_id');            
        //$this->db->select('*');
        $this->db->where('item_id', $item_id);
        $this->db->update('sales_orders_items',$update_item_qty_price_soitem);
		
		
	        $update_item_qty_price_warehouse= array(
              'qty'=> $onhand_qty+$org_order_qty-$new_order_qty,
          
            );
                   
            $this->db->where('CCL_Item', $CCL_Item);
            $this->db->where('location', $location);
            $this->db->update('warehouse',$update_item_qty_price_warehouse);	
		
		
		
		
		
    }

      $soid = $this->input->post('sales_id');
   // $id = $this->input->post('sales_id');
       $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
       redirect($redirect); 
   
    }
    

	
	function bk_to_update() { 
    
	
	        
         //   $count = $this->input->post('count');
			 $so_id = $this->input->post('so_id');
			$bk_item_id = $this->input->post('bk_item_id');
            $order_qty = $this->input->post('order_qty');
			
			$CCL_Item = $this->input->post('CCL_Item');
			
			$itemPrice = $this->input->post('itemPrice');
			echo' $so_id'. $so_id.'$order_qty'.$order_qty.'$CCL_Item'.$CCL_Item;
		    $this->import_item_added_location($so_id,$CCL_Item,$order_qty);


	   //this loops read to insert back to so table
        $data = array(
            'backorder' =>'NO',
            );
         //this updates  warehouse side 
        $this->db->select('*');
        $this->db->where('salesorder_id', $so_id);
        $this->db->update('sales_orders',$data);
         
        
     
          $this->db->where('item_id', $bk_item_id);
          $this->db->delete('sales_orders_items');     
       

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  
  
   // $id = $this->input->post('sales_id');
      $redirect = '' . base_url() . 'index.php/salesorders/view/' . $so_id . '';
      redirect($redirect); 
   
    }
	
    function update_bkorder_to_regular() { //no use
    
	
	        
            $count = $this->input->post('count');
			 $so_id = $this->input->post('so_id');
			$bk_item_id = $this->input->post('bk_item_id');
            $bk_qty = $this->input->post('bk_qty');
			
			$CCL_Item = $this->input->post('CCL_Item');
			$Description = $this->input->post('Description');
			$itemPrice = $this->input->post('itemPrice');
			
			echo '$so_id'.$so_id.'$$bk_item_id'.$bk_item_id.'$itemPrice'.$itemPrice;
           // $org_order_qty = $this->input->post('org_order_qty');
           // $itemPrice =$this->input->post('ItemPrice');
            
			for ($i=1;$i<=$count;$i++)
			{
			   $wh_item_id =$this->input->post('wh_item_id'.$i);
			   $qty = $this->input->post('qty'.$i);
			    $location = $this->input->post('location'.$i);
				$available_qty = $this->input->post('available_qty'.$i);
			 echo '<br>$wh_item_id.$i'.$wh_item_id;
			 echo '<br>$qty'.$qty;
			 echo '<br>$$location'.$location;
			 echo '<br>$available_qty'.$available_qty;
			  {


         $lineprice = $itemPrice * $qty;
        
        $data = array(
            'sales_id' => $so_id,
            'CCL_Item' =>$CCL_Item,
            'Description' => $Description,
            'item_qty' => $qty,
            'itemPrice' => $itemPrice,
            'itemlinetotal' => $lineprice,
            'location' => $location,
            'wh_item_id' => $wh_item_id,
         );


        $this->db->insert('sales_orders_items', $data);
      

       
//selects all sales order info and items 
        
             $new_qty = $available_qty - $qty;
      
     
             $allocate_stock = array(
             'qty'  => $new_qty,
                 );
      
              $this->db->where('id',$wh_item_id);
              $this->db->update('warehouse', $allocate_stock); // insert each row to another table
       
            echo '<br>$new_available_qty'.$new_qty;


}
      
			}
	    
        //this loops read to insert back to so table
        $data = array(
            'backorder' =>'NO',
            );
         //this updates  warehouse side 
        $this->db->select('*');
        $this->db->where('salesorder_id', $so_id);
        $this->db->update('sales_orders',$data);
         
        
     
          $this->db->where('item_id', $bk_item_id);
          $this->db->delete('sales_orders_items');     
       

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
  
  /*
    if  ($unstock_qty>'0')//needs split order
    {
   //1. update original order/wh qty		
        $lineprice =  $itemPrice * ($onhand_qty+$org_order_qty);
       // $newsoprice = $lineprice * $itemPrice;
		
		
		
        $update_item_qty_price_soitem=array(
              'item_qty'=> $onhand_qty+$org_order_qty,
              //'itemPrice'=> $this->input->post('itemPrice'),
			  'itemPrice'=> $itemPrice,
              'itemlinetotal'=> $lineprice,
            );
        $item_id = $this->input->post('item_id');            
        //$this->db->select('*');
        $this->db->where('item_id', $item_id);
        $this->db->update('sales_orders_items', $update_item_qty_price_soitem);
		
		
	$update_item_qty_price_warehouse= array(
              'qty'=> '0',
          
            );
                    
            //$this->db->select('*');
            $this->db->where('id', $wh_item_id);
            $this->db->update('warehouse',$update_item_qty_price_warehouse);



        //2. create split order		
	
   
   /////////////////////////
         // if( $bo < '0') 
		  {
           

        //$this->db->select('*');
       

        if ($sales_orders_rev!= null)
		{}
       else //( empty($sales_orders_rev))
		{

        //split so ex:xxxx-1			
                $num = array(
             'sales_orders_rev_num'  => '1',
			 'sales_orders_rev'=>$sales_id,
                 );			
            $this->db->select('*');
            $this->db->where('salesorder_id',$sales_id);
            $this->db->update('sales_orders',$num );			

       }
	  // else{}
	 
	   
	   
	   //split so  ex -2,3,4	
	   $this->db->where('sales_orders_rev', $sales_id);
       $query=$this->db->get('sales_orders');      
       $num_rows = $query->num_rows();
	   

	   
	   if ($num_rows >'0'){
	      $num_rows ++;
		  }
	   else
	   {
       $num_rows='2';
	   }
 $this->db->where('salesorder_id',$sales_id );
        $this->db->from('sales_orders');
        $boorders=$this->db->get();
foreach ($boorders->result() as $value) {    
}
//$total = 
//this adds item as backorder to SO    
       $bosdata = array(
            
			
			'sales_orders_rev' => $value->salesorder_id,
			'sales_orders_rev_num'=> $num_rows,
           // 'Company_name' => $value->buyername,
            'buyername' => $value->buyername,
            'Company_name' => $value->Company_name,
            'Company_id' => $value->Company_id,
         
            'shipping_cost' => $value->shipping_cost,
            //'Grand_total' => $value->Grand_total,
			'vat_exempt' => $value->vat_exempt,
            'VAT_Rate' => $value->VAT_Rate,
           // 'VAT_ammount' => $value->VAT_ammount,
            //'inc_vat' => $value->inc_vat,
            
            'dateraised' => $value->dateraised,
            'po_number' => $value->po_number,
            'status' => $value->status,
            'Address_1' => $value->Address_1,
            'Address_2' => $value->Address_2,
            'Town_city' => $value->Town_city,
			'County' => $value->County,
			 'Country' => $value->Country,
            'Postcode' => $value->Postcode,
            'Buyer_Phone_Numbe' => $value->Buyer_Phone_Numbe,
			
			'ship_Address_1' => $value->ship_Address_1,
            'ship_Address_2' => $value->ship_Address_2,
            'ShipToCompanyName' => $value->ShipToCompanyName,
			'ship_County' => $value->ship_County,
			 'ship_Country' => $value->ship_Country,
            'ship_Postcode' => $value->ship_Postcode,


			
            'so_notes' => $value->so_notes,


            'backorder'=>'YES'
           
      );
       

        $this->db->insert('sales_orders',$bosdata);
        $bosid = $this->db->insert_id();
      
    
       
    //this adds item as backorder to SO    
       $databo = array(
            'sales_id' => $bosid,
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $unstock_qty,
           // 'itemPrice' => $this->input->post('itemPrice'),
		     'itemPrice'=> $itemPrice,
            'itemlinetotal' => $itemPrice *$unstock_qty,
            'location' => $this->input->post('location'),
            'wh_item_id' => $this->input->post('wh_item_id'),
           'backorderitem'=>'YES'
      );
      $this->db->insert('sales_orders_items', $databo);
      
      //$id = $this->input->post('item_id');


       


	   
	   
	   
	   
	   
       
       }  
   
   

   
   
   
    }
    else
   {
   
        $lineprice =  $itemPrice *  $new_order_qty;
         // $newsoprice = $lineprice * $itemPrice;
		
		
		
        $update_item_qty_price_soitem=array(
              'item_qty'=> $new_order_qty,
              //'itemPrice'=> $this->input->post('itemPrice'),
			    'itemPrice'=> $itemPrice,
              'itemlinetotal'=> $lineprice,
            );
        $item_id = $this->input->post('item_id');            
        //$this->db->select('*');
        $this->db->where('item_id', $item_id);
        $this->db->update('sales_orders_items',$update_item_qty_price_soitem);
		
		
	        $update_item_qty_price_warehouse= array(
              'qty'=> $onhand_qty+$org_order_qty-$new_order_qty,
          
            );
                   
            //$this->db->select('*');
            $this->db->where('id', $wh_item_id);
            $this->db->update('warehouse',$update_item_qty_price_warehouse);	
		
		
		
		
		
    }

     
*/
	 
   // $id = $this->input->post('sales_id');
       $redirect = '' . base_url() . 'index.php/salesorders/view/' . $so_id . '';
     redirect($redirect); 
   
    }
	
    function item_added() { 
        
        $bo = $this->input->post('bo');
        $AV = $this->input->post('available');
        $qty = $this->input->post('qty');
        if( $AV >= $qty) {
      


    
         // add new items which available      
           
       
         
         //itemprice with avaiable 
         $itemPrice = $this->input->post('itemPrice');
         //available items * price 
         $lineprice = $itemPrice * $qty;
        
        $data = array(
            'sales_id' => $this->input->post('soid'),
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $qty,
            'itemPrice' => $this->input->post('itemPrice'),
            'itemlinetotal' => $lineprice,
            'location' => $this->input->post('location'),
            'wh_item_id' => $this->input->post('id'),
         );


        $this->db->insert('sales_orders_items', $data);
        $id = $this->input->post('id');
        $soid = $this->input->post('soid');

       
//selects all sales order info and items 
        
             $this->db->select('*');
             $this->db->where('id',$id);
             $this->db->from('warehouse');
             $status=$this->db->get(); 

            foreach($status->result() as $r) { // loop over results

    

             $new_qty = $r->qty - $this->input->post('qty');
      
     
             $allocate_stock = array(
             'qty'  => $new_qty,
                 );
      
            $this->db->where('CCL_Item',$r->CCL_Item);
            $this->db->where('location',$r->location);
       $this->db->where('id',$this->input->post('id'));
      $this->db->update('warehouse', $allocate_stock); // insert each row to another table
       
            }

        }

        else  {     
  
//if backorder	 
     
           
       
        //itemprice with avaiable 
        $itemPrice = $this->input->post('itemPrice');
        //available items * price 
        $lineprice = $itemPrice * $AV;
        
        
        $soid = $this->input->post('soid');
        $this->db->select('*');
        $this->db->where('salesorder_id',$soid );
        $this->db->from('sales_orders');
        $boorders=$this->db->get();


        $bkorder_id = $this->input->post('bkorder_id');
 
     if ($sales_orders_rev ===null){
		

        //split so ex:xxxx-1			
                $num = array(
             'sales_orders_rev_num'  => '1',
			 'sales_orders_rev'  => $soid,
                 );			
            $this->db->select('*');
            $this->db->where('salesorder_id',$soid);
            $this->db->update('sales_orders',$num );			

       }
	   
	   
	   
	   //split so  ex -2,3,4	
	   $this->db->where('sales_orders_rev', $soid);
       $query=$this->db->get('sales_orders');      
       $num_rows = $query->num_rows();
	   

	   
	   if ($num_rows >'0'){
	      $num_rows ++;
		  }
	   else
	   {
       $num_rows='2';
	   }
      // echo $num_rows;			
		//echo  $soid;		
			

        foreach ($boorders->result() as $value) {    }

//$total = 
//this adds item as backorder to SO    
       $bosdata = array(
            
			
			'sales_orders_rev' => $value->salesorder_id,
			'sales_orders_rev_num'=> $num_rows,
           // 'Company_name' => $value->buyername,
            'buyername' => $value->buyername,
            'Company_name' => $value->Company_name,
            'Company_id' => $value->Company_id,
          //  'Customer_id' => $value->Customer_id.'.'.$num_rows,
            'shipping_cost' => $value->shipping_cost,
           // 'Grand_total' => $value->Grand_total,
			'vat_exempt' => $value->vat_exempt,
            'VAT_Rate' => $value->VAT_Rate,
           // 'VAT_ammount' => $value->VAT_ammount,
            //'inc_vat' => $value->inc_vat,
            'VAT_Rate' => $value->VAT_Rate,
            'dateraised' => $value->dateraised,
            'po_number' => $value->po_number,
            'status' => $value->status,
            'Address_1' => $value->Address_1,
            'Address_2' => $value->Address_2,
            'Town_city' => $value->Town_city,
			'County' => $value->County,
			 'Country' => $value->Country,
            'Postcode' => $value->Postcode,
            'Buyer_Phone_Numbe' => $value->Buyer_Phone_Numbe,
			'terms'=> $value->terms,
			'ship_Address_1' => $value->ship_Address_1,
            'ship_Address_2' => $value->ship_Address_2,
            'ShipToCompanyName' => $value->ShipToCompanyName,
			'ship_County' => $value->ship_County,
			 'ship_Country' => $value->ship_Country,
            'ship_Postcode' => $value->ship_Postcode,


			
            'so_notes' => $value->so_notes,


            'backorder'=>'YES'
           
      );
       

        $this->db->insert('sales_orders',$bosdata);
        $bosid = $this->db->insert_id();
      
     if ($AV >'0'){
    	  //inserts  available item qty   
     $dataso = array(
            'sales_id' => $this->input->post('soid'),
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $AV,
            'itemPrice' => $this->input->post('itemPrice'),
            'itemlinetotal' => $lineprice,
            'location' => $this->input->post('location'),
            'wh_item_id' => $this->input->post('id'),
      );
    $this->db->insert('sales_orders_items', $dataso);
	
    }
       
    //this adds item as backorder to SO    
       $databo = array(
            'sales_id' => $bosid,
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $qty-$AV,
            'itemPrice' => $this->input->post('itemPrice'),
            'itemlinetotal' => ($qty-$AV) *$itemPrice,
            'location' => $this->input->post('location'),
            'wh_item_id' => $this->input->post('id'),
           'backorderitem'=>'YES'
      );
      $this->db->insert('sales_orders_items', $databo);
      $this->db->insert('backorders_items', $databo);
      
	  
	  
	  $id = $this->input->post('id');
      $soid = $this->input->post('soid');

       
       
       
        //sellects all sales order info and items 
 $allocate_stock = array(
             'qty'  => '0',
            );
             
$this->db->select('*');
$this->db->where('id',$id);
$this->db->update('warehouse',$allocate_stock);



//inputs  information from sales table
        
       
       }  
       
     
     $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
      redirect($redirect);     
     }

    function item_added_onhold() { 
        
       

//if backorder	 
      {
           
        //means backorder required
        $qty = $this->input->post('qty');
        //itemprice with avaiable 
        $itemPrice = $this->input->post('itemPrice');
        //available items * price 
        $lineprice = $itemPrice * $qty;
        
        
        $soid = $this->input->post('soid');
        $this->db->select('*');
        $this->db->where('salesorder_id',$soid );
        $this->db->from('sales_orders');
        $boorders=$this->db->get();
	   

		
			

        foreach ($boorders->result() as $value) {    
                 }

       $bosdata = array(
            
            'backorder'=>'YES'
           
      );
       

  
            $this->db->where('salesorder_id',$soid);
            $this->db->update('sales_orders',$bosdata );	
    //this adds item as backorder to SO    
       $databo = array(
            'sales_id' => $soid,
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $qty,
            'itemPrice' => $this->input->post('itemPrice'),
            'itemlinetotal' => $lineprice,
            'location' => $this->input->post('location'),
            'wh_item_id' => $this->input->post('wh_item_id'),
           'backorderitem'=>'YES'
      );
      $this->db->insert('backorders_items', $databo);
       $this->db->insert('sales_orders_items', $databo);
      $id = $this->input->post('id');
      $soid = $this->input->post('soid');

      
        
       
       }  
       
 

               
  
     $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
      redirect($redirect);     
     }

    function delete_item() {
	

        $id = $this->input->post('soi');
        $item_id = $this->input->post('item_id');
        
        $itemqty = $this->input->post('itemqty');
        $soid = $this->input->post('soid');
        $wh_item_ID = $this->input->post('wh_item_id');
		$backorderitem = $this->input->post('backorderitem');
		
		$CCL_Item = $this->input->post('CCL_Item');
		$location = $this->input->post('location');
		$this->db->where('item_id',$item_id)->delete('sales_orders_items');
		
		if ($backorderitem==='NO'){
        $return_wh=  $this->db->where('CCL_Item', $CCL_Item)->where('location', $location)->set('qty','qty + ' . (int) $itemqty, FALSE)->update('warehouse');
         }

        //$this->load->model('mdl_sales_orders');
       // $this->mdl_sales_orders->_delete($soid);
        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
        redirect($redirect);

       //  echo $id;
		
    }
	function delete_onhlod_item() {
	

        $id = $this->input->post('soi');
        $item_id = $this->input->post('item_id');
        
        $itemqty = $this->input->post('itemqty');
        $soid = $this->input->post('soid');
        $wh_item_ID = $this->input->post('wh_item_id');
		
		
		$CCL_Item = $this->input->post('CCL_Item');
		$location = $this->input->post('location');
		
      // $return_wh=  $this->db->where('CCL_Item', $CCL_Item)->where('location', $location)->set('qty','qty + ' . (int) $itemqty, FALSE)->update('warehouse');
       //$this->db->where('item_id',$item_id)->delete('backorders_items');
        $this->db->where('item_id',$item_id)->delete('sales_orders_items');
        //$this->load->model('mdl_sales_orders');
       // $this->mdl_sales_orders->_delete($soid);
        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $soid . '';
        redirect($redirect);

       //  echo $id;
		
    }

    function return_item() {
	

         $soid = $this->input->post('soid');
      
        $item_id = $this->input->post('itemID');
		$wh_item_ID= $this->input->post('wh_item_ID');
        $CCL_Item = $this->input->post('CCL_Item');
		$return_qty = $this->input->post('return_qty');
        $item_qty = $this->input->post('item_qty');
        $ItemPrice = $this->input->post('ItemPrice'); 
       $Description = $this->input->post('Description');
        $location = $this->input->post('location'); 
	   
	   
	   $return_wh=  $this->db->where('CCL_Item', $CCL_Item)->where('location', $location)->set('qty','qty + ' . (int) $return_qty, FALSE)->update('warehouse');
      
	   
	  
	   
        $data_so_item = array( 
		    'item_qty' =>$return_qty,
            'so_item_note' =>'return',
			'itemlinetotal'=>$return_qty*$ItemPrice,
            );
		 $this->db->where('item_id', $item_id);
         $this->db->update('sales_orders_items',$data_so_item); 
		  
		 if  (($item_qty-$return_wh)>'0'){//if not full-return
		  //add so item for not return 
		  $data = array(
            'sales_id' => $soid,
            'CCL_Item' => $CCL_Item,
            'Description' => $Description,
            'item_qty' => $item_qty-$return_qty,
            'itemPrice' => $ItemPrice,
            'itemlinetotal' => ($item_qty-$return_qty)*$ItemPrice,
            'location' =>  $location,
            'wh_item_id' => $wh_item_ID,
			'sales_orders_items' =>'order',
         );
		 
		 $this->db->insert('sales_orders_items', $data);
		 
		 }
		 
        $redirect = '' . base_url() . 'index.php/salesorders/view_invoiced/' . $soid . '';
        redirect($redirect);

      
		
    }
   
    function save() {

        // $GT = $this->input->post('total') + $this->input->post('vat_amount');
        $GT = $this->input->post('total');
		$shipping_cost = $this->input->post('shipping_cost');
        $id = $this->input->post('sales_id');
        $data = array(
            'VAT_Rate' => $this->input->post('vat_rate'),
            'VAT_ammount' => ($shipping_cost+$GT)*0.2,
            'inc_vat' => ($shipping_cost+$GT)*1.2,
            'shipping_cost' => $shipping_cost,
            'Grand_total' => $GT,'Subtotal_total' => $GT,
        );


        $this->load->model('mdl_sales_orders');
        $this->mdl_sales_orders->_update_so($id, $data);

        $redirect = '' . base_url() . 'index.php/salesorders/view/' . $id . '';
        //$redirect = '' . base_url() . 'salesorders';
		redirect($redirect);
    }

    function saveandexit() {

        // $GT = $this->input->post('total') + $this->input->post('vat_amount');
        $GT = $this->input->post('total');
        $id = $this->input->post('sales_id');
        $data = array(
            'VAT_Rate' => $this->input->post('vat_rate'),
            'VAT_ammount' => $this->input->post('vat_amount'),
            'inc_vat' => $this->input->post('inc_vat'),
           // 'Company_name' => $this->input->post('Company_name'),
            'Grand_total' => $GT,
        );


        $this->load->model('mdl_sales_orders');
        $this->mdl_sales_orders->_update_so($id, $data);

        $redirect = '' . base_url() . 'index.php/salesorders';
        redirect($redirect);
    }
    
	function update_vat_n_total() {

      
       /* $this->db->SET('VAT_ammount',('Grand_total'+'shipping_cost')*0.2)
                ->SET('inc_vat',('Grand_total'+'shipping_cost')*1.2)
        ->UPDATE('sales_orders');*/
		
	//VAT EXP
        mysql_query("UPDATE sales_orders SET inc_vat = (Grand_total+shipping_cost)*1.2 , VAT_ammount=(Grand_total+shipping_cost)*0.2");
	
        $redirect = '' . base_url() . 'index.php/salesorders/';
        redirect($redirect);
    }
	
 
	function update_bkitem() {

      
            $backorders = $this->db->select('*')->from('backorders_items')->where('backorderitem','YES')->get();
            foreach ($backorders->result() as $bk){
	
	            $item=$this->db->select('*')->from('sales_orders_items')->where('sales_id',$bk->sales_id)->where('CCL_Item',$bk->CCL_Item)->where('backorderitem','YES')->get();
				
				
				if (!empty($item->result())){
					
                echo'no<br/>';
				}else{
					    foreach ($item->result() as $i){
					echo $i->sales_id.$i->CCL_Item.'<br/>';
					}
					//echo'no<br/>';
				}
	
        }
        
        $redirect = '' . base_url() . 'index.php/salesorders/';
       //redirect($redirect);
    }
	
    function add_cust() {
        $data = array(
            'Company_name' => $this->input->post('Company_name'),
            //'first_name'=> $this->input->post('first_name'),
            //'last_name'=> $this->input->post('last_name'),
            'Phone_number' => $this->input->post('phone_number'),
            'mobile_number' => $this->input->post('mobile_number'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'County' => $this->input->post('County'),
            'postcode' => $this->input->post('postcode'),
            'website' => $this->input->post('website'),
            'VAT_Number' => $this->input->post('vat_number'),
            'vat_exempt' => $this->input->post('vat_exempt'),
            'terms' => $this->input->post('terms'),
            'number' => $this->input->post('number'),
            'email' => $this->input->post('email'),
            'accounts_email' => $this->input->post('accounts_email'),
        );

        $this->db->insert('businesses', $data);
        redirect('' . base_url() . 'salesorders');
    }

    function add() {
        $data = array(
            'first_name' => $this->input->post('Company_name'),
            'last_name' => $this->input->post('accounts_email'),
            'Company_name' => $this->input->post('Company_name'),
            'accounts_email' => $this->input->post('accounts_email'),
            'Phone_number' => $this->input->post('Phone_number'),
            'number' => $this->input->post('number'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'postcode' => $this->input->post('postcode'),
            'website' => $this->input->post('website'),
            'terms' => $this->input->post('terms'),
            'VAT_Number' => $this->input->post('VAT_Number'),
        );
        $this->db->insert('businesses', $data);
        redirect('' . base_url() . 'customers/add');
    }

	function add_blankcn() {
		
		$this->load->model('mdl_sales_orders');
		$id=$this->input->post('sales_id');
		$query =$this->mdl_sales_orders->orders($id);
		if (!empty($query->result())){
		
		$itemlinetotal=$this->input->post('itemlinetotal');
        $data_so_item = array( 
		'sales_id' =>$this->input->post('sales_id'),
		    'CCL_Item' =>$this->input->post('CCL_Item'),
			 'Description' =>$this->input->post('Description'),
            'refund' =>'YES',
			'so_item_note' =>'return',
			'itemlinetotal'=>$this->input->post('itemlinetotal'),
            );
		  $this->db->insert('sales_orders_items', $data_so_item);
        
		 
		
		
		$data = array(
            'so_id' => $this->input->post('sales_id'),
			'rf_type' => 'credit_note',
            'rf_amount' => $this->input->post('itemlinetotal'),
            //'rf_ship' => $this->input->post('cn_ship'),
			'rf_total' =>$this->input->post('itemlinetotal'),
            'rf_note' => $this->input->post('cn_note'),
            
        );
		 $this->db->insert('refund', $data);
		$this->view_invoiced( $id);
		}
		else
         
	    echo'<h3> SO NUM:'.$id.' was not found in any record</h3>';
		
		
    }
	
	function add_cn() {
		$cn_amount=$this->input->post('cn_amount');
		$cn_ship=$this->input->post('cn_ship');
		$id=$this->input->post('so_id');
		$item_id=$this->input->post('item_id');
		
        $data = array(
            'so_id' => $this->input->post('so_id'),
			'rf_type' => 'credit_note',
            'rf_amount' => $this->input->post('cn_amount'),
            'rf_ship' => $this->input->post('cn_ship'),
			'rf_total' => $cn_amount-$cn_ship,
            'rf_note' => $this->input->post('cn_note'),
            
        );
        $this->db->insert('refund', $data);
       // 
		
		$data_so = array(
            'refund	' => 'YES',
 
        );
		  $this->db->where('item_id', $id);
		 // $this->db->where('so_item_note','return');
            $this->db->update('sales_orders_items',$data_so);	
		
		
		$this->view_invoiced( $id);
		

		
		
    }
	
	

//importing files 
    function upload_it() {
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));

        $sales_id = $this->input->post('salesid');

        $config['upload_path'] = 'D:\wamp\www\earth\uploads\so_imports';
       // $config['allowed_types'] = 'csv';
	   $config['allowed_types'] = 'text/plain|text/csv|csv';
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
                    'item_id' => $field['id'],
                    'CCL_Item' => $field['CCL_Item'],
                    'Description' => $field['Description'],
                    'item_qty' => $field['item_qty'],
                    'ItemPrice' => $field['ItemPrice'],
                    'itemlinetotal' => $field['itemlinetotal'],
                    'sales_id' => $sales_id,
                );

                $this->db->insert('sales_orders_items', $data);
            }
            $redirect = '' . base_url() . 'index.php/salesorders/view/' . $sales_id . '';
            redirect($redirect);
        }
    }
	
	function upload_ce_csv2(){
	


 //<finish step1. >		
		
		
//<step2. begin import CSV n update receiver's info  to SO for C.E distributors>		
	//<step2.1  update receiver's info  to SO for C.E distributors>	
	{
		
		$this->load->helper('file');
        $this->load->helper(array('form', 'url'));

        //$sales_id = $this->input->post('salesid');

        $config['upload_path'] = 'D:\wamp\www\earth\uploads\so_imports';
       // $config['allowed_types'] = 'csv';
	   $config['allowed_types'] = 'text/plain|text/csv|csv';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            print_r($error);
        } 
		else {
		
            $data = array('upload_data' => $this->upload->data());



            $upload_data = $this->upload->data();
            $file_name = $upload_data['full_path'];


            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file($file_name); //path to csv file


			$delim = ';';
            $encl ='/r/n';
            $file_lines = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


	
	echo'<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
	<td width = "2%">no</td>
            <td width = "8%">customer</td>
            <td width = "5%">po</td>
            <td width = "5%">CCL_Item</td>
			<td width = "5%">QTY</td>
            <td width = "10%">Shipping Name</td>
            <td width = "10%">Shipping Address 1</td>
            <td width = "10%">Shipping Address 2</td>
			<td width = "10%">Shipping Address 3</td>
            <td width = "10%">Shipping Address 4</td>
			<td width = "5%">Shipping Postcode</td>
			<td width = "10%">Shipping Contact No</td>
            <td width = "10%">Shipping Email</td>
    </tr>

     ';   
   $i=1;
		  foreach ($result as $field) {
               // echo ' foreach ($result as $field)';
				     //so
					 
				    $customer = $field['Customer'];
					
                    $po_number = $field['CED Order'];								
                    $ship_Address_1 = $field['Shipping Address 1'];					
					$ship_Address_2 = $field['Shipping Address 2'];
                    $ship_County = $field['Shipping Address 3'];					
					$ship_County2 = $field['Shipping Address 4'];
					$ship_Postcode = $field['Shipping Postcode'];
                    $ShipToCompanyName = $field['Shipping Name'];
					$Shipping_Contact_No = $field['Shipping Contact No'];
					$Shipping_Email = $field['Shipping Email'];
					//so_item
					$CCL_Item = $field['Item Code'];
                    $item_qty = $field['Quantity'];
			//}
	
	
 echo '
                <tr> <td>'.$i++.'</td>
                    <td>'.$customer.'</td>
					<td>'.$po_number.'</td>
					
					<td>'.$CCL_Item.'</td>
                    <td>'.$item_qty.'</td>
					
                   
					
					
					<td>'.$ShipToCompanyName.'</td>
                    <td>'.$ship_Address_1.'</td>
                    <td>'.$ship_Address_2.'</td>
                    <td>'.$ship_County.'</td>
                    <td>'.$ship_County2.'</td>
					
					<td>'.$ship_Postcode.'</td>
                    
                    <td>'.$Shipping_Contact_No.'</td>
                    <td>'.$Shipping_Email.'</td>
                    
                </tr>';
            
//$this->upload_ce_csv2($customer,$po_number,$CCL_Item,$item_qty,$ShipToCompanyName ,$ship_Address_1,$ship_Address_2 ,$ship_County,$ship_County2,$ship_Postcode,$Shipping_Contact_No,$Shipping_Email);

		}
		echo '<tr></tr></table><br>';
		
	    }	
}
}
	function upload_ce_csv(){
	
//<step1. creat new so for C.E distributors>	    
		$datestring = " %Y-%m-%d";
        $time = time();
		
		

        $dateraised = mdate($datestring, $time);
		//$dateraised = '1970-01-01';
		$boorders=$this->db->select('*')
                   ->where('Company_id','14') 
		           ->get('businesses');

 //<finish step1. >		
		
		
//<step2. begin import CSV n update receiver's info  to SO for C.E distributors>		
	//<step2.1  update receiver's info  to SO for C.E distributors>	
		
		
		$this->load->helper('file');
        $this->load->helper(array('form', 'url'));

        //$sales_id = $this->input->post('salesid');

        $config['upload_path'] = 'D:\wamp64\www\demo\uploads\so_imports';
       // $config['allowed_types'] = 'csv';
	    $config['allowed_types'] = 'text/plain|text/csv|csv';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            print_r($error);
        } 
		else {
		
            $data = array('upload_data' => $this->upload->data());



            $upload_data = $this->upload->data();
            $file_name = $upload_data['full_path'];


            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file($file_name); //path to csv file


			$delim = ';';
            $encl ='/r/n';
            $file_lines = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


	       
	
        

		  foreach ($result as $field) {
               
				     //so
				    $customer = $field['Customer'];
					
                    $po_number = $field['CED Order'];							
                    $ship_Address_1 = $field['Shipping Address 1'];					
					$ship_Address_2 = $field['Shipping Address 2'];
                    $ship_County = $field['Shipping Address 3'];
					
					$ship_County2 = $field['Shipping Address 4'];
					$ship_Postcode = $field['Shipping Postcode'];
                    $ShipToCompanyName = $field['Shipping Name'];
					$Shipping_Contact_No = $field['Shipping Contact No'];
					$Shipping_Email = $field['Shipping Email'];
					//so_item
					$CCL_Item = $field['Item Code'];
                    $item_qty = $field['Quantity'];
					
					
					$message = isset($_GET['message']) ? $_GET['message'] : 'no_message';
					
					if(isset($field['Order Notes'])&&$field['Order Notes']  != '')
			        {
				$so_notes=$field['Order Notes'];
			          }
			         else		
				$so_notes='';
			//}
	        if($ship_Address_1 ==='')
			{
				$ship_Address_1='--';
			}
			if($ship_Address_2 ==='')
			{
				$ship_Address_2='--';
			}
            if($ship_County ==='')
			{
				$ship_County='--';
			}			
                if ($customer!='') {
         	   
			         // echo 'if $customer===C.E distributors';
			
			             foreach ($boorders->result() as $value) {    
                         }
                           //basic info 
                            $data = array(
            
			
                                'buyername' => $value->first_name,
                                'Company_name' => $value->Company_name,
                                'Company_id' => $value->Company_id,
		                        'terms' => $value->terms,
        
		                      	'vat_exempt' => 'NO',
		                        'dateraised' => $dateraised,

                                'Address_1' => $value->address1,
                                'Address_2' => $value->address2,
                                'Town_city' => $value->City,
			                    'County' => $value->County,
			                    'Country' => $value->Country,
                                'Postcode' => $value->postcode,
                                'Buyer_Phone_Numbe' => $value->Phone_number,

           
                                 );
       
                                $this->db->insert('sales_orders',$data);
                                $so_id = $this->db->insert_id();

			                    $so_data = array(
                     

                                 'po_number' =>  $po_number,					
                                 'ship_Address_1'=> $ship_Address_1,
					             'ship_Address_2' => $ship_Address_2,
                                 'ship_County' =>$ship_County,					 
					             'ship_Postcode' => $ship_Postcode,
                                 'ShipToCompanyName' => $ShipToCompanyName,
					             'Shipping_Contact_No' =>$Shipping_Contact_No,
								 'Shipping_Email'=>$Shipping_Email,
								  'so_notes'=> $so_notes,
                                 );
        	              
                                $this->db->where('salesorder_id',$so_id);
                                $this->db->update('sales_orders', $so_data);
				
		             //*temp*****************************$data ['item'] = $this->import_item_added($so_id,$CCL_Item,$item_qty);

                         $this->import_item_added_location($so_id,$CCL_Item,$item_qty);
			            // $this->mdl_sales_orders->sales_total($so_id);
			     }
			    else 
			    //if($customer==='')
			        {
			            				    $this->import_item_added_location($so_id,$CCL_Item,$item_qty);
                    }
	          }

        }

				
	 //<finish step2.2 >
 //<finish step2 >		 
            
			
			$redirect = '' . base_url() . 'index.php/salesorders/';
        redirect($redirect);
	}	
	
	function import_item_added_location($so_id,$CCL_Item,$order_qty) {  //Select location@warehouse if item stocked >1 location
	    
		
		$query_CCL_Item=$this->db->select('*')
	                            // ->group_by('CCL_Item')
	                             ->where('CCL_Item',$CCL_Item) 		             
                                 ->get('warehouse');
					
		$query_CCL_Item_num_rows = $query_CCL_Item->num_rows();
	   
	   
	     echo $CCL_Item;
		        if  ( $query_CCL_Item_num_rows >1){
				
				
				                    $query_CCL_Item_loc=$this->db->where('CCL_Item',$CCL_Item) 
                                                                 ->where('qty >=','0')		
				                                                 ->order_by('qty')    
				                                                 ->get('warehouse');
				
				
				 
				                    $this->db->select('SUM(qty) as total_qty');
                                    $this->db->where('CCL_Item',$CCL_Item);
				                    $this->db->where('qty >','0');
                                    $q=$this->db->get('warehouse');
                                    $row=$q->row();
                                    $total_qty=$row->total_qty;
				
				                 
		                             
						
				       
				
				            if ($order_qty<= $total_qty){  //if instock > order
				               
							   
							   $query_CCL_Item_loc_morethanzero=$this->db->where('CCL_Item',$CCL_Item) 
                                                                 ->where('qty >','0')		
				                                                 ->order_by('qty')    
				                                                 ->get('warehouse');
				
								        foreach ($query_CCL_Item_loc->result() as $table) {
								 //$wh_item_id=$table->id;
								     
									            if (($table->qty>0)&&($order_qty>0)){
									            
									                    if (($order_qty>=$table->qty)){
									
									                         $wh_item_id=$table->id;	
					                                         $item_qty=$table->qty;
									                         $this->import_item_added($so_id,$wh_item_id,$CCL_Item,$item_qty);								
													//$order_qty=$order_qty-$item_qty; 
													     }
													    else{
													
														     $wh_item_id=$table->id;	
					                                         $item_qty=$order_qty;
									                         $this->import_item_added($so_id,$wh_item_id,$CCL_Item,$item_qty);								
													
													}
													
									           
										
									
									
							                             $order_qty=$order_qty-$item_qty; 
                                                }
								    
									    // $order_qty=$order_qty-$item_qty;
									
									    }
								
								 
							                        
						    }
							else{ // stock< order
				                      
                                        
										    $bk_item_qty=$order_qty- $total_qty;//this is bkorder qty
                       
                                       
										foreach ($query_CCL_Item_loc->result() as $table) {
								           
  										   if ($table->qty>0){
												
																														
								                $wh_item_id=$table->id;
					                            $item_qty=$table->qty;
				                               	
                                                       //echo'   item_qty'.$item_qty.'<----what this loc has qty=or qyt  ';
					 
					                              $this->import_item_added($so_id,$wh_item_id,$CCL_Item,$item_qty);
				                                }
											    $wh_item_id=$table->id;	
				                        }
								   	
							            	
                                        if (($bk_item_qty > 0)){
                                        	
                                     
                									   foreach ($query_CCL_Item_loc->result() as $table) 
													 {
													 }                    //$wh_item_id=$table->id;
									 
									                        	
                                                                 $this->import_item_added($so_id,$wh_item_id,$CCL_Item,$bk_item_qty);
								
							                 
											 
											     
					                        }
											else
											{

											}
					                   //  }
	                            }
			    
			      
				
				}
				else{
				    //echo '</br>$CCL_Item only one location'.$CCL_Item;
					 foreach ($query_CCL_Item->result() as $table) {
						 $wh_item_id=$table->id;
						 
						 $this->import_item_added($so_id,$wh_item_id,$CCL_Item,$order_qty);
					 }
					
				}
	 }
//Import to sales_orders_items
    function import_item_added($so_id,$wh_item_id,$CCL_Item,$item_qty) { 

	
	$datestring = " %Y-%m-%d";
    $time = time();
    $date_update = mdate($datestring, $time);
	
	
   // echo'</br>import_item_added'.$CCL_Item.'import_item_added</br>';
    $base_url = base_url();
    $soid = $so_id;
	
	$query=$this->db->select('*')
	                 ->where('id',$wh_item_id)
	                 //->where('CCL_Item',$CCL_Item) 
		            //->join('sales_orders_items', 'warehouse.CCL_Item = sales_orders_items.CCL_Item')
                    ->get('warehouse');
    
	//$query_ccl=$this->db->select('*')
    
	
         foreach ($query->result() as $table) {
	  
        $bo = $table->qty -$item_qty;//backorder
     
        // echo '$table->qty '.$table->qty.'-$item_qty'.$item_qty. '$bo='.$bo.'';
                                  
//if backorder

	    
        if( $table->qty < $item_qty) {
		         
				$num = array(
                                        'sales_orders_rev_num'  => '1',
			                            'sales_orders_rev'  => $soid,
										//'backorder'=>'YES',
                                   );			
                           // $this->db->select('*');
                            $this->db->where('salesorder_id',$soid);
                            $this->db->update('sales_orders',$num ); 
				 
				 
				 
				 
				 
				 
				 
				 
                

		
		         //means backorder required
                 $AV = $table->qty;//avaible qty
                 //itemprice with avaiable 
                 $itemPrice = $table->sell_price;
                 //available items * price 
                 $lineprice = $itemPrice * $AV;
               
         
		    $query_soid=$this->db->where('sales_id',$soid) 
						        ->where('backorderitem','NO') 
						        ->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
                                ->get('sales_orders_items');
		 
		    $num_rows_soid = $query_soid->num_rows();
		 
            if ($AV >'0'){ 
            	  //inserts  available item if qty >0 
                 $dataso = array(

	 
                     'sales_id' => $so_id,
                     'CCL_Item' => $CCL_Item,
                     'Description' => $table->Description,
                     'item_qty' => $AV,
                     'itemPrice' => $table->sell_price,
                     'itemlinetotal' => $lineprice,
                     'location' => $table->location,
                     'wh_item_id' => $table->id,
                );
                $this->db->insert('sales_orders_items', $dataso);
            }
	        else if ($num_rows_soid==='0')//if bkorder item be on the 1st order
	        {
		                $num = array(
										'backorder'=>'YES',
                                   );			
                           // $this->db->select('*');
                            $this->db->where('salesorder_id',$soid);
                            $this->db->update('sales_orders',$num );
	        }
       
		 

            //$bkorder_id = $this->input->post('bkorder_id');

 
         $this->db->where('sales_orders_rev', $soid);
         $query=$this->db->get('sales_orders');      
         $num_rows = $query->num_rows();
 
//split so  ex -2,3,4	

 
	
	                if ($num_rows ===0){
					
					        $num = array(
                                        'sales_orders_rev_num'  => '1',
			                            'sales_orders_rev'  => $soid,
										//'backorder'=>'YES',
                                   );			
                           // $this->db->select('*');
                            $this->db->where('salesorder_id',$soid);
                            $this->db->update('sales_orders',$num );			
					 echo'$$num_rows=0'.$num_rows.'<br>';
					}
					 if ($num_rows ===1){
	                //$num_rows =$num_rows++;
					$num_rows =1;
					
					// echo'</br>2 $num_rows>0'.$num_rows;
					}
					else{
	                //$num_rows =$num_rows++;
					$num_rows =$num_rows++;
					
					 echo'</br>3$num_rows>0'.$num_rows;
					}

                    $boorder=$this->db->select('*')
                                      ->where('salesorder_id',$soid )
                                     //->from('sales_orders');
                                       ->get('sales_orders');
            
			
			        foreach ($boorder->result() as $value) {    
                    
 
                    //     echo'$value->po_number'.$value->po_number.'';
//copy so info  to create backorder so
                        $bosdata = array(
            
			
			                 'sales_orders_rev' => $value->salesorder_id,
			                 'sales_orders_rev_num'=>1+ $num_rows,
                           // 'Company_name' => $value->buyername,
                             'buyername' => $value->buyername,
                             'Company_name' => $value->Company_name,
                             'Company_id' => $value->Company_id,
                          //  'Customer_id' => $value->Customer_id.'.'.$num_rows,
                             'shipping_cost' => $value->shipping_cost,
                          // 'Grand_total' => $value->Grand_total,
		                    
							'vat_exempt' => $value->vat_exempt,
                            'VAT_Rate' => $value->VAT_Rate,
                          //'VAT_ammount' => $value->VAT_ammount,
                         // 'inc_vat' => $value->inc_vat,
            
                           'dateraised' => $value->dateraised,
                           'po_number' => $value->po_number,
                           'status' => $value->status,
                           'Address_1' => $value->Address_1,
                           'Address_2' => $value->Address_2,
                           'Town_city' => $value->Town_city,
			               'County' => $value->County,
			               'Country' => $value->Country,
                           'Postcode' => $value->Postcode,
                           'Buyer_Phone_Numbe' => $value->Buyer_Phone_Numbe,
			
			               'ship_Address_1' => $value->ship_Address_1,
                           'ship_Address_2' => $value->ship_Address_2,
                           'ShipToCompanyName' => $value->ShipToCompanyName,
			                'ship_County' => $value->ship_County,
			                'ship_Country' => $value->ship_Country,
                            'ship_Postcode' => $value->ship_Postcode,		
                            'so_notes' => $value->so_notes,
                            'Shipping_Contact_No' => $value->Shipping_Contact_No,
							'Shipping_Email'=> $value->Shipping_Email,
                            'terms' => $value->terms,
                            'backorder'=>'YES',
           
                        );
					}	
                    //echo'<br>1443 bk order $num_rows>0'.$num_rows;
                     //if ($num_rows >0)
					 if($table->qty < $item_qty)
					 {  
                         $this->db->insert('sales_orders',$bosdata);
		               //  echo'1438bkorder :     $value->po_number'.$value->po_number.'*****sales_orders_rev_num :1+ '. $num_rows;
		            
                     
                         $bosid = $this->db->insert_id(); 
	                }
   
	
       
                  //less qty- adds item as backorder to SO_item    
                        $databo = array(
                            'sales_id' => $bosid,//bkoder id
                            'CCL_Item' => $CCL_Item,
                            'Description' => $table->Description,
                            'item_qty' =>0-$bo,//order-avaiable
                            'itemPrice' => $table->sell_price,
                            'itemlinetotal' => $lineprice,
                            'location' => $table->location,
                            'wh_item_id' => $table->id,
                            'backorderitem'=>'YES'
                         );
	                   $data_av_zero = array(
                            'sales_id' => $bosid,//bkoder id
                            'CCL_Item' => $CCL_Item,
                            'Description' => $table->Description,
                             'item_qty' =>$item_qty,//order qty
                            'itemPrice' => $table->sell_price,
                            'itemlinetotal' => $item_qty*$table->sell_price,
                            'location' => $table->location,
                            'wh_item_id' => $table->id,
                            'backorderitem'=>'YES'
	                     );
	  
	                    if ($item_qty >0)
	                    {
                             $this->db->insert('sales_orders_items', $databo);
							 // echo'1483  $num_rows >0  / bkorder'.$bosid;
	                    }
	                    else
	                    {
		 
		                     $this->db->insert('sales_orders_items', $data_av_zero );
							
	                    }
      
                $id = $table->id;
              // $soid = $so_id;
                $this->db->select('*');
                $this->db->where('id',$id);
                $this->db->from('warehouse');
                $status=$this->db->get(); 
             foreach($status->result() as $r) { // loop over results

                     $allocate_stock = array(
                         'qty'  => 0,
                         'date_update' =>$date_update,
                     );
      
                  $this->db->where('CCL_Item',$r->CCL_Item);
                  $this->db->where('location',$r->location);
                  $this->db->where('id', $table->id);
                  $this->db->update('warehouse', $allocate_stock); // insert each row to another table
        
                }
        } 
        else {  //add available item qty w/o backorder to SO_item   
       
            	
             $qty = $item_qty;
            //itemprice with avaiable 
            $itemPrice = $table->sell_price;
            //available items * price 
            $lineprice = $itemPrice * $qty;
           // echo'<br>1508 no bkorder'.$qty.'';
                   $data = array(
	        'sales_id' => $soid,
            'CCL_Item' => $CCL_Item,
            'Description' => $table->Description,
            'item_qty' => $item_qty,
            'itemPrice' => $table->sell_price,
            'itemlinetotal' => $lineprice,
            'location' => $table->location,
            'wh_item_id' => $table->id,
	 

                 );

//echo'1531 $ insertsales_orders_items$soid'. $soid. '$CCL_Item'. $CCL_Item.'$table->Description'.$table->Description;
       $this->db->insert('sales_orders_items', $data);
       $id = $table->id;
       //$soid = $this->input->post('soid');

       
//sellects all sales order info and items 
        
$this->db->select('*');
$this->db->where('id',$id);
$this->db->from('warehouse');
$status=$this->db->get(); 

                foreach($status->result() as $r) { // loop over results


                    $new_qty = $r->qty - $item_qty;
   
                    //echo'</br>1594warehouse  new qty' .$new_qty.'';
                    $allocate_stock = array(
                         'qty'  => $new_qty,
			             'date_update' =>$date_update,
                     );
      
                    $this->db->where('CCL_Item',$r->CCL_Item);
                    $this->db->where('location',$r->location);
                    $this->db->where('id', $table->id);
                    $this->db->update('warehouse', $allocate_stock); // insert each row to another table
         //echo'done regular'.$j++;
                 }  
		
		}

		 }
        //$redirect = '' . base_url() . 'salesorders/';
//}
             
    
     }



	function insert_bkorder_item_soitem($bosid,$CCL_Item,$Description,$less_qty,$sell_price,$lineprice,$location,$id) {
    
       		 
		    //<**add bkorder item to SO_item**> 
                $databo = array(
               'sales_id' => $bosid,
            'CCL_Item' => $CCL_Item,
            'Description' => $Description,
            'item_qty' => $less_qty,
            'itemPrice' => $sell_price,
            'itemlinetotal' => $lineprice,
            'location' => $location,
            'wh_item_id' => $id,
            'backorderitem'=>'YES'
            );
			
			echo  'bk order CCL_Item'.$CCL_Item;
            $this->db->insert('sales_orders_items', $databo);
		    //<**/add bkorder qty/item to SO_item**>   

    }
	function insert_av_item_soitem($so_id,$CCL_Item,$Description,$AV,$sell_price,$lineprice,$location,$id) {

        //inserts  available item if qty >0 
            $dataso = array(	 
            'sales_id' => $so_id,
            'CCL_Item' => $CCL_Item,
            'Description' => $Description,
            'item_qty' => $AV,
            'itemPrice' => $sell_price,
            'itemlinetotal' => $lineprice,
            'location' => $location,
            'wh_item_id' => $id,
            );
             $this->db->insert('sales_orders_items', $dataso);
    }
	
	
	
///<---------order categories------------> 	
	function order_onhold(){

	    echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
		//$data['order_pending'] = $this->mdl_sales_orders->get_order_pending();
        $data['salesorders'] = $this->db->select('*')->where('status','onhold')->get('sales_orders');		                      
        $data['backorders'] = $this->mdl_sales_orders->getbackorders();
        $data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
        //$data['isabackorder'] = $this->mdl_sales_orders->isabackorder();
		$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
		$this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
        //$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
        $this->load->view('sales_orders', $data);
	
	

 


    }//20150110 VIOLA ADD
    function order_pending(){
   
    
	
	    //echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
		$data['salesorders'] = $this->mdl_sales_orders->get_order_pending();
       // $data['salesorders'] = $this->db->select('*')->where('status','pending')->get('sales_orders');		                      
        $data['backorders'] = $this->mdl_sales_orders->getbackorders();
        $data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
        //$data['isabackorder'] = $this->mdl_sales_orders->isabackorder();
	    $data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
		$this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
        //$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
        $this->load->view('sales_orders', $data);

    }
	//20150110 VIOLA ADD
    function order_shipped(){
       //  echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
		//$data['order_pending'] = $this->mdl_sales_orders->get_order_pending();
        $data['salesorders'] = $this->db->select('*')->where('status','shipped')->get('sales_orders');		                      
        $data['backorders'] = $this->mdl_sales_orders->getbackorders();
        $data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
        //$data['isabackorder'] = $this->mdl_sales_orders->isabackorder();
		$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
		$this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
        //$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
        $this->load->view('sales_orders', $data);
	
	

	 
	}
	//20150110 VIOLA ADD
	function order_invoiced(){
        
		
		
		echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
		//$data['order_pending'] = $this->mdl_sales_orders->get_order_pending();
        $data['salesorders'] = $this->db->select('*')->where('status','invoiced')->get('sales_orders');		                      
        //$data['backorders'] = $this->mdl_sales_orders->getbackorders();
        //$data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
        //$data['isabackorder'] = $this->mdl_sales_orders->isabackorder();
		
		$this->load->model('businesses/mdl_customers');
        $data ['businesses'] = $this->mdl_customers->get_busesness();
        //$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
         //$this->load->view('sales_orders', $data);
		 $this->load->view('order_invoiced', $data);
	}
	
	function order_returned(){
        
		
		
		echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
	    $data['salesorders']= $this->db->select('*')  
		                                  ->where('so_item_note','return')
										  ->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')						                 
										  ->group_by('sales_id')
										  ->get('sales_orders_items');
	    $data['cn_orders']= $this->db->join('refund', 'refund.so_id = sales_orders.salesorder_id')->get('sales_orders');
						               
               $this->load->view('order_returned', $data);
	}
	
	function order_canceled(){
        
		
		echo Modules::run('template/dash_head');
		//echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders');
		//$data['order_pending'] = $this->mdl_sales_orders->get_order_pending();
        $data['salesorders'] = $this->db->select('*')->where('status','cancelled')->get('sales_orders');		                      
       // $data['backorders'] = $this->mdl_sales_orders->getbackorders();
        //$data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
        //$data['isabackorder'] = $this->mdl_sales_orders->isabackorder();
		
		$this->load->model('businesses/mdl_customers');
       // $data ['businesses'] = $this->mdl_customers->get_busesness();
        //$data['shipped']= $this->db->select('*')->where('status','shipped')->get('sales_orders');
         $this->load->view('order_invoiced', $data);
	}
   
    function order_refund(){
        
				echo Modules::run('template/dash_head');
		
		
        $this->load->model('mdl_sales_orders');
	    $data['salesorders']= $this->db->select('*')  
		                               ->where('rf_type','credit_note')
										  ->join('sales_orders', 'sales_orders.salesorder_id = refund.so_id')
						                  ->group_by('so_id')
										  ->get('refund');
		
               $this->load->view('order_refund', $data);
	}
		
///<---------order categories end------------> 		
	
	function shippingupdate(){
       $id= $this->input->post('elementid');
       $newvalue =$this->input->post('newvalue');
       
       $data = array(
         'shipping_cost'=>$newvalue,  
       );
       
       //$this->db->where('salesorder_id',$id);
      // $this->db->update('sales_orders',$data);
        $query=$this->db->where('salesorder_id',$id)
	                     ->update('sales_orders',$data);
	   echo $newvalue;
	   
	       
	   
   }
          

	//<------change order status------------>
    function returnso($id){
        
        $this->db->select('*');
        $this->db->where('sales_id', $id);
        $this->db->from('sales_orders_items');
        $vendor_item = $this->db->get();
       

        foreach ($vendor_item->result() as $r) {
            
            //this grabs wharehous ref from sales order items 
           $wh_item_id = $r->wh_item_id;
           $location =  $r->location;
           $qty = $r->item_qty;
          
         
        if($r->backorderitem==='NO')
		{
        //this loops read to insert back to warehouse table
        /*$data = array(
            'qty' =>'qty + '$qty,
            );*/
			 $this->db->where('id', $wh_item_id)
			                 //->where('location', $location)
			                  ->set('qty','qty + ' . (int) $qty, FALSE)->update('warehouse');
			// $this->db->UPDATE ('warehouse')-> SET(' qty = qty + '.$qty )->where('id', $ccl)->where('location', $location);		  
			echo	'</br>'  . $wh_item_id.$location. $qty;		  
						 
         //this updates  warehouse side 
      
        }
		
        
       }
         $data_so_item = array( 
            'note' =>'return',
			'refund' =>'NO',
            );
		 $this->db->where('sales_id', $id);
          $this->db->update('sales_orders_items',$data_so_item);     
           $data_so = array( 
            'status' =>'returned',
            );
          $this->db->where('salesorder_id', $id);
          $this->db->update('sales_orders',$data_so);
        
          redirect('' . base_url() . 'salesorders');
    }
	function cancelso($id){
        
        $this->db->select('*');
        $this->db->where('sales_id', $id);
        $this->db->from('sales_orders_items');
        $vendor_item = $this->db->get();
       

        foreach ($vendor_item->result() as $r) {
            
            //this grabs wharehous ref from sales order items 
           $wh_item_id = $r->wh_item_id;
           $location =  $r->location;
           $qty = $r->item_qty;
          
         
        if($r->backorderitem==='NO')
		{
        //this loops read to insert back to warehouse table
        /*$data = array(
            'qty' =>'qty + '$qty,
            );*/
			 $this->db->where('id', $wh_item_id)
			                 //->where('location', $location)
			                  ->set('qty','qty + ' . (int) $qty, FALSE)->update('warehouse');
			// $this->db->UPDATE ('warehouse')-> SET(' qty = qty + '.$qty )->where('id', $ccl)->where('location', $location);		  
			echo	'</br>'  . $wh_item_id.$location. $qty;		  
						 
         //this updates  warehouse side 
       /* $this->db->select('*');
        $this->db->where('id', $ccl);
        $this->db->where('location', $location);*/
		
      //  $this->db->update('warehouse',$data);
        }
		
        
       }
         $data_so_item = array( 
            'note' =>'cancelled',
            );
		 $this->db->where('sales_id', $id);
          $this->db->update('sales_orders_items',$data_so_item);     
           $data_so = array( 
            'status' =>'cancelled',
            );
          $this->db->where('salesorder_id', $id);
          $this->db->update('sales_orders',$data_so);
        
          redirect('' . base_url() . 'salesorders');
    }
	function deleteso($id){
        
        $this->db->select('*');
        $this->db->where('sales_id', $id);
        $this->db->from('sales_orders_items');
        $vendor_item = $this->db->get();
       

        foreach ($vendor_item->result() as $r) {
            
            //this grabs wharehous ref from sales order items 
           $wh_item_id = $r->wh_item_id;
           $location =  $r->location;
           $qty = $r->item_qty;
          
         
        if($r->backorderitem==='NO'){
		
        //this loops read to insert back to warehouse table
        /*$data = array(
            'qty' =>'qty + '$qty,
            );*/
			 $this->db->where('id', $wh_item_id)
			                 //->where('location', $location)
			                  ->set('qty','qty + ' . (int) $qty, FALSE)->update('warehouse');
			// $this->db->UPDATE ('warehouse')-> SET(' qty = qty + '.$qty )->where('id', $ccl)->where('location', $location);		  
			echo	'</br>'  . $wh_item_id.$location. $qty;		  
						 
         //this updates  warehouse side 
       /* $this->db->select('*');
        $this->db->where('id', $ccl);
        $this->db->where('location', $location);*/
		
      //  $this->db->update('warehouse',$data);
	            $this->db->where('sales_id', $id);
                $this->db->delete('sales_orders_items'); 
        }
		else{
			
			    $this->db->where('sales_id', $id);
                $this->db->delete('sales_orders_items');
			    
				
				
				$this->db->where('sales_id', $id);
				$this->db->delete('backorders_items');
			
		}
		
        
       }
             
      
          $this->db->where('salesorder_id', $id);
          $this->db->delete('sales_orders');
        
          redirect('' . base_url() . 'index.php/salesorders');
    }
	
	function deletecn($id){
        
 
			
			    $this->db->where('rf_id', $id);
                $this->db->delete('refund');
		
		
		
       
        
          redirect('' . base_url() . 'index.php/salesorders/order_refund');
    }
		
    function unship(){
        
        $sales_id = $this->input->post('salesid');
        //cahnges status in sales orders/////
        $so_status = array('status' => 'pending',);
        $this->db->where('salesorder_id', $sales_id);
        $this->db->update('sales_orders', $so_status);
        
         $redirect = '' . base_url() . 'index.php/salesorders/';
        redirect($redirect);

    }
	function unship_viewpage(){
        
        $sales_id = $this->input->post('salesid');
        //cahnges status in sales orders/////
        $so_status = array('status' => 'pending',);
        $this->db->where('salesorder_id', $sales_id);
        $this->db->update('sales_orders', $so_status);
        
         $redirect = '' . base_url() . 'index.php/salesorders/view/'.$sales_id;
        redirect($redirect);

    }
		//update SO info
    function to_pending() { 
        $id = $this->input->post('salesorder_id');    
        
        $pending = array(
             'status'  => 'pending',
            );
             
        $this->db->select('*');
        $this->db->where('salesorder_id', $id);
        $this->db->update('sales_orders',$pending);

        $redirect = '' . base_url() . 'index.php/salesorders/view/'.$id.'';
        redirect($redirect); 
   
    }
	// sales_to invoice\\\
    function toinvoice() {

        $this->load->view('toinvoice');
    }
	
    function to_invoice() {
	
	 $sales_id = $this->input->post('salesid');
	 $this->to_invoice_process($sales_id);
	 $redirect = '' . base_url() . 'index.php/salesorders/order_shipped/';
     redirect($redirect);
	}
	
	
	function to_invoice_viewpage() {
        $sales_id = $this->input->post('salesid');
	    $where = $this->input->post('where');
		
		$this->to_invoice_process($sales_id);
		
		
        $redirect = '' . base_url().'index.php/' .$where.'/view_invoiced/'.$sales_id ;
       redirect($redirect);
    }
   
    function to_invoice_process( $sales_id) {
          $so_status = array('status' => 'invoiced',);
        $this->db->where('salesorder_id', $sales_id);
        $this->db->update('sales_orders', $so_status);

	   $this->db->where('salesorder_id', $sales_id);
       $query=$this->db->get('invoices');      
       $num_rows = $query->num_rows();
	/*	$sales= $this->db->select('*')
		                 ->where('sales_id', $sales_id)
                        ->from('invoices');
		$num_rows = $sales->num_rows();*/
	   echo$num_rows;

	  if ($num_rows ===0)
	 {				
//if ($sales===false){  
//cahnges status in sales orders/////
      


//sellects all sales order info and items 

       
        $this->db->where('salesorder_id', $sales_id);
        $this->db->from('sales_orders');
		$so = $this->db->get();
        //$this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $datestring = " %Y-%m-%d";
        $time = time();
        $dateraised = mdate($datestring, $time);
        foreach ($so->result() as $r) { 
        $data = array(
            'salesorder_id' => $r->salesorder_id,
            'Company_name' => $r->Company_name,
            'buyername' => $r->buyername,
            
            'Company_id' => $r->Company_id,
            //'Customer_id' => $r->Customer_id,
            'shipping_cost' => $r->shipping_cost,
            'Grand_total' => $r->Grand_total,
			'Subtotal_total' => $r->Subtotal_total,
            'VAT_Rate' => $r->VAT_Rate,
            'VAT_ammount' => $r->VAT_ammount,
            'inc_vat' => $r->inc_vat,
           
            'dateraised' => $dateraised,
			
            'po_number' => $r->po_number,
            'status' => $r->status,
            'Address_1' => $r->Address_1,
            'Address_2' => $r->Address_2,
            'Town_city' => $r->Town_city,
            'Postcode' => $r->Postcode,
            'Buyer_Phone_Numbe' => $r->Buyer_Phone_Numbe,
        );

        $this->db->insert('invoices', $data);
		
		
		$this->db->where('sales_id', $sales_id);		
		$this->db->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $this->db->from('sales_orders_items');

		
		
		
		$so_item = $this->db->get();

		
		
		
//inputs invoice information from sales table
        foreach ($so_item->result() as $r) { // loop over results
            $invoice_items = array(
                'so_item_id' => $r->item_id,
				
                'sales_id' => $r->sales_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'item_qty' => $r->item_qty,
                'ItemPrice' => $r->ItemPrice,
                'itemlinetotal' => $r->itemlinetotal,
                //'Discount' => $r->Discount,
                'location' => $r->location,
                'po_number' => $r->po_number,
            );

            $this->db->insert('invoice_items', $invoice_items); // insert each row to another table
        }
		
       
       // $this->db->where('salesorder_id', $sales_id);
        ////$this->db->delete('sales_orders');
        //// insert each row to another table
//inserts items from selected sales order 
           }

}


 
    }
    
    
    function new_invoice($sales_id, $customer_id) {
        //echo $sales_id;
        //echo $customer_id;

        $this->load->helper('date');
        $datetime = date('Y-m-d');

        $invoice = array(
            'sales_id' => $sales_id,
            'Customerid' => $customer_id,
            'invoice_date_created' => $datetime,
        );
        $this->db->insert('invoices', $invoice);
        $this->insert_items_to_invoice($sales_id);
    }

    function insert_items_to_invoice($sales_id) {


//this inserts data from sales to invoice table
        $this->db->select('*');
        $this->db->where('sales_id', $sales_id);
        $items = $this->db->get('sales_orders_items');
        return $items;
        foreach ($items->result() as $value):
            $data = array(
                'itemCode' => $value->itemCode,
                'itemDesc' => $value->itemDesc,
                'back_order_qty' => $value->qty,
            );
            $this->db->insert('invoice_items', $data);
        endforeach;
    }


	
	
	
	
	
	//<-----generate pdf file-------------->
	
	
//// CSV EXPORT 
    function export_pending() {
	
        $this->load->database();
        $this->load->helper('file');
        $query = $this->db->get('sales_orders');
        $this->load->helper('csv');

        query_to_csv($query, FALSE, 'toto.csv');
        return;
    }

/////
    function packing_slip_today( ) {
        $datestring = " %Y-%m-%d";
        $time = time();
        $dateraised = mdate($datestring, $time);
		 $salesorders =  $this->db->select('*') 
	                             	->WHERE ('dateraised ',$dateraised)
									->WHERE ('Company_id ','14')
								    ->get('sales_orders');
		foreach ($salesorders->result() as $so) {
			
			$this->packingslip($so->salesorder_id );
			}
		
		}
    function packing_slip( ) {
	      
		  $id = $this->input->post('sales_id');
	      $this->packingslip($id );
    }

    function packingslip($id ) {

        

		
        $this->load->model('mdl_sales_orders');
        $data ['orders'] = $this->mdl_sales_orders->orders($id);
        $data['query'] = $this->mdl_sales_orders->packingslip($id);
		$data['num_rows'] = $this->mdl_sales_orders->count_item($id);
        $this->load->library('MPDF/mpdf');

       // $mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
        //$html =$this->load->view('packingslip', $data, TRUE);
		$packingslip=$this->load->view('pdf/packingslip',  $data);
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		//$mpdf=new mPDF('', 'Legal');
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		//$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
	
         
        $name = " SO#".substr(sprintf('%06d', $v->salesorder_id),0,6).".pdf";
		//echo 'name'.$name;
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		//$mpdf->WriteHTML($html);
	$Footer='<div style="margin-bottom:0px">zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420';
	//	$mpdf->Output($name, 'D'); 
      //  $mpdf->Output('d:/wamp/www/'.$name,'F');//Uploads_inv_pdf
		
 // $this->SetJS('this.print();');
   //echo'<body onload="window.print();">'.$mpdf->WriteHTML($html).'<body>';

	echo'<body onload="window.print();">'.$packingslip.'<body>';

	// window.print();
		
    }
	function SetJS($script) {
	$this->js = $script;
}
    function dir_packing_slip_today( ) {
        $datestring = " %Y-%m-%d";
        $time = time();
        $dateraised = mdate($datestring, $time);
		 $salesorders =  $this->db->select('*') 
	                             	->WHERE ('dateraised ',$dateraised)->WHERE ('Company_id ','14')
								    ->get('sales_orders');
		foreach ($salesorders->result() as $so) {
			
			$this->dir_packingslip($so->salesorder_id );
			
		}
		}
    
	
	function dir_packingslip($id){ //Direct packing slip w/o logo
    	 	
	  //	$data['page_title'] = $this->lang->line("Sales Order");
                               
        $this->load->model('mdl_sales_orders');
      //  $this->load->model('settings/mdl_settings');
      //  $this->load->model('warehouse/mdl_warehouse');
      //  $this->load->model('businesses/mdl_customers');
      //  $data ['orders'] = $this->mdl_sales_orders->orders($id);
		
				$data ['orders'] =$this->db->select('*')
                  ->where('salesorder_id',$id)
                  ->get('sales_orders');
		
	
        $data ['order_items']=$this->db->select('*')
                                       ->where('sales_id',$id)
                      //->where('backorderitem','YES')
                                        ->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
                                        ->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                                        ->get('sales_orders_items');	
		 

		
		 
		 
		$packingslip=$this->load->view('pdf/ce_pdf_sales_view', $data);
		print  $packingslip;
		/*$mpdf = new mPDF('utf-8', 'A4', 0, '', 12, 12, 25, 15, 12, 12);
		
		$mpdf=new mPDF(); 
		$mpdf->SetJS('this.print();');
$mpdf->WriteHTML($html);
$mpdf->Output();*/
  
	echo'<body onload="window.print();">'.$packingslip.'<body>';
		// window.print();
             
   }
   
  /* 
    function packing_slip1() {

        $id = $this->input->post('sales_id');

		
        $this->load->model('mdl_sales_orders');
        $data ['orders'] = $this->mdl_sales_orders->orders($id);
        $data['query'] = $this->mdl_sales_orders->packingslip($id);


       
	
        $html =  $this->load->view('salesorders/pdf/ce_pdf_sales_view', $data, TRUE);
		
		
		 
	 	$this->load->library('MPDF/mpdf');
			
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		//$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		$name = "DirPackSlip_SO_".$id.".pdf";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		$mpdf->Output(); 

	
		
		
    }

*/
	
	
	function search_allso() {
     
	    echo Modules::run('template/dash_head');
        $this->load->model('mdl_sales_orders'); 
		
        //$data['salesorders'] = $this->mdl_sales_orders->get_order_pending();		                      
        $data['backorders'] = $this->mdl_sales_orders->getbackorders();
        $data['needsbackoders'] = $this->mdl_sales_orders->ifbackorders();
		
   
        $salesorder_id=$this->input->post('salesorder_id'); 
        $po_number=$this->input->post('po_number'); 
        $Company_name= $this->input->post('Company_name');	
        $ShipToCompanyName= $this->input->post('ShipToCompanyName');    
		        
				
        $ship_Address_1=$this->input->post('ship_Address_1');          
        $ship_Postcode=$this->input->post('ship_Postcode');
		$Address_1=$this->input->post('Address_1');
         
	    $Postcode=$this->input->post('Postcode');

           // $data['salesorders'] = mysql_query("SELECT * FROM sales_orders WHERE Company_name  LIKE ".$Company_name."%'");
		// $data['salesorders'] = $this->mdl_sales_orders->get_order_pending();
	     $data['salesorders'] = $this->db->select('*')->where('dateraised >=', '2015-11-30')
						                             ->where('dateraised <=', '2015-11-30')
		                                             ->where('salesorder_id LIKE',$salesorder_id.'%')
		                                             
		                                            ->where('Company_name LIKE',$Company_name.'%')
		                                             ->where('ShipToCompanyName LIKE', $ShipToCompanyName.'%')
		                                             ->where('po_number LIKE',$po_number.'%')
                                                     ->where('ship_Address_1 LIKE',$ship_Address_1.'%')
                                                     ->where('ship_Postcode LIKE',$ship_Postcode.'%')
		                                             ->where('Address_1 LIKE', $Address_1.'%')
		                                             ->where('Postcode LIKE',$Postcode.'%')
                                                    ->get('sales_orders');

											 
		
 
	     $this->load->view('search', $data);

    }
	
		
	
    //generate pdf and force to download  
 
	function shipping_pdf3($id) { //Direct packing slip w/o logo
   	 	
	
                          
                $this->load->model('mdl_sales_orders');
    
				$data ['orders'] =$this->db->select('*')
                  ->where('salesorder_id',$id)
                  ->get('sales_orders');
		
	
$data ['order_items']=$this->db->select('*')
                      ->where('sales_id',$id)
                      ->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
                      ->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                      ->get('sales_orders_items');	
		 
		
       
        
    //20141209 viola    
		//$html =  $this->load->view('pdf_sales_view_ce', $data, TRUE);
    	$html =  $this->load->view('invoices/ce_pdf_sales_view', $data, TRUE);
		
		 
		 
	 	$this->load->library('MPDF/mpdf');
			
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		//$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		$name = "DirPackSlip_SO_".$id.".pdf";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);
$mpdf->WriteHTML($html);
		$result=$mpdf->WriteHTML($html);
		print $result;
		//return $result;
	//$mpdf->Output(); 
		//$mpdf->Output($name, 'D'); 
 return $name;
		//exit;

             
   }
	
	
    function invoice_pdf($id){//generate pdf and force to download  


    //salesorders
        
		
		 $this->load->model('mdl_sales_orders');
		
         $this->load->model('mdl_invoices');
         $data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
		 $invoice_info = $this->mdl_invoices->get_invoice_info_pdf($id);
		 
	
   	     
	foreach ($invoice_info->result() as $v)
        {
           
        }
		echo $v->salesorder_id;
        $data['so_info'] = $this->mdl_sales_orders->orders($v->salesorder_id);
        
       
	//$this->load->view('pdf_sales_view', $data);
       
      // $html =  $this->load->view('pdf_invoice_view', $data, TRUE);
	  $html =  $this->load->view('pdf/pdf_invoice_view', $data, TRUE);
	 	$this->load->library('MPDF/mpdf');
			 
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		//$mpdf=new mPDF('', 'Legal');
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		//$name = "invoice".$id.".pdf";
	
         
        $name = "invoice- SO#".substr(sprintf('%06d', $v->salesorder_id),0,6).".pdf";
		//echo 'name'.$name;
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		$mpdf->Output($name, 'D'); 
        $mpdf->Output('d:/wamp/www/'.$name,'F');//Uploads_inv_pdf
		
		exit;

              
   }

    
    function so_shipped_pdf($id){// so with LoGO
    	 	
	  //	$data['page_title'] = $this->lang->line("Sales Order");
                     
        $this->load->model('salesorders/mdl_sales_orders');
        
		
		$data ['orders'] =$this->db->select('*')
                  ->where('salesorder_id',$id)
                  ->get('sales_orders');
		$orders=$this->mdl_sales_orders->orders($id);
	     foreach ($orders->result() as $o){}
	    
		if (($o->backorder==='NO')OR($o->status!='onhold')){
        
		$data ['order_items']=$this->db->select('*')
                      ->where('sales_id',$id)
                      ->where('backorderitem','NO')
                      ->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
                      //->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                      ->get('sales_orders_items');	
		$html = $this->load->view('pdf/pdf_sales_view', $data, TRUE);
            }
			else{
				
				$data ['order_items']=$this->db->select('*')
                      ->where('sales_id',$id)
                      //->where('backorderitem','NO')
                      ->join('sales_orders', 'sales_orders.salesorder_id = backorders_items.sales_id')
                      //->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                      ->get('backorders_items');	
				
				$html = $this->load->view('pdf/pdf_sales_view', $data, TRUE);
			}
	    
		 
		 
		$this->load->library('MPDF/mpdf');
			
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		$name = "SO_".$id.".pdf";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		$mpdf->Output($name, 'D'); 

		//exit;

             
   }
     
	
    function cn_pdf($id){// so with LoGO
    	 	
	                               
        $this->load->model('mdl_sales_orders');
     		$data ['cn'] =$this->db->select('*')
                  ->where('rf_id',$id)
				  ->join('sales_orders', 'sales_orders.salesorder_id = refund.so_id')
                  ->get('refund');
		
	
        $data ['cn_items']=$this->db->select('*')
                                       ->where('rf_id',$id)
									   ->join('sales_orders_items', 'sales_orders_items.sales_id = refund.so_id')->where('so_item_note','return')
                                       ->join('sales_orders', 'sales_orders.salesorder_id = refund.so_id')
                                       //->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                                       ->get('refund');	
		 

		 $html = $this->load->view('pdf/pdf_cn_view', $data, TRUE);
		 
		 
	 	$this->load->library('MPDF/mpdf');
			
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		$name = "CN_".$id.".pdf";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		$mpdf->Output($name, 'D'); 

		exit;

             
   }
       
  
	function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_perfectcontroller');
        $this->mdl_perfectcontroller->_update($id, $data);
    }

    function _delete($id) {
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
    function _custom_query($mysql_query) {
        return $max_id;
    }

        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
        return $query;
    }

}
