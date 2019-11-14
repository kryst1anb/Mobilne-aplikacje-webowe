# Instrukcja obsługi
Jako pierwszy argument podawany jest zawsze case 1-13 tj.
Później zależy od wybranego parametru

## Examples
```
{
    "polecenie":"1",
    "nazwa_pliku":"Floor",
    "napis1":"Hmm, Yes"
    "napis2":"The Floor Here Is Made Out of Floor "
}
```
1: zad1 - zwykłe teksty wprowadzone przez użytkownika, kilka , bez nowych linii
   * nazwa_pliku
   * napis1
   * napis2
  
2: zad2 - liczba naturalna
   * nazwa_pliku
   * liczba
   
3: zad3 - wybór jednego napisu z listy
   * nazwa_pliku
   * czesc_nazwy
   
4: zad4 - wpisanie czegoś z podpowiedzią (po dwóch, trzech literach) bez przesłania całej listy do
klienta
   * nazwa_pliku
   * podpowiedz_wyboru
   
5: zad5 - Wybór wzoru matematycznego
   * nazwa_pliku
   * wzor_nr
   
6: zad6 - wybór koloru
   * nazwa_pliku
   * R
   * G
   * B
   
7: zad7 - wybór daty
   * nazwa_pliku
   * data
   
8: zad8 - wybór czasu (godzina, minuta, sekunda)
   * nazwa_pliku
   * godzina
   * minuta
   * sekunda
   
9: zad9 - wybór odcinka czasu
   * nazwa_pliku
   * od
   * do
   
10: zad10 - wybór wielokrotny z krótkiej listy


11: zapisz Napis (Examples)
   * nazwa_pliku
   * napis
   
12: odczytaj Napis (Examples)
   * nazwa_pliku
   * *szukana_nazwa*
   
13: podaj Wzory do odczytania (Examples)
   * nazwa_pliku
   * nr_wyboru
  
