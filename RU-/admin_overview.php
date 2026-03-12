<?php 
session_start(); 
require "connection.php";


$userStats = [];

// Total users
$totalQuery = "SELECT COUNT(*) as total FROM user";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$userStats['total'] = $totalRow['total'];

// For now, set new users to 0 since we don't have a date column
$userStats['new'] = 0;

// Deleted users - set to 0 if no status column
$userStats['deleted'] = 0;

// For monthly growth, use empty data since no date column
$monthlyLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
$monthlyCounts = [0, 0, 0, 0, 0, 0];

// For pie chart
$activeCount = $userStats['total'];
$deletedCount = 0;





//Inventory stuff


$inventoryStats = [
    'total' => 0,
    'listed' => 0,
    'removed' => 0
];

$categoryData = [
    'labels' => ['Shirts', 'Dresses', 'Shoes', 'Pants', 'Hoodies', 'Caps & Beanies'],
    'counts' => [0, 0, 0, 0, 0, 0]
];

$monthlyGrowth = [
    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    'items' => [0, 0, 0, 0, 0, 0]
];

// Get total items from all_listing (this should work)
$totalQuery = "SELECT COUNT(*) as total FROM all_listing";
$totalResult = $conn->query($totalQuery);
if ($totalResult) {
    $totalRow = $totalResult->fetch_assoc();
    $inventoryStats['total'] = $totalRow['total'];
}


$inventoryStats['listed'] = 0;

// Try to get category data if category column exists
$checkCategory = $conn->query("SHOW COLUMNS FROM all_listing LIKE 'category'");
if ($checkCategory && $checkCategory->num_rows > 0) {
    $categoryQuery = "SELECT category, COUNT(*) as count FROM all_listing GROUP BY category";
    $categoryResult = $conn->query($categoryQuery);
    
    if ($categoryResult && $categoryResult->num_rows > 0) {
        $catLabels = [];
        $catCounts = [];
        
        while ($row = $categoryResult->fetch_assoc()) {
            $catLabels[] = $row['category'];
            $catCounts[] = $row['count'];
        }
        
        if (!empty($catLabels)) {
            $categoryData['labels'] = $catLabels;
            $categoryData['counts'] = $catCounts;
        }
    }
}


?>













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





</head>





<body>

  <header>
        <nav>
             <div class="menu-icon">
                <a href="#" onclick = "showSidebar()"> <img src="images/menuicon.png" alt="Menu Icon" width="30px" height="30px" id="menu-icon"> </a>
             </div>

            <div class="logo">
                <a href="index.php"><img src="images/rustylishlogo.png" alt="RU Stylish Logo" width="95px"
                        height="85px" class="logo-left"></a>
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

             <div class="nav-icons">
    <a href="MyAccount.php"><img src="images/AccountIcon.png" width="50px" height="50px" id="myAicon"/></a>
    </div>

        </nav>

        
    

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







<br>
<br>



    
        <div class="AdminAttributes">
     
       
         <a href="admin_reports.php"><button type="submit">Reports</button></a>
        <br>

       <a href="admin_reviews.php"><button type="submit">Reviews</button></a>
    <br>
        <a href="admin_store.php" ><button type="submit">Store</button></a>
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

 const userStats = {
        total: <?php echo $userStats['total']; ?>,
        new: <?php echo $userStats['new']; ?>,
        deleted: <?php echo $userStats['deleted']; ?>
    };
    
    const monthlyData = {
        labels: <?php echo json_encode($monthlyLabels); ?>,
        users: <?php echo json_encode($monthlyCounts); ?>
    };




    

const inventoryStats = {
    total: <?php echo $inventoryStats['total']; ?>,
    listed: <?php echo $inventoryStats['listed']; ?>,
    removed: <?php echo $inventoryStats['removed']; ?>
};

const categoryData = {
    labels: <?php echo json_encode($categoryData['labels']); ?>,
    counts: <?php echo json_encode($categoryData['counts']); ?>
};

const monthlyGrowth = {
    labels: <?php echo json_encode($monthlyGrowth['labels']); ?>,
    items: <?php echo json_encode($monthlyGrowth['items']); ?>
};




    document.addEventListener('DOMContentLoaded', function() {
        // Get elements
        const totalUsersEl = document.getElementById('totalUsers');
        const newUsersEl = document.getElementById('newUsers');
        const deletedUsersEl = document.getElementById('deletedUsers');
        const userPieChart = document.getElementById('userPieChart');
        const growthLineChart = document.getElementById('growthLineChart');

        // Update stat numbers with REAL data from PHP
        if (totalUsersEl) totalUsersEl.textContent = userStats.total;
        if (newUsersEl) newUsersEl.textContent = userStats.new;
        if (deletedUsersEl) deletedUsersEl.textContent = userStats.deleted;

        // Pie Chart (shows distribution)
        if(userPieChart){
            const pieCtx = userPieChart.getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Active Users', 'Deleted Users'],
                    datasets: [{
                        data: [userStats.total, userStats.deleted],
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

        // Line Chart (shows growth)
        if(growthLineChart){
            const lineCtx = growthLineChart.getContext('2d');
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


//Inventory Data
const totalItemsEl = document.getElementById('totalItems');
const itemsListedEl = document.getElementById('itemsListed');
const itemsRemovedEl = document.getElementById('itemsRemoved');
const categoryPieChart = document.getElementById('categoryPieChart');
const itemsGrowthChart = document.getElementById('itemsGrowthChart');

// Update inventory stat numbers with REAL data
if (totalItemsEl) totalItemsEl.textContent = inventoryStats.total;
if (itemsListedEl) itemsListedEl.textContent = inventoryStats.listed;
if (itemsRemovedEl) itemsRemovedEl.textContent = inventoryStats.removed;

// Category Pie Chart
if (categoryPieChart) {
    const categoryCtx = categoryPieChart.getContext('2d');
    new Chart(categoryCtx, {
        type: 'pie',
        data: {
            labels: categoryData.labels,
            datasets: [{
                data: categoryData.counts,
                backgroundColor: [
                    '#FF6B6B', '#4ECDC4', '#45B7D1', 
                    '#96CEB4', '#FFE194', '#D4A5A5'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { font: { size: 11 } }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
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
            labels: monthlyGrowth.labels,
            datasets: [{
                label: 'Total Items',
                data: monthlyGrowth.items,
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
                legend: { display: false },
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
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' },
                    title: { display: true, text: 'Number of Items' }
                },
                x: {
                    grid: { display: false },
                    title: { display: true, text: 'Month' }
                }
            }
        }
    });
}

// Colors function for category breakdown
function getCategoryColor(index) {
    const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFE194', '#D4A5A5'];
    return colors[index];
}
     


        



    });

</script>


</body>
</html>