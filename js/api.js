async function editExperience(id) {
    try {
        const formData = new FormData();
        formData.append('action', 'get');
        formData.append('id', id);
        
        const response = await fetch('actions/experience_actions.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data) {
            document.getElementById('modalTitle').textContent = 'Edit Experience';
            document.getElementById('experienceId').value = data.id;
            document.getElementById('formAction').value = 'edit';
            document.getElementById('title').value = data.title;
            document.getElementById('institution').value = data.institution || '';
            document.getElementById('start_date').value = data.start_date;
            document.getElementById('end_date').value = data.end_date || '';
            document.getElementById('description').value = data.description || '';
            
            openExperienceModal(true);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to load experience data');
    }
}

async function deleteExperience(id) {
    if (!confirm('Are you sure you want to delete this experience?')) {
        return;
    }
    
    try {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', id);
        
        const response = await fetch('actions/experience_actions.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            const card = document.querySelector(`.card[data-id="${id}"]`);
            card.style.animation = 'fadeOut 0.3s ease';
            setTimeout(() => {
                card.remove();
            }, 300);
        } else {
            alert(result.message || 'Failed to delete experience');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to delete experience');
    }
}

document.getElementById('experienceForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    try {
        const response = await fetch('actions/experience_actions.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();

        if (result.success) {
            closeExperienceModal();
            location.reload();
        } else {
            alert(result.message || 'Failed to save experience');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to save experience');
    }
});


    // Skills Management 
    document.getElementById('proficiency')?.addEventListener('input', function(e) {
        document.getElementById('proficiencyValue').textContent = e.target.value;
    });

    function openSkillModal(isEdit = false) {
        if (!isEdit) {
            document.getElementById('skillModalTitle').textContent = 'Add Skill';
            document.getElementById('skillFormAction').value = 'add';
            document.getElementById('skillForm').reset();
            document.getElementById('proficiencyValue').textContent = '50';
        }
        document.getElementById('skillModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }


    function closeSkillModal() {
        document.getElementById('skillModal').classList.remove('active');
        document.body.style.overflow = '';
        document.getElementById('skillForm').reset();
    }
    async function editSkill(id) {
        try {
            const formData = new FormData();
            formData.append('action', 'get');
            formData.append('id', id);
    
            const response = await fetch('actions/skill_actions.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            console.log('Edit skill response:', data);
            
            if (data && data.id) {
                document.getElementById('skillModalTitle').textContent = 'Edit Skill';
                document.getElementById('skillId').value = data.id;
                document.getElementById('skillFormAction').value = 'edit';
                document.getElementById('skill_name').value = data.skill_name;
                document.getElementById('category').value = data.category || '';
                document.getElementById('proficiency').value = data.proficiency || 50;
                document.getElementById('proficiencyValue').textContent = data.proficiency || 50;
                
                openSkillModal(true);
            } else {
                console.error('Invalid data received:', data);
                alert(data.message || 'Failed to load skill data');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to load skill data: ' + error.message);
        }
    }

    async function deleteSkill(id) {
        if (!confirm('Are you sure you want to delete this skill?')) {
            return;
        }
        
        try {
            const formData = new FormData();
            formData.append('action', 'delete');
            formData.append('id', id);
            
            const response = await fetch('actions/skill_actions.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            console.log('Delete skill response:', result);
            
            if (result.success) {
                const card = document.querySelector(`.card[data-id="${id}"]`);
                if (card) {
                    card.style.animation = 'fadeOut 0.3s ease';
                    setTimeout(() => {
                        card.remove();
                    }, 300);
                    location.reload();
                } else {
                    console.warn('Card not found, reloading page');
                    location.reload();
                }
            } else {
                alert(result.message || 'Failed to delete skill');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to delete skill: ' + error.message);
        }
    }

    document.getElementById('skillForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        // Debug: Log form data
        console.log('Submitting form with data:');
        for (const pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }
        
        try {
            const response = await fetch('actions/skill_actions.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            console.log('Form submission response:', result);

            if (result.success) {
                closeSkillModal();
                location.reload();
            } else {
                alert(result.message || 'Failed to save skill');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to save skill: ' + error.message);
        }
    });

    document.getElementById('skillModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeSkillModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && document.getElementById('skillModal')?.classList.contains('active')) {
            closeSkillModal();
        }
    });

    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.9); }
        }
    `;
    document.head.appendChild(style);


document.getElementById('profile_picture')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 5 * 1024 * 1024) {
            alert('File size must be less than 5MB');
            this.value = '';
            return;
        }
        
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            alert('Please upload a valid image file (JPG, PNG, GIF)');
            this.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

function removeImage() {
    document.getElementById('profile_picture').value = '';
    document.getElementById('imagePreview').src = 'assets/img/default-avatar.png';
    document.getElementById('current_picture').value = '';
}

function openPersonalModal() {
    document.getElementById('personalModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closePersonalModal() {
    document.getElementById('personalModal').classList.remove('active');
    document.body.style.overflow = '';
}

// Form submission
document.getElementById('personalForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');
    
    // Disable button and show loading
    submitBtn.disabled = true;
    btnText.style.display = 'none';
    btnLoader.style.display = 'inline';
    
    const formData = new FormData(this);
    
    console.log('Submitting personal info with image...');
    
    try {
        const response = await fetch('actions/personal_actions.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        console.log('Personal info response:', result);

        if (result.success) {
            closePersonalModal();
            location.reload();
        } else {
            alert(result.message || 'Failed to save personal information');
            submitBtn.disabled = false;
            btnText.style.display = 'inline';
            btnLoader.style.display = 'none';
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to save personal information: ' + error.message);
        submitBtn.disabled = false;
        btnText.style.display = 'inline';
        btnLoader.style.display = 'none';
    }
});

document.getElementById('personalModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closePersonalModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && document.getElementById('personalModal')?.classList.contains('active')) {
        closePersonalModal();
    }
});

function openProjectModal(isEdit = false) {
    const modal = document.getElementById("projectModal");
    modal.classList.add("active");
    document.body.style.overflow = "hidden";

    if (!isEdit) {
        // Reset form for ADD
        document.getElementById("projectModalTitle").textContent = "Add Project";
        document.getElementById("projectFormAction").value = "add";

        document.getElementById("projectId").value = "";
        document.getElementById("project_title").value = "";
        document.getElementById("project_subtitle").value = "";
        document.getElementById("project_description").value = "";
        document.getElementById("project_technologies").value = "";
        document.getElementById("project_image_url").value = "";
    }
}

function closeProjectModal() {
    const modal = document.getElementById("projectModal");
    modal.classList.remove("active");
    document.body.style.overflow = "";

    document.getElementById("projectForm").reset();
}

async function editProject(id) {

        const formData = new FormData();
        formData.append("action", "get");
        formData.append("id", id);

        const response = await fetch("actions/projects_actions.php", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (data && data.id) {
            document.getElementById("projectModalTitle").textContent = "Edit Project";
            document.getElementById("projectId").value = data.id;
            document.getElementById("projectFormAction").value = "edit";

            document.getElementById("project_title").value = data.title;
            document.getElementById("project_subtitle").value = data.subtitle;
            document.getElementById("project_description").value = data.description;
            document.getElementById("project_technologies").value = data.technologies;
            if (data.image_path) {
                const preview = document.getElementById("projectImagePreview");
                preview.src = data.image_path;
                preview.style.display = "block";
            }

            openProjectModal(true);
        } else {
            alert("Failed to load project data.");
        }


}

// Delete Project
async function deleteProject(id) {
    if (!confirm("Are you sure you want to delete this project?")) return;

    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("id", id);

    const response = await fetch("actions/projects_actions.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();

    if (result.success) {
        const card = document.querySelector(`.project-card[data-id="${id}"]`);
        if (card) {
            card.style.animation = "fadeOut 0.3s ease";
            setTimeout(() => card.remove(), 300);
        }
    } else {
        alert(result.message);
    }
}


document.getElementById("projectForm")?.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const response = await fetch("actions/projects_actions.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();

    if (result.success) {
        closeProjectModal();
        location.reload();
    } else {
        alert(result.message);
    }
});

document.getElementById("projectModal")?.addEventListener("click", function (e) {
    if (e.target === this) {
        closeProjectModal();
    }
});

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && document.getElementById("projectModal")?.classList.contains("active")) {
        closeProjectModal();
    }
});
document.getElementById("project_image")?.addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {
        const img = document.getElementById("projectImagePreview");
        img.src = event.target.result;
        img.style.display = "block";
    };
    reader.readAsDataURL(file);
});
