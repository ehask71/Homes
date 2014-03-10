<div class="row">
    <div class="span4 offset4" style="padding-top: 50px;padding-bottom: 50px;min-height: 500px;">
        <div id="form-container">
            <div id="form-wrapper">
                <div id="form-content">
                    <h2>Login</h2>
                    <?php
                     echo $this->Form->create('BoostCake', array(
                        'inputDefaults' => array(
                            'div' => 'form-group',
                            'label' => array(
                                'class' => 'col col-md-3 control-label'
                            ),
                            'wrapInput' => 'col col-md-9',
                            'class' => 'form-control'
                        ),
                        'class' => 'well form-horizontal'
                    ));

                    echo $this->Form->input('email');
                    echo $this->Form->input('password');
                    ?>
                    <div class="form-group">
		<?php echo $this->Form->submit('Sign in', array(
			'div' => 'col col-md-9 col-md-offset-3',
			'class' => 'btn btn-default'
		)); ?>
	</div>
                    <?php echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>