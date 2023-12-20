document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.querySelector('.alert-success');
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 4000); // Verberg de success-melding na 5 seconden (5000 milliseconden)
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const filterDropdown = document.getElementById('filterDropdown');
    const workprocessTable = document.getElementById('workprocessTable');

    filterDropdown.addEventListener('input', function() {
        const selectedValue = filterDropdown.value;
        const rows = workprocessTable.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');

            // Check if there are at least two cells (kerntaak and others)
            if (cells.length >= 2) {
                const cell = cells[1]; // Index of the second cell (kerntaak)

                if (selectedValue === '' || cell.textContent === selectedValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    });
});

