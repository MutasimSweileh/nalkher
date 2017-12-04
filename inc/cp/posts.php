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
            	<div class="col s12 m12 right" >
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
          </div>
  </div>
  </div>
      <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"  id="video"><a  >الفديو</a></li>
        <li class="tab col s3" id="Tactive"><a >الانتظار</a></li>
        <li class="tab col s3" id="Dactive"><a >غير المفعل</a></li>
        <li class="tab col s3" id="Pactive"><a class="active" >المفعل</a></li>
        <input type="hidden" name="type" value="Pactive" />
      </ul>
    </div>
			<div class="pposts s12 m12" style="direction: rtl;">

 </div>
 </div>

</div>


