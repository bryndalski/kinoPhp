// @ts-nocheck
const button = document.querySelector("#sub");
button.disabled = true;
document.querySelector("#phone").addEventListener("input", (e) => {
  if (validatePhone(e.target.value)) {
    e.target.classList.remove("border--error");
    e.target.classList.add("border--valid");
  } else {
    button.disabled = true;
    e.target.classList.remove("border--valid");
    e.target.classList.add("border--error");
  }
});

function validatePhone(phone) {
  var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  return re.test(phone);
}

function change(bool) {
  if (bool) {
    document.querySelector("#ps1").classList.remove("border--error");
    document.querySelector("#ps2").classList.remove("border--error");
    document.querySelector("#ps1").classList.add("border--valid");
    document.querySelector("#ps2").classList.add("border--valid");
  } else {
    document.querySelector("#ps1").classList.remove("border--valid");
    document.querySelector("#ps2").classList.remove("border--valid");
    document.querySelector("#ps1").classList.add("border--error");
    document.querySelector("#ps2").classList.add("border--error");
  }
}

function validPassword() {
  if (
    document.querySelector("#ps1").value ===
      document.querySelector("#ps2").value &&
    document.querySelector("#ps1").value !== "" &&
    document.querySelector("#ps2").value !== ""
  ) {
    return true;
  } else {
    return false;
  }
}
document.querySelector("form").addEventListener("input", () => {
  if (
    validPassword() &&
    validatePhone(document.querySelector("#phone").value) &&
    document.querySelector("#login").value != ""
  ) {
    button.disabled = false;
  } else button.disabled = true;
});

document.querySelector("#ps1").addEventListener("input", () => {
  change(validPassword());
});

document.querySelector("#ps2").addEventListener("input", () => {
  change(validPassword());
});
