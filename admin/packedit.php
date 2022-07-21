<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Packages.php';?>

<?php

if (!isset($_GET['editpackid']) || $_GET['editpackid'] == NULL) {
     header("Location:packagelist.php");
}else{

    $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['editpackid']);
}?>

<?php
     $pk = new Packages();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
     $packUpdate = $pk->packUpdate($_POST , $_FILES, $id);
  }


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Packages</h2>
        <div class="block"> 
        <?php
                       if (isset($packUpdate)) {
                           echo "$packUpdate";
                       }
                   
                   ?>  
                   <?php
                      $getPack = $pk->getPackById($id);
                      if ($getPack) {
                        while ($value = $getPack->fetch_assoc()) {
                         
                   
                   ?>                         
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Pack Type</label>
                    </td>
                    <td>
                        <input type="text" value="<?php  echo $value['packName'];?>" class="medium" name="packName"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Code</label>
                    </td>
                    <td>
                        <input type="text" value="<?php  echo $value['sessionNo'];?>" class="medium" name="sessionNo"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['price'];?>" class="medium" name="price" />
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"><?php echo $value['body'];?></textarea>
                    </td>
                    </tr>
				
				<tr>
                    <td>
                        <label>Package Type</label>
                    </td>
                    <td>
                        <select  name="type">
                            <option>Select Type</option>
                            <?php
                             if($value['type'] == 0){ ?>
                            <option selected="selected" value="0">Standard</option>
                            <option value="1">Premium</option>
                           
                           <?php  } else { ?>
                               
                               <option selected="selected" value="1">Premium</option>
                               <option value="0">Standard</option>
                            
                         <?php  }    ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } }?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


