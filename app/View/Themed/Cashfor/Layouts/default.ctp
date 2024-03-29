<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cash For Homes - </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php echo $this->Html->css('bootstrap'); ?>
        <?php echo $this->Html->css('style'); ?>
        <link href='http://fonts.googleapis.com/css?family=Oswald|Open+Sans:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!-- Header - Logo -->
        <div class="container">
            <div class="row">
                <div class="span5" id="logo"></div>
                <div class="span4" id="tel-number">800.225.CASH</div>
                <div class="span3" id="investors">
                    <?php echo $this->element('loginbox', array('loggedIn'=>$loggedIn,'user'=>$userinfo));?>
                </div>
            </div>
        </div>
        <!-- CTA -->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="rf-lean">
                    <div id="hdr-cta">
                        <h3 id="hdr-inner-cta">Fast Close &middot; No Fees  &middot; No Commission &middot; Any Reason &middot; Any Condition</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- nav -->
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    Menu
                                </a>
                                <div class="nav-collapse">  
                                    <ul class="nav">
                                        <li>
                                            <a href="/" class="nav-home"><span>Home</span></a>
                                        </li>
                                        <li><a href="/sell" class="nav-sell"><span>Sell</span></a></li>
                                        <li><a href="/buy" class="nav-buy"><span>Buy</span></a></li>
                                        <li><a href="/why-us" class="nav-why"><span>Why Us</span></a></li>
                                        <li><a href="/contact" class="nav-contact"><span>Contact</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start body -->
        <div class="container-fluid" id="home-wrapper">
            <div class="row-fluid">
                <div class="non-fluid">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <!-- start footer -->
        <div class="container-fluid" id="footer-wrapper" >
            <div class="row-fluid" id="footer-content">
                <div class="non-fluid">
                    <div class="span2">
                        <ul id="footer-nav">
                            <li><a href="/" title="Return to Cash for Homes Home Page">Home</a></li>
                            <li><a href="/sell" title="Sell with Cash for Homes Page">Sell</a></li>
                            <li><a href="/buy.php" title="Buy with Cash for Homes Page">Buy</a></li>
                            <li><a href="/why-us" title="Why work with Cash for Homes Page">Why Us?</a></li>
                            <li><a href="/contact" title="Contact Cash for Homes Page">Contact</a></li>
                            <li><a href="/tos" title="Cash for Homes terms of Service Page">Terms of Service</a></li>
                            <li><a href="/privacy" title="Cash for Homes Privacy Statement Page">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="span7">
                        <div class="footer-text">
                            <?php if(isset($popular_counties)){echo $popular_counties;}?> 
                        </div>
                    </div>
                    <div class="span3">
                        <ul id="footer-info">
                            <li class="hdr">CashForHomes.com</li>
                            <li id="footer-address">1212 Busch Blvd<br />
                                Ste 111<br />
                                Tampa, FL 33624</li>
                            <li id="footer-phone">
                                800-225-CASH<br />
                                813-555-1212
                            </li>
                            <li id="footer-email"><a href="mailto:info@cashforhomes.com" title="Email Us">info@cashforhomes.com</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--	copyright -->
        <div class="container">
            <div class="row">
                <div class="span12" id="copyright">
                    © CashForHomes.com 2013 All Rights Reserved <br />
                    Cash For Homes® and CashForHomes.com® are registered trademarks of <a href="//reibrands.com" title="Link to REI BRANDS">REI Brands</a>
                </div>
            </div>
        </div>		
        <?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>
        <?php echo $this->Html->script('bootstrap'); ?>
        <?php echo $this->fetch('scriptBottom'); ?>
    </body>
</html>