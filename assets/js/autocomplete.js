

const search = document.getElementById("artikel");
const matchList = document.getElementById("match-list");
// Search artikel.json and filter ist
const searchArtikel =  async searchText => {
    const res = await fetch("assets/js/artikel.json");
    const artikel = await res.json();
    console.log(search.value);


}
search.addEventListener("input", () => searchArtikel(search.value));