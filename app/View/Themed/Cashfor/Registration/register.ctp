<div class='row'>
    <div class="span12">
        <h2>Register</h2>
        <?php
        echo $this->Form->create(null, array(
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        ));
        echo $this->Form->input('firstname', array('label' => array('text' => 'Firstname', 'class' => 'control-label')));
        echo $this->Form->input('lastname', array('label' => array('text' => 'Lastname', 'class' => 'control-label')));
        echo $this->Form->input('address', array('label' => array('text' => 'Address', 'class' => 'control-label')));
        echo $this->Form->input('address2', array('label' => array('text' => 'Address 2', 'class' => 'control-label')));
        echo $this->Form->input('city', array('label' => array('text' => 'City', 'class' => 'control-label')));
        echo $this->Form->input('state', array('type' => 'select', 'options' => Configure::read('States'), 'label' => array('text' => 'State', 'class' => 'control-label')));
        echo $this->Form->input('zip', array('label' => array('text' => 'Zip', 'class' => 'control-label')));
        echo $this->Form->input('country', array('type' => 'select', 'options' => Configure::read('Countries'), 'label' => array('text' => 'Country', 'class' => 'control-label')));
        echo $this->Form->input('phone', array('type' => 'text', 'label' => array('text' => 'Phone', 'class' => 'control-label')));
        echo $this->Form->input('email', array('label' => array('text' => 'Email', 'class' => 'control-label')));
        echo $this->Form->input('password', array('label' => array('text' => 'Password', 'class' => 'control-label')));
        echo $this->Form->input('confirm_password', array('type' => 'password','label' => array('text' => 'Confirm Password', 'class' => 'control-label')));
        echo $this->Form->input('agreeterms', array('type' => 'checkbox', 'value' => 1, 'label' => array('text' => 'I agree to the <a href="/terms" target="_blank">Terms & Conditions</a>', 'class' => 'control-label')));
        echo $this->Form->end('Register');
        ?>
    </div>
</div>
<script src='http://www1.moon-ray.com/v2.4/analytics/tracking.js' type='text/javascript'></script>
<script>
    _mri = "11292_1_2";
    mrtracking();
</script>
