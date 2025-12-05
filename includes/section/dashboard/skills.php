<section id="skills" class="content-section">
    <div class="section-header">
        <h2 class="section-title">Skills</h2>
        <button class="btn-add" onclick="openSkillModal()">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add New
        </button>
    </div>
     <div id="skillsList">  
          <?php foreach($skills as $category => $categorySkills): ?>
            <?php foreach($categorySkills as $skill): ?>
            <div class="card" style="width:70vw" data-id="<?php echo $skill['id']; ?>">
                <div class="card-actions">
                    <button class="btn-icon" onclick="editSkill(<?php echo $skill['id']; ?>)" title="Edit">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="btn-icon btn-delete" onclick="deleteSkill(<?php echo $skill['id']; ?>)" title="Delete">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
                <h3><?php echo htmlspecialchars($skill['skill_name']); ?></h3>
                <p class="card-meta">
                    <strong><?php echo htmlspecialchars($category); ?></strong>
                    <?php if(!empty($skill['proficiency'])): ?>
                     • <span class="proficiency-text"><?php echo $skill['proficiency']; ?>% Proficiency</span>
                    <?php endif; ?>
                </p>
                <?php if(!empty($skill['proficiency'])): ?>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?php echo $skill['proficiency']; ?>%"></div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</section>

<!-- Skill Modal -->
<div id="skillModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="skillModalTitle">Add Skill</h3>
            <button class="modal-close" onclick="closeSkillModal()">&times;</button>
        </div>
        <form id="skillForm">
            <input type="hidden" id="skillId" name="id">
            <input type="hidden" id="skillFormAction" name="action" value="add">
            
            <div class="form-group">
                <label for="skill_name">Skill Name *</label>
                <input type="text" id="skill_name" name="skill_name" required placeholder="e.g. PHP, JavaScript">
            </div>
            
            <div class="form-group">
                <label for="category">Category *</label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Backend">Backend</option>
                    <option value="Database">Database</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="proficiency">Proficiency Level (%) *</label>
                <input type="range" id="proficiency" style="width:90%" name="proficiency" min="0" max="100" value="50" required>
                <div class="proficiency-display">
                    <span id="proficiencyValue">50</span>%
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeSkillModal()">Cancel</button>
                <button type="submit" class="btn-primary">Save Skill</button>
            </div>
        </form>
    </div>
</div>
