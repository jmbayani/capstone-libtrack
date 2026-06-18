// Initialize jsPDF
const { jsPDF } = window.jspdf;

// DOM Elements
const finesTableBody = document.getElementById('fines-table-body');
const emptyState = document.getElementById('empty-state');
const fineModal = document.getElementById('fineModal');
const waiveModal = document.getElementById('waiveModal');
const payModal = document.getElementById('payModal');
const toast = document.getElementById('toast');

// Pagination Elements
const paginationInfo = document.getElementById('pagination-info');
const pageSizeSelector = document.getElementById('page-size-selector');
const firstPageBtn = document.getElementById('first-page-btn');
const prevPageBtn = document.getElementById('prev-page-btn');
const nextPageBtn = document.getElementById('next-page-btn');
const lastPageBtn = document.getElementById('last-page-btn');
const pageNumbersContainer = document.getElementById('page-numbers');

// Configuration
let allFines = [];
let currentFineId = null;

// Pagination variables
let currentPage = 1;
let pageSize = 10;
let filteredFines = [];
let totalPages = 1;

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    // Load sample data
    allFines = generateSampleFines(50);
    
    // Initialize pagination
    setupPagination();
    
    // Render initial table
    filterAndRenderFines();
    
    // Set up event listeners
    setupEventListeners();
});

// Set up all event listeners
function setupEventListeners() {
    // Status filter checkboxes
    document.querySelectorAll('.checkbox-item input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', filterAndRenderFines);
    });
    
    // Date inputs
    document.getElementById('start-date').addEventListener('change', filterAndRenderFines);
    document.getElementById('end-date').addEventListener('change', filterAndRenderFines);
    
    // Search inputs
    document.getElementById('search-query').addEventListener('input', debounce(filterAndRenderFines, 300));
    document.getElementById('search-type').addEventListener('change', filterAndRenderFines);
    
    // Buttons
    document.getElementById('refresh-btn').addEventListener('click', refreshData);
    
    // Modal buttons
    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', closeAllModals);
    });
    
    // Fine modal buttons
    document.getElementById('modal-waive-btn').addEventListener('click', showWaiveModal);
    document.getElementById('modal-pay-btn').addEventListener('click', showPayModal);
    document.getElementById('modal-pdf-btn').addEventListener('click', generateCurrentReceipt);
    
    // Waive modal buttons
    document.getElementById('waive-cancel-btn').addEventListener('click', () => {
        waiveModal.classList.remove('show');
        fineModal.classList.add('show');
    });
    document.getElementById('waive-confirm-btn').addEventListener('click', confirmWaiver);
    
    // Pay modal buttons
    document.getElementById('pay-cancel-btn').addEventListener('click', () => {
        payModal.classList.remove('show');
        fineModal.classList.add('show');
    });
    document.getElementById('pay-confirm-btn').addEventListener('click', confirmPayment);
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            closeAllModals();
        }
    });
    
    // Initialize date pickers
    document.querySelectorAll('.date-input').forEach(input => {
        input.addEventListener('focus', function() {
            this.type = 'date';
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.type = 'text';
            }
        });
    });
}

// Set up pagination event listeners
function setupPagination() {
    // Page size selector
    pageSizeSelector.addEventListener('change', function() {
        pageSize = parseInt(this.value);
        currentPage = 1; // Reset to first page when changing page size
        updatePagination();
        renderTableForCurrentPage();
    });
    
    // First page button
    firstPageBtn.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage = 1;
            updatePagination();
            renderTableForCurrentPage();
        }
    });
    
    // Previous page button
    prevPageBtn.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
            renderTableForCurrentPage();
        }
    });
    
    // Next page button
    nextPageBtn.addEventListener('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
            renderTableForCurrentPage();
        }
    });
    
    // Last page button
    lastPageBtn.addEventListener('click', function() {
        if (currentPage < totalPages) {
            currentPage = totalPages;
            updatePagination();
            renderTableForCurrentPage();
        }
    });
}

