const menu = document.getElementById("m-menu");
const btnMenu = document.querySelector("[btnMenu]");
btnMenu.addEventListener("click", () => {
  menu.classList.toggle("-translate-y-full");
  menu.classList.toggle("opacity-0");
  btnMenu.classList.toggle("group");
});

window.onscroll = () => {
  const nav = document.getElementById("navBlur");
  const navBlur = nav.offsetTop;

  if (window.pageYOffset > navBlur) {
    nav.classList.add("navbar-blur");
  } else {
    nav.classList.remove("navbar-blur");
  }
};
