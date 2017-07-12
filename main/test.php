<html> 
<head>
    <script>
        var x = document.getElementById("demo");
        var latitude;
		var longitude;
function getLocation() {
	
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	latitude=position.coords.latitude 
	longitude=position.coords.longitude;
    window.location.href = "http://localhost/agromart/main/post/location.php?latitude="+latitude+"&longitude="+longitude;
	
}
    </script>

</head> 

<body onload="getLocation()"> 
</body> 
</html>