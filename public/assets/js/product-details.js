async function searchProduct() {
    await axios({
        url: "http://localhost:8000/api/productSearch?name=test&page=1",
        method: "search",
        headers: {
            name: "test",
        },
    });
    let name = document.getElementById("name").value;
    searchProduct(name);
}
