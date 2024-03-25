document.getElementById("searchInput").addEventListener("input", function () {
  var keyword = this.value.trim().toLowerCase(); // Ambil kata kunci pencarian dan ubah menjadi huruf kecil
  var sections = document.querySelectorAll("section"); // Ambil semua elemen section

  sections.forEach(function (section) {
    var content = section.textContent.trim().toLowerCase(); // Ambil konten dari setiap section dan ubah menjadi huruf kecil
    if (content.includes(keyword)) {
      // Periksa apakah konten section mengandung kata kunci pencarian
      section.style.display = "block"; // Tampilkan section jika mengandung kata kunci
    } else {
      section.style.display = "none"; // Sembunyikan section jika tidak mengandung kata kunci
    }
  });
});
