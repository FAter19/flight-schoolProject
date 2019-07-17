const theCard = document.querySelector('.theCard');
// var toggleSign = document.getElementById('toggleSign');
// const signLogBtn = document.querySelector('.signLogBtn');
// const links = document.querySelectorAll('.theCard div');
const termsServies = document.getElementById('termsServies');
// var signUp = 'Sign up';
// var signIn = 'Sign in';

// toggleSign;

// toggleSign.addEventListener('click', () => {

// });
// toggleSign();

// termsServies.addEventListener('click', () => {

// });

termsServies.addEventListener('click', () => {
    theCard.classList.toggle('fillSignin');
    // console.log(signLogBtn.innerHTML);

});




// signning up user validation code
document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var element = this.elements;

    var fullName = element.fullName.value;
    var phoneNumber = element.phoneNumber.value;
    var email = element.email.value;
    var password = element.password.value;
    var confrimPassword = element.confrimPassword.value;
    var gender = element.gender.value;
    var terms = element.terms.value;


      if (fullName == '') {
        alert('Your Full Name is invaild');
        element.fullName.focus();
        return false;
      }
      // rephonenumber = /^[0]\d{10}$/;
      if (phoneNumber == '' ) {
        alert('Your phone number is invaild');
        element.phoneNumber.focus();
        return false;
      }
      regexPhoneNumber = /^[0]\d{10}$/;
      if (!regexPhoneNumber.test(element.phoneNumber.value)) {
        alert('Your phone number is invaild');
        element.phoneNumber.focus();
        return false;
      }
      if (phoneNumber < 11) {
        alert('Your phone number is invaild');
        element.phoneNumber.focus();
        return false;
      }
      if (email == '') {
        alert('Your E-mail is invaild');
        element.email.focus();
        return false;
      }
      regexEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
      if(!regexEmail.test(element.email.value)) {
          alert("Your e-mail doesn't match, must contain yourname@example.com|.net!");
          element.email.focus();
          return false;
        }
      if (phoneNumber == '' || phoneNumber < 11) {
        alert('Your phone number is invaild');
        element.phoneNumber.focus();
        return false;
      }
      if (password == '') {
        alert("Password must be entered to processed!");
        element.password.focus();
        return false;
      }else if(password.length < 7) {
        alert("Password must contain at least seven characters!");
        element.password.focus();
        return false;
      }else{}
      if (password !== confrimPassword) {
         alert('password must be entered correctly');
         element.password.focus();
         return false;
      }
      if (gender == '') {
        alert('Did you forget to pick a gender?');
        return false;
      }
      if (terms == '') {
        alert('Won\'t you agree to our terms and conditions?');
        return false;
      }

      window.location.href = 'index.php';
      return true;

        var msg = `Welcome ${fullName} to Flight. Your phone number is ${phoneNumber}.`;
        console.log(msg);
 
});


// const createSign = document.getElementById('createSign');
// createSign.addEventListener('click', ()=> {
//   window.location.href = 'signup.html';
//   return true;
// });
