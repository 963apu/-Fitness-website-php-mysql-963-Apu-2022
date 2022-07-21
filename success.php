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
    

}
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

<?php
                   $cmrId = Session::get("cmrId");
                   $amount = $ct->SesspayableAmount($cmrId);
                  if($amount) {
                       $sum = 0;
                       while ($result = $amount->fetch_assoc()) {
                          $price = $result['price'];
                          $sum = $sum+$price;
                      }
                    
                    }  
                   
                ?>

<div class="main">
   <div class="content">
       <div class="section group">
             <div class="payment">
                 <h2 class="success" style="color:green;">Sucess!!</h2>

                 <p>Total Payable Amount : 
                 <?php
                     $vat = $sum * 0.1;
                     $total = $vat+$sum;
                     echo $total;
                   
                  ?>
                 </p>
                 <p style=""> Thanks for chosing our Training Session.Your Request Placed Successfully.We will contact you ASAP with the deal.Here  is your request  details......  <a style="color:blue"  href="request.php">Go  here</a> </p
             </div>
            
       </div>

   </div>

</div>
<?php include 'inc/footer.php';?>