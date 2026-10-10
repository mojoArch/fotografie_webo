# JVIS Fotografie

JVIS Fotografie is mijn persoonlijke fotografieportfolio. Ik ben Jamie Vis en gebruik deze website om mijn portretten, reisfoto's en natuurfotografie te laten zien. Bezoekers kunnen door mijn werk bladeren, een foto openen en meer lezen over de locatie en het verhaal erachter.

Ik bouw dit project om mijn fotografie te presenteren én om te leren werken met PHP, Laravel, CSS, JavaScript en Docker.

## Hoe ik de website heb gemaakt

### Van losse PHP-bestanden naar Laravel

Ik begon met een eigen mappenstructuur voor CSS, JavaScript en PHP, met bestanden zoals `index.php`, `header.php` en `footer.php`. Daarna ben ik overgestapt naar Laravel, zodat ik kon leren hoe routes en views samenwerken.

Met Composer heb ik het Laravel-project aangemaakt. Eerst draaide ik de website met `php artisan serve`. Vervolgens heb ik Laravel Sail toegevoegd om het project met Docker te draaien.

### Routes en Blade

In `routes/web.php` heb ik routes gemaakt voor de homepage, de About-pagina en de fotodetailpagina's:

- `/` toont het overzicht van mijn foto's.
- `/about` vertelt meer over mij.
- `/foto/{id}` toont de foto met het nummer uit de URL.

De pagina's zijn gemaakt met Blade, het templatesysteem van Laravel. Met een `@for`-lus toon ik de foto's op de homepage. Daardoor hoef ik niet voor iedere foto dezelfde HTML opnieuw te schrijven.

Voor de detailpagina gebruik ik één bestand: `foto.blade.php`. Laravel geeft hier telkens de juiste afbeelding, titel, locatie en beschrijving aan door.

### Vormgeving van de fotogalerij

Tijdens het ontwerpen heb ik inspiratie gehaald uit de websites van A24 van Ravi Klaassens en Kavieng Creative. Het ontwerp ontwikkelde zich tot een donkere fotowand met mijn eigen fotografie.

Met CSS Grid heb ik de foto's in kolommen gezet. Media queries passen het aantal kolommen aan op kleinere schermen. Met perspectief en rotatie krijgen de buitenste foto's een gekanteld effect.

De foto's zijn standaard donker en zwart-wit. Wanneer je er met de muis overheen beweegt, verschijnen de kleuren. Een subtiele CSS-animatie laat de beelden langzaam heen en weer bewegen.

Ik heb ook geëxperimenteerd met oneindig scrollen. Uiteindelijk heb ik dat verwijderd en gekozen voor een normaal scrollbaar foto-overzicht.

### About-pagina en GSAP

De About-pagina heeft een zwarte achtergrond met mijn naam in grote letters. Met GSAP laat ik mijn voornaam van rechts en mijn achternaam van links in beeld komen.

Hierbij leerde ik dat de plaats van JavaScript belangrijk is: de animatiecode moet pas draaien wanneer de elementen die ik wil animeren bestaan. Daarom staan de scripts onderaan de pagina.

### Foto's groeperen in series

De gegevens van mijn foto's staan momenteel in een PHP-array in `routes/web.php`. Elk fotonummer heeft een titel, locatie en beschrijving.

De website vergelijkt de titels om foto's uit dezelfde serie te verzamelen. Foto's met precies dezelfde titel worden bij elkaar getoond. De aangeklikte foto wordt niet nogmaals in de lijst met bijbehorende foto's geplaatst.

Voorbeelden van series zijn Marijn, The Blue Glance en Nederlands Landschap. De informatie staat nog niet in een database of beheeromgeving; ik pas deze zelf in de code aan.

### Grote fotoweergave

Op de detailpagina kun je op de foto naast de beschrijving klikken. Een HTML-`dialog` toont vervolgens de originele afbeelding groot, bovenop de pagina. Met JavaScript wordt dit venster geopend. Sluiten kan met de sluitknop, Escape of een klik op de donkere achtergrond.

### Sneller laden

De originele foto's waren samen ongeveer 341 MB. Dat was te zwaar voor de kleine afbeeldingen op de homepage.

Daarom zijn met ImageMagick aparte WebP-thumbnails gemaakt van maximaal 800 pixels breed. De 57 gegenereerde voorbeelden zijn samen ongeveer 2,71 MB en elk kleiner dan 200 kB. De homepage gebruikt deze kleine bestanden; de detailpagina's blijven de originelen gebruiken.

Daarnaast hebben de afbeeldingen `loading="lazy"`. De browser kan daardoor het laden van foto's die nog buiten beeld staan uitstellen.

### Ontwikkelen met Docker

Met Laravel Sail draait de website in een PHP-container en de database in een aparte MySQL-container. Tijdens het instellen kwam ik een poortconflict tegen. Daarom gebruikt MySQL op mijn computer poort 3307, terwijl Laravel binnen Docker verbinding maakt via `mysql:3306`.


