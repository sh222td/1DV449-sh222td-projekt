# 1DV449 Projekt sh222td 

##Mashup applikation för kursen 1DV449

### Twittarr

[Video](https://vimeo.com/151878425)

[Applikationen](http://sandrahansson.net/twittarr/)

<strong>Inledning</strong>
Grundidén till projektet är att man ska kunna översätta sina egna tweets eller tweets man sökt på till "piratspråk". En användare kan logga in via sitt Twitterkonto och möts direkt av en lista på sina senaste tweets, sorterade på senaste inlägg. Vid varje inlägg finns en bildikon som indikerar på att man kan välja den valda tweeten för översättning. När användaren klickat på ikonen så kommer det upp en översättning på sidan, man får även möjligheten att ta bort översättningen om så önskas. Uppe till höger finns en sökmotor där man kan söka på hashtagtrådar, nyckelord eller användare i tweets. När användaren sökt presenteras en lista på de tweets som innehåller sökordet, även dessa kan översättas.

<img src='https://github.com/sh222td/1DV449-sh222td-projekt/blob/master/img/Schematiskt%20fl%C3%B6de.jpg'>

Projektet är skrivet i HTML, CSS, JavaScript och PHP. De bibliotek jag använt mig av är jQuery för JavaScripten, twitterOAuth för twitter-inlogget och till sist Offline.js för internetstatus-hanteringen. Min utvecklingsmiljö har varit EasyPHP som är ett mjukvarupaket innehållande en Apacheserver, MySQL databas(inget jag behövt för just denna applikation) samt PHP 5.2.0. All kod har skrivits i PhpStorm. Jag valde att jobba i PHP och JavaScript då jag kände att jag ville använda språk som jag känner till väl så jag kunde lägga tiden på att lära mig fler bibliotek. Att välja välkända kodspråk var dessutom gynnsamt när man jobbar med APIer som fortfarande är relativt nytt för en. Det har även resulterat i att jag kan lägga vikten på att lära mig nya saker som biblioteken jag använt mig av.

En liknande sida som finns är http://postlikeapirate.com/. Den översätter engelsk text till pirat, man kan sedan posta översättningen som en tweet på sitt konto. Den stora skillnaden på den och min applikation är att min fokuserar mer på Twitter på så sätt att man kan översätta redan existerande tweets. Jag gillar dock deras idé med att man postar översättningen som en tweet, att man i min applikation ska kunna posta den igen som pirat. 

<strong>Säkerhet- och prestandaoptimering</strong>
Säkerhetsoptimering: För inloggingshantering på Twitter använder jag mig av OAuth, en tjänst för att autentisiera tredjepartswebbsidor. Detta underlättar för appliaktionen då den slipper ha hand om användardata som lösenord och är därför säkrare och skyddad mot OWASPs säkerhetspunkt A2 (Bruten Autentisiering och Sessionshantering). Applikationen bryter heller inte mot OWASPs säkerhetspunkt A6 (Blottning av känslig data) då sidan endast hanterar tweets som redan är en publik resurs.

Prestandaoptimering: Jag läser in CSS-filerna så tidigt som möjligt i koden så att sidan innehåll visas först. Skriptfilerna laddar jag in längst ner så inläsningen inte tar tid för sidan att laddas in. 
Jag har försökt strukturera koden så gott det går med tydlig indentering, kosekvent struktur samt uppdelning av filer. Namngivningen på funktioner, klasser och variabler är beskrivande och jag har valt att hålla kommentarerna korta så de inte tar så stor plats i filen.

<strong>Offline-first</strong>
Jag valde att använda mig av Offline.js för att informera användaren ifall internet är nere då det presenterade informationen på ett snyggt sätt och det var smidigt att implementera.

Cacheningen hanteras via localstorage, användarens tweets vid inloggning och sökresultatet är de som sparas i varsin localstorage. Jag valde localstorage över sessionstorage då sessionstorage bara existerar tills användaren stänger ner fliken och ja utgår från att min dagliga användare kan råka stänga ner flikar. Jag valde detta framför cookies då jag ville undvika and skicka med datan i HTTP headers vid varje kall, då cookies dessutom har en lägre gräns på mängden data att spara (4096 bytes) så kändes det smidigare att använda sig av localstorage vars lagring ligger på 5MB.

<strong>Risker med applikationen</strong>
Den första begränsningen min applikation har är att översättnings-APIet endast fungerar om tweeten är på engelska, skrivs det på ett annat språk så händer inget utan inlägget ser likadant ut som originalet.
Då applikationen är byggt för två APIer så är den beroende på att de fungerar, lägger ett API ner så tappar den funktion. Om piratöversättnings-APIet lägger ner så har dock sidan fortfarande värde i intresse då man kan se sina tweets samt söka efter andra tweets.
Webbsidan har ett inputfält och i den satte jag ett pattern värde som uteslöt taggar( < och > ) vilket hindrar elaka användaren från att försöka sig på javaScriptkod i input-fältet.

När man använder sig av Twitters API så finns det vissa gränser man måste hålla sig under, applikationen kan göra max 350 utloggningskall varje timme. Det är förmodligen inga siffror min applikation kommer nå men det är bra att vara medveten om begränsningarna.
En risk som applikationen besitter är att jag har haft problem med stabiliteten med inloggnen då det i vissa lägen inte fungerar som det ska. Jag får en 220 "Your credentials do not allow access to this resource" tillbaka. Ett problem som suttit i och dessutom varit väldigt oklart om hur det ska ha lösts då twitter APIet inte har någon vidare support för att fråga om problem. 

<strong>Reflektioner</strong>
Från början skulle jag använda ett Yoda-översättnings-API men det verkade inte vara ett komplett API och fungerade därför inte. Istället fick jag tänka i nya banor vilket ledde till ett pirat-API då det lät som en kul idé och reultatet blev bättre än jag trodde.

I stora drag är jag nöjd med resultatet, det grundades på en kul idé och fungerar bra när inloggningen väl gör som den ska. Problemet som jag nämner i Risker med applikationen angående den ostabila inloggningen har varit frutkansvärt frustrerande då jag har läst på länge om personer med liknande problem men lösningarna har inte fungerat något vidare på min applikation. Verifieringsproblemet har försvårat arbetets gång då jag har fått försöka lösa problem istället för att kunna lägga mer vikt på applikationens funktionalitet, något jag lärt mig att vara försiktigare med i framtiden.

Det har varit lite svårt men väldigt lärorikt då man lärt sig att använda OAuth vilket var en ny teknik, samt biblioteket twitteroauth för att implementera det till applikationen. Offline.js var också en ny teknik som jag säkerligen kommer använda mig av igen i framtiden för dess användarvänlighet. 

Framtiden för den här applikationen kommer innebära att implementera så man kan publicera nya tweets till sitt konto, se till så att bilder i tweets hämtas och visas i inlägget. Jag vill även få inloggningen att fungera då jag gillar hur konceptet på idén och vill eventuellt använda den för skojs skull.

<strong>Betygshöjande</strong>
Applikationens utseende och dess funktioner är tydliga för användaren och det är lätt för den att använda och förstå. Som till exempel det visas vem som skrivit tweetsen och när den publicerades, sökfunktionen är också tydligt synlig och beskrivande vad den gör och vilka text karaktärer som är tillåtna.

