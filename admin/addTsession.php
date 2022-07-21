<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Tsession.php';?>

<?php
     $ts = new Tsession();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']) {
     $tsessionInsert = $ts->tsessionInsert($_POST , $_FILES);
  }


?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Packages</h2>
        <div class="block"> 
        <?php
                       if (isset($tsessionInsert)) {
                           echo "$tsessionInsert";
                       }
                   
                   ?>                         
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Trainer Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Trainer Name..." class="medium" name="trainerName"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session No</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session No..." class="medium" name="sessionNo"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Add category</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Category..." class="medium" name="category"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Intro</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Intro..." class="medium" name="sessionIntro"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Price..." class="medium" name="price"/>
                    </td>
                </tr>

				<tr>
                <tr>
                    <td>
                        <label>Session Info-1</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Info-1..." class="medium" name="infoone"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Session Info-2</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Info-2..." class="medium" name="infotwo"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-3</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Info-3..." class="medium" name="infothree"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-4</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Info-4..." class="medium" name="infofour"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-5</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Info-5..." class="medium" name="infofive"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Session Info-6</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Session Info-6..." class="medium" name="infosix"/>
                    </td>
                </tr>
           
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


