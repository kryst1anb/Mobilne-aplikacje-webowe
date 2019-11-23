# Instrukcja obsługi dla JSON
Jako pierwszy argument podawany jest zawsze case 1-13.

Później zależy od wybranego parametru

## Examples
```
{
    "polecenie":"1",
    "nazwa_pliku":"Floor",
    "imie":"XYZ",
    "nazwisko":"ABC"
}
```
1: zad1 - zwykłe teksty wprowadzone przez użytkownika, kilka , bez nowych linii
   * nazwa_pliku
   * imie
   * nazwisko
  
2: zad2 - liczba naturalna
   * nazwa_pliku
   * liczba
   
3: zad3 - wybór jednego napisu z listy
   * nazwa_pliku
   * napis_z_listy
   
4: zad4 - wpisanie czegoś z podpowiedzią (po dwóch, trzech literach) bez przesłania całej listy do
klienta
   * nazwa_pliku
   * podpowiedz_wyboru
   
5: zad5 - Wybór wzoru matematycznego
   * nazwa_pliku
   * wzor_nr
   
6: zad6 - wybór koloru
   * nazwa_pliku
   * kolor (Format RGB HEX => #FF0033)
   
7: zad7 - wybór daty
   * nazwa_pliku
   * data (Format => YYYY-MM-DD)
   
8: zad8 - wybór czasu (godzina, minuta, sekunda)
   * nazwa_pliku
   * czas (Format => hh:mm:ss)
  
9: zad9 - wybór odcinka czasu
   * nazwa_pliku
   * od (Format => YYYY-MM-DDThh:mm)
   * do (Format => YYYY-MM-DDThh:mm)
   
10: zad10 - wybór wielokrotny z krótkiej listy
   * nazwa_pliku
   * $_POST[keywords]
    
11: zapisz Napis (Examples)
   * nazwa_pliku
   * napis
   
12: odczytaj Napis (Examples)
   * nazwa_pliku
   * *szukana_nazwa*
   
13: podaj Wzory do odczytania (Examples)
   * nazwa_pliku
   * nr_wyboru
  
