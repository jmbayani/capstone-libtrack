<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../public/css/ReserveBooks_Style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <title>Reserved Books</title>
    <style>
    </style>
</head>
<body>
    <div class="main-container">
        <div class="header">
            <h1>Reserved Books</h1>
            <div class="header-actions">
                <button class="generate-btn" id="refresh-btn">
                    <i class="fas fa-sync-alt"></i>
                    Refresh
                </button>
            </div>
        </div>
        
        <div class="container">
            <div class="form-row">
                <div class="form-group">
                    <h2>Status</h2>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="pending" checked>
                            <label for="pending" class="status-label">Pending</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="ready" checked>
                            <label for="ready" class="status-label">Ready</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <h2>Date Range</h2>
                    <div class="date-range-container" style="display: flex; gap: 15px;">
                        <div style="flex: 1;">
                            <div class="date-input-container">
                                <input type="text" class="date-input" id="start-date" placeholder="Start date">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="date-input-container">
                                <input type="text" class="date-input" id="end-date" placeholder="End date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group" style="flex: 2;">
                    <h2>Search</h2>
                    <div class="search-container">
                        <select class="search-filter" id="search-type">
                            <option value="all">All Fields</option>
                            <option value="name">Name</option>
                            <option value="book">Book Title</option>
                            <option value="author">Author</option>
                            <option value="subject">Subject</option>
                        </select>
                        <input type="text" class="search-input" id="search-query" placeholder="Search for reserved books...">
                        <button class="generate-btn" style="width: auto; padding: 0 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>
        
        <!-- Reservation Table -->
        <div class="table-container">
            <table class="reservation-table">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Reserved By</th>
                        <th>Reserved Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="reservation-table-body">
                    <!-- Rows will be populated by JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="pagination-container">
            <div class="pagination-info" id="pagination-info">
                Showing 1-10 of 50 entries
            </div>
            <div class="pagination-controls">
                <select class="page-size-selector" id="page-size-selector">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                    <option value="100">100 per page</option>
                </select>
                <button class="pagination-btn" id="first-page-btn" title="First page">
                    <i class="fas fa-angle-double-left"></i>
                </button>
                <button class="pagination-btn" id="prev-page-btn" title="Previous page">
                    <i class="fas fa-angle-left"></i>
                </button>
                <div id="page-numbers">
                    <!-- Page numbers will be inserted here -->
                </div>
                <button class="pagination-btn" id="next-page-btn" title="Next page">
                    <i class="fas fa-angle-right"></i>
                </button>
                <button class="pagination-btn" id="last-page-btn" title="Last page">
                    <i class="fas fa-angle-double-right"></i>
                </button>
            </div>
        </div>
        
        <!-- Empty State (hidden by default) -->
        <div class="empty-state" id="empty-state" style="display: none;">
            <i class="fas fa-book-open"></i>
            <p>No reservations found matching your criteria</p>
        </div>
    </div>
    
    <!-- Reservation Detail Modal -->
    <div class="modal" id="reservationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Reservation Details</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Book Title</span>
                        <p class="detail-value" id="modal-book-title">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Author</span>
                        <p class="detail-value" id="modal-author">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">ISBN</span>
                        <p class="detail-value" id="modal-isbn">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Subject</span>
                        <p class="detail-value" id="modal-subject">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Reserved By</span>
                        <p class="detail-value" id="modal-reserved-by">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Username</span>
                        <p class="detail-value" id="modal-username">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email</span>
                        <p class="detail-value" id="modal-email">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Contact</span>
                        <p class="detail-value" id="modal-contact">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Reserved Date</span>
                        <p class="detail-value" id="modal-reserved-date">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Pick-up Date</span>
                        <p class="detail-value" id="modal-pickup-date">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Total Copies</span>
                        <p class="detail-value" id="modal-copies">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Pick-up Location</span>
                        <p class="detail-value" id="modal-location">-</p>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Status</span>
                        <p class="detail-value"><span class="status-badge" id="modal-status">-</span></p>
                    </div>
                    <div class="user-notes">
                        <span class="detail-label">User Notes</span>
                        <p class="detail-value" id="modal-notes">No notes provided</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-btn cancel-btn" id="modal-cancel-btn">Cancel Reservation</button>
                <button class="modal-btn process-btn" id="modal-process-btn">Process Reservation</button>
                <button class="modal-btn complete-btn" id="modal-pdf-btn">Generate PDF</button>
            </div>
        </div>
    </div>
    
    <!-- Cancel Reservation Modal -->
    <div class="modal" id="cancelModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Cancel Reservation</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-control">
                    <label for="cancel-reason">Reason for Cancellation:</label>
                    <textarea id="cancel-reason" placeholder="Enter the reason for cancellation..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-btn cancel-btn" id="cancel-cancel-btn">Back</button>
                <button class="modal-btn complete-btn" id="cancel-confirm-btn">Confirm Cancellation</button>
            </div>
        </div>
    </div>
    
    <!-- Process Reservation Modal -->
    <div class="modal" id="processModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Process Reservation</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-control">
                    <label for="pickup-date">Pick-up Date:</label>
                    <input type="date" id="pickup-date">
                </div>
                <div class="form-control">
                    <label for="process-notes">Processing Notes:</label>
                    <textarea id="process-notes" placeholder="Enter any processing notes..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-btn cancel-btn" id="process-cancel-btn">Back</button>
                <button class="modal-btn process-btn" id="process-confirm-btn">Confirm Processing</button>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <span id="toast-message">Operation completed successfully</span>
    </div>
    <script src="script/ReserveBooks_Script.js"></script>
</body>
</html>