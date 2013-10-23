<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
    	<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php
	echo $this->fetch('meta');
	echo $this->Html->meta('icon');

	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap-responsive');
	
	echo $this->fetch('css');
	echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
	echo $this->fetch('script');
?>

    <!-- Le styles -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
	
	<?php echo $this->element('navbar',array('loggedIn'=>$loggedIn)); ?>

    <div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('auth'); ?>
		<div class="span3">
	    
		</div>
		<?php echo $this->fetch('content'); ?>
		<hr>
		<footer>
                    <p>&copy; <?php echo Configure::read('Copyright');?></p>
      	</footer>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php 
    echo $this->Html->script('bootstrap-transition.js');
    echo $this->Html->script('bootstrap-alert.js');
    echo $this->Html->script('bootstrap-modal.js');
    echo $this->Html->script('bootstrap-dropdown.js');
    echo $this->Html->script('bootstrap-scrollspy.js');
    echo $this->Html->script('bootstrap-tab.js');
    echo $this->Html->script('bootstrap-tooltip.js');
    echo $this->Html->script('bootstrap-popover.js');
    echo $this->Html->script('bootstrap-button.js');
    echo $this->Html->script('bootstrap-collapse.js');
    echo $this->Html->script('bootstrap-carousel.js');
    echo $this->Html->script('bootstrap-typeahead.js');
    ?>

  </body>
</html>
