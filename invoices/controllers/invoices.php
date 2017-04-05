<?php
class Invoices extends MX_Controller {


    function __construct() {
        parent::__construct();

            $this->load->module('auth');
            if (!$this->ion_auth->logged_in()){
		
			redirect('auth/login');
		    }
            echo Modules::run('template/dash_head');     
          
    }

    function index(){
        echo Modules::run('template/dash_head'); 
        $this->load->model('mdl_invoices');
        // $data['invoices'] = $this->mdl_invoices->get();
        
        $today = mdate(" %Y-%m-%d",  time());      
	    $from= date('Y-m-d', strtotime('-'.number_format(60,0, '.', '').' day', strtotime($today)));//list last 60 days invoices
	    $this->db->select('*')
             ->from('invoices');
        $this->db->group_by('invoice_id');
        $this->db->where('dateraised >=',$from ); 	
        $data['invoices'] = $this->db->get(); 
		$data['date']=array(                       
                         $from, $today,
                         );  

		$this->load->view('invoices',$data);
    }

    function view($id){
    echo Modules::run('template/dash_head'); 
	 $this->load->model('salesorders/mdl_sales_orders');

    $this->load->model('mdl_invoices');
    $data['invoice_info'] = $this->mdl_invoices->get_invoice_info($id); 
    $data['orders'] = $this->mdl_invoices->orders($id);
	$invoice_info = $this->mdl_invoices->get_invoice_info($id);
	$sales_info = $this->mdl_sales_orders->order_items($id);
	
	$data['invoice_payment'] = $this->mdl_invoices->get_invoice_payment($id);
    
    foreach ($sales_info ->result() as $sales) {
		 	$this->mdl_invoices->item_amount($id);
	}
	$this->mdl_invoices->item_total($id);
	$this->mdl_invoices->invoice_total($id);
    foreach ($invoice_info->result() as $invoice) {}
   
	/*		$data_price = array(
                       
                        'VAT_ammount' => $in->VAT_ammount,
                        'shipping_cost'=>$in->shipping_cost,           
                        'Grand_total' =>$in->Grand_total,
						'Subtotal_total' =>$in->Subtotal_total,
						'inc_vat' => $in->inc_vat,
						
                    ); 
	$this->db->where('salesorder_id', $invoice->salesorder_id);      
    $this->db->where('inc_vat !=',$in->inc_vat); 
    $this->db->update('invoices', $data_price);	$data_price = array(
                       
                        'VAT_ammount' => $in->VAT_ammount,
                        'shipping_cost'=>$in->shipping_cost,           
                        'Grand_total' =>$in->Grand_total,
						'Subtotal_total' =>$in->Subtotal_total,
						'inc_vat' => $in->inc_vat,
						
                    ); 
	
	$this->db->update('sales_orders_items', $item_price);*/
	
	
	
	
	
	
	
	
	
	
	$data['payment_made_total'] =$this->mdl_invoices->payment_made_total($invoice->invoice_id);

   
   
 
	
	
	
	$this->load->view('view',$data);
    
    
    }

    //<------ invoices status----------->


//20150130 VIOLA ADD
    function invoices_sent(){
       echo Modules::run('template/dash_head'); 
		 
		 $data['invoices']=$this->db->select('*')->where('dateraised >=','2015-12-20') 
			->where('sent','sent')			  
			->get('invoices');
      $this->load->view('invoices',$data);  
    //$this->load->view('invoices_sent',$data);


    }
	//20150130 VIOLA ADD
    function invoices_unsent(){
        echo Modules::run('template/dash_head'); 
        $data['invoices'] =$this->db->select('*')
		                            ->where('dateraised >=','2015-12-20')
			->where('sent','un-sent')			  
			->get('invoices');
   
        $this->load->view('invoices',$data); 
	}
//20150130 VIOLA ADD
    function invoices_unpaid(){
    
	echo Modules::run('template/dash_head'); 
      
    $data['invoices'] = $this->db->select('*') 
	                             ->where('dateraised >=','2015-12-20')
		                         ->where('status !=','part paid')
                                 ->where('status !=','paid')									 
			                     ->get('invoices');
	$data['status']=array(                       
                         'Awaiting Paid','invoiced'
                         );  							 
    $this->load->view('invoices_paid',$data);
	}

