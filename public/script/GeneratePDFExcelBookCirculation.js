function generateReport() {
    const category = document.getElementById('category').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const format = document.querySelector('input[name="format"]:checked').value;
    const exportType = document.querySelector('input[name="export"]:checked').value;

    // You can replace the following logic with your report generation process
    console.log(`Category: ${category}`);
    console.log(`Start Date: ${startDate}`);
    console.log(`End Date: ${endDate}`);
    console.log(`Report Format: ${format}`);
    console.log(`Export as: ${exportType}`);

    alert('Report generated successfully!');
}