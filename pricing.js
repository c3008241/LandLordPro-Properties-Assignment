document.addEventListener('DOMContentLoaded', function() {
    // Update copyright year
    document.querySelector('#year').textContent = new Date().getFullYear();
    
    // Quote button functionality
    const quoteBtn = document.getElementById('quoteBtn');
    if (quoteBtn) {
        quoteBtn.addEventListener('click', function() {
            // This could be expanded to show a contact form or redirect
            alert("Thank you for your interest! Our team will contact you shortly to discuss your needs.");
        });
    }
});