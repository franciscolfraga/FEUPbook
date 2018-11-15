

function formChange() {
    var checkbox = document.getElementById("trigger");
    var register = document.getElementById("register");
    var login = document.getElementById("login");
    if (register.style.display == "block" && login.style.display == "none") {
      register.style.display = "none";
      login.style.display = "block";
      document.getElementById("login").reset();
    } else {
      register.style.display = "block";
      login.style.display = "none";
      document.getElementById("register").reset();
    }
  };
