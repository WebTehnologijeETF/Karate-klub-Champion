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