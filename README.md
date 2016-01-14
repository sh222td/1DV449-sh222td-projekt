# 1DV449 Projekt sh222td 

##Mashup applikation för kursen 1DV449

### Twittarr

<strong>Inledning</strong>
Grundidén till projektet är att man ska kunna översätta sina egna tweets eller tweets man sökt på till "piratspråk". En användare kan logga in via sitt Twitter konto och bemöts direkt med en lista på sina senaste tweets, sorterade på senaste inlägg. Vid varje inlägg finns en bildikon som indikerar på att man kan välja den valda tweeten för översättning. När användaren klickat på ikonen så kommer det upp en översättning tydligt på sidan, man får även möjligheten att ta bort översättningen om så önskas. Upp till höger finns en sökmotor där man kan söka på hashtagtrådar, nyckelord eller användare i tweets. När användaren sökt presenteras en lista på de tweets som innehåller sökordet, även dessa kan översättas.

Projektet är skrivet i HTML, CSS, JavaScript och PHP. De bibliotek jag använt mig utav är jQuery för JavaScripten, twitterOAuth för twitter inlogget och till sist Offline.js för internetstatus hanteringen. Min utvecklingsmiljö har varit EasyPHP som är ett mjukvarupaket innehållande en Apacheserver, MySQL databas(inget jag behövt för just denna applikation) samt PHP 5.2.0, all kod har skrivits i PhpStorm. Jag valde att jobba i php och javascript då jag kände att jag ville använda språk som jag känner till väl så jag kunde lägga tiden på att lära mig fler bibliotek. Att välja välkända kodspråk var dessutom gynnsamt när man jobbar med APIer som fortfarande är relativt nytt för en. Det har även resulterat i att jag kan lägga vikten på att lära mig nya saker som biblioteken jag använt mig utav.

En liknande sida som finns är http://postlikeapirate.com/ De översätter engelsk text till pirat, man kan sedan posta översättningen som en tweet på sitt konto. Den stora skillnaden på den och min applikation är att min lutar mer åt Twitter hållet där man väljer något och översätta istället för att skriva det direkt själv. Jag gillar dock deras idé med att man postar översättningen som en tweet, att man i min applikation ska kunna posta den igen som pirat. 

<strong>Säkerhet- och prestandaoptimering</strong>
Säkerhetsoptimering: För inloggingshantering på Twitter använder jag mig utav OAuth, en tjänst för att autentisiera tredjeparts webbsidor. Detta underlättar för appliaktionen då den slipper ha hand om användardata som lösenord och är därför säkrare och skyddad mot OWASPs säkerhetspunkt A2 (Bruten Autentisiering och Sessionshantering). Applikationen bryter heller inte mot OWASPs säkerhetspunkt A6 (Blottning av känslig data) då sidan endast hanterar tweets som redan är en publik resurs.

Prestandaoptimering: Jag läser in CSS filerna så tidigt som möjligt i koden så att sidan innehåll visas först. Skript filerna laddar jag in längst ner så inläsningen inte tar tid för sidan att laddas in så snabbt som möjligt. 
Jag har försökt strukturera koden så gott det går med tydlig indentering, kosekvent struktur samt uppdelning av filer. Namngivningen på funktioner, klasser och variabler är beskrivande och jag har valt att hålla kommentarerna korta så de inte tar så stor plats i filen.

<strong>Offline-first</strong>
Jag valde att använda mig utav Offline.js för att informera användaren ifall internet är nere då det presenterade informationen på ett snyggt sätt och det var smidigt att implementera.

Cacheningen hanteras via localstorage, användarens tweets vid inloggning och sökresultatet är de som sparas i varsin localstorage. Jag valde localstorage över sessionstorage då sessionstorage bara existerar tills användaren stänger ner fliken och ja utgår från att min dagliga användare kan råka stänga ner flikar. Jag valde detta framför cookies då jag ville undvika and skicka med datan i HTTP headers vid varje kall, då cookies dessutom har en lägre gräns på mängden data att spara (4096 bytes) så kändes det allmänt smidigare att använda sig utav localstorage vars lagring ligger på 5MB.

<strong>Risker med applikationen</strong>
Den första begränsningen min applikation har är att översättnings-APIet endast fungerar om tweeten är på engelska, skrivs det på ett annat språk så händer inget utan inlägget ser likadant ut som originalet.
Då applikationen är byggt för två APIer så är den beroende på att de fungerar, lägger ett API ner så tappar den funktion. Om pirat översättnings APIet lägger ner så har dock sidan fortfarande värde i intresse då man kan se sina tweets samt söka efter andra tweets.
Webbsidan har ett inputfält och i den satte jag ett pattern värde som uteslöt taggar( < och > ) vilket hindrar elaka användaren från att försöka sig på javascriptkod i input fältet.

När man använder sig utav Twitters API så finns det vissa gränser man måste hålla sig under, applikationen kan göra max 350 utloggningskall varje timme, inga siffror min applikation kanske kommer nå men det är bra att vara medveten om ens begränsningar.
En risk som applikationen besitter är att jag har haft problem med stabiliteten med inloggnin då det i vissa lägen inte fungerar som det ska då jag får en 220 "Your credentials do not allow access to this resource" tillbaka. Ett problem som suttit i och dessutom varit väldigt oklart om hur det ska ha lösts.

<strong>Reflektioner</strong>
Från början skulle jag använda ett Yoda översättnings API men det verkade inte vara ett komplett API och fungerade därför inte. Istället fick jag tänka i nya banor vilket ledde till pirat då det lät som en kul idé och reultate blev bättre än jag trodde.

I stora drag är jag nöjd med resultatet, det grundades på en kul idé fungerar bra när inloggningen väl gör som den ska. Problemet som jag nämner i Risker med applikationen angående den ostabila inloggningen har varit frutkansvärt frustrerande då jag har läst på länge om personer med liknande problem men lösningarna har inte fungerat något vidare på min applikation. 

Det har varit väldigt lärorikt då man lärt sig att använda OAuth vilket var en ny teknik, samt biblioteket twitteroauth för att implementera det till applikationen. Offline.js var också en ny teknik som jag säkerligen kommer använda mig utav igen i framtiden för dess användarvänlighet. 

Framtiden för den här applikationen kommer innebära att implementera så man kan publicera nya tweets till sitt konto, samt att få inloggningen att fungera då jag gillar hur det fungerar hittils och vill eventuell använda den för skojs skull.

<strong>Betygshöjande</strong>
Applikationens utseende och dess funktioner är tydliga för användaren och det är lätt för den att använda och förstå. 

