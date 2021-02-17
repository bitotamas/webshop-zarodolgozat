window.addEventListener('load',()=>{
    if(window.innerWidth>1305){
        document.getElementById('navigationBar').classList.add('navbar-expand');
    }
})
window.addEventListener('resize',ex);

function ex(){
    if(window.innerWidth>1305){
        document.getElementById('navigationBar').classList.add('navbar-expand');
    }else document.getElementById('navigationBar').classList.remove('navbar-expand');
}