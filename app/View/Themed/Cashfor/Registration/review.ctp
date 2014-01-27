<div class='row'>
    <div class="span12">
        <h2>Review & Confirm</h2>
        <pre>
            <?php print_r($this->Session->read('Billing')); ?>
        </pre>
    </div>
</div>
<div class="row">
    <div class="span6">
        <h3>Account</h3>
        <table>
            <tr>
                <td>Name:</td>
                <td><?php echo $userinfo['firstname'].' '.$userinfo['lastname'];?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $userinfo['email'];?></td>
            </tr>
            <tr>
                <td rowspan="2" >Address:</td>
                <td rowspan="2"><?php echo $userinfo['address'];?><br>
                <?php echo $userinfo['city'].','.$userinfo['state'].' '.$userinfo['zip'];?><br>
                <?php echo $userinfo['country'];?>
                </td>
            </tr>          
        </table>
    </div>
    <div class="span6">
        <h3>Billing</h3>
        <table>
            <tr>
                <td>Name:</td>
                <td><?php echo $this->Session->read('Billing.firstname').' '.$this->Session->read('Billing.lastname');?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $this->Session->read('Billing.email');?></td>
            </tr>
            <tr>
                <td>Card:</td>
                <td><?php echo $this->Session->read('Billing.ccnum');?></td>
            </tr>
            <tr>
                <td>Exp:</td>
                <td><?php echo $this->Session->read('Billing.ccexpmnth').'/'.$this->Session->read('Billing.ccexpyr');?></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="span12">
	<h3>Items</h3>
	<table>
	    
	</table>
    </div>
</div>
<script src='http://www1.moon-ray.com/v2.4/analytics/tracking.js' type='text/javascript'></script>
<script>
    _mri = "11292_1_2";
    mrtracking();
</script>
