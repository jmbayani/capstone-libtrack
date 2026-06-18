        // Initialize jsPDF
        const { jsPDF } = window.jspdf;
        
        // DOM Elements
        const reservationTableBody = document.getElementById('reservation-table-body');
        const emptyState = document.getElementById('empty-state');
        const reservationModal = document.getElementById('reservationModal');
        const cancelModal = document.getElementById('cancelModal');
        const processModal = document.getElementById('processModal');
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
        let allReservations = [];
        let currentReservationId = null;
        
        // Pagination variables
        let currentPage = 1;
        let pageSize = 10;
        let filteredReservations = [];
        let totalPages = 1;
        
        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Load sample data
            allReservations = generateSampleReservations(50);
            
            // Initialize pagination
            setupPagination();
            
            // Render initial table
            filterAndRenderReservations();
            
            // Set up event listeners
            setupEventListeners();
        });
        
        // Set up all event listeners
        function setupEventListeners() {
            // Status filter checkboxes
            document.querySelectorAll('.checkbox-item input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', filterAndRenderReservations);
            });
            
            // Date inputs
            document.getElementById('start-date').addEventListener('change', filterAndRenderReservations);
            document.getElementById('end-date').addEventListener('change', filterAndRenderReservations);
            
            // Search inputs
            document.getElementById('search-query').addEventListener('input', debounce(filterAndRenderReservations, 300));
            document.getElementById('search-type').addEventListener('change', filterAndRenderReservations);
            
            // Buttons
            document.getElementById('refresh-btn').addEventListener('click', refreshData);
            
            // Modal buttons
            document.querySelectorAll('.close-modal').forEach(btn => {
                btn.addEventListener('click', closeAllModals);
            });
            
            // Reservation modal buttons
            document.getElementById('modal-cancel-btn').addEventListener('click', showCancelModal);
            document.getElementById('modal-process-btn').addEventListener('click', showProcessModal);
            document.getElementById('modal-pdf-btn').addEventListener('click', generateCurrentPDF);
            
            // Cancel modal buttons
            document.getElementById('cancel-cancel-btn').addEventListener('click', () => {
                cancelModal.classList.remove('show');
                reservationModal.classList.add('show');
            });
            document.getElementById('cancel-confirm-btn').addEventListener('click', confirmCancellation);
            
            // Process modal buttons
            document.getElementById('process-cancel-btn').addEventListener('click', () => {
                processModal.classList.remove('show');
                reservationModal.classList.add('show');
            });
            document.getElementById('process-confirm-btn').addEventListener('click', confirmProcessing);
            
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
        
        // Filter and render reservations based on current filters
        function filterAndRenderReservations() {
            // Get current filter values
            const pendingChecked = document.getElementById('pending').checked;
            const readyChecked = document.getElementById('ready').checked;
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;
            const searchType = document.getElementById('search-type').value;
            const searchQuery = document.getElementById('search-query').value.toLowerCase();
            
            // Filter by status
            filteredReservations = allReservations.filter(reservation => {
                if (reservation.status === 'Pending' && !pendingChecked) return false;
                if (reservation.status === 'Ready' && !readyChecked) return false;
                return true;
            });
            
            // Filter by date range
            if (startDate) {
                const startDateObj = new Date(startDate);
                filteredReservations = filteredReservations.filter(reservation => {
                    const reservationDate = new Date(reservation.reservedDate);
                    return reservationDate >= startDateObj;
                });
            }
            
            if (endDate) {
                const endDateObj = new Date(endDate);
                endDateObj.setHours(23, 59, 59, 999); // Include entire end day
                filteredReservations = filteredReservations.filter(reservation => {
                    const reservationDate = new Date(reservation.reservedDate);
                    return reservationDate <= endDateObj;
                });
            }
            
            // Filter by search query
            if (searchQuery) {
                filteredReservations = filteredReservations.filter(reservation => {
                    if (searchType === 'all') {
                        return (
                            reservation.bookTitle.toLowerCase().includes(searchQuery) ||
                            reservation.reservedBy.toLowerCase().includes(searchQuery) ||
                            reservation.isbn.toLowerCase().includes(searchQuery)
                        );
                    } else if (searchType === 'name') {
                        return reservation.reservedBy.toLowerCase().includes(searchQuery);
                    } else if (searchType === 'book') {
                        return reservation.bookTitle.toLowerCase().includes(searchQuery);
                    } else if (searchType === 'isbn') {
                        return reservation.isbn.toLowerCase().includes(searchQuery);
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
            totalPages = Math.ceil(filteredReservations.length / pageSize);
            
            // Update pagination info
            const startItem = (currentPage - 1) * pageSize + 1;
            const endItem = Math.min(currentPage * pageSize, filteredReservations.length);
            paginationInfo.textContent = `Showing ${startItem}-${endItem} of ${filteredReservations.length} entries`;
            
            // Enable/disable pagination buttons
            firstPageBtn.classList.toggle('disabled', currentPage === 1);
            prevPageBtn.classList.toggle('disabled', currentPage === 1);
            nextPageBtn.classList.toggle('disabled', currentPage === totalPages);
            lastPageBtn.classList.toggle('disabled', currentPage === totalPages);
            
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
            if (filteredReservations.length === 0) {
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
            pageBtn.classList.toggle('active', pageNumber === currentPage);
            
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
            reservationTableBody.innerHTML = '';
            
            // Calculate start and end index for current page
            const startIndex = (currentPage - 1) * pageSize;
            const endIndex = Math.min(startIndex + pageSize, filteredReservations.length);
            
            // Add rows for current page
            for (let i = startIndex; i < endIndex; i++) {
                const reservation = filteredReservations[i];
                const row = document.createElement('tr');
                row.className = 'reservation-row';
                row.setAttribute('data-id', reservation.id);
                
                // Format date
                const reservedDate = formatDate(reservation.reservedDate);
                
                // Determine status badge class
                let statusClass = reservation.status === 'Ready' ? 'status-ready' : 'status-pending';
                
                row.innerHTML = `
                    <td class="book-title">${reservation.bookTitle}</td>
                    <td>${reservation.reservedBy}</td>
                    <td>${reservedDate}</td>
                    <td><span class="status-badge ${statusClass}">${reservation.status}</span></td>
                `;
                
                // Add click handler to show reservation details
                row.addEventListener('click', () => {
                    showReservationModal(reservation.id);
                });
                
                reservationTableBody.appendChild(row);
            }
        }
        
        // Show reservation modal
        function showReservationModal(reservationId) {
            const reservation = allReservations.find(r => r.id == reservationId);
            if (!reservation) return;
            
            currentReservationId = reservationId;
            
            // Populate modal with reservation data
            document.getElementById('modal-book-title').textContent = reservation.bookTitle;
            document.getElementById('modal-author').textContent = reservation.author;
            document.getElementById('modal-isbn').textContent = reservation.isbn;
            document.getElementById('modal-subject').textContent = reservation.section;
            document.getElementById('modal-reserved-by').textContent = reservation.reservedBy;
            document.getElementById('modal-username').textContent = reservation.username;
            document.getElementById('modal-email').textContent = reservation.email;
            document.getElementById('modal-contact').textContent = reservation.contact;
            document.getElementById('modal-reserved-date').textContent = formatDate(reservation.reservedDate);
            document.getElementById('modal-pickup-date').textContent = reservation.pickupDate ? formatDate(reservation.pickupDate) : '-';
            document.getElementById('modal-copies').textContent = reservation.copies;
            document.getElementById('modal-location').textContent = reservation.location;
            document.getElementById('modal-status').textContent = reservation.status;
            document.getElementById('modal-notes').textContent = reservation.notes || 'No notes provided';
            
            // Update status badge class
            const statusBadge = document.getElementById('modal-status');
            statusBadge.className = 'status-badge';
            
            if (reservation.status === 'Pending') {
                statusBadge.classList.add('status-pending');
                document.getElementById('modal-cancel-btn').style.display = 'block';
                document.getElementById('modal-process-btn').style.display = 'block';
                document.getElementById('modal-pdf-btn').style.display = 'none';
            } else if (reservation.status === 'Ready') {
                statusBadge.classList.add('status-ready');
                document.getElementById('modal-cancel-btn').style.display = 'none';
                document.getElementById('modal-process-btn').style.display = 'none';
                document.getElementById('modal-pdf-btn').style.display = 'block';
            }
            
            // Show modal
            reservationModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
        
        // Show cancel modal
        function showCancelModal() {
            document.getElementById('cancel-reason').value = '';
            reservationModal.classList.remove('show');
            cancelModal.classList.add('show');
        }
        
        // Show process modal
        function showProcessModal() {
            // Set default pickup date to tomorrow
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const formattedDate = tomorrow.toISOString().split('T')[0];
            
            document.getElementById('pickup-date').value = formattedDate;
            document.getElementById('process-notes').value = '';
            
            reservationModal.classList.remove('show');
            processModal.classList.add('show');
        }
        
        // Close all modals
        function closeAllModals() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
            document.body.style.overflow = 'auto';
        }
        
        // Confirm cancellation
        function confirmCancellation() {
            const reason = document.getElementById('cancel-reason').value.trim();
            if (!reason) {
                showToast('Please enter a cancellation reason', 'error');
                return;
            }
            
            const reservationIndex = allReservations.findIndex(r => r.id == currentReservationId);
            if (reservationIndex === -1) return;
            
            // Add cancellation reason to reservation
            allReservations[reservationIndex].cancellationReason = reason;
            allReservations[reservationIndex].cancellationDate = new Date().toISOString().split('T')[0];
            
            // Remove reservation
            allReservations.splice(reservationIndex, 1);
            
            // Show success message
            showToast('Reservation cancelled successfully', 'success');
            
            // Close modals and refresh table
            closeAllModals();
            filterAndRenderReservations();
        }
        
        // Confirm processing
        function confirmProcessing() {
            const pickupDate = document.getElementById('pickup-date').value;
            const notes = document.getElementById('process-notes').value.trim();
            
            if (!pickupDate) {
                showToast('Please select a pick-up date', 'error');
                return;
            }
            
            const reservationIndex = allReservations.findIndex(r => r.id == currentReservationId);
            if (reservationIndex === -1) return;
            
            // Update reservation
            allReservations[reservationIndex].status = 'Ready';
            allReservations[reservationIndex].pickupDate = pickupDate;
            allReservations[reservationIndex].processNotes = notes;
            allReservations[reservationIndex].processedDate = new Date().toISOString().split('T')[0];
            
            // Show success message
            showToast('Reservation processed successfully', 'success');
            
            // Close modals and refresh table
            closeAllModals();
            filterAndRenderReservations();
        }
        
        // Generate PDF for current reservation
        function generateCurrentPDF() {
            const reservation = allReservations.find(r => r.id == currentReservationId);
            if (reservation) {
                generateReservationPDF(reservation);
            }
        }
        
        // Generate PDF for a reservation
        function generateReservationPDF(reservation) {
            // Create new PDF
            const doc = new jsPDF();
            
            // Add logo or header
            doc.setFontSize(18);
            doc.setTextColor(32, 67, 213);
            doc.text('Library Reservation Details', 105, 20, { align: 'center' });
            
            doc.setFontSize(12);
            doc.setTextColor(100, 100, 100);
            doc.text('Reservation ID: ' + reservation.id, 105, 30, { align: 'center' });
            
            // Add a line
            doc.setDrawColor(200, 200, 200);
            doc.line(20, 35, 190, 35);
            
            // Add reservation details
            doc.setFontSize(12);
            doc.setTextColor(0, 0, 0);
            
            let yPosition = 45;
            
            // Book Information
            doc.setFont(undefined, 'bold');
            doc.text('Book Information:', 20, yPosition);
            doc.setFont(undefined, 'normal');
            
            yPosition += 10;
            doc.text(`Title: ${reservation.bookTitle}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Author: ${reservation.author}`, 20, yPosition);
            yPosition += 7;
            doc.text(`ISBN: ${reservation.isbn}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Section: ${reservation.section}`, 20, yPosition);
            
            yPosition += 15;
            
            // User Information
            doc.setFont(undefined, 'bold');
            doc.text('User Information:', 20, yPosition);
            doc.setFont(undefined, 'normal');
            
            yPosition += 10;
            doc.text(`Name: ${reservation.reservedBy}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Username: ${reservation.username}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Email: ${reservation.email}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Contact: ${reservation.contact}`, 20, yPosition);
            
            yPosition += 15;
            
            // Reservation Details
            doc.setFont(undefined, 'bold');
            doc.text('Reservation Details:', 20, yPosition);
            doc.setFont(undefined, 'normal');
            
            yPosition += 10;
            doc.text(`Reserved Date: ${formatDate(reservation.reservedDate)}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Pick-up Date: ${reservation.pickupDate ? formatDate(reservation.pickupDate) : '-'}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Status: ${reservation.status}`, 20, yPosition);
            yPosition += 7;
            doc.text(`Location: ${reservation.location}`, 20, yPosition);
            
            // Add processing notes if available
            if (reservation.processNotes) {
                yPosition += 15;
                doc.setFont(undefined, 'bold');
                doc.text('Processing Notes:', 20, yPosition);
                doc.setFont(undefined, 'normal');
                
                yPosition += 10;
                const splitNotes = doc.splitTextToSize(reservation.processNotes, 170);
                doc.text(splitNotes, 20, yPosition);
            }
            
            // Add footer
            doc.setFontSize(10);
            doc.setTextColor(100, 100, 100);
            doc.text('Generated on ' + new Date().toLocaleDateString(), 105, 280, { align: 'center' });
            
            // Save the PDF
            doc.save(`Reservation_${reservation.id}_${reservation.reservedBy.replace(' ', '_')}.pdf`);
            
            // Show success message
            showToast('PDF generated successfully', 'success');
        }
        
        // Refresh data
        function refreshData() {
            const btn = document.getElementById('refresh-btn');
            const icon = btn.querySelector('i');
            const originalIconClass = icon.className;
            
            // Show loading state
            icon.className = 'fas fa-spinner spinner';
            btn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                icon.className = originalIconClass;
                btn.disabled = false;
                
                // Show success message
                showToast('Data refreshed successfully', 'success');
                
                // In a real app, you would fetch new data here
                filterAndRenderReservations();
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
        
        // Generate sample reservation data
        function generateSampleReservations(count) {
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
            
            const locations = ["Main Library", "Science Library", "Engineering Library", "Arts Library"];
            const statuses = ["Pending", "Ready"];
            
            const reservations = [];
            
            for (let i = 1; i <= count; i++) {
                const book = books[Math.floor(Math.random() * books.length)];
                const name = names[Math.floor(Math.random() * names.length)];
                const status = statuses[Math.floor(Math.random() * statuses.length)];
                
                // Generate random dates within the last 30 days
                const reservedDate = new Date();
                reservedDate.setDate(reservedDate.getDate() - Math.floor(Math.random() * 30));
                
                let pickupDate = null;
                
                if (status === "Ready") {
                    pickupDate = new Date(reservedDate);
                    pickupDate.setDate(pickupDate.getDate() + Math.floor(Math.random() * 5) + 1);
                }
                
                reservations.push({
                    id: i,
                    bookTitle: book.title,
                    author: book.author,
                    isbn: book.isbn,
                    section: book.section,
                    reservedBy: name,
                    username: `2021-${Math.floor(100000 + Math.random() * 900000)}`,
                    email: `2021-${Math.floor(100000 + Math.random() * 900000)}@rtu.edu.ph`,
                    contact: `0${Math.floor(1000000000 + Math.random() * 9000000000)}`.slice(0, 11),
                    reservedDate: reservedDate.toISOString().split('T')[0],
                    pickupDate: pickupDate ? pickupDate.toISOString().split('T')[0] : null,
                    copies: `${Math.floor(Math.random() * 3) + 1} Copy${Math.floor(Math.random() * 3) + 1 > 1 ? 's' : ''}`,
                    location: locations[Math.floor(Math.random() * locations.length)],
                    status: status,
                    librarian: ["Sarah Johnson", "Michael Brown", "David Wilson", "Jennifer Lee"][Math.floor(Math.random() * 4)],
                    notes: Math.random() > 0.5 ? "I need this book for my research. Thanks!" : null
                });
            }
            
            return reservations;
        }