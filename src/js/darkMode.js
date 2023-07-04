// var head = document.querySelector('head');
var body = document.body;


var darkModeToggle = document.getElementById('dark-mode-toggle');

/* Dark Mode */
darkModeToggle.addEventListener('click', ()=>{
  body.classList.toggle('dark');

  if(body.classList.contains('dark')){
    // Whenever the user explicitly chooses dark mode
    localStorage.theme = 'dark';
    darkIcon.classList.remove('hidden');
    lightIcon.classList.add('hidden');

    logo.setAttribute('src','assets/images/logo4-dark.webp');
    // logo2.setAttribute('src','assets/images/logo4-dark.webp');
    console.log('dark');
  } else {
    // Whenever the user explicitly chooses light mode
    localStorage.theme = 'light';
    darkIcon.classList.add('hidden');
    lightIcon.classList.remove('hidden');

    logo.setAttribute('src','assets/images/logo4.webp');
    // logo2.setAttribute('src','assets/images/logo4.webp');
    console.log('light');
  }
});