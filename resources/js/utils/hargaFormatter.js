function formatRupiah(angka) {
    let number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa  = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
}

function unformatRupiah(rp) {
    return rp.replace(/\./g, '').replace(',', '');
}

function setupHargaFormatting() {
    const dp = document.getElementById('hargaDP_paket');
    const lunas = document.getElementById('hargaLunas_paket');
    const form = document.querySelector('form');

    if (dp) {
        dp.addEventListener('keyup', function () {
            this.value = formatRupiah(this.value);
        });
    }

    if (lunas) {
        lunas.addEventListener('keyup', function () {
            this.value = formatRupiah(this.value);
        });
    }

    if (form && dp && lunas) {
        form.addEventListener('submit', function () {
            dp.value = unformatRupiah(dp.value);
            lunas.value = unformatRupiah(lunas.value);
        });
    }
}

window.setupHargaFormatting = setupHargaFormatting;