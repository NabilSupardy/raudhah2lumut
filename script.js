function loadPage(page) {
    var contentDiv = document.getElementById('content'); // Ambil elemen #content

    // Gunakan fetch untuk memuat konten dari file PHP
    fetch(page)
        .then(response => {
            // Jika respons gagal (status selain 200), lempar error
            if (!response.ok) {
                throw new Error('Halaman tidak ditemukan');
            }
            return response.text();
        })
        .then(data => {
            // Setelah mendapatkan data dari PHP, tampilkan di dalam elemen content
            contentDiv.innerHTML = data;
        })
        .catch(error => {
            // Tangani error jika ada masalah dengan pemuatan halaman
            console.error("Error loading page:", error);
            contentDiv.innerHTML = "<p>Terjadi kesalahan saat memuat halaman.</p>";
        });
}
