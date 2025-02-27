
// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// Set current date
document.getElementById('currentDate').innerHTML = new Date().toLocaleDateString('en-US', {
  weekday: 'long',
  year: 'numeric',
  month: 'long',
  day: 'numeric'
});

// Quick access menu
document.getElementById('quickAccess').addEventListener('click', function() {
  var toast = new bootstrap.Toast(document.getElementById('quickAccessToast'))
  toast.show()
});

// Simple counter animation
document.querySelectorAll('.counter-animation').forEach(function(counter) {
  const target = parseInt(counter.textContent);
  let count = 0;
  const interval = setInterval(function() {
    counter.textContent = count;
    count++;
    if (count > target) {
      clearInterval(interval);
      counter.textContent = target;
    }
  }, 20);
});








// EVENTS
