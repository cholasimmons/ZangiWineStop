/* Button Functions */

function demoBtn() {
  console.log('Button pressed');
  window.location.href = "tel:260966785053"
}

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

// Update the DOM to reflect the new dark mode state.

const button = document.getElementById("dark-mode-toggle");
const moonIcon = document.getElementById("moon-icon");
const sunIcon = document.getElementById("sun-icon");

const logo = document.getElementById("zangi-logo-1");
const lightImage = "assets/images/logo4.webp";
const darkImage = "assets/images/logo4-dark.webp";

var isDarkMode = localStorage.getItem("darkMode") === "true";
console.log('dm ',isDarkMode);

// console.warn('Storage Theme: ',localStorage.theme);
// console.warn('Storage Mode: ',localStorage.getItem("darkMode"));

const darkModeToggle = () => {

  // On page load or when changing themes, best to add inline in `head` to avoid FOUC
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.remove('dark');

    console.log('light');

    // Whenever the user explicitly chooses dark mode
    localStorage.theme = 'light';

    isDarkMode = false;

    // Toggle the dark mode state.
    localStorage.setItem("darkMode", isDarkMode);
  } else {
    document.documentElement.classList.add('dark');

    console.log('dark');

    // Whenever the user explicitly chooses light mode
    localStorage.theme = 'dark';

    isDarkMode = true;
  
    // Toggle the dark mode state.
    localStorage.setItem("darkMode", isDarkMode);
  }

  if(isDarkMode){
    moonIcon.classList.remove("hidden");
    sunIcon.classList.add("hidden");
    logo.src = logo.dataset.src;
  } else {
    moonIcon.classList.add("hidden");
    sunIcon.classList.remove("hidden");
    logo.src = lightImage;
  }
}

// Add an event listener to the button to call the darkModeToggle() function when it is clicked.
document.getElementById("dark-mode-toggle").addEventListener("click", darkModeToggle);