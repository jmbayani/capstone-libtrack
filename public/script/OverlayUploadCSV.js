document.getElementById('openOverlayBtn').addEventListener('click', function () {
    document.getElementById('overlay').style.display = 'flex';
});

document.getElementById('cancelBtn').addEventListener('click', function () {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('csvFile').value = ""; 
    document.getElementById('filePreview').innerHTML = ""; 
});

document.getElementById('browseBtn').addEventListener('click', function () {
    document.getElementById('csvFile').click(); 
});

document.getElementById('csvFile').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file && file.type === "text/csv") {
        const reader = new FileReader();
        reader.onload = function (e) {
            const contents = e.target.result;
            displayCSV(contents);
        };
        reader.readAsText(file);
    } else {
        alert("Please upload a valid CSV file.");
    }
});

document.getElementById('uploadBtn').addEventListener('click', function () {
    const fileInput = document.getElementById('csvFile');
    const file = fileInput.files[0];

    if (file) {
        alert("File uploaded successfully!");
        document.getElementById('overlay').style.display = 'none';
        fileInput.value = ""; 
        document.getElementById('filePreview').innerHTML = ""; 
    } else {
        alert("Please select a file to upload.");
    }
});

function displayCSV(contents) {
    const filePreview = document.getElementById('filePreview');
    const lines = contents.split("\n");
    let previewText = "<strong>CSV Preview:</strong><br><br>";

    
    for (let i = 0; i < Math.min(lines.length, 5); i++) {
        previewText += lines[i] + "<br>";
    }

    filePreview.innerHTML = previewText;
}
