<?php
    header("Content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        尋找質數PHP程式：<br>
    <form action="3new.php" method='get'>
        請輸入要尋找多少個質數：<input type="number" name='num' value='<?php if(isset($_REQUEST['set'])){
            echo $_REQUEST['num'];
        } ?>'>
        <input type="hidden" name='set'>
        <input type="submit" value='送出'>
    </form>


</body>
</html>


<?php
    if(isset($_REQUEST['set'])){
        $i = 2;
        $z = 3;
        $Prime = 0 ;
        $record = array();
        array_push($record,2);
        $time_start = microtime_float();
        echo '第1個質數為2<br>';
        while($i<$_REQUEST['num']+1){
            if($z%2==0){$z++;}
            if(test($z,$record)){
                echo '第'.$i.'個質數為'.$z.'<br>';
                $i++;
                array_push($record,$z);
            }
            $z++;   
        }
        $time_end = microtime_float();
        echo '<p>所需時間：'.(($time_end - $time_start)*1000).'ms</p>';
}

    function test($num,$arr){
        $checknum = $num;
        for($j=0; $j<count($arr)-1; $j++){
            if($checknum%$arr[$j] ==0){
               return false;
            }
        }
        return true;
    }    


    function microtime_float(){
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }   

?>