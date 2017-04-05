<?php
class Warehouse extends MX_Controller 
{

function __construct() {
parent::__construct();

 $this->load->module('auth');
if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
                
             echo Modules::run('template/dash_head'); 
}



function index(){
							 
$this->load->model('mdl_warehouse');
$data ['Ware'] = $this->mdl_warehouse->get();
//$data ['Warehouse'] = $this->mdl_warehouse->get1();
$this->load->view('warehouse',$data);


}

function view($id){
	
	
	$id = $this->uri->segment(3);
    $this->load->model('mdl_warehouse');		

//if ($this->form_validation->run() == FALSE)
		//{


//$data ['items'] = $this->mdl_warehouse->get_items($id);
    $data ['items'] = $this->mdl_warehouse->get_all_items();
    $data ['get_all'] = $this->mdl_warehouse->get_all_items();
    $data ['Warehouse'] = $this->mdl_warehouse->get();//2015/02/06 add by viola
    $this->load->view('view',$data);           
    }

function edit(){
    
    $itemid = $this->input->post('myitemid');
    $qty = $this->input->post('qty');
    $location = $this->input->post('location');
    $this->load->model('mdl_warehouse');
    $data ['item'] = $this->mdl_warehouse->edit($itemid);

    $this->load->view('edit',$data);
}

function inventoryupdate(){
    
         $itemid = $this->input->post('id');
        $qty = $this->input->post('qty');
        $location = $this->input->post('location');

         $data= array(
        'qty'=> $this->input->post('qty'),
        'location'=> $this->input->post('location'),
          );
        $this->db->where('id',$itemid );
        $this->db->update('warehouse',$data);
  
  
    redirect(''.  base_url().'index.php/warehouse/view/'.$itemid.'');
    }

    function itemupdate(){
        $id=$_POST["id"];

	
        $data= array(
            'CCL_Item'=> $this->input->post('CCL_Item'),
            'vendor_code'=> $this->input->post('vendor_code'),
		    'vendors_name'=> $this->input->post('vendors_name'),
		    'Category'=> $this->input->post('Category'),
		
		    'L'=> $this->input->post('L'),
            'W'=> $this->input->post('W'),
            'H'=> $this->input->post('H'),
			'Product_Weight'=> $this->input->post('Weight'),
            'Description'=> $this->input->post('Description'),
	       
   
            'CTN_L'=> $this->input->post('CTN_L'),
            'CTN_W'=> $this->input->post('CTN_W'),
            'CTN_H'=> $this->input->post('CTN_H'),
            'QTY_CTN'=> $this->input->post('QTY_CTN'),///<-----??????????   2015/01/20 by viola
   
            'DDU_Px'=> $this->input->post('buy_price_usd'),
            'EUR_Px'=> $this->input->post('buy_price_euro'),
            'buy_price'=> $this->input->post('buy_price_gbp'),
		
            'sell_price'=> $this->input->post('sell_price'),
       
             ); 

        $ccl = $this->input->post('CCL_Item');
    
        $this->db->where('id',$id);
        $this->db->update('warehouse',$data);
      
	 
    redirect(''.  base_url().'index.php/warehouse/view/'.$id.'');
 
    }


    function import_it(){

   echo form_open_multipart('warehouse/import');

   echo '<input type="file" name="userfile" size="20" />
         <br /><br />

        <input type="submit" value="upload" />

        </form>';
   }

//importing files 

