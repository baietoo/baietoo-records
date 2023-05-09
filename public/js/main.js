// Initialize and add the map
let map;
// API Key: AIzaSyBD1cL5ujG_tmrECHe-1qSZ3lSGOG2fajg
async function initMap() {
  // The location of Turnu
  const position = { lat: 43.75, lng: 24.86667 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

  // The map, centered at Turnu
  map = new Map(document.getElementById("map"), {
    zoom: 6,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at Turnu
  const marker = new AdvancedMarkerView({
    map: map,
    position: position,
    title: "Turnu",
  });
}

initMap();