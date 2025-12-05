const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const menuToggle = document.getElementById('menuToggle');
const menuIcon = document.getElementById('menuIcon');
const overlay = document.getElementById('overlay');
const navLinks = document.querySelectorAll('.nav-link');
const contentSections = document.querySelectorAll('.content-section');

let isMobile = window.innerWidth <= 768;
let sidebarOpen = !isMobile;

function initializeSidebar() {
    isMobile = window.innerWidth <= 768;
    
    if (isMobile) {
        sidebar.classList.add('closed');
        sidebar.classList.remove('open');
        mainContent.classList.add('expanded');
        overlay.classList.remove('active');
    } else {
        sidebar.classList.remove('closed', 'open');
        mainContent.classList.remove('expanded');
        overlay.classList.remove('active');
    }
    
    sidebarOpen = !isMobile;
}


function toggleSidebar() {
    if (isMobile) {
        sidebarOpen = !sidebarOpen;
        
        if (sidebarOpen) {
            sidebar.classList.add('open');
            sidebar.classList.remove('closed');
            overlay.classList.add('active');
        } else {
            sidebar.classList.remove('open');
            sidebar.classList.add('closed');
            overlay.classList.remove('active');
        }
    } else {
        sidebarOpen = !sidebarOpen;
        
        if (sidebarOpen) {
            sidebar.classList.remove('closed');
            mainContent.classList.remove('expanded');
        } else {
            sidebar.classList.add('closed');
            mainContent.classList.add('expanded');
        }
    }
}


menuToggle.addEventListener('click', toggleSidebar);


overlay.addEventListener('click', function() {
    if (isMobile) {
        toggleSidebar();
    }
});


navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        
        const sectionId = this.getAttribute('data-section');
        
        // Update URL hash without scrolling
        history.replaceState(null, '', `#${sectionId}`);
        
        contentSections.forEach(section => {
            section.classList.remove('active');
        });
        
        document.getElementById(sectionId).classList.add('active');
        
        if (isMobile && sidebarOpen) {
            toggleSidebar();
        }
    });
});


// Handle window resize
let resizeTimer;
window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        initializeSidebar();
    }, 250);
});

// Initialize on load
initializeSidebar();
function loadSectionFromHash() {
    const hash = window.location.hash.substring(1); // remove '#'
    if (hash) {
        const link = document.querySelector(`.nav-link[data-section="${hash}"]`);
        const section = document.getElementById(hash);
        
        if (link && section) {
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
            
            contentSections.forEach(s => s.classList.remove('active'));
            section.classList.add('active');
        }
    }
}

// Load section on page load
loadSectionFromHash();

// Optional: update section when hash changes manually
window.addEventListener('hashchange', loadSectionFromHash);
