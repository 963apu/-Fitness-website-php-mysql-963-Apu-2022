<?php include 'inc/header.php';?>
<?php
      $login = Session::get("cusLogin");
	  if ($login == true) {
		 header("Location:index.php");
	  }
    
?>
     

<?php
					  
					  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
					  $customerLog = $cmr->customerLogin($_POST);
				   }
?>

<style>

    input {
        height: 40px;
        width: 100%;
        margin: 20px auto;
        border-left: none;
        border-right: none;
        border-top: none;
        color: white;
        background: #0b2144;
        padding-left:5px;
        font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: inherit;
    }
    
    button {
        height: 40px;
        width: 100%;
        border-radius: 7px;
        margin-top: 30px;
        margin-bottom: 20px;
        border: none;
        background: #27d4e8;
        color: #ffffff;
        font-family: sans-serif;
        font-weight: 700;
        font-size: 14pt;
        cursor:pointer;
    }
    button:hover{
        background: #138B8B;
        color: #ffff;
    }
    
    form {
        width: 90%;
        margin: 40px auto;
        text-align: center;
        
    }
    
    input:focus {
        outline: none
    }
    
    .logor {
        color: white;
        font-family: sans-serif;
        font-size: 15pt;
        font-weight: 600;
        text-align: center;
        padding-top: 40px
    }
    
    .myform {
        background: #16B0B0;
        width: 40%;
        margin: auto;
        height: 600px;
        -webkit-box-shadow: 0px 0px 3px 1px rgba(38, 35, 128, 1);
        -moz-box-shadow: 0px 0px 3px 1px rgba(38, 35, 128, 1);
        box-shadow: 0px 0px 3px 1px rgba(38, 35, 128, 1);
        padding: 10px 20px;
        margin-top:40px;
    }
    
    .myform a {
        text-decoration: none;
        color: white;
        font-family: sans-serif;
        letter-spacing: .1em;
    }
    
     ::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
         color: #cccccc;
       
    }
.fa-cloud-upload{
  font-size:90px;
  
}
    
    ::-moz-placeholder {
        /* Firefox 19+ */
        color: #cccccc;
          }
    
    :-ms-input-placeholder {
        /* IE 10+ */
         color: #cccccc;
         }
    
    :-moz-placeholder {
        /* Firefox 18- */
        color: #cccccc;
      
    }
  @media screen and (max-width:500px){
        .myform{
            width:80%;
        }
    }
    @media screen and (max-width:800px){
        .myform{
            width:60%;
        }
    }
        

</style>
   
<div class="myform">
<?php
			    if (isset($customerLog)) {
					echo $customerLog;
				} 
			
			?>

    <div class="logor">PLEASE LOG IN!
      <div><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>
  </div>
    <form action="" method="post">
        <input type="email" name="email"  placeholder="&#xf003;   Email" />
        <input type="password" name="password" placeholder=" &#xf023;  Password" />
        <button type="submit" name="login">LOG IN </button>
        <div> <a href="#">Forgot Password?</a> </div>
        <div> <a href="reg.php">Register here</a> </div>
    </form>
</div>


</header>
<?php include 'inc/footer.php';?> 