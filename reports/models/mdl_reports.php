<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_reports extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'tablename';
return $table;
}

 




function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id){
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function get_stock($c) {


$wh_q=$this->db->select('SUM(qty) as wh_total_qty')
				->where('CCL_Item', $c)
				
				->get('warehouse')  ;
	 $wh_row=$wh_q->row();
     $wh_total_qty=$wh_row->wh_total_qty;			
return $wh_total_qty;
}
function wh_table() {
	
	
	$result =mysql_query('
			SELECT *,SUM(qty) as wh_total_qty
            FROM warehouse 

 group by  `CCL_Item`
 ORDER BY `CCL_Item`  ');
	
	

return $result;
}




function get_soitem($from, $today,$ccl){
      $result =mysql_query('SELECT   a.salesorder_id, u.sales_id, u.CCL_Item,CASE WHEN SUM(u.item_qty) IS NULL THEN 0 ELSE SUM(u.item_qty) END AS soldsum						  
				                                                 FROM sales_orders_items AS u 
						                                         JOIN (SELECT salesorder_id FROM sales_orders WHERE dateraised BETWEEN "'.$from.'" AND "'. $today.'" 
						                                         GROUP BY salesorder_id ) 
														         AS a ON a.salesorder_id = u.sales_id 					    
						                                         WHERE CCL_Item = "'.$ccl.'" 		  
						                                         GROUP BY CCL_Item ');  
																 
					/*$result =mysql_query(' SELECT a.salesorder_id, u.sales_id, u.CCL_Item, 
                              CASE WHEN SUM(u.item_qty) IS NULL THEN 0 ELSE SUM(u.item_qty) END AS soldsum, h.avasum,h.vendors_name,h.Category 
				        FROM sales_orders_items AS u 
						JOIN (SELECT salesorder_id FROM sales_orders WHERE dateraised BETWEEN "'.$from.'" AND "'. $today.'" 
						                                   GROUP BY salesorder_id ) 
														   AS a ON a.salesorder_id = u.sales_id 
					    JOIN (SELECT vendors_name,Category,CCL_Item, SUM(qty) AS avasum 
						      FROM warehouse WHERE vendors_name = "'.$vendor.'"
							  GROUP BY CCL_Item ) 
						      AS h ON h.CCL_Item = u.CCL_Item 
						
						GROUP BY CCL_Item ORDER BY Category ASC'); */
return $result;

}
function get_whitem($from,$ccl){
      $result =mysql_query('SELECT Category ,CCL_Item, vendors_name,
                              CASE WHEN SUM(qty) IS NULL THEN 0 ELSE SUM(qty) END AS avasum 
				        FROM warehouse							  
						WHERE CCL_Item = "'.$ccl.'"	
						GROUP BY CCL_Item ORDER BY CCL_Item ASC');  
																 
					/*$result =mysql_query(' SELECT a.salesorder_id, u.sales_id, u.CCL_Item, 
                              CASE WHEN SUM(u.item_qty) IS NULL THEN 0 ELSE SUM(u.item_qty) END AS soldsum, h.avasum,h.vendors_name,h.Category 
				        FROM sales_orders_items AS u 
						JOIN (SELECT salesorder_id FROM sales_orders WHERE dateraised BETWEEN "'.$from.'" AND "'. $today.'" 
						                                   GROUP BY salesorder_id ) 
														   AS a ON a.salesorder_id = u.sales_id 
					    JOIN (SELECT vendors_name,Category,CCL_Item, SUM(qty) AS avasum 
						      FROM warehouse WHERE vendors_name = "'.$vendor.'"
							  GROUP BY CCL_Item ) 
						      AS h ON h.CCL_Item = u.CCL_Item 
						
						GROUP BY CCL_Item ORDER BY Category ASC'); */
						
		while ($row = mysql_fetch_assoc($result))   
				{
			   $soldsum='';	

	                                        
										 
                                       echo $ccl ;
										// echo $row["CCL_Item"] ;
	                                     echo ",";
	                                   //echo $category;
	                                    echo  $row["Category"] ;
	                                    echo ",";
                                        //echo $vendor;
                                        echo  $row["vendors_name"] ;
	                                    echo ",";
	                                     //02/02/2015
	                                     //echo  substr($from,5,4).'-'.substr($from,2,2).'-'.substr($from,0,2);
	                                    echo $from;
										echo ",";

                                      
										 echo $soldsum;
										
							             echo ",";
	                                           //echo $row["avasum"];
	                                    echo ",";
	
	                                     $avasum=$row["avasum"];
										// echo $avasum;
	                                   
	
	                                    echo ",";
	                                     $est='';   
	                                    echo $est;
	                                    echo ",";
                                        $est_day=''; 										
                                        echo $est_day;	
	                                    echo ",";
	                                    echo "\r\n";
		   }				
						
						
return $row;

}

function get_vendoritem($q){
      $query = $this->db->select('*')->join('warehouse', 'warehouse.vendors_name= vendors.vendor_name')
                               ->join('sales_orders_items', 'sales_orders_items.CCL_Item= warehouse.CCL_Item')
			                  ->where('vendor_id',$q)
							   ->where('sales_orders_items.backorderitem','YES')
							   ->group_by('sales_orders_items.CCL_Item')
							   ->order_by('sales_orders_items.CCL_Item')
                               ->get('vendors'); 
        return $query;

}
function get_bkitem($CCL_Item){
      		

			$result =mysql_query('
			SELECT i.CCL_Item,i.Description,s.Company_name,i.sales_id,s.sales_orders_rev,s.ShipToCompanyName,s.dateraised,s.status as so_status,i.backorderitem, i.item_qty,
                                  w.own
 
            FROM sales_orders_items AS i 

                 LEFT JOIN sales_orders AS s  ON s.salesorder_id = i.sales_id  
                 LEFT JOIN  
                  (SELECT CCL_Item, CASE WHEN SUM(qty) IS NULL THEN 0 ELSE SUM(qty) END AS own FROM warehouse where CCL_Item = "'.$CCL_Item.'"
                   group by  `CCL_Item` ) AS w  ON w.CCL_Item = i.CCL_Item  
 
 WHERE i.backorderitem= "YES "and i.CCL_Item like"'.$CCL_Item.'"
 
 ORDER BY `salesorder_id`  ');
        return  $result;

}
function get_itemtotal($so, $ccl) {
	
	
$no_bkquery=$this->db->select('*')->select('sum(item_qty) as no_bk')
                      ->from('sales_orders_items')
                     ->where('sales_id', $so)
                     ->where('CCL_Item', $ccl)		
	                  ->get();
	$row=$no_bkquery->row();
    $no_bk=$row->no_bk;
	
//$this->db->select('*');
$this->db->select('sum(item_qty) as total');
$this->db->from('sales_orders_items');
$this->db->join('sales_orders','sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db->where('sales_orders_rev', $so);
$this->db->where('CCL_Item', $ccl);
$query=$this->db->get();
$row=$query->row();
$total=$row->total;
    
return $total;

}
function get_itemshipped($so, $ccl) {

$no_bkquery=$this->db->select('*')->select('sum(item_qty) as no_bk')
                      ->from('sales_orders_items')
                     ->where('sales_id', $so)
                     ->where('CCL_Item', $ccl)
					->where('pick', 'YES') 
	                  ->get();
	$row=$no_bkquery->row();
    $no_bk=$row->no_bk;	
	
//$this->db->select('*');
$this->db->select('sum(item_qty) as shipped');
$this->db->from('sales_orders_items');
$this->db->join('sales_orders','sales_orders.salesorder_id = sales_orders_items.sales_id');
$this->db->where('sales_id', $so);
$this->db->where('CCL_Item', $ccl);
$this->db->where('pick', 'YES');
$query=$this->db->get();
$row=$query->row();
$shipped=$row->shipped;
if ( $shipped==null){
	return '0';
}
else	
return $shipped;
}



function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

}