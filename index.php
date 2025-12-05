<?php include('includes/data_functions.php')?>
<?php include('includes/head.php')?>
    <div class="hover-show"></div>
    <?php include('includes/nav.php')?>
    <!-- Main Content -->
    <main class="main-content">
        <?php include('includes/section/hero.php')?>
        <?php include('includes/section/aboutme.php')?>
        <?php include('includes/section/skills.php')?>
        <?php include('includes/section/experience.php')?>
        <?php include('includes/section/project.php')?>
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
    <script src="js/main.js?=<?php echo time()?>"></script>
</body>
</html>