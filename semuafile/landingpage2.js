// Tambahkan event listener pada elemen profile
document.querySelector('.profile').addEventListener('click', function() {
    // Toggle tampil atau sembunyikan dropdown
    const dropdown = this.querySelector('.dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
  });
  
  // Klik di luar dropdown untuk menutupnya
  window.addEventListener('click', function(e) {
    const profileDropdown = document.querySelector('.profile .dropdown');
    if (!e.target.closest('.profile')) {
      profileDropdown.style.display = 'none';
    }
  });
  