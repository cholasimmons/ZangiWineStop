var body=document.body,

lightIcon=document.getElementById("sun-icon"),
darkIcon=document.getElementById("moon-icon"),
logo=document.getElementById("zangi-logo-1"),
src=logo.getAttribute("src"),

body=("dark"===localStorage.theme||!("theme"in localStorage)&&window.matchMedia("(prefers-color-scheme: dark)").matches?(this.body.classList.add("dark"),
logo.setAttribute("src","assets/images/logo4-dark.webp"),
darkIcon.classList.remove("hidden"),
lightIcon.classList.add("hidden")):(this.body.classList.remove("dark"),
logo.setAttribute("src","assets/images/logo4.webp"),
darkIcon.classList.add("hidden"),
lightIcon.classList.remove("hidden")),document.body),
darkModeToggle=document.getElementById("dark-mode-toggle");

function startCarousel(){const e=document.querySelectorAll(".hero-carousel-item");let t=0;setInterval(()=>{e[t].style.opacity=0,t=(t+1)%e.length,e[t].style.opacity=1},4e3)}

darkModeToggle.addEventListener("click",()=>{body.classList.toggle("dark"),
body.classList.contains("dark")?(localStorage.theme="dark",
darkIcon.classList.remove("hidden"),
lightIcon.classList.add("hidden"),
logo.setAttribute("src","assets/images/logo4-dark.webp"),
console.log("dark")):(localStorage.theme="light",
darkIcon.classList.add("hidden"),
lightIcon.classList.remove("hidden"),
logo.setAttribute("src","assets/images/logo4.webp"),
console.log("light"))}),

startCarousel();

const sidebar=document.getElementById("sidebar"),
sidebarOverlay=document.getElementById("sidebarOverlay"),
sidebarButton=document.querySelector(".toggle-button"),
xIcon=document.getElementById("sidebarX"),oIcon=document.getElementById("sidebarO");
function toggleSidebar(){sidebar.classList.toggle("-translate-x-full"),
sidebarOverlay.classList.toggle("hidden")}sidebarOverlay.addEventListener("click",e=>{sidebar.contains(e.target)||sidebarButton.contains(e.target)||sidebar.classList.contains("hidden")||toggleSidebar()});