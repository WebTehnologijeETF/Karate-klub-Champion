//				DROP-DOWN MENI

window.onload = function ponisti(){
	var submenu1 = document.getElementById('onama');
    var submenu2 = document.getElementById('clanstvo');
    var submenu3 = document.getElementById('galerija');
    var submenu4 = document.getElementById('kontakti');
    submenu1.style.visibility = 'hidden';	
   	submenu2.style.visibility = 'hidden';
	submenu3.style.visibility = 'hidden';	
	submenu4.style.visibility = 'hidden';

	randomString();
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



//			KONTAKT FORMA VALIDACIJA

function validacijaKontaktForme() {
//
    var greska = document.getElementById('greska');
    greska.innerHTML="";
    
    var slika = new Image();
    slika.style.height = '12px';
    slika.style.width = '12px';
    var div1 = document.getElementById('greska1');
    var div2 = document.getElementById('greska2');
    var div3 = document.getElementById('greska3');
    var div4 = document.getElementById('greska4');
    var div5 = document.getElementById('greska5');


    slika.src = 'slike/greska.png';
//
    var forma = document.getElementById('kforma');


    var imeRegEx = /^[a-zA-Z ]+$/i;
    if ((forma.naziv.value.length > 20 || forma.naziv.value.length < 6) || !imeRegEx.test(forma['naziv'].value))
    {
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        greska.innerHTML+="FORMAT IMENA NIJE ADEKVATAN";
        div1.appendChild(slika);
        return false;
    }
//
//
/*//VALIDACIJA E-MAILA NEPOTPUNA, TRENUTNO OPCIONALNO
    if (forma.mail.value.length > 30 || forma.mail.value.length < 6)
    {
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        greska.innerHTML+="DUZINA E-MAIL ADRESE NIJE ADEKVATNA";
        div2.appendChild(slika);
        return false;
    }*/
//
//
    var telefonRegEx = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;
    if (!telefonRegEx.test(forma['telefon'].value)) 
    {
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        greska.innerHTML+="FORMAT TELEFONA NIJE PRAVILAN<br>Traženi format za broj telefona: (061)-123-345 ili 061-123-456 ili 061123456<br>";  
        div3.appendChild(slika);
        return false;
    }
//
//
    if (forma.predmet.value.length > 20 || forma.predmet.value.length < 3)
    {
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        greska.innerHTML+="DUZINA NASLOVA PORUKE ADRESE NIJE ADEKVATNA";
        div4.appendChild(slika);
        return false;
    }
//
//
    if (forma.string1.value != forma.string2.value){
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        greska.innerHTML+="TEKST POTVRDE NIJE ISPRAVAN";
        div5.appendChild(slika);
        return false;
    }
//
//
    return true;
}

function randomString() {
    var chars ='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var result = '';

    for (var i = 6; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
    document.getElementById("string1").value = result;
    
    return false;
}