<?php
$hash=$_GET['hash'];
$id=$_GET['id'];
 ?>
<form action="editpass2.php?hash=<?php echo $hash; ?>&id=<?php echo $id;?>" method="post">

  <fieldset class="memberpage">
      <legend>Change your Password</legend>
    
      <div class="clearfix">
        <label for="">Enter New Password:</label>
        <div class="input">
          <input class="xlarge  required" id="xlInput" name="password1" size="100"  type="password" />
        </div>
      </div> <!-- /clearfix -->
      <div class="clearfix">
        <label for="">Re-Enter New Password:</label>
        <div class="input">
          <input class="xlarge  required" id="xlInput" name="password2" size="100"  type="password" />
        </div>
      </div> <!-- /clearfix -->
    
      
      <button type="submit" class="btn primary register_button" name="submit" style="cursor:pointer"> Save </button>
      
   </fieldset>
      </form>
      