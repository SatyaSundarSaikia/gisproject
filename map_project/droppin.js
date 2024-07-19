
// Define the pin source and layer
const pinSource = new ol.source.Vector();

// Add event listener to show modal
document.getElementById('trackbtn2').addEventListener('click', function () {
  var printModal = new bootstrap.Modal(document.getElementById('pinModal'), {});
  printModal.show();
});

// Add event listener to drop pin
document.getElementById('locate_Pindrop').addEventListener('click', function () {
  let lat = parseFloat(document.getElementById("lat").value);
  let lon = parseFloat(document.getElementById("lon").value);

  // Validate latitude and longitude
  if (isNaN(lon) || isNaN(lat) || lon < -180 || lon > 180 || lat < -90 || lat > 90) {
    alert("Please enter valid longitude (-180 to 180) and latitude (-90 to 90) values.");
    return;
  }

  // Center the map view to the specified coordinates
  map.getView().setCenter(ol.proj.fromLonLat([lon, lat]));
  map.getView().setZoom(15);

  // Create a pin feature
  let pinFeature = new ol.Feature({
    geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat]))
  });

  // Define pin style
  let pinStyle = new ol.style.Style({
    image: new ol.style.Icon({
      anchor: [0.5, 1],
      src: './image/pinn.png' // Ensure this path is correct
    })
  });

  pinFeature.setStyle(pinStyle);

  // Add the pin feature to the pin source
  pinSource.addFeature(pinFeature);
});

// Add event listener to remove pin
document.getElementById('locate_Pinremove').addEventListener('click', function () {
  pinSource.clear(); // Clear all features from the pin source
});
