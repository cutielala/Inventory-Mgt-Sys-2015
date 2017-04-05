<?php
class Imports extends MX_Controller 
{

function __construct() {
parent::__construct();
$this->load->helper('file');
}



function readExcel()
{
        $this->load->library('csvreader');
        $result =   $this->csvreader->parse_file(''.  base_url().'/imports/save/shipped/test1.csv');//path to csv file

        $data['csvData'] =  $result;
        $this->load->view('view_csv', $data);  
}

function exportedToCSV()
    {
  
        $this->load->dbutil();
        
     
        $this->load->dbutil();
        $this->load->helper('download');
        
        
        
        
        
        $query = $this->db
                ->select('businesses.Company_name,customers.address1,customers.address2,customers.postcode,customers.Phone_number,`sales_orders.salesorder_id')
                ->where('status','shipped')
                ->from('sales_orders')
                ->join('customers', 'sales_orders.Customer_id = customers.customer_id')
                ->join('businesses', 'sales_orders.Company_id = businesses.Company_id')
                ->get();
        return $query;
        
        
      
        
        foreach ($query->result() as $csv) { 
        }
         $data = array(
              'Organisation' =>$csv->Company_name,
                'Address Line 1' =>$csv->address1,
                'Address Line 2' =>$csv->address2,
                'Address Line 3'=>$csv->address3,
                'Address Line 4'=>$csv->address4,
                'Postcode'=>$csv->Postcode,
                'Country Code'=>'',
                'Service Code'=>$csv->type,
                'No. Parcels'=>'',
                'Total Weight'=>'',
                'Contact Telephone'=>$csv->Phone_number,
                'Customer Ref 1'=>$csv->salesorder_id,
            );
         
            print_r($query);
        $export = $this->dbutil->csv_from_result($data, ',');
        
        force_download('result.csv', $export); 

      

 
        
        } 

}