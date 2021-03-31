document.getElementById("searching").addEventListener('click',()=>{
    let keyword=document.getElementById("searchInput").value;
    document.getElementById("searching").href+="&keyword="+keyword; 
})