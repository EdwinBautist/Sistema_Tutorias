document.addEventListener('DOMContentLoaded', () => {
    console.log('sidebar.js cargado, triggers encontrados:', document.querySelectorAll('[data-target]').length);
    
    const triggers = document.querySelectorAll('[data-target]');
    const panels = document.querySelectorAll('[data-panel]');

    triggers.forEach(trigger => {
        trigger.addEventListener('mouseenter', () => {
            const target = trigger.dataset.target;
            panels.forEach(panel => {
                panel.classList.toggle('hidden', panel.dataset.panel !== target);
            });
        });
    });
});