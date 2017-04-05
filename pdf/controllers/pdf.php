<?php
class Pdf_gen extends MX_Controller 
{

function __construct() {
parent::__construct();
$this->load->helper('My_Pdf_helper');
}



    function po_pdf($id) {
    $this->load->model('mdl_po');
    $query =  $this->mdl_po->get($id);
    foreach ($query->result() as $value) {
        
    }
    $data['venodr_name'] = $value->Vendor_name;
    $data['dateraised'] = $value->dateraised;
    $data['Grand_total'] = $value->Grand_total;
    
    
    $this->load->view('po_gen', $data);
}
   //<------generate PDF invoices------>
   public function invoice_pdf($id){
	   
	   echo"test";
   }
   
   function invoice_pdf_($id){//generate pdf and force to download  


    //salesorders
        
		
		 $this->load->model('salesorders/mdl_sales_orders');
		
         $this->load->model('invoices/mdl_invoices');
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