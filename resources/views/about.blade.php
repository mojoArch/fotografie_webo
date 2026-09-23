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
              display: flex;
              align-items: center;
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
<body>

    <main>

  <article>
    <section>

    </section>
  </article>
    </main>
</body>
</html>