document.onkeydown = function (e) {
    if (e.key == "Enter" && document.getElementById("search").value != "") {
        try {
            e.preventDefault();

            $("body").toggleClass("loading");

            const keyword = document.getElementById("search").value;

            window.location.href =
                "http://localhost:8000/searchResult?keyword=" + keyword + "&page=1";

            axios
                .get(
                    `http://localhost:8000/api/productSearch?name=${keyword}&page=1`
                )
                .then((response) => {
                    $("body").toggleClass("loading");
                    console.log(response);
                })
                .catch((error) => {
                    $("body").toggleClass("loading");
                    console.log(error.response);
                });
        } catch (error) {
            console.log(error);
            $("body").toggleClass("loading");
        }
    }
};

// const urlParams = new URLSearchParams(window.location.search);
// const keyword = urlParams.get("search");

// const form = document.querySelector('shop');
// form.addEventListener("submit", event => {
//   event.preventDefault();
//   console.log("Hhhhh")
// })

// function search(){
//   console.log("test search")
// }

// function getAllproduct() {
//     try {
//         axios
//             .get(`http://localhost:8000/api/products?page=${page}`)
//             .then((response) => {
//                 const products = response.data.data;

//                 }
//             );
//     } catch (error) {
//         console.log(error);
//     }
// }

// document
//     .querySelector("#search-input")
//     .addEventListener("submit", function (e) {
//         try {
//             e.preventDefault();

//             $("body").toggleClass("loading");

//             axios
//                 .get(
//                     `http://localhost:8000/api/productSearch?name=${bed}&page=1`,

//                     {
//                         headers: {
//                             Authorization:
//                                 "Bearer " +
//                                 localStorage.getItem("access_token"),
//                         },
//                     }
//                 )
//                 .then((response) => {
//                     $("body").toggleClass("loading");
//                   console.log("test")
//                     console.log(response);
//                     // Alert the message

//                 })
//                 .catch((error) => {
//                     $("body").toggleClass("loading");
//                     console.log(error.response);
//                 });
//         } catch (error) {
//             console.log(error);
//             $("body").toggleClass("loading");
//         }
//     });
