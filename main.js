AOS.init({
    duration: 1000,  
    offset: 120,  
    mirror:true,
    once: false,     
});
    const box = document.querySelector('.left-nav');
let scrollTimeout;

window.addEventListener('scroll', () => {
    box.classList.add('scrolling');
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
    box.classList.remove('scrolling');
    }, 500);
}, { passive: true });

