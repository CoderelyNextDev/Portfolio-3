<section id="experience" class="content-section active">
    <div class="section-header">
        <h2 class="section-title">Experience & Education</h2>
        <button class="btn-add" onclick="openExperienceModal()">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add New
        </button>
    </div>
    
    <div id="experienceList">
        <?php foreach($experiences as $exp): ?>
        <div class="card" data-id="<?php echo $exp['id']; ?>">
            <div class="card-actions">
                <button class="btn-icon" onclick="editExperience(<?php echo $exp['id']; ?>)" title="Edit">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </button>
                <button class="btn-icon btn-delete" onclick="deleteExperience(<?php echo $exp['id']; ?>)" title="Delete">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
            <h3><?php echo htmlspecialchars($exp['title']); ?></h3>
            <p class="card-meta">
                <?php if(!empty($exp['institution'])): ?>
                    <strong><?php echo htmlspecialchars($exp['institution']); ?></strong> • 
                <?php endif; ?>
                <span class="date-badge">
                    <?php echo formatDate($exp['start_date']); ?> - <?php echo formatDate($exp['end_date']); ?>
                </span>
            </p>
            <?php if(!empty($exp['description'])): ?>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($exp['description'])); ?></p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Experience Modal -->
<div id="experienceModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Add Experience</h3>
            <button class="modal-close" onclick="closeExperienceModal()">&times;</button>
        </div>
        <form id="experienceForm">
            <input type="hidden" id="experienceId" name="id">
            <input type="hidden" id="formAction" name="action" value="add">
            
            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="institution">Institution/Company</label>
                <input type="text" id="institution" name="institution">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="start_date">Start Date *</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" id="end_date" name="end_date">
                    <small>Leave empty if ongoing</small>
                </div>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeExperienceModal()">Cancel</button>
                <button type="submit" class="btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
