<?php
class Reports extends MX_Controller 
{

function __construct() {
parent::__construct();


        $this->load->module('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }


function get_bk_product(){
    $q = intval($_GET['q']);

                
    $this->load->model('mdl_reports');

    $query = $this->mdl_reports->get_vendoritem($q);					  
                               
 
                                echo '</BR><select name="CCL_Item"  class="col-md-8" required="required"">';	
                          if (!empty($query->result())){
							     
								 
								 foreach ($query->result() as $row) {
                               
                                       if(count($row->CCL_Item) > 0)
								   

                                   echo '<option  value="' . $row->CCL_Item . '"   >' . $row->CCL_Item .'</option>  ';
                                  
	 
								 
								
								        }
						
							}else{
							
						          echo '<option >No Back Order Item Found</option>' ;
							}
							echo ' </select>'; 
	
	
	}
   
function index(){
    echo Modules::run('template/dash_head');
    $this->load->view('reports');
}

function salesbetweendates(){
    echo Modules::run('template/dash_head');
    $this->load->view('salesbetweendates');
}

function betweendates(){
       $this->load->dbutil();
       $this->load->helper('download');
    $from = $this->input->post('from');
    $to = $this->input->post('to');
    //$search= $this->input->post('search');
    
    
$this->db->where('dateraised >=', $from);
$this->db->where('dateraised <=', $to);
$query = $this->db->get('invoices');
$data = ltrim(strstr($this->dbutil->csv_from_result($query, ',', "\r\n"), "\r\n"));

force_download('invoice_report.csv', $data);


}

function sale_by_date(){
       $this->load->dbutil();
       $this->load->helper('download');
       $from = $this->input->post('from');
       $to = $this->input->post('to');
    //$search= $this->input->post('search');
    
    
        $this->db->where('dateraised >=', $from);
        $this->db->where('dateraised <=', $to);



        //$rows = mysql_query('SELECT salesorder_id,Company_name,po_number,status,dateraised,dateraised,Subtotal_total,shipping_cost,VAT_ammount,inc_vat FROM invoices');
        $sales = $this->db->select('salesorder_id,Company_name,po_number,status,dateraised ,due_date, Subtotal_total ,shipping_cost,VAT_ammount,inc_vat' )
                         ->where('dateraised >=', $from)
						 ->where('dateraised <=', $to)
						 ->where('status', 'shipped')
						 ->where('status', 'invoiced')
						 ->left_join('invoices', ' invoices.salesorder_id= sales_orders.salesorder_id')
						
						 ->get('sales_orders');
        $delimiter = ",";
        $newline = "\r\n";


        $q=$this->db->select('SUM(inc_vat) as total_amount')->where('Company_id', $company_id)->get('invoices')  ;                              
        $row=$q->row();
        $total_ammount=$row->total_amount;
        $total=',,,, , ,,,Amount,'.$total_ammount;

        $data = ltrim(strstr($this->dbutil->csv_from_result($rows, ',', "\r\n"), "\r\n"));
        $data=$company_name."\r\n".$period."\r\n".$head."\r\n".$data."\r\n".$total;
        force_download($company_name.'_sales_details'.$from.'~'.$to.'.csv', $data);

		
		/*$data = ltrim(strstr($this->dbutil->csv_from_result($query, ',', "\r\n"), "\r\n"));

force_download('invoice_report.csv', $data);*/


}

function invoice_rpt(){
    echo Modules::run('template/dash_head');
    $this->load->view('invoice_rpt');
}
function inv_rpt(){

       $this->load->dbutil();
      $this->load->helper('download');
       $from = $this->input->post('from');
       $to = $this->input->post('to');
       $return_total=0;
       $refund_total=0;
	   $from = substr($from,6,4).'-'.substr($from,0,2).'-'.substr($from,3,2);
       $to = substr($to,6,4).'-'.substr($to,0,2).'-'.substr($to,3,2);

	// output the column headings
	    $period='For the Period:'.$from.'to'.$to."\r\n";
        $head='Order Number,Customer,PO Number,Order Status,Invoice Sales Total,Shipping,VAT,Total(GBP),Total(EUR),Currency,Payment Terms,Invoice Date,Invoice Status,Payment Method,Payment date  ';
   

	    $filename=	'Invoice_Report_'.$from.'-'.$to.'.csv';
		  
		 //2.1
		$line3='Order Number,Buyer,Receiver,PO Number,Order Status,Invoice Sales Total,Shipping,VAT,Total(GBP),Total(EUR),currency,Payment Terms,Invoice Date,Invoice Status,Payment Method,Payment date';
	    $data=$period."\r\n".$line3."\r\n";
		 
		 //2.2
		 $GBP=0;
		 $EUR=0;
		 $result =mysql_query('SELECT i.salesorder_id,i.Company_name,s.ShipToCompanyName,i.po_number,s.status as so_status,i.Subtotal_total ,i.shipping_cost,i.VAT_ammount,
		                              CASE WHEN i.currency= "GBP" THEN i.inc_vat ELSE null END AS Total_GBP ,
									  CASE WHEN i.currency= "EUR" THEN i.inc_vat ELSE null END AS Total_EUR,i.currency,b.terms,i.dateraised ,i.status as inv_status, p.method,p.date_paid 
 FROM invoices AS i 
 JOIN businesses AS b  ON b.Company_id = i.Company_id 
 LEFT JOIN sales_orders AS s  ON s.salesorder_id = i.salesorder_id 
 LEFT JOIN payments AS p  ON p.salesorder_id = i.salesorder_id 
 WHERE i.dateraised>= "'.$from.' "and i.dateraised<= "'.$to.'" 	
 ORDER BY `salesorder_id` ');
          
		//WHERE i.dateraised>= "'.$from.' "and i.dateraised<= "'.$to.'" 	
			while ($row = mysql_fetch_assoc($result)) {
           
                 $line4=$row["salesorder_id"] .','.$row["Company_name"].','.$row["ShipToCompanyName"].','.$row["po_number"].','.$row["so_status"].','.$row["Subtotal_total"].','.$row["shipping_cost"].','.$row["VAT_ammount"].','.$row["Total_GBP"].','.$row["Total_EUR"].','.$row["currency"].','.$row["terms"].','.$row["dateraised"].','.$row["inv_status"].','.$row["method"].','.$row["date_paid"]."\r\n";

						   $data=$data."\r\n".$line4;//fputcsv($fp, $row); 
						   $GBP+=$row["Total_GBP"];
						   $EUR+=$row["Total_EUR"];
						   
			}
			//2.3
		
			//fputcsv($fp, array('','','','','','Invoice Amount GBP','',$GBP,'','','','','')); 
		   // fputcsv($fp, array('','','','','','Invoice Amount EUR','',$EUR,'','','','','')); 
			$line5=', ,,,,Invoice Amount GBP,,.'.$GBP.',,,,,	';				
				
			
         
			//fputcsv($fp, array(' ','',' ','','','','','','','','','','  '));
			$line6=' ,, ,,,,,,,,,, ';
			//3.1	
	       //fputcsv($fp, array('The Orders include Return Item','',' ','','','','','','','','','',' '));
	       
		   
		   //3.2
		    //fputcsv($fp, array('Order Number','Customer','PO Number','Invoice Date','Return value','Credit Note Date','Credit Note Amount'));
		    $line7='The Orders include Return Item,, ,,,,,,,,,, ';
            $line7= $line7."\r\n".'Order Number,Customer,PO Number,Invoice Date,Return value,Credit Note Date,Credit Note Amount';
 			$result_return =mysql_query('SELECT t.sales_id,i.Company_name,i.po_number,i.dateraised,r.rf_total,r.rf_dateraised,t.return_amount
			
            From refund AS r
                        JOIN (select* , CASE WHEN SUM(itemlinetotal) IS NULL THEN 0 ELSE SUM(itemlinetotal) END AS return_amount 
						        from sales_orders_items group by sales_id )AS t  ON t.sales_id = r.so_id  

                       JOIN (SELECT po_number,Company_name,salesorder_id,dateraised FROM invoices )
                                AS i  ON i.salesorder_id = r.so_id 												   
                                WHERE  r.rf_dateraised>= "'.$from.' "and r.rf_dateraised<= "'.$to.'"
                                                                    
                                                               ');
            $data=$data."\r\n".$line5."\r\n".$line6."\r\n".$line7."\r\n";
			//$data=$data.''.$line4;//
			while ($row_r = mysql_fetch_assoc($result_return)) {
           
                 $line8=$row_r["sales_id"] .','.$row_r["Company_name"].','.$row_r["po_number"].','.$row_r["dateraised"].','.$row_r["return_amount"].','.$row_r["rf_dateraised"].','.$row_r["rf_total"]."\r\n";

								//fputcsv($fp, $row_r); 
				$data=$data.'line8'.$line8;//="line8test";
				$return_total+=$row_r["return_amount"];
				$refund_total+=$row_r["rf_total"];
				 				
						        
			}	
                 //fputcsv($fp, array('','','','','','','Return Item Total Value',$return_total,'','','','','')); 
				 //fputcsv($fp, array('','','','','','','Credit Note Total Cost',$refund_total,'','','','','')); 
							
            $line9=',,,,,,Return Item Total Value,'.$return_total.',,,,,'; 
			$line10=',,,,,,Credit Note Total Cost,'.$refund_total.',,,,,';
            $data=$data."\r\n".$line9."\r\n".$line10."\r\n";
    //fclose($fp);
           //$data=$period."\r\n".$head."\r\n".$line3."\r\n".$line4."\r\n".$line5."\r\n".$line6."\r\n".$line7."\r\n".$line8."\r\n".$line9."\r\n".$line10;
  
    //$data=$period.''.$head.''.$line3.''.$line4+$line5+$line6+$line7+$line8+$line9+$line10;
    header('Content-Type: text/csv');
    header( "Content-disposition: filename=".$filename);
	// force_download('inventory_summary.csv', $data);
     echo $data;
}
function inv_rpt_nowork(){

       $this->load->dbutil();
      $this->load->helper('download');
       $from = $this->input->post('from');
       $to = $this->input->post('to');
       $return_total=0;
       $refund_total=0;
	
	// output the column headings
	   $period='For the Period:'.$from.'to'.$to;
    //$head='Order Number,Customer,PO Number,Status,Invoice Date, Due Day,Sale Total,Shipping,VAT,Toatal';
	   $head='Order Number,Customer,PO Number,Order Status,Invoice Sales Total,Shipping,VAT,Total(GBP),Total(EUR),Currency,Payment Terms,Invoice Date,Invoice Status,Payment Method,Payment date  ';
   

	     $filename=	'Invoice_Report_'.$from.'-'.$to.'.csv';
		 $fp = fopen($filename, 'w');
		 
		 //2.1
		 fputcsv($fp, array('Order Number','Buyer','Receiver','PO Number','Order Status','Invoice Sales Total','Shipping','VAT','Total(GBP)','Total(EUR)','currency','Payment Terms','Invoice Date','Invoice Status','Payment Method','Payment date '));
		
		 
		 //2.2
		 $GBP=0;
		$EUR=0;
		 $result =mysql_query('SELECT i.salesorder_id,i.Company_name,s.ShipToCompanyName,i.po_number,s.status as so_status,i.Subtotal_total ,i.shipping_cost,i.VAT_ammount,
		                              CASE WHEN i.currency= "GBP" THEN i.inc_vat ELSE null END AS Total_GBP ,
									  CASE WHEN i.currency= "EUR" THEN i.inc_vat ELSE null END AS Total_EUR,i.currency,b.terms,i.dateraised ,i.status as inv_status, p.method,p.date_paid 
 FROM invoices AS i 
 JOIN businesses AS b  ON b.Company_id = i.Company_id 
 LEFT JOIN sales_orders AS s  ON s.salesorder_id = i.salesorder_id 
 LEFT JOIN payments AS p  ON p.salesorder_id = i.salesorder_id 
 WHERE i.dateraised>= "'.$from.' "and i.dateraised<= "'.$to.'" 
 ORDER BY `salesorder_id` ');
 
			while ($row = mysql_fetch_assoc($result)) {
           
                 $print=$row["salesorder_id"] .','.$row["Company_name"].','.$row["ShipToCompanyName"].','.$row["po_number"].','.$row["so_status"].','.$row["Subtotal_total"].',,'.$row["shipping_cost"].','.$row["VAT_ammount"].','.$row["VAT_ammount"].','.$row["Total_GBP"].','.$row["Total_EUR"].','.$row["currency"].','.$row["terms"].','.$row["dateraised"].',,'.$row["inv_status"].','.$row["method"].','.$row["date_paid"]."\r\n";

								fputcsv($fp, $row); 
						   $GBP+=$row["Total_GBP"];
						   $EUR+=$row["Total_EUR"];
			}
			//2.3
			
			fputcsv($fp, array('','','','','','Invoice Amount GBP','',$GBP,'','','','','')); 
		    fputcsv($fp, array('','','','','','Invoice Amount EUR','',$EUR,'','','','','')); 
							
				
			/*
			
			$result_amount =mysql_query('SELECT CASE WHEN i.currency= "GBP" THEN SUM(i.inc_vat)  ELSE null END AS amount_GBP,
			                                    CASE WHEN i.currency= "EUR" THEN SUM(i.inc_vat) ELSE null  END AS amount_EUR

 
 FROM invoices AS i 
 JOIN (SELECT salesorder_id FROM invoices 
 
       WHERE status>= "invoiced" ) AS s  ON s.salesorder_id = i.salesorder_id 
WHERE dateraised>= "'.$from.' "and dateraised<= "'.$to.'" 
 ORDER BY `dateraised` ');
			
			while ($row_a = mysql_fetch_assoc($result_amount)) {
   			   
			   fputcsv($fp, array('','','','','Invoice Amount GBP',''.$row_a["amount_GBP"].'',''.$row_a["amount_EUR"].'',',','','','')); 
			   fputcsv($fp, array('','','','','Invoice Amount EUR',''.$row_a["amount_GBP"].'',''.$row_a["amount_EUR"].'',',','','','')); 
					        
			}
         */
			fputcsv($fp, array(' ','',' ','','','','','','','','','','  '));
			//3.1	
	       fputcsv($fp, array('The Orders include Return Item','',' ','','','','','','','','','',' '));
	       
		   
		   //3.2
		   fputcsv($fp, array('Order Number','Customer','PO Number','Invoice Date','Return value','Credit Note Date','Credit Note Amount'));
		

 			$result_return =mysql_query('SELECT t.sales_id,i.Company_name,i.po_number,i.dateraised,r.rf_total,r.rf_dateraised,t.return_amount
			
            From refund AS r
                        JOIN (select* , CASE WHEN SUM(itemlinetotal) IS NULL THEN 0 ELSE SUM(itemlinetotal) END AS return_amount 
						        from sales_orders_items group by sales_id )AS t  ON t.sales_id = r.so_id  

                       JOIN (SELECT po_number,Company_name,salesorder_id,dateraised FROM invoices )
                                AS i  ON i.salesorder_id = r.so_id 												   
                                WHERE  r.rf_dateraised>= "'.$from.' "and r.rf_dateraised<= "'.$to.'"
                                                                    
                                                                   ');
			while ($row_r = mysql_fetch_assoc($result_return)) {
           
                 $print=$row_r["sales_id"] .','.$row_r["Company_name"].','.$row_r["po_number"].','.$row_r["dateraised"].','.$row_r["return_amount"].','.$row_r["rf_dateraised"].','.$row_r["rf_total"]."\r\n";

								fputcsv($fp, $row_r); 
				
				$return_total+=$row_r["return_amount"];
				$refund_total+=$row_r["rf_total"];
				 				
						        
			}	
                 fputcsv($fp, array('','','','','','','Return Item Total Value',$return_total,'','','','','')); 
				 fputcsv($fp, array('','','','','','','Credit Note Total Cost',$refund_total,'','','','','')); 
							
				
			
/*
   $result_return_amount =mysql_query('SELECT CASE WHEN SUM(t.itemlinetotal) IS NULL THEN 0 ELSE SUM(t.itemlinetotal) END AS return_amount 
   CASE WHEN SUM(r.rf_total) IS NULL THEN 0 ELSE SUM(r.rf_total) END AS refund_sum
FROM sales_orders_items AS t 
 JOIN sales_orders AS s  ON s.salesorder_id = t.sales_id  
 JOIN (SELECT salesorder_id,dateraised FROM invoices 
						                                  ) 
														   AS i  ON i.salesorder_id = t.sales_id  
LEFT JOIN (SELECT * From refund WHERE rf_dateraised>= "'.$from.' "and rf_dateraised<= "'.$to.'" )
                                                           AS r ON r.so_id = t.sales_id 															   
 WHERE  t.so_item_note= "return" or t.so_item_note= "cancel"  group by  t.sales_id  ');
			
			while ($row_ra = mysql_fetch_assoc($result_return_amount)) {
   			   
			   fputcsv($fp, array('','','','','','','Return Item Total Value',$row_ra["return_amount"],'','','','','')); 
				 fputcsv($fp, array('','','','','','','Credit Note Total Cost',$row_ra["refund_sum"],'','','','','')); 
					        
			}
           */
    fclose($fp);


    header('Content-Type: text/csv');
    header( "Content-disposition: filename=".$filename);
    readfile($filename);
}



function inv_rpt_oldversion(){

       $this->load->dbutil();
       $this->load->helper('download');
       $from = $this->input->post('from');
       $to = $this->input->post('to');

	
	// output the column headings
	   $period='For the Period:'.$from.'to'.$to;
    //$head='Order Number,Customer,PO Number,Status,Invoice Date, Due Day,Sale Total,Shipping,VAT,Toatal';
	   $head='Order Number,Customer,PO Number,Order Status,Invoice Sales Total,Shipping,VAT,Total(GBP),Total(EUR),Currency,Payment Terms,Invoice Date,Invoice Status,Payment Method,Payment date  ';
   

	     $filename=	'Invoice_Report_'.$from.'-'.$to.'.csv';
		 $fp = fopen($filename, 'w');
		 
		 //2.1
		 fputcsv($fp, array('Order Number','Buyer','Receiver','PO Number','Order Status','Invoice Sales Total','Shipping','VAT','Total(GBP)','Total(EUR)','currency','Payment Terms','Invoice Date','Invoice Status','Payment Method','Payment date '));
		
		 
		 //2.2
		 $result =mysql_query('SELECT i.salesorder_id,i.Company_name,s.ShipToCompanyName,i.po_number,s.status as so_status,i.Subtotal_total ,i.shipping_cost,i.VAT_ammount,CASE WHEN i.currency= "GBP" THEN i.inc_vat ELSE null END AS Total_GBP ,CASE WHEN i.currency= "EUR" THEN i.inc_vat ELSE null END AS Total_EUR,i.currency,b.terms,i.dateraised ,i.status as inv_status, p.method,p.date_paid 
 FROM invoices AS i 
 JOIN businesses AS b  ON b.Company_id = i.Company_id 
 LEFT JOIN sales_orders AS s  ON s.salesorder_id = i.salesorder_id 
 LEFT JOIN payments AS p  ON p.salesorder_id = i.salesorder_id 
 WHERE i.dateraised>= "'.$from.' "and i.dateraised<= "'.$to.'" 
 ORDER BY `salesorder_id` ');
 
			while ($row = mysql_fetch_assoc($result)) {
           
                 $print=$row["salesorder_id"] .','.$row["Company_name"].','.$row["ShipToCompanyName"].','.$row["po_number"].','.$row["so_status"].','.$row["Subtotal_total"].',,'.$row["shipping_cost"].','.$row["VAT_ammount"].','.$row["VAT_ammount"].','.$row["Total_GBP"].','.$row["Total_EUR"].','.$row["currency"].','.$row["terms"].','.$row["dateraised"].',,'.$row["inv_status"].','.$row["method"].','.$row["date_paid"]."\r\n";

								fputcsv($fp, $row); 
						        
			}
			//2.3
			$result_amount =mysql_query('SELECT CASE WHEN i.currency= "GBP" THEN SUM(i.inc_vat) IS NULL  END AS amount_GBP,CASE WHEN i.currency= "EUR" THEN SUM(i.inc_vat) IS NULL  END AS amount_EUR

 
 FROM invoices AS i 
 JOIN (SELECT salesorder_id FROM invoices 
 
       WHERE status>= "invoiced" ) AS s  ON s.salesorder_id = i.salesorder_id 
WHERE dateraised>= "'.$from.' "and dateraised<= "'.$to.'" 
 ORDER BY `dateraised` ');
			
			while ($row_a = mysql_fetch_assoc($result_amount)) {
   			   
			   fputcsv($fp, array('','','','','Invoice Amount','','',$row_a["amount_GBP"],',$row_a["amount_GBP"],','','','','')); 
						        
			}
         
			fputcsv($fp, array(' ','',' ','','','','','','','','','',' '));
			//3.1	
	       fputcsv($fp, array('<strong>The Orders include Return Item</strong>','',' ','','','','','','','','','',' '));
	       
		   
		   //3.2
		   fputcsv($fp, array('Order Number','Customer','PO Number','Invoice Date','Return value','Credit Note Amount','Credit Note Date'));
		

 			$result_return =mysql_query('SELECT t.sales_id,s.Company_name,s.po_number,i.dateraised,
            CASE WHEN SUM(t.itemlinetotal) IS NULL THEN 0 ELSE SUM(t.itemlinetotal) END AS return_sum,r.rf_total,r.rf_dateraised	
 
 FROM sales_orders_items AS t 
 
 JOIN sales_orders AS s  ON s.salesorder_id = t.sales_id  
 JOIN (SELECT salesorder_id,dateraised FROM invoices 
WHERE dateraised>= "'.$from.' "and dateraised<=  "'.$to.'" 
        
						                                  ) 
														   AS i  ON i.salesorder_id = t.sales_id  
LEFT JOIN refund AS r  ON r.so_id = t.sales_id 														   
 WHERE  t.so_item_note= "return" or t.so_item_note= "cancel" 
 group by  t.sales_id 
 ORDER BY `Company_id`
 
 ');
			while ($row_r = mysql_fetch_assoc($result_return)) {
           
                 $print=$row_r["sales_id"] .','.$row_r["Company_name"].','.$row_r["po_number"].','.$row_r["dateraised"].','.$row_r["return_sum"].','.$row_r["rf_total"]."\r\n";

								fputcsv($fp, $row_r); 
						        
			}				

   $result_return_amount =mysql_query('SELECT CASE WHEN SUM(t.itemlinetotal) IS NULL THEN 0 ELSE SUM(t.itemlinetotal) END AS return_amount 
FROM sales_orders_items AS t 
 
 JOIN sales_orders AS s  ON s.salesorder_id = t.sales_id  
 JOIN (SELECT salesorder_id,dateraised FROM invoices 
WHERE dateraised>= "'.$from.' "and dateraised<=  "'.$to.'" 
        
						                                  ) 
														   AS i  ON i.salesorder_id = t.sales_id  
 WHERE  t.so_item_note= "return" or t.so_item_note= "cancel"  ');
			
			while ($row_ra = mysql_fetch_assoc($result_return_amount)) {
   			   
			   fputcsv($fp, array('','','','','','','Return Total Item value',$row_ra["return_amount"],'','','','','')); 
						        
			}
            while ($row_ra = mysql_fetch_assoc($result_return_amount)) {
   			   
			   fputcsv($fp, array('','','','','','','Return Total Cost',$row_ra["return_amount"],'','','','','')); 
						        
			}
    fclose($fp);


    header('Content-Type: text/csv');
    header( "Content-disposition: filename=".$filename);
    readfile($filename);
}




function comp_salesbetweendates(){
    echo Modules::run('template/dash_head');
    $this->load->view('comp_salesbetweendates');
}
function comp_betweendates(){

       $this->load->dbutil();
       $this->load->helper('download');
       $from = $this->input->post('from');
       $to = $this->input->post('to');
	   $company_id= $this->input->post('company_id');
	
	     $filename=	'sales_details_'.$from.'-'.$to.'.csv';
		 $fp = fopen($filename, 'w');
		   $from = substr($from,6,4).'-'.substr($from,0,2).'-'.substr($from,3,2);
       $to = substr($to,6,4).'-'.substr($to,0,2).'-'.substr($to,3,2);

	
	// fputcsv($fp, array('Order Number','inv_so','Buyer','Receiver','PO Number','Order Status','Invoice Sales Total','Shipping','VAT','Total','invTotal','Payment Terms','SO Date','Invoice Date','Invoice Status','Payment Method','Payment date '));
		
	
	 fputcsv($fp, array('Order Number','Buyer','Receiver','PO Number','Order Status','Invoice Sales Total','Shipping','VAT','Total','invTotal','Payment Terms','SO Date','Invoice Date','Invoice Status','Payment Method','Payment date '));
	
	
	
	
	if ($company_id==='all'){
		
		      
		
		
		 //$result =mysql_query('SELECT s.salesorder_id,i.salesorder_id as inv_so ,s.Company_name,s.ShipToCompanyName,s.po_number,s.status as so_status,s.Subtotal_total ,s.shipping_cost,s.VAT_ammount,s.inc_vat,i.inc_vat as inv_inc_vat,b.terms,s.dateraised ,i.dateraised as inv_date ,i.status as inv_status, p.method,p.date_paid 
            $result =mysql_query('SELECT s.salesorder_id,s.Company_name,s.ShipToCompanyName,s.po_number,s.status as so_status,s.Subtotal_total ,s.shipping_cost,s.VAT_ammount,s.inc_vat,i.inc_vat as inv_inc_vat,b.terms,s.dateraised ,i.dateraised as inv_date ,i.status as inv_status, p.method,p.date_paid 

 
             FROM sales_orders AS s 
 JOIN businesses AS b  ON b.Company_id = s.Company_id 
 LEFT JOIN invoices AS i  ON i.salesorder_id =  s.salesorder_id
 LEFT JOIN payments AS p  ON p.salesorder_id = s.salesorder_id 
 WHERE s.dateraised>= "'.$from.' "and s.dateraised<= "'.$to.'" 
and s.status != "pending" and s.status != "shipped" 
 
');
 
			while ($row = mysql_fetch_assoc($result)) {
           
                 $print=$row["salesorder_id"] .','.$row["Company_name"].','.$row["ShipToCompanyName"].','.$row["po_number"].','.$row["so_status"].','.$row["Subtotal_total"].',,'.$row["shipping_cost"].','.$row["VAT_ammount"].',,'.$row["inv_inc_vat"].',,'.$row["inc_vat"].',,'.$row["terms"].','.$row["dateraised"].','.$row["inv_date"].',,'.$row["inv_status"].','.$row["method"].','.$row["date_paid"]."\r\n";

								fputcsv($fp, $row); 
						        
			}
		
		
		
		
		
	/*	
		foreach($company->result() as $comp){
            
       
        $company_name= $comp->Company_name;
		$rows = $this->db->select('salesorder_id,Company_name,po_number,status,dateraised , Subtotal_total ,shipping_cost,VAT_ammount,inc_vat' )
                ->where('dateraised >=', $from)->where('dateraised <=', $to)->where('Company_id', $company_id)->get('invoices');
        $delimiter = ",";
        $newline = "\r\n";


        $q=$this->db->select('SUM(inc_vat) as total_amount')->where('dateraised >=', $from)->where('dateraised <=', $to)->where('Company_id', $company_id)->get('invoices')  ;                              
       $row=$q->row();
        $total_ammount=$row->total_amount;
        $total=',,,, , ,,,Amount,'.$total_ammount;

        $data = ltrim(strstr($this->dbutil->csv_from_result($rows, ',', "\r\n"), "\r\n"));
        $data=$company_name."\r\n".$period."\r\n".$head."\r\n".$data."\r\n".$total;
		
		
		
		
		
		
		 }
		 force_download('sales_details'.$from.'~'.$to.'.csv', $data);*/
     }
    else
    {
        
		
		 $result =mysql_query('SELECT s.salesorder_id,s.Company_name,s.ShipToCompanyName,s.po_number,s.status as so_status,s.Subtotal_total ,s.shipping_cost,s.VAT_ammount,s.inc_vat,i.inc_vat as inv_inc_vat,b.terms,s.dateraised ,i.dateraised as inv_date ,i.status as inv_status, p.method,p.date_paid 

 
             FROM sales_orders AS s 
 JOIN businesses AS b  ON b.Company_id = s.Company_id 
 LEFT JOIN invoices AS i  ON i.salesorder_id =  s.salesorder_id
 LEFT JOIN payments AS p  ON p.salesorder_id = s.salesorder_id 
 WHERE s.dateraised>= "'.$from.' "and s.dateraised<= "'.$to.'" 
 and s.Company_id= "'.$company_id.'" 
and s.status != "pending" and s.status != "shipped" 
 
');
           
			if (mysql_num_rows($result) == 0 ) {
                  
				  
				  echo "<h2><em>No results were found from ".$from."to".$to."</em></h2>";
				  exit;
            } 
			else {
			
			    while ($row = mysql_fetch_assoc($result)) {
           
                    $print=$row["salesorder_id"] .','.$row["Company_name"].','.$row["ShipToCompanyName"].','.$row["po_number"].','.$row["so_status"].','.$row["Subtotal_total"].',,'.$row["shipping_cost"].','.$row["VAT_ammount"].',,'.$row["inv_inc_vat"].',,'.$row["inc_vat"].',,'.$row["terms"].','.$row["dateraised"].','.$row["inv_date"].',,'.$row["inv_status"].','.$row["method"].','.$row["date_paid"]."\r\n";

								fputcsv($fp, $row); 
						        
			        }
			
            }

		
		
		
	}
	
	
	fclose($fp);


    header('Content-Type: text/csv');
    header( "Content-disposition: filename=".$filename);
    readfile($filename);
}


function bk_order_rpt(){
    echo Modules::run('template/dash_head');
    
	
//	$data ['vendor'] = $this->db->select('*')->group_by('vendors_name')->get('warehouse');
    $data ['vendor'] =$this->db->select('*') 
                              ->join('vendors', ' vendors.vendor_name= warehouse.vendors_name')
			                  ->group_by('vendors_name')		  
			                  ->get('warehouse');                               
								   
								
	 $this->load->view('bk_order_rpt', $data);
	//$this->load->view('bk_order_rpt');
}
function bk_rpt(){

       $this->load->dbutil();
       $this->load->helper('download');
       $vendor = $this->input->post('vendor');
       $CCL_Item = $this->input->post('CCL_Item');
     
			                  
	$this->load->model('mdl_reports');

   
	
	// output the column headings
	 //

	     $filename=	'Back Order Report _'.$CCL_Item.'.csv';
		// $fp = fopen($filename, 'w');
		 
		 //2.1
		// fputcsv($fp, array('Item code','Description','Buyer','Customer name','Order No','Order Date','Order Status','Qty','Customer Ordered (Total)','Shipped Qty Previously    ','Remaining Qty'));
          $head='Item code,Description,Buyer,Receiver,Order No,Order Date,Order Status,Backorder Item?,Qty,Customer Ordered (Total),Shipped Qty Previously ,Remaining Qty';
        echo $head."\r\n";
		 
		 //2.2
		  $result = $this->mdl_reports->get_bkitem($CCL_Item);
		 
	
 
			while ($row = mysql_fetch_assoc($result)) {
				
				 $total = $this->mdl_reports->get_itemtotal($row["sales_orders_rev"],$CCL_Item);
				 $shipped = $this->mdl_reports->get_itemshipped($row["sales_orders_rev"],$CCL_Item);
           
                // $print=$row["CCL_Item"] .','.$row["Description"].','.$row["Company_name"].','.$row["ShipToCompanyName"].','.$row["po_number"].','.$row["so_status"].','.$row["Subtotal_total"].',,'.$row["shipping_cost"].','.$row["VAT_ammount"].',,'.$row["inc_vat"].',,'.$row["terms"].','.$row["dateraised"].',,'.$row["inv_status"].','.$row["method"].','.$row["date_paid"]."\r\n";
                        echo $row["CCL_Item"] .",".$row["Description"].",".$row["Company_name"].",".$row["ShipToCompanyName"].",".$row["sales_orders_rev"] .",".$row["dateraised"].",".$row["so_status"].",".$row["backorderitem"].",".
						$row["item_qty"] .",".$total.",".$shipped.",".($total-$shipped)."\r\n";
						
						
						

								//fputcsv($fp, $print); 
						        
			}
			
			$data="\r\n".$row."\r\n";
			
			
			force_download( $filename, $data);

    
}


function inventory_summary(){

       $this->load->dbutil();
       $this->load->helper('download');
       $this->load->model('mdl_reports');
	
	// output the column headings
	//$period='For the Period:'.$from.'to'.$to;
    $head1='Inventory Summary';
	$head2='CCL_Item,QTY available,QTY order,  , Unit Cost, Total Cost Value, , ';
	 

    {
        
		$CCL_Item=$this->db->group_by('CCL_Item')->get('warehouse');
		//$CCL_Item=$this->db->join('sales_orders_items', 'warehouse.CCL_Item = sales_orders_items.CCL_Item')->get();
		$row='';
        foreach($CCL_Item->result() as $CCL){
            
        
        $c= $CCL->CCL_Item;
		$p= $CCL->buy_price;
		//qty warehouse
		
        $wh_total_qty=$this->mdl_reports->get_stock($c);
       
		//qty salesoder
		$so_q=$this->db->select('SUM(item_qty) as so_total_qty')->where('CCL_Item', $c)->get('sales_orders_items')  ;                              
        $so_row=$so_q->row();
        $so_total_qty=$so_row->so_total_qty;
		if ($so_total_qty<=0){
		$so_total_qty=0;
		}
		if ($p===''){
		$p=0;
		}
		//$row=$row."xx,\r\n".$c."ooo,\r\n";
		$row=$row.",\r\n".$c.','.$wh_total_qty.','.$so_total_qty.',,'.$p.','.$wh_total_qty*$p.",\r\n";
        }

 
        /*$rows = $this->db->select('CCL_Item,Company_name,po_number,status,dateraised ,due_date, Subtotal_total ,shipping_cost,VAT_ammount,inc_vat' )
                ->get($inventory);*/

	   $delimiter = ",";
        $newline = "\r\n";

//echo$row;
       
  
       // $data = ltrim(strstr($this->dbutil->csv_from_result($rows, ',', "\r\n"), "\r\n"));
         $data=$head1."\r\n\r\n".$head2."\r\n".$row."\r\n";
         force_download('inventory_summary.csv', $data);
	}
}



function stock_rpt(){

       $this->load->dbutil();
       $this->load->helper('download');
       $this->load->model('mdl_reports');
	
	// output the column headings
	//$period='For the Period:'.$from.'to'.$to;
    $filename=	'Stock Report .csv';
	//$head='CCL_Item,Category,Description,GBP_Px , DDU_Px, EUR_Px, Qty, Location,Total Qty ,New qty,Location,New Total Qty,Difference%,QTY_CTN,sell_price,buy_price ,duty,freight,L,W,H,Product_Weight,GW_CTN,DIA,	Material,Vendor_code,Vendors_name,CTN_W,CTN_L,CTN_H ';
        	
		$head='CCL_Item,Category,Description,GBP_Px , DDU_Px, EUR_Px, Qty, Location,QTY_CTN,sell_price,buy_price ,duty,freight,L,W,H,Product_Weight,GW_CTN,DIA,	Material,Vendor_code,Vendors_name,CTN_W,CTN_L,CTN_H ';
     	
			
		
	// echo $head."\r\n"; 
        //$CCL_Item=$this->db->group_by('CCL_Item')->get('warehouse');
		
       
			$result=$this->mdl_reports->wh_table(); 
    while ($row = mysql_fetch_assoc($result)) {
				
				  /*
                       echo $row["CCL_Item"] .",".$row["Category"].",".$row["Description"].",".$row["GBP_Px"] .",".$row["DDU_Px"].",".$row["EUR_Px"].
						 ",".$row["qty"].",".$row["location"].",".$row["wh_total_qty"].",,,,,"
						 .$row["QTY_CTN"] .",".$row["sell_price"].",".$row["buy_price"].",".$row["duty"].",".
						$row["freight"] .",".$row["L"] .",".$row["W"].",".$row["H"].",".$row["Product_Weight"].",".$row["GW_CTN"].",".$row["DIA"].",".
						$row["Material"].",".$row["vendor_code"].",".$row["vendors_name"].",".$row["CTN_W"].",".$row["CTN_L"].",".$row["CTN_H"]."\r\n";
					*/

            /*   echo $row["Category"];
	          
               echo $row["Description"];
			 
			   echo $row["GBP_Px"];
	           echo "\r\n";  
				*/	
						//echo $row["Category"];
						

								//fputcsv($fp, $print); 
						        
			
		}	
			$query =$this->db->select('CCL_Item,Category,Description,GBP_Px,DDU_Px,EUR_Px,qty,location,QTY_CTN,sell_price,buy_price,duty,freight,
			                            L,W,H,Product_Weight,GW_CTN,DIA,	Material,Vendor_code,Vendors_name,CTN_W,CTN_L,CTN_H ')
				
				->ORDER_BY('CCL_Item')
				->get('warehouse')  ;
			//	$query = $this->mdl_reports->wh_table();
			//$query = $this->db->get('warehouse');
$data =$head."\r\n".ltrim(strstr($this->dbutil->csv_from_result($query, ',', "\r\n"), "\r\n"));
//$data=$row."\r\n";
			
			
			force_download( $filename, $data);
	
}
function sale_item_summary_dates(){
    echo Modules::run('template/dash_head');
    $this->load->view('sale_item_summary');
}
function sale_item_summary(){

       $this->load->dbutil();
      $this->load->helper('download');
       $from = $this->input->post('from');
       $to = $this->input->post('to');
	  // $company_id= $this->input->post('company_id');
	
	// output the column headings
	$period='For the Period:'.$from.'to'.$to;
    $head1='Products_Sold_Summary_';
	$head2='CCL_Item,QTY order, , ';
	 
         $so_id  = $this->db->where('dateraised >=', $from)
						// ->where('dateraised <=', $to)
						 ->where('status', 'shipped')
						 ->where('status', 'invoiced')
						 ->join('sales_orders_items', ' sales_orders_items.sales_id= sales_orders.salesorder_id')
						 ->from('sales_orders');
			

 $result =mysql_query('SELECT sales_orders.salesorder_id,sales_orders.dateraised,sales_orders_items.CCL_Item, 
 COUNT(*) AS mycount, 
 CASE WHEN SUM(sales_orders_items.item_qty) IS NULL THEN 0 ELSE SUM(sales_orders_items.item_qty) END AS mysum 
 FROM sales_orders LEFT JOIN sales_orders_items ON sales_orders_items.sales_id = sales_orders.salesorder_id 
 WHERE sales_orders.dateraised>= "'.$from.'"and sales_orders.dateraised<= "'.$to.'" 
 GROUP BY CCL_Item 
 ORDER BY `mysum` DESC');


	
	{
        
		$row='';
      

 
       

	   $delimiter = ",";
        $newline = "\r\n";

//echo$row;
  $rows='';       

	 
 echo $head1."\r\n\r\n".$period."\r\n".$head2."\r\n";
while ($row = mysql_fetch_assoc($result)) 
{
	//$row = mysql_fetch_assoc($result);
    echo $row["CCL_Item"];
	echo ",";
    echo $row["mysum"];
	echo "\r\n";
    

	
}
   $head1='SO item Summary';
	$head2='CCL_Item,QTY order, , ';
    $rows=$row["CCL_Item"].",".$row["mysum"]."\r\n";
	 $data="\r\n".$row."\r\n";

      force_download('Products_Sold_Summary_'.$from.'-'.$to.'.csv', $data);

         
	 
	}
}
function est_invt(){
     echo Modules::run('template/dash_head');
	 $data ['vendor'] =$this->db->select('*')->group_by('vendors_name')->get('warehouse');			                                                                                                      
    $this->load->view('est_invt', $data);
}



function est_invt_exe_(){

     $this->load->dbutil();
     $this->load->helper('download');
	   
	   
     $past = $this->input->post('past');
	   //$from = $this->input->post('from');
	    $vendor = $this->input->post('vendor');
	   $today = mdate(" %Y-%m-%d",  time());
       $to = $this->input->post('to');
	 $from= date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));
	 
	   //echo $today = time();
        
	  
    $head1='Estimated Inventory Duration';
	$period='Estimated inventory selling rate by averaging over the past '.$past.' days';
	$head2='Report print:'.mdate(" %Y-%m-%d",  time());
	
	//$head5='CCL_Item,Category,vendor , Start Date, QTY Sold,Qty on Hand,QTY available, Est Duration , Est. Out of Stock Date';
	 $head5='CCL_Item,Category,vendor , Start Date, QTY Sold,,QTY available, Est Duration , Est. Out of Stock Date';
       
			

   /* $result =mysql_query(' SELECT Category ,CCL_Item, vendors_name,
                              CASE WHEN SUM(qty) IS NULL THEN 0 ELSE SUM(qty) END AS avasum 
				        FROM warehouse							  
						WHERE vendors_name = "'.$vendor.'"	
						GROUP BY CCL_Item ORDER BY CCL_Item ASC');
	*/
	    if ($vendor=='all'){
		$this->est_invt_exe_all($past);
			}
			else{
				$war=$this->db->select('id,Category ,CCL_Item, vendors_name,SUM(qty) AS avasum')		  
                       -> group_by('CCL_Item')
					    ->from('warehouse')
						//->ORDER_BY ('id ASC')
                        ->get();
			}			
     //   $war=$this->db->get();

$sold_sum='';
	    $ava_sum=''; 
$query_loop='';
		 $i=1;
        foreach ($war->result()as $w){
			
			$ccl=$w->CCL_Item;
			$category=$w->Category;           				 
	       //$avasum=$this->db->select_sum('qty')-> group_by('CCL_Item')-> WHERE('CCL_Item ',$ccl)->get('warehouse');
			 $avasum=$w->avasum;
		$id=$w->id;
			
			$vendor=$w->vendors_name;
			
		    $soldsum=$this->est_invt_exe2($past,$id,$ccl,$category,$vendor,$from,$avasum);
			
		    if ($soldsum>0){
				                             $soldrate=$soldsum/$past;
	                                         $est=($avasum/$soldrate);
	                                         $est = number_format($est, 2, '.', '');                                   
	                                         $est_day=date('Y-m-d', strtotime('+'.number_format($est,0, '.', '').' day', strtotime($today))) ;
		
			}
			else{                            
	                                         $soldsum=0;
											 $est='';	                                                                        
	                                         $est_day='';
		    }
		//echo '</br>'.$i++.$ccl.'/'.$vendor.'/'.$soldsum;
		 $query = $ccl.",".$category.",".$vendor.",".$from.",".$soldsum.",,".$avasum.",".$est.",".$est_day."\r\n";
	//echo '</br></br>$query'.$query;
	/*	echo  $ccl.",";
		echo  $category.",";
		echo  $vendor.",";
		    
		echo $from.",";
		echo $soldsum.",,";
        echo 	$avasum.",";	
		echo $est.",";
		echo $est_day."\r\n";*/
		 $query_loop+=$query;
		$sold_sum+=$soldsum;
	    $ava_sum+=$avasum; 
		} 
		$end1=',,,,sum,,sum, ,';
	    $end2=',,,,'.$sold_sum.',,'.$ava_sum.', ,';
        //echo '</br></br>$query_loop'.$query_loop;
	    //$data="\r\n".$query."\r\n\r\n".$end1."\r\n".$end2;
		
		//echo '</br></br>'.$data;
		//echo	$query_loop;					                    
			/*									
						{
	$i=0;
	while ($row = mysql_fetch_assoc($result)) 
           {
	            $category=$row["Category"];
                $ccl=$row["CCL_Item"];
				 
	            $avasum=$row["avasum"];
	            $vendor=$row["vendors_name"];
	

		   $soldsum=$this->est_invt_exe2($past,$ccl);
			// $result2=$this->est_invt_exe2($past, 'EGF-4kg');
		if ($soldsum!=0){//echo  $i++.'/'.$row["CCL_Item"].'/'.$result2.'</br>';
		
		//$soldsum=$row1["soldsum"];	
                                             $soldrate=$soldsum/$past;
	                                         $est=($avasum/$soldrate);
	                                         $est = number_format($est, 2, '.', '');                                   
	                                         $est_day=date('Y-m-d', strtotime('+'.number_format($est,0, '.', '').' day', strtotime($today))) ;
		
		
		
			
			//
                                       echo $row["CCL_Item"] ;
	                                     echo ",";
	                                        // echo $row["Category"];
	                                    echo  $row["Category"] ;
	                                    echo ",";
                                          // echo $row["vendors_name"];
                                        echo  $row["vendors_name"] ;
	                                    echo ",";
	                                     //02/02/2015
	                                     //echo  substr($from,5,4).'-'.substr($from,2,2).'-'.substr($from,0,2);
	                                    $start=date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));
	                                    echo ",";

                                      
										 echo $soldsum;
										
							             echo ",";
	                                           //echo $row["avasum"];
	                                    echo ",";
	
	                                    echo $row["avasum"];
	                                  //  echo $avasum;
	
	                                    echo ",";
	                                        
	                                   // echo $est;
	                                    echo ",";	
                                        //echo $est_day;	
	                                    echo ",";
	
                                       
	                                    echo "\r\n";
			
			
			}
			 $sold_sum+=$soldsum;
	                                   $ava_sum+=$avasum; 
			}
			
     $end1=',,,,sum,,sum, ,';
	   $end2=',,,,'.$sold_sum.',,'.$ava_sum.', ,';
        
	    $data="\r\n".$row."\r\n\r\n".$end1."\r\n".$end2;
	     // echo "\r\n".$row["Category"].','.$row."\r\n\r\n";

    
       // force_download('Estimated_Inventory_report.csv', $data);
}
        */ 
	//$end1=',,,,sum,,sum, ,';
	 //  $end2=',,,,'.$sold_sum.',,'.$ava_sum.', ,';
        //$data+=$query; 
	   $data="\r\n".$end1."\r\n\r\n".$end1."\r\n".$end2;
	force_download('Estimated_Inventory_report.csv', $data);
	
	/* 
	if ( ! write_file('d:\Estimated_Inventory_report.csv',str_replace(';','',$data)))	
{
     echo 'Unable to write the file';
}
else
{
     echo 'File written!';

}

*/ 
}

function est_invt_exe2($past,$id,$ccl,$category,$vendor,$from,$avasum){

       $this->load->dbutil();
       $this->load->helper('download');
      	   $today = mdate(" %Y-%m-%d",  time());
       $to = $this->input->post('to');
	  // $company_id= $this->input->post('company_id');
	$from= date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));
	$period='For the Period:'.$from.'to'.$today;
    $head1='Products_Sold_Summary_';
	$head2='CCL_Item,QTY order, , ';
	 
      

 $result =mysql_query('SELECT 
                              CASE WHEN SUM(u.item_qty) IS NULL THEN 0 ELSE SUM(u.item_qty) END AS soldsum						  
				        FROM sales_orders_items AS u 
						JOIN (SELECT salesorder_id FROM sales_orders WHERE dateraised BETWEEN "'.$from.'" AND "'. $today.'" 
						                                   GROUP BY salesorder_id ) 
														   AS a ON a.salesorder_id = u.sales_id 					    
						WHERE CCL_Item = "'.$ccl.'" 		  
						GROUP BY CCL_Item ');

	{
        
		$row='';
      

 
       

	   $delimiter = ",";
        $newline = "\r\n";
 //echo $head1."\r\n\r\n".$period."\r\n".$head2."\r\n";
//echo$row;
  $rows='';       
	$i=1;
    if ($result){
        while ($row = mysql_fetch_assoc($result)) {

	    $soldsum=$row["soldsum"];
	  //  echo '$row["soldsum"]'.$row["soldsum"].'</br>';
	   return $soldsum;
	                                         $soldrate=$soldsum/$past;
	                                         $est=($avasum/$soldrate);
	                                         $est = number_format($est, 2, '.', '');                                   
	                                         $est_day=date('Y-m-d', strtotime('+'.number_format($est,0, '.', '').' day', strtotime($today))) ;
		echo  $id.',';
	    echo  $ccl.',';
		echo  $category.',';
		echo  $vendor.',';
		    
		echo $from.',';
		echo $soldsum.',,';
        echo 	$avasum.',';	
		echo $est.',';
		echo $est_day."\r\n";
		
       }
	}
       else{
	         return '0';
			                                 $soldsum=0;
											 $est='';	                                                                        
	                                         $est_day='';
	    echo  $i.',';
		echo  $ccl.',';
		echo  $category.',';
		echo  $vendor.',';
		    
		echo $from.',';
		echo $soldsum.',,';
        echo 	$avasum.',';	
		echo $est.',';
		echo $est_day."\r\n";
		
        }
		$i++;
		
 }         
	 
	
}



function est_invt_exe1(){
       $this->load->dbutil();
       $this->load->helper('download');
      
       $past = $this->input->post('past');
	   $vendor = $this->input->post('vendor');
	   //$to = $this->input->post('to');
	   $today = mdate(" %Y-%m-%d",  time());
      
	 
	   $from= date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));

        
	   
    $head1='Estimated Inventory Duration';
	$period='Estimated inventory selling rate by averaging over the past '.$past.' days';
	$head2='Report print:'.mdate(" %Y-%m-%d",  time());
    $head5='CCL_Item,Category,vendor , Start Date, QTY Sold,,QTY available, Est Duration , Est. Out of Stock Date';
     $head_all= $head1."\r\n\r\n".$period."\r\n".$head2."\r\n".$head5."\r\n";
			

	
	
	
	
	
	
	$result =mysql_query(' SELECT Category ,CCL_Item, vendors_name,
                                        CASE WHEN SUM(qty) IS NULL THEN 0 ELSE SUM(qty) END AS wh_sum 
				                       
										FROM warehouse	
										Where vendors_name like  "'.$vendor.'" 
						                GROUP BY CCL_Item ORDER BY Category ASC');

						
						
						
	$row=''; 
    $print_all=''; 	
    $sold_sum=0;
    $whouse_sum=0;
	$i=0;
	while ($row = mysql_fetch_assoc($result)) 
           {
	            $category=$row["Category"];
                $ccl=$row["CCL_Item"];
				 
	            $wh_sum=$row["wh_sum"];
	           // $vendor=$row["vendors_name"];
	
 
		   	
						

                $result1 =mysql_query(' SELECT a.salesorder_id, u.sales_id, u.CCL_Item, 
                              CASE WHEN SUM(u.item_qty) IS NULL THEN 0 ELSE SUM(u.item_qty) END AS soldsum						  
				        FROM sales_orders_items AS u 
						JOIN (SELECT salesorder_id FROM sales_orders WHERE dateraised BETWEEN "'.$from.'" AND "'. $today.'" 
						                                   GROUP BY salesorder_id ) 
														   AS a ON a.salesorder_id = u.sales_id 					    
						WHERE CCL_Item= "'.$ccl.'" 		  
						GROUP BY CCL_Item ');
	
	
                        //echo 'test1';

	                                  if ((mysql_num_rows($result1) != 0)and($result1)) {
										  
										  
										   // echo 'mysql_num_rows($result1) != 0';
										  
										  
                                             while ($row1 = mysql_fetch_assoc($result1)) {

	                                        $soldsum=$row1["soldsum"];	
                                             $soldrate=$soldsum/$past;
	                                         $est=($wh_sum/$soldrate);
	                                         $est = number_format($est, 2, '.', '');                                   
	                                         $est_day=date('Y-m-d', strtotime('+'.number_format($est,0, '.', '').' day', strtotime($today))) ;
							                 } 
                                        }
                                         else  
										 {
											 //echo 'mysql_num_rows($result1) = 0';
											 
											 $soldsum=0;
											$est='';
											$est_day='';
                                    
										}            
									/*	echo  $i++;
                                        echo $row["CCL_Item"] ;
	                                    echo ",";
	                                    echo $row["Category"];
	                                 
	                                    echo ",";
                                        echo  $vendor ;
	                                    echo ",";
	                                     //02/02/2015
	                                     //echo  substr($from,5,4).'-'.substr($from,2,2).'-'.substr($from,0,2);
	                                    $start=date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));
	                                   // echo ",";

                                      
										echo $soldsum;
	                                    echo ",";	
	                                    echo $row["wh_sum"];
	                                  	
	                                    echo ",";
	                                        
	                                    echo $est;
	                                    echo ",";	
                                        echo $est_day;	
	                                    echo ",";
	                                    echo "\r\n";
										
										*/
                                        $sold_sum+=$soldsum;
	                                    $whouse_sum+=$wh_sum; 
	                                    $start=date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));
								 
                                 $print=$row["CCL_Item"] .','.$row["Category"].','.$vendor.','.$start.','.$soldsum.',,'.$wh_sum.','.$est.','.$est_day;
								

							     $p_array[$i] = $print;//using array to add line to textflow
								
								 }
   
   
   
   
  
     
	    
		 $end1=',,,,sum,,sum, ,';
	     $end2=',,,,'.$sold_sum.',,'.$whouse_sum.', ,';
         $p_array = implode("\r\n", $p_array);
 
	     $data=$head_all."\r\n".$p_array."\r\n\r\n".$end1."\r\n".$end2;
	     
         force_download('Estimated_Inventory_report.csv', $data);
   
        

	 

}						

function est_invt_exe_all($past){//list on so item

       $this->load->dbutil();
       $this->load->helper('download');
       //$past = $this->input->post('past');
	   $vendor = $this->input->post('vendor');
	  // $from = $this->input->post('from');
	   //$to = $this->input->post('to');
	   $today = mdate(" %Y-%m-%d",  time());
      
	 
	$from= date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));

        
	   
    $head1='Estimated Inventory Duration';
	$period='Estimated inventory selling rate by averaging over the past '.$past.' days';
	$head2='Report print:'.mdate(" %Y-%m-%d",  time());
	//$head1='Estimated Inventory Duration';
	//$head5='CCL_Item,Category,vendor , Start Date, QTY Sold,Qty on Hand,QTY available, Est Duration , Est. Out of Stock Date';
	 $head5='CCL_Item,Category,vendor , Start Date, QTY Sold,,QTY available, Est Duration , Est. Out of Stock Date';
      echo $head1."\r\n\r\n".$period."\r\n".$head2."\r\n".$head5."\r\n";
			
 
   $result =mysql_query(' SELECT a.salesorder_id, u.sales_id, u.CCL_Item, 
                              CASE WHEN SUM(u.item_qty) IS NULL THEN 0 ELSE SUM(u.item_qty) END AS soldsum, h.avasum,h.vendors_name,h.Category 
				        FROM sales_orders_items AS u 
						JOIN (SELECT salesorder_id FROM sales_orders WHERE dateraised BETWEEN "'.$from.'" AND "'. $today.'" 
						                                   GROUP BY salesorder_id ) 
														   AS a ON a.salesorder_id = u.sales_id 
					    JOIN (SELECT vendors_name,Category,CCL_Item, SUM(qty) AS avasum 
						      FROM warehouse GROUP BY CCL_Item ) 
						      AS h ON h.CCL_Item = u.CCL_Item 
						
						GROUP BY CCL_Item ORDER BY Category ASC'); 
						
		 
						
						
						{
	 $row='';       
    $sold_sum=0;
    $ava_sum=0;
	$i=0;
	while ($row = mysql_fetch_assoc($result)) 
           {
	            
 
		   	
						

               
	
	
        
 
	                                  

	                                    $soldsum=$row["soldsum"];	
                                             $soldrate=$soldsum/$past;
	                                        
										 
                                        echo $row["CCL_Item"] ;
	                                     echo ",";
	                                        // echo $row["Category"];
	                                    echo  $row["Category"] ;
	                                    echo ",";
                                          // echo $row["vendors_name"];
                                        echo  $row["vendors_name"] ;
	                                    echo ",";
	                                     //02/02/2015
	                                     //echo  substr($from,5,4).'-'.substr($from,2,2).'-'.substr($from,0,2);
	                                    $start=date('Y-m-d', strtotime('-'.number_format($past,0, '.', '').' day', strtotime($today)));
	                                    echo $start;
										echo ",";

                                      
										 echo $soldsum;
										
							             echo ",";
	                                           //echo $row["avasum"];
	                                    echo ",";
	
	                                    $avasum=$row["avasum"];
										 echo $avasum;
	                                  $est=($avasum/$soldrate);
	                                         $est = number_format($est, 2, '.', '');                                   
	                                         $est_day=date('Y-m-d', strtotime('+'.number_format($est,0, '.', '').' day', strtotime($today))) ;
							                 
								       
	
	                                    echo ",";
	                                        
	                                    echo $est;
	                                    echo ",";	
                                        echo $est_day;	
	                                    echo ",";
	
                                        $sold_sum+=$soldsum;
	                                   $ava_sum+=$avasum; 
	                                    echo "\r\n";
								 
 
									
								 }
								 
		 
   

     
	    
		 $end1=',,,,sum,,sum, ,';
	     $end2=',,,,'.$sold_sum.',,'.$ava_sum.', ,';
        
	     $data="\r\n".$row."\r\n\r\n".$end1."\r\n".$end2;
	     // echo "\r\n".$row["Category"].','.$row."\r\n\r\n";

    
         force_download('Estimated_Inventory_report_all.csv', $data);
		


	 
}
}



function pdf_dl_by_date()
   {
	   echo Modules::run('template/dash_head');
	   $datestring = " %Y-%m-%d";
       $time = time();
		
		

       $from = mdate($datestring, $time);
	   $to = mdate($datestring, $time);
	   $data ['company']=$this->db->select('*')->where('Company_id', '14')->where('dateraised >=', $from)->where('dateraised <=', $to)->get('invoices');
	     $data['date']=array(
                       
                         $from,$to,
                         );   
	   
	   $this->load->view('pdf_dl_by_date',$data);
		
	   
   }

function pdf_dl_by_date1()
   {
	    echo Modules::run('template/dash_head');
	    $from = $this->input->post('from');
        $to = $this->input->post('to');
	   	$data ['company']=$this->db->select('*')->where('Company_id', '14')->where('dateraised >=',$from )->where('dateraised <=', $to)->get('invoices');
 
	    $data['date']=array(
                       
                         $from,$to,
                         );   
	    $this->load->view('pdf_dl_by_date',$data);
		
		echo $from.$to.'</br>';
   }
function pdf_dl_by_date2($id)
   {

      mysql_query("UPDATE invoices SET inc_vat = (Grand_total+shipping_cost)*1.2 , VAT_ammount=(Grand_total+shipping_cost)*0.2   where invoice_id=".$id."");

         $this->load->model('invoices/mdl_invoices');
         $data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
        $invoice =$this->mdl_invoices->get_invoice_info_pdf($id);
	    foreach ($invoice->result() as $v)
        {
                     
        }
		

        

        
         $html =  $this->load->view('invoices/pdf_invoice_view', $data, TRUE);
	 
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
   
         
       // $name = "d:/dropbox/Dropbox/Invoices/invoice- SO#".substr(sprintf('%06d', $v->salesorder_id),0,6).".pdf";
		$name ="invoice- SO#".substr(sprintf('%06d', $v->salesorder_id),0,6).".pdf";
		//echo 'name'.$name;
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	 //$mpdf->Output($name,'F');
		
        $mpdf->Output('d:/dropbox/Dropbox/Invoices/'.$name,'F');//Uploads_inv_pdf
		
		$mpdf->Output($name, 'D'); 
		//continue;
		//if(!empty($_POST['redirectTo']) {
   // header('Location: ' . $_POST['redirectTo']);
   // die;
           // }

              
   }

   
   
function invoice_merg()
   {
	
	    echo Modules::run('template/dash_head');
        $this->load->view('invoice_merg');

   }
      
   
   
   
   function invoice_merg_2()
   {
         $this->load->dbutil();
         $this->load->helper('download');
		
		$from = $this->input->post('from');
        $to = $this->input->post('to');
        $company_id = $this->input->post('company_id');
        $df=$from;
        $dt=$to;
  	  $from = '2015-12-01';//'2015-12-20'
        $to = '2015-12-10';
	
	if ($company_id=="ALL") {
		$inv=$this->db->select('*')->where('dateraised >=', $from )->where('dateraised <=', $to)->get('invoices');
	
	}                
    ELSE 
    $inv=$this->db->select('*')->where('Company_id',$company_id)->where('dateraised >= ', $from )->where('dateraised <= ', $to)->get('invoices');
	
	$num_rows = $inv->num_rows();
	
	if ($num_rows >0){
	$this->load->model('invoices/mdl_invoices');
    
    $this->load->library('MPDF/mpdf');
		$mpdf=new mPDF(); 
	    
		foreach ($inv->result() as $v)
        {
          
		  $data= array(
                       'inc_vat' => ($v->Grand_total+$v->shipping_cost)*1.2,
                         'VAT_ammount'=>($v->Grand_total+$v->shipping_cost)*0.2
                         );  
                 $this->db->where('invoice_id',$v->invoice_id );
                 $this->db->update('invoices',$data); 
		         $html=$this->invoice_merg_3($v->invoice_id );
 
		}
        
		echo'<body onload="window.print();">'.$html.'<body>';	  
      }
	  else
	  {
		  echo '<font size="20">no invoices found</font>';
	  }
   }

    
   function invoice_merg_3($id ) {

        
   $this->load->model('invoices/mdl_invoices');
    $data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
   	$invoice = $this->mdl_invoices->get_invoice_info_pdf($id);
$this->load->library('MPDF/mpdf');


		
		   //  $html =  $this->load->view('pdf_invoice_view', $data, TRUE);
		
		$html=$this->load->view('pdf_invoice_view_print', $data);
		//return $html;
		
		//$packingslip=$this->load->view('pdf_invoice_view', $data);
		//print  $packingslip;

 // $this->SetJS('this.print();');
	//echo'<body onload="window.print();">'.$packingslip.'<body>';
	
		
    }

	

function stock_value(){


$this->db->select('*');
$query=$this->db->get('warehouse');


$res = $query->result_array();
$total_sum=0;
$costs_sum=0;
foreach ($res  as $row){

echo' <td>'. $row['CCL_Item'].'</td>';
echo' <td>'. $row['qty'].'</td>';
echo' <td>£'. $row['sell_price'].'</td><br>';

 $total_sum+=$row['sell_price']*$row['qty'];
 $costs_sum+=$row['buy_price']*$row['qty'];
 
}
echo'<br>RRP Total  &pound;';
echo $total_sum;
echo'<br>Factory Costs  &pound;';
echo $costs_sum;

echo'<br>Profit befor shipping  Costs &pound; ';
echo $total_sum - $costs_sum;


}




function debtors (){

$this->db->select('*');
$this->db->from('invoices');
$this->db->join('payments', 'invoices.invoice_id = payments.invoice_id');
$this->db->join('businesses', 'invoices.Company_id = businesses.Company_id');
$invoice=$this->db->get();


$res = $invoice->result_array();

//$total_sum=0;
//$costs_sum=0;
foreach ($res  as $row){
  $outstanding = $row['inc_vat']- $row['amount'];
echo' <td>   '. $row['invoice_id'].'</td>';
echo' <td>   '. $row['Company_name'].'</td>';
echo' <td> exc Vat   '. $row['Grand_total'].'</td>';
echo' <td>   Inc Vat &pound;'. $row['inc_vat'].'</td>';
echo' <td>   Paid &pound;'. $row['amount'].'</td>';
echo' <td>   '. $row['method'].'</td>';
echo' <td>   '. $row['date_paid'].'</td>';
echo' <td>  '. $outstanding.'</td><br>';

 //$total_sum+=$row['sell_price']*$row['qty'];
 //$costs_sum+=$row['buy_price']*$row['qty'];
 
}
echo'<br>RRP Total  &pound;';
echo $total_sum;
echo'<br>Factory Costs  &pound;';
echo $costs_sum;

echo'<br>Profit befor shipping  Costs &pound; ';
echo $total_sum - $costs_sum;


}




function pending_so(){
$query = $this->db->select('*')->where('status','pending')->count_all('sales_orders');
print_r($query);
}

function sale_by_product_detail(){
	
	 $from = $this->input->post('from');
     $to = $this->input->post('to');
    //$search= $this->input->post('search');
    
    
$datepickerFrom= date_format(date_create_from_format('m/d/Y', $from), 'Y-m-d');
$datepickerTo= date_format(date_create_from_format('m/d/Y', $to), 'Y-m-d');

/*	
$query =$this->db->select('*') 
	             // ->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)
	              ->get('invoices');
*/
                               $this->db->select('*');                                
	                           $this->db->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo);
	                         // $this->db->WHERE ('dateraised >=','2015-04-02','AND dateraised <=','2015-04-02');							   
							  $this->db->from('invoices');
							  $this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
                              $this->db->join('sales_orders_items', 'invoices.salesorder_id = sales_orders_items.sales_id');
							  $this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
							 // $this->db->group_by('CCL_Item');
							 // $data['invoice_info']= $this->db->get();
							 // $invoice_info= $this->db->group_by('CCL_Item')->get();                                
							 // $data['invoice_info']=$invoice_info;
							  
							  foreach ($invoice_info->result() as $table) { 
	 
	     $CCL_Item=$table->CCL_Item;
	     
		 
	
         $data['invoice_info'] =$this->db->where('CCL_Item',$CCL_Item)
		               ->group_by('CCL_Item')		
                       ->get('invoice_items');
							  
							  }	  
							  
							  
							  
 /*$data['date']=array(
                       
                         $datepickerFrom,$datepickerTo,
                         );     */                           
$this->load->view('sale_by_product_detail_PDF', $data);				  
//*******************generate pdf
//$data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
//$name = "invoice- SO# ".$so_id.".pdf";
$name = "sale_by_product_detail.pdf";


$path="c:/Users/public/report/";
  
      //  if (!file_exists($path.$name))
		{
		/*
        //$data['total'] = $this->mdl_sales_orders->total($id);
	    //$this->load->view('pdf_sales_view', $data);
        
         $html =  $this->load->view('sale_by_product_detail_PDF', $data, TRUE);
	 
	 	$this->load->library('MPDF/mpdf');
			 
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales by Product Details');
		//$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		//$name = "invoice- SO# ".$so_id.".pdf";
		//$path="c:/Users/public/Uploads_inv_pdf/";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
	    
		$mpdf->Output($name, 'D'); 
        //$mpdf->Output('d:/wamp/www/'.$name,'F');Uploads_inv_pdf
		$mpdf->Output($path.$name,'F');
		echo'generate file';*/
        }
//down with generating pdf 

}

function sale_by_product_detail2(){
	
	 $from = $this->input->post('from');
     $to = $this->input->post('to');
    //$search= $this->input->post('search');
    
    
$datepickerFrom= date_format(date_create_from_format('m/d/Y', $from), 'Y-m-d');
$datepickerTo= date_format(date_create_from_format('m/d/Y', $to), 'Y-m-d');

/*	
$query =$this->db->select('*') 
	             // ->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo)
	              ->get('invoices');
*/
                               $this->db->select('*');                                
	                           $this->db->WHERE ('dateraised >=',$datepickerFrom,'AND dateraised <=',$datepickerTo);
	                         // $this->db->WHERE ('dateraised >=','2015-04-02','AND dateraised <=','2015-04-02');							   
							  $this->db->from('invoices');
							  $this->db->join('invoice_items', 'invoices.salesorder_id = invoice_items.sales_id');
                              $this->db->join('sales_orders_items', 'invoices.salesorder_id = sales_orders_items.sales_id');
							  $this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
							 // $this->db->group_by('CCL_Item');
							 // $data['invoice_info']= $this->db->get();
							  $invoice_info= $this->db->group_by('CCL_Item')->get();                                
							  $data['invoice_info']=$invoice_info;
 /*$data['date']=array(
                       
                         $datepickerFrom,$datepickerTo,
                         );     */                           
$this->load->view('sale_by_product_detail_PDF', $data);				  
//*******************generate pdf
//$data['invoice_info'] = $this->mdl_invoices->get_invoice_info_pdf($id);
//$name = "invoice- SO# ".$so_id.".pdf";
$name = "sale_by_product_detail.pdf";


$path="c:/Users/public/report/";
  
      //  if (!file_exists($path.$name))
		{
		/*
        //$data['total'] = $this->mdl_sales_orders->total($id);
	    //$this->load->view('pdf_sales_view', $data);
        
         $html =  $this->load->view('sale_by_product_detail_PDF', $data, TRUE);
	 
	 	$this->load->library('MPDF/mpdf');
			 
		$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
		$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle('Sales by Product Details');
		//$mpdf->SetFooter('zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420');
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->SetAutoFont();
                $stylesheet = file_get_contents(''.base_url('').'assets/pdfcss/css/bootstrap.css');
                $mpdf->WriteHTML($stylesheet,1);
                
		//$name = "invoice- SO# ".$so_id.".pdf";
		//$path="c:/Users/public/Uploads_inv_pdf/";
		
		$search = array("<div class=\"row-fluid\">", "<div class=\"span6\">", "<div class=\"span5\">", "<div class=\"span5 offset2\">");
		$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");
		$html = str_replace($search, $replace, $html);

		$mpdf->WriteHTML($html);
	
	    
		$mpdf->Output($name, 'D'); 
        //$mpdf->Output('d:/wamp/www/'.$name,'F');Uploads_inv_pdf
		$mpdf->Output($path.$name,'F');
		echo'generate file';*/
        }
//down with generating pdf 

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


}