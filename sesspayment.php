<?php include 'inc/header.php';?>


<?php
      $login = Session::get("cusLogin");
	  if ($login == false) {
		 header("Location:login.php");
	  }
    
?>
<style>
    .payment{
        width:500px;
        min-height: 200px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 auto;
        padding: 50px;

    }
    .payment h2{
        border-bottom:  1px solid #ddd;
        margin-bottom:40px;
        padding-bottom: 10px;

    }
    .payment a{
        background: #0CB58D none repeat scroll 0 0;
        color: #fff;
        font-size: 18px;
        padding: 5px 10px;
        border-radius: 6px;


}
.payment a:hover{
        background: #fff;
        color:#808080;

}
.back{
    width:120px;
    margin: 5px auto 0;
    padding: 7px 0;
    text-align: center;
    display: block;
    background:#286B64;
    border: 1px solid #333;
    color:#fff;
    font-size: 16px;
    border-radius: 6px;

}
.back:hover{
    background:#808080 ;
    color: #286B64;
}

</style>

<div class="main">
   <div class="content">
       <div class="section group">
             <div class="payment">
                 <h2>Choose Your Payment Option</h2>
                 <a href="sesspayoffline.php">Offline Payment</a>
                 <a href="online.php"> Online Payment</a>
             </div>
             <div class="back">
                  <a href="cart.php">Previous</a>
             </div>
       </div>

   </div>

</div>

<?php include 'inc/footer.php';?> 