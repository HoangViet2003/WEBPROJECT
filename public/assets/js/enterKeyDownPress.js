document.onkeydown = function (e) {
  if (e.key == 13 && document.getElementById("search").value != "") {
    document.searchInput.submit();
  }
};
