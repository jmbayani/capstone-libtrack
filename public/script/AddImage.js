const imageContainer = document.getElementById("imageContainer");
const overlay = document.getElementById("overlay");
const fileInput = document.getElementById("fileInput");
const removeBtn = document.getElementById("removeBtn");
const cancelBtn = document.getElementById("cancelBtn");

imageContainer.addEventListener("click", () => {
    overlay.style.display = "flex";
});

cancelBtn.addEventListener("click", () => {
    overlay.style.display = "none";
});

fileInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imageContainer.innerHTML = `<img src="${e.target.result}" id="uploadedImage">`;
            overlay.style.display = "none";
            enableZoom();
        };
        reader.readAsDataURL(file);
    }
});

removeBtn.addEventListener("click", () => {
    imageContainer.innerHTML = "<span>Add Image</span>";
    overlay.style.display = "none";
});

function enableZoom() {
    const image = document.getElementById("uploadedImage");
    let scale = 1;

    image.addEventListener("wheel", (event) => {
        event.preventDefault();
        scale += event.deltaY * -0.01;
        scale = Math.min(Math.max(1, scale), 3);
        image.style.transform = `scale(${scale})`;
    });
}