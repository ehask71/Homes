<div class="span10">
<h2>Leads</h2>
<table class="table table-striped table-bordered table-condensed">
    <thead>
	<tr>
	    <th><?php echo $this->Paginator->sort('firstname', 'First Name'); ?></th>
            <th><?php echo $this->Paginator->sort('lastname', 'Last Name'); ?></th>
	    <th><?php echo $this->Paginator->sort('city', 'City'); ?></th>
	    <th><?php echo $this->Paginator->sort('state', 'State'); ?></th>
	    <th><?php echo $this->Paginator->sort('zip', 'Zip'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php if(count($data) > 0){?>
	<?php foreach($data AS $row){?>
	<tr>
            <td><?php echo $row['Lead']['firstname'];?></td>
	    <td><?php echo $row['Lead']['lastname'];?></td>
	    <td><?php echo $row['Lead']['city'];?></td>
	    <td><?php echo $row['Lead']['state'];?></td>
	    <td><?php echo $row['Lead']['zip'];?></td>
	</tr>
	<?php } ?>
	<?php } else { ?>
	<tr>
	    <td colspan="5">No Leads</td>
	</tr>
	<?php } ?>
    </tbody>
    
</table>
</div>