const passwordInput = document.getElementById('password');
const showPasswordSpan = document.getElementById('showPasswordSpan');

showPasswordSpan.addEventListener('click', function() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPasswordSpan.innerHTML = '<ion-icon name="eye"></ion-icon>';
  } else {
    passwordInput.type = 'password';
    showPasswordSpan.innerHTML = '<ion-icon name="lock-closed"></ion-icon>';
  }
});