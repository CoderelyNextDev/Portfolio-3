<section id="personal" class="content-section">
    <div class="section-header" >
        <h2 class="section-title">Personal Info</h2>
        <button class="btn-add" onclick="openPersonalModal()">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Info
        </button>
    </div>
    
    <?php if(!empty($personalInfo['profile_picture_url'])): ?>
    <div class="profile-header">
        <img src="<?php echo htmlspecialchars($personalInfo['profile_picture_url']); ?>" 
                alt="<?php echo htmlspecialchars($personalInfo['full_name']); ?>" 
                class="profile-pic"
                onerror="this.src='assets/img/default-avatar.png'">
        <div class="profile-info">
            <h3><?php echo htmlspecialchars($personalInfo['full_name']); ?></h3>
            <?php if(!empty($personalInfo['tagline'])): ?>
            <p><?php echo htmlspecialchars($personalInfo['tagline']); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="card">
        <div class="info-grid">
            <div class="info-item">
                <label>Full Name</label>
                <p><?php echo htmlspecialchars($personalInfo['full_name']); ?></p>
            </div>
            <?php if(!empty($personalInfo['email'])): ?>
            <div class="info-item">
                <label>Email</label>
                <p><?php echo htmlspecialchars($personalInfo['email']); ?></p>
            </div>
            <?php endif; ?>
            <?php if(!empty($personalInfo['phone_number'])): ?>
            <div class="info-item">
                <label>Phone</label>
                <p><?php echo htmlspecialchars($personalInfo['phone_number']); ?></p>
            </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($personalInfo['about_summary'])): ?>
        <div class="info-item">
            <label>About Me</label>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($personalInfo['about_summary'])); ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Personal Info Modal -->
<div id="personalModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Personal Information</h3>
            <button class="modal-close" onclick="closePersonalModal()">&times;</button>
        </div>
        <form id="personalForm" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $personalInfo['id'] ?? ''; ?>">
            <input type="hidden" id="current_picture" name="current_picture" value="<?php echo htmlspecialchars($personalInfo['profile_picture_url'] ?? ''); ?>">
            
            <!-- Image Upload Section -->
            <div class="form-group">
                <label>Profile Picture</label>
                <div class="image-upload-container">
                    <div class="image-preview">
                        <img id="imagePreview" 
                             src="<?php echo htmlspecialchars($personalInfo['profile_picture_url'] ?? 'assets/img/default-avatar.png'); ?>" 
                             alt="Preview">
                    </div>
                    <div class="upload-controls">
                        <input type="file" 
                               id="profile_picture" 
                               name="profile_picture" 
                               accept="image/jpeg,image/png,image/jpg,image/gif"
                               style="display: none;">
                        <button type="button" class="btn-upload" onclick="document.getElementById('profile_picture').click()">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Choose Image
                        </button>
                    </div>
                </div>
                <small>Accepted formats: JPG, PNG, GIF (Max 5MB)</small>
            </div>
            
            <div class="form-group">
                <label for="full_name">Full Name *</label>
                <input type="text" id="full_name" name="full_name" 
                       value="<?php echo htmlspecialchars($personalInfo['full_name'] ?? ''); ?>" 
                       required placeholder="Your Full Name">
            </div>
            
            <div class="form-group">
                <label for="tagline">Tagline</label>
                <input type="text" id="tagline" name="tagline" 
                       value="<?php echo htmlspecialchars($personalInfo['tagline'] ?? ''); ?>" 
                       placeholder="e.g. Full-Stack Developer">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" 
                           value="<?php echo htmlspecialchars($personalInfo['email'] ?? ''); ?>" 
                           required placeholder="your@email.com">
                </div>
                
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" 
                           value="<?php echo htmlspecialchars($personalInfo['phone_number'] ?? ''); ?>" 
                           placeholder="+63 912 345 6789">
                </div>
            </div>
            
            <div class="form-group">
                <label for="about_summary">About Me</label>
                <textarea id="about_summary" name="about_summary" rows="6" 
                          placeholder="Tell us about yourself..."><?php echo htmlspecialchars($personalInfo['about_summary'] ?? ''); ?></textarea>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closePersonalModal()">Cancel</button>
                <button type="submit" class="btn-primary" id="submitBtn">
                    <span class="btn-text">Save Changes</span>
                    <span class="btn-loader" style="display: none;">Saving...</span>
                </button>
            </div>
        </form>
    </div>
</div>