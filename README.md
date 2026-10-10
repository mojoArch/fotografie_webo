JVIS Fotografie

Voor dit project heb ik een fotografiewebsite gemaakt voor fotograaf Jamie Vis. Op de website staan portretten, reisfoto's en natuurfoto's. Je kunt een foto aanklikken om die groter te bekijken en meer te lezen over de locatie en het verhaal erachter. Foto's uit dezelfde serie worden bij elkaar getoond.

Ik wilde met dit project vooral leren hoe ik met Laravel een website kon bouwen. In het begin had ik zelf mappen gemaakt voor PHP, CSS en JavaScript, met losse bestanden zoals index.php, header.php en footer.php. Daarna ben ik overgestapt naar Laravel en heb ik stap voor stap geleerd hoe de structuur daarvan werkt.

Hoe ik ben begonnen

Ik heb het Laravel-project aangemaakt met Composer. Eerst startte ik de website met php artisan serve. Later heb ik Laravel Sail toegevoegd, zodat ik het project met Docker kon draaien. De website en de MySQL-database draaien daarbij in aparte containers.

Het instellen ging niet meteen goed. Poort 3306 was al in gebruik en Laravel kon de database eerst niet vinden. Door dat op te lossen begreep ik beter hoe de containers met elkaar communiceren. Op mijn computer gebruikt de database nu poort 3307, maar binnen Docker blijft dat 3306.

Het ontwerp

Voor inspiratie heb ik gekeken naar de A24-website van Ravi Klaassens en de website van Kavieng Creative. Ik vond vooral de manier waarop de beelden werden gepresenteerd interessant. Vanuit die voorbeelden heb ik een donkere fotogalerij gemaakt met de foto's van Jamie Vis.

De fotos staan in een raster dat zich aanpast aan de schermgrootte. Ze zijn eerst donker en zwart-wit.. Als je er met de muis overheen gaat, krijgen ze kleur. Met CSS heb ik ook een kleine beweging toegevoegd en de buitenste foto's iets gekanteld.

Ik had eerst oneindig scrollen gemaakt, maar heb dat later weer weggehaald. Nu kun je gewoon door de collectie scrollen tot de laatste foto.

De pagina's

De homepage staat in resources/views/welcome.blade.php. Daar gebruik ik een lus om de foto's te tonen. Zo hoef ik niet voor iedere foto dezelfde HTML te schrijven.

Voor de detailpagina's gebruik ik één bestand: resources/views/foto.blade.php. Het fotonummer in de URL bepaalt welke afbeelding en welke informatie je ziet. Bij /foto/12 krijgt de pagina bijvoorbeeld de gegevens van foto 12.

De titels, locaties en beschrijvingen staan in een PHP-array in routes/web.php. Foto's met dezelfde titel worden bij elkaar gezocht en als serie getoond. Dat gebruik ik bijvoorbeeld voor Marijn en The Blue Glance. Er is nog geen beheerpagina; ik pas de gegevens nu zelf in de code aan.

Op de detailpagina kun je ook op de foto naast de beschrijving klikken. Dan opent er een grote weergave van het origineel. Die kun je sluiten met de sluitknop, Escape of een klik op de donkere achtergrond.

Op de About-pagina staat informatie over de fotograaf. De achtergrond is zwart en de naam Jamie Vis staat er in grote letters. Met GSAP heb ik de voornaam van rechts en de achternaam van links in beeld laten komen. Daarbij leerde ik dat JavaScript pas moet draaien nadat de elementen op de pagina zijn aangemaakt.

De foto's sneller laten laden

De homepage laadde eerst langzaam, omdat daar de originele foto's werden gebruikt. Die waren samen ongeveer 341 MB. Voor kleine afbeeldingen in een raster was dat veel te zwaar.

Daarom zijn er aparte WebP-versies gemaakt met ImageMagick, van maximaal 800 pixels breed. De 57 gemaakte thumbnails zijn samen ongeveer 2,71 MB en elk kleiner dan 200 kB. Deze staan in public/images/thumbs. De originelen blijven in public/images staan en worden op de detailpagina's gebruikt.

Ik gebruik ook loading="lazy", zodat de browser foto's die nog buiten beeld staan later kan laden.

Wat ik heb geleerd

Ik heb tijdens dit project veel geleerd over Laravel. Vooral hoe routes en Blade-pagina's samenwerken en hoe je gegevens vanuit PHP aan een pagina doorgeeft. Ook begrijp ik nu beter hoe ik lussen en arrays kan gebruiken om meerdere foto's te tonen zonder steeds dezelfde code te herhalen.

