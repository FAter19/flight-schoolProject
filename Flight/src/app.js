const hamburger = document.querySelector('.hamburger');
const lines = document.querySelectorAll('.line');
const navLinksContainer = document.querySelector('.navLinksContainer');
const links = document.querySelectorAll('.navLinksContainer div');

hamburger.addEventListener('click', () => {
    navLinksContainer.classList.toggle('open');
    lines.forEach(lines => {
      lines.classList.toggle('lineWhite');
    });
});


const heroSectionButton = document.querySelectorAll('.heroSectionButton');
const signupContainer = document.querySelector('.signupContainer');

// heroSectionButton.addEventListener('click', () => {

//   signupContainer.classList.toggle('openSignup');
// });

var signupCon = function() {
  signupContainer.classList.toggle('openSignup');
}



var people = [
  {  loginEmail: 'weror@gmail.com', loginPassword: 'werorfa19'
  },
  {  loginEmail: 'fweror@gmail.com', loginPassword: 'werorfa19'
  },
  {  loginEmail: 'wero@gmail.com', loginPassword: 'werora19'
  }
]

function getLogin() {

  let loginEmail = document.getElementById('loginEmail').value;
  let loginPassword = document.getElementById('loginPassword').value;


  for (let index = 0; index < people.length; index++) {
    if (loginEmail == people[index].loginEmail && loginPassword == people[index].loginPassword) {
      alert(`${loginEmail} logged in successfully`);
      window.location.href = 'account.php';
      return true;
    }
  }
  alert(`login unsuccessfully..!!!`);
  return false;
}
