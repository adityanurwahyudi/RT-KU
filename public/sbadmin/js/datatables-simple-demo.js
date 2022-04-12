window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    const suratDomisili = document.getElementById('surat-domisili');
    if (suratDomisili) {
        new simpleDatatables.DataTable(suratDomisili);
    }
});
