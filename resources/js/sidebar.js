document.addEventListener('DOMContentLoaded', () => {
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

    /*triggers.forEach(trigger => {
        trigger.addEventListener('mouseleave', () => {
            const target = trigger.dataset.target;
            panels.forEach(panel => {
                panel.classList.toggle('hidden', panel.dataset.panel == target);
            });
        });
    });*/
});

