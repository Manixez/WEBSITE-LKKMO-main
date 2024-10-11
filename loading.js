document.addEventListener("click", function(event) {
    var logo = document.getElementById("logo");
    
    // Cek apakah klik dilakukan di luar area logo
    if (!logo.contains(event.target)) {
      window.location.href = "semuafile/login.php"; // Pindah ke landingpage2.html
    }
  });
  