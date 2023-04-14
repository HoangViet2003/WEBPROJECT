window.onload = function () {
 if (localStorage.getItem('access_token')) {
  if (localStorage.getItem('is_admin')) {
   window.location.href = 'http://localhost:8000/admin';
  } else {
   window.location.href = 'http://localhost:8000';
  }
 }
}