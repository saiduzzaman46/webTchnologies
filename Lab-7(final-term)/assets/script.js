
function validate() {
  const name = document.getElementById("fullname");
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm-password");
  const country = document.getElementById("country");
  const male = document.getElementById("male").checked;
  const female = document.getElementById("female").checked;
  const dob = document.getElementById("dob");
  const dobYear = parseInt(dob.value);
  const termsCheckbox = document.getElementById("terms");

  const passwordValidate = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  const nameValidate = /^[A-Za-z\s]+$/;
  const emailValidate = /^\d{2}-\d{5}-[1-3]@student\.aiub\.edu$/;
  const passwordLength = 8;

  document.querySelectorAll(".error").forEach((el) => (el.textContent = ""));

  if (name.value === "") {
    document.querySelector(".errorName").textContent = "Name is required.";
    return false;
  } else if (!nameValidate.test(name.value)) {
    document.querySelector(".errorName").textContent =
      "Name contain only letters and spaces.";
    name.value = "";

    return false;
  }
  if (email.value === "") {
    document.querySelector(".errorEmail").textContent = "Email is required.";

    return false;
  } else if (!emailValidate.test(email.value)) {
    document.querySelector(".errorEmail").textContent =
      "Format: xx-xxxxx-x@student.aiub.edu";
    email.value = "";

    return false;
  }

  if (password.value === "") {
    document.querySelector(".errorPass").textContent = "Password is required.";

    return false;
  } else if (password.value.length < passwordLength) {
    document.querySelector(".errorPass").textContent =
      "Password at least 8 characters long.";

    return false;
  }else if (!passwordValidate.test(password.value)) {
    document.querySelector(".errorPass").textContent =
      "letter,number, and special character.";
    password.value = "";

    return false;
  }

  if (confirmPassword.value === "") {
    document.querySelector(".errorConPass").textContent =
      "Confirm your password.";

    return false;
  } else if (password.value !== confirmPassword.value) {
    document.querySelector(".errorConPass").textContent =
      "Passwords do not match.";
    confirmPassword.value = "";

    return false;
  }
  const currentYear = new Date().getFullYear();
  const age = currentYear - dobYear;
  if (dob.value === "") {
    document.querySelector(".errorDOB").textContent =
      "Please select your birth year.";

    return false;
  } else if (age < 18) {
    document.querySelector(".errorDOB").textContent =
      "You must 18 years or above to register.";

    return false;
  }
  if (country.value === "") {
    document.querySelector(".errorCountry").textContent =
      "Please select a country.";

    return false;
  }
  if (!male && !female) {
    document.querySelector(".errorGender").textContent =
      "Please select gender.";
    return false;
  }
  if (!termsCheckbox.checked) {
    document.querySelector(".errorTerms").textContent =
      "You must agree to the terms and conditions.";

    return false;
  }
  // alert("Form submitted successfully!");

  document.querySelector('.popup-container').classList.remove('hidden');
  document.querySelectorAll('.registration-data p')[0].innerHTML = `Name: ${name.value}`;
  document.querySelectorAll('.registration-data p')[1].innerHTML = `Email: ${email.value}`;
  document.querySelectorAll('.registration-data p')[2].innerHTML = `Country: ${country.value}`;
  document.querySelectorAll('.registration-data p')[3].innerHTML = `Gender: ${male ? 'Male' : 'Female'}`;
  document.querySelectorAll('.registration-data p')[4].innerHTML = `Date of Birth: ${dob.value}`;


  document.querySelector(".cancel").addEventListener("click", function () {
    document.querySelector('.popup-container').classList.add('hidden');
    return false;
  });

  return true;
}







const paragraphs = document.querySelectorAll('.registration-data p');


