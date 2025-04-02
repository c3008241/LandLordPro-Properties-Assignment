document.addEventListener('DOMContentLoaded', function() {
    const tenantBtn = document.getElementById('tenantBtn');
    const landlordBtn = document.getElementById('landlordBtn');
    const loginForm = document.getElementById('loginForm');
    
    tenantBtn.addEventListener('click', function() {
      tenantBtn.classList.add('active');
      landlordBtn.classList.remove('active');
      loginForm.action = 'login-tenant.php';
    });
    
    landlordBtn.addEventListener('click', function() {
      landlordBtn.classList.add('active');
      tenantBtn.classList.remove('active');
      loginForm.action = 'login-landlord.php';
    });
    
    const yearElement = document.querySelector('#copyRight');
    if (yearElement) {
      yearElement.textContent = `Copyright © ${new Date().getFullYear()}`;
    }
  });

if (document.referrer.includes("properties")) {
    document.querySelector('.navBar').innerHTML += `
      <li><a href="tour.html?property=123" class="tour-cta">🏡 Virtual Tour</a></li>
    `;
  }