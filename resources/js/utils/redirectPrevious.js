document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('previous');
    if (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            sessionStorage.setItem('previous_url', window.location.href);
            window.location.href = btn.getAttribute('data-url');
        });
    }
});