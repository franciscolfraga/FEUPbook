function formChange() {
    const checkbox = document.getElementById("trigger");
    const register = document.getElementById("register");
    const login = document.getElementById("login");
    if (register.style.display == "block" && login.style.display == "none") {
      register.style.display = "none";
      login.style.display = "block";
    } else {
      register.style.display = "block";
      login.style.display = "none";
    }
};
