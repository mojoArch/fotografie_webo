<!DOCTYPE html>
  <html lang="nl">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{ $title }} | Jamie Vis</title>

      <style>
          * {
              box-sizing: border-box;
          }

          body {
              margin: 0;
              background: #cbc9c1;
              color: #171717;
              font-family: Arial, sans-serif;
          }

          a {
              color: inherit;
              text-decoration: none;
          }

          a:hover {
              text-decoration: underline;
          }

          header {
              display: flex;
              align-items: center;
              gap: 32px;
              padding: 24px 4vw;
              border-bottom: 1px solid #aaa89f;
          }

          .about-link {
              margin-left: auto;
          }

          main {
              padding: 64px 4vw;
          }

          .photo-layout {
              display: grid;
              grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
              align-items: start;
              gap: 32px;
          }

          figure {
              margin: 0;
          }

          figure img {
              display: block;
              width: 100%;
              height: auto;
          }

          figcaption {
              margin-top: 12px;
              font-size: 13px;
              color: #555;
          }

          dl {
              margin: 0;
              padding: 24px 0;
              border-top: 1px solid #aaa89f;
              border-bottom: 1px solid #aaa89f;
          }

          .detail-row {
              display: grid;
              grid-template-columns: 140px minmax(0, 1fr);
              gap: 20px;
              padding: 12px 0;
          }

          dt {
              color: #555;
          }

          dd {
              margin: 0;
          }

          h1 {
              margin: 64px 0 24px;
              font-family: Georgia, serif;
              font-size: clamp(64px, 12vw, 180px);
              font-weight: normal;
              line-height: 1;
              overflow-wrap: anywhere;
          }

          @media (max-width: 700px) {
              .photo-layout {
                  grid-template-columns: 1fr;
              }

              main {
                  padding-top: 32px;
              }
          }
      </style>
  </head>

  <body>
      <header>
          <a href="{{ url('/') }}">← Terug</a>
          <strong>JAMIE VIS</strong>
          <a class="about-link" href="{{ url('/about') }}">About</a>
      </header>

      <main>
          <div class="photo-layout">
              <figure>
                  <img
                      src="{{ asset($image) }}"
                      alt="{{ $title }} — fotografie van Jamie Vis"
                  >

                  <figcaption>
                      FOTO {{ $number }} VAN 53
                  </figcaption>
              </figure>

              <dl>
                  <div class="detail-row">
                      <dt>Fotograaf</dt>
                      <dd>Jamie Vis</dd>
                  </div>

                  <div class="detail-row">
                      <dt>Titel</dt>
                      <dd>{{ $title }}</dd>
                  </div>

                  <div class="detail-row">
                      <dt>Locatie</dt>
                      <dd>Nog invullen</dd>
                  </div>

                  <div class="detail-row">
                      <dt>Jaar</dt>
                      <dd>Nog invullen</dd>
                  </div>
              </dl>
          </div>

          <h1>{{ $title }}</h1>
      </main>
  </body>
  </html>