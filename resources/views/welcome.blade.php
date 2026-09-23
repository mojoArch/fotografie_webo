<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style> 
            
          * {
              box-sizing: border-box;
          }

          body {
              margin: 0;
              background: #080808;
              color: #fff;
              font-family: Arial, sans-serif;
          }

          a {
              color: inherit;
              text-decoration: none;
          }

          .header {
              position: fixed;
              inset: 0 0 auto;
              z-index: 10;
              display: flex;
              justify-content: space-between;
              align-items: center;
              padding: 24px;
              background: linear-gradient(#080808, transparent);
          }

          .name {
              font-size: 24px;
              font-weight: bold;
              text-transform: uppercase;
          }

          .nav {
              display: flex;
              gap: 24px;
          }

          .nav a:hover {
              text-decoration: underline;
          }

          .wall {
              height: 100dvh;
              overflow-y: auto;
              overflow-x: hidden;
              perspective: 1100px;
          }

          .gallery {
              display: grid;
              grid-template-columns: repeat(5, minmax(0, 1fr));
              gap: 20px;
              padding: 10px 24px;
          }

          .photo {
              min-width: 0;
              margin: 0;
              perspective: 700px;
          }

          .photo:nth-child(5n + 1) {
              transform: rotateY(16deg) rotateZ(-3deg);
          }

          .photo:nth-child(5n + 2) {
              transform: rotateY(8deg) rotateZ(-1deg);
          }

          .photo:nth-child(5n + 4) {
              transform: rotateY(-8deg) rotateZ(1deg);
          }

          .photo:nth-child(5n) {
              transform: rotateY(-16deg) rotateZ(3deg);
          }

          .photo img {
              display: block;
              width: 100%;
              aspect-ratio: 3 / 2;
              object-fit: cover;
              border-radius: 6px;
              filter: grayscale(1) brightness(0.45);
              transition: filter 0.6s ease;
              animation: drift 7s ease-in-out infinite alternate;
          }

          .photo:nth-child(3n) img {
              animation-delay: -3s;
          }

          .photo:nth-child(3n + 1) img {
              animation-delay: -5s;
          }

          .photo:hover img {
              filter: grayscale(0) brightness(1);
          }

          @keyframes drift {
              from {
                  transform: translateY(-4px) rotate(-0.4deg);
              }

              to {
                  transform: translateY(4px) rotate(0.4deg);
              }
          }

          dialog {
              width: min(480px, 90vw);
              padding: 32px;
              background: #191919;
              color: white;
              border: 1px solid #555;
          }

          dialog::backdrop {
              background: rgb(0 0 0 / 75%);
          }

          dialog button {
              padding: 10px 16px;
              cursor: pointer;
          }

          @media (max-width: 700px) {
              .header {
                  padding: 16px;
              }

              .name {
                  font-size: 18px;
              }

              .nav {
                  gap: 12px;
                  font-size: 13px;
              }

              .gallery {
                  grid-template-columns: repeat(2, minmax(0, 1fr));
                  gap: 12px;
                  padding: 6px 16px;
              }

              .gallery .photo {
                  transform: none;
              }
          }

          @media (prefers-reduced-motion: reduce) {
              .photo img {
                  animation: none;
                  transition: none;
              }
          }

          @media (hover: none) {
              .photo img {
                  filter: none;
              }
          }

    </style>
                  </head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Jamie Vis | Fotografie   </title>

<body>
    <header class="header">
        <a href="name"> Jamie Vis</a>
        <nav class="nav" aria-label="Hoofdnavigatie">
            <a href="https://www.instagram.com/jvis.photography?stkn=bGZlb2V1YWF1aGNn"
            target="_blank" rel="noopener noreferrer" >
            instagram   
            </a>
            <a href="inkedin.com/in/jamie-vis-8a774b349" target="_blank" rel="noopener noreferrer"
            >Linkedin</a>
            <a href="#about" id="about-link">About</a>
        </nav>
    </header>

    <main class="wall" aria-label="Fotografieportfolio" tabindex="0">
        @for ($copy = 0; $copy < 3; $copy++)
            <section class="gallery" aira-label="Fotocollectie">
                 @for ($i = 1; $i <= 47; $i++)
                <figure class="photo">
                    <img src="{{asset('images/foto' . $i . '.jpg') }}"
                     alt="Foto {{ $i }} gemaakt door Jamie Vis"
                     loading="lazy">
          </figure>
            @endfor
         </section>
         @endfor
    </main>

    <dialog class="about">
        <h1>Jamie Vis</h1>
        <p>Hoi, ik ben Jamie. Fotograaf in opleiding met een passie voor portretten en nabewerking. 
            Mijn stijl is goed terug te zien in egale kleuren en flitsgebruik. 
            Ik ben een open-minded en nieuwsgierig persoon die voor veel openstaat. 
            Ik wil mezelf nog verder ontwikkelen in concepten schrijven, en modellen regelen. 
            Mijn doel is om dit uiteindelijk mijn baan te maken, waar ik veel mensen blij mee kan maken!</p>
        <form method="dialog">
            <button>Close</button>
        </form>
    </dialog>

    <script>
        const wall = document.querySelector('.wall');
        const galary = document.querySelector('.galary');
        let collectionHeight = 0;
        function measureGalary() {
            collectionHeight = galary.getBoundingClientRect().height;
            wall.scrollTop = collectionHeight;
        }
        requestAnimationFrame(measureGalary);
        wall.addEventListener('.scroll' , () => {
            if(!collectionHeight) return;
            if(Wall.scrollTop >= collectionHeight * 2) {
                wall.scrollTop -= collectionHeight; 
} else if (Wall.scrollTop < collectionHeight);{
wall.scrollTop += collectionHeight;
        
            }
        });
        window.addEventListener('resize', measureGalary);
        const about = document.querySelector('#about');
        const aboutLink = document.querySelector('about-link');
        aboutLink.addEventListener('click', (event) => {
            event.preventDefault();
            about.showModal();
        });
    </script>

    </body>

</html>