    <div class="container" style="    direction: rtl;">
<div class='row'>
 <div class="col s12 m12 z-depth-1 white" id="addpost">
          <div class="card no-shadow" style="min-height: 300px;">
          <div class="card-title" style="direction:rtl;    font-size: 20px;">تحديث السكريبت</div>
            <div class="card-content">
<?php
if(!defined('MyConst')) {
header("Location: ../");
}
if($app['Supdate']['Dupdate'] == 1){
    if($St->last_update < $app['Supdate']['update']){
        if($St->last_update  == 0){$vupdate= $St->last_update +$app['Supdate']['update'];}else{$vupdate= $St->last_update +1;}
        Update('settings','last_update',$vupdate);
     if ( !function_exists( "zip_open" ) )
             $output.= "<h4 style=' text-align: left;direction: ltr;'>$failImg Update Error</h4><p style=' text-align: left;direction: ltr;' >Your server is missing PHP ZIP support. <br>It is part of default PHP package.<br>Please ask your hosting to enable ZIP support for PHP.<br>Updating cannot be done until this issue is resolved.</p>";
        $output .= "<p>التحقق من التحديث </p>";
        $updateFileName = $NameDb . "-" . $app['Supdate']['update'] . '.zip';
        if ( !file_exists( $updateFileName ) ) {
            $output .= '<p>جارى تحميل التحديث الان</p>';
            $updateFile = readURL( 'http://mohtasmbelah.com/update/?type=fb&v='.$app['Supdate']['update']);
            if ( !$updateFile )
                $output.= "<br>$failImg خطأ فى التحميل";
            $dlHandler = fopen( $updateFileName, 'w' );
            if ( !fwrite( $dlHandler, $updateFile ) )
              // $output.= "<p>$failImg Could not save new update. Operation aborted.</p>";
            fclose($dlHandler);
        if($updateFile){
            $output .= '<p>تم تحميل التحديث وحفظه</p>';
             }
        } else
            $output .= '<p>خطأ ملف التحديث موجود مسبقا</p>';
        $zipHandle = zip_open( $updateFileName );
        if ( !is_resource( $zipHandle ) )
            $output .= "<p>$failImg خطأ فى تحديث الملفات . حاول مره اخرى</p>";
        //$output .= '<ul>';
       while ($aF = zip_read( $zipHandle ) ) {
            $thisFileName = zip_entry_name( $aF );
            $thisFileDir = dirname( $thisFileName );
            if ( substr( $thisFileName, -1, 1 ) == '/' )
                continue;
            if ( !is_dir( $thisFileDir ) ) {
                 mkdir( $thisFileDir );
                 $output .= '<li style="    text-align: left;direction: ltr;">' . $thisFileDir . '...... انشاء المجلد </li>';
            }
            if ( !is_dir( $thisFileName )) {
                $output .= '<li style="    text-align: left;direction: ltr;">' . $thisFileName . '...........';
                $contents = zip_entry_read( $aF, zip_entry_filesize( $aF ) );
                $updateThis = '';
                if ( $thisFileName == 'upgrade.php' ) {
                    $upgradeExec = fopen( 'upgrade.php','w' );
                    fwrite( $upgradeExec, $contents );
                    fclose( $upgradeExec );
                    include( 'upgrade.php' );
                    unlink( 'upgrade.php' );
                    $output .= ' EXECUTED</li>';
                } else {
                    //if ( file_exists( $thisFileName ) )
                        //rename( $thisFileName, 'backups/' . basename( $thisFileName ) );
                    $updateThis = fopen( $thisFileName, 'w' );
                    fwrite( $updateThis, $contents );
                    fclose( $updateThis );
                    unset( $contents );
                    $output .= ' <font color="green">تم التحديث</font></li>';
                }
            }
        }
        //$output .= '</ul><p>All existing files were backed up to <strong>backups</strong> folder before being updated</p>';
     if(is_resource( $zipHandle )){
        $output .='<p class="success c" style="color: green;">تم التحديث بنجاح للاصدار v'.$app['Supdate']['update'].' </p>';
                                   }
       $output .='<div class="success" style="text-align: center;font-weight: bold;margin: 8px;"><a href="/admin">رجوع للقائمه الرئيسيه</a></div>';
        //$adminOptions[ 'version' ] = $adminOptions[ 'updateVersion' ];
       // $adminOptions[ 'updateVersion' ] = '';
        //saveAdminOptions();
        unlink( $updateFileName );
        //secho $output;
        echo $output;
}else{
   $output = Amsg('عذرا لاتتوافر اى تحديثات فى الوقت الحالى','red');
   $output .='<div class="success" style="text-align: center;font-weight: bold;margin: 8px;"><a href="/admin">رجوع للقائمه الرئيسيه</a></div></div>';
   echo $output;

}

}else{
   $output = Amsg('عذرا لاتمتلك تصريح لتحديث السكريبت','red');
   $output .='<div class="success" style="text-align: center;font-weight: bold;margin: 8px;"><a href="/admin">رجوع للقائمه الرئيسيه</a></div></div>';
   echo $output;

}

?>
</div>
</div>
</div>
</div>
</div>