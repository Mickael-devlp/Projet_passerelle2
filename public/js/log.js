// Pour passer d'un formulaire à un autre

document
  .getElementById("switch_to_register")
  .addEventListener("click", (event) => {
    event.preventDefault();
    document.querySelector(".wrapper").classList.add("hidden_log");
  });
document
  .getElementById("switch_to_login")
  .addEventListener("click", (event) => {
    event.preventDefault();
    document.querySelector(".wrapper").classList.remove("hidden_log");
  });

//   Pour rendre le mot de passe visible grâce à l'oeil (de Sauron)

const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

togglePassword.addEventListener("click", () => {
  // Change le type de ipassword à text pour voir le mdp
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);

  // Change l’icône de normal à barré
  togglePassword.setAttribute(
    "name",
    type === "password" ? "eye-outline" : "eye-off-outline",
  );
});

//
