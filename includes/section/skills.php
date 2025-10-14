<section id="skills">
    <div class="skills-container">
    <div class="skills-title">MY SKILLS</div>

    <div class="tree-container">
        <div class="tree-lines">
            <div class="vertical-line"></div>
            <div class="horizontal-line"></div>
            <div class="branch-left"></div>
            <div class="branch-right"></div>
        </div>

        <div class="skills-grid" id="skillsGrid">
            <?php
            // Define the categories to display
            $categories = ['Frontend', 'Backend', 'Database'];

            foreach ($categories as $category) {
                echo '<div class="skill-category" data-aos="fade-up">';
                echo '<h3 class="skill-category-title">' . $category . '</h3>';

                $stmt = $conn->prepare("SELECT skill_name, proficiency FROM skills WHERE category = ? ORDER BY id ASC");
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = htmlspecialchars($row['skill_name']);
                        $proficiency = (int)$row['proficiency'];

                        echo '
                        <div class="skill-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="skill-header">
                                <span class="skill-name">' . $name . '</span>
                                <span class="skill-percentage">' . $proficiency . '%</span>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: ' . $proficiency . '%;"></div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No skills found in this category.</p>';
                }

                echo '</div>'; 
            }
            ?>
        </div>
    </div>
</div>

</section>