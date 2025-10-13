<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamara Sredojevic | UX Designer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css?=<?php echo time()?>">
</head>
<body>
   
    <button class="mobile-nav-toggle" id="mobileNavToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Left Navigation -->
    <nav class="left-nav" id="leftNav">
        <div class="nav-logo">TAMARA SREDOJEVIC</div>
        <div class="nav-icons">
            <a href="#" class="nav-icon">
                <i class="fas fa-language"></i>
                <span class="nav-tooltip">Language</span>
            </a>
            <a href="#" class="nav-icon">
                <i class="fas fa-blog"></i>
                <span class="nav-tooltip">Blog</span>
            </a>
            <a href="#" class="nav-icon">
                <i class="fas fa-microphone"></i>
                <span class="nav-tooltip">Speaking</span>
            </a>
            <a href="#" class="nav-icon">
                <i class="fas fa-folder-open"></i>
                <span class="nav-tooltip">Resources</span>
            </a>
            <a href="#" class="nav-icon">
                <i class="fas fa-user"></i>
                <span class="nav-tooltip">About me</span>
            </a>
        </div>
        <div class="nav-footer">
            <a href="#" class="nav-icon">
                <i class="fas fa-cog"></i>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section d-flex gap-0 items-center justify-center">
            <div class="container z-index-99">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="hero-title">UX design & digital accessibility</h1>
                        <p class="hero-subtitle">Hi, I'm Tamara Sredojevic. I'm a UX designer specialising in accessibility.</p>
                        <p class="hero-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio possimus quod maxime nobis perspiciatis? Totam ea debitis vero laudantium. Suscipit, voluptatum exercitationem laborum rem perferendis illo architecto consequatur debitis. Voluptatum, debitis totam! Et dolorem quidem esse culpa distinctio harum deserunt sint officia, recusandae minima similique corporis vitae. Et, excepturi beatae.</p>
                    </div>
                </div>
                <div class="d-flex gap-5">
                    <div>
                        <div>
                            <h4>Date Born</h4>
                            <p class="hero-text">May 5, 2004</p>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h4>Location</h4>
                            <p class="hero-text">France (and remotely)</p>
                        </div>
                    </div>
                </div>
                <a href="path/to/your-cv.pdf" download="Your-Name-CV.pdf" class="btn btn-success">
                    <i class="bi bi-download me-2"></i>
                    Download CV
                </a>
            </div>
             <div class="heart-shape">
                <img src="https://picsum.photos/400/500" class="card-img-top heart-card-img" alt="Heart Image">
            </div>
        </section>


        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <h2 class="about-title">About me</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <p>I am a passionate UX designer with a strong focus on digital accessibility. My mission is to create inclusive digital experiences that everyone can use, regardless of their abilities or disabilities.</p>
                        <p>With years of experience in the field, I've worked with various organizations to implement accessibility best practices and ensure compliance with WCAG guidelines.</p>
                        <p>When I'm not designing accessible interfaces, you can find me speaking at conferences, writing about inclusive design, or contributing to open-source accessibility projects.</p>
                    </div>
                </div>
            </div>
        </section>

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
        // Mobile navigation toggle
        document.getElementById('mobileNavToggle').addEventListener('click', function() {
            document.getElementById('leftNav').classList.toggle('active');
            
            // Change icon based on state
            const icon = this.querySelector('i');
            if (document.getElementById('leftNav').classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Close mobile nav when clicking on a link
        document.querySelectorAll('.nav-icon').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.getElementById('leftNav').classList.remove('active');
                    document.getElementById('mobileNavToggle').querySelector('i').classList.remove('fa-times');
                    document.getElementById('mobileNavToggle').querySelector('i').classList.add('fa-bars');
                }
            });
        });
    </script>
</body>
</html>