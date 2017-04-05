<?php
class Dpd extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function shipped($sales_id,$add_info,$qty,$wt){

    $this->load->helper('date');        
$this->load->dbutil();
//$query = $this->db->select('buyername,Address_1,Address_2,Town_city,Postcode,Buyer_Phone_Numbe,salesorder_id,po_number')->where('status','shipped')->where('pallet','0')->where('salesorder_id',$sales_id)->get('sales_orders');
$query = $this->db->select('ShipToCompanyName,ship_Address_1,ship_Address_2,ship_County,ship_Postcode,Shipping_Contact_No,Shipping_Email,salesorder_id,po_number')->where('status','shipped')->where('pallet','0')->where('salesorder_id',$sales_id)->get('sales_orders');

echo $this->dbutil->csv_from_result($query);

$delimiter = ",";
$newline = "\r\n";

//$data=  $this->dbutil->csv_from_result($query,$delimiter,$newline); 
$data=  $this->dbutil->csv_from_result($query,$delimiter,';');
//$data=$data.$add_info.'","'.$qty.'","'.$wt.'"\r\n';//viola addd   
$data=$data.'"'.$add_info.'",'.$qty.','.$wt;//viola addd 
//if ( ! write_file('d:\dpd\shipping_'.time().'.csv',str_replace('"','"',$data)))
if ( ! write_file('d:\dpd\shipping_'.time().'.csv',str_replace(';','',$data)))	
{
     echo 'Unable to write the file';
}
else
{
     echo 'File written!';
	 
	

}
  
    
    
    
return $query;


  /*  $this->load->helper('date'); 
	$this->load->helper('download');
    $this->load->dbutil();
 
    //$search= $this->input->post('search');
    


        //$rows = mysql_query('SELECT salesorder_id,Company_name,po_number,status,dateraised,dateraised,Subtotal_total,shipping_cost,VAT_ammount,inc_vat FROM invoices');
        $rows = $this->db->select('ShipToCompanyName,ship_Address_1,ship_Address_2,ship_County,ship_Postcode,Shipping_Contact_No,Shipping_Email,salesorder_id,po_number' )
                           ->where('status','shipped')
						   ->where('pallet','0')
						   ->where('salesorder_id',$sales_id)
						   ->get('sales_orders');
        $delimiter = ",";
        $newline = "\r\n";


      // $rows=$rows.'"'.$add_info.'",'.$qty.','.$wt;

        //$data = ltrim(strstr($this->dbutil->csv_from_result($rows, ',',"\r\n"), "\r\n"));
		$data = ltrim(strstr($this->dbutil->csv_from_result($rows, ',',"\r\n"), "\r\n"));
        //$data=$data.',"'.$add_info.'",'.$qty.','.$wt;
       // force_download($company_name.'_sales_details'.$from.'~'.$to.'.csv', $data);


	force_download('shipping_'.time().'.csv', $data );

*/


}
    
} 

