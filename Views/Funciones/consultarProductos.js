document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById('buscar');
    const tbody = document.querySelector('#tablaProductos tbody');
    const totalEl = document.getElementById('totalRegistros');

    if (!input || !tbody) return; // seguridad

    input.addEventListener('input', () => {
        const term = input.value.toLowerCase();
        let visibles = 0;
        for (const row of tbody.rows) {
            const text = row.innerText.toLowerCase();
            const show = text.includes(term);
            row.style.display = show ? '' : 'none';
            if (show) visibles++;
        }
        if (totalEl) totalEl.textContent = visibles;
    });
});
