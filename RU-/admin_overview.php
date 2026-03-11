<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        @import url('style.css');
    </style>
      <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="script.js" defer></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">
    
   <style>


    body{
       
    background-image: url("images/card_bg.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover; 

    }


    .AdminAttributes{
        display:grid;
        align-items:center;
        justify-content:center;
    }
    .button{
    margin:10px;
    padding:10px 20px;
    font-size:16px;
    cursor:pointer;
    

    }


    button:hover {
    background-color: #0f766e;
    transform: translateY(-2px);
    box-shadow: 0px 8px 15px rgba(0,0,0,0.2);
}

button:active {
    transform: scale(0.96);
}



.UsersStats {
    max-width: 1200px;
    margin: 0 auto;
}

.stats-row {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.stat-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    flex: 1;
    min-width: 200px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);

    border: 1px solid black; 
    outline: 1px solid black; 
   
}

.stat-card h3 {
    color: #666;
    font-size: 16px;
    margin-bottom: 10px;
}

.stat-number {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.stat-card p {
    color: #999;
    font-size: 14px;
}


.charts-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.chart-container {
    background: white;
    border-radius: 10px;
    padding: 20px;
    flex: 1;
    min-width: 300px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);


    border: 1px solid teal; 
    outline: 1px solid teal; 
}

.chart-container h3 {
    color: #666;
    margin-bottom: 20px;
}

canvas {
    max-height: 300px;
    max-width: 100%;
}



   </style>


<?php require "connection.php" ?>


</head>





<body>

  <header>
        <nav>
             <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
             </div>

            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="75px" height="65px" class="logo-left"></a>
            </div>
            <ul class="nav-links">
                <li><a href=# onclick="closeSidebar()"><img src="images/closeIcon.png" alt="Close Icon" width="30px" height="30px"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="listing.php">Create Listing</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Create_Acount.php">Create Account</a></li>
                    <li><a href="SignIn.php">Sign in</a></li>
                <?php endif; ?>
                <li><a href="CampusMap.php">Map</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="review.php">Reviews</a></li>
                <li><a href="report.php">Report</a></li>
            </ul>

            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>

        </nav>
                 <div class="nav-icons">
    <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
    <a href="wishlist.php"><img src="images/wishlist_heart.png" width="50px" height="40px" id="WishIcon"/></a>
    </div>

    </header>
        <br>

    
    



    <h1 id="adminh2" > Overview </h1>

     <p id="adminp"> View  the    latest   data   </p>

        
  



<div class="UsersStats">
    <h2 class="section-title">User Statistics</h2>

    <div class="stats-row">


        <div class="stat-card">
            <h3>Total Users</h3>
            <div class="stat-number" id="totalUsers">0</div>
            <p>All registered users</p>
        </div>



        <div class="stat-card">
            <h3>New Users</h3>
            <div class="stat-number" id="newUsers">0</div>
            <p>This month</p>
        </div>

        <div class="stat-card">
            <h3>Deleted Users</h3>
            <div class="stat-number" id="deletedUsers">0</div>
            <p>Total removed</p>
        </div>
    </div>





    <div class="charts-row">

        <div class="chart-container">
            <h3>User Distribution</h3>
            <canvas id="userPieChart"></canvas>
        </div>

        <div class="chart-container">
            <h3>Monthly Growth</h3>
            <canvas id="growthLineChart"></canvas>
        </div>
    </div>

</div>

        




<div class="Inventory">   
              <h2 class="section-title">Inventory Statistics</h2>

        <div class="stats-row">

        <div class="stat-card">
            <h3>Total Items</h3>
            <div class="stat-number" id="totalItems">0</div>
            <p>All items in inventory</p>
        </div>

        <div class="stat-card">
            <h3>Items Listed</h3>
            <div class="stat-number" id="itemsListed">0</div>
            <p>This month</p>
        </div>

        <div class="stat-card">
            <h3>Items Removed</h3>
            <div class="stat-number" id="itemsRemoved">0</div>
            <p>Total removed</p>
        </div>

        </div>



        <div class="charts-row">

        <div class="chart-container">
            <h3>Items by Category</h3>
            <canvas id="categoryPieChart"></canvas>
        </div>

        <div class="chart-container">
            <h3>Items Growth</h3>
            <canvas id="itemsGrowthChart"></canvas>
        </div>

    </div>
