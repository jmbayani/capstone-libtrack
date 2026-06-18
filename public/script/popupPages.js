document.getElementById("studentLink1").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
});

document.getElementById("studentLink2").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
});

function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}

function closeNoticePopup() {
    document.getElementById("notice-overlay").style.display = "none";
    document.getElementById("important-popup").style.display = "none";
}

function closePenaltyPopup() {
    document.getElementById("penalty=overlay").style.display = "none";
    document.getElementById("penalty-popup").style.display = "none";
}

function redirectLogin() {
    location.href = 'LoginLibTrack.php';
}