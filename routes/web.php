<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/foto/{id}', function (string $id) {
    $number = (int) $id;

    abort_if($number < 1 || $number > 55, 404);

    $photos = [
        1 => [
            'title' => 'Artist Presskit',
            'location' => 'Zaandam',
            'description' => 'Voor mijn projectweek fotografeerde ik Nazli. Tijdens de shoot heb ik haar in een hip hop sfeer vastgelegd.
               Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        2 => [
            'title' => 'The Blue Glance',
            'location' => 'Bosnia',
            'description' => 'Een blik kan iets vertellen zonder het helemaal prijs te geven. Met Blue Glance zoek ik naar die spanning: tussen contact maken en afstand houden, tussen wat een portret laat zien en wat je als kijker zelf invult.',
        ],
        3 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'Dit foto is op meerdere exposities tentoongesteld. 
            Onder andere bij het Mediacollege Amsterdam, waar ik momenteel studeer, 
            in Theater De Krakeling en als hoogtepunt tijdens de Dutch Design Week 2026 in Eindhoven.
             Het hoogtepunt in mijn fotografiecarrière tot nu toe.',
        ],
        4 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        5 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        6 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'Het hoogtepunt daarvan is het portret van de man met de muts. 
            Door de mooie kleuren en zijn glimlach werd dit voor mij de eerste echte sterke straatportret.',
        ],
        7 => [
            'title' => 'Merel',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        8 => [
            'title' => 'Merel',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        9 => [
            'title' => 'Sil Copray',
            'location' => 'Amsterdam',
            'description' => 'Tijdens de shoot heb ik haar werkwijze, persoonlijkheid en creatieve omgeving vastgelegd.
             Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        10 => [
            'title' => 'Sil Copray',
            'location' => 'Amsterdam',
            'description' => 'Tijdens de shoot heb ik haar werkwijze, persoonlijkheid en creatieve omgeving vastgelegd.
             Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        11 => [
            'title' => 'Sil Copray',
            'location' => 'Amsterdam',
            'description' => 'Tijdens de shoot heb ik haar werkwijze, persoonlijkheid en creatieve omgeving vastgelegd.
             Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        12 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'Bij een portret zoek ik naar het moment waarop poseren plaatsmaakt voor aanwezigheid. In deze serie met Marijn geef ik ruimte aan kleine veranderingen in blik en houding, omdat juist daarin een persoonlijkheid voelbaar wordt.',
        ],
        13 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'Bij een portret zoek ik naar het moment waarop poseren plaatsmaakt voor aanwezigheid. In deze serie met Marijn geef ik ruimte aan kleine veranderingen in blik en houding, omdat juist daarin een persoonlijkheid voelbaar wordt.',
        ],
        14 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'Bij een portret zoek ik naar het moment waarop poseren plaatsmaakt voor aanwezigheid. In deze serie met Marijn geef ik ruimte aan kleine veranderingen in blik en houding, omdat juist daarin een persoonlijkheid voelbaar wordt.',
        ],
        15 => [
            'title' => 'Samanthia',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        16 => [
            'title' => 'Samantha',
            'location' => 'Den Helder',
            'description' => 'Voor mijn schoolopdracht Kracht en Entiteit fotografeerde ik Samantha. 
            Tijdens de shoot heb ik haar als een krachtige, maar ook kwetsbare vrouw vastgelegd. 
            Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        17 => [
            'title' => 'Samantha',
            'location' => 'Den Helder',
            'description' => 'Voor mijn schoolopdracht Kracht en Entiteit fotografeerde ik Samantha. 
            Tijdens de shoot heb ik haar als een krachtige, maar ook kwetsbare vrouw vastgelegd. 
            Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        18 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Op reis kijk ik anders. Ik neem meer tijd, volg mijn nieuwsgierigheid en ontdek beelden waar ik thuis misschien aan voorbij zou lopen.',
        ],
        19 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Voor mij zit de schoonheid van reizen ook in het onverwachte. Niet alles hoeft vooraf bedacht te zijn; soms begint een foto simpelweg met even blijven staan.',
        ],
        20 => [
            'title' => 'Kroatisch lich',
            'location' => 'Kroaite',
            'description' => 'Kroatië ontdekken met mijn camera betekende mijn eigen blik volgen. Deze foto bewaart een moment uit die reis en nodigt je uit om even met me mee te kijken.',
        ],
        21 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Met deze foto bewaar ik iets van mijn eigen ervaring van Italië. Geen compleet verhaal over een plek, maar één moment zoals ik het zag.',
        ],
        22 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Fotografie geeft me een reden om langer te kijken. Om een omgeving niet alleen te bezoeken, maar haar ook echt ',
        ],
        23 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Een reis bestaat voor mij uit meer dan bestemmingen. Juist wat ik onderweg ontdek, bepaalt welke herinneringen ik mee naar huis neem.',
        ],
        24 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Wat mij raakt aan een plek, probeer ik terug te brengen tot één beeld',
        ],
        25 => [
            'title' => 'Een blik op Italië',
            'location' => 'Italie',
            'description' => 'Deze foto is een stukje Italië dat ik op mijn eigen manier wilde onthouden.',
        ],
        26 => [
            'title' => 'Mollie',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
        ],
        27 => [
            'title' => 'Dutch Gyro Open 2025',
            'location' => 'Park van Luna - Heerhugowaard',
            'description' => 'Tijdens dit internationale discgolf-evenement in Park van Luna legde ik de dynamiek,
             concentratie en sfeer van het toernooi vast. 
            Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        28 => [
            'title' => 'Mollie',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
        ],
        29 => [
            'title' => 'Mollie',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
        ],
        30 => [
            'title' => 'Mollie',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
        ],

        31 => [
            'title' => 'Nederlands Landschap',
            'location' => 'Den Helder',
            'description' => 'Onderdeel van een fotografische verkenning van het natuurlandschap rond Den Helder.',
        ],
        33 => [
            'title' => 'Nederlands Landschap',
            'location' => 'Den Helder',
            'description' => 'Een tweede perspectief op het landschap rond Den Helder, uit de serie Noordkop.',
        ],
        34 => [
            'title' => 'Nederlands Landschap',
            'location' => 'Den Helder',
            'description' => 'Een persoonlijke blik op de natuur van Den Helder.',
        ],
        35 => [
            'title' => 'Nederlands Landschap',
            'location' => 'Den Helder',
            'description' => 'Een landschapsstudie waarin rust en aandacht voor de omgeving centraal staan.',
        ],
        36 => [
            'title' => 'Nederlands Landschap',
            'location' => 'Den Helder',
            'description' => 'Een verkenning van vormen en details in het landschap van Den Helder.',
        ],
        32 => [
            'title' => 'Parfum',
            'location' => 'Den Helder',
            'description' => 'Fashion fotografie, een parfum shoot.',
        ],

        37 => [
            'title' => 'Theodore',
            'location' => 'Den Helder',
            'description' => "Nomade Magazine. Deze shoot is onderdeel van het magazine Nomade, een eenmalige uitgave in opdracht van het Mediacollege Amsterdam, gemaakt in samenwerking met de opleidingen Photographic Designer (PD) en Allround Mediamaker (AMM). Wij deden dit in een redactie van 6 PD'ers en 3 AMM'ers.",
        ],
        38 => [
            'title' => 'Samantha',
            'location' => 'Den Helder',
            'description' => 'Voor mijn schoolopdracht Kracht en Entiteit fotografeerde ik Samantha. 
            Tijdens de shoot heb ik haar als een krachtige, maar ook kwetsbare vrouw vastgelegd. 
            Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        39 => [
            'title' => 'Theodore',
            'location' => 'Den Helder',
            'description' => "Nomade Magazine. Deze shoot is onderdeel van het magazine Nomade, een eenmalige uitgave in opdracht van het Mediacollege Amsterdam, gemaakt in samenwerking met de opleidingen Photographic Designer (PD) en Allround Mediamaker (AMM). Wij deden dit in een redactie van 6 PD'ers en 3 AMM'ers.",
        ],
        40 => [
            'title' => 'Theodore',
            'location' => 'Den Helder',
            'description' => "Nomade Magazine. Deze shoot is onderdeel van het magazine Nomade, een eenmalige uitgave in opdracht van het Mediacollege Amsterdam, gemaakt in samenwerking met de opleidingen Photographic Designer (PD) en Allround Mediamaker (AMM). Wij deden dit in een redactie van 6 PD'ers en 3 AMM'ers.",
        ],
        41 => [
            'title' => 'Theodore',
            'location' => 'Den Helder',
            'description' => "Nomade Magazine. Deze shoot is onderdeel van het magazine Nomade, een eenmalige uitgave in opdracht van het Mediacollege Amsterdam, gemaakt in samenwerking met de opleidingen Photographic Designer (PD) en Allround Mediamaker (AMM). Wij deden dit in een redactie van 6 PD'ers en 3 AMM'ers.",
        ],
        42 => [
            'title' => 'Dutch Gyro Open 2025',
            'location' => 'Park van Luna - Heerhugowaard',
            'description' => 'Tijdens dit internationale discgolf-evenement in Park van Luna legde ik de dynamiek,
             concentratie en sfeer van het toernooi vast. 
            Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        43 => [
            'title' => 'Nazli',
            'location' => 'Bosnia',
            'description' => 'Tijdens het hiken boven op een berg dit bezonderlijk afbeelding genomen.',
        ],
        44 => [
            'title' => 'The Blue Glance',
            'location' => 'Bosnia',
            'description' => 'Een blik kan iets vertellen zonder het helemaal prijs te geven. Met Blue Glance zoek ik naar die spanning: tussen contact maken en afstand houden, tussen wat een portret laat zien en wat je als kijker zelf invult.',
        ],
        45 => [
            'title' => 'Artist Presskit',
            'location' => 'Zaandam',
            'description' => 'Voor mijn projectweek fotografeerde ik Nazli. Tijdens de shoot heb ik haar in een hip hop sfeer vastgelegd.
               Hieronder vind je een selectie van mijn favoriete beelden.',
        ],
        46 => [
            'title' => 'Merel',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        47 => [
            'title' => 'Nazli',
            'location' => 'Bosnia',
            'description' => 'Een blik kan iets vertellen zonder het helemaal prijs te geven. Met Blue Glance zoek ik naar die spanning: tussen contact maken en afstand houden, tussen wat een portret laat zien en wat je als kijker zelf invult.',
        ],
        48 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        49 => [
            'title' => 'The Blue Glance',
            'location' => 'Bosnia',
            'description' => 'Een blik kan iets vertellen zonder het helemaal prijs te geven. Met Blue Glance zoek ik naar die spanning: tussen contact maken en afstand houden, tussen wat een portret laat zien en wat je als kijker zelf invult.',
        ],
        50 => [
            'title' => 'The Blue Glance',
            'location' => 'Bosnia',
            'description' => 'Een inspirenrd moment.',
        ],
        51 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'Bij een portret zoek ik naar het moment waarop poseren plaatsmaakt voor aanwezigheid. In deze serie met Marijn geef ik ruimte aan kleine veranderingen in blik en houding, omdat juist daarin een persoonlijkheid voelbaar wordt.',
        ],
        52 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'Bij een portret zoek ik naar het moment waarop poseren plaatsmaakt voor aanwezigheid. In deze serie met Marijn geef ik ruimte aan kleine veranderingen in blik en houding, omdat juist daarin een persoonlijkheid voelbaar wordt.',
        ],
        53 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
        ],
        54 => [
            'title' => 'Nederlands Landschap',
            'location' => 'Texel',
            'description' => 'Het landschap van Texel, vastgelegd vanuit een persoonlijk perspectief.',
        ],
        55 => [
            'title' => 'Oneindig liefde',
            'location' => 'Texel',
            'description' => 'ik kwam een dame tegen een hele spontane moment leverde nog steeds één van mijn favoriete foto’s ooit op. Niet vanwege het technische aspect, want de foto is verre van perfect, maar vanwege het moment en het gevoel dat ik ervan kreeg. Deze dag heeft mij enorm gemotiveerd om verder te groeien in fotografie en doet dat nog steeds. Een goed begin.',
        ],
        56 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'Bij een portret zoek ik naar het moment waarop poseren plaatsmaakt voor aanwezigheid. In deze serie met Marijn geef ik ruimte aan kleine veranderingen in blik en houding, omdat juist daarin een persoonlijkheid voelbaar wordt.',
        ],
        57 => [
            'title' => 'Artist Presskit',
            'location' => 'Zaandam',
            'description' => 'Voor mijn projectweek fotografeerde ik Nazli. Tijdens de shoot heb ik haar in een hip hop sfeer vastgelegd.
               Hieronder vind je een selectie van mijn favoriete beelden.',
        ],

    ];

    $photo = $photos[$number] ?? [
        'title' => "Foto {$number}",
        'location' => 'Nog invullen',
        'description' => 'Beschrijving volgt.',
    ];

    $extension = $number <= 52 ? 'jpg' : 'webp';

    // Zoek de andere foto's met precies dezelfde titel.
    $relatedPhotos = [];

    foreach ($photos as $photoNumber => $details) {
        if (
            $details['title'] === $photo['title'] &&
            $photoNumber !== $number
        ) {
            $relatedExtension = $photoNumber <= 52 ? 'jpg' : 'webp';

            $relatedPhotos[] = [
                'number' => $photoNumber,
                'image' => "images/foto{$photoNumber}.{$relatedExtension}",
                'title' => $details['title'],
            ];
        }
    }

    return view('foto', [
        'number' => $number,
        'image' => "images/foto{$number}.{$extension}",
        'title' => $photo['title'],
        'location' => $photo['location'],
        'description' => $photo['description'],
        'relatedPhotos' => $relatedPhotos,
    ]);
})->whereNumber('id');
