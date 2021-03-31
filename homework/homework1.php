<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_POST['button'])) {
        $enter = $_POST['enter'];
    }
    ?>
    <form action="1.php" id="form1" name="form1" method="post">
        <input type="number" id="enter" name="enter" value="<?php echo $enter; ?>">
        <p><input type="submit" name="button" id="button" value="小到大排序"><input type="submit" name="button1" id="button1" value="大到小排序"></p>

    </form>

    <?php
    if (isset($_POST['button'])) {

        $startTime = microtime(1);
        $arr = array();

        for ($i = 0; $i < $enter; $i++) {
            $arr[] = rand(1, 100000);
        }
        echo "排序前：";
        print_r($arr);


        $sortArr = quickSort($arr);
        echo "<hr>排序後：";
        print_r($sortArr);
        echo "<hr>花費時間: ", (microtime(1) - $startTime) * 1000, "ms\n";
    }

    if (isset($_POST['button1'])) {

        $startTime = microtime(1);
        $arr = array();
        for ($i = 0; $i < $enter; $i++) {
            $arr[] = rand(1, 100000);
        }
        echo "排序前：";
        print_r($arr);


        $sortArr = quickSort1($arr);
        echo "<hr>排序後：";
        print_r($sortArr);

        echo "<hr>花費時間: ", (microtime(1) - $startTime) * 1000, "ms\n";
    }

    function quickSort($arr)
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $v = $arr[0];
        $s = $b = array();
        for ($i = 1; $i < $len; ++$i) {
            if ($arr[$i] > $v) {
                $b[] = $arr[$i];
            } else {
                $s[] = $arr[$i];
            }
        }

        $s = quickSort($s);
        $b = quickSort($b);



        // print_r($s);
        // echo "<hr>";
        // print_r($b);
        return array_merge($s, array($v), $b);
    }
    function quickSort1($arr)
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $v = $arr[0];

        $s = $b = array();
        for ($i = 1; $i < $len; ++$i) {
            if ($arr[$i] < $v) {
                $s[] = $arr[$i];
            } else {
                $b[] = $arr[$i];
            }
        }

        $b = quickSort1($b);
        $s = quickSort1($s);


        // echo '$s';
        // print_r($s);
        // echo "<hr>";
        // echo '$b';
        // print_r($b);
        // echo "<hr>";
        return array_merge($b, array($v), $s);
    }
    ?>
</body>

</html>