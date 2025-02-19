// First Gauge Data
const tankCapacity1 = 20000; // Maximum capacity for gauge 1
const currentFuelLevel1 = 6000; // Fuel level for gauge 1

// Calculate fill percentage for first gauge
const fillPercentage1 = (currentFuelLevel1 / tankCapacity1) * 100;

// Update the first gauge
const gaugeFill1 = document.getElementById("gauge-fill");
const gaugeCover1 = document.getElementById("gauge-cover");

gaugeFill1.style.background = `conic-gradient(#007bff ${fillPercentage1}%, #e0e0e0 ${fillPercentage1}%)`;
gaugeCover1.textContent = `${Math.round(fillPercentage1)}%`;

// Second Gauge Data
const tankCapacity2 = 15000; // Maximum capacity for gauge 2
const currentFuelLevel2 = 7500; // Fuel level for gauge 2

// Calculate fill percentage for second gauge
const fillPercentage2 = (currentFuelLevel2 / tankCapacity2) * 100;

// Update the second gauge
const gaugeFill2 = document.getElementById("gauge-fill-2");
const gaugeCover2 = document.getElementById("gauge-cover-2");

gaugeFill2.style.background = `conic-gradient(#007bff ${fillPercentage2}%, #e0e0e0 ${fillPercentage2}%)`;
gaugeCover2.textContent = `${Math.round(fillPercentage2)}%`;
