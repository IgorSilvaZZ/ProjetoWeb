new WOW().init();
  
function toggleTheme () {
  const principal = document.getElementById("principal");
  const teste = document.getElementById("teste");
  if (principal.hasAttribute("data-theme")) {
      principal.removeAttribute("data-theme")
      teste.removeAttribute("data-theme")
      return
  }
  principal.setAttribute("data-theme", "dark"); 
  teste.setAttribute("data-theme", "dark");

}

document.getElementById("switch-shadow").addEventListener("click", toggleTheme);

/* document.getElementById("theme-toggle").addEventListener("click", toggleTheme); */
/* document.getElementById("switch-shadow").onclick = function (){
    toggleTheme();
  } */
