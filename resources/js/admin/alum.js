import { http } from '../api.js';

document.addEventListener('DOMContentLoaded', () => {
    const modalIndividual = document.getElementById('modal-individual');
    const modalExcel = document.getElementById('modal-excel');
    const modalEditar = document.getElementById('modal-editar-alumno');

    document.getElementById('btn-open-individual')?.addEventListener('click', () => {
        modalIndividual?.classList.remove('hidden');
    });

    document.getElementById('btn-open-excel')?.addEventListener('click', () => {
        modalExcel?.classList.remove('hidden');
    });

    const clearFormErrors = (form) => {
        form.querySelectorAll('.js-validation-error, .js-form-error, .text-red-500').forEach(error => error.remove());
        form.querySelectorAll('[aria-invalid="true"]').forEach(input => input.removeAttribute('aria-invalid'));
    };

    const closeModal = (modal) => {
        if (!modal) return;

        modal.querySelectorAll('form').forEach(form => {
            form.reset();
            form.querySelectorAll('input:not([type="hidden"]):not([type="submit"]):not([type="button"]):not([type="reset"]), textarea').forEach(field => {
                if (field.type === 'checkbox' || field.type === 'radio') {
                    field.checked = false;
                } else {
                    field.value = '';
                }
            });
            form.querySelectorAll('select').forEach(field => {
                field.selectedIndex = 0;
            });
            clearFormErrors(form);
        });

        modal.querySelectorAll('.alert, .table-responsive').forEach(message => message.remove());
        modal.querySelector('#excel-import-results')?.replaceChildren();
        modal.classList.add('hidden');
    };

    document.querySelectorAll('.btn-close-modal').forEach(btn => {
        btn.addEventListener('click', () => closeModal(document.getElementById(btn.dataset.modal)));
    });

    [modalIndividual, modalExcel, modalEditar].forEach(modal => {
        modal?.addEventListener('click', event => {
            if (event.target === modal) closeModal(modal);
        });
    });

    document.addEventListener('keydown', event => {
        if (event.key !== 'Escape') return;
        [modalIndividual, modalExcel, modalEditar].forEach(modal => {
            if (modal && !modal.classList.contains('hidden')) closeModal(modal);
        });
    });

    const showFormError = (form, message, fieldErrors = {}) => {
        Object.entries(fieldErrors).forEach(([field, messages]) => {
            const input = form.elements.namedItem(field);
            if (!input || !('insertAdjacentElement' in input)) return;

            input.setAttribute('aria-invalid', 'true');
            const error = document.createElement('p');
            error.className = 'js-validation-error mt-1 text-sm text-red-600';
            error.textContent = Array.isArray(messages) ? messages.join(' ') : messages;
            input.insertAdjacentElement('afterend', error);
        });

        if (message) {
            const error = document.createElement('p');
            error.className = 'js-form-error mb-4 text-sm text-red-600';
            error.setAttribute('role', 'alert');
            error.textContent = message;
            form.prepend(error);
        }
    };

    const tableBody = document.getElementById('table-body');
    const importResults = document.getElementById('excel-import-results');

    const renderImportFailures = (failures = []) => {
        if (!importResults) return;
        importResults.replaceChildren();
        if (failures.length === 0) return;

        const wrapper = document.createElement('div');
        wrapper.className = 'my-4 overflow-x-auto';
        const table = document.createElement('table');
        table.className = 'w-full border border-red-200 text-left text-sm';
        table.innerHTML = '<thead><tr><th class="border p-2">Fila Excel</th><th class="border p-2">Columna</th><th class="border p-2">Errores encontrados</th><th class="border p-2">Valor enviado</th></tr></thead>';
        const body = document.createElement('tbody');

        failures.forEach(failure => {
            const row = document.createElement('tr');
            const values = failure.values || {};
            const cells = [
                failure.row ?? 'N/A',
                failure.attribute ?? '',
                (failure.errors || []).join(', '),
                values[failure.attribute] ?? 'N/A / Vacío'
            ];

            cells.forEach(value => {
                const cell = document.createElement('td');
                cell.className = 'border p-2';
                cell.textContent = String(value);
                row.appendChild(cell);
            });
            body.appendChild(row);
        });

        table.appendChild(body);
        wrapper.appendChild(table);
        importResults.appendChild(wrapper);
    };

    const submitForm = (form, modal) => {
        form?.addEventListener('submit', async (event) => {
            event.preventDefault();
            clearFormErrors(form);

            try {
                const res = await http(form.action, {
                    method: 'POST',
                    body: new FormData(form)
                });

                if (form.id === 'form-excel-alumno') {
                    renderImportFailures(res.failures);
                    if (res.html && tableBody) tableBody.innerHTML = res.html;
                }

                if (!res.success) {
                    showFormError(form, res.message || 'No se pudo completar la solicitud.');
                    return;
                }

                form.reset();
                modal?.classList.add('hidden');
                if (res.html && tableBody && form.id !== 'form-excel-alumno') tableBody.innerHTML = res.html;
            } catch (err) {
                showFormError(
                    form,
                    err.data?.message || 'Revisa los datos del formulario e inténtalo de nuevo.',
                    err.data?.errors || {}
                );
            }
        });
    };

    submitForm(document.getElementById('form-crear-alumno'), modalIndividual);
    submitForm(document.getElementById('form-excel-alumno'), modalExcel);
    submitForm(document.getElementById('form-editar-alumno'), modalEditar);

    document.addEventListener('click', async (event) => {
        const button = event.target.closest('.btn-editar-alumno');
        if (!button) return;

        const matricula = button.dataset.id;
        const form = document.getElementById('form-editar-alumno');

        try {
            const res = await http(`/alumnos/${encodeURIComponent(matricula)}/edit`);
            if (!res.success || !form) return;

            Object.entries(res.alumno).forEach(([field, value]) => {
                const input = form.elements.namedItem(field);
                if (input) input.value = value ?? '';
            });
            form.action = `/alumnos/${encodeURIComponent(matricula)}`;
            clearFormErrors(form);
            modalEditar?.classList.remove('hidden');
        } catch (err) {
            console.error('Error al cargar el alumno:', err);
            alert(err.data?.message || 'No se pudieron cargar los datos del alumno.');
        }
    });

    // Búsqueda por Matrícula Nombre o Correo
    const searchInput = document.getElementById('simple-search');
    let timeout = null;

    if (searchInput && tableBody) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value;

            clearTimeout(timeout);

            timeout = setTimeout(async () => {
                try {
                    const res = await http(`/alumnos?texto=${encodeURIComponent(query)}`);

                    if (res.success && res.html !== undefined) {
                        tableBody.innerHTML = res.html;
                    }
                } catch (error) {
                    console.error('Error al realizar la búsqueda:', error);
                }
            }, 300);
        });
    }

    // Eliminar Alumno
    document.addEventListener('click', async (e) => {
        const boton = e.target.closest('.btn-eliminar');
        if (!boton) return;

        const matricula = boton.dataset.id;

        if (!confirm(`¿Deseas eliminar al alumno con matrícula ${matricula}?`)) return;

        try {
            const res = await http(`/alumnos/${matricula}`, { method: 'DELETE' });

            if (res.success) {
                const fila = document.getElementById(`alumno-${matricula}`);
                if (fila) {
                    fila.style.transition = 'all 0.3s ease';
                    fila.style.opacity = '0';
                    setTimeout(() => fila.remove(), 300);
                }
            }
        } catch (err) {
            console.error('Error al eliminar:', err);
            alert(err.data?.message || 'Error al intentar eliminar');
        }
    });

});