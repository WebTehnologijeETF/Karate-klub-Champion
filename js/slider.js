var slicicaTrening = document.getElementById("treninzi");	
var sveSlikeTrening = ["slike/trening1.jpg","slike/trening2.jpg","slike/trening3.jpg","slike/trening4.jpg","slike/trening5.jpg"];
var indexTrening = 0;
var pozivajSlider = 0;


function slideTrening(){
        treninzi.setAttribute("src",sveSlikeTrening[indexTrening]);
        indexTrening++;
        if(indexTrening == sveSlikeTrening.length)
        {
            indexTrening = 0;
        }
}

treninzi.onclick = function(){
	slideTrening();
}
