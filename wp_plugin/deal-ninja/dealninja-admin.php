<?php
    global $chk;
    if(isset($_POST['wphw_submit'])){
            dealninja_opt();
    }
    function dealninja_opt(){
        $hellotxt = $_POST['hello-text'];
        global $chk;
        if( get_option('hello_text') != trim($hellotxt)){
            $chk = update_option( 'hello_text', trim($hellotxt));
        }
    }
?>
<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  <h2>Deal Ninja Settings</h2>
  <?php if(isset($_POST['wphw_submit']) && $chk):?>
  <div id="message" class="updated below-h2">
    <p>Content updated successfully</p>
  </div>
  <?php endif;?>
  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Hello content option</strong></h3>
      <form method="post" action="">
        <table class="form-table">
          <tr>
            <th scope="row">Hello Text</th>
            <td><input type="text" name="hello-text" value="<?php echo get_option('hello_text');?>" style="width:350px;" /></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;"><input type="submit" name="wphw_submit" value="Save changes" class="button-primary" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>