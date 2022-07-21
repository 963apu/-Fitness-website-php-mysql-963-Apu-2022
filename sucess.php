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
   /* .payment a{
        background: #0CB58D none repeat scroll 0 0;
        color: #fff;
        font-size: 18px;
        padding: 5px 30px;
        border-radius: 6px;

}
.payment a:hover{
        background: #fff;
        color:#808080;

}*/
.back{
    width:120px;
    margin: 5px auto 0;
    padding: 7px 0;
    text-align: center;
    display: block;
    background:#F7F25B;
    border: 1px solid #333;
    color:#fff
    border-radius: 6px;
    font-size: 16px;

}
.back:hover{
    background: #fff;
    color:#808080;
}

</style>

<div class="main">
   <div class="content">
       <div class="section group">
             <div class="payment">
             <?php
                   $cmrId = Session::get("cmrId");
                   $amount = $ct->payableAmount($cmrId);
                  if($amount) {
                       $sum = 0;
                       while ($result = $amount->fetch_assoc()) {
                          $price = $result['price'];
                          $sum = $sum+$price;
                      }
                    
                    }  
                   
                ?>
                 <h2 class="success" style="color:green;">Sucess!!</h2>
                 <p>Total Payable Amount : 
                 <?php
                     $vat = $sum * 0.1;
                     $total = $vat+$sum;
                     echo $total;
                   
                  ?>
                 </p>
                 <p>Thanks for chosing our Training Kits.Your Order Placed Successfully.We will contact you ASAP with the deal.Here  is your Order  details..  <a style="color:green; font-size:18px; font-weight:bold;"  href="orderdetails.php">Go  here</a></p>
             </div>
            
       </div>

   </div> 

</div>
<?php include 'inc/footer.php';?>