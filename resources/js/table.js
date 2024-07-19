document.addEventListener('DOMContentLoaded', () => {
    const rows = document.querySelectorAll('.table-row');
    
    rows.forEach((row) => {
        const hiddenContentId = row.getAttribute('data-href');
        const hiddenContent = document.getElementById(hiddenContentId);

        row.addEventListener('click', () => {
            if (hiddenContent.classList.contains('hidden')) 
                hiddenContent.classList.remove('hidden');
            else 
                hiddenContent.classList.add('hidden');    
        });
    });
});