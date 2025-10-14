<section id="experience">
    
<div class="experience-container mt-5">
    <h1 class="experience-title" data-aos="fade-down">Experience</h1>

    <div class="timeline-header" data-aos="fade-up" data-aos-delay="100">
        <div class="header-item">
            <div class="icon">🎓</div>
            <h2 class="header-title">Education</h2>
        </div>
        <div class="header-item">
            <div class="icon">💼</div>
            <h2 class="header-title">Employment</h2>
        </div>
    </div>

    <div class="timeline" id="timeline">
        <?php if ($experience_result && $experience_result->num_rows > 0): ?>
            <?php while ($row = $experience_result->fetch_assoc()): ?>
                <?php
                    $type = (stripos($row['title'], 'student') !== false 
                             || stripos($row['title'], 'bachelor') !== false 
                             || stripos($row['institution'], 'school') !== false 
                             || stripos($row['institution'], 'college') !== false 
                             || stripos($row['institution'], 'university') !== false)
                             ? 'education' : 'employment';

                    $position = ($type === 'education') ? 'left' : 'right';

                    $start_date = date("F Y", strtotime($row['start_date']));
                    $end_date = $row['end_date'] ? date("F Y", strtotime($row['end_date'])) : 'Present';
                    $date_range = $start_date . ' - ' . $end_date;

                    $aos_effect = ($position === 'left') ? 'fade-right' : 'fade-left';
                ?>

                <div class="timeline-item <?php echo $position; ?>" data-aos="<?php echo $aos_effect; ?>" data-aos-duration="800">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date"><?php echo htmlspecialchars($date_range); ?></div>
                        <div class="timeline-title"><?php echo htmlspecialchars($row['title']); ?></div>
                        <div class="timeline-description">
                            <strong><?php echo htmlspecialchars($row['institution']); ?></strong><br>
                            <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No experience records found.</p>
        <?php endif; ?>
    </div>
</div>

</section>