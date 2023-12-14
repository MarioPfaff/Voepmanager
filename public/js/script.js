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

    filterDropdown.addEventListener('change', function() {
        const selectedValue = filterDropdown.value;
        const rows = workprocessTable.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');

            // Controleer of er minimaal twee cellen zijn (kerntaak en anderen)
            if (cells.length >= 2) {
                const cell = cells[1]; // Index van de tweede cel (kerntaak)

                if (selectedValue === '' || cell.innerText === selectedValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    });
});

