<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Jamie Vis</title>
     <style>
          * {
              box-sizing: border-box;
          }

          body {
              margin: 0;
              background: #000;
              color: #fff;
              font-family: Arial, Helvetica, sans-serif;
          }

          header {
              padding: 24px;
          }

          a {
              color: inherit;
              text-decoration: none;
          }

          a:hover {
              text-decoration: underline;
          }

          main {
      min-height: 80vh;
      display: grid;
      grid-template-columns: minmax(0, 1.3fr) minmax(0, 1fr);
      align-items: center;
      gap: clamp(32px, 6vw, 100px);
      padding: 24px;
  }

          h1 {
              margin: 0;
              font-family: "Arial Black", Arial, sans-serif;
              font-size: clamp(64px, 17vw, 280px);
              font-weight: 900;
              line-height: 0.85;
              letter-spacing: -0.06em;
              text-transform: uppercase;
          }
            body {
      overflow-x: hidden;
  }

  h1 span {
      display: block;
  }

  .about-text {
      max-width: 480px;
  }

  .about-text h2 {
      margin: 0 0 24px;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      color: #999;
  }

  .about-text p {
      margin: 0 0 20px;
      font-size: clamp(18px, 1.6vw, 24px);
      line-height: 1.6;
      color: #ddd;
  }

  @media (max-width: 800px) {
      main {
          grid-template-columns: 1fr;
          gap: 48px;
          padding: 40px 24px;
      }
  }
      </style>
</head>
     <header>
          <a href="/">Photography | Gallery</a>
      </header>


  <main>
      <h1>
          <span class="first-name">Jamie</span>
          <span class="last-name">Vis</span>
      </h1>

      <section class="about-text" aria-labelledby="about-title">
          <h2 id="about-title">Over mij</h2>

          <p>
              
Hoi, ik ben Jamie. Fotograaf in opleiding met een passie voor portretten en nabewerking. 
Mijn stijl is goed terug te zien in egale kleuren en flitsgebruik. 
Ik ben een open-minded en nieuwsgierig persoon die voor veel openstaat. 

          </p>

          <p>
Ik wil mezelf nog verder ontwikkelen in concepten schrijven, en modellen regelen. 
Mijn doel is om dit uiteindelijk mijn baan te maken, waar ik veel mensen blij mee kan maken.
Interesse? Stuur gerust een berichtje!
          </p>
      </section>
  </main>

      <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>

      <script>
          if (
              window.gsap &&
              !window.matchMedia('(prefers-reduced-motion: reduce)').matches
          ) {
              const timeline = gsap.timeline({
                  defaults: {
                      duration: 1.8,
                      ease: 'power3.out'
                  }
              });

              timeline.from('.first-name', {
                  x: () => window.innerWidth,
                  opacity: 0
              });

              timeline.from('.last-name', {
                  x: () => -window.innerWidth,
                  opacity: 0
              }, 0);
          }
      </script>

</html>