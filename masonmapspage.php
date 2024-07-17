<?php session_start();
include('php/config.php');
if(empty($_SESSION['Emailid'])&& empty($_SESSION['number'])&& empty($_SESSION['Name'])&& empty($_SESSION['genderuser'])&&empty($_SESSION['role'])&&empty($_SESSION['skill'])&&empty($_SESSION['area'])):
    header('Location:index.php');
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime location tracker</title>

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="map"></div>
</body>
</html>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>


    // Map initialization 
    var map = L.map('map').setView([21.1290, 82.7792], 5);

    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);



    var marker;
    var featureGroup;
    var $name;

    if(!navigator.geolocation) {
        console.log("Your browser doesn't support geolocation feature!")
    } else {
        setInterval(() => { 
        navigator.geolocation.getCurrentPosition(getPosition);
    }, 10000); 
    <?php
    $query ="SELECT latitude, longitude,Name,number FROM users1 where skill='mason' and Is_Hired='0'";
    $query_run= mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0){
        foreach($query_run as $row){
            $latit=$row['latitude'];
            $longi=$row['longitude'];
            $name=$row['Name'];
            $no=$row['number'];
          ?>
        showMarker(<?php echo"$latit"?>,<?php echo"$longi"?>,'<?php echo("$name")?>',<?php echo"$no"?>);
         <?php }
    }?>
}
function showMarker(lat, long,name,number) {
// Create a marker object
var marker = L.marker([lat, long]);
        marker = L.marker([lat, long])
        contentString ="Name="+name+"<br>Number="+number+"<br><a href='construction.php'><button>Book this worker</button> <br>"
        marker.bindPopup(contentString).openPopup();
         marker.addTo(map);
}
    </script>
    <script>
    var marker, circle;
    var featureGroup;

    function getPosition(position){
        // console.log(position)
          
        var lat = position.coords.latitude
        var long = position.coords.longitude
        var accuracy = position.coords.accuracy
       
        if(featureGroup) {
            map.removeLayer(featureGroup)
        }

        if(featureGroup) {
            map.removeLayer(featureGroup)
        }
        

        marker = L.marker([lat, long])
        circle = L.circle([lat, long],{radius:20})
        
        featureGroup = L.featureGroup([marker, circle]).addTo(map)
        contentString ="<br> you <br>"
    


    L.marker([lat,long,contentString]).addTo(featureGroup)
        .bindPopup(`Lat/Long : ${lat}, ${long} ${contentString}`)
        .openPopup();

        map.fitBounds(featureGroup.getBounds());
        
        console.log("Your coordinate is: Lat: "+ lat +" Long: "+ long+ " Accuracy: "+ accuracy)

}
</script>
<script>

</script>
