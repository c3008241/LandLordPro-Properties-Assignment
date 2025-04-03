
document.getElementById("currentYear").textContent = new Date().getFullYear();

document.getElementById('propertyFilters').addEventListener('submit', function(e) {
  e.preventDefault(); 
  
  const formData = new FormData(this);
  const params = new URLSearchParams(formData);
  
  fetch(`filter-properties.php?${params}`)
    .then(response => {
      if (!response.ok) throw new Error("Network error");
      return response.text();
    })
    .then(data => {
      document.getElementById('propertyResults').innerHTML = data;
    })
    .catch(error => {
      console.error('Error:', error);
      document.getElementById('propertyResults').innerHTML = 
        '<p class="error">Error loading properties. Please try again.</p>';
    });
});

function loadAllProperties() {
  fetch('filter-properties.php')
    .then(response => {
      if (!response.ok) throw new Error("Network error");
      return response.text();
    })
    .then(data => {
      document.getElementById('propertyResults').innerHTML = data;
    })
    .catch(error => {
      console.error('Error:', error);
      document.getElementById('propertyResults').innerHTML = 
        '<p class="error">Error loading properties. Please try again.</p>';
    });
}

document.addEventListener('DOMContentLoaded', function() {
  loadAllProperties();
});