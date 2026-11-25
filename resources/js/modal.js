const modalIndividual = document.getElementById('modal-individual');
const modalExcel = document.getElementById('modal-excel');

document.getElementById('btn-open-individual')?.addEventListener('click', () => {
    modalIndividual?.classList.remove('hidden');
});

document.getElementById('btn-open-excel')?.addEventListener('click', () => {
    modalExcel?.classList.remove('hidden');
});

// Botones de cerrar (✕)
document.querySelectorAll('.btn-close-modal').forEach(btn => {
    btn.addEventListener('click', () => {
        const modalId = btn.dataset.modal;
        document.getElementById(modalId)?.classList.add('hidden');
    });
});