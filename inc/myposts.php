    <div class="row" >

			<div class="col s12 m12" >
			<div class="card no-shadow" >
			<div class="card-content center" style="    padding: 2px;" >
            	<div class="col s12 m8 right" >
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
                      	<div class="col s12 m4" style="    line-height: 65px;" >
                 <button onclick="location.replace('../')" class=" btn-large waves-effect waves-light green">اضافة جديد <i class="fa fa-plus-circle right" aria-hidden="true"></i></button>
                 </div>
          </div>
  </div>
  </div>
      <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"  id="app_calendar"><a  ><?=Num('posts','where send="0" and active="0"')?> التطبيق <i class="fa fa-calendar fa-lg" aria-hidden="true"></i></a></li>
        <li class="tab col s3"  id="calendar"><a  ><?=Num('posts','where time="1" and Tsend="0" and userid='.userid)?> جدولى <i class="fa fa-calendar-plus-o fa-lg" aria-hidden="true"></i></a></li>
        <li class="tab col s3" id="myposts"><a class="active"><?=Num('posts','where userid='.userid)?>  منشوراتى <i class="fa fa-clipboard fa-lg" aria-hidden="true"></i></a></li>
        <input type="hidden" name="type" value="<?=$Gtype?>" />
      </ul>
    </div>
			<div class="myposts s12 m12" style="direction: rtl;">

 </div>
 </div>



