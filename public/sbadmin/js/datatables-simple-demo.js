window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    } 
    const satu = document.getElementById('satu');
    if (satu) {
        new simpleDatatables.DataTable(satu);
    }
    const dua = document.getElementById('dua');
    if (dua) {
        new simpleDatatables.DataTable(dua);
    }
    const suratDomisili = document.getElementById('surat-domisili');
    if (suratDomisili) {
        new simpleDatatables.DataTable(suratDomisili);
    }
});
