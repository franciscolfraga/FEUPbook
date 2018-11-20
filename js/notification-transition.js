const errorsDiv = document.getElementById("errors");
const successDiv = document.getElementById("success");
const nodbDiv = document.getElementById("db-error-container");

window.onload = function() {
  divDeal(errorsDiv);
  divDeal(successDiv);
  divDeal(nodbDiv);
};

function divDeal(myDiv) {
  if(myDiv!=null){
    myDiv.style.visibility = "visible";
    myDiv.classList.add("show");
    myDiv.onclick = function() {
        myDiv.classList.remove("show");
        myDiv.classList.add("hidden");
        setTimeout(function () {
        myDiv.style.visibility = "hidden";
      }, 70);
    };
  }
};
