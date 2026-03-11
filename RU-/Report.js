

let reports= [];


function displayReports() {
    const allReportsSection = document.querySelector('.AllReports');
    if (!allReportsSection) return;

    let reportsHTML = '<h2>All Reports</h2>';
    
    if (reports.length === 0) {
        reportsHTML += '<p style="text-align: center; color: #666;">No reports yet.</p>';
    } else {
        reports.forEach(report => {
            // Set status color
            let statusColor = '#856404';
            let statusBg = '#fff3cd';
            
            reportsHTML += `
                <div class="report-card">
                    <div class="user-header">
                        <img class="icon" src="images/DummyIcon.png" alt="User">
                        <span class="username">${report.reportedUser}</span>
                        <span class="review-stars" style="color: #999; font-size: 12px;">${report.date}</span>
                    </div>
                    <div style="margin-left: 50px;">
                        <p><strong>Misconduct:</strong> <span style="color: #008080;">${report.misconduct}</span></p>
                        <p class="comment">${report.description}</p>
                        <span style="display: inline-block; padding: 3px 10px; background: ${statusBg}; color: ${statusColor}; border-radius: 12px; font-size: 12px; margin-top: 5px;">${report.status}</span>
                    </div>
                </div>
            `;
        });
    }
    
    allReportsSection.innerHTML = reportsHTML;
}

// Function to add a new report
function addReport(reportedUser, misconduct, description) {
    const newReport = {
        id: Date.now(),
        reportedUser: reportedUser,
        misconduct: misconduct,
        description: description,
        date: new Date().toLocaleDateString(),
        status: "pending"
    };
    
    reports.unshift(newReport);
    saveReportsToStorage();
    displayReports();
}

// Function to save reports to localStorage
function saveReportsToStorage() {
    localStorage.setItem('websiteReports', JSON.stringify(reports));
}

// Function to load reports from localStorage
function loadReportsFromStorage() {
    const savedReports = localStorage.getItem('websiteReports');
    
    if (savedReports) {
        reports = JSON.parse(savedReports);
    } else {
        // Default sample reports if none exist
        reports = [
            {
                reportedUser: "john_doe",
                misconduct: "Scam",
                description: "User took payment but never shipped the item.",
                date: "2024-03-15",
                status: "pending"
            },
            {
                reportedUser: "fashion_store",
                misconduct: "Damaged Goods",
                description: "Received damaged items, seller refused refund.",
                date: "2024-03-14",
                status: "pending"
            }
        ];
        saveReportsToStorage();
    }
    
    displayReports();
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on a page with AllReports section
    if (document.querySelector('.AllReports')) {
        loadReportsFromStorage();
    }
    
    // Handle report form submission
    const reportForm = document.getElementById('report_form');
    if (reportForm) {
        reportForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get selected misconduct
            const misconductRadios = document.getElementsByName('misconduct');
            let selectedMisconduct = null;
            
            for (let radio of misconductRadios) {
                if (radio.checked) {
                    selectedMisconduct = radio.value;
                    break;
                }
            }
            
            const reportedUser = document.getElementById('reported_user').value.trim();
            const description = document.getElementById('describe_misconduct').value.trim();
            
            // Validate
            if (!selectedMisconduct) {
                alert('Please select a type of misconduct');
                return;
            }
            
            if (!reportedUser) {
                alert('Please enter the username of the reported user');
                return;
            }
            
            if (!description) {
                alert('Please describe the misconduct');
                return;
            }
            
            // Add report
            addReport(reportedUser, selectedMisconduct, description);
            
            // Show success message
            alert('Report submitted successfully!');
            
            // Reset form
            reportForm.reset();
        });
    }
});




// Sidebar functions
function showSidebar() {
    console.log('Sidebar opened');
}

function closeSidebar() {
    console.log('Sidebar closed');
}