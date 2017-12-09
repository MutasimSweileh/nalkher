

<!-- <section class="no-margin">  -->

          <div class="row">


            <?php if(Ls()){  ?>

	   <div class="addpost col s12 m12 " id="addpost">
          <div class="card no-shadow z-depth-1 white t-row hoverable">

            <div class="card-content">
         <div class="row">

<div class="url_video input-field col s12 m12 " style="display:none;    float: right;" >
          <input id="text" name="url" type="text" class="validate">
          <label for="text">رابط الفديو</label>
</div>
<div class="cat_video input-field col s12 m12 " style="display:none;" >
          <input id="text" name="url" type="text" class="validate">
          <label for="text">التصنيف</label>
</div>
<div class="title_video input-field col s12 m12" style="display:none;    float: right;" >
          <input id="text" name="title" type="text"   class="validate valid right-align">
          <label class="active" for="text">اسم الفديو</label>
</div>

<div class="input-field col s12 m12 textfilde" style="    float: right;" >
                     <i class="fa fa-comment-o prefix right" aria-hidden="true"></i>
                <textarea id="linetext-1" class="materialize-textarea " name="post" ></textarea>
                <label for="linetext-1" class=""><?=$St->mtext2?></label>
                <input type="hidden" name='img' />
                <input type="hidden" name='type' value="0" />
                      <input type="checkbox" id="short" name="short" style="display:none" />
                      <input type='text' id="datepickerhere" value="<?=date('m/d/Y h:i a',time())?>" name="time_share"  style="height: 0;margin-bottom: 0;margin-top: 0;border: 0;" />

<!--                  <input
                    id="input_time"
                    class="datepicker"
                    type="time"
                    name="time"
                    autofocuss/>-->


<div class="row  center">
              <div class="date col s12 options">
             <div class="col s3 m3 center ">
              <a href="#"  onclick="text_post()"   class="btn-flat tooltipped black-text" data-delay="50" data-position="bottom" data-tooltip="نص" ><i class="fa fa-file-text-o " aria-hidden="true"></i> <span class="hide-on-small-and-down"> نص</span></a>
              </div>
             <div class="col s3 m3 center ">
              <a href="#" id="post_link" class="btn-flat tooltipped black-text" data-delay="50" data-position="left" data-tooltip="اضافة رابط" ><i class="fa fa-link " aria-hidden="true"></i> <span class="hide-on-small-and-down"> رابط</span></a>
              </div>
             <div class="col s3 m3 center   ">
              <a href="#"  class="btn-flat tooltipped black-text upload-click" data-delay="50" data-position="top" data-tooltip="اضافة صوره" ><i class="fa fa-picture-o " aria-hidden="true"></i> <span class="hide-on-small-and-down"> صوره</span></a>
              </div>
             <div class="col s3 m3 center ">
              <a href="#"  id="post_video" class="btn-flat tooltipped black-text  add_video" data-delay="50" data-position="right" data-tooltip="اضافة فديو"><i class="fa fa-youtube-square " aria-hidden="true"></i> <span class="hide-on-small-and-down">فديو</span></a>
              </div>

              </div>

</div>

              </div>
 <div class="col s12 m3 upload-image" style="display:none; text-align:center;">
<!--                  <div class="progress">
      <div class="indeterminate"></div>
  </div>-->
   <div class="preloader-wrapper big active" style="margin: 30px;">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>

  </div>
  <div class="col s12 m3 uimage" style="padding: 6px 0 0 0;display:none">
 <div class="tpimg center">
<a href="#" onclick="javascript:remove_img_dialog()"  class="remove tooltipped" data-position="top" data-tooltip="حذف الصوره"  style="    width: 18px; position: absolute;" >
<div  style="color: rgb(171, 116, 112) !important;
    top: -5px;
    font-size: 16px;" class="west remove_account_container  waves-effect waves-light white-text text-lighten-3" ><i class="fa fa-times" aria-hidden="true"></i></div>
 </a>
<img  style="height: 149px;
    width: 70%;" src="<?=$St->logo?>" alt="" class=" z-depth-1  image responsive-img" />
  </div>
  </div>

  </div>

            </div>

            <div class="card-action center">
              <div class="col s12 m12 upload-image" style="display:none; text-align:center;">
                    <img  src="<?=$St->url?>/assets/images/bigloader.gif" alt="" class="responsive-img"  />
              </div>
              <div class="col s12 m12 options left">

<!-- Dropdown Trigger -->

    <div class="col s6 m3  Yyd" style="">
       <div class="switch mswitch  left"  style=" display:none;   height: 36px;
    line-height: 36px;">
    <label>
      <input type="checkbox" id="Yd"  name="Yd">
      <span class="lever"></span>
          رفع الفديو
    </label>
  </div>
  </div>


              <div class="col s6 m3 ">
       <div class="switch left"  style="    height: 36px;
    line-height: 36px;">
    <label>
      <input type="checkbox" id="groups"  name="groups">
      <span class="lever"></span>
          المجموعات
    </label>
  </div>
  </div>

              <div class="col s6 m3 ">
       <div class="switch left"  style="    height: 36px;
    line-height: 36px;">
    <label>
      <input type="checkbox" id="pages"  name="pages">
      <span class="lever"></span>
          الصفحات
    </label>
  </div>
  </div>

   <div class="col s6 m3  tags">
   <div class="switch   left"  style=" display:none;   height: 36px;
    line-height: 36px;">
    <label>
      <input type="checkbox" id="tags"  name="tags">
      <span class="lever"></span>
         الاشارة للاصدقاء
    </label>
  </div>
  </div>

            <div class="col s12 m3 right ">
  <button name="post" style="width:100%" class='dropdown-button btn waves-effect waves-light  ' href='#' data-activates='dropdown26'><i class="zmdi zmdi-caret-down drop-down-icon right"></i>  نشر <i class="fa fa-facebook left "></i></button>
  </div>

  <!-- Dropdown Structure -->
  <ul id='dropdown26' class='dropdown-content linkLine right-align'>
    <li><a href="#" id="post_now"  >نشر الان</a></li>
    <li ><a href="#" id="Add_time"  >النشر لاحقا</a></li>

  </ul>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
         <div class="col s12 m12 page" style="display:none">
 <!--Card-->
 <div class="card">
 <div class="card-content">
<div class="GP center">
              <div class="col s12 m12" style=" text-align:center;">
                    <!--<img  src="../assets/images/bigloader.gif" alt="" class="responsive-img"  /> -->
                    <img src="/assets/images/ripple.svg" alt="" />
              </div>

</div>
              <div class="clear"></div>

</div>
</div>
<!--/.Card-->


        </div>
              <?php }else {?>
              <div class="social">
              <div class="col s12 m12 quote">
                                    <div class="card ">
                                        <div class="card-content">
                                            <h5 class="card-title left"><i class="fa fa-info-circle" aria-hidden="true"></i></h5>
                                            <div>
                                                <p class="font19"><?=$St->description?></p>
                                                <p class="right">
                                                <a   class="btn-floating btn waves-effect waves-light  tooltipped" data-position="top" data-tooltip="اشتراك فيس بوك" href="/login.html"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a   class="btn-floating btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="اشتراك تويتر"  href="/twitter.html"><i class="fa fa-twitter" aria-hidden="true"></i></a>

                                                </p>
                                            </div>
                                              <div class="clear" ></div>
                                        </div>
                                        <div class="clear" ></div>
                                    </div>
                                </div>
                                </div>
              <?php } ?>

          </div><!-- End row -->

 <!--   </section>   -->

            <div class="row dashboard-wrapper content-container">
                <div class="timeline-page col s12 card">
                    <div class="timeline card-content white">
                        <div class="timeline-milestone">
                            <span class="milestone-title white-text">الخط الزمنى للمنشورات</span>
                        </div>
                    <div class="posts">
                      <div class="col s12 m12" style=" text-align:center;">

                            <img src="/assets/images/ripple.svg" alt="" />
                      </div>

                    </div>
                    </div>
                </div>
            </div>
