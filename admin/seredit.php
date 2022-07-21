<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Service.php';?>

<?php

if (!isset($_GET['serid']) || $_GET['serid'] == NULL) {
   // header("Location:servicelist.php");
}else{

    $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['serid']);
}?>

<?php
     $sv = new Service();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
     $serviceUpdate = $sv->serviceUpdate($_POST , $_FILES, $id);
  }


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Service</h2>
        <div class="block">
        <?php
                       if (isset($serviceUpdate)) {
                           echo "$serviceUpdate";
                       }
                   
                   ?>     
                    <?php
                      $getSer = $sv->getSerById($id);
                      if ($getSer) {
                        while ($value = $getSer->fetch_assoc()) {
                         
                   
                   ?>          
         <form action="" method="post" >
            <table class="form">
               
                <tr>
                    <td>
                        <label>Delivery</label>
                    </td> 
                    <td>
                        <input type="text" value="<?php  echo $value['delivery'];?>" class="medium" name="delivery" />
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
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['price'];?>" class="medium" name="price" />
                    </td>
                </tr>
            
                
				
				<tr>
                    <td>
                        <label>Service Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
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
            <?php } } ?>
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


