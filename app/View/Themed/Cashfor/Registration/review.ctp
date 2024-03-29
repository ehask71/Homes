<div class='row'>
    <div class="span12">
        <h2>Review & Confirm</h2>
    </div>
</div>
<div class="row">
    <div class="span6">
        <h3>Account</h3>
        <table class="table table-bordered">
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
        <table class="table table-bordered">
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
	<h3>Counties</h3>
        <table width="75%" class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th>County</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
	    <?php
                if(count($shop['OrderItem']) > 0){
                    foreach($shop['OrderItem'] as $item){
                        echo '<tr>';
                        echo '<td>' . $item['name'] . '</td>';
                        echo '<td>$' . $item['price'] . '</td>';
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td style="text-align:right">Setup Fee:</td>';
                    echo '<td>$'.sprintf('%0.2f', Configure::read('Setupfee')).'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td style="text-align:right">Total:</td>';
                    echo '<td>$'.sprintf('%0.2f', ($shop['Order']['total'] + (int)Configure::read('Setupfee'))).'</td>';
                    echo '</tr>';
                } else {
                    echo '<tr>';
                    echo '<td colspan="100">No Items Selected</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
	</table>
    </div>
</div>
<div class="row">
    <div class="span9"></div>
    <div class="span3">
        <?php echo $this->Form->postButton('Confirm & Pay', '/registration/review', array('class'=>'btn btn-primary btn-large'));?>
    </div>
</div>
<script src='http://www1.moon-ray.com/v2.4/analytics/tracking.js' type='text/javascript'></script>
<script>
    _mri = "11292_1_2";
    mrtracking();
</script>
