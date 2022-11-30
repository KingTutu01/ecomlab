var fullName = document.forms['registerForm']['uname'];
var email = document.forms['registerForm']['uemail'];
var password = document.forms['registerForm']['upass'];
var confirmPassword = document.forms['registerForm']['uconpass'];
var country = document.forms['registerForm']['ucountry'];
var city = document.forms['registerForm']['ucity'];
var phoneNumber = document.forms['registerForm']['ucontact'];

var nameError = document.getElementById('fullNameError');
var emailError = document.getElementById('emailError');
var passwordError = document.getElementById('passwordError');
var confirmPasswordError = document.getElementById('confirmPasswordError');
var countryError = document.getElementById('countryError');
var cityError = document.getElementById('cityError');
var contactError = document.getElementById('contactError');

fullName.addEventListener('blur', fullNameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
country.addEventListener('blur', countryVerify, true);
city.addEventListener('blur', cityVerify, true);
phoneNumber.addEventListener('blur', phoneNumberVerify, true);

function validateForm(){
    if (fullName.value == ""){
        nameError.textContent = "Full name required";
        fullName.focus();
        return false;
    }
    if (fullName.value.length > 100){
        nameError.textContent = "Full Name too long";
        fullName.focus();
        return false;
    }

    if (password.value == ""){
        passwordError.textContent = "Password required";
        password.focus();
        return false;
    }
    if (password.value.length < 8){
        passwordError.textContent = "Password must be at least 8 characters long";
        password.focus()
        return false;
    } else if (password.value.search(/[0-9]/) == -1){
        passwordError.textContent="At least 1 numeric value must be entered";
        password.focus();
        return false;
    }else if (password.value.search(/[a-z]/) == -1){
        passwordError.textContent="At least 1 small letter must be entered";
        password.focus();
        return false;
    }else if (password.value.search(/[A-Z]/) == -1){
        passwordError.textContent="At least 1 uppercase letter must be entered";
        password.focus();
        return false;
    }

    if (password.value != confirmPassword.value){
        confirmPasswordError.innerHTML = "The two passwords do not match";
        return false;
    }

    if (country.value == ""){
        countryError.textContent = "Country required";
        country.focus();
        return false;
    }

    if (country.value.length > 30){
        countryError.textContent = "Country is too long";
        country.focus();
        return false;
    }

    if (city.value == ""){
        cityError.textContent = "City required";
        city.focus();
        return false;
    }

    if (city.value.length > 30){
        cityError.textContent = "Country is too long";
        city.focus();
        return false;
    }

    if (phoneNumber.value == ""){
        contactError.textContent = "Phone Number is required";
        phoneNumber.focus();
        return false;
    }

    if (phoneNumber.value.length > 15){
        contactError.textContent = "Country is too long";
        phoneNumber.focus();
        return false;
    }
}
