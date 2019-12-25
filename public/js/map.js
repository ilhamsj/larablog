var mymap = L.map("mapid").setView([-7.968625, 110.718782], 25);

L.tileLayer(
    "https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}",
    {
        attribution:
            'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: "mapbox.streets",
        accessToken:
            "pk.eyJ1IjoiaWxoYW1zaiIsImEiOiJjam1sdGc0YW0wYnZiM3BueWd4NWg3bmQzIn0.tqL4pisO6LAAwp0FhJwgKw"
    }
).addTo(mymap);

var marker = L.marker([-7.968625, 110.718782]).addTo(mymap);

// var circle = L.circle([-7.968625, 110.718782], {
//     color: "red",
//     fillColor: "#f03",
//     fillOpacity: 0.5,
//     radius: 100
// }).addTo(mymap);

var polygon = L.polygon([
    [-7.9687325, 110.718447],
    [-7.9688906, 110.7189432],
    [-7.9683648, 110.71893]
]).addTo(mymap);

marker.bindPopup("Taman Lansia An Naba").openPopup();
