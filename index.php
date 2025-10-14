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
        
        <!-- About Section -->
        <?php include('includes/section/skills.php')?>


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="social-links mb-3">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                </div>
                <p>&copy; 2023 Tamara Sredojevic. All rights reserved.</p>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
         AOS.init({
    duration: 1000,   // animation duration in ms
    offset: 100,      // distance (in px) before triggering animation
    once: true,       // whether animation happens only once
  });
         const box = document.querySelector('.left-nav');
        let scrollTimeout;

        window.addEventListener('scroll', () => {
            // Add "scrolling" class when user scrolls
            box.classList.add('scrolling');

            // Clear previous timeout
            clearTimeout(scrollTimeout);

            // Remove class when scrolling stops for 150ms
            scrollTimeout = setTimeout(() => {
            box.classList.remove('scrolling');
            }, 500);
        }, { passive: true });
        
       
    </script>
</body>
</html>