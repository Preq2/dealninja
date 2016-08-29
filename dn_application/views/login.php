  <body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php?/home#first"><i class="icon_logo"><img src="<?=base_url() ?>images/icon_logo.png" /></i> DealNinja</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="index.php?/home#one">Intro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php?/home#two">Features</a>
                    </li>                    
                    <li>
                        <a class="page-scroll" href="index.php?/home#three">Plans</a>
                    </li>
                    <!--li>
                        <a class="page-scroll" href="#four">Gallery</a>
                    </li-->

                    <li>
                        <a class="page-scroll" href="index.php?/home#last">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" data-toggle="modal" title="A free Bootstrap video landing theme" href="index.php?/home#aboutModal">About</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>

    
    <section class="bg-primary" id="one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center" style="background:#1d1d1d;">
                <br>
<br>
<br>

                    <h2 class="text-center">Account Login</h2>
                    <h5 class="text-center">
                        Dealers log into your DealNinja account
                    </h5>
                    <div class="col-lg-10 col-lg-offset-1 text-center" style="margin-bottom: 40px;">
                   
                        <form action="index.php?/login" method="post" name="form_login" id="form_login" class="contact-form row">
                        
                        <p id="errmes" class="red">
                        <? if ($bad_login) { ?>
                        <span style="color:#3d3333;">Bad Login! Either the Email or Password you entered is incorrect. Access denied.</span>
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
<div style="clear:both;"></div>
<br>
<p><a href="index.php?/login/password_recovery">forgot password?</a></p>

<p>Still need assistance logging in?<br><a href="index.php?/home#last">Contact customer support.</a></p>   
<br>
<br>
<br>
<br>
<br>
<br>
<br>

                </div>
            </div>
        </div>
    </section>

