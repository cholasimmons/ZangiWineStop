var body = document.body;
var lightIcon = document.getElementById('sun-icon');
var darkIcon = document.getElementById('moon-icon');

var logo = document.getElementById('zangi-logo-1');
// var logo2 = document.getElementById('zangi-logo-2');
var src = logo.getAttribute('src');

// console.log(logo);

// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  this.body.classList.add('dark');
  logo.setAttribute('src','assets/images/logo4-dark.webp');
  // logo2.setAttribute('src','assets/images/logo4-dark.webp');
  darkIcon.classList.remove('hidden');
  lightIcon.classList.add('hidden');

} else {
  this.body.classList.remove('dark');
  logo.setAttribute('src','assets/images/logo4.webp');
  // logo2.setAttribute('src','assets/images/logo4.webp');
  darkIcon.classList.add('hidden');
  lightIcon.classList.remove('hidden');
}