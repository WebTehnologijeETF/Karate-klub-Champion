window.onload = function ponisti(){
	var submenu1 = document.getElementById('onama');
    var submenu2 = document.getElementById('clanstvo');
    var submenu3 = document.getElementById('galerija');
    var submenu4 = document.getElementById('kontakti');
    submenu1.style.visibility = 'hidden';	
   	submenu2.style.visibility = 'hidden';
	submenu3.style.visibility = 'hidden';	
	submenu4.style.visibility = 'hidden';
}

function Otvori(podmeni){
    var submenu = document.getElementById(podmeni);
   	ZatvoriOstale(podmeni);
    if (submenu.style.visibility == 'visible') { 
    	submenu.style.visibility = 'hidden'; 
    }
    else { 
    	submenu.style.visibility = 'visible'; 
	}
}

function ZatvoriOstale(podmeni){
		var submenu = document.getElementById(podmeni);
		var submenu1 = document.getElementById('onama');
	    var submenu2 = document.getElementById('clanstvo');
	    var submenu3 = document.getElementById('galerija');
	    var submenu4 = document.getElementById('kontakti');

		if (submenu == submenu1){
			submenu2.style.visibility = 'hidden';
			submenu3.style.visibility = 'hidden';	
			submenu4.style.visibility = 'hidden';
		}
		else if (submenu == submenu2){
	    	submenu1.style.visibility = 'hidden';
			submenu3.style.visibility = 'hidden';	
			submenu4.style.visibility = 'hidden';
		}
		else if (submenu == submenu3){
			submenu1.style.visibility = 'hidden';
			submenu2.style.visibility = 'hidden';
			submenu4.style.visibility = 'hidden';
		}
		else if (submenu == submenu4){
	    submenu1.style.visibility = 'hidden';
		submenu2.style.visibility = 'hidden';
		submenu3.style.visibility = 'hidden';				
		}
}

/*			// ON BODY CLICK ZATVORI SUBMENI
document.onclick = function ponisti2(){
	var submenu1 = document.getElementById('onama');
    var submenu2 = document.getElementById('clanstvo');
    var submenu3 = document.getElementById('galerija');
    var submenu4 = document.getElementById('kontakti');
    submenu1.style.visibility = 'hidden';	
   	submenu2.style.visibility = 'hidden';
	submenu3.style.visibility = 'hidden';	
	submenu4.style.visibility = 'hidden';
}
*/