<?php

class Quotes extends MX_Controller {

    function __construct() {
        parent::__construct();


        $this->load->module('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        
    }

    function index() {
        echo Modules::run('template/dash_head');
        $this->load->model('mdl_quotes');
        $data['quotes'] = $this->mdl_quotes->get();
        $this->load->view('quotes', $data);
        
    }
    
    

    function add_new() {
        
        $this->load->model('mdl_quotes');
        $this->load->model('businesses/mdl_company');
        $data ['businesses'] = $this->mdl_company->get();
       // $data ['customers'] = $this->mdl_customers->get_so_customers();
       // $this->load->view('add_quote', $data);
	   $this->load->view('add_new', $data);
    }

    function add_so() {
$datestring = " %Y-%m-%d";
$time = time();

$dateraised =  mdate($datestring, $time);
        $data = array(
		
		'dateraised' => $dateraised,
            'Company_id' => $this->input->post('company'),
          'Customer_id' => $this->input->post('customer_id'),
           'po_number' => $this->input->post('po_number'),
          
            'Company_name' => $this->input->post('buyer_name'),
			'buyername' => $this->input->post('contact'),
           //  'terms' => $this->input->post('terms'),
			
			'Address_1' => $this->input->post('address1'),
            'Address_2' => $this->input->post('address2'),
             'Town_city' => $this->input->post('town_city'),
                    'Buyer_Phone_Numbe' => $this->input->post('Phone_number'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
			'q_notes' => $this->input->post('notes'),
			
            'Buyer_Phone_Numbe' => $this->input->post('Phone_number'),
            'Postcode' => $this->input->post('Post_code'),
           // 'vat_exempt' => $this->input->post('vat_exempt'),
            'County' => $this->input->post('County'),	
		   
		
		
		'ShipToCompanyName' => $this->input->post('ShipToCompanyName'),
			'ship_Address_1' => $this->input->post('ship_address1'),
            'ship_Address_2' => $this->input->post('ship_address2'),
            'ship_County' => $this->input->post('ship_County'),
            'ship_Country' => $this->input->post('ship_Country'),
            'ship_Postcode' => $this->input->post('ship_Post_code'),
		
		
		
		
		
		
		
		
		/*
		
            'dateraised' => $dateraised,
			'Company_name' => $this->input->post('Company_name'),
            'Company_id' => $this->input->post('company'),
            'Customer_id' => $this->input->post('customer_id'),
            'po_number' => $this->input->post('po_number'),
            'buyername' => $this->input->post('buyer_name'),
                    'Address_1' => $this->input->post('address1'),
                    'Address_2' =>  $this->input->post('address2'),
                    'Town_city' => $this->input->post('town_city'),
                    'Buyer_Phone_Numbe' => $this->input->post('Phone_number'),
                    'Postcode' => $this->input->post('Post_code'),
                     'County' =>$this->input->post('County'),
                     'q_notes' => $this->input->post('notes'),
					 */
					 
        );

        $this->load->model('mdl_quotes');
        $this->db->insert('quotes', $data);
//$query = $this->db->get('sales_orders');
        $id = $this->db->insert_id();
        $redirect = '' . base_url() . 'index.php/quotes/view/' . $id . '';
        redirect($redirect);
    }

    
    
//---------------------------------
// All sales orders viewsbelow
//---------------------------------
    function view($id) {
echo Modules::run('template/dash_head');
        $this->load->model('mdl_quotes');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('businesses/mdl_customers');

        $data ['vat_rate'] = $this->mdl_settings->get_vat();
        $data ['addresses'] = $this->mdl_quotes->addresses($id);
        $data ['query'] = $this->mdl_warehouse->get1();
        $data ['customer'] = $this->mdl_customers->get_customer($id);
        //$data ['customer_items'] = $this->mdl_customers->get_customer_items($id);
        $data ['orders'] = $this->mdl_quotes->orders($id);
        $data ['order_items'] = $this->mdl_quotes->order_items($id);
        $data ['quotes'] = $this->mdl_quotes->quotes($id);
        $data['total'] = $this->mdl_quotes->total($id);
        $this->load->view('view', $data);
    }

    function item_added() {
        $qty = $this->input->post('qty');
        $itemPrice = $this->input->post('itemPrice');

        $lineprice = $itemPrice * $qty;

        $data = array(
            'quote_id' => $this->input->post('soid'),
            'CCL_Item' => $this->input->post('CCL_Item'),
            'Description' => $this->input->post('Description'),
            'item_qty' => $this->input->post('qty'),
            'itemPrice' => $this->input->post('itemPrice'),
            'itemlinetotal' => $lineprice,
            'location'=>$this->input->post('location'),
            'wh_item_id' => $this->input->post('id'),
        );


        $this->db->insert('quote_items', $data);
        $id = $this->input->post('soid');
        $redirect = '' . base_url() . 'index.php/quotes/view/' . $id . '';
        redirect($redirect);
    }

    function delete_item() {
        $id = $this->input->post('itemID');
       
        $soid = $this->input->post('soid');
        $this->db->where('item_id', $id)->delete('quote_items');

        //$this->load->model('mdl_sales_orders');
        //$this->mdl_sales_orders->_delete($id);

        $redirect = '' . base_url() . 'index.php/quotes/view/' . $soid . '';
        redirect($redirect);

        // echo $id;
    }

    function save() {

        // $GT = $this->input->post('total') + $this->input->post('vat_amount');
        $GT = $this->input->post('total');
        $id = $this->input->post('quote_id');
        $data = array(
            'VAT_Rate' => $this->input->post('vat_rate'),
            'VAT_ammount' => $this->input->post('vat_amount'),
            'inc_vat' => $this->input->post('inc_vat'),
            'Company_name' => $this->input->post('Company_name'),
            'Grand_total' => $GT,
        );


        $this->load->model('mdl_quotes');
        $this->mdl_quotes->_update_so($id, $data);

        $redirect = '' . base_url() . 'index.php/quotes/view/' . $id . '';
        redirect($redirect);
    }
    
    function save_note() { 
	
	$quotes_id = $this->input->post('quotes_id');
	 $data = array(
	 'q_notes'=> $this->input->post('q_notes'),
	
	
	);
	
	  $this->db->where('quotes_id', $quotes_id);
            $this->db->update('quotes',$data);	
		  $redirect = '' . base_url() . 'index.php/quotes/view/' . $quotes_id . '';
        redirect($redirect);
   
	
	}


    function edit_shipinfo() {
     
		
		

      
        $data = array(
            
           
         
            'po_number' => $this->input->post('po_number'),
           
          //  'status' => $this->input->post('onhold'),
			'Company_name' => $this->input->post('Company_name'),
			'ShipToCompanyName' => $this->input->post('ShipToCompanyName'),
			 'Shipping_Contact_No' => $this->input->post('Shipping_Contact_No'),
           'ship_Address_1' => $this->input->post('ship_Address_1'),
            'ship_Address_2' => $this->input->post('ship_Address_2'),
            'ship_County' => $this->input->post('ship_County'),
            'ship_Postcode' => $this->input->post('ship_Postcode'),
			'Shipping_Email' => $this->input->post('Shipping_Email'),
			//'vat_exempt' => $this->input->post('vat_exempt'),
		//	'currency' => $this->input->post('currency'),
			'Buyer_Phone_Numbe' => $this->input->post('Buyer_Phone_Numbe'),
             'Address_1' => $this->input->post('Address_1'),
            'Address_2' => $this->input->post('Address_2'),
			'County' => $this->input->post('County'),
			'Country' => $this->input->post('Country'),
			'Postcode' => $this->input->post('Postcode'),

        );

        $this->db->where('quotes_id', $this->input->post('quotes_id'));
            $this->db->update('quotes', $data);	
	   
	   $redirect = '' . base_url() . 'index.php/quotes/view/' . $this->input->post('quotes_id').'';
	 
       redirect($redirect);
	 
    }
   
	
    function same_as_billing($id) {
     
        $this->db->where('quotes_id',$id );
        $this->db->from('quotes');
        $boorders=$this->db->get();
        foreach ($boorders->result() as $value) {    
       
        $data = array(
            
           
			'Shipping_Contact_No' => $value->Buyer_Phone_Numbe,
             'ship_Address_1' => $value->Address_1,
            'ship_Address_2' => $value->Address_2,
			'ship_County' => $value->County,
			'ship_Postcode' => $value->Postcode,

        );

       $this->db->where('quotes_id',$id );
            $this->db->update('quotes', $data);	
	    }
	 
	   $redirect = '' . base_url() . 'index.php/quotes/view/' .$id. '';
     redirect($redirect);
	 
    }
	
	
    
    
    
//importing files 

    function upload_it() {
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));

        $sales_id = $this->input->post('salesid');

        $config['upload_path'] = 'C:\wamp\www\earth\uploads\so_imports';
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

// sales_to invoice\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    function toinvoice() {

        $this->load->view('toinvoice');
    }

