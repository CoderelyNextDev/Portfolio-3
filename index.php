<?php
    include 'config/db_connect.php';

    // Fetch personal info
    $personal_query = "SELECT * FROM personal_info LIMIT 1";
    $personal_result = $conn->query($personal_query);
    $personal = $personal_result->fetch_assoc();

    // Fetch skills
    $skills_query = "SELECT * FROM skills";
    $skills_result = $conn->query($skills_query);

    // Fetch experience
    $experience_query = "SELECT * FROM experience ORDER BY start_date DESC";
    $experience_result = $conn->query($experience_query);

    $email = $personal['email'] ?? 'hello@gmail.com';
    $phone = $personal['phone_number'] ?? '+09321312311';

    // Get current year
    $currentYear = date('Y');
?>

<?php include('includes/head.php')?>
    <div class="hover-show"></div>
    <?php include('includes/nav.php')?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <?php include('includes/section/hero.php')?>

        <!-- About Section -->
        <?php include('includes/section/aboutme.php')?>
        
        <!-- Skills Section -->
        <?php include('includes/section/skills.php')?>
        
        <!-- Experience Section -->
        <?php include('includes/section/experience.php')?>

        <!-- Project Section -->
        <?php include('includes/section/project.php')?>

        <!-- Contact Section -->
        <?php include('includes/section/contact.php')?>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-contact">
                    <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="contact-item">
                        <span><?php echo htmlspecialchars($email); ?></span>
                    </a>
                    <a href="tel:<?php echo preg_replace('/\D/', '', $phone); ?>" class="contact-item">
                        <span><?php echo htmlspecialchars($phone); ?></span>
                    </a>
                </div>
                
                
                <div class="footer-copyright">
                    © <span class="year"><?php echo $currentYear; ?></span> Emman. All rights reserved.
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js?=<?php echo time()?>"></script>
</body>
</html>