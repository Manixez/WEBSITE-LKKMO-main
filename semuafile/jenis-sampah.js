document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.item');
    
    items.forEach(item => {
      item.addEventListener('click', () => {
        let targetPage = '';
  
        if (item.querySelector('p').textContent === 'Kardus') {
          targetPage = 'kardus.html'; 
        } else if (item.querySelector('p').textContent === 'Botol Bekas') {
          targetPage = 'botol_bekas.html'; 
        } else if (item.querySelector('p').textContent === 'Kaleng Susu') {
          targetPage = 'kaleng_susu.html'; 
        } else if (item.querySelector('p').textContent === 'Kaca') {
          targetPage = 'kaca.html'; 
        }
  
        // Redirect ke halaman yang sesuai
        window.location.href = targetPage;
      });
    });
  });
  