    function invoices_paid(){
    
	echo Modules::run('template/dash_head'); 
      
    $data['invoices'] = $this->db->select('*')
	                             ->where('dateraised >=','2015-12-20')     
		                         ->where('status','paid')			  
			                     ->get('invoices');
	$data['status']=array(                       
                         'Paid','paid'
                         );  							 
    $this->load->view('invoices_paid',$data);
	}
//20150130 VIOLA ADD
    function invoices_part_paid(){
         echo Modules::run('template/dash_head'); 
       
    $data['invoices'] = $this->db->select('*') 
	                             ->where('dateraised >=','2015-12-20')
		                         ->where('status','part paid')			  
			                     ->get('invoices');
	$data['status']=array(                       
                         'Part Paid','part paid'
                         );  							 
    $this->load->view('invoices_paid',$data);
	}	


	function update_vat_n_total() {
        


		$invoices=$this->db->select('*')
                           //->from('sales_orders_items')
						   ->where('ItemPrice !=','' )
						  // ->where('item_id  >=',8771)
                           ->get('sales_orders_items');
 //->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
                      //->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                     // ->get('sales_orders_items');	
            foreach ($invoices->result() as $in) {

			$data_price = array(
                       
                        'ItemPrice' => $in->ItemPrice,
                        'itemlinetotal'=>$in->itemlinetotal,           
                       
						
                    ); 
                 
          // $this->db->where('Company_id','1'); 
			
		 //	$this->db->where('item_id  >=',8293);
			//$this->db->where('so_item_id', $in->item_id);
			//$this->db->where('CCL_Item', $in->CCL_Item);
          //  $this->db->where('date_changed >=  ','2016-01-01 '); 
			//$this->db->where('ItemPrice >=',0);
			//$this->db->where('ItemPrice !=',$in->ItemPrice); 
			//$this->db->where('itemlinetotal !=',$in->itemlinetotal); 
           // $this->db->update('invoice_items', $data_price);
		
	  }
      /* $this->db->SET('VAT_ammount',('Grand_total'+'shipping_cost')*0.2)
                  ->SET('inc_vat',('Grand_total'+'shipping_cost')*1.2)
                  ->UPDATE('sales_orders');*/
		/*	$this->db->SET('VAT_ammount',('Grand_total'+'shipping_cost')*0.2)
                  ->SET('inc_vat',('Grand_total'+'shipping_cost')*1.2)
				  ->WHERE('currency','GBP')
				  ->WHERE('dateraised >=','2016-01-01 ' )
                  ->UPDATE('invoices')	  ;*/
        /*  mysql_query("UPDATE invoices SET inc_vat = (Grand_total+shipping_cost)*1.2 , VAT_ammount=(Grand_total+shipping_cost)*0.2   where currency='GBP' AND invoice_id >3971 And status='unpaid'");*'
	//echo 'xxx';
        //$redirect = '' . base_url() . 'invoices/';
       // redirect($redirect);*/
    }
	
	function update_vat_n_total_2() {
        


		$invoices=$this->db->select('*')
                           //->from('sales_orders_items')
						   ->where('ItemPrice !=','' )
						  // ->where('item_id  >=',8771)
                           ->get('sales_orders_items');
 //->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
                      //->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
                     // ->get('sales_orders_items');	
            foreach ($invoices->result() as $in) {

			$data_price = array(
                       
                        'ItemPrice' => $in->ItemPrice,
                        'itemlinetotal'=>$in->itemlinetotal,           
                       
						
                    ); 
                 
          // $this->db->where('Company_id','1'); 
			
		 	$this->db->where('item_id  >=',8293);
			$this->db->where('so_item_id', $in->item_id);
			//$this->db->where('CCL_Item', $in->CCL_Item);
          //  $this->db->where('date_changed >=  ','2016-01-01 '); 
			//$this->db->where('ItemPrice >=',0);
			//$this->db->where('ItemPrice !=',$in->ItemPrice); 
			//$this->db->where('itemlinetotal !=',$in->itemlinetotal); 
            $this->db->update('invoice_items', $data_price);
		
	  }
       /* $this->db->SET('VAT_ammount',('Grand_total'+'shipping_cost')*0.2)
                ->SET('inc_vat',('Grand_total'+'shipping_cost')*1.2)
        ->UPDATE('sales_orders');*/
       // mysql_query("UPDATE invoices SET inc_vat = (Grand_total+shipping_cost)*1.2 , VAT_ammount=(Grand_total+shipping_cost)*0.2   where status='invoiced And status='unpaid'");
	echo $in->sales_id;
        //$redirect = '' . base_url() . 'invoices/';
       // redirect($redirect);
    }
       
