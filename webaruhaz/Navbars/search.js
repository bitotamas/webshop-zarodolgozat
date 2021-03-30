document.getElementById("searching").addEventListener('click',()=>{
    let keyword=document.getElementById("searchInput").value;
    //e.preventDefault();
    document.getElementById("searching").href+="&keyword="+keyword;
    
})