    function to_invoice() {
        //gets post info from modal///
        $sales_id = $this->input->post('salesid');
        $customer_id = $this->input->post('salesid');


//cahnges status in sales orders/////
        $so_status = array('status' => 'invoiced',);

        $this->db->where('salesorder_id', $sales_id);
        $this->db->update('sales_orders', $so_status);


//sellects all sales order info and items 

        $this->db->select('*');
        $this->db->where('salesorder_id', $sales_id);
        $this->db->from('sales_orders');
        $this->db->join('sales_orders_items', 'sales_orders.salesorder_id = sales_orders_items.sales_id');
        $so = $this->db->get();

//inputs invoice information from sales table
        foreach ($so->result() as $r) { // loop over results
          $invoice_items = array(
                'item_id' => $r->item_id,
                'sales_id' => $r->sales_id,
                'CCL_Item' => $r->CCL_Item,
                'Description' => $r->Description,
                'item_qty' => $r->item_qty,
                'ItemPrice' => $r->ItemPrice,
                'itemlinetotal' => $r->itemlinetotal,
                'Discount' => $r->Discount,
                'location' => $r->location,
                'po_number' => $r->po_number,
            );  
          
          $this->db->insert('invoice_items', $invoice_items); // insert each row to another table
        }
           $data = array(
                'salesorder_id' => $r->salesorder_id,
                'Company_name' => $r->Company_name,
                'Company_id' => $r->Company_id,
                'Customer_id' => $r->Customer_id,
                'Grand_total' => $r->Grand_total,
                'VAT_Rate' => $r->VAT_Rate,
                'VAT_ammount' => $r->VAT_ammount,
                'inc_vat' => $r->inc_vat,
                'VAT_Rate' => $r->VAT_Rate,
                'dateraised' => $r->dateraised,
                'po_number' => $r->po_number,
                'status' => $r->status,
               
               'Address_1' => $r->Address_1,
               'Address_2' => $r->Address_2,
               'Town_city' => $r->Town_city,
               'Postcode' => $r->Postcode,
               'Buyer_Phone_Numbe' => $r->Buyer_Phone_Numbe,
               
            );
        
            $this->db->insert('invoices', $data); // insert each row to another table
//inserts items from selected sales order 

           
            
          
        

        $redirect = '' . base_url() . 'index.php/salesorders/';
        redirect($redirect);

//$this->new_invoice($sales_id,$customer_id);
//$this->insert_items_to_invoice($sales_id);
//$this->index();
    }