	function update_vat_n_total_3() {
        


		$invoices=$this->db->select('*')
                           ->from('sales_orders')
                           ->get();

        foreach ($invoices->result() as $in) {
		   
			$data_price = array(
                       
                        'VAT_ammount' => $in->VAT_ammount,
                        'shipping_cost'=>$in->shipping_cost,           
                        'Grand_total' =>$in->Grand_total,
						'Subtotal_total' =>$in->Subtotal_total,
						'inc_vat' => $in->inc_vat,
		     ); 			
              
                 
          // $this->db->where('Company_id','1'); 
			$this->db->where('salesorder_id', $in->salesorder_id);
           // $this->db->where('Grand_total',0); 
			$this->db->where('Subtotal_total !=',$in->Subtotal_total); 
			//$this->db->where('inc_vat !=',$in->inc_vat); 
            $this->db->update('invoices', $data_price);
		
	  }
       /* $this->db->SET('VAT_ammount',('Grand_total'+'shipping_cost')*0.2)
                ->SET('inc_vat',('Grand_total'+'shipping_cost')*1.2)
        ->UPDATE('sales_orders');*/
       // mysql_query("UPDATE invoices SET inc_vat = (Grand_total+shipping_cost)*1.2 , VAT_ammount=(Grand_total+shipping_cost)*0.2   where status='invoiced And status='unpaid'");
	
        $redirect = '' . base_url() . 'invoices/';
       // redirect($redirect);
    }
	
	
	function get_inv_date() {


	$datepickerFrom =$_POST['datepickerFrom'];
    $datepickerTo =$_POST['datepickerTo'];

    echo$datepickerFrom.'1</br>';
    echo$datepickerTo .'1to</br>';


    $datestring1 = " %Y-%m-%d";
    $time1 = time();
    $datestring2 = " %Y-%m-%d";
    $time2 = time();
         $datepickerFrom = date($datepickerFrom, $time1);
		 //$datepickerFrom1 = days_in_month($$datepickerFrom, $time1);
		 $datepickerTo = date($datestring2, $time2);
 
        $this->load->model('mdl_invioces');
       // $this->load->model('businesses/mdl_customers');
        $data ['inv_by_date'] = $this->mdl_invioces->get_inv_date();
      //  $data ['customers'] = $this->mdl_customers->get_so_customers();
        $this->load->view('inv_by_date', $data);
    }


    //<------search invoices------------>

    function filterByDate(){   //viola
    
	
	
	echo Modules::run('template/dash_head'); 

//$datepickerFrom =new DateTime($_POST['datepickerFrom']);
//$datepickerTo =new DateTime($_POST['datepickerTo']);
$datepickerFrom =$_POST['datepickerFrom'];
$datepickerTo =$_POST['datepickerTo'];
$company =$_POST['company'];




$datepickerFrom= date_format(date_create_from_format('m/d/Y', $datepickerFrom), 'Y-m-d');
$datepickerTo= date_format(date_create_from_format('m/d/Y', $datepickerTo), 'Y-m-d');
/*
echo$datepickerFrom.'</br>';

echo$datepickerTo .'to';*/

  // if (($company==='')&&($datepickerFrom!='')&&($datepickerTo!='')){
    if ($company===''){
    $data['inv_date'] =  $this->db->select('*') 
	                              ->where('sent','un-sent' )	
				                  ->WHERE ('dateraised >',$datepickerFrom,'AND dateraised <',$datepickerTo)
					    //->WHERE ('Company_id',$company)
                                   ->get('invoices');
					
					
	}
	else
	{
	$data['inv_date'] =  $this->db->select('*')
	                              ->where('sent','un-sent' )	
				                  ->WHERE ('dateraised >',$datepickerFrom,'AND dateraised <',$datepickerTo)
					              ->WHERE ('Company_id',$company)
                                  ->get('invoices');

					}
	$data['date']=array(
                       
                         $datepickerFrom,$datepickerTo,
                         );   
	$this->load->view('filterByDate',$data);		 
			   

 
 
}
    
	function search(){   //viola
 
    echo Modules::run('template/dash_head');
    $datepickerFrom =$_POST['datepickerFrom'];
    $datepickerTo =$_POST['datepickerTo'];
	$status =$_POST['status'];

	$data['date']=array(                       
                         $datepickerFrom,$datepickerTo,
                         );  
	
     if (!empty($_POST['status']) )
	 {
		 
		 $data['invoices'] =  $this->db->select('*') 
		                               ->where('dateraised >=','2015-12-20')
				                  ->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)					     
                                  ->WHERE ('status',$status)					     
								  ->get('invoices');
		 
	        
			$data['status']=array(                       
                         '','invoiced'
                         ); 
			
			
			
			$this->load->view('invoices_paid',$data);
								  
	 }

