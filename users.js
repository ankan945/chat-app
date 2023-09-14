const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button");
userList = document.querySelector(".users .user-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}
searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
if(searchTerm != ""){
    searchBar.classList.add("active");
}else{
    searchBar.classList.remove("active");
}
    //ajax
let xhr = new XMLHttpRequest();
xhr.open("POST" , "search.php", true);
xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE)
    {
        if(xhr.status === 200)
        {

            let data = xhr.response;
            userList.innerHTML = data;
        }
    }
}
xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
//ajax
let xhr = new XMLHttpRequest();
xhr.open("GET" , "usr.php", true);
xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE)
    {
        if(xhr.status === 200)
        {

            let data = xhr.response;
             if(!searchBar.classList.contains("active")){
                userList.innerHTML = data;
             }
        }
    }
}
xhr.send();
}, 500);