</div>




         </div>

<div class="Activity">    
            <h2 class="section-title">Site Activity</h2>

    <div class="stats-row">
        <div class="stat-card">
            <h3>Today's Visitors</h3>
            <div class="stat-number" id="todayVisitors">0</div>
            <p>Active today</p>
        </div>


        <div class="stat-card">
            <h3>This Month</h3>
            <div class="stat-number" id="monthlyVisitors">0</div>
            <p>Total this month</p>
        </div>


        <div class="stat-card">
            <h3>Average Daily</h3>
            <div class="stat-number" id="avgDailyVisitors">0</div>
            <p>Last 30 days</p>
        </div>


    </div>



    <div class="charts-row">
        
    
        <div class="chart-container">
            <h3>Daily Visitors (This Week)</h3>
            <canvas id="dailyVisitorsChart"></canvas>
        </div>


        <div class="chart-container">
            <h3>Monthly Visitors (Last 6 Months)</h3>
            <canvas id="monthlyVisitorsChart"></canvas>
        </div>

    </div>


</div>


<br>
<br>


 
 <div class="AdminAttributes">
        <button type="submit">Reports</button>
        <br>
        <button type="submit">Reviews</button>
    <br>
        <button type="submit">Store</button>
    <br>
    </div>

</body>
        

        



    <footer style = "color:rgb(212, 212, 212)">

    
    <div id = "footerLeft">
        <h3> RU Stylish </h3>
        <p> RU stylish? Add items to your wishlist.</p>
        <a href = "index.php"> read more &#x2192 </a>
        <br>
        <p id = "footerBottom">2026 &copy:RUStylish.com</p>
        <p id = "lastModified"></p>
    </div> 

    <div>
        <table id = "footerMiddle">
            <tr>
            <th> Purchasing </th> <th> About </th> <th> Social</th>
            </tr>

            <tr>
                <td> <a href = "index.php">Buy</a></td>
                <td> <a href = "about.php#aboutSite"> Website </a></td>
                <td> <a href = "https://www.instagram.com/ru_stylish/">Instagram</a></li></td>
            </tr>

            <tr>
                <td> <a href = "listing.php"> Sell </a></td>
                <td> <a href = "about.php#aboutCrew"> Crew </a></td>
                <td> <a href = "#"> Youtube </a></td>
            </tr>      
        </table>
    </div>
    

    <div>
        <a id = "footerMap" href="CampusMap.php"> <img src="images/mapicon.png" height = "150px" width="150px" > </a>
    </div>

    <div id = "footerRight">
        <p> Rhodes University <br>
            Makhanda<br>
            Gramahstown <br>
            6139 <br>
            Eastern Cape <br>
            South-Africa <br>
        </p> 


        <p> &#x260F 0789011234 <br>
        &#x2709 Tshikovhi@gmail.com <br>
        </p>
    </div>
<p id="browser"></p> <!-- displays user's browser -->
</footer>


