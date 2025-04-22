document.addEventListener('DOMContentLoaded', function() {
   
    document.querySelector('#year').textContent = new Date().getFullYear();
    
   
    const quoteBtn = document.getElementById('quoteBtn');
    if (quoteBtn) {
        quoteBtn.addEventListener('click', function() {
    
            alert("Thank you for your interest! Our team will contact you shortly to discuss your needs.");
        });
    }
});