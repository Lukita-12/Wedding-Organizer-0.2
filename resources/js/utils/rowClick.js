document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.row-click').forEach(row => {
        row.addEventListener('click', () => {
            const url = row.dataset.url;
            if (url) {
                window.location = url;
            }
        });
    });
});