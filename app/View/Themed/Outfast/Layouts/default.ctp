<!DOCTYPE html>
<html>
    <head>
        <title>1-800-OUT-FAST</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
         <?php echo $this->Html->css('bootstrap');?>
	<?php echo $this->Html->css('style');?>
    </head>
    <body>
         <div class="container" id="content-wrapper-top">
             
                <div class="row" id="header-wrapper">
                    
                    <div class="span6 pushright clearfix" style="text-align: center;">
                        <div id="investor-login">
                            <span>Investors</span> <a href="login.php" title="Investor's Login to your account">Login</a> | <a href="register.php" class="signup" title="Investor's sign up with 1-800-Out-Fast">Signup</a>
                        </div>
                        <div class="bigwhite">
                            <h1 class="visible-desktop">We'll Give you CASH<br>
                            to get OUT FAST!</h1>
                        </div>
                    </div>
                    <div class="span6">
                        <div id="logo">
                            <a href="/" title="1-800-out-fast, cash for your home, home page"><span><h1>1-800-out-fast home page</h1></span></a>
                        </div>
                    </div>
                </div>
         </div>
             <div class="container" id="content-wrapper-mid">
                 <div class="row">
                     <div class="span12" id="primary-cta">
                         <img src="img/callout-sml.jpg" alt="Accept our cash offer for your home and get paid. Start Here." />
                     </div>
                 </div>    
             <div class="row" >
                    <div class="span6 pushright">
                        <div id="form-wrapper">
                            <div class="form-container">
                                <form action="/sell" class="form-inline" id="ZipCodesIndexForm" method="post" accept-charset="utf-8">
                                    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                                    
                                        <input name="data[ZipCodes][ffname]" class="input-large" type="text" id="ZipCodesFfname" placeholder="First Name">
                                        <input name="data[ZipCodes][flname]" class="input-large" type="text" id="ZipCodesFlname" placeholder="Last Name">
                                        <input name="data[ZipCodes][fphone]" class="input-large" type="text" id="ZipCodesFphone" placeholder="Phone">
                                        <input name="data[ZipCodes][femail]"  class="input-block-level" type="text" id="ZipCodesFemail" placeholder="Email Address">
                                    
                                        <input name="data[ZipCodes][faddress]" class="input-block-level" type="text" id="ZipCodesFaddress" placeholder="Street Address">
                                        <input name="data[ZipCodes][city]" class="input-block-level" type="text" id="ZipCodesFcity" placeholder="City">
                                        <input name="data[ZipCodes][state]" class="input-block-level" type="text" id="ZipCodesFState" placeholder="State">
                                    <input name="data[ZipCodes][fzip]" class="input-block-level" type="text" id="ZipCodesFzip" placeholder="Zip">
                                    <div class="clearfix">
                                        <button type="submit" name="submit" class="big-green-offer"><span>Submit</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="cta-cf4">
                            
                            <img src="img/c4h-cta-large.png" >
                        
                        </div>
                    </div>
                    <div class="span6">
                        <div id="video-container">
                            <iframe src="//www.youtube.com/embed/gZNlGvIwWs4" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="watch-video-cta visible-desktop">
                            <img src="img/watch-video.png" >
                        </div>
                    </div>
             </div>
                 <div class="row">
                     <div class="span12">
                         <p class="justified">
                             Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                         </p>
                          <p class="justified">
                             Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                         </p>
                     </div>
                 </div>
                 <div class="row">
                     <div class="span12">
                         <div id="as-seen">
                             <img src="img/aso-tv.png" title="As seen on TV">
                             <img src="img/aso-tv.png" title="As seen on TV">
                             <img src="img/aso-tv.png" title="As seen on TV">
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="span12">
                         <h3 class="lined"><span>What Are People Saying?</span>
                         <hr class="hidden-phone" />
                         </h3>
                     </div>
                 </div>
                 <div class="row">
                     <div class="span12">
                         <p class="testimonial">
                             Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                         
                         </p>
                         <div>
                             <span class="test-name">John Doe</span><br />
                             <span class="test-city">Tampa, Fl</span>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="span12">
                         <p class="testimonial">
                             Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                         
                         </p>
                         <div>
                             <span class="test-name">John Doe</span><br />
                             <span class="test-city">Tampa, Fl</span>
                         </div>
                     </div>
                 </div>
          </div>
        <!-- start footer -->
	<div class="container-fluid" id="footer-wrapper" >
		<div class="row-fluid" id="footer-content">
			<div class="non-fluid">
				<div class="span2">
					<ul id="footer-nav">
						<li><a href="/" title="Return to 1800OUTFAST.com Home Page">Home</a></li>
						<li><a href="/sell" title="Sell with 1800OUTFAST.com Page">Sell</a></li>
						<li><a href="buy" title="Buy with 1800OUTFAST.com Page">Buy</a></li>
						<li><a href="/why-us" title="Why work with 1800OUTFAST.com Page">Why Us?</a></li>
						<li><a href="/contact" title="Contact 1800OUTFAST.com Page">Contact</a></li>
						<li><a href="/tos" title="1800OUTFAST.com terms of Service Page">Terms of Service</a></li>
						<li><a href="/privacy" title="1800OUTFAST.com Privacy Statement Page">Privacy Policy</a></li>
					</ul>
				</div>
				<div class="span7">
					<div class="footer-text">
					<?php if(isset($popular_counties)){echo $popular_counties;}?> 
					</div>
				</div>
				<div class="span3">
					<ul id="footer-info">
						<li class="hdr">1800OUTFAST.com</li>
						<li id="footer-address">1212 Busch Blvd<br />
						Ste 111<br />
						Tampa, FL 33624</li>
						<li id="footer-phone">
							800-225-CASH<br />
							813-555-1212
						</li>
						<li id="footer-email"><a href="mailto:info@1800outfast.com" title="Email Us">info@1800outfast.com</a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
		<!--	copyright -->
	<div class="container">
		<div class="row">
			<div class="span12" id="copyright">
				© 1800OUTFAST.com 2013 All Rights Reserved <br />
Cash For Homes® and 1800OUTFAST.com® are registered trademarks of <a href="//reibrands.com" title="Link to REI BRANDS">REI Brands</a>
			</div>
		</div>
	</div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        

        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
