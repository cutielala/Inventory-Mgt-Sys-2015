<?php
class Notifications extends MX_Controller 
{

function __construct() {
parent::__construct();
}


//callender/////

//





//Sales Orders /////////////////

function getuser(){
    $q = intval($_GET['q']);

$this->db->select('*')
        ->from('businesses');
$this->db->where('Company_id',$q);           
$query = $this->db->get();                           
    


foreach ($query->result() as $row) {
echo '    <div class="col-md-12">';
echo '    </br>';
echo ' <h5>Company name </h5><input type="text" name="buyer_name" readonly="readonly" value="'. $row->Company_name .'" required="required" class="form-control">';
 
       
            echo '     <div class="col-md-12">';
			
			echo '          <div class="col-md-4">';
			echo '</br>   Business Info:   </br>';
			echo 'Contact <input type="text" name="contact" value="'. $row->first_name .'"class="form-control"  >';
			echo 'Phone <input type="text" name="Phone_number" value="'. $row->Phone_number .'"class="form-control"  >';

			//echo 'vat_exempt <input type="text" name="vat_exempt" value="'. $row->vat_exempt .'"class="form-control ">';
			echo 'vat exempt<select name="vat_exempt" class="form-control">
                        <option value="'. $row->vat_exempt.'">'. $row->vat_exempt.'</option>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>
                    </select>';
            //echo 'Term <input type="text" name="terms" value="'. $row->terms .'"class="form-control ">';
			
			
											 
			echo 'Terms  <select   name="terms" id="e3" class="form-control"  >
                        <option  value="'.$row->terms.'">'.$row->terms.'</option>
                            <option  value="      "></option>';     
$terms=$this->db->select('*') 
			                ->group_by('terms')		  
			                ->get('terms');
			        foreach ($terms->result()as $terms) 
								             {		
            echo '                <option  value="' . $terms->terms. '">' . $terms->terms . '</option>';                               
                                           }
            echo '      </select>';
 		    echo            '</div>';
			
 echo '          <div class="col-md-4">';
// echo                   '<div class="hidden">';                      ;
 echo '</br>   Billing Info:   </br>';
 echo ' <h5>Address1 </h5><input type="text" name="address1" value="'. $row->address1 .'" class="form-control">';
 echo 'Address2 <input type="text" name="address2" value="'. $row->address2 .'" class="form-control">';
 echo 'County <input type="text" name="County" value="'. $row->County .'"class="form-control">'; 
 echo 'Country <input type="text" name="Country" value="'. $row->Country .'"class="form-control">';
 echo 'postcode <input type="text" name="Post_code" value="'. $row->postcode .'"class="form-control">';


 

            echo '</div>';

        echo ' <div class="col-md-4">';
  echo '</br>   Shipping Info:   </br>';
 echo ' <h5>Address1 </h5><input type="text" name="ship_address1" value="'. $row->ship_address1 .'" class="form-control">';
 echo 'Address2 <input type="text" name="ship_address2" value="'. $row->ship_address2 .'" class="form-control">';
 echo 'County <input type="text" name="ship_County" value="'. $row->ship_County .'"class="form-control">'; 
 echo 'Country <input type="text" name="ship_Country" value="'. $row->ship_Country .'"class="form-control">';
 echo 'postcode <input type="text" name="ship_Post_code" value="'. $row->ship_postcode .'"class="form-control">';
            
        echo '</div>';	
echo '</div>';
echo '</div>';	
}

        
    }

        
function orders_pending(){
$this->load->model('mdl_notifications');
$count = $this->mdl_notifications->orders_pending();
echo $count;

}

function orders_shipped(){
$this->load->model('mdl_notifications');
$count = $this->mdl_notifications->orders_shipped();
echo $count;

}

function invoiced(){
$this->load->model('mdl_notifications');
$count = $this->mdl_notifications->invoiced();
echo $count;
}

function backorder_check(){
    
    
    
}

function monthssales(){
	
	
	
$date =  ''.date(' Y-m-').'1';
$today = mdate(" %Y-%m-%d",  time());
$this->db->select('SUM(inc_vat) as score');
$this->db->where('dateraised >=',$date);
$this->db->where('dateraised <=',$today);
$this->db->where('status','invoiced');
$q=$this->db->get('sales_orders');
$row=$q->row();
$score=$row->score;
    
echo $score;

}




//////

//Warehouse/////////////////


function low_stock() {


$this->db->select('CCL_Item');
$this->db->select('sum(qty) as sum');
$this->db->from('warehouse');
$this->db-> group_by('CCL_Item');
$this->db->having('sum <','10');
//$this->db->where('qty','<9');

$query=$this->db->get();





$num_rows = $query->num_rows();
return $num_rows;
}




function zero_value(){
    
    $this->load->view('zero_stock');
}




//////





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


// customers /////////////////////////////////////////////////
function customers() {
$this->load->model('mdl_notifications');
$count = $this->mdl_notifications->count_where();
echo $count;
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
?>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
//loads datatables
$(document).ready(function() {
     $('#datatable1').dataTable({
         "fnDrawCallback": function( oSettings ) {
      $('.qty').on('keyup', function() {
        $('.hours-table tr').each(function() {
            var hours = $(this).find('input.qty').val();
            var rate = $(this).find('input.av').val();
            var dateTotal = (rate - hours);
			var backord = $(this).find('.backorder').val();
			
			
            if(hours < rate ){
                $(this).find('input.bo').val('0').hide('input.bo');}
            else{
			
                $(this).find('input.bo').val(dateTotal).show('input.bo');
				
                }
        }); //END .each
        return false;
    }); // END click 
      
    }
 }
             
                );
       } );


</script>