	 else{
		 $data['invoices'] =  $this->db->select('*') 	                              
				                  ->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)					     				     
								  ->get('invoices');
		
		 	
	 }
	
 

   	 
			   

 
 
}

    function search_comp_Date(){   //viola
 
           echo Modules::run('template/dash_head'); 

        $this->load->library('form_validation');
        $id = $this->uri->segment(3);  
        $this->load->model('businesses/mdl_company');
        $datepickerFrom =$_POST['datepickerFrom'];
        $datepickerTo =$_POST['datepickerTo'];
        $company =$_POST['company'];


 

$datepickerFrom= date_format(date_create_from_format('m/d/Y', $datepickerFrom), 'Y-m-d');
 
 
$datepickerTo= date_format(date_create_from_format('m/d/Y', $datepickerTo), 'Y-m-d');
 
/*
echo$datepickerFrom.'</br>';

echo$datepickerTo .'to';*/


 
    $data['company_items'] =  $this->db->select('*') 	
			                           ->where('dateraised >=','2015-12-20')

				                  ->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)					     
                                  ->WHERE ('Company_id',$company)
								  ->group_by('invoice_id' )
								  ->get('invoices');
					
					
	 
	$data['date']=array(
                       
                         $datepickerFrom,$datepickerTo,
                         );   
						 
		$data ['company'] = $this->mdl_company->get_where($company);


