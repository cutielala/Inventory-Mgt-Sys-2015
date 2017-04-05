<?php

foreach ($status->result() as $stat) {
    
}

if ($stat->status === 'pending') {
    echo '<button class="btn btn-info"data-toggle="dropdown">
     <span class="caret"></span>
 <i class="fa fa"></i> Pending</button>
 <ul class="dropdown-menu" role="menu">
 <li><form action="'.  base_url().'status/update">
        <input type="hidden" name="id" value="'.$this->uri->segment(3).'"/>
        <input type="hidden" name="status" value="shipped"/>
<button type="submit">Shipped</button>
</form></li>

  </ul>';
}
if ($stat->status === 'shipped') {

    echo '<button class="btn btn-primary" data-toggle="dropdown">
     <span class="caret"></span>
        <i class="fa fa"></i> Shipped</button>
        <ul class="dropdown-menu" role="menu">
    <li><form action="'.  base_url().'status/update" menthod="POST">
        <input type="hidden" name="id" value="'.$this->uri->segment(3).'"/>
        <input type="hidden" name="status" value="invoiced"/>
<button type="submit">Invoice</button></form></li>

  </ul>';
}
if ($stat->status === 'invoiced') {

    echo '<button class="btn btn-success"><i class="fa fa-check"></i> Invoiced</button>';
}
if ($stat->status === 'cancelled') {

    echo '<button class="btn btn-danger"><i class="fa fa"></i> Cancelled</button>';
}
?>