// Filter and render fines based on current filters
function filterAndRenderFines() {
    // Get current filter values
    const pendingChecked = document.getElementById('pending').checked;
    const paidChecked = document.getElementById('paid').checked;
    const waivedChecked = document.getElementById('waived').checked;
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;
    const searchType = document.getElementById('search-type').value;
    const searchQuery = document.getElementById('search-query').value.toLowerCase();
    
    // Filter by status
    filteredFines = allFines.filter(fine => {
        if (fine.status === 'Pending' && !pendingChecked) return false;
        if (fine.status === 'Paid' && !paidChecked) return false;
        if (fine.status === 'Waived' && !waivedChecked) return false;
        return true;
    });
    
    // Filter by date range
    if (startDate) {
        const startDateObj = new Date(startDate);
        filteredFines = filteredFines.filter(fine => {
            const fineDate = new Date(fine.penaltyDate);
            return fineDate >= startDateObj;
        });
    }
    
    if (endDate) {
        const endDateObj = new Date(endDate);
        endDateObj.setHours(23, 59, 59, 999); // Include entire end day
        filteredFines = filteredFines.filter(fine => {
            const fineDate = new Date(fine.penaltyDate);
            return fineDate <= endDateObj;
        });
    }
    
    // Filter by search query
    if (searchQuery) {
        filteredFines = filteredFines.filter(fine => {
            if (searchType === 'all') {
                return (
                    fine.bookTitle.toLowerCase().includes(searchQuery) ||
                    fine.name.toLowerCase().includes(searchQuery) ||
                    fine.username.toLowerCase().includes(searchQuery) ||
                    (fine.receiptNo && fine.receiptNo.toLowerCase().includes(searchQuery))
                );
            } else if (searchType === 'name') {
                return fine.name.toLowerCase().includes(searchQuery);
            } else if (searchType === 'book') {
                return fine.bookTitle.toLowerCase().includes(searchQuery);
            } else if (searchType === 'username') {
                return fine.username.toLowerCase().includes(searchQuery);
            } else if (searchType === 'receipt') {
                return fine.receiptNo && fine.receiptNo.toLowerCase().includes(searchQuery);
            }
            return true;
        });
    }
    
    // Reset to first page when filtering
    currentPage = 1;
    
    // Update pagination and render table
    updatePagination();
    renderTableForCurrentPage();
}

