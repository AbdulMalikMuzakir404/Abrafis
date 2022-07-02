if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    document.getElementById("demo").innerHTML =
    "Geolocation is not supported by this browser.";
  }

  function showPosition(position) {
    alert("Latitude: " + position.coords.latitude + "<br>" +
    "Longitude: " + position.coords.longitude);
  }
