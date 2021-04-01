 <?php
    if(isset($_REQUEST['open'])){
      $inn = (string)$_REQUEST['usernumber'];
    }
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
   
    <form action="Homework2.php" method="get">
      請輸入一個正整數：<input type="number" name='usernumber' value="<?php 
      
      if(isset($_REQUEST['open'])){
        echo $inn ;
      }
      
      ?>">
      <input type="hidden" name='open'>
      <input type="submit" value='送出'>
    </form>


    <script>
       let sub = document.querySelector("input[type='submit']");
       sub.addEventListener('click',e=>{
         if(!document.querySelector("input[type='number']").value ){
           alert('請輸入一個數字')
           e.preventDefault();
         }
         else if(document.querySelector("input[type='number']").value<=0){
           alert('請輸入大於零的數字')
           e.preventDefault();
         }
       });
    
    </script>


 </body>
 </html>
 
 <?php   
  if(isset($_REQUEST['open'])){
    $num = ceil(strlen($inn)/4)-1;
    $l = strlen($inn)%4;
    for($i=0;$i<strlen($inn);$i++){
      if($i==0 && $l!=0){
            Numberunit(substr($inn,0,$l),$l);
            $i = $i + $l -1;
            ff($num);
            $num--;
      }
      else{
        Numberunit(substr($inn,$i,4),4);        
        if(strlen($inn)!=4){
          if(isfourzero(substr($inn,$i,4),4)){
            ff($num);
          }
        }
        $i = $i + 3;
        $num--;
      }
      
  }
  echo'元整';
}
    function isfourzero($import,$ll){
      $testnum = 0;
      for($i=0;$i<$ll;$i++){
          if($import[$i] == 0){
            $testnum ++;
          }
        }
        if($testnum == $ll){
          return false;
        }
        else{
          return true;
        }   
    
    }

    function Numberunit($import,$ll){
        $testll = $ll;
        $j=0;
        while($ll>0){
          
            if($j!=0){
              $testgap =0;
              $gap = $testll - $j ;
              for($i=$j;$i<$testll;$i++){
                 if($import[$i]==0){
                   $testgap++;
                 }
              }
    
              if($testgap == $gap){
                return;
              }
            }
            
            if($import[$j]==0 && $import[($j-1)]==0){ 
              $j++; $ll--;
              continue;
            }
  
            Conversion($import[$j],$ll);
            if($import[$j]!=0){
              switch($ll){
                  case 4:
                    echo '仟';
                    break;
                  case 3:
                    echo'佰';
                    break;
                  case 2:
                    echo'拾';
                    break;     
                  case 1:
                    break;
                  default:
                    break;                                
              }
            }
            $j++;
            $ll--;
            
        }

    }
    function Conversion($imnum,$ji){
        switch($imnum){
            case '0':
              if($ji!=4){
                echo'零';
              }
              break;
            case '1':
              echo'壹';
              break;
            case '2':
              echo'貳';
              break;
            case '3':
              echo'參';
              break;
            case '4':
              echo'肆';
              break;
            case '5':
              echo'伍';
              break;
            case '6':
              echo'陸';
              break;
            case '7':
              echo'柒';
              break;
            case '8':
              echo'捌';
              break;
            case '9':
              echo'玖';
              break;
        }
    }
    function ff($num){
       $arr = array('','萬','億','兆','京','垓','秭','穰','溝','澗');
       echo $arr[$num];
    }

?>