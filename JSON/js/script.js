window.addEventListener('load', function() {
    check();

    if(localStorage.identyfikator == "undefined"){
        document.getElementById('generowane_id').value == '';
    }

    if(localStorage.identyfikator !== "undefined" ){

        if(document.getElementById('generowane_id').value == ''){
            document.getElementById('generowane_id').value = localStorage.identyfikator;
            document.getElementById('button_dalej').disabled = false;
            document.getElementById('button_dalej').style.display = "inline";
            document.getElementById('id').style.display = "none";
        }

        if(document.getElementById('generowane_id').value !== 'undefined' && localStorage.identyfikator !== "undefined"){
            document.getElementById('id').style.display = "none";
            document.getElementById('button_dalej').disabled = true;
            document.getElementById('button_dalej').style.display = "none";
        }

        if(document.getElementById('generowane_id').value !== '' && localStorage.identyfikator !== "undefined" ){
            if(document.getElementById('generowane_id').value == 'undefined'){
                document.getElementById('generowane_id').value = '';
                document.getElementById("id").innerHTML = "id: ";
                document.getElementById('button_dalej').disabled = true;
                document.getElementById('button_dalej').style.display = "none";

            }else{
                document.getElementById('generowane_id').value = localStorage.identyfikator;
                document.getElementById("id").innerHTML = "id: " + localStorage.identyfikator;
                document.getElementById('id').style.display = "inline";
                document.getElementById('button_dalej').disabled = false;
                document.getElementById('button_dalej').style.display = "inline";
            }
        }
    }
    if(localStorage.wzor !== "undefined"){
        document.getElementById('wzor'+localStorage.wzor).checked = true;
    }

    if(localStorage.kraj !== "undefined"){
        document.getElementById('panstwo').value = localStorage.kraj;
    } 

    if(localStorage.data !== "undefined"){
        document.getElementById('data').value = localStorage.data;
    } 

    if(localStorage.kolor !== "undefined"){
        document.getElementById('kolor').value = localStorage.kolor;
    } 
    

}, true);

function czysc() {
    localStorage.clear();
    document.getElementById('generowane_id').value = '';
    document.getElementById('wzor0').checked = false;
    document.getElementById('wzor1').checked = false;
    document.getElementById('wzor2').checked = false;
    document.getElementById('panstwo').value = '';
    document.getElementById('data').value = '';
    document.getElementById('kolor').value = '';
    
    document.getElementById('CheckID').style.display = "inline";
    document.getElementById('WyborWzor').style.display = "none";
    document.getElementById('WyborKolorData').style.display = "none";
    document.getElementById('WyborPodpowiedz').style.display = "none";
    document.getElementById("id").innerHTML = '';

    document.getElementById('button_dalej').disabled = true;
    document.getElementById('button_dalej').style.display = "none"; 
    
    
}

function check() {
    var wartosc = document.getElementById('generowane_id').value;
    if (wartosc != '') {
        localStorage.identyfikator = wartosc;
    }
    if (wartosc != ''  && czyIstniejeID() !== "undefined" ) {
        document.getElementById('button_dalej').disabled = false;
        document.getElementById('button_dalej').style.display = "inline";
        return true;
    } else {
        document.getElementById('button_dalej').disabled = true;
        document.getElementById('button_dalej').style.display = "none"; 
        return false;
    }
}


function czyIstniejeID() {
    if (localStorage.identyfikator !== "undefined") {
        var id = document.getElementById('generowane_id').value;
        var url = "OSOBA/" + document.getElementById('generowane_id').value;
        var http = new XMLHttpRequest();
        http.open('HEAD', url, false);
        http.send();

        if (http.status != 404){
            return "istnieje";
        }else{
           return "nie istnieje";
        }

    } else {
        return "undefined";
    }
}


function dalej(flaga) {
    //document.getElementById("id").innerHTML = "id: " + localStorage.identyfikator;

    if (check() == true) {
        if (flaga == "WyborWzor") {
            console.log("*****************Wybor Wzor *****************");
            document.getElementById('CheckID').style.display = "none";
            document.getElementById('WyborWzor').style.display = "inline";
            document.getElementById('WyborPodpowiedz').style.display = "none";
            document.getElementById('WyborKolorData').style.display = "none";
        } else if (flaga == "WyborPodpowiedz") {
            console.log("*****************WyborPodpowiedz*****************");
            document.getElementById('WyborWzor').style.display = "none";
            document.getElementById('WyborKolorData').style.display = "none";
            document.getElementById('CheckID').style.display = "none";
            document.getElementById('WyborPodpowiedz').style.display = "inline";
        } else if (flaga == "WyborKolorData") {
            console.log("*****************WyborKolorData*****************");
            document.getElementById('WyborPodpowiedz').style.display = "none";
            document.getElementById('WyborWzor').style.display = "none";
            document.getElementById('CheckID').style.display = "none";
            document.getElementById('WyborKolorData').style.display = "inline";
        }
    } else {
        alert("Brak wartości");
        document.getElementById('generowane_id').value = '';
        document.getElementById('id').innerHTML = '';
    }
}

function generuj() {

    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 15; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    document.getElementById('generowane_id').value = text;
    document.getElementById("id").innerHTML = "id: " + text;

    check();
}

function WzorIsCheck()
{
    var rate_value='';
    if (document.getElementById('wzor0').checked) {
         rate_value = document.getElementById('wzor0').value;
        console.log(rate_value);
        wyslijWzor(rate_value);
    }

    else if (document.getElementById('wzor1').checked) {
         rate_value = document.getElementById('wzor1').value;
         console.log(rate_value);
         wyslijWzor(rate_value);
    }	

    else if (document.getElementById('wzor2').checked) {
         rate_value = document.getElementById('wzor2').value;
        console.log(rate_value);
        wyslijWzor(rate_value);
    }
}

function pokazPodpowiedz(string) {
    if (string.length == 0) {
        document.getElementById("podpowiedz").innerHTML = "";
        return;
    } else {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("podpowiedz").innerHTML = this.responseText;
            localStorage.kraj = string;
        }
    };
    ajax.open("POST", "praca.php", true);
    ajax.send(JSON.stringify({
                polecenie: 4,
                nazwa_pliku: document.getElementById('generowane_id').value,
                wyraz: string
            }));
    }
}

function wyslijWzor(wzor)
{
    var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                localStorage.wzor = wzor;
            }
        };
        
        ajax.open("POST", "praca.php", true);
        ajax.send(JSON.stringify({
            polecenie: 5,
            nazwa_pliku: document.getElementById('generowane_id').value,
            wzor: wzor
        }));
}

function wybranyKolor(){
    check();
    if (document.getElementById('kolor').value) {
         var kolor = document.getElementById('kolor').value;
        console.log(kolor);

        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                localStorage.kolor = kolor;
            }
        };

        ajax.open("POST", "praca.php", true);
        ajax.send(JSON.stringify({
            polecenie: 6,
            nazwa_pliku: document.getElementById('generowane_id').value,
            kolor: kolor
        }));
    }
}

function wybranaData(){
    check();
    if (document.getElementById('data').value) {
         var data = document.getElementById('data').value;
        console.log(data);

        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                localStorage.data = data;
            }
        };
        ajax.open("POST", "praca.php", true);
        ajax.send(JSON.stringify({
            polecenie: 7,
            nazwa_pliku: document.getElementById('generowane_id').value,
            data: data
        }));
    }
}