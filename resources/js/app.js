
// Get the button and menu elements
const notificationButton = document.getElementById('notification-button');
const notificationMenu = document.getElementById('notification-menu');

// Function to toggle the 'hidden' class
function toggleMenu() {
  notificationMenu.classList.toggle('hidden');
}

// Function to close the menu if a click occurs outside of it
function closeMenuOnClickOutside(event) {
  if (!notificationMenu.contains(event.target) && !notificationButton.contains(event.target)) {
    notificationMenu.classList.add('hidden');
  }
}

// Add event listener to the button to show/hide the menu
notificationButton.addEventListener('click', toggleMenu);

// Add event listener to the document to close the menu when clicking anywhere else
document.addEventListener('click', closeMenuOnClickOutside);

