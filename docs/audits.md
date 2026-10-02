# Audits

Read on demand. Write audit scripts to the scratchpad, never into the project. Report findings
as a list; fix only what the user approves.

## Translation audit

Goal: find content the visitor sees in the wrong language.

1. For every page, pair `<template>.<lang>.txt` with the default-language file. Flag missing
   translation files (pages, error page, popup).
2. Parse fields recursively — blocks are JSON, objects/structures are YAML — and compare leaf
   values with the default language. Flag:
   - **empty** in the translation but filled in the default language;
   - **identical** to the default language (skip names, URLs, emails, numbers, file refs, toggles);
   - **wrong language** per paragraph (stopword heuristic per language). Exclude words that are
     also proper names (e.g. "Van", "de" in "Van Halteren") or you'll get false positives.
3. Also check: SEO title templates and descriptions per language, page titles vs slugs, site
   contact fields (street/city/VAT label), and swapped values (the default language containing
   another language's text).
4. Check code too: hardcoded strings in templates/snippets/plugins that bypass `t()`.
5. Re-run after fixes; content may also have changed in the Panel meanwhile.

## SEO audit

The dev site is `noindex` and kirby-seo hides canonical/hreflang/sitemap on non-indexable pages,
so audit in two passes.

**Pass 1 — crawl the dev site** (every language, from each language home), per page:
- status code; `<title>`; meta description (unique per page?); exactly one H1;
- `og:title` / `og:description` / `og:image`; JSON-LD present and valid JSON;
- image `alt` texts; empty `href=""`; `http://` references;
- every internal link and asset → status (thumbnails: use **GET**, they're generated on first GET;
  decode HTML entities in `href`s before following them).

**Pass 2 — render as production** with debug off, e.g. a PHP CLI script that sets `HTTP_HOST`,
`HTTPS`, `REQUEST_URI`, boots Kirby with `['debug' => false, 'url' => 'https://<prod domain>']`
and prints `$kirby->render($path)->body()`. Check:
- `robots` = index; canonical; hreflang for every language + `x-default`; `og:url`, `og:locale`;
- `sitemap.xml`: all pages + language alternates, no empty container pages, no error/popup pages;
- `robots.txt` points to the production sitemap.

**Production readiness** (same session): see `docs/go-live-checklist.md`.
