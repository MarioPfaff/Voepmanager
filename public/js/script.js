/* Timer: Meldingen */

document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.querySelector('.alert-success');
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 4000); // Verberg de success-melding na 4 seconden (4000 milliseconden)
    }
});

/* Filter: Werkprocessen */

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

document.addEventListener('DOMContentLoaded', function() {
    // Back Button
    const backBtn = document.getElementById('backBtn');

    if (backBtn) {
        // Get the current URL
        const currentURL = window.location.href;

        // Check if the URL contains 'edit'
        if (currentURL.includes('edit', 'view')) {
            // If 'edit' is found, go back 2 slashes
            const lastSlash = currentURL.lastIndexOf('/');
            const secondLastSlash = currentURL.lastIndexOf('/', lastSlash - 1);
            const newURL = currentURL.substring(0, secondLastSlash);

            // Update the href attribute
            backBtn.setAttribute('href', newURL);
        } else {
            // If 'edit' is not found, go back 1 slash
            const lastSlash = currentURL.lastIndexOf('/');
            const newURL = currentURL.substring(0, lastSlash);

            // Update the href attribute
            backBtn.setAttribute('href', newURL);
        }
    }
});
