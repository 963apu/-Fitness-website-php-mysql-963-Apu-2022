<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Tsession.php';?>
<?php

if (!isset($_GET['editTsessid']) || $_GET['editTsessid'] == NULL) {
     header("Location:Tsessionlist.php");
}else{

    $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['editTsessid']);
}?>

<?php
     $ts = new Tsession();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
     $tsessUpdate = $ts->tsessUpdate($_POST , $_FILES, $id);
  }


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Training Session</h2>
        <div class="block"> 
        <?php
                       if (isset($tsessUpdate)) {
                           echo "$tsessUpdate";
                       }
                   
                   ?>  
                   <?php
                      $getTsess= $ts->getTsessById($id);
                      if ($getTsess) {
                        while ($value = $getTsess->fetch_assoc()) {
                         
                   
                   ?>                              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Trainer Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['trainerName'];?>" class="medium" name="trainerName"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session No</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['sessionNo'];?>" class="medium" name="sessionNo"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['category'];?>" class="medium" name="category"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Intro</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['trainerIntro'];?>" class="medium" name="sessionIntro"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['price'];?>" class="medium" name="price"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Info-1</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['infoone'];?>" class="medium" name="infoone"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Info-2</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['infotwo'];?>" class="medium" name="infotwo"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-3</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['infothree'];?>" class="medium" name="infothree"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-4</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['infofour'];?>" class="medium" name="infofour"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-5</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['infofive'];?>" class="medium" name="infofive"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-6</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $value['infosix'];?>" class="medium" name="infosix"/>
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