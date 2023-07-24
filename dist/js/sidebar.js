/* Sidebar Functions */

const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const mdBreakpoint = 768; // The breakpoint width for "md" screens

const sidebarButton = document.querySelector('.toggle-button');
const xIcon = document.getElementById('sidebarX');
const oIcon = document.getElementById('sidebarO');

let isSidebarOpen = false; // Track the state of the sidebar

function openSidebar() {
  sidebar.classList.remove('-translate-x-full');
  sidebarOverlay.classList.remove('hidden');
  isSidebarOpen = true;
}

function closeSidebar() {
  sidebar.classList.add('-translate-x-full');
  sidebarOverlay.classList.add('hidden');
  isSidebarOpen = false;
}


function toggleSidebar() {
  const isMdScreen = window.innerWidth >= mdBreakpoint;

  if (isMdScreen) {
    // Close the sidebar if the screen width exceeds the "md" breakpoint
    if (isSidebarOpen) {
      closeSidebar();
    }
  } else {
    // Toggle the sidebar normally
    if (isSidebarOpen) {
      closeSidebar();
    } else {
      openSidebar();
    }
  }
}

sidebarOverlay.addEventListener('click', (event) => {
  const isClickInside = sidebar.contains(event.target) || sidebarButton.contains(event.target);
  if (!isClickInside && isSidebarOpen) {
    closeSidebar();
  }
})

function resizeFunction() {
  const isMdScreen = window.innerWidth >= mdBreakpoint;

  if(isMdScreen && isSidebarOpen){
    closeSidebar()
  }
  // console.log('Resized ',isMdScreen);
}

// Check the screen width on window resize
window.addEventListener('resize', resizeFunction);


/* Darkmode toggle Functions */

var body = document.body;

darkModeToggle = document.getElementById("dark-mode-toggle");
lightIcon = document.getElementById("sun-icon");
darkIcon = document.getElementById("moon-icon");
logo = document.getElementById("zangi-logo-1");
src = logo.getAttribute("src");

body = ("dark" === localStorage.theme || !("theme"in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches ? 

(this.body.classList.add("dark"),
logo.setAttribute("src","assets/images/logo4-dark.webp"),
darkIcon.classList.remove("hidden"),
lightIcon.classList.add("hidden")) :

(this.body.classList.remove("dark"),
logo.setAttribute("src","assets/images/logo4.webp"),
darkIcon.classList.add("hidden"),
lightIcon.classList.remove("hidden")), document.body)

