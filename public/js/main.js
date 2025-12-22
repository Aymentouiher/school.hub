// ============================================
// SchoolHub - Main JavaScript
// ============================================

document.addEventListener('DOMContentLoaded', function() {
  // Initialize interactive elements
  initializeButtons();
  initializeNavigation();
  initializePricingCards();
});

/**
 * Initialize button interactions
 */
function initializeButtons() {
  const buttons = document.querySelectorAll('.btn');
  
  buttons.forEach(button => {
    button.addEventListener('click', function(e) {
      // Add ripple effect
      const ripple = document.createElement('span');
      ripple.classList.add('ripple');
      this.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  });
}

/**
 * Initialize navigation
 */
function initializeNavigation() {
  const navLinks = document.querySelectorAll('nav a');
  
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      // Add active state
      navLinks.forEach(l => l.classList.remove('active'));
      this.classList.add('active');
    });
  });
}

/**
 * Initialize pricing cards with hover effects
 */
function initializePricingCards() {
  const pricingCards = document.querySelectorAll('.pricing-card');
  
  pricingCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      // Add hover effect
      this.style.transform = 'scale(1.05)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });
}

/**
 * Smooth scroll to section
 */
function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
  }
}

/**
 * Handle form submission
 */
function handleFormSubmit(formId, callback) {
  const form = document.getElementById(formId);
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      if (callback) callback(new FormData(form));
    });
  }
}

/**
 * Show notification
 */
function showNotification(message, type = 'success') {
  const notification = document.createElement('div');
  notification.className = `notification notification-${type}`;
  notification.textContent = message;
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.classList.add('show');
  }, 100);
  
  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => notification.remove(), 300);
  }, 3000);
}

/**
 * Export functions for use in other scripts
 */
window.SchoolHub = {
  scrollToSection,
  handleFormSubmit,
  showNotification
};
