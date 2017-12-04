<?php
   class SqlLite extends SQLite3
   {
      function __construct($db=false)
      {
          if($db){
         $this->open($db);
         }else{
           $this->open('test.db');
         }
      }

public function connect(){
   if(!$this){
      return $this->lastErrorMsg();
   } else {
      return true;
   }
}

/*
    public function insertDoc($tb, $pathToFile) {
        if (!file_exists($pathToFile))
            die("File %s not found.");
        $sql = "INSERT INTO ".$tb." (image) "
                . "VALUES(:doc)";
        // read data from the file
        $fh = fopen($pathToFile, 'rb');
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':doc', $fh, \PDO::PARAM_LOB);
        $stmt->execute();
        fclose($fh);
        return $this->lastInsertId();
    }
    */
public function CREATE($sql=""){
   $ret = $this->exec($sql);
   if(!$ret){
      return $this->lastErrorMsg();
   } else {
      return true;
   }

}
public function update($tb="",$k="",$v="",$w=""){
 $sql = 'UPDATE $tb set $k="'.$k.'" $w ';
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo $db->changes();
   }

}
public function select($tb="",$w=""){
$sql = "select * from  $tb  $w  ";
  $ret = $this->query($sql);
if($ret){
return $ret->fetchArray(SQLITE3_ASSOC);
}else{
 return false;
}


}

   public function insert($tp="",$data=""){
        $keys = '';
        $values = '';
        $i = count($data);

        foreach ($data as $key => $value)
        {
         if($key=="password" and !$f)
            {
                  $value = md5($value);
            }else if($key=="image"){
             $value = fopen($value, 'rb');
            }
            if($i == 1)
            {
            $keys .= $key;
            $values .=  "'".$value."'";
            }else{
            $keys .= $key.',';
            $values .= "'".$value."',";
            }
            $i--;
        }
        $sql = 'insert into '.$tp.' ('.$keys.') values ('.$values.')';
        $ret = $this->exec($sql);
        fclose($fh);
   if(!$ret){
      //return  $this->lastErrorMsg();
      return  $this->lastErrorMsg();
   } else {
      //return $this->lastInsertId();
      return true;
   }

 }



   }
 ?>