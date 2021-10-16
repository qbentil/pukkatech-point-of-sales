<html>
<body>
<div id="wrapper">
<?php
// $ip=$_SERVER['REMOTE_ADDR'];
// $user_ip = getenv('REMOTE_ADDR');
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$user_ip = get_client_ip();
$user_ip = "104.160.34.64";
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
$latitude = $geo["geoplugin_latitude"];
$longitude = $geo["geoplugin_longitude"];
echo "Country: $country <br><br>";
echo "city: $city <br><br>";
echo "Latitude: $latitude <br><br>";
echo "Longitude: $longitude <br><br>";

?>

<?php    

    // function get_client_ip()
    // {
    //     $ipaddress = '';
    //     if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    //         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    //     } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //     } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
    //         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    //     } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    //         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    //     } else if (isset($_SERVER['HTTP_FORWARDED'])) {
    //         $ipaddress = $_SERVER['HTTP_FORWARDED'];
    //     } else if (isset($_SERVER['REMOTE_ADDR'])) {
    //         $ipaddress = $_SERVER['REMOTE_ADDR'];
    //     } else {
    //         $ipaddress = 'UNKNOWN';
    //     }

    //     return $ipaddress;
    // }
    // $PublicIP = get_client_ip();
    // $json     = file_get_contents("http://ipinfo.io/154.160.25.44/geo");
    // $json     = json_decode($json, true);
    // var_dump($json);
    // $country  = $json['country'];
    // $region   = $json['region'];
    // $city     = $json['city'];
    // echo "Country: $country <br><br>";
    // echo "Country: $region <br><br>";
    // echo "city: $city <br><br>";
    ?>
</div>

<!-- google platform api key  -->
<!-- AIzaSyBbYbqU2-q8cZ0NAoMbLzEIAisYStGxUss -->
<!-- google platform api key  -->

</body>
</html>