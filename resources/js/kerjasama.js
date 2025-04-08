function formatRupiah(input) {
    let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
    let formatted = new Intl.NumberFormat('id-ID').format(value); // Format with thousand separators
    input.value = formatted;
}