<script>


 document.addEventListener('DOMContentLoaded', function() {

//user data
const userData = {
    total: 1250,
    new: 145,
    deleted: 23
};




const monthlyData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    users: [1000, 1050, 1100, 1150, 1200, 1250]
};

// Null Check !!
        const totalUsersEl = document.getElementById('totalUsers');
        const newUsersEl = document.getElementById('newUsers');
        const deletedUsersEl = document.getElementById('deletedUsers');
        const userPieChart = document.getElementById('userPieChart');
        const growthLineChart = document.getElementById('growthLineChart');

        // Update stat numbers if elements exist
        if (totalUsersEl) totalUsersEl.textContent = userData.total;
        if (newUsersEl) newUsersEl.textContent = userData.new;
        if (deletedUsersEl) deletedUsersEl.textContent = userData.deleted;





//  Pie Chart (shows distribution)
if(userPieChart){
const pieCtx = document.getElementById('userPieChart').getContext('2d');
new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['Active Users', 'Deleted Users'],
        datasets: [{
            data: [userData.total, userData.deleted],
            backgroundColor: ['#36A2EB', '#FF6384'],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
}
 



//  Line Chart (shows growth)
if(growthLineChart){


const lineCtx = document.getElementById('growthLineChart').getContext('2d');
new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: monthlyData.labels,
        datasets: [{
            label: 'Total Users',
            data: monthlyData.users,
            borderColor: '#36A2EB',
            backgroundColor: 'rgba(54, 162, 235, 0.1)',
            tension: 0.1,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

}




//  INVENTORY DATA
const inventoryData = {
    total: 345,
    listed: 28,
    removed: 12,
    categories: {
        labels: ['Shirts', 'Dresses', 'Shoes', 'Pants', 'Hoodies', 'Caps & Beanies'],
        counts: [98, 45, 67, 52, 43, 40]  // Total: 345 items
    },
    growth: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        items: [280, 295, 310, 320, 335, 345]
    }
};

// Get inventory elements
const totalItemsEl = document.getElementById('totalItems');
const itemsListedEl = document.getElementById('itemsListed');
const itemsRemovedEl = document.getElementById('itemsRemoved');
const categoryPieChart = document.getElementById('categoryPieChart');
const itemsGrowthChart = document.getElementById('itemsGrowthChart');

// Update inventory stat numbers
if (totalItemsEl) totalItemsEl.textContent = inventoryData.total;
if (itemsListedEl) itemsListedEl.textContent = inventoryData.listed;
if (itemsRemovedEl) itemsRemovedEl.textContent = inventoryData.removed;

// Category Pie Chart
if (categoryPieChart) {
    const categoryCtx = categoryPieChart.getContext('2d');
    new Chart(categoryCtx, {
        type: 'pie',
        data: {
            labels: inventoryData.categories.labels,
            datasets: [{
                data: inventoryData.categories.counts,
                backgroundColor: [
                    '#FF6B6B',  // Shirts - Red
                    '#4ECDC4',  // Dresses - Turquoise
                    '#45B7D1',  // Shoes - Blue
                    '#96CEB4',  // Pants - Green
                    '#FFE194',  // Hoodies - Yellow
                    '#D4A5A5'   // Caps & Beanies - Pink/Brown
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 11
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value} items (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

// Items Growth Line Chart
if (itemsGrowthChart) {
    const growthCtx = itemsGrowthChart.getContext('2d');
    new Chart(growthCtx, {
        type: 'line',
        data: {
            labels: inventoryData.growth.labels,
            datasets: [{
                label: 'Total Items',
                data: inventoryData.growth.items,
                borderColor: '#96CEB4',
                backgroundColor: 'rgba(150, 206, 180, 0.1)',
                borderWidth: 3,
                pointBackgroundColor: '#96CEB4',
                pointBorderColor: 'white',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7,
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Items: ${context.raw}`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    },
                    title: {
                        display: true,
                        text: 'Number of Items'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            }
        }
    });
}

// category breakdown 
const inventoryHTML = `
    <div class="category-breakdown">
        <h4>Category Breakdown:</h4>
        <ul style="list-style: none; padding: 0;">
            ${inventoryData.categories.labels.map((cat, index) => 
                `<li style="margin: 5px 0;">
                    <span style="display:inline-block; width:15px; height:15px; background-color: ${getCategoryColor(index)}; margin-right:10px;"></span>
                    ${cat}: ${inventoryData.categories.counts[index]} items
                </li>`
            ).join('')}
        </ul>
    </div>
`;


//COLORS
function getCategoryColor(index) {
    const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFE194', '#D4A5A5'];
    return colors[index];
}



// ACTIVITY DATA ///////////////////////////////////////

const activityData = {
    today: 156,
    monthly: 4320,
    avgDaily: 144,
    daily: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        visitors: [120, 145, 132, 168, 190, 210, 156] // Today is Sunday (156)
    },
    monthly: {
        labels: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb'],
        visitors: [3850, 4020, 3950, 4200, 4450, 4320] // Current month: 4320
    },
    hourly: {
        labels: ['12am', '2am', '4am', '6am', '8am', '10am', '12pm', '2pm', '4pm', '6pm', '8pm', '10pm'],
        visitors: [12, 8, 5, 15, 45, 78, 102, 98, 85, 110, 75, 30]
    }
};

// Find busiest day
const busiestDayIndex = activityData.daily.visitors.indexOf(Math.max(...activityData.daily.visitors));
const busiestDay = activityData.daily.labels[busiestDayIndex];
const busiestDayCount = Math.max(...activityData.daily.visitors);

// Get  elements
const todayVisitorsEl = document.getElementById('todayVisitors');
const monthlyVisitorsEl = document.getElementById('monthlyVisitors');
const avgDailyVisitorsEl = document.getElementById('avgDailyVisitors');
const dailyVisitorsChart = document.getElementById('dailyVisitorsChart');
const monthlyVisitorsChart = document.getElementById('monthlyVisitorsChart');
const busiestDayEl = document.getElementById('busiestDay');
const busiestDayCountEl = document.getElementById('busiestDayCount');

// Update  stat numbers
if (todayVisitorsEl) todayVisitorsEl.textContent = activityData.today;
if (monthlyVisitorsEl) monthlyVisitorsEl.textContent = activityData.monthly.toLocaleString();
if (avgDailyVisitorsEl) avgDailyVisitorsEl.textContent = activityData.avgDaily;
if (busiestDayEl) busiestDayEl.textContent = busiestDay;
if (busiestDayCountEl) busiestDayCountEl.textContent = `${busiestDayCount} visitors`;

// Daily Visitors Bar Chart
if (dailyVisitorsChart) {
    const dailyCtx = dailyVisitorsChart.getContext('2d');
    new Chart(dailyCtx, {
        type: 'bar',
        data: {
            labels: activityData.daily.labels,
            datasets: [{
                label: 'Visitors',
                data: activityData.daily.visitors,
                backgroundColor: 'rgba(255, 107, 107, 0.7)',
                borderColor: '#FF6B6B',
                borderWidth: 1,
                borderRadius: 5,
                barPercentage: 0.7
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.raw} visitors`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    },
                    title: {
                        display: true,
                        text: 'Number of Visitors'
                    }
                }
            }
        }
    });
}

// Monthly Visitors Line Chart
if (monthlyVisitorsChart) {
    const monthlyCtx = monthlyVisitorsChart.getContext('2d');
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: activityData.monthly.labels,
            datasets: [{
                label: 'Monthly Visitors',
                data: activityData.monthly.visitors,
                borderColor: '#4ECDC4',
                backgroundColor: 'rgba(78, 205, 196, 0.1)',
                borderWidth: 3,
                pointBackgroundColor: '#4ECDC4',
                pointBorderColor: 'white',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7,
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.raw.toLocaleString()} visitors`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    },
                    title: {
                        display: true,
                        text: 'Number of Visitors'
                    }
                }
            }
        }
    });
}

// Peak Hours Visualization
const peakHoursEl = document.getElementById('peakHours');
if (peakHoursEl) {
    const maxHourly = Math.max(...activityData.hourly.visitors);
    
    let peakHTML = '';
    activityData.hourly.labels.forEach((label, index) => {
        const visitors = activityData.hourly.visitors[index];
        const height = (visitors / maxHourly) * 80; // Max height 80px
        
        peakHTML += `
            <div class="hour-bar">
                <div class="hour-label">${label}</div>
                <div class="hour-value">
                    <div class="hour-fill" style="height: ${height}px;"></div>
                    <span class="hour-number">${visitors}</span>
                </div>
            </div>
        `;
    });
    
    peakHoursEl.innerHTML = peakHTML;
}




 });



</script>


</body>
</html>