window.addEventListener('load',()=>{

     kepek=['10-9','8-7','6-5','4-3','2-1','0'];

     h=document.getElementById('jovalaszok').value;

     console.log(h);
     if(h==10 || h==9){
          document.getElementById('smile').src="smiles/"+kepek[0]+".png";
     }else
     if(h==8 || h==7){
          document.getElementById('smile').src="smiles/"+kepek[1]+".png";
     }else
     if(h==6 || h==5){
          document.getElementById('smile').src="smiles/"+kepek[2]+".png";
     }else
     if(h==4 || h==3){
          document.getElementById('smile').src="smiles/"+kepek[3]+".png";
     }else
     if(h==2 || h==1){
          document.getElementById('smile').src="smiles/"+kepek[4]+".png";
     }else
     if(h==0){
          document.getElementById('smile').src="smiles/"+kepek[5]+".png";
     }

     

})

    
        
    