    function import() {
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));

        $sales_id = $this->input->post('salesid');

        $config['upload_path'] = 'C:\wamp\www\earth\uploads\warehouse';
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
                    'id' => $field['id'],
                    'CCL_Item' => $field['CCL_Item'],
                    'Description' => $field['Description'],
                    'qty' => $field['qty'],
                    
                    
                    'sell_price' => $field['sell_price'],
                    'buy_price' => $field['buy_price'],
                    'PO' => $field['PO'],
                    
                    
                    'Product_Weight' => $field['Product_Weight'],
                    'L' => $field['L'],
                    'W' => $field['W'],
                    'H' => $field['H'],
                    'Material' => $field['Material'],
                    'location' => $field['location'],
                     'DDU_Px' => $field['DDU_Px'],
                    
                    
                    'QTY_CTN' => $field['QTY_CTN'],
                    'CTN_CBM' => $field['CTN_CBM'],
                    'GW_CTN' => $field['GW_CTN'],
                    'CTN_L' => $field['CTN_L'],
                    'CTN_W' => $field['CTN_W'],
                    'CTN_H' => $field['CTN_H'],
                    
                    'notes' => $field['notes'],
                    
                    'vendor_code' => $field['vendor_code'],
                    'vendors_name' => $field['vendors_name'],
                    
                );

                $this->db->insert('warehouse', $data);
            }
            $redirect = '' . base_url() . 'index.php/warehouse/';
            redirect($redirect);
        }
    }
    
    function update_iteminfo() {
		 $this->db->select('*');
		 //$this->db->where('CCL_Item','0');
  //$this->db->group_by('id');
    $this->db->from('warehouse_');
    $status=$this->db->get(); 

        foreach($status->result() as $r) { 
	
	        $data = array(
                        
                  
                    //'CCL_Item' => $r->CCL_Item,
                    'Description' => $r->Description,
                    'QTY_CTN' =>$r->QTY_CTN,             
                    'buy_price' =>$r->buy_price,
                    'duty' =>$r->duty,
                    'freight' => $r->freight,
					
					'L' => $r->L,
                    'W' => $r->W,
                    'H' => $r->H,
                    'Product_Weight' =>$r->Product_Weight,
                    
                    
                    'CTN_CBM' => $r->CTN_CBM,
                    'GW_CTN' => $r->GW_CTN,
                    'Material' =>$r->Material,
					
					
					
					
					'DDU_Px' =>$r->DDU_Px,
                    'EUR_Px' =>$r->EUR_Px,
                    
                   
                    'vendor_code' => $r->vendor_code,
                    'vendors_name' =>$r->vendors_name,
                   
                    'CTN_L' => $r->CTN_L,
                    'CTN_W' => $r->CTN_W,
                    'CTN_H' => $r->CTN_H,
                    
                    'notes' => $r->notes,
					);
	//$this->db->where('CCL_Item','0'); 
	$this->db->where('id',$r->id);                  
    $this->db->update('warehouse', $data); 
	
	
	
	                 echo $r->id.$data;
	            }
	}
	
	
	
    function add_inv(){
        
        $id = $this->input->post('id');
        $location = $this->input->post('location');
        $qty  = $this->input->post('qty');
     
       
       
          
        
        $this->db->select('*');
        $this->db->where('id',$id);
        $move_item = $this->db->get('warehouse');
         
        
        foreach ($move_item->result() as $field) { 
            $data = array(
                    
                    'CCL_Item' => $field->CCL_Item,
					'Category'=> $field->Category,
					'product_id' => $field->product_id,
                    'Description' => $field->Description,
					'QTY_CTN' => $field->QTY_CTN,
                    'qty' => $qty,
                    'sell_price' => $field->sell_price,
                    'buy_price' => $field->buy_price,
                    
									
                    'duty' => $field->duty,
                   'freight' => $field->freight,
                    'L' => $field->L,
                    'W' => $field->W,
                    'H' => $field->H,
					'Product_Weight' => $field->Product_Weight,
					'CTN_CBM' => $field->CTN_CBM,
                    'GW_CTN' => $field->GW_CTN,
                    'Material' => $field->Material,
					
					 'GBP_Px' => $field->GBP_Px,
					 'DDU_Px' => $field->DDU_Px,
					  'EUR_Px' => $field->EUR_Px,
                    'location' => $location,
                     'PO' => $field->PO,
                    'vendor_code' => $field->vendor_code,
                    'vendors_name' => $field->vendors_name,
                   
                    'CTN_L' => $field->CTN_L,
                    'CTN_W' => $field->CTN_W,
                    'CTN_H' => $field->CTN_H,
                     'notes' => $field->notes,
                    
                   
                );
                
            
       }
	  
            $this->db->insert('warehouse',$data);
            $redirect = '' . base_url() . 'warehouse/';
          //  redirect($redirect);
		   redirect(''.  base_url().'index.php/warehouse/view/'.$id.'');
        
    }

	
	
	
    function move_location(){
        
        $id = $this->input->post('myitemid');
        $location = $this->input->post('location');
        $qty  = $this->input->post('qty');
     
       
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
					'Category'=> $field->Category,
					'product_id' => $field->product_id,
                    'Description' => $field->Description,
					'QTY_CTN' => $field->QTY_CTN,
                    'qty' => $new_qty,
                    'sell_price' => $field->sell_price,
                    'buy_price' => $field->buy_price,
                    
					
					
                    'duty' => $field->duty,
                   'freight' => $field->freight,
                    'L' => $field->L,
                    'W' => $field->W,
                    'H' => $field->H,
					'Product_Weight' => $field->Product_Weight,
					'CTN_CBM' => $field->CTN_CBM,
                    'GW_CTN' => $field->GW_CTN,
                    'Material' => $field->Material,
					
					 'GBP_Px' => $field->GBP_Px,
					 'DDU_Px' => $field->DDU_Px,
					  'EUR_Px' => $field->EUR_Px,
                    'location' => $new_location,
                     'PO' => $field->PO,
                    'vendor_code' => $field->vendor_code,
                    'vendors_name' => $field->vendors_name,
                   
                    'CTN_L' => $field->CTN_L,
                    'CTN_W' => $field->CTN_W,
                    'CTN_H' => $field->CTN_H,
                     'notes' => $field->notes,
                    
                   
                );
                
            
        }
        $this->db->insert('warehouse',$data);
		redirect(''.  base_url().'index.php/warehouse/view/'.$id.'');
        
    }

    function remove_item(){
    $id = $this->input->post('item_id');
    $remove_id = $this->input->post('remove_id');
    $gohere = $this->input->post('item');
    $this->db->where('id', $remove_id)->delete('warehouse');

     $redirect = '' . base_url() . 'index.php/warehouse/view/'.$id.'';
            redirect($redirect);
 
    }

    function add(){

    
    $data= array(
       'CCL_Item'=> $this->input->post('CCL_Item'),
       'Description'=> $this->input->post('Description'),
	   
	   'Category'=> $this->input->post('Category'),
       'vendor_code'=> $this->input->post('vendor_code'),
	    'vendors_name'=> $this->input->post('vendor'),
	   'Category' => $this->input->post('Category'),
	   
       'L'=> $this->input->post('L'),
       'W'=> $this->input->post('W'),
       'H'=> $this->input->post('H'),
	   'qty'=> $this->input->post('qty'),
	   
	   'CTN_L'=> $this->input->post('CTN_L'),
       'CTN_W'=> $this->input->post('CTN_W'),
       'CTN_H'=> $this->input->post('CTN_H'),
       'QTY_CTN'=> $this->input->post('QTY_CTN'),
     
    
       'DDU_Px'=> $this->input->post('DDU_Px'),
       'EUR_Px'=> $this->input->post('DDU_Px'),
       'buy_price'=> $this->input->post('buy_price'),
       'sell_price'=> $this->input->post('sell_price'),
	   'location'=> $this->input->post('location')//2015/01/19 viola add
       
            );
    
            $this->db->insert('warehouse',$data);


             $redirect = '' . base_url() . 'index.php/warehouse/';
             redirect($redirect);

    }


function lowstockitems(){
    $this->load->model('mdl_warehouse');
    $data['low'] = $this->mdl_warehouse->getlowstock();
    $this->load->view('lowstock',$data);
}

function delete($id){
    
    $this->db->where('id',$id)->delete('warehouse');
     $redirect = '' . base_url() . 'warehouse/';
            redirect($redirect);
}


}