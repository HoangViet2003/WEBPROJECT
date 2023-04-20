document.onkeydown = function (e) {
  if (e.key == 13 && document.getElementById("search").value != "") {
    document.searchInput.submit();
  }
};

const urlParams = new URLSearchParams(window.location.search);
const keyword = urlParams.get("search");

// const form = document.querySelector('shop');
// form.addEventListener("submit", event => {
//   event.preventDefault();
//   console.log("Hhhhh")
// })

// function search(){
//   console.log("test search")
// }

function getAllproduct() {
    try {
        axios
            .get(`http://localhost:8000/api/products?page=${page}`)
            .then((response) => {
                const products = response.data.data;

               
                }
            );
    } catch (error) {
        console.log(error);
    }
}
