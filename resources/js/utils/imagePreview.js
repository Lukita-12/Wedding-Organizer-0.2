export function imagePreview(event, previewId) {
    const input = event.target;
    const preview = document.getElementById(previewId);
    const container = preview?.parentElement;

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            const span = container?.querySelector('span');
            if (span) span.classList.add('hidden');
        };

        reader.readAsDataURL(input.files[0]);
    }
}
