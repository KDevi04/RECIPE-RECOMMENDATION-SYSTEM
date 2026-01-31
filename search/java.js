const searchBox = document.querySelector('.searchBox');
const searchBtn = document.querySelector('.searchBtn');

const fetchRecipes= (query) =>
{
    const data =fetch('www.themealdb.com/api/json/v1/1/search.php?s=$');
}
searchBtn.addEventListener('click',(e)=>
{
    e.preventDefault();
   console.log("Button clicked");
   const searchInput=searchBox.value.trim();
   fetchRecipes();
});
