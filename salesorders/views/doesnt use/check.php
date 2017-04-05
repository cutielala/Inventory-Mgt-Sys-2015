<?php
echo $id;
 foreach ($order_items->result() as $items) {
    
}

$backorder = $items->item_qty - $items->qty;
$new_qty = $items->item_qty - $backorder;
 if ($items->qty < $items->item_qty) {
     
     echo 'backorder required';
 }
                                                             
?>
