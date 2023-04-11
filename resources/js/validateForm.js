document
  .getElementById("register-form")
  .addEventListener("submit", function (e) {
    const checked = validateForm();
    if (!checked) {
      e.preventDefault();
    }
  });

function validateForm() {
  let form = document.getElementById("register-form");
  const checked = document.getElementById("agree-term").checked;

  var passwordPattern = /^(?=.*[a-z])(?=.*[0-9]).{8,}$/;

  if (form.pass.value !== form.re_pass.value) {
    alert("Passwords do not match!");
    form.pass.focus();
    return false;
  } else if (!passwordPattern.test(form.pass.value)) {
    alert(
      "Passwords must have at least 8 characters, at least one letter and one number!"
    );
    return false;
  } else if (!checked) {
    alert("You must agree to the terms and conditions!");
    return false;
  }

  return true;
}
