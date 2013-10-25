<div class="row">
    <div class="span4 offset4" style="padding-top: 50px;padding-bottom: 50px;">
        <div id="form-container">
            <div id="form-wrapper">
                <div id="form-content">
                    <h2>Login</h2>
                    <?php
                    echo $this->Form->create(null, array(
                        'class' => 'form-horizontal',
                        'inputDefaults' => array(
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label'),
                            'class' => array('class' => 'span12'),
                            'between' => '<div class="controls">',
                            'after' => '</div>',
                            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                    )));
                    echo $this->Form->input('email');
                    echo $this->Form->input('password');
                    echo $this->Form->end('Login');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>