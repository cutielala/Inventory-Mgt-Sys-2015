<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
            <td width = "7%">Shipment Date</td>
            <td width = "7%">Contact Name</td>
            <td width = "7%">Organisation</td>
            <td width = "7%">Address Line 1</td>
            <td width = "7%">Address Line 2</td>
            <td width = "7%">Address Line 3</td>
            <td width = "7%">Address Line 4</td>
            <td width = "7%">Postcode</td>
             <td width = "7%">Country Code</td>
            <td width = "7%">Service Code</td>
            <td width = "7%">No. Parcels</td>
            <td width = "7%">Total Weight</td>
            <td width = "7%">Contact Telephone</td>
            <td width = "7%">Customer Ref 1</td>
           
    </tr>

            <?php foreach($csvData as $field){?>
                <tr>
                    <td><?php echo $field['Shipment Date']?></td>
                    <td><?php echo $field['Contact Name']?></td>
                    <td><?php echo $field['Organisation']?></td>
                    <td><?php echo $field['Address Line 1']?></td>
                    <td><?php echo $field['Address Line 2']?></td>
                    <td><?php echo $field['Address Line 3']?></td>
                    <td><?php echo $field['Address Line 4']?></td>
                    <td><?php echo $field['Postcode']?></td>
                    <td><?php echo $field['Country Code']?></td>
                    
                    <td><?php echo $field['Service Code']?></td>
                    
                    <td><?php echo $field['No. Parcels']?></td>
                    <td><?php echo $field['Total Weight']?></td>
                    
                    <td><?php echo $field['Contact Telephone']?></td>
                    <td><?php echo $field['Customer Ref 1']?></td>
                          
                         
                </tr>
            <?php }?>
</table>