Door code te schrijven, dingen uit te proberen en fouten op te lossen ben ik steeds vertrouwder geworden met het bouwen van een website. Naast Laravel heb ik geoefend met responsive CSS, JavaScript, GSAP en Docker. Het project heeft me ook laten zien hoeveel invloed grote afbeeldingen hebben op de laadtijd.

Wat ik heb gebruikt

- PHP en Laravel 13 voor de routes en de fotogegevens.
- Blade en HTML voor de pagina's.
- CSS voor de vormgeving, het raster en de hover-effecten.
- JavaScript en GSAP voor de interacties en animaties.
- Docker en Laravel Sail voor de lokale omgeving met PHP 8.5.
- MySQL 8.4 voor de Laravel-database, onder andere voor sessies.
- ImageMagick om kleinere versies van de foto's te maken.

Het project starten

Als het project al is geïnstalleerd, start ik Docker en voer ik in de projectmap dit commando uit:

```bash
./vendor/bin/sail up -d
```

Daarna open ik http://localhost. Als ik klaar ben, stop ik de containers met:

```bash
./vendor/bin/sail down
```

De database blijft dan bewaard. De optie -v verwijdert ook het volume, dus die gebruik ik niet als ik mijn database wil behouden.

Installeren op een andere computer

Voor een nieuwe installatie zijn Docker met Compose, Composer en PHP nodig. PHP 8.5 sluit aan op de huidige Sail-configuratie. Vanuit een nieuwe checkout voer je uit:

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Kopieer .env.example alleen als je nog geen eigen .env hebt. Pas daarin de volgende instellingen aan. Het wachtwoord hieronder is een voorbeeld voor lokaal gebruik.

```dotenv
APP_NAME="JVIS Fotografie"
APP_URL=http://localhost
APP_PORT=80
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
FORWARD_DB_PORT=3307
```

Start daarna de containers:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail ps
```

Zodra MySQL healthy is, kun je de tabellen aanmaken:

```bash
./vendor/bin/sail artisan migrate
```

De huidige pagina's gebruiken CSS en JavaScript in de Blade-bestanden. De GSAP-animatie wordt via een externe CDN geladen en heeft daarvoor internet nodig.

Foto's aanpassen of toevoegen

De belangrijkste bestanden zijn:

```text
routes/web.php                    Routes en gegevens per foto
resources/views/welcome.blade.php Homepage
resources/views/about.blade.php   About-pagina
resources/views/foto.blade.php    Detailpagina en grote fotoweergave
public/images/                   Originele foto's
public/images/thumbs/            Kleine afbeeldingen voor de homepage
compose.yaml                     Docker-configuratie
```

In routes/web.php heeft iedere foto een nummer met een titel, locatie en beschrijving. Bijvoorbeeld:

```php
31 => [
    'title' => 'Nederlands Landschap',
    'location' => 'Den Helder',
    'description' => 'Een persoonlijke blik op het landschap rond Den Helder.',
],
```

Om foto's bij elkaar te tonen geef ik ze precies dezelfde titel. De locatie en beschrijving kunnen per foto verschillen.

Bij een nieuwe foto zet ik het origineel in public/images en een kleine WebP-versie in public/images/thumbs. Daarna voeg ik de gegevens toe aan de array. Ook moet ik het aantal foto's in de homepage-lus, de nummercontrole in de route en de teller op de detailpagina bijwerken.

De huidige route gebruikt .jpg tot en met foto 52 en .webp voor de nummers daarna. De bestandsnaam en extensie moeten overeenkomen met de code.

Wat ik nog wil verbeteren

De foto-aantallen wil ik op één plek gaan beheren. Ze staan nu op meerdere plekkenn en lopen nog uiteen: de homepage toont 57 foto's, de route accepteert maximaal 55 en de teller vermeldt 58. Daardoor werken de detailpagina's van foto 56 en 57 momenteel niet.

Verder wil ik de fotogegevens in een database zetten en een beheerpagina maken. Dan hoef ik niet meer voor iedere aanpassing in de code te werken. Ook wil ik de CSS en JavaScript overzichtelijker organiseren en het maken van kleine afbeeldingen automatiseren.

Fotografie

De foto's op deze website zijn van fotograaf Jamie Vis. Ze horen bij het portfolio van de fotograaf. De licentie van Laravel geeft geen toestemming om deze foto's te hergebruiken.
