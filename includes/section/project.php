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
               
                $delay = 600;

                if ($project_result && $project_result->num_rows > 0):
                    while ($project = $project_result->fetch_assoc()): 
                        $tech_list = explode(',', $project['technologies']); 
                ?>
                    <div class="project-card" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                        <div class="project-image">
                            <?php if (!empty($project['project_image_url'])): ?>
                                <img src="<?= htmlspecialchars($project['project_image_url']) ?>"
                                     alt="<?= htmlspecialchars($project['title']) ?>">
                            <?php else: ?>
                                <div class="project-placeholder">📱</div>
                            <?php endif; ?>
                        </div>

                        <div class="project-content">
                            <div class="project-header">
                                <h3 class="project-title"><?= htmlspecialchars($project['title']) ?></h3>
                                <a href="#" class="external-link">↗</a>
                            </div>

                            <p class="project-description">
                                <?= htmlspecialchars($project['description']) ?>
                            </p>

                            <div class="tech-stack">
                                <?php foreach ($tech_list as $tech): ?>
                                    <span class="tech-badge"><?= htmlspecialchars(trim($tech)) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                <?php 
                    $delay += 150;
                    endwhile;
                else:
                ?>
                    <p>No projects found.</p>
                <?php endif; ?>

            </div>
        </div>

    </div>
</section>
