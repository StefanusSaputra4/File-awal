const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");
const btnPopup = document.querySelector(".btnLogin-popup");
const iconClose = document.querySelector(".icon-close");

// Whenever the "register" or "login" button is cliked (not the button, the link below the button), it will change the div class="wrapper"
// Since the class name is changed, then the CSS clde that gets targetted is different

registerLink.addEventListener("click", () => {
  // alert('REGISTER button has been clicked');
  wrapper.classList.add("active");
});

loginLink.addEventListener("click", () => {
  // alert('LOGIN button has been clicked');
  wrapper.classList.remove("active");
});

btnPopup.addEventListener("click", () => {
  // alert('top-right LOGIN button has been clicked');
  wrapper.classList.add("active-popup");
});

iconClose.addEventListener("click", () => {
  // alert("form's X button has been clicked");
  wrapper.classList.remove("active-popup");
});
