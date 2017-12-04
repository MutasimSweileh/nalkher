<?php
if(!defined('MyConst')) {
header("Location: ../");
}
?>
  <div class="container">
    <div class="row" >

			<div class="col s12 m12" >
			<div class="card no-shadow" >
			<div class="card-content center" style="    padding: 2px;" >
            	<div class="col s12 m10 right" >
             <nav class="white" dir="rtl">
    <div class="nav-wrapper">
      <form>
        <div class="input-field right-align">
          <input id="search" class="right-align" type="search" required>
          <label for="search"><i class="material-icons" style="color: #009688;">search</i></label>
          <i onclick="close_search()" class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
          </div>
            	<div class="col s6 m2 center" style="    line-height: 65px;" >
                 <button onclick="DeleteAll()" class=" btn-large waves-effect waves-light red" style="    width: 100%;"  >خيارات<i class="fa fa-cogs right" aria-hidden="true"></i></button>
                 </div>
          </div>
  </div>
  </div>
      <div class="col s12">
      <ul class="tabs">
<?php if($St->rDelete == 1){?>
        <li class="tab col s3" id="des"><a >المتوقفين</a></li>
        <?php } if($St->tw == 1){?>
        <li class="tab col s3" id="tw"><a >تويتر</a></li>
      <?php } if($St->getpages == 1 or  $St->app == 1){?>
        <li class="tab col s3" id="pages"><a >الصفحات</a></li>
      <?php }?>
        <li class="tab col s3"  id="users"><a class="active" >فيس بوك</a></li>
        <input type="hidden" name="type" value="<?=$Gtype?>" />
      </ul>
    </div>
          <div class="col s12" style="display:none">
      <ul class="tabs">
        <li class="tab col s3" id="pages"><a >(<?=Num($appsql,'where time="24"')?>)</a></li>
        <li class="tab col s3" id="pages"><a >(<?=Num($appsql,'where time="12"')?>)</a></li>
        <li class="tab col s3" id="pages"><a >(<?=Num($appsql,'where time="6"')?>)</a></li>
        <li class="tab col s3" id="pages"><a >(<?=Num($appsql,'where time="4"')?>)</a></li>

      </ul>
    </div>

			<div class="users s12 m12" style="direction: rtl;">

 </div>
 </div>

</div>


