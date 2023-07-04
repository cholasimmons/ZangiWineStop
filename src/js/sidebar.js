/* Sidebar */

const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

const sidebarButton = document.querySelector('.toggle-button');
const xIcon = document.getElementById('sidebarX');
const oIcon = document.getElementById('sidebarO');


function toggleSidebar() {
  sidebar.classList.toggle('-translate-x-full');
  //sidebar.classList.toggle('hidden');
  sidebarOverlay.classList.toggle('hidden');
}

sidebarOverlay.addEventListener('click', (event) => {
  const isClickInside = sidebar.contains(event.target) || sidebarButton.contains(event.target);
  if (!isClickInside && !sidebar.classList.contains('hidden')) {
    toggleSidebar();
  }
})