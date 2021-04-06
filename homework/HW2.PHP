
 <?php   
      header("Content-Type:text/html; charset=utf-8");
      $data =  json_decode(file_get_contents("php://input")); 
      $inn = $data ->input;
      $echoary = array();

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
  if(count($echoary)!=0){
    array_push($echoary,'元整');
  }
  else{
    array_push($echoary,'就叫你輸入正整數了你還輸入別的');
  }
  echo json_encode($echoary,JSON_UNESCAPED_UNICODE);

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
                    array_push($GLOBALS["echoary"],'仟');
                    break;
                  case 3:
                    array_push($GLOBALS["echoary"],'佰');
                    break;
                  case 2:
                    array_push($GLOBALS["echoary"],'拾');
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
                array_push($GLOBALS["echoary"],'零');
              }
              break;
            case '1':
              array_push($GLOBALS["echoary"],'壹');
              break;
            case '2':
              array_push($GLOBALS["echoary"],'貳');
              break;
            case '3':
              array_push($GLOBALS["echoary"],'參');
              break;
            case '4':
              array_push($GLOBALS["echoary"],'肆');
              break;
            case '5':
              array_push($GLOBALS["echoary"],'伍');
              break;
            case '6':
              array_push($GLOBALS["echoary"],'陸');
              break;
            case '7':
              array_push($GLOBALS["echoary"],'柒');
              break;
            case '8':
              array_push($GLOBALS["echoary"],'捌');
              break;
            case '9':
              array_push($GLOBALS["echoary"],'玖');
              break;
        }
    }
    function ff($num){
       $arr = array('','萬','億','兆','京','垓','秭','穰','溝','澗');
       array_push($GLOBALS["echoary"], $arr[$num]);
    }

?>