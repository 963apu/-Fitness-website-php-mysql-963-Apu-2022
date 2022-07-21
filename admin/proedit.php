<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>

<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
    header("Location:productlist.php");
}else{

    $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['proid']);
}


     $pd = new Product();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
     $productUpdate = $pd->productUpdate($_POST , $_FILES, $id);
  }


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            
              <?php
                       if (isset($productUpdate)) {
                           echo "$productUpdate";
                       }
                   
                   ?>

                   <?php
                      $getPro = $pd->getProById($id);
                      if ($getPro) {
                        while ($value = $getPro->fetch_assoc()) {
                         
                   
                   ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php  echo $value['productName'];?>" class="medium" />
                    </td>
                </tr>
		
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce"  name="body"><?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'];?>" height="80px" weight="50px"><br>
                        <input type="file" name="image" />
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


