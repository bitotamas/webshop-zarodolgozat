window.addEventListener("load",init);

function init(){
	document.getElementById('mentes').addEventListener("click",ellenorzes);
}

function ellenorzes(e){
	let j1=document.getElementById('jelszo').value;
	let j2=document.getElementById('conf_jelszo').value;

	console.log("ok "+j1+" "+j2);

	if(j1.trim()!=j2.trim()){
		e.preventDefault();
	    document.getElementById('msg').innerHTML=" nem egyezik a 2 jelszó !!!";
	}
}