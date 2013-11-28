<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title><?php echo Configure::read('Sitename'); ?></title>
        <meta name="description" content="">
        <meta name="author" content="High Octane Brands">
        <meta name="keyword" content="">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <?php
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('style');
        echo $this->Html->css('style-responsive');
        echo $this->Html->css('//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext');
        ?>
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <?php echo $this->Html->css('css/ie'); ?>
        <![endif] -->
        <!--[if IE 9]>
        <?php echo $this->Html->css('ie9'); ?>
        <![endif]-->
        <!-- start: Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- end: Favicon -->
    </head>
    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/admin/home"><span><?php echo Configure::read('Sitename'); ?></span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            <!-- end: Message Dropdown -->
                            <li>
                                <a class="btn" href="#">
                                    <i class="halflings-icon white wrench"></i>
                                </a>
                            </li>
                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo $userinfo['firstname'] . ' ' . $userinfo['lastname']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="/account/"><i class="halflings-icon user"></i> Profile</a></li>
                                    <li><a href="/logout"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">
                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="/admin/home/dashboard"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                            <li><a href="/admin/account/users"><i class="icon-user"></i> Members</a></li>

                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <!-- start: Content -->
                <div id="content" class="span10">

                    <?php
                    echo $this->Html->getCrumbsList(array('class'=>'breadcrumb'), array(
                        'text' => '<i class="icon-home"></i>
                            <a href="/admin/dashboard">Home</a> 
                            <i class="icon-angle-right"></i>',
                        'url' => '/admin/dashboard/',
                        'escape' => false
                    ));
                    ?>
                    <!--<ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a> 
                            <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Dashboard</a></li>
                    </ul>-->
                    <?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->fetch('content'); ?>
                </div><!--/#content.span10-->
            </div><!--/fluid-row-->

            <div class="modal hide fade" id="myModal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">Ã—</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary">Save changes</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <footer>
                <p>
                    <span style="text-align:left;float:left">&copy; <a href="#" target="_blank"><?php echo Configure::read('Sitename'); ?></a> 2013</span>
                    <span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://highoctanebrands.com" target="_blank">High Octane Brands LLC</a></span>
                </p>

            </footer>

            <!-- start: JavaScript-->
            <?php
            echo $this->Html->script('jquery-1.9.1.min');
            echo $this->Html->script('jquery-migrate-1.0.0.min');
            echo $this->Html->script('jquery-ui-1.10.0.custom.min');
            echo $this->Html->script('jquery.ui.touch-punch');
            echo $this->Html->script('modernizr');
            echo $this->Html->script('bootstrap.min');

            echo $this->Html->script('jquery.cookie');

            echo $this->Html->script('fullcalendar.min');

            echo $this->Html->script('jquery.dataTables.min');

            echo $this->Html->script('excanvas');
            echo $this->Html->script('jquery.flot');
            echo $this->Html->script('jquery.flot.pie');
            echo $this->Html->script('jquery.flot.stack');
            echo $this->Html->script('jquery.flot.resize.min');
            echo $this->Html->script('jquery.flot.time');

            echo $this->Html->script('jquery.chosen.min');

            echo $this->Html->script('jquery.uniform.min');

            echo $this->Html->script('jquery.cleditor.min');

            echo $this->Html->script('jquery.noty');

            echo $this->Html->script('jquery.elfinder.min');

            echo $this->Html->script('jquery.raty.min');

            echo $this->Html->script('jquery.iphone.toggle');

            echo $this->Html->script('jquery.uploadify-3.1.min');

            echo $this->Html->script('jquery.gritter.min');

            echo $this->Html->script('jquery.imagesloaded');

            echo $this->Html->script('jquery.masonry.min');

            echo $this->Html->script('jquery.knob.modified');

            echo $this->Html->script('jquery.sparkline.min');

            echo $this->Html->script('counter');

            echo $this->Html->script('retina');

            echo $this->Html->script('custom');
            echo $this->Html->script('sitescripts');
            echo $this->fetch('script');
            ?>
            <!-- end: JavaScript-->

    </body>
</html>