$data['inv_company'] =  $this->db->select('*')
               		         ->where('sent','un-sent' )		   
					         ->WHERE ('Company_id',$id)
                             ->get('invoices');				 
						 
						 
						 
						 
						 
						 
						 
						 
						 
						 
						 
						 
	 $this->load->view('view_inv',$data);		 
			   

 
 
}
  
    
    //<------email invoices------------>
    function email_com_inv(){
    
	
	echo Modules::run('template/dash_head'); 
    $this->load->model('mdl_invoices');
    //$data['invoices'] = $this->mdl_invoices->get();  20150707 viola edit
	//20150707 viola add
    $today = mdate(" %Y-%m-%d",  time());      
	$from= date('Y-m-d', strtotime('-'.number_format(60,0, '.', '').' day', strtotime($today)));
	$this->db->select('*')
             ->from('invoices');
    $this->db->group_by('Company_id');
    $this->db->where('dateraised >=',$from ); 	
    $data['invoices'] = $this->db->get(); 
	
    $this->load->view('email_com_inv',$data);
}
  
	function view_inv($id){
           
		    echo Modules::run('template/dash_head'); 

            $this->load->library('form_validation');          
            $this->load->model('businesses/mdl_company');
            $this->load->model('invoices/mdl_invoices');


//$data ['query'] = $this->mdl_warehouse->get();
//$data ['invoices_company'] = $this->mdl_invoices->get_company_info();
            $data ['company'] = $this->mdl_company->get_where($id);
//$data ['company_items'] = $this->mdl_company->get_items($id);

            $data['inv_company'] =  $this->db->select('*')
               		                         ->where('sent','un-sent' )		   
					                         ->WHERE ('Company_id',$id)
                                             ->get('invoices');
							 
            $data ['company_items'] = $this->db->WHERE ('Company_id',$id)->group_by('salesorder_id' )->get('invoices');
                             
            $this->load->view('view_inv',$data);

    }

    function mail_invoice($id){
    echo Modules::run('template/dash_head'); 
	

    $this->load->model('mdl_invoices');
    $data['invoice_info'] = $this->mdl_invoices->get_invoice_info($id);
     $data ['company_inv'] = $this->mdl_invoices->get_inv_comp($inv_id );
		$data ['the_inv'] = $this->db->where('invoice_id', $inv_id)
                                      ->get('invoices');
	 
	 //$data['invoice_payment'] = $this->mdl_invoices->get_invoice_payment($id);
    $this->load->view('mail_invoice',$data);
    
    
}
//20150130 VIOLA ADD

    //test  by viola 20150101
    function send_inv($inv_id) {//step1
    //$id = $_POST['inv_id'];
    //$inv_id = $this->input->post('inv_id');
 
 
 
        $this->load->model('mdl_invoices');       
		$data ['company_inv'] = $this->mdl_invoices->get_inv_comp($inv_id );
		$data ['invoice_info'] =$this->mdl_invoices->get_invoice_info_pdf($inv_id);
		                            
		
		$this->generate_attach_pdf($inv_id );

         
		
		
		//redirect('view'.$inv_id);
		$this->load->view('send_inv_each_form', $data);
    }
	  
    function generate_attach_pdf($id ){//step2

	$this->load->model('mdl_invoices');
   
	$invoice = $this->mdl_invoices->get_invoice_info_pdf($id);
	foreach ($invoice->result() as $v)
        {
           $so_id=$v->salesorder_id;
       
		
		
		
//*******************generate pdf
//$name = "invoice- SO#".$v->salesorder_id.".pdf";
$name = "invoice- SO#".substr(sprintf('%06d', $v->salesorder_id),0,6).".pdf";
//$path="D:/Users/public/Uploads_inv_pdf/";
   $path="D:/wamp64/www/demo/uploads/Uploads_inv_pdf/";  
		 

        if (!file_exists($path))
		{
		
        $data['so_info'] = $this->mdl_sales_orders->orders($v->salesorder_id);
        $data ['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
        $html =  $this->load->view('pdf_invoice_view', $data, TRUE);
	 
	 	$this->load->library('MPDF/mpdf');
			 
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales_order');
		$mpdf->SetFooter('SHUGUAN LIN DENO Bank Details: Sort Code 12-34-56 Account number: 01234567');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		//$name = "invoice- SO# ".$id.".pdf";
		$path='D:\wamp64\www\demo\uploads\Uploads_inv_pdf';  
		//echo 'name'.$name;
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	  
	    
		//$mpdf->Output($name, 'D'); 
        //$mpdf->Output('d:/wamp/www/'.$name,'F');Uploads_inv_pdf
		$mpdf->Output($path.$name,'F');
      
		echo "<script type='text/javascript'>alert('Invoice file is ready')</script>";
		}
	
	 }
}
   
    //20150101  viola edit
    function send_pdf(){
   
	 echo Modules::run('template/dash_head'); 
   
        $this->load->model('mdl_invoices');
        $id=$_POST['inv_id'];
        $comp_id=$_POST['comp_id'];
        $comp_name=$_POST['comp_name'];
        //$date=$_POST['date'];

//**********************do eamiling
//require("class.phpmailer.php"); // requiring PHPMailer class
require 'PHPMailerAutoload.php';
$mail=new PHPMailer(); // creating new instance of PHPMailer
//paste from sendmailmygmail.php
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtpout.secureserver.net'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
//$mail->SetFrom($_POST[‘senderEmail’], $_POST['emailFormName']);

$mail->FromName = "hello from SLin";
$mail->Username = "shuguann@gmail.com";
//$mail->Password = "Cr@wn2014";
$mail->Password = "guan0228735525";







$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.




$mail->addAddress("xxxxx@hotmail.com",$_POST['comp_name']);
$mail->addCC("xxxx@gmail.com","Crown");
$mail->Subject = "Demo email Invoice";
$mail->Body = "........................Hi,<br /><br />Please find the outstanding invoice attached.";


 
$mail->addattachment($path .$name, $name, 'base64', 'application/pdf'); 




if(!$mail->Send()) 
     {

echo "Mailer Error: " . $mail->ErrorInfo;

      } 
else {

//echo "Message sent!";
echo "<script type='text/javascript'>alert('Invoice Sent successfully!')</script>";
     }
	 
	 
   

               
   }	
		
    //20150101  viola add   
    function send_inv_form(){//step3
    
	
   
        $this->load->model('mdl_invoices');
       //$inv_id = $this->input->post('inv_id');
        $id=$_POST['inv_id'];
        $comp_id=$_POST['comp_id'];
        $comp_name=$_POST['comp_name'];
        $so_id=$_POST['so_id'];


//*******************generate pdf
        $data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
		
        $name = "invoice- SO# ".$so_id.".pdf";
        $path="D:/wamp64/www/demo/uploads/Uploads_inv_pdf/";  
      
  
            if (!file_exists($name)){
				
				
				 $this->load->model('mdl_sales_orders');
		
         $this->load->model('mdl_invoices');
         $data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
		 $invoice_info = $this->mdl_invoices->get_invoice_info_pdf($id);
		 foreach ($invoice_info->result() as $v)
        {
           
        }
		echo $v->salesorder_id;
	
   	     

		//echo $v->salesorder_id;
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
		$mpdf->SetFooter(' SHUGUAN LIN demo, Account number: 1234');
		//$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		//$name = "invoice".$id.".pdf";
	
         
        $name = "invoice- SO#".substr(sprintf('%06d', $v->salesorder_id),0,6).".pdf";
	
		 $path="D:/wamp64/www/demo/uploads/Uploads_inv_pdf/";  
			$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
		//$mpdf->Output($name, 'D'); 
        $mpdf->Output($path.$name,'F'); 
		
		//exit;

		echo'generate file';
        }
//down with generating pdf 
         




//**********************do eamiling
require("class.phpmailer.php"); // requiring PHPMailer class
require("class.smtp.php");
//require 'PHPMailerAutoload.php';
$mail=new PHPMailer(); // creating new instance of PHPMailer
//paste from sendmailmygmail.php

$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;

//$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
//$mail->Host = 'smtpout.secureserver.net';//GoDaddy -outgoing 
$mail->Host = ' smtp.gmail.com';

$mail->Port = 465;//GoDaddy -outgoing
//$mail->Port =993;
$mail->SMTPSecure = 'ssl';
//$mail->SetFrom($_POST[‘senderEmail’], $_POST['emailFormName']);


//$mail->FromName = $_POST['fullName'];
$mail->FromName ="shuguan's demo";
//$mail->Username = "imviolalin@gmail.com";
//$mail->Username = "admin@crown-professional.co.uk";
$mail->Username = 'shuguann@gmail.com';
//$mail->Username = "bruce@zenith-hw.co.uk";

//$mail->setFrom("sales@crown-professional.co.uk",$_POST['fullName']);
$mail->Password = "guan0228735525";
//$mail->Password = "Cr@wn666";


$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.


//$mail->addAddress("cutielala@hotmail.com",$_POST['comp_name']);
$mail->addAddress($_POST['emailTo'],$_POST['comp_name']);
$mail->addCC($_POST['emailTo2'],$_POST['comp_name']);
//$mail->addCC("imvioalin@gmail.com",$_POST['comp_name']);
//$mail->to=$_POST['emailTo']; 
//$mail->Subject = $_POST['emailSubject'];

//$mail->to=$_POST['emailTo']; 
$mail->Subject = $_POST['emailSubject'];
$mail->Body = $_POST['emailMessage'];

 
$mail->addattachment($path .$name, $name, 'base64', 'application/pdf'); 






if(!$mail->Send()) 
     {

echo "Mailer Error: " . $mail->ErrorInfo;

      } 
else {

             //   echo "Message sent!";
              //  echo "<script type='text/javascript'>alert('Invoice MSG Sent successfully!')</script>";
                 $data= array(
                       
                         'sent'=>'sent',
                         );  

                 $this->db->where('invoice_id',$id );
                 $this->db->update('invoices',$data);
				 redirect('invoices/view_inv/'.$comp_id);
     }

//redirect('invoices');


     

               
   }
      
    

	
	//<------payment----------->
	function pay_at_a_time(){
       echo Modules::run('template/dash_head'); 
    $this->load->model('mdl_invoices');
    $data['invoices'] = $this->mdl_invoices->get();
   
    $this->load->view('pay_at_a_time',$data);
    }
    
    function getuser(){//check  custmer payment detail
    
	
	$q = intval($_GET['q']);   
	$today = mdate(" %Y-%m-%d",  time());      
	$from= date('Y-m-d', strtotime('-'.number_format(500,0, '.', '').' day', strtotime($today)));
    /* $query =$this->db->where('Company_id',$q)
			 //->where('dateraised >=',$from)
			 //->where('dateraised >=','2015-06-02' )
			 ->from('invoices');     */      
    $this->db->select('*')
             ->from('invoices');
    $this->db->where('Company_id',$q);
    $this->db->where('dateraised >=',$from ); 	
    $query = $this->db->get();           
         
         //tab1                
    echo'<div class="tab-pane active" id="tab1">
									  <div class="panel-group" id="accordion">
										  <div class="panel panel-default">
											 <div class="panel-heading">
												<h3 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_1">Part-Paid SalesOrder</a> </h3>
											 </div>
											 <div id="collapse1_1" class="panel-collapse collapse in">
												<div class="panel-body">'; 
												
												
												echo'Last 120 days invoices</br><table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
										     
											             <th>SO#</th>
                                            
                                                        <th> PO No: </th>
                                                        <th>Date Raised</th>
											            
											            <th>Subtotal </th>
											            <th>Shipping/Freight</th>
											            <th>VAT</th>
                                                        <th>Total Inc VAT</th>
                                             <th>Status </th>
                                           
                                                        <th>  </th>
											            <th> Paid </th>
											            <th> Balance </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                                      foreach ($query->result() as $row) {
                                                               
			                                         
                                                       if	($row->status==='part paid'){															   
													   
                                                        echo '<tr class="gradeX">';
						
			
			                                            echo '<td>'. $row->salesorder_id .'</td>';
			                                            echo '<td>'. $row->po_number .'</td>';
	                                                    echo '<td>'. $row->dateraised.'</td>';
			
			echo '<td>'. $row->Subtotal_total .'</td>';
			echo '<td>'. $row->shipping_cost .'</td>';
		    echo '<td>'. $row->VAT_ammount .'</td>';
	        echo '<td>'. $row->inc_vat .'</td>';
			echo '<td></td>';
			
		    
																$payment=$this->db->where('invoice_id', $row->invoice_id)
                                                                                  ->get('payments'); 
																$paid=0;	
																$paid+=$paid;		  
																 foreach ($payment->result() as $paid_amount) {	
																
																 $paid=$paid_amount->amount;
																 }
			
	                                                    echo '<td>'.$paid.'</td>';
			                                           $balance=$row->inc_vat-$paid;
		                                                echo '<td>'.$balance .'</td>';													  
			
																
			                                            echo '</tr>';
			                                            }

                                                           }
echo'</tbody></table>';



echo'
											 
											 
											 
											 </div>
										  </div>
										
										  <div class="panel panel-success">
											 <div class="panel-heading">
												<h3 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_3">Un-Pay SalesOrder</a> </h3>
											 </div>
											 <div id="collapse1_3" class="panel-collapse collapse">
												<div class="panel-body">';
												echo'Last 120 days invoices</br><table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                                  <thead>
                                                  <tr>
										     
											<th>SO#</th>
                                            
                                            <th> PO No: </th>
                                            <th>Date Raised</th>
											
											<th>Subtotal </th>
											<th>Shipping/Freight</th>
											<th>VAT</th>
                                            <th >Total Inc VAT</th>
                                            <th >status</th>
                                           
                                            <th>  </th>
											<th> Paid </th>
											<th> Balance </th>
                                        </tr>
                                    </thead>
                                    <tbody>';

foreach ($query->result() as $row) {
                                                              /*  $payment=$this->db->where('invoice_id', $row->invoice_id)
                                                                                  ->get('payments'); 
																$paid=0;	
																$paid+=$paid;		  
																 foreach ($payment->result() as $paid_amount) {	
																
																 $paid=$paid_amount->amount;
																 }
			if	($paid===0){*/
            if	(($row->status==='invoiced')or($row->status==='unpaid')){					
             echo '<tr class="gradeX">';
						
			
			echo '<td>'. $row->salesorder_id .'</td>';
			echo '<td>'. $row->po_number .'</td>';
	        echo '<td>'. $row->dateraised.'</td>';
			
			echo '<td>'. $row->Subtotal_total .'</td>';
			echo '<td>'. $row->shipping_cost .'</td>';
		    echo '<td>'. $row->VAT_ammount .'</td>';
	        echo '<td>'. $row->inc_vat .'</td>';
			 echo '<td>'. $row->status .'</td>';
			echo '<td></td>';
			
		    
																 //$amount+=$amount;
			
	        echo '<td>0</td>';
			$balance=$row->inc_vat;
		    echo '<td>'.$balance .'</td>';													  
			
																
			 echo '</tr>';
			}

}
echo'</tbody></table>';



echo'</div>
										  </div>
										 
										  
										 
									   </div>
								   </div>';




								   

        
    }
   
	function pay_full(){
       $company_id =$this->input->post('company_id');
	   $from =$this->input->post('from');
	   $to =$this->input->post('to');
	   $method =$this->input->post('method');
	      
	    
	   $this->db->select('*')
	            ->from('invoices');
       $this->db->where('Company_id',$company_id);
       $this->db->where('dateraised >=',$from );
	   $this->db->where('dateraised <=',$to  );

		 $invoices = $this->db->get();	 
			 
         foreach ($invoices->result() as $in) {
                   
		            $payment=$this->db->where('invoice_id', $in->invoice_id)
                                      ->get('payments'); 
									  $paid=0;	
									  $paid+=$paid;		  
																 foreach ($payment->result() as $paid_amount) {	
																
																 $paid=$paid_amount->amount;
																 }		   
			if	($paid===0)
			{
		    $data = array(
                 'invoice_id' => $in->invoice_id,
                 'date_paid' => mdate(" %Y-%m-%d",  time()),
                 'amount'=>$in->inc_vat,
                 'method'=>$method,
                 );
		    $this->db->insert('payments',$data);
    
		    $info= array(
               'status' =>'paid',
             ); 
   
             
            $this->db->select('*')
                ->where('invoice_id',$in->invoice_id)
                ->update('invoices',$info);
            

           
			}
		 
		 
		 }	
       //$this->load->view('invoices',$data);	
	   $redirect = '' . base_url() . 'invoices/invoices_paid';
       redirect($redirect);
    }

    function payments(){
       
	   $id =$this->input->post('salesorder_id');
       $data = array(
        'salesorder_id' => $this->input->post('salesorder_id'),
		'invoice_id' => $this->input->post('invoiceid'),
        'date_paid' => $this->input->post('date'),
        'amount'=>$this->input->post('amount'),
		'currency'=>$this->input->post('currency'),
        'method'=>$this->input->post('method'),
    );
    
  
    $this->db->insert('payments',$data);

   
  //changes 
   $info= array(
        'status' =>$this->input->post('payment')
    ); 
   
   $invoice = $this->input->post('invoiceid');
   $this->db->select('*')
                ->where('invoice_id',$invoice)
                ->update('invoices',$info);
   

    // $this->session->set_flashdata('done', 'invoice '.$invoice.' has been updated');
     $redirect = '' . base_url() . 'invoices/view/'.$id.'';
    redirect($redirect);
     
    }


    function payments_made($payment_id){
    
       $q =  $this->db->select('*')
                      ->where('invoice_id',$payment_id)
                      ->get('payments');
    
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
                                                        <div class="text-center"><i class="fa fa-gbp"></i>'.$value->amount.'</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right hidden-xs"> <strong>'.$value->date_paid.'</strong></div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"></div>
                                                    </td>
                                                </tr> ';                                              
                                       
            
        }
        echo'     </tbody>
                                        </table>';
										
										
										
										
										
}


    //<------generate PDF invoices------>
   function pdf($id){//generate pdf and force to download  


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
	  $html =  $this->load->view('pdf/pdf_invoice_view_', $data, TRUE);
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

    
	
    function pdf_report(){
       
	    echo Modules::run('template/dash_head'); 
        $id = $this->uri->segment(3);
        $this->load->model('mdl_invoices');
        $data['invoice_info'] = $this->mdl_invoices->get_invoice_info($id);
  
        $datestring = "%Y-%m-%d-%h-%i-%a";
$time = time();

$dateraised =  mdate($datestring, $time);  

$invoice_name = 'invoice-'.$id.'date-'.$dateraised;
//$invoice_name = 'invoice-'.$invoice_id.'_so-'.$saleorder_id.'.-date-'.$dateraised;
$filename = $invoice_name;
// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
$pdfFilePath = FCPATH."/uploads/reports/$filename.pdf";

if (file_exists($pdfFilePath) == FALSE)
{
    ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 

    $html = $this->load->view('pdf_report', $data, true); // render the view into HTML
    $this->load->library('pdf');
    $pdf = $this->pdf->load(); 
    $pdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
 
    //$pdf->SetDisplayMode('fullpage');
 
    $pdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list

    $pdf->SetFooter('|{PAGENO}|'); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
    $pdf->WriteHTML($html); // write the HTML into the PDF
    $pdf->Output($pdfFilePath, 'F'); // save to file because we can
}

$data1= array(
  'invoice_pdf'=>''.$filename.'.pdf', 
);

$this->db->where('invoice_id',$id)->update('invoices',$data1);
 
redirect("/uploads/reports/$filename.pdf"); 

 }
 
   
    
   
    function so_pdf($id){ //Direct packing slip w/o logo
    	 	
	    $this->load->model('mdl_sales_orders');
  		$data ['orders'] =$this->db->select('*')
                  ->where('salesorder_id',$id)
                  ->get('sales_orders');
		
	
$data ['order_items']=$this->db->select('*')
                      ->where('sales_id',$id)
 //->where('backorderitem','YES')
 ->join('sales_orders', 'sales_orders.salesorder_id = sales_orders_items.sales_id')
 ->join('warehouse', 'warehouse.id = sales_orders_items.wh_item_id')
->get('sales_orders_items');	
		 
		
       // $data ['order_items'] = $this->mdl_sales_orders->order_items($id);
        
        //$data['total'] = $this->mdl_sales_orders->total($id);
	
        
    //20141209 viola    
		//$html =  $this->load->view('pdf_sales_view_ce', $data, TRUE);
    	$html =  $this->load->view('pdf/ce_pdf_sales_view', $data, TRUE);
		
		 
		 
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
//$mpdf->AutoPrint(true);
$mpdf->SetJS('this.print();');

		$mpdf->WriteHTML($html);
	
		//$mpdf->Output($name, 'D'); 
$mpdf->Output(); 
		//exit;

             
   }


	
   

	}

