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

