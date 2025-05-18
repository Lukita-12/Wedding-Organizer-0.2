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

export function handleFileUpload(event, previewId, inputId) {
    if (!event || !previewId || !inputId) {
        console.warn('handleFileUpload: Parameter tidak lengkap!');
        return;
    }

    const file = event.target.files[0];
    if (file) {
        const preview = document.getElementById(previewId);
        const input = document.getElementById(inputId);

        if (preview) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
            preview.onload = () => URL.revokeObjectURL(preview.src);
        }

        if (input) {
            input.value = 'Sudah dibayar';
        }
    }
}