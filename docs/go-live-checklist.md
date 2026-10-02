# Go-live checklist

Read before a production deploy. Report each item as done / not done / not applicable — several
are decisions for the user or client, not for the agent.

## Configuration

- [ ] `debug => false` on production (with debug on, kirby-seo noindexes the whole site and
      visitors see Whoops error pages with internal details).
- [ ] Kirby licence activated for the production domain.
- [ ] `canonicalBase` / SEO base URL set to the production domain.
- [ ] Test keys (Turnstile, reCAPTCHA, payment…) swapped for production keys; production
      hostnames added to every allow-list (e.g. Turnstile `hostnames`).
- [ ] Placeholders gone: tracking IDs, status-route secrets, site title ("PLUG CMS"), popup text,
      form recipients that point to a Plug developer.

## Server

- [ ] Production PHP version supported by this Kirby version; required extensions present
      ([gd/imagick, sodium, curl, mbstring…]).
- [ ] Production PHP limits (e.g. `memory_limit`) sufficient for generating thumbnails from the
      largest originals; decide whether `media/` is copied or regenerated.
- [ ] HTTPS enforced; www/non-www redirect chosen.
- [ ] Security headers: HSTS, `X-Frame-Options` or CSP `frame-ancestors`, `Referrer-Policy`,
      `X-Content-Type-Options`; server version not exposed.
- [ ] `content/`, `site/`, `kirby/`, `.git/`, `.env`, logs not reachable over HTTP (expect 404/403).

## SEO & tracking

- [ ] Rendered with debug off: `robots` = index, canonical + hreflang present, sitemap filled
      (see `docs/audits.md`).
- [ ] `og:image` set (site default), share title isn't "Home".
- [ ] Analytics ID confirmed with the client (existing property = keeps history), consent-gated.
- [ ] Privacy/cookie policy mentions every third-party tool (analytics, Turnstile, fonts, maps…).
- [ ] Dev domains still `noindex`.

## Assets & content

- [ ] Compiled CSS/JS rebuilt with Prepros; cache-buster (`timestamp`) bumped in the Panel.
- [ ] Favicons (incl. root `/favicon.ico`) and Apple touch icon in place.
- [ ] Translation audit done (`docs/audits.md`); 404 page exists in every language.
- [ ] No test content left (placeholder texts, test pages, test form entries in `site/logs`).
