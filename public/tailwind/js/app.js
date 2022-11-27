const loginRegis = document.getElementById("loginRegis");
const loginPage = document.getElementById("loginPage");
const regisPage = document.getElementById("regisPage");

const btnLogin = document.querySelector("[btnLogin]");
const btnRegis = document.querySelector("[btnRegis]");
const btnKeLogin = document.querySelector("[btnKeLogin]");
const btnClose = document.querySelector("[btnClose]");

let tabsContainer = document.querySelector("#tabs");
let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

btnLogin.addEventListener("click", () => {
  loginRegis.classList.remove("-translate-y-full");
});

btnRegis.addEventListener("click", () => {
  loginPage.classList.toggle("-translate-x-full");
  regisPage.classList.toggle("-translate-x-full");
});

btnKeLogin.addEventListener("click", () => {
  loginPage.classList.toggle("-translate-x-full");
  regisPage.classList.toggle("-translate-x-full");
});

btnClose.addEventListener("click", () => {
  loginRegis.classList.add("-translate-y-full");
});


tabTogglers.forEach(function (toggler) {
  toggler.addEventListener("click", function (e) {
    e.preventDefault();

    let tabName = this.getAttribute("href");

    let tabContents = document.querySelector("#tab-contents");

    for (let i = 0; i < tabContents.children.length; i++) {
      tabTogglers[i].parentElement.classList.remove("bg-color", "text-color2");

      tabContents.children[i].classList.remove("hidden");
      if ("#" + tabContents.children[i].id === tabName) {
        continue;
      }
      tabContents.children[i].classList.add("hidden");
    }
    e.target.parentElement.classList.add("bg-color", "text-color2");
  });
});
