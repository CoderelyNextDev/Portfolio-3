<?php include('includes/data_functions.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($personalInfo['full_name']); ?> - Portfolio</title>
    <link rel="stylesheet" href="css/main.css?=<?php echo time()?>">
    <link rel="stylesheet" href="css/dashboard.css?=<?php echo time()?>">
</head>
<body>
    <div class="dashboard-container">
        <div class="overlay" id="overlay"></div>
        <?php include('includes/section/dashboard/sidebar.php');?>
       
        <main class="main-content" id="mainContent">
            <header class="header">
                <button class="menu-toggle" id="menuToggle">
                    <svg id="menuIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <h2>Dashboard</h2>
            </header>

            <div class="content-area">
                <?php include('includes/section/dashboard/experience.php');?>
                <?php include('includes/section/dashboard/personal_info.php');?>
                <?php include('includes/section/dashboard/skills.php');?>
                <?php include('includes/section/dashboard/projects.php');?>
            
            </div>
        </main>
    </div>
    <script src="js/dashboard.js?v=<?php echo time(); ?>"></script>
    <script src="js/util.js?v=<?php echo time(); ?>"></script>
    <script src="js/api.js?v=<?php echo time(); ?>"></script>
</body>
</html>
