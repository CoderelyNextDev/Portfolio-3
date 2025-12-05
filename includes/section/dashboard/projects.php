<section id="projects" class="content-section">
    <div class="section-header">
        <h2 class="section-title">Projects</h2>
        <button class="btn-add" onclick="openProjectModal()">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add New
        </button>
    </div>

    <div id="projectList">
        <?php foreach ($projects as $p): ?>
        <div class="card project-card" data-id="<?= $p['id'] ?>">

            <div class="card-actions">
                <button class="btn-icon" onclick="editProject(<?= $p['id'] ?>)" title="Edit">
                      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </button>
                <button class="btn-icon btn-delete" onclick="deleteProject(<?= $p['id'] ?>)" title="Delete">
                     <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>

            <h3><?= htmlspecialchars($p['title']) ?></h3>
            <p><strong><?= htmlspecialchars($p['subtitle']) ?></strong></p>

            <?php if (!empty($p['project_image_url'])): ?>
            <img class="project-thumb" src="<?= htmlspecialchars($p['project_image_url']) ?>" alt="">
            <?php endif; ?>

            <p class="card-text"><?= nl2br(htmlspecialchars($p['description'])) ?></p>

            <p><strong>Tech:</strong> <?= htmlspecialchars($p['technologies']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<div id="projectModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="projectModalTitle">Add Project</h3>
            <button class="modal-close" onclick="closeProjectModal()">&times;</button>
        </div>

       <form id="projectForm" enctype="multipart/form-data">

            <input type="hidden" id="projectId" name="id">
            <input type="hidden" id="projectFormAction" name="action" value="add">

            <div class="form-group">
                <label>Title *</label>
                <input type="text" id="project_title" name="title" required>
            </div>

            <div class="form-group">
                <label>Subtitle *</label>
                <input type="text" id="project_subtitle" name="subtitle" required>
            </div>

            <div class="form-group">
                <label>Description *</label>
                <textarea id="project_description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label>Technologies (comma separated)</label>
                <input type="text" id="project_technologies" name="technologies" placeholder="HTML, CSS, JS">
            </div>

            <div class="form-group">
                <label>Project Image URL</label>
                <input type="file" name="project_image" id="project_image" accept="image/*">
                <img id="projectImagePreview" src="" style="width:120px;margin-top:10px;display:none;border-radius:6px;">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeProjectModal()">Cancel</button>
                <button type="submit" class="btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
