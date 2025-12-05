function openExperienceModal(editMode = false) {
    const modal = document.getElementById('experienceModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('experienceForm');
    
    if (!editMode) {
        modalTitle.textContent = 'Add Experience';
        form.reset();
        document.getElementById('experienceId').value = '';
        document.getElementById('formAction').value = 'add';
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeExperienceModal() {
    const modal = document.getElementById('experienceModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}
window.onclick = function(event) {
    const modal = document.getElementById('experienceModal');
    if (event.target === modal) {
        closeExperienceModal();
    }
}
