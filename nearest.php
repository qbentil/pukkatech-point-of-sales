<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        /**
         * Method to find the distance between 2 locations from its coordinates.
         * 
         * @param latitude1 LAT from point A
         * @param longitude1 LNG from point A
         * @param latitude2 LAT from point A
         * @param longitude2 LNG from point A
         * 
         * @return Float Distance in Kilometers.
         */
        function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Km') {
            $theta = $longitude1 - $longitude2;
            $distance = sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta));
        
            $distance = acos($distance); 
            $distance = rad2deg($distance); 
            $distance = $distance * 60 * 1.1515;
        
            switch($unit) 
            { 
                case 'Mi': break;
                case 'Km' : $distance = $distance * 1.609344; 
            }
        
            return (round($distance,2).$unit); 
        }
        echo getDistanceBetweenPointsNew(6.24478548,-75.57050110,4.66455174,-74.07867091, "Mi");
        
    ?>
<?php
        function sqlCheck(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";
        
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            mysqli_set_charset($conn,"utf8");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            // Bucaramanga Coordinates
            $lat = 7.08594109039762;
            $lon = 286.95225338731285;
                
            // Only show places within 100km
            $distance = 150;
        
            $lat = mysqli_real_escape_string($conn, $lat);
            $lon = mysqli_real_escape_string($conn, $lon);
            $distance = mysqli_real_escape_string($conn, $distance);
        
            $query = <<<EOF
            SELECT * FROM (
                SELECT *, 
                    (
                        (
                            (
                                acos(
                                    sin(( $lat * pi() / 180))
                                    *
                                    sin(( `lat` * pi() / 180)) + cos(( $lat * pi() /180 ))
                                    *
                                    cos(( `lat` * pi() / 180)) * cos((( $lon - `lng`) * pi()/180)))
                            ) * 180/pi()
                        ) * 60 * 1.1515 * 1.609344
                    )
                as distance FROM `markers`
            ) markers
            WHERE distance <= $distance
            LIMIT 15;
        EOF;
        
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["name"] . "<br>";
                }
            }
        
            // Outputs:
            // Barrancabermeja
            // Cúcuta
            // San Gil
        }
    ?>
    <!-- <script>
        var markers = [
            {
                "id": "1",
                "lat": "4.66455174",
                "lng": "-74.07867091",
                "name": "Bogot\u00e1"
            }, 
            {
                "id": "2",
                "lat": "6.24478548",
                "lng": "-75.57050110",
                "name": "Medell\u00edn"
            }, 
            {
                "id": "3",
                "lat": "7.06125013",
                "lng": "-73.84928550",
                "name": "Barrancabermeja"
            }, 
            {
                "id": "4",
                "lat": "7.88475514",
                "lng": "-72.49432589",
                "name": "C\u00facuta"
            }, 
            {
                "id": "5",
                "lat": "3.48835279",
                "lng": "-76.51532198",
                "name": "Cali"
            }, 
            {
                "id": "6",
                "lat": "4.13510880",
                "lng": "-73.63690401",
                "name": "Villavicencio"
            }, 
            {
                "id": "7",
                "lat": "6.55526689",
                "lng": "-73.13373892",
                "name": "San Gil"
            }
        ];
        function setMarkers(map) {
            var image = {
                url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                size: new google.maps.Size(20, 32),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 32)
            };

            for (var i = 0; i < markers.length; i++) {
                var marker = markers[i];
                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(marker.lat), 
                        lng: parseFloat(marker.lng)
                    },
                    map: map,
                    icon: image,
                    shape: {
                        coords: [1, 1, 1, 20, 18, 20, 18, 1],
                        type: 'poly'
                    },
                    title: marker.name
                });
                
            }
        }
    </script> -->
</body>
</html>