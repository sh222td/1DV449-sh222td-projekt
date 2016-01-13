# 1DV449 Projekt sh222td 

##Mashup applikation för kursen 1DV449

### Twittarr

<strong>Inledning</strong>
Grundidén till projektet är att man ska kunna översätta sina egna tweets eller tweets man sökt på till "piratspråk". En användare kan logga in via sitt Twitter konto och bemöts direkt med en lista på sina senaste tweets, sorterade på senaste inlägg. Vid varje inlägg finns en bildikon som indikerar på att man kan välja den valda tweeten för översättning. När användaren klickat på ikonen så kommer det upp en översättning tydligt på sidan, man får även möjligheten att ta bort översättningen om så önskas. Upp till höger finns en sökmotor där man kan söka på hashtagtrådar, nyckelord eller användare i tweets. När användaren sökt presenteras en lista på de tweets som innehåller sökordet, även dessa kan översättas.

Projektet är skrivet i HTML, CSS, JavaScript och PHP. De bibliotek jag använt mig utav är jQuery för JavaScripten, twitterOAuth för twitter inlogget och till sist Offline.js för internetstatus hanteringen. Min utvecklingsmiljö har varit EasyPHP som är ett mjukvarupaket innehållande en Apacheserver, MySQL databas(inget jag behövt för just denna applikation) samt PHP 5.2.0, all kod har skrivits i PhpStorm. Jag valde att jobba i php och javascript då jag kände att jag ville använda språk som jag känner till väl, något som har varit gynnsamt när man jobbar med APIer som fortfarande är relativt nytt för en.

En liknande sida som finns är http://postlikeapirate.com/ De översätter engelsk text till pirat, man kan sedan posta översättningen som en tweet på sitt konto. Den stora skillnaden på den och min applikation är att min lutar mer åt Twitter hållet där man väljer något och översätta istället för att skriva det direkt själv. Jag gillar dock deras idé med att man postar översättningen som en tweet, att man i min applikation ska kunna posta den igen som pirat. 

<strong>Säkerhet- och prestandaoptimering</strong>


<strong>Offline-first</strong>
Jag valde att använda mig utav Offline.js för att informera användaren ifall internet är nere då det presenterade informationen på ett snyggt sätt och det var smidigt att implementera.

Cacheningen hanteras via localstorage, användarens tweets vid inloggning och sökresultatet är de som sparas i varsin localstorage. Jag valde localstorage över sessionstorage då sessionstorage bara existerar tills användaren stänger ner fliken och ja utgår från att min dagliga användare kan råka stänga ner flikar. Jag valde detta framför cookies då jag ville undvika and skicka med datan i HTTP headers vid varje kall, då cookies dessutom har en lägre gräns på mängden data att spara (4096 bytes) så kändes det allmänt smidigare att använda sig utav localstorage vars lagring ligger på 5MB.

<strong>Risker med applikationen</strong>
Den första begränsningen min applikation har är att översättnings-APIet endast fungerar om tweeten är på engelska, skrivs det på ett annat språk så händer inget utan inlägget ser likadant ut som originalet.
Då applikationen är byggt för två APIer så är den beroende på att de fungerar, lägger ett API ner så tappar den funktion. Om pirat översättnings APIet lägger ner så har dock sidan fortfarande värde i intresse då man kan se sina tweets samt söka efter andra tweets.
Webbsidan har ett inputfält och i den satte jag ett pattern värde som uteslöt taggar( < och > ) vilket hindrar elaka användaren från att försöka sig på javascriptkod i input fältet.
När man använder sig utav Twitters API så finns det vissa gränser man måste hålla sig under, applikationen kan göra max 350 utloggningskall varje timme, inga siffror min applikation kanske kommer nå men det är bra att vara medveten om ens begränsningar.

<strong>Reflektioner</strong>


<strong>Betygshöjande</strong>


