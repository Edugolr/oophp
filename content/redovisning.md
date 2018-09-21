---
---
Redovisning
=========================

Kmom01
-------------------------

**Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?**
Man var klart ringrostig efter sommaren. Jag hade massor med projekt jag hade velat gjort,
men helt ärligt var vädret för bra och jag har knappt kodat.
Efter ett par timmar med att pilla runt börjar det ändå ordna upp sig och jag känner ändå igen mig.
Har tidigare läst PHP och även oo i python. Ramverket Anax stötte vi på i designkursen.

**Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?**
Det gick ändå hyffsat bra, lite seg start men det var egentligen inga svårigheter.
Jag missade lite med initieringen så höll på att lämna in med random nr -1 som
ständig start (krävdes en restart för att fungera riktigt).
Jag är inte hundra på om jag gjort rätt med SESSION.

**Har du några inledande reflektioner kring me-sidan och dess struktur?**
Jag ville prova ett css ramverk som jag tyckte verkar intressant. Bulma.
Jag lägger dock det på stretch då det är bra mycket nu att göra i början med en
ganska förvirrande samgående kurs.

Det var lite lurigt att hitta först, fick för mig att allt skulle ligga under
htdocs. men content känns rimligt med. Mååånga kataloger och filer.

Har problem med strukturen ihop med Bulma därav ej implementerat Bulma.

Jag gillar inte riktigt markdown heller. Känns som något för en användare och
inte en programmerare.

**Vilken är din TIL för detta kmom?**
Egentligen vet jag redan det här. Men TIL får ändå vara att jag behöver leka
mer med kod som hobby. Man blir snabbt ringrostig.

Kmom02
-------------------------


**Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?**
Jag följde till en början guiden och videoserien och blev mest förvirrad. Visst kom man in på rätt spår men det blev inte riktigt bra.
Efter att ha gått igenom guiden så började jag leka runt och prova mig fram istället och tror jag kom på en bra lösning för implementeringen. Jag hade även en liten miss som orsakade en del problem. Inuti form hade jag specat action.



**Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad**
Modellering med UML blir ändå att man själv manuellt (åtminstone den erfarenheten jag har av det) sitter och matar in.
Det är mer tidskrävande men man får samtidigt kanske en bättre koll på strukturen. Dokumentation är alltid bra oavsett om
man jobbar i grupp eller om man kanske har ett projekt som legat och vilat ett tag.

**tycker du om konceptet make doc?**
Känns riktigt smidigt, Jag kör cygwin och kunde dock inte få igång 'firefox doc'.
Viktigt att man dokumenterar för att dra så mycket nytta av det som det går.

**Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?**
Inuti ramverket tar det en stund innan man hittar runt, man behöver ha koll på var vad ska ändras och kan behöva
testa en hel del för att hitta rätt och få med alla implementeringar på rätt sätt. Men när man börjar få koll
sker mycket med "Magi".

Utanför ramverket kan jag känna att man har mer kontroll på vad som händer, man kan direkt se inverkan
på det man gör och det är gissningsvis lättare att lösa buggar.

**Vilken är din TIL för detta kmom?**
När det känns tungt och alltför krångligt, ta en kaffe andas och bryt ner problemen till mindre delar.



Kmom03
-------------------------

**Har du tidigare erfarenheter av att skriva kod som testar annan kod?**
Ja jag har i någon tidigare kurs skrivit tester. Har för mig att det var i python vi gjorde detta ?
Inte helt säker men det är inte helt nytt för mig. Däremot är visualiseringen med PHPunit nytt
och väldigt trevligt.

**Hur ser du på begreppen enhetstestning och att skriva testbar kod?**
Bra fråga, min syn på det är att man enhetstestar för att koden verkligen funkar och att om man då ändrar koden snabbt
kan se om man ställt till något eller om det var en bra implementation. Därav viktigt och bra förfarande att skriva testbar kod (ex lägga in funktioner
som gör att koden går att testa)

**Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.**
Fick snabbt leta reda på detta. White box testing som vi gjorde nu har jag koll på. Det är när man har full koll
på koden som skall testat. SOm jag förstår det är blackbox testing endast funktionskontroll utan att bry sig om hur.
Greybox spontant skulle jag gissa är en kombination av båda, man känner till en del av koden bakom och kan nyttja det i sina tester.

**Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?**
Jag byggde vidare på Dice från exemplen och arbetade med SESSION för att spara datan.
Vissa svårigheter och jag anar att jag missat något i tänket då det tog väldigt lång tid för
mig och spelet blev väl enkelt.

Jag har haft svårt att koncentrera mig under veckan och därav även organisera mig, men tillslut
gick jag tillbaka till penna och papper där jag skrev ned vad jag ville spelet skulle göra
och fick äntligen lite struktur och framgång i skapandet.

Min tanke var att låta spelaren börja och göra sina egna rolls, datorns simuleras utan
att man gör något själv. Jag använde in_array för att fånga eventuella 1or och då nollställa
SESSION med rundans total och ge turen till datorn istället.

Jag lade en länk som i gissa spelet med de olika varianterna (nu blev det bara en men vem vet)
inuti content mappen (tarning100.md)

Jag lade sedan en mapp inuti src som heter Dice som har klasserna inuti filerna med samma namn
(Dice och DiceHand)

002_tarning100.php ligger i router mappen.

Inuti view under tarning100 ligger 'start.php' tanken var att det skulle vara en startsida för spelet men det blev hela spelet.

Jag hade velat lyfta ur mer kod från start filen men jag har lagt enormt mycket tid och måste nu prioritera indproj under helgen.

**Hur väl lyckades du testa tärningsspelet 100?**
Jag har 100 i coverage men kan absolut köra mer tester på varje funktion.
Tycker bra om PHPunit och det känns skönt att få ett visuellt kvitto på att det fungerar!

**Vilken är din TIL för detta kmom?**
Det är tungt att studera när man har mycket annat i huvudet. Dejta inte när du pluggar ?
Blev lite få git pushes eller endast två.
Kör projektet över github och har snabbt vant mig med att ha atom kopplat och pusha där.


Kmom04
-------------------------

Här är redovisningstexten



Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