// Update pagination controls
function updatePagination() {
    // Calculate total pages
    totalPages = Math.ceil(filteredFines.length / pageSize);
    
    // Update pagination info
    const startItem = (currentPage - 1) * pageSize + 1;
    const endItem = Math.min(currentPage * pageSize, filteredFines.length);
    paginationInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredFines.length} entries`;
    
    // Enable/disable pagination buttons
    firstPageBtn.disabled = currentPage === 1;
    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage === totalPages;
    lastPageBtn.disabled = currentPage === totalPages;
    
    // Generate page number buttons
    pageNumbersContainer.innerHTML = '';
    
    // Always show first page
    addPageNumber(1);
    
    // Show ellipsis if needed before current page
    if (currentPage > 3) {
        const ellipsis = document.createElement('span');
        ellipsis.textContent = '...';
        ellipsis.style.padding = '0 10px';
        pageNumbersContainer.appendChild(ellipsis);
    }
    
    // Show pages around current page
    const startPage = Math.max(2, currentPage - 1);
    const endPage = Math.min(totalPages - 1, currentPage + 1);
    
    for (let i = startPage; i <= endPage; i++) {
        addPageNumber(i);
    }
    
    // Show ellipsis if needed after current page
    if (currentPage < totalPages - 2) {
        const ellipsis = document.createElement('span');
        ellipsis.textContent = '...';
        ellipsis.style.padding = '0 10px';
        pageNumbersContainer.appendChild(ellipsis);
    }
    
    // Always show last page if there's more than one page
    if (totalPages > 1) {
        addPageNumber(totalPages);
    }
    
    // Show empty state if no results
    if (filteredFines.length === 0) {
        emptyState.style.display = 'block';
        document.querySelector('.pagination-container').style.display = 'none';
    } else {
        emptyState.style.display = 'none';
        document.querySelector('.pagination-container').style.display = 'flex';
    }
}

// Helper function to add a page number button
function addPageNumber(pageNumber) {
    const pageBtn = document.createElement('button');
    pageBtn.className = 'pagination-btn';
    pageBtn.textContent = pageNumber;
    if (pageNumber === currentPage) {
        pageBtn.classList.add('active');
    }
    
    pageBtn.addEventListener('click', () => {
        if (pageNumber !== currentPage) {
            currentPage = pageNumber;
            updatePagination();
            renderTableForCurrentPage();
        }
    });
    
    pageNumbersContainer.appendChild(pageBtn);
}

// Render table for the current page
function renderTableForCurrentPage() {
    // Clear table body
    finesTableBody.innerHTML = '';
    
    // Calculate start and end index for current page
    const startIndex = (currentPage - 1) * pageSize;
    const endIndex = Math.min(startIndex + pageSize, filteredFines.length);
    
    // Add rows for current page
    for (let i = startIndex; i < endIndex; i++) {
        const fine = filteredFines[i];
        const row = document.createElement('tr');
        row.className = 'fine-row';
        row.setAttribute('data-id', fine.id);
        
        // Format amount as currency
        const amount = formatCurrency(fine.amount);
        
        // Determine status badge class
        let statusClass = '';
        if (fine.status === 'Pending') statusClass = 'status-pending';
        else if (fine.status === 'Paid') statusClass = 'status-ready';
        else if (fine.status === 'Waived') statusClass = 'status-waived';
        
        row.innerHTML = `
            <td class="book-title">${fine.bookTitle}</td>
            <td>${fine.name}</td>
            <td>${fine.penaltyReason}</td>
            <td>${amount}</td>
            <td><span class="status-badge ${statusClass}">${fine.status}</span></td>
        `;
        
        // Add click handler to show fine details
        row.addEventListener('click', () => {
            showFineModal(fine.id);
        });
        
        finesTableBody.appendChild(row);
    }
}

// Show fine modal
function showFineModal(fineId) {
    const fine = allFines.find(f => f.id == fineId);
    if (!fine) return;
    
    currentFineId = fineId;
    
    // Populate modal with fine data
    document.getElementById('modal-book-title').textContent = fine.bookTitle;
    document.getElementById('modal-author').textContent = fine.author;
    document.getElementById('modal-isbn').textContent = fine.isbn;
    document.getElementById('modal-name').textContent = fine.name;
    document.getElementById('modal-username').textContent = fine.username;
    document.getElementById('modal-email').textContent = fine.email;
    document.getElementById('modal-penalty-by').textContent = fine.penaltyBy;
    document.getElementById('modal-settled-by').textContent = fine.settledBy || '-';
    document.getElementById('modal-penalty-reason').textContent = fine.penaltyReason;
    document.getElementById('modal-amount').textContent = formatCurrency(fine.amount);
    document.getElementById('modal-receipt').textContent = fine.receiptNo || '-';
    document.getElementById('modal-penalty-date').textContent = formatDate(fine.penaltyDate);
    document.getElementById('modal-settlement-date').textContent = fine.settlementDate ? formatDate(fine.settlementDate) : '-';
    
    // Update status
    const statusBadge = document.getElementById('modal-status');
    statusBadge.textContent = fine.status;
    statusBadge.className = 'status-badge';
    if (fine.status === 'Pending') {
        statusBadge.classList.add('status-pending');
        document.getElementById('modal-waive-btn').style.display = 'block';
        document.getElementById('modal-pay-btn').style.display = 'block';
        document.getElementById('modal-pdf-btn').style.display = 'none';
    } else if (fine.status === 'Paid' || fine.status === 'Waived') {
        statusBadge.classList.add(fine.status === 'Paid' ? 'status-ready' : 'status-waived');
        document.getElementById('modal-waive-btn').style.display = 'none';
        document.getElementById('modal-pay-btn').style.display = 'none';
        document.getElementById('modal-pdf-btn').style.display = 'block';
    }
    
    document.getElementById('modal-remarks').textContent = fine.remarks || 'No remarks provided';
    
    // Show modal
    fineModal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

// Show waive modal
function showWaiveModal() {
    document.getElementById('waive-reason').value = '';
    fineModal.classList.remove('show');
    waiveModal.classList.add('show');
}

// Show pay modal
function showPayModal() {
    const fine = allFines.find(f => f.id == currentFineId);
    if (!fine) return;
    
    // Set default amount to the fine amount
    document.getElementById('payment-amount').value = fine.amount;
    document.getElementById('payment-method').value = 'cash';
    document.getElementById('payment-notes').value = '';
    
    fineModal.classList.remove('show');
    payModal.classList.add('show');
}

// Close all modals
function closeAllModals() {
    document.querySelectorAll('.modal').forEach(modal => {
        modal.classList.remove('show');
    });
    document.body.style.overflow = 'auto';
}

// Confirm waiver
function confirmWaiver() {
    const reason = document.getElementById('waive-reason').value.trim();
    if (!reason) {
        showToast('Please enter a waiver reason', 'error');
        return;
    }
    
    const fineIndex = allFines.findIndex(f => f.id == currentFineId);
    if (fineIndex === -1) return;
    
    // Update fine
    allFines[fineIndex].status = 'Waived';
    allFines[fineIndex].waiverReason = reason;
    allFines[fineIndex].settlementDate = new Date().toISOString().split('T')[0];
    allFines[fineIndex].settledBy = "Admin User"; // In real app, use logged in user
    
    // Show success message
    showToast('Fine waived successfully', 'success');
    
    // Close modals and refresh table
    closeAllModals();
    filterAndRenderFines();
}

// Confirm payment
function confirmPayment() {
    const amount = parseFloat(document.getElementById('payment-amount').value);
    const method = document.getElementById('payment-method').value;
    const notes = document.getElementById('payment-notes').value.trim();
    
    if (!amount || amount <= 0) {
        showToast('Please enter a valid payment amount', 'error');
        return;
    }
    
    const fineIndex = allFines.findIndex(f => f.id == currentFineId);
    if (fineIndex === -1) return;
    
    // Generate receipt number
    const receiptNo = 'RCPT-' + Math.floor(100000 + Math.random() * 900000);
    
    // Update fine
    allFines[fineIndex].status = 'Paid';
    allFines[fineIndex].amountPaid = amount;
    allFines[fineIndex].paymentMethod = method;
    allFines[fineIndex].paymentNotes = notes;
    allFines[fineIndex].receiptNo = receiptNo;
    allFines[fineIndex].settlementDate = new Date().toISOString().split('T')[0];
    allFines[fineIndex].settledBy = "Admin User"; // In real app, use logged in user
    
    // Show success message
    showToast('Payment recorded successfully', 'success');
    
    // Close modals and refresh table
    closeAllModals();
    filterAndRenderFines();
}

// Generate receipt for current fine
function generateCurrentReceipt() {
    const fine = allFines.find(f => f.id == currentFineId);
    if (fine) {
        generateReceiptPDF(fine);
    }
}

// Generate PDF receipt for a fine
function generateReceiptPDF(fine) {
    // Create new PDF
    const doc = new jsPDF();
    
    // Add logo or header
    doc.setFontSize(18);
    doc.setTextColor(32, 67, 213);
    doc.text('Library Fine Receipt', 105, 20, { align: 'center' });
    
    doc.setFontSize(12);
    doc.setTextColor(100, 100, 100);
    doc.text('Receipt No: ' + (fine.receiptNo || 'N/A'), 105, 30, { align: 'center' });
    
    // Add a line
    doc.setDrawColor(200, 200, 200);
    doc.line(20, 35, 190, 35);
    
    // Add fine details
    doc.setFontSize(12);
    doc.setTextColor(0, 0, 0);
    
    let yPosition = 45;
    
    // Book Information
    doc.setFont(undefined, 'bold');
    doc.text('Book Information:', 20, yPosition);
    doc.setFont(undefined, 'normal');
    
    yPosition += 10;
    doc.text(`Title: ${fine.bookTitle}`, 20, yPosition);
    yPosition += 7;
    doc.text(`Author: ${fine.author}`, 20, yPosition);
    yPosition += 7;
    doc.text(`ISBN: ${fine.isbn}`, 20, yPosition);
    
    yPosition += 15;
    
    // User Information
    doc.setFont(undefined, 'bold');
    doc.text('User Information:', 20, yPosition);
    doc.setFont(undefined, 'normal');
    
    yPosition += 10;
    doc.text(`Name: ${fine.name}`, 20, yPosition);
    yPosition += 7;
    doc.text(`Username: ${fine.username}`, 20, yPosition);
    yPosition += 7;
    doc.text(`Email: ${fine.email}`, 20, yPosition);
    
    yPosition += 15;
    
    // Fine Details
    doc.setFont(undefined, 'bold');
    doc.text('Fine Details:', 20, yPosition);
    doc.setFont(undefined, 'normal');
    
    yPosition += 10;
    doc.text(`Penalty Reason: ${fine.penaltyReason}`, 20, yPosition);
    yPosition += 7;
    doc.text(`Amount: ${formatCurrency(fine.amount)}`, 20, yPosition);
    yPosition += 7;
    doc.text(`Penalty Date: ${formatDate(fine.penaltyDate)}`, 20, yPosition);
    yPosition += 7;
    doc.text(`Status: ${fine.status}`, 20, yPosition);
    
    // Payment details if paid
    if (fine.status === 'Paid') {
        yPosition += 15;
        doc.setFont(undefined, 'bold');
        doc.text('Payment Details:', 20, yPosition);
        doc.setFont(undefined, 'normal');
        
        yPosition += 10;
        doc.text(`Amount Paid: ${formatCurrency(fine.amountPaid)}`, 20, yPosition);
        yPosition += 7;
        doc.text(`Payment Method: ${fine.paymentMethod}`, 20, yPosition);
        yPosition += 7;
        doc.text(`Payment Date: ${formatDate(fine.settlementDate)}`, 20, yPosition);
        yPosition += 7;
        doc.text(`Processed By: ${fine.settledBy}`, 20, yPosition);
    }
    
    // Add waiver details if waived
    if (fine.status === 'Waived') {
        yPosition += 15;
        doc.setFont(undefined, 'bold');
        doc.text('Waiver Details:', 20, yPosition);
        doc.setFont(undefined, 'normal');
        
        yPosition += 10;
        doc.text(`Waiver Reason: ${fine.waiverReason}`, 20, yPosition);
        yPosition += 7;
        doc.text(`Waiver Date: ${formatDate(fine.settlementDate)}`, 20, yPosition);
        yPosition += 7;
        doc.text(`Processed By: ${fine.settledBy}`, 20, yPosition);
    }
    
    // Add remarks if available
    if (fine.remarks) {
        yPosition += 15;
        doc.setFont(undefined, 'bold');
        doc.text('Remarks:', 20, yPosition);
        doc.setFont(undefined, 'normal');
        
        yPosition += 10;
        const splitRemarks = doc.splitTextToSize(fine.remarks, 170);
        doc.text(splitRemarks, 20, yPosition);
    }
    
    // Add footer
    doc.setFontSize(10);
    doc.setTextColor(100, 100, 100);
    doc.text('Generated on ' + new Date().toLocaleDateString(), 105, 280, { align: 'center' });
    
    // Save the PDF
    doc.save(`Fine_${fine.id}_${fine.name.replace(' ', '_')}_Receipt.pdf`);
    
    // Show success message
    showToast('Receipt generated successfully', 'success');
}

// Refresh data
function refreshData() {
    const btn = document.getElementById('refresh-btn');
    const icon = btn.querySelector('i');
    const originalIconClass = icon.className;
    
    // Show loading state
    icon.className = 'fas fa-spinner fa-spin';
    btn.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        // Reset button
        icon.className = originalIconClass;
        btn.disabled = false;
        
        // Show success message
        showToast('Data refreshed successfully', 'success');
        
        // In a real app, you would fetch new data here
        filterAndRenderFines();
    }, 1000);
}

// Show toast notification
function showToast(message, type = 'success') {
    const toastMessage = document.getElementById('toast-message');
    toastMessage.textContent = message;
    
    // Update icon based on type
    const icon = toast.querySelector('i');
    if (type === 'success') {
        icon.className = 'fas fa-check-circle';
        toast.className = 'toast show';
    } else if (type === 'error') {
        icon.className = 'fas fa-exclamation-circle';
        toast.className = 'toast show error';
    } else if (type === 'warning') {
        icon.className = 'fas fa-exclamation-triangle';
        toast.className = 'toast show warning';
    }
    
    // Hide after 3 seconds
    setTimeout(() => {
        toast.className = 'toast';
    }, 3000);
}

// Helper function to format dates
function formatDate(dateString) {
    if (!dateString) return '-';
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

// Helper function to format currency
function formatCurrency(amount) {
    return '₱' + parseFloat(amount).toFixed(2);
}

// Helper function to debounce rapid events
function debounce(func, wait) {
    let timeout;
    return function() {
        const context = this, args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            func.apply(context, args);
        }, wait);
    };
}

// Generate sample fine data
function generateSampleFines(count) {
    const books = [
        { title: "A Brief History of Humankind", author: "Yuval Noah Harari", isbn: "978-006238180", section: "Anthropology" },
        { title: "Sapiens: A Brief History of Humankind", author: "Yuval Noah Harari", isbn: "978-006231609", section: "Anthropology" },
        { title: "The Art of Computer Programming", author: "Donald Knuth", isbn: "978-0201896831", section: "Computer Science" },
        { title: "Clean Code", author: "Robert C. Martin", isbn: "978-0132350884", section: "Computer Science" },
        { title: "Design Patterns", author: "Erich Gamma", isbn: "978-0201633610", section: "Computer Science" }
    ];
    
    const names = [
        "Liam Bennett", "Emma Wilson", "Noah Johnson", "Olivia Davis", 
        "William Taylor", "Ava Brown", "James Miller", "Isabella Anderson"
    ];
    
    const penaltyReasons = [
        "Late return", "Damaged book", "Lost book", 
        "Highlighted pages", "Torn cover", "Water damage"
    ];
    
    const statuses = ["Pending", "Paid", "Waived"];
    
    const fines = [];
    
    for (let i = 1; i <= count; i++) {
        const book = books[Math.floor(Math.random() * books.length)];
        const name = names[Math.floor(Math.random() * names.length)];
        const status = statuses[Math.floor(Math.random() * statuses.length)];
        const amount = (Math.random() * 500 + 50).toFixed(2); // Random amount between 50 and 550
        
        // Generate random dates within the last 30 days
        const penaltyDate = new Date();
        penaltyDate.setDate(penaltyDate.getDate() - Math.floor(Math.random() * 30));
        
        let settlementDate = null;
        let receiptNo = null;
        let settledBy = null;
        
        if (status !== "Pending") {
            settlementDate = new Date(penaltyDate);
            settlementDate.setDate(penaltyDate.getDate() + Math.floor(Math.random() * 5) + 1);
            
            if (status === "Paid") {
                receiptNo = 'RCPT-' + Math.floor(100000 + Math.random() * 900000);
            }
            
            settledBy = ["Sarah Johnson", "Michael Brown", "David Wilson", "Jennifer Lee"][Math.floor(Math.random() * 4)];
        }
        
        fines.push({
            id: i,
            bookTitle: book.title,
            author: book.author,
            isbn: book.isbn,
            section: book.section,
            name: name,
            username: `2021-${Math.floor(100000 + Math.random() * 900000)}`,
            email: `2021-${Math.floor(100000 + Math.random() * 900000)}@rtu.edu.ph`,
            penaltyBy: ["System", "Librarian"][Math.floor(Math.random() * 2)],
            settledBy: settledBy,
            penaltyReason: penaltyReasons[Math.floor(Math.random() * penaltyReasons.length)],
            amount: amount,
            remarks: Math.random() > 0.5 ? "Please pay at the library counter" : null,
            receiptNo: receiptNo,
            penaltyDate: penaltyDate.toISOString().split('T')[0],
            settlementDate: settlementDate ? settlementDate.toISOString().split('T')[0] : null,
            status: status,
            paymentMethod: status === "Paid" ? ["Cash", "Credit Card", "Debit Card"][Math.floor(Math.random() * 3)] : null,
            waiverReason: status === "Waived" ? "First time offense" : null
        });
    }
    
    return fines;
}