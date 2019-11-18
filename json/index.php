<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Formularz</title>
</head>

<body>
    <header>
        <section>
            <br>
            <h1>Formularz osobowy</h1>
            <br>
        </section>
    </header>
    <main>
        <div id="page1">
            <form action="index.php" method="POST">
                <span></span>Imię: </span>
                <br>
                <input type="text" name="name" id="name" />
                <br>
                <span>Nazwisko: </span>
                <br>
                <input type="text" name="surname" id="surname" />
                <br>
                <span>Wiek: </span>
                <br>
                <input type="number" name="age" min="1" max="100" id="age">
                <br>
                <span>Płeć: </span>
                <br>
                <select id="sex">
                    <option value="female">Kobieta</option>
                    <option value="male">Mężczyzna</option>
                </select>
                <br>
                <span>Kraj: </span>
                <br>
                <input list="countries" id="country">
                <datalist id="countries">
                    <option value="Afganistan"></option>
                    <option value="Albania"></option>
                    <option value="Algeria"></option>
                    <option value="Andora"></option>
                    <option value="Angola"></option>
                    <option value="Argentyna"></option>
                    <option value="Armenia"></option>
                    <option value="Australia"></option>
                    <option value="Austria"></option>
                    <option value="Azerbejdżan"></option>
                    <option value="Bahamy"></option>
                    <option value="Bahrain"></option>
                    <option value="Boliwia"></option>
                    <option value="Bośnia i Hercegowina"></option>
                    <option value="Burkina Faso"></option>
                    <option value="Chile"></option>
                    <option value="Chiny"></option>
                    <option value="Chorwacja"></option>
                    <option value="Cypr"></option>
                    <option value="Czechy"></option>
                    <option value="Dania"></option>
                    <option value="Dominikana"></option>
                    <option value="Ekwador"></option>
                    <option value="Egipt"></option>
                    <option value="Erytrea"></option>
                    <option value="Estonia"></option>
                    <option value="Etiopia"></option>
                    <option value="Fidżi"></option>
                    <option value="Finlandia"></option>
                    <option value="Francja"></option>
                    <option value="Gambia"></option>
                    <option value="Gruzja"></option>
                    <option value="Ghana"></option>
                    <option value="Gibraltar"></option>
                    <option value="Grecja"></option>
                    <option value="Grenlandia"></option>
                    <option value="Gwatemala"></option>
                    <option value="Gwinea"></option>
                    <option value="Haiti"></option>
                    <option value="Hiszpania"></option>
                    <option value="Honduras"></option>
                    <option value="Hong Kong"></option>
                    <option value="Islandia"></option>
                    <option value="Indie"></option>
                    <option value="Indonesia"></option>
                    <option value="Iran"></option>
                    <option value="Irak"></option>
                    <option value="Irlandia"></option>
                    <option value="Włochy"></option>
                    <option value="Jamajka"></option>
                    <option value="Jordania"></option>
                    <option value="Kazachstan"></option>
                    <option value="Kenia"></option>
                    <option value="Kuwejt"></option>
                    <option value="Laos"></option>
                    <option value="Litwa"></option>
                    <option value="Lesoto"></option>
                    <option value="Libia"></option>
                    <option value="Lichtenstein"></option>
                    <option value="Luksemburg"></option>
                    <option value="Łotwa"></option>
                    <option value="Macedonia"></option>
                    <option value="Madagaskar"></option>
                    <option value="Malezja"></option>
                    <option value="Malediwy"></option>
                    <option value="Malta"></option>
                    <option value="Mali"></option>
                    <option value="Meksyk"></option>
                    <option value="Mołdawia"></option>
                    <option value="Monako"></option>
                    <option value="Mongolia"></option>
                    <option value="Czarnogóra"></option>
                    <option value="Maroko"></option>
                    <option value="Mozambik"></option>
                    <option value="Namibia"></option>
                    <option value="Nepal"></option>
                    <option value="Holandia"></option>
                    <option value="Kanada"></option>
                    <option value="Kuba"></option>
                    <option value="Kambodża"></option>
                    <option value="Belgia"></option>
                    <option value="Brazylia"></option>
                    <option value="Białoruś"></option>
                    <option value="Nowa Zelandia"></option>
                    <option value="Nigger"></option>
                    <option value="Nigeria"></option>
                    <option value="Północna Korea"></option>
                    <option value="Południowa Korea"></option>
                    <option value="Norwegia"></option>
                    <option value="Oman"></option>
                    <option value="Pakistan"></option>
                    <option value="Palestyna"></option>
                    <option value="Panama"></option>
                    <option value="Papua Nowa Gwinea"></option>
                    <option value="Paragwaj"></option>
                    <option value="Peru"></option>
                    <option value="Filipiny"></option>
                    <option value="Polska"></option>
                    <option value="Południowa Afryka"></option>
                    <option value="Portugalia"></option>
                    <option value="Katar"></option>
                    <option value="Puerto Rico"></option>
                    <option value="Wybrzeże Kości Słoniowej"></option>
                    <option value="Rumunia"></option>
                    <option value="Rosja"></option>
                    <option value="Rwanda"></option>
                    <option value="Samoa"></option>
                    <option value="San Marino"></option>
                    <option value="Arabia Saudyjska"></option>
                    <option value="Singapur"></option>
                    <option value="Słowacja"></option>
                    <option value="Słowenia"></option>
                    <option value="Senegal"></option>
                    <option value="Salwador"></option>
                    <option value="Somalia"></option>
                    <option value="Serbia"></option>
                    <option value="Szwecja"></option>
                    <option value="Szwajcaria"></option>
                    <option value="Stany Zjednoczone"></option>
                    <option value="Syria"></option>
                    <option value="Tajwan"></option>
                    <option value="Tajlandia"></option>
                    <option value="Trynidad i Tobago"></option>
                    <option value="Tunezja"></option>
                    <option value="Turcja"></option>
                    <option value="Togo"></option>
                    <option value="Uganda"></option>
                    <option value="Ukraina"></option>
                    <option value="Urugwaj"></option>
                    <option value="Wielka Brytania"></option>
                    <option value="Watykan"></option>
                    <option value="Wietnam"></option>
                    <option value="Wenezuela"></option>
                    <option value="Jemen"></option>
                    <option value="Zambia"></option>
                    <option value="Zimbabwe"></option>
                    <option value="Zjednoczone Emiraty Arabskie"></option>
                </datalist>
                <br>
                <input type="button" value="Dalej" onclick="page1next()" />
            </form>
        </div>
        <br>
        <div action="#" id="page2">
            <form method="POST">
                <span>Wybierz swój ulubiony wzór na pole figury: </span>
                <br>
                <br>
                <input type="radio" id="wzor1" name="wzor" value="a*a">Kwadrat: a*a
                <br>
                <input type="radio" id="wzor2" name="wzor" value="a*b">Prostokąt: a*b
                <br>
                <input type="radio" id="wzor3" name="wzor" value="a*a">Trójkąt: 1/2*(a*h)
                <br>
                <input type="radio" id="wzor4" name="wzor" value="a*a">Równoległobok: a*h
                <br>
                <input type="radio" id="wzor5" name="wzor" value="a*a">Trapez: 1/2*(a+b)*h
                <br>
                <input type="radio" id="wzor6" name="wzor" value="a*a">Koło: &#928;*r*<sup>2</sup>
                <br>
                <input type="button" value="Wstecz" onclick="page2back()" />
                <input type="button" value="Dalej" onclick="page2next()" />
            </form>
        </div>
        <div id="page3">
            <form action="#" method="post">
                <span>Wybierz swoje ulubione owoce: </span>
                <br>
                <input type="checkbox" id="owoc1" name="owoce" value="jablko">Jabłko
                <br>
                <input type="checkbox" id="owoc2" name="owoce" value="banan">Banan
                <br>
                <input type="checkbox" id="owoc3" name="owoce" value="pomarancza">Pomarańcza
                <br>
                <input type="checkbox" id="owoc4" name="owoce" value="winogrona">Winogrona
                <br>
                <input type="checkbox" id="owoc5" name="owoce" value="gruszka">Gruszka
                <br>
                <input type="checkbox" id="owoc6" name="owoce" value="mandarynka">Mandarynka
                <br>
                <input type="checkbox" id="owoc7" name="owoce" value="kiwi">Kiwi
                <br>
                <input type="checkbox" id="owoc8" name="owoce" value="ananas">Ananas
                <br>
                <input type="checkbox" id="owoc9" name="owoce" value="melon">Melon
                <br>
                <input type="checkbox" id="owoc10" name="owoce" value="sliwka">Śliwka
                <br>
                <input type="button" value="Wstecz" onclick="page3back()" />
                <input type="button" value="Dalej" onclick="page3next()" />
                <br>
            </form>
        </div>

        <div id="page4">
            <form action="#" method="POST">
                <span>Wybierz dzisiejszą datę oraz aktualną godzinę: </span>
                <br>
                <input type="datetime-local" name="daytime">
                <input type="datetime-local" name="czas" value="<? echo(date('Y-m-d H:i:s'));?>">
                <br>
                <span>W jakich godzinach najczęściej używasz komputera?: </span>
                <br>
                <input type="time" name="time1">
                <input type="time" name="time2">
                <br>
                <input type="button" value="Wstecz" onclick="page4back()" />
                <input type="button" value="Dalej" onclick="page4next()" />
            </form>
        </div>
        <div id="page5">
            <form action="#" method="POST">
                Wybierz swój kolor według RGB:
                <input type="color" name="color">
                <br>
                <br>

                <input type="button" value="Sprawdź" onclick="kolor()" />

                <div id="color"></div>
                <input type="button" value="Wstecz" onclick="page5back()" />
                <input type="button" value="Zakończ" onclick="save()" />
            </form>
        </div>
    </main>
    <footer>
        Autor: Aleksander Boronowski, MS Inf sem. V &copy;
        <br>
    </footer>
</body>
</html>