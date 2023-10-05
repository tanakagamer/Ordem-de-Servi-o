// Inicialize o mapa e defina as coordenadas iniciais e o nível de zoom
const mapa = L.map('mapa').setView([-21.3418, -47.7294], 13);

// Adicione um provedor de mapas (tile layer)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapa);

// Adicione um marcador no mapa
L.marker([-21.3418, -47.7294]).addTo(mapa)
    .bindPopup('Local da Oficina Mecânica')
    .openPopup();
