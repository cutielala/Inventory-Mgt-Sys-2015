<?php

class Backorders extends MX_Controller {

   function __construct() {
        parent::__construct();


        $this->load->module('auth');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        
    }

    function index() {
echo Modules::run('template/dash_head');
        $this->load->model('mdl_back_orders');
        $data['backorders'] = $this->mdl_back_orders->get();
        //$data['needsbackoders'] = $this->mdl_back_orders->();
        $this->load->view('backorders/back_orders', $data);
        
    }
    
   //---------------------------------
// All sales orders viewsbelow
//---------------------------------
    function view($id) {
        echo Modules::run('template/dash_head');
       $this->load->model('mdl_back_orders');
        $this->load->model('settings/mdl_settings');
        $this->load->model('warehouse/mdl_warehouse');
        $this->load->model('customers/mdl_customers');

        $data ['vat_rate'] = $this->mdl_settings->get_vat();
        $data ['addresses'] = $this->mdl_back_orders->addresses($id);
        $data ['query'] = $this->mdl_warehouse->get();
        $data ['customer'] = $this->mdl_customers->get_customer($id);
        $data ['orders'] = $this->mdl_back_orders->orders($id);
        $data ['order_items'] = $this->mdl_back_orders->order_items($id);
        $data['total'] = $this->mdl_back_orders->total($id);
        $this->load->view('backorders/view', $data);
    }
    
    
    function add_items()
{
        
        $this->load->helper('date');
$qty = $this->input->post('item_qty');
$itemPrice =$this->input->post('itemPrice');
$lineprice =  $itemPrice *  $qty;
$newsoprice = $lineprice * $itemPrice;
//adds the the sales orders +1 for-revision

$sorev = $this->input->post('sales_id'); 

$date = date('Y-m-d');

$backorderdata = array(
                'so_notes' =>$this->input->post('sales_id'),
                'Company_name' => $this->input->post('Company_name'),
				'Company_id' => $this->input->post('Company_id'),
                 'buyername' =>$this->input->post('buyername'),
                'Address_1' =>$this->input->post('Address_1'),
               'Address_2' => $this->input->post('Address_2'),
               'Town_city' => $this->input->post('Town_city'),
               'Postcode' => $this->input->post('Postcode'),
                'po_number' => $this->input->post('po_number'),
                'dateraised' => $date,
              'backorder' => 'YES',
                'sales_orders_rev'=> $sorev++,
            );
        $this->db->insert('sales_orders',$backorderdata);
         
        
        $BO_ID = $this->db->insert_id();


  

   $data= array(
       'wh_item_id'=> $this->input->post('wh_item_id'),
       'sales_id'=>   $BO_ID,
       'CCL_Item'=> $this->input->post('CCL_Item'),
       'Description'=> $this->input->post('Description'),
       'item_qty'=> $this->input->post('item_qty'),
       'itemPrice'=> $this->input->post('itemPrice'),
       'itemlinetotal'=> $lineprice,
      
       
   );
   //backorder qtys and totals
  
   
   //new qtys 
   $item_id = $this->input->post('item_id');
   $newso_qty = $this->input->post('new_so_qty');
   $newlinetotal = $this->input->post('newlinetotal');
   //print_r($data);
   
$this->db->insert('sales_orders_items',$data);

   
   $array = array(
     
     'item_qty'=> $newso_qty,
       'itemlinetotal'=> $newlinetotal,
   );
$this->db->where('item_id', $item_id);
$this->db->update('sales_orders_items', $array);
    
     $id = $this->input->post('sales_id');
   $redirect = ''.base_url().'salesorders/view/'.$id.'';
   redirect($redirect);
}


function back_to_so(){
    $id = $this->input->post('sales_id');
    
    $this->db->select('*');
    $this->db->where('salesorder_id',$id);
    $this->db->from('sales_orders');
    $detatils = $this->db->get();
    
    foreach ($detatils->result() as $detail) {
        
        $data = array(
           'Company_id'=> $detail->Company_id,
            'Address_1'=> $detail->Address_1,
            'Address_2'=> $detail->Address_2,
            'Town_city'=> $detail->Town_city,
            'Postcode'=> $detail->Postcode,
            'po_number'=> $detail->po_number,
            
           
        );
        
   $this->db->insert('sales_orders',$data);
    }
    
    
    
    
    $this->db->select('*');
    $this->db->where('sales_id',$id);
    $this->db->from('backorders_items');
    $itemsdetatils = $this->db->get();
    
        foreach ($itemsdetatils->result() as $items) {
        
        $data = array(
           'Description'=> $items->Description,
            'CCL_Item'=> $items->CCL_Item,
            'wh_item_id'=> $items->wh_item_id,
            'item_qty'=> $items->item_qty,
            'ItemPrice'=> $items->ItemPrice,
            'itemlinetotal'=> $items->itemlinetotal,
           
           
        );
        
    }
    
}  
    

 
}