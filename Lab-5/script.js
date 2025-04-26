// List of countries (or you can fetch from an API)

const countries = [
  "Afghanistan",
  "Albania",
  "Algeria",
  "Andorra",
  "Angola",
  "Antigua and Barbuda",
  "Argentina",
  "Armenia",
  "Australia",
  "Austria",
  "Azerbaijan",
  "Bahamas",
  "Bahrain",
  "Bangladesh",
  "Barbados",
  "Belarus",
  "Belgium",
  "Belize",
  "Benin",
  "Bhutan",
  "Bolivia",
  "Bosnia and Herzegovina",
  "Botswana",
  "Brazil",
  "Brunei",
  "Bulgaria",
  "Burkina Faso",
  "Burundi",
  "Cabo Verde",
  "Cambodia",
  "Cameroon",
  "Canada",
  "Chad",
  "Chile",
  "China",
  "Colombia",
  "Comoros",
  "Congo",
  "Costa Rica",
  "Croatia",
  "Cuba",
  "Cyprus",
  "Czechia",
  "Denmark",
  "Djibouti",
  "Dominica",
  "Dominican Republic",
  "Ecuador",
  "Egypt",
  "El Salvador",
  "Equatorial Guinea",
  "Eritrea",
  "Estonia",
  "Eswatini",
  "Ethiopia",
  "Fiji",
  "Finland",
  "France",
  "Gabon",
  "Gambia",
  "Georgia",
  "Germany",
  "Ghana",
  "Greece",
  "Grenada",
  "Guatemala",
  "Guinea",
  "Guinea-Bissau",
  "Guyana",
  "Haiti",
  "Honduras",
  "Hungary",
  "Iceland",
  "India",
  "Indonesia",
  "Iran",
  "Iraq",
  "Ireland",
  "Israel",
  "Italy",
  "Jamaica",
  "Japan",
  "Jordan",
  "Kazakhstan",
  "Kenya",
  "Kiribati",
  "Korea (North)",
  "Korea (South)",
  "Kuwait",
  "Kyrgyzstan",
  "Laos",
  "Latvia",
  "Lebanon",
  "Lesotho",
  "Liberia",
  "Libya",
  "Liechtenstein",
  "Lithuania",
  "Luxembourg",
  "Madagascar",
  "Malawi",
  "Malaysia",
  "Maldives",
  "Mali",
  "Malta",
  "Marshall Islands",
  "Mauritania",
  "Mauritius",
  "Mexico",
  "Micronesia",
  "Moldova",
  "Monaco",
  "Mongolia",
  "Montenegro",
  "Morocco",
  "Mozambique",
  "Myanmar",
  "Namibia",
  "Nauru",
  "Nepal",
  "Netherlands",
  "New Zealand",
  "Nicaragua",
  "Niger",
  "Nigeria",
  "North Macedonia",
  "Norway",
  "Oman",
  "Pakistan",
  "Palau",
  "Panama",
  "Papua New Guinea",
  "Paraguay",
  "Peru",
  "Philippines",
  "Poland",
  "Portugal",
  "Qatar",
  "Romania",
  "Russia",
  "Rwanda",
  "Saint Kitts and Nevis",
  "Saint Lucia",
  "Saint Vincent ",
  "Samoa",
  "San Marino",
  "Sao Tome and Principe",
  "Saudi Arabia",
  "Senegal",
  "Serbia",
  "Seychelles",
  "Sierra Leone",
  "Singapore",
  "Slovakia",
  "Slovenia",
  "Solomon Islands",
  "Somalia",
  "South Africa",
  "Spain",
  "Sri Lanka",
  "Sudan",
  "Suriname",
  "Sweden",
  "Switzerland",
  "Syria",
  "Tajikistan",
  "Tanzania",
  "Thailand",
  "Timor-Leste",
  "Togo",
  "Tonga",
  "Trinidad and Tobago",
  "Tunisia",
  "Turkey",
  "Turkmenistan",
  "Tuvalu",
  "Uganda",
  "Ukraine",
  "United Arab Emirates",
  "United Kingdom",
  "United States",
  "Uruguay",
  "Uzbekistan",
  "Vanuatu",
  "Vatican City",
  "Venezuela",
  "Vietnam",
  "Yemen",
  "Zambia",
  "Zimbabwe",
];
const color = document.getElementById("color");
const changeColor = document.getElementById("green");

color.addEventListener("input", function (event) {
  changeColor.style.backgroundColor = event.target.value;
});

const countrySelect = document.getElementById("country");

countries.forEach((country) => {
  const option = document.createElement("option");
  option.textContent = country;
  countrySelect.appendChild(option);
});

const yearSelect = document.getElementById("dob");
const currentYear = new Date().getFullYear();
for (let y = currentYear - 50; y <= currentYear; y++) {
  const option = document.createElement("option");
  option.textContent = y;
  yearSelect.appendChild(option);
}

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

  const nameValidate = /^[A-Za-z\s]+$/;
  const emailValidate = /^\d{2}-\d{5}-[1-3]@student\.aiub\.edu$/;
  const passwordLength = 8;

  document.querySelectorAll(".error").forEach((el) => (el.textContent = ""));

  if (name.value === "") {
    document.querySelector(".errorName").textContent = "Name is required.";
    return false;
  } else if (!nameValidate.test(name.value)) {
    document.querySelector(".errorName").textContent =
      "Name must contain only letters and spaces.";
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
  alert("Form submitted successfully!");
  return true;
}
