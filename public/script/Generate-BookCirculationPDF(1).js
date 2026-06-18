function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    let searchValue = document.getElementById("search").value;
    let filterValue = document.getElementById("filter").value;
    let startDate = document.getElementById("start-date").value;
    let endDate = document.getElementById("end-date").value;

    doc.text("Book Circulation Report", 10, 10);
    doc.text(`Search: ${searchValue}`, 10, 20);
    doc.text(`Filter: ${filterValue}`, 10, 30);
    doc.text(`Start Date: ${startDate}`, 10, 40);
    doc.text(`End Date: ${endDate}`, 10, 50);

    doc.save("book_circulation_report.pdf");
}