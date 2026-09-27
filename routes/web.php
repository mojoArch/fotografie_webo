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
              'description' => 'Een inspirerend moment',
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
            'description' => 'het verhaal van begin tot het heden.',
          ],
            13 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'het verhaal van begin tot het heden.',
          ],
            14 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'het verhaal van begin tot het heden.',
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
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
           19 => [
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
           20 => [
            'title' => 'Natuur-Landschap',
            'location' => 'Kroaite',
            'description' => 'Natuurlandschap',
          ],
            21 => [
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
           22 => [
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
            23 => [
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
             24 => [
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
             25=> [
            'title' => 'Natuur-Landschap',
            'location' => 'Italie',
            'description' => 'Natuurlandschap',
          ],
             26=> [
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
           28=> [
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
            'title' => 'Tulp',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
          ],
           32 => [
            'title' => 'Parfum',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
          ],
            33 => [
            'title' => 'Tulp',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
          ],
              34 => [
            'title' => 'Paarden',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
          ],
            35 => [
            'title' => 'Sproei-machine',
            'location' => 'Den Helder',
            'description' => 'Natuurlandschap',
          ],
      36 => [
      'title' => 'Het Oneindig Pad',
      'location' => 'Den Helder',
      'description' => 'Natuurlandschap',
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
            'description' => 'Deze unieke foto in beeld genomen.',
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
            'description' => 'Deze unieke foto in beeld genomen.',
          ],
                    48 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
          ],
            49 => [
            'title' => 'The Blue Glance',
            'location' => 'Bosnia',
            'description' => 'Een inspirenrd moment.',
          ],
             50 => [
            'title' => 'The Blue Glance',
            'location' => 'Bosnia',
            'description' => 'Een inspirenrd moment.',
          ],
            51 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'het verhaal van begin tot het heden.',
          ],
            52 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'het verhaal van begin tot het heden.',
          ],
                53 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
          ],
              54 => [
            'title' => 'Oneindig varen',
            'location' => 'Texel',
            'description' => 'het verhaal van begin tot het heden.',
          ],
            55 => [
            'title' => 'Oneindig liefde',
            'location' => 'Texel',
            'description' => 'ik kwam een dame tegen een hele spontane moment leverde nog steeds één van mijn favoriete foto’s ooit op. Niet vanwege het technische aspect, want de foto is verre van perfect, maar vanwege het moment en het gevoel dat ik ervan kreeg. Deze dag heeft mij enorm gemotiveerd om verder te groeien in fotografie en doet dat nog steeds. Een goed begin.',
          ],
           56 => [
            'title' => 'Marijn',
            'location' => 'Noord scharwoude',
            'description' => 'het verhaal van begin tot het heden.',
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