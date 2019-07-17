document.getElementById('createSign').addEventListener('click', function() {
    window.location.href = 'signup.php';
    return true;
  })

  document.getElementById('signinForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let signinEmail = document.getElementById('logEmail');
    let signinPassword = document.getElementById('logPassword');

    var username = 'username@gmail.com';
    var password = 'password';

    if (signinEmail.value == username && signinPassword.value == password) {
      window.location = 'account.html';
      return true;
    } else{
      alert('unsuccessful Sign in, please check your Email and Password');
      return false;
    }

  });
