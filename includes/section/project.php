<section>
    <div class="portfolio-container" id="projects" data-aos="fade-up">
    <div class="left-section" data-aos="fade-right" data-aos-delay="100">
        <div class="hero-content">
            <h1 class="hero-title" data-aos="fade-down" data-aos-delay="200">
                <?= htmlspecialchars($personal['full_name']) ?>
            </h1>
            <h2 class="hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                Full Stack Projects
            </h2>
            <p class="hero-description" data-aos="fade-up" data-aos-delay="400">
                I build accessible, pixel-perfect digital experiences for the web.
            </p>
        </div>
    </div>

    <div class="right-section" data-aos="fade-left" data-aos-delay="500">
        <div class="projects-grid">
            <?php
            $projects = [
                [
                    'title' => 'E-Commerce Platform',
                    'description' => 'A full-featured e-commerce platform with real-time inventory management, secure payment integration using Stripe, and an intuitive admin dashboard. Features include product filtering, cart management, user authentication with OAuth flows, and order tracking.',
                    'stars' => 234,
                    'technologies' => ['HTML', 'CSS', 'JS', 'PHP', 'MYSQL'],
                    'image' => 'https://landingi.com/wp-content/uploads/2020/07/cover_ecommerce1-optimized.webp'
                ],
                [
                    'title' => 'Task Management Dashboard',
                    'description' => 'Collaborative project management tool with real-time updates, drag-and-drop task organization, team collaboration features, and progress tracking. Includes Kanban boards, Gantt charts, time tracking, and detailed analytics.',
                    'stars' => 452,
                    'technologies' => ['HTML', 'CSS', 'JS', 'PHP', 'Laravel'],
                    'image' => 'https://img.freepik.com/premium-vector/eps-task-management-dashboard-website-templtae-full-editable-vector-light-mode_908119-32.jpg'
                ],
                [
                    'title' => 'Weather Forecast App',
                    'description' => 'Beautiful weather application providing accurate forecasts with interactive maps, hourly predictions, and severe weather alerts. Features include location-based weather, 7-day forecasts, air quality index, UV index, and customizable widgets.',
                    'stars' => 189,
                    'technologies' => ['HTML', 'CSS', 'JS', 'PHP', 'MYSQL'],
                    'image' => 'https://uizard.io/static/89cb1d30cdee9c19b0ce72efe004ff49/a8e47/f5e31989f816c5b15c47cd54b0eb0b30b210b6f0-1440x835.png'
                ],
            ];

            $delay = 600; // Start delay for first card
            foreach ($projects as $project): ?>
                <div class="project-card" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                    <div class="project-image">
                        <?php if ($project['image']): ?>
                            <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                        <?php else: ?>
                            <div class="project-placeholder">📱</div>
                        <?php endif; ?>
                    </div>

                    <div class="project-content">
                        <div class="project-header">
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <a href="#" class="external-link">↗</a>
                        </div>
                        <p class="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
                        <div class="tech-stack">
                            <?php foreach ($project['technologies'] as $tech): ?>
                                <span class="tech-badge"><?php echo htmlspecialchars($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php 
                $delay += 150; 
            endforeach; ?>
        </div>
    </div>
</div>

</section>