// Add interactivity to dropdown
document.querySelector(".profile-icon").addEventListener("mouseenter", function () {
    document.querySelector(".dropdown-menu").style.display = "block";
});

document.querySelector(".profile-icon").addEventListener("mouseleave", function () {
    document.querySelector(".dropdown-menu").style.display = "none";
});
