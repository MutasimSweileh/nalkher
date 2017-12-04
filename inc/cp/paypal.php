 <div class="container" style="    direction: rtl;">
 <div class='row'>
 <div class="col s12 m12 z-depth-1 white" id="addpost" style="    margin-bottom: 150px;">
          <div class="card no-shadow">
          <div class="card-content">
          <?php
          $price = '30.00';
          $currency='USD';
          parse_str($MUr);
          if($amt == $price and $cc == $currency  and !Sion('paypal'))
            {
                $_SESSION['paypal'] = "success";
                header("Location: /admin/paypal");
            }else if(Sion('paypal') == "success" ){
                echo Amsg('شكرا لك . سيتم معالجه الامر وتشغيل  الاشتراك بعد دقيقه ان شاء الله','green');
                $_SESSION['paypal'] = null;
           }else{
                echo Amsg('حدث خطأ ما اثناء المعالجه من فضلك حاول مره اخرى فى وقت لاحق','red');
           }
          ?>
</div>
</div>
</div>
</div>
</div>