//				DROP-DOWN MENI
var productList;
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
    validiranjeForme();
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


    var nazivRegEx = /^[a-zA-Z ]+$/i;
    if ((forma.naziv.value.length > 20 || forma.naziv.value.length < 6) || !nazivRegEx.test(forma['naziv'].value)){
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        greska.innerHTML+="FORMAT nazivNA NIJE ADEKVATAN";
        div1.appendChild(slika);
        return false;
    }
//
//
/*//VALIDACIJA E-MAILA NEPOTPUNA, TRENUTNO OPCIONALNO
    if (forma.mail.value.length > 30 || forma.mail.value.length < 6){
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
    if (!telefonRegEx.test(forma['telefon'].value)) {
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
    if (forma.predmet.value.length > 20 || forma.predmet.value.length < 3){
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



//              SINGLE PAGE APPLICATION AJAX !!

function poziv(page){
    var ajax;
    if (window.XMLHttpRequest){
        ajax = new XMLHttpRequest(); // FIREFOX
    }
    else if (window.ActiveXObject){
        ajax = new ActiveXObject(); // IE
    }
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200)
            document.getElementById("promijeni").innerHTML = ajax.responseText;
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("promijeni").innerHTML = "Greska: nepoznat URL";
    }
    ajax.open("POST", page, true);
    ajax.send();
}


//              VALIDACIJA GRADA  AJAX !!

function validiranjeForme(){
    var mjesto = document.getElementById("mjesto").value;
    console.log(mjesto);
    var postanskiBroj = document.getElementById("posta").value;
    console.log(postanskiBroj);

    if (window.XMLHttpRequest){
        ajax = new XMLHttpRequest(); // FIREFOX
    }
    else if (window.ActiveXObject){
        ajax = new ActiveXObject(); // IE
    }
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            if (ajax.responseText == "OK") {
                    document.getElementById("uslov").innerHTML = "OK";
            }
            else {
                    document.getElementById("uslov").innerHTML = "Greska pri unosu";
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("").innerHTML = "Greska: nepoznat URL";
    }
    ajax.open("GET", "http://zamger.etf.unsa.ba/postanskiBroj.php?mjesto=" + mjesto + "&postanskiBroj=" + postanskiBroj, true);
    ajax.send();
 
};




function validiranjeAjaxForme(){
    var slika = new Image();
    slika.style.height = '12px';
    slika.style.width = '12px';

    var div1 = document.getElementById('greska6'); // AUTOVALIDIRANO
    var div2 = document.getElementById('greska7'); // AUTOVALIDIRANO
    var div3 = document.getElementById('greska8');
    var div4 = document.getElementById('greska9');
    var div5 = document.getElementById('greska10');
    var div6 = document.getElementById('greska11');
    var div7 = document.getElementById('greska12');
    var div8 = document.getElementById('greska13'); // AUTOVALIDIRANO
    var div9 = document.getElementById('greska14'); // AUTOVALIDIRANO
    var div1 = document.getElementById('greska15'); // AUTOVALIDIRANO


    slika.src = 'slike/greska.png';
//
    var naziv = document.getElementById('naziv');
    var nazivRegEx = /^[0-9a-zA-Z ]+$/i;
    if ((naziv.value.length > 20 || naziv.value.length < 6) || !nazivRegEx.test(naziv.value)){
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        div6.innerHTML = "";
        div7.innerHTML = "";
        div8.innerHTML = "";
        div9.innerHTML = "";
        div3.appendChild(slika);
        return false;
    }

    var opis = document.getElementById('opis');
    var opisRegEx = /^[0-9a-zA-Z ]+$/i;
    if ((opis.value.length > 50 || opis.value.length < 6) || !opisRegEx.test(opis.value)){
        div1.innerHTML = "";
        div2.innerHTML = "";
        div3.innerHTML = "";
        div4.innerHTML = "";
        div5.innerHTML = "";
        div6.innerHTML = "";
        div7.innerHTML = "";
        div8.innerHTML = "";
        div9.innerHTML = "";
        div4.appendChild(slika);
        return false;
    }
}



//                  TABELA PROIZVODA AJAX !!!

function pozivAkcije(){
    validiranjeAjaxForme();
    var id = parseInt(document.getElementById("id").value);
    var i = -1;
    var akcija = "dodavanje";
    var ajax;    
    if (window.XMLHttpRequest){
        ajax = new XMLHttpRequest(); // FIREFOX
//        console.log(ajax);        // RADI OK
    }
    else if (window.ActiveXObject){
        ajax = new ActiveXObject(); // IE
    }
    var productList = [];
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200){
                Izlistaj();
        }
        if (ajax.readyState == 4 && ajax.status == 404){
           alert("Ne postoji proizvod!");
        }
        if (ajax.readyState == 4 && ajax.status == 400){
           alert("Neispravni podaci!");
        }
    };

    ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


    var _id = document.getElementById("id").value;
    var _student = document.getElementById("student").value;
    var _naziv = document.getElementById("naziv").value;
    var _opis = document.getElementById("opis").value;
    var _slika = document.getElementById("slika").value;
    var _dostupnost = document.getElementById("dostupnost").value;

    productList = {id:_id, student:_student, naziv:_naziv, opis:_opis, slika:_slika, dostupnost:_dostupnost};

//    ajax.send("akcija=" + akcija + "&proizvod=" + JSON.stringify(productList) + "&brindexa=16386");
    ajax.send("brindexa=16386&proizvod=" + JSON.stringify(productList) + "&akcija=dodavanje");
}

function EditovanjeTabele (i){
    var _id = document.getElementById("id").value;
    var _student = document.getElementById("student").value;
    var _naziv = document.getElementById("naziv").value;
    var _opis = document.getElementById("opis").value;
    var _slika = document.getElementById("slika").value;
    var _dostupnost = document.getElementById("dostupnost").value;

    _id = productList[i].id;
    _student = productList[i].student;
    _naziv = productList[i].naziv;
    _opis = productList[i].opis;
    _slika = productList[i].slika;
    _dostupnost = productList[i].dostupnost;
}


function BrisanjeTabele(id){
    var ajax;
    if (window.XMLHttpRequest){
        ajax = new XMLHttpRequest(); // FIREFOX
    }
    else if (window.ActiveXObject){
        ajax = new ActiveXObject(); // IE
    }
    var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php";
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            Izlistaj();
        }
        if(ajax.readyState == 4 && ajax.status == 404){
            alert("Nepostojeći proizvod!");
        }
        if(ajax.readyState == 4 && ajax.status == 400){
            alert("Neispravni podaci!");
        } 
    };
    AX.open("POST", url, true);
    AX.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    AX.send("brindexa=16386&proizvod=" + JSON.stringify(id) + "&akcija=" + "brisanje");
}

var _productList = [];
function Tabela (_productList){
    var tab;
    var zatvoren = "> ";
    var table = "<table ";
    var tr = "<tr ";
    var id = "id= ";
    var td = "<td>";
    var _td = "</td>";
    var _tr = "</tr>";
    var _a = "</a>";
    var _table = "</table>";


    tab = table + id + "\"tabela\"" + zatvoren + tr + id + "\"zaglavlje\"" + zatvoren + td + "ID" + _td + td + " student " + _td
        + td + " Naziv " + _td + td + " Opis proizvoda " + _td + td + " Slika " + _td + td + " Dostupnost " + _td 
        + td + " Uredi " + _td + td + " Briši " +_td; //+ _tr + _table;
    for (var i = 0; i < _productList.length; ++i){
        var proizvod = _productList[i];
        tab = tab + "<tr>" + td + proizvod.id +
        _td + td + proizvod.student +
        _td + td + proizvod.naziv +
        _td + td + proizvod.opis +
        _td + td + proizvod.slika +
        _td + td + proizvod.dostupnost +
        _td + td + "<a href=\"#\" onClick=\"EditovanjeTabele(\"" + _productList[i].id + "\")\";>Uredi"+ 
        _td + td + "<a href=\"#\" onClick=\"BrisanjeTabele(\"" + _productList[i].id + "\")\";>Briši"+ 
        _a + _td + _tr;
    }
    tab = tab + _table;
    return tab;
}

function Izlistaj(){

    var ajax;
    if (window.XMLHttpRequest){
        ajax = new XMLHttpRequest(); // FIREFOX
    }
    else if (window.ActiveXObject){
        ajax = new ActiveXObject(); // IE
    }
    var tmp = " ";
    var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16386"; // TESTIRANO RADI IZLISTAVANJE TUĐIH TABELA
    var div = document.getElementById("izlistavanje");
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            if(ajax.responseText != tmp){
                tmp = ajax.responseText;
                proizvodi = JSON.parse(tmp);
                div.innerHTML = Tabela(proizvodi);        
            }
        }
        if(ajax.readyState == 4 && ajax.status == 404){
            alert("Nepostojeći proizvod!");
        }
        if(ajax.readyState == 4 && ajax.status == 400){
            alert("Neispravni podaci!");
        } 

    };
    ajax.open("GET", url, true);
    ajax.send();
    return false;
}