### Wat ik heb geleerd

Tijdens dit project heb ik veel geleerd over het werken met Laravel. Door stap voor stap aan mijn portfolio te bouwen, begrijp ik beter hoe routes, Blade-templates en PHP-gegevens samenwerken. Ik heb geoefend met fotolussen, het doorgeven van gegevens aan pagina's en het groeperen van foto's in series. Door zelf code te schrijven, aan te passen en fouten op te lossen, ben ik steeds vertrouwder geworden met Laravel. Daarnaast heb ik ervaring opgedaan met Docker, responsive CSS, JavaScript-animaties en het sneller laten laden van afbeeldingen.

## Gebruikte technieken

| Techniek | Waarvoor ik die gebruik |
| --- | --- |
| PHP en Laravel 13 | Routes en verwerken van fotogegevens |
| Blade en HTML | Paginastructuur en herbruikbare fotoweergave |
| CSS | Raster, responsive ontwerp, hover-effecten en beweging |
| JavaScript | Interactie en openen van de vergrote foto |
| GSAP | Animatie van mijn naam op de About-pagina |
| Docker en Laravel Sail | Lokale ontwikkelomgeving met PHP 8.5 |
| MySQL 8.4 | Laravel-database, onder andere voor sessies |
| ImageMagick en WebP | Kleinere afbeeldingen voor de homepage |

## Projectstructuur

```text
routes/web.php                    Routes en gegevens per foto
resources/views/welcome.blade.php Homepage
resources/views/about.blade.php   About-pagina
resources/views/foto.blade.php    Fotodetails, series en grote weergave
public/images/                   Originele foto's
public/images/thumbs/            Kleine WebP-afbeeldingen
compose.yaml                     Docker-configuratie
```

## Lokaal starten

Voor een al geïnstalleerd project: start Docker en voer vanuit de projectmap uit:

```bash
./vendor/bin/sail up -d
```

Open daarna `http://localhost` bij de standaard websitepoort 80.

Stop de containers aan het einde van de dag met:

```bash
./vendor/bin/sail down
```

Dit bewaart de database in het Docker-volume. Gebruik geen `-v` wanneer je de database wilt behouden.

### Eerste installatie op een andere computer

Benodigd: Docker met Compose, Composer en PHP met de extensies die de Composer-afhankelijkheden vereisen. PHP 8.5 sluit aan op de huidige Sail-configuratie.

Voer in een nieuwe checkout uit:

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Kopieer `.env.example` alleen als er nog geen eigen `.env` is. Pas daarna de volgende instellingen aan. Het wachtwoord hieronder is een voorbeeld voor lokale ontwikkeling.

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

Start vervolgens de containers en controleer hun status:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail ps
```

Wanneer MySQL `healthy` is, maak je de databasetabellen aan:

```bash
./vendor/bin/sail artisan migrate
```

De huidige pagina's gebruiken inline CSS en JavaScript. Voor de GSAP-animatie via het externe CDN is een internetverbinding nodig.

## Foto's en teksten aanpassen

De gegevens staan in de `$photos`-array in `routes/web.php`:

```php
31 => [
    'title' => 'Nederlands Landschap',
    'location' => 'Den Helder',
    'description' => 'Een persoonlijke blik op het landschap rond Den Helder.',
],
```

Gebruik exact dezelfde titel voor foto's die samen een serie moeten vormen. De locatie en beschrijving mogen wel verschillen.

Bij een nieuwe foto moet ik:

1. Het origineel in `public/images` zetten.
2. Een kleine WebP-versie in `public/images/thumbs` plaatsen.
3. Het fotonummer toevoegen aan de gegevens in de route.
4. De fotolus op de homepage, de bovengrens in de route en de zichtbare fototeller bijwerken.
5. Controleren of de extensiekeuze bij het bestand past, ook voor gerelateerde foto's.

De huidige route gebruikt `.jpg` tot en met foto 52 en `.webp` voor hogere nummers.

## Wat nog verbeterd kan worden

- De foto-aantallen op één centrale plek beheren. Momenteel toont de homepage 57 foto's, accepteert de route maximaal 55 en vermeldt de teller 58. Hierdoor zijn de detailpagina's voor foto 56 en 57 niet bereikbaar.
- Fotogegevens naar een database verplaatsen en een beheerpagina maken.
- Series een eigen kenmerk geven, zodat groeperen niet afhankelijk is van de titel.
- CSS en JavaScript uit de Blade-bestanden halen en overzichtelijk organiseren.
- Het toevoegen en verkleinen van nieuwe foto's automatiseren.

## Fotografie

Fotografie door Jamie Vis. De foto's zijn onderdeel van mijn portfolio; de licentie van Laravel geeft geen toestemming om deze beelden te hergebruiken.
