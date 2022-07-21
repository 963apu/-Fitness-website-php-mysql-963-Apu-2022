<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Packages.php';?>

<?php
     $pk = new Packages();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
     $packInsert = $pk->packInsert($_POST , $_FILES);
  }


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Packages</h2>
        <div class="block"> 
        <?php
                       if (isset($packInsert)) {
                           echo "$packInsert";
                       }
                   
                   ?>                         
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Package No</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Package Name..." class="medium" name="packName"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Code</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Code..." class="medium" name="sessionNo"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." class="medium" name="price" />
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                    </tr>
				
				<tr>
                    <td>
                        <label>Package Type</label>
                    </td>
                    <td>
                        <select  name="type">
                            <option>Select Type</option>
                            <option value="0">Standard</option>
                            <option value="1">Premium</option>
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


