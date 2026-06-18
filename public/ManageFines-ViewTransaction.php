<?php
$fineDetails = [
    'bookTitle' => 'Sample Book Title',
    'author' => 'John Doe',
    'isbn' => '978-3-16-148410-0',
    'name' => 'Jane Smith',
    'username' => 'janesmith',
    'email' => 'jane.smith@example.com',
    'accessionNo' => 'A123456',
    'contact' => '09123456789',
    'penaltyDate' => '2025-04-01',
    'penaltyReason' => 'Overdue Return',
    'remarks' => 'Handled with notice',
    'time' => '14:30',
    'amount' => '150.00',
    'status' => 'Unsettled',
    'penaltyBy' => 'Librarian 1',
    'settledBy' => '',
    'receiptNo' => 'RCP-2025-0001',
];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Fine Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #2043D5;
            --light-blue: #EFF5FF;
            --dark-blue: #0a269d;
            --white: #ffffff;
            --black: #333333;
            --gray: #dddddd;
            --green: #28a745;
            --red: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-blue);
            color: var(--black);
            line-height: 1.6;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: var(--primary-blue);
            color: var(--white);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--primary-blue);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid var(--gray);
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-blue);
        }

        .form-control:read-only {
            background-color: #f0f0f0;
            border-color: var(--gray);
        }

        .form-control.editable {
            background-color: var(--white);
            border-color: var(--primary-blue);
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }

        .btn-left {
            margin-right: auto;
        }

        .btn-right {
            margin-left: auto;
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-close {
            background-color: var(--gray);
            color: var(--black);
        }

        .btn-close:hover {
            background-color: #c9c9c9;
        }

        .btn-print {
            background-color: var(--primary-blue);
            color: var(--white);
        }

        .btn-print:hover {
            background-color: var(--dark-blue);
        }

        .btn-edit {
            background-color: var(--green);
            color: var(--white);
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-save {
            background-color: var(--primary-blue);
            color: var(--white);
            display: none;
        }

        .btn-cancel {
            background-color: var(--red);
            color: var(--white);
            display: none;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
        }

        .status-settled {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--green);
        }

        .status-unsettled {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--red);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-left,
            .btn-right {
                margin: 0;
                width: 100%;
            }

            .btn-right {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="header">
            <h1>Fine Details</h1>
        </div>

        <div class="form-container">
            <form id="fineForm">
                <div class="button-group">
                    <div class="btn-left">
                        <button type="button" class="btn btn-close" onclick="window.location.href='ManageFines.php'">
                            <i class="bi bi-x-circle"></i> Close
                        </button>
                    </div>
                    <div class="btn-right">
                        <button type="button" class="btn btn-print" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print
                        </button>
                        <button type="button" class="btn btn-edit">
                             Process
                        </button>
                        <button type="button" class="btn btn-cancel">
                             Add Restriction
                        </button>
                        <button type="button" class="btn btn-edit" id="editBtn">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button type="button" class="btn btn-save" id="saveBtn">
                            <i class="bi bi-check-circle"></i> Save
                        </button>
                        <button type="button" class="btn btn-cancel" id="cancelBtn">
                            <i class="bi bi-x-circle"></i> Cancel
                        </button>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="bookTitle">Book Title</label>
                        <input type="text" id="bookTitle" class="form-control" value="<?= htmlspecialchars($fineDetails['bookTitle']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" class="form-control" value="<?= htmlspecialchars($fineDetails['author']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" id="isbn" class="form-control" value="<?= htmlspecialchars($fineDetails['isbn']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="<?= htmlspecialchars($fineDetails['name']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" value="<?= htmlspecialchars($fineDetails['username']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" value="<?= htmlspecialchars($fineDetails['email']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="accessionNo">Accession No.</label>
                        <input type="text" id="accessionNo" class="form-control" value="<?= htmlspecialchars($fineDetails['accessionNo']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" id="contact" class="form-control" value="<?= htmlspecialchars($fineDetails['contact']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="penaltyDate">Penalty Issued Date</label>
                        <input type="date" id="penaltyDate" class="form-control" value="<?= htmlspecialchars($fineDetails['penaltyDate']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="penaltyReason">Penalty Reason</label>
                        <input type="text" id="penaltyReason" class="form-control" value="<?= htmlspecialchars($fineDetails['penaltyReason']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" id="remarks" class="form-control" value="<?= htmlspecialchars($fineDetails['remarks']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" id="time" class="form-control" value="<?= htmlspecialchars($fineDetails['time']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" id="amount" class="form-control" value="<?= htmlspecialchars($fineDetails['amount']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" disabled>
                            <option value="Settled" <?= $fineDetails['status'] === 'Settled' ? 'selected' : '' ?>>Settled</option>
                            <option value="Unsettled" <?= $fineDetails['status'] === 'Unsettled' ? 'selected' : '' ?>>Unsettled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="penaltyBy">Penalty By</label>
                        <input type="text" id="penaltyBy" class="form-control" value="<?= htmlspecialchars($fineDetails['penaltyBy']) ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="settledBy">Settled By</label>
                        <input type="text" id="settledBy" class="form-control" value="<?= htmlspecialchars($fineDetails['settledBy'] ?: 'N/A') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="receiptNo">Receipt No.</label>
                        <input type="text" id="receiptNo" class="form-control" value="<?= htmlspecialchars($fineDetails['receiptNo']) ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script>
        // Edit/Save functionality
        const editBtn = document.getElementById('editBtn');
        const saveBtn = document.getElementById('saveBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const formControls = document.querySelectorAll('.form-control');
        const statusSelect = document.getElementById('status');
        const fineForm = document.getElementById('fineForm');
        
        // Store original values for cancel
        let originalValues = {};

        editBtn.addEventListener('click', () => {
            // Store original values
            formControls.forEach(control => {
                originalValues[control.id] = control.value;
            });

            // Make fields editable
            formControls.forEach(control => {
                if (control.id !== 'status') {
                    control.readOnly = false;
                    control.classList.add('editable');
                }
            });
            
            // Enable status dropdown
            statusSelect.disabled = false;
            statusSelect.classList.add('editable');

            // Toggle buttons
            editBtn.style.display = 'none';
            saveBtn.style.display = 'flex';
            cancelBtn.style.display = 'flex';
        });

        cancelBtn.addEventListener('click', () => {
            // Restore original values
            formControls.forEach(control => {
                if (originalValues[control.id] !== undefined) {
                    control.value = originalValues[control.id];
                }
            });

            // Make fields readonly again
            formControls.forEach(control => {
                if (control.id !== 'status') {
                    control.readOnly = true;
                    control.classList.remove('editable');
                }
            });
            
            // Disable status dropdown
            statusSelect.disabled = true;
            statusSelect.classList.remove('editable');

            // Toggle buttons
            editBtn.style.display = 'flex';
            saveBtn.style.display = 'none';
            cancelBtn.style.display = 'none';
        });

        saveBtn.addEventListener('click', () => {
            // Here you would typically submit the form via AJAX or regular form submission
            alert('Changes saved! (This would submit to server in a real app)');
            
            // In a real app, you would do something like:
            // const formData = new FormData(fineForm);
            // fetch('update_fine.php', {
            //     method: 'POST',
            //     body: formData
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         // Make fields readonly again
            //         formControls.forEach(control => {
            //             control.readOnly = true;
            //             control.classList.remove('editable');
            //         });
            //         statusSelect.disabled = true;
            //         statusSelect.classList.remove('editable');
            //         
            //         // Toggle buttons
            //         editBtn.style.display = 'flex';
            //         saveBtn.style.display = 'none';
            //         cancelBtn.style.display = 'none';
            //     }
            // });

            // For this demo, we'll just make fields readonly again
            formControls.forEach(control => {
                if (control.id !== 'status') {
                    control.readOnly = true;
                    control.classList.remove('editable');
                }
            });
            
            statusSelect.disabled = true;
            statusSelect.classList.remove('editable');

            // Toggle buttons
            editBtn.style.display = 'flex';
            saveBtn.style.display = 'none';
            cancelBtn.style.display = 'none';
        });

        // Initialize status display
        function updateStatusDisplay() {
            const statusBadge = document.createElement('span');
            statusBadge.className = `status-badge status-${statusSelect.value.toLowerCase()}`;
            statusBadge.textContent = statusSelect.value;
            
            // Replace the select with the badge when not editing
            if (statusSelect.disabled) {
                statusSelect.style.display = 'none';
                if (!statusSelect.previousElementSibling.classList.contains('status-badge')) {
                    statusSelect.parentNode.insertBefore(statusBadge, statusSelect);
                } else {
                    statusSelect.previousElementSibling.className = `status-badge status-${statusSelect.value.toLowerCase()}`;
                    statusSelect.previousElementSibling.textContent = statusSelect.value;
                }
            } else {
                statusSelect.style.display = 'block';
                if (statusSelect.previousElementSibling.classList.contains('status-badge')) {
                    statusSelect.parentNode.removeChild(statusSelect.previousElementSibling);
                }
            }
        }

        // Initialize status display
        updateStatusDisplay();
        
        // Update display when status changes
        statusSelect.addEventListener('change', updateStatusDisplay);
    </script>
</body>
</html>