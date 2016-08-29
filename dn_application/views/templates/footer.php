    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Information</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Products</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Benefits</a></li>
                        <li><a href="">Developers</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                    <h4>About</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 column">
                    <!--h4>Stay Posted</h4>
                    <form>
                        <div class="form-group">
                          <input type="text" class="form-control" title="No spam, we promise!" placeholder="Tell us your email">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#alertModal" type="button">Subscribe for updates</button>
                        </div>
                    </form-->
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Follow</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" href="" title="Twitter"><i class="icon-lg ion-social-twitter-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Facebook"><i class="icon-lg ion-social-facebook-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Dribble"><i class="icon-lg ion-social-dribbble-outline"></i></a></li>
                    </ul>
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small"><!--a href="http://www.bootstrapzero.com">Landing Zero by BootstrapZero</a--> &copy;<?=date('Y') ?> DealNinja</span>
        </div>
    </footer>
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body">
        		<img src="//placehold.it/1200x700/222?text=..." id="galleryImage" class="img-responsive" />
        		<p>
        		    <br/>
        		    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
        		</p>
        	</div>
        </div>
        </div>
    </div>
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">DealNinja</h2>
        		<h5 class="text-center">
        		    Right Car, Right Bank, 10 seconds. 
        		</h5>
        		<p class="text-justify">
        		    DealNinja was designed with 3 goals: 

1) Shorten the time it takes to buy a car 
2) Make sure your selling the right car
3) Make sure you select the best bank. 

If you land your customer on too much car you will be fighting payment, customer will be frustrated and everyone loses. It is designed to show customers the right car and finance that car thru the best bank. DealNinja sorts every car in inventory, new and used, by payment, and gross, both front and back. The sort is customized to your customers beacon and income. We will track every bank you use, from the Nationwide banks to your local credit union. You will always have the most up to date rates, terms, and programs at your fingertips. Never look at a rate sheet again. 
        		</p>
        		
        		<br/>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> OK </button>
        	</div>
        </div>
        </div>
    </div>
    
    <div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">Account Login</h2>
        		<h5 class="text-center">
        		    Dealers log into your DealNinja account
        		</h5>
        		<div class="col-lg-10 col-lg-offset-1 text-center" style="margin-bottom: 40px;">
               
                    <form action="index.php?/login" method="post" name="form_login" id="form_login" class="contact-form row">
                    
                	<p id="errmes" class="red" style="color:#3d3333;">
					<? if ($bad_login) { ?>
                    Bad Login! Either the Email or Password you entered is incorrect. Access denied.
                    <? } ?>
                    </p>                    
                        <div class="col-md-6">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                        </div>
                        <div class="col-md-6">
                            <label></label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="button" id="login_submit" name="login_submit" class="btn btn-primary btn-block btn-lg" onclick="val_login();">Login <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                </div>
        		<br/>
                <div style="clear:both;"></div>
                <div style="text-align:center;">
<p><a href="index.php?/login/password_recovery">forgot password?</a></p>

<p>Still need assistance logging in? <a href="index.php?/home#last">Contact customer support.</a></p>  
</div>  
        		<br/>
                <br/>               
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> CLOSE </button>
        	</div>
        </div>
        </div>
    </div>
        
    <div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">Nice Job!</h2>
        		<p class="text-center">You clicked the button, but it doesn't actually go anywhere because this is only a demo.</p>
        		<br />

        		<br/>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK <i class="ion-android-close"></i></button>
        	</div>
        </div>
        </div>
    </div>
    <!--scripts loaded here from cdn for performance -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    <script src="<?=base_url() ?>js/website/scripts.js"></script>
  </body>
</html>