<?php

// Number 1
echo "<h1>Number 1</h1>";
for ($i=1; $i <= 20; $i++) { 

    // for mulitples of 3, print USB
    if($i % 3 == 0)
    {
        echo "USB <br>";
    }
    // for numbers which are  multiples of both 2 and 5, print usbdevice
    elseif ($i % 2 == 0 && $i % 5 == 0) {
        echo "USB Device <br>";
    }
    elseif ($i % 5 == 0) {
        echo "Device <br>";
    }
    else
    {
        echo $i."<br>";
    }
}

echo "<h1>Number 2</h1>";

$arr = [8,2,1,0,0,2,3,5,6,11,2,3];

sort($arr); // sorting array in ascending order
echo "<pre>";
print_r($arr);
//     if(isset($_POST['send']))
//     {
//         $it = NULL;
//         echo isset($it)? $it: "No Set It";
//         echo "Name: ". isset($_POST['name'])? $_POST['name']: NULL;
//         echo "Email: ". isset($_POST['email'])? $_POST['email']: NULL;
//         echo "Phone: ". isset($_POST['phone'])? $_POST['phone']: NULL;
//     }
// ?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="quiz.php" method="post">
        <input type="text" name = "name" placeholder="Name">
        <input type="text" name = "email" placeholder="Email">
        <input type="text" name = "phone" placeholder="Phone">
        <button type="submit" name = "send">Send</button>
    </form>
</body> -->
</html>