    function to_sales() {
        $this->load->helper('date');
		  $this->load->model('mdl_quotes');
        $datetime = date('Y-m-d'); 
		$quotes_id = $this->input->post('quotes_id');
      $customer_id = $this->input->post('Company_id');
       $buyername = $this->input->post('buyername');
       $total = $this->input->post('total');
       $inc_vat = $this->input->post('inc_vat');
       $vat_rate = $this->input->post('vat_rate');
       $vat_amount = $this->input->post('vat_amount');
     
     /*  $quote = $this->mdl_quotes->quotes($quotes_id);
       foreach ($quote->result() as $q){ } 
      $quote = array(
	        'quote_id' => $quotes_id,
            'Company_id' =>$q->Company_id,
            'Customer_id' =>$q->Customer_id,
			
			'PO_number' =>$q->po_number,
            'buyername' =>$q->buyername,
			
			
		    'Company_name' => $q->Company_name,
			'ShipToCompanyName' => $q->ShipToCompanyName,
			 'Shipping_Contact_No' => $q->Shipping_Contact_No,
           'ship_Address_1' => $q->ship_Address_1,
            'ship_Address_2' => $q->ship_Address_2,
            'ship_County' => $$q->ship_County,
			'ship_Country' => $$q->ship_Country,
            'ship_Postcode' =>$q->ship_Postcode,
			'Shipping_Email' => $q->Shipping_Email,
			

			
            'buyername'=>$q->buyername,
			'Buyer_Phone_Numbe'=>$q->Buyer_Phone_Numbe,
            'Address_1'=>$q->address1,
            'Address_2'=>$q->address2,
			'Town_city'=>$q->Town_city,
            
            'County'=>$q->County,
			'Country'=>$q->Country,
			'Postcode'=>$q->postcode,
            'dateraised' => $datetime,
           
            
            'Grand_total'=>$q->Grand_total,			
	         'Subtotal_total'=>$q->Grand_total,
			 
	         'VAT_Rate'=>$q->vat_rate,
			 'VAT_ammount'=> $q->vat_amount,
			 'inc_vat'=> $q->inc_vat,
            

        ); */ 

        $quote = array(
           
			
			'quote_id' => $quotes_id,
            'Company_id' =>$this->input->post('Company_id'),
            'Customer_id' =>$this->input->post('Customer_id'),
			
			'PO_number' =>$this->input->post('po_number'),
            'buyername' =>$this->input->post('buyername'),
			
			
		    'Company_name' => $this->input->post('Company_name'),
			'ShipToCompanyName' => $this->input->post('ShipToCompanyName'),
			 'Shipping_Contact_No' =>$this->input->post('Shipping_Contact_No'),
           'ship_Address_1' => $this->input->post('ship_Address_1'),
            'ship_Address_2' => $this->input->post('ship_Address_2'),
            'ship_County' => $this->input->post('ship_County'),
			'ship_Country' =>$this->input->post('ship_Country'),
            'ship_Postcode' =>$this->input->post('ship_Postcode'),
			'Shipping_Email' => $this->input->post('Shipping_Email'),
			

			
            'buyername'=>$this->input->post('buyername'),
			'Buyer_Phone_Numbe'=>$this->input->post('Buyer_Phone_Numbe'),
            'Address_1'=>$this->input->post('address1'),
            'Address_2'=>$this->input->post('address2'),
			'Town_city'=>$this->input->post('Town_city'),
            
            'County'=>$this->input->post('County'),
			'Country'=>$this->input->post('Country'),
			'Postcode'=>$this->input->post('postcode'),
            'dateraised' => $datetime,
           
            
            'Grand_total'=>$this->input->post('Grand_total'),			
	         'Subtotal_total'=>$this->input->post('Grand_total'),
			 
	         'VAT_Rate'=>$this->input->post('vat_rate'),
			 'VAT_ammount'=>$this->input->post('vat_amount'),
			 'inc_vat'=> $this->input->post('inc_vat'),
			
			
			
			
			
			
			
			
        );
     
       $status = array(
         'status'=>'Converted', 
       );
       $this->db->where('quotes_id',$quotes_id)->update('quotes', $status);
        
       $this->db->insert('sales_orders', $quote);
        $id = $this->db->insert_id();
        
     
        //$this->insert_items($id, $sales_id);
       
    
    
       
//this inserts data from sales to invoice table
     $this->load->model('warehouse/mdl_warehouse');
      $data ['query'] = $this->mdl_warehouse->get1();
	 
	 
	 
	 
	 $Items = $this->mdl_quotes->get_items($quotes_id);
       /* if( $AV > $qty) {   

            foreach ($Items->result() as $value){
                $data = array(
               'wh_item_id' => $value->wh_item_id,
               'sales_id' => $id,
               'CCL_Item' => $value->CCL_Item,
               'Description' => $value->Description,
               'item_qty' => $value->item_qty,
               'ItemPrice' => $value->ItemPrice,
               'itemlinetotal' => $value->itemlinetotal,
               'location' => $value->location,
               'Discount'=>$value->Discount,
			    'backorderitem'=>'NO'
                 );
		   
		   
                 $this->db->insert('sales_orders_items', $data);
            }

	   }
	   else*/
	   {
		     foreach ($Items->result() as $value){
				 $databo = array(
			//'wh_item_id' => $value->wh_item_id,   
            'sales_id' =>  $id,
            'CCL_Item' => $value->CCL_Item,
            'Description' => $value->Description,
            'item_qty' => $value->item_qty,
            'itemPrice' => $value->ItemPrice,
            'itemlinetotal' =>  $value->itemlinetotal,
            'location' =>'Holding Area',
           
           'backorderitem'=>'YES'
      );
			 }
      $this->db->insert('backorders_items', $databo);
       $this->db->insert('sales_orders_items', $databo);
	   }
	   
	   
	   
	   
      $redirect = '' . base_url() . 'index.php/salesorders/view/'.$id.'';
       redirect($redirect);   
    }
    
     function pdf_pro_invoice($id) {  //generate pdf and force to download  


    
         $this->load->model('mdl_quotes');
         $data['invoice_info'] = $this->mdl_quotes->get_invoice_info($id);
   	     $invoice = $this->mdl_quotes->get_invoice_info($id);
	foreach ($invoice->result() as $v)
        {
          
        }
		 $name = "Pro-forma Invoice#".substr(sprintf('%06d', $v->quotes_id),0,6).".pdf";

        
        //$data['total'] = $this->mdl_sales_orders->total($id);
	//$this->load->view('pdf_sales_view', $data);
        
         $html =  $this->load->view('pdf/pdf_pro_invoice', $data, TRUE);
	
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
                
	
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		$mpdf->Output($name, 'D'); 
        $mpdf->Output('d:/wamp/www/'.$name,'F');//Uploads_inv_pdf
		
		//exit;

              
   }

    

//end to invoice\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
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
    
    function packing_slip(){
        
        $id = $this->input->post('sales_id');
        
        $this->load->model('mdl_sales_orders');
     $data ['orders'] = $this->mdl_sales_orders->orders($id);
     $data['query']=$this->mdl_sales_orders->packingslip($id);
   
        
        $this->load->view('packingslip',$data);
    }
    
    function get($order_by) {
        $this->load->model('mdl_perfectcontroller');
        $query = $this->mdl_perfectcontroller->get($order_by);
        return $query;
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

    function delete($id) {
        $this->load->model('mdl_quotes');
        $this->mdl_quotes->_deletequote($id);
        
        
       $redirect = '' . base_url() . 'index.php/quotes/';
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