# AGENT.md

Project instructions for AI coding agents. **Boilerplate for Plug Kirby projects** — fill in
every `<!-- PROJECT -->` section and `[bracketed]` part, delete what doesn't apply, and let the
"Known issues" and "Known bugs" logs start empty. Keep this file short; long procedures live in
`docs/` and are read **on demand** (linked, not `@`-imported, so they don't load into every
session). `CLAUDE.md` contains only `@AGENT.md`. Some tools look for `AGENTS.md` — symlink if so.

## First session on a new project

If the `<!-- PROJECT -->` sections below are still placeholders, do this before any task:

1. Analyse the repo: Kirby version (`kirby/composer.json`), languages (`site/languages`),
   blueprints, templates, `snippets/blocks`, Sass/JS entry points, build config, `site/config`,
   and every plugin (git submodule, copied vendor code, or Plug in-house — see "Plugins").
2. Find out how the site is served (vhost, preview server, PHP binary) and which hosts exist.
3. Propose the filled-in sections as a plan. Write them only after approval.
4. List anything broken or unwired under "Known issues" — don't fix it in passing.

## Project <!-- PROJECT -->

- Client / site: [ ] · built and maintained by Plug Branding Agency
- Stack: Kirby [5.x] (`kirby/` as [submodule|composer]) · PHP [8.x] · Sass · vanilla JS + GSAP · Prepros
- Languages: [`nl` default at `/`, `fr` at `/fr`, `en` at `/en`] · Panel/blueprint labels in [Dutch]
- Hosts: dev [ ] · production [ ] ([same|different] server)
- Design source: [Figma link] · Content tracked in git: [yes|no — if no, never bulk-edit `content/`]

Key locations (keep it short — a full tree drifts): `site/blueprints/` field schemas ·
`site/snippets/blocks/` one `.php` per block · `site/snippets/components/` reusable partials ·
`assets/sass/` source styles · `assets/js/` source scripts · compiled output in
[`assets/css/style.css`, `assets/js/min/`] · `kirby/` core, never edited.

## Architecture <!-- PROJECT: confirm against the repo -->

**Blocks (Plug starterkit pattern).** The **fieldset key** in
`site/blueprints/sections/components.yml` is the block `type`, and templates render
`snippet('blocks/' . $block->type())` — so the snippet is named after the key, **not** the
`.yml` file. Never rename a key: content stores the type string. A new block touches 5 places:
`sections/components/<name>.yml` → key in `components.yml` → `snippets/blocks/<key>.php` →
`sass/blocks/_<name>.scss` → `@import` in `style.scss`. Field first in the `.yml`, then in the `.php`.

Conventions: block data is `$data`, structure items `$item` · root
`<section class="<block>" style="--spacetop: …; --spacebottom: …">` + `<block>-inner` +
`<block>-<part>` children · `spacetop`/`spacebottom` radios become CSS vars
(`calc(rem(180px) * var(--spacetop))`) · an "Instellingen" headline separates settings · nested
guards (`if (!$x->isEmpty())` → `if ($o = $x->toObject())`) · `->kt()` for textareas · numeric
field suffixes (`title1`, `body1`, `btn1`).

| Fieldset key | Schema | Snippet | Sass | Notes |
|---|---|---|---|---|
| [ ] | [ ] | [ ] | [ ] | [ ] |

Templates: [table: blueprint → template → notes]. Site-level fields: [list]. If the site uses a
`timestamp` field as `?v=` cache-buster on CSS/JS, tell the user to bump it after deploying.

## Core rules

- Read the existing code (blueprint, snippet, Sass partial) before changing it. Never guess
  field names, class names or markup.
- Preserve architecture, naming and conventions unless asked to refactor.
- Make the smallest coherent change. No unrelated refactors inside a feature or fix.
- Reuse existing components/partials/modules before creating new files.
- Never invent functions, env vars, routes, fields, translation keys or config values. A missing
  field → add it to the blueprint and wire it through; anything else → ask.
- Don't edit `kirby/`, third-party plugins, or compiled CSS/JS. Plug in-house plugins may be
  changed, backwards compatibly (they're shared across projects).
- Keep behaviour changes and visual changes separate where practical.
- **Don't "fix" something that merely looks unusual.** If a task is scoped to one thing, list
  adjacent problems instead of fixing them. A design that looks redundant may be final.
- Don't change real content to test — simulate in the DOM, or say what you changed and back it up.
- Accessibility basics: respect `prefers-reduced-motion`, keep focus visible, give links and
  buttons an explicit colour and an accessible name (icon-only → `aria-label`).
- Secrets and keys stay where the project keeps them; never print them in chat or commit messages.

## Workflow

1. **Inspect** the relevant code first — and check "Known issues" before assuming something works.
2. **Pick the smallest safe change.** Check whether the thing already exists half-built.
3. **Preserve behaviour outside the request.** Report side-finds; don't fold them in.
4. **Follow conventions** from sibling files.
5. **Verify** (next section) — not optional.
6. **Call out** what the user needs to know: new CMS fields or translation keys needing content,
   design discrepancies, out-of-scope bugs found, cache-buster bumps, anything not verified.

**Definition of done:** recompiled · console clean · checked at desktop, tablet and phone ·
every language checked if text changed · reduced-motion respected · hover/focus states present ·
no horizontal overflow · bug-log entry added if the cause wasn't obvious · side-finds reported.

## Build & environment <!-- PROJECT: confirm -->

Developers build with **Prepros** (`prepros.config`). Without it, stand-ins (not identical
output — say you used them):
`npx sass --no-source-map assets/sass/style.scss assets/css/style.css` ·
`npx esbuild assets/js/scripts.js --bundle --format=iife --minify --outfile=assets/js/min/scripts.min.js`.
Vendor JS (GSAP, Swiper, Fancybox…) are globals loaded via `<script>` tags — don't `import` them.

Site served at [dev URL] by [Apache vhost | preview server]. Use PHP [`php8.x`] explicitly if the
CLI default is older (`php8.x -l file.php`). [Git: `git -c safe.directory=<root>` if ownership
differs.] Ignore and never commit `@eaDir/`, `*@SynoEAStream`, `.DS_Store`.

## Testing & verification

No automated tests — browser verification is the test suite.

1. Recompile before testing, then hard-reload (the `?v=` cache-buster doesn't change on rebuild).
2. Open a page that really exercises the change: `grep -rl '"type":"<block>"' content`. Not just home.
3. Read console errors before trusting any visual; with `debug` on, PHP errors render as Whoops.
4. Assert DOM/computed state (`getComputedStyle`, classes, counts, `scrollWidth > innerWidth`).
5. Simulate gated paths (form errors, toggles, lightboxes, scroll thresholds). No content for a
   path → say so and inject it into the DOM.
6. When no browser is available, verify with `curl` + parsing, a PHP CLI render of the page, or
   Node with stubbed DOM — and state clearly what was **not** checked visually.
7. Never report "works" without having exercised it.

## CSS / SCSS conventions

**Desktop-first.** Base styles are the desktop design; scale down with `@include tablet`
(max-width [1000px]), then `@include phone` (max-width [650px]). They overlap, so write them in
that order. [A `desktop` (max-width [1300px]) mixin may exist — use it only where siblings do.]

Breakpoints sit **directly under their element's own properties, before child selectors**:

```scss
.card {
    padding: rem(40px);

    @include tablet { padding: rem(25px); }
    @include phone { width: auto; }

    &-title {
        font-size: $text-lg;

        @include phone { font-size: $text-base; }
    }
}
```

- To change a child at a breakpoint, put the `@include` inside that child.
- Equal specificity → **source order decides**, even inside a matching `@media`.
- Never edit `abstracts/` (variables, mixins, functions) without asking. Use `rem()` and the
  size variables; round font sizes **down** to the nearest existing variable.
- Don't mass-refactor old files to this layout; apply it to code you write or edit.

## Animations (GSAP + ScrollTrigger) <!-- if used -->

- Pre-hide before first paint: an inline `<script>` at the top of `<head>` adds `js-anim` to
  `<html>`; CSS scoped to `.js-anim` hides exactly what the script animates. Same script:
  `history.scrollRestoration = 'manual'`.
- **Never `gsap.from()` for reveals** — use `gsap.set(hidden)` then `gsap.to(visible)`.
- Hero: one-shot timeline on load; the rest: ScrollTrigger. Skip all under `prefers-reduced-motion`.
- Verify by jumping to `.progress(1)` and asserting styles.

## Kirby & plugin gotchas

- **Typos don't error:** unknown fields return an empty field and unknown field *methods* return
  the field itself (`$f->issEmpty()` is silently truthy).
- **Slugs are translated:** identify pages with `$page->uid()`/`id()`, never `slug()`.
  `page('id')` lookups are language-independent; keep them null-safe.
- `t()` falls back to Kirby core's Panel translations (`back`…) — check before adding a key.
- KirbyTag/kirbytext HTML must be **one line**: Markdown runs after tags and escapes multi-line HTML.
- A missing URL under `/fr/…` renders the **default-language** error page (core fallback route).
- File meta (alt texts) lives in the default-language `.txt`; other languages fall back to it.
- `$site->url()` is language-aware — use it for "home" links (logo), never `href=""`.
- Thumbnails are generated lazily on the first **GET** of a `/media/…` URL (HEAD returns 404).
- **kirby-seo:** `robots.index` defaults to `!debug` → **debug on = whole site noindexed**, empty
  sitemap, no canonical/hreflang. Schema output needs optional `spatie/schema-org` (else silently empty).

## Translations

- Every UI string via `t('key')`, added to **all** `site/languages/*.php`. Ask for copy in other
  languages rather than machine-translating legal or marketing text.
- Blueprint labels stay in the Panel language of that file.
- Translation audit: `docs/audits.md`.

## Forms (Kirby Uniform)

- One handler per form (rules, `emailAction`, `logAction`) + one `POST` route; markup `action`
  is the **fixed route** (`url('contact')`), never `$page->url()` (a block renders on many pages;
  Kirby answers the page with a 200 and the JS thinks it succeeded).
- Always `csrf_field()` + honeypot (hidden via CSS). One reusable JS submit helper, initialised
  only if the form exists. Test error paths with an **empty** field.
- Don't change validation rules or recipients unasked. Never log raw payloads or tokens.

## Plugins <!-- PROJECT: mark which are installed -->

Plug in-house (editable, backwards compatible): `plug-columns`, `plug-readmore`,
`plug-escapekirbytags`, `plug-panelforms`, `plug-emailreveal` (read its README; never output a
protected address directly). Third-party (never edited): [kirby-seo, kirby-uniform, retour,
content-translator, …] — note per plugin whether it's a submodule or copied code.

## External integrations, consent & secrets

- Keys live in [`site/config/config.php`] — `.env` isn't used. Never invent a key or tracking ID; ask.
- **Tracking scripts are always consent-gated** (`type="text/plain" data-cookie-consent="tracking"`).
  Never paste a raw GA/GTM snippet ungated. Check the client's existing analytics property first.
- Third-party scripts load async; nothing core may depend on them.
- Before a new outbound API call, check for a plugin that already wraps it.

## SEO

- Each page: one H1, own title + description, alt texts from the Panel, canonical + hreflang
  (all languages + `x-default`), `og:image`. Dev domains are `noindex`.
- The dev site hides most SEO output — audit by rendering as production with debug off:
  `docs/audits.md`. Before go-live: `docs/go-live-checklist.md`.

## Design references (Figma)

- Use dev mode (`get_design_context`, `get_screenshot`) — don't eyeball. A node may be a
  background layer; check parent and siblings. Trust rendered text/geometry over layer names.
- Reuse exported assets already in the codebase. State judgement calls and why.

## Known pitfalls

- Sticky header flickers near the top → `overflow-anchor: none` on **`html`** (not the header).
- `<a>` needs an explicit `color`. A generic `.btn:hover` can tie with a context override —
  add `&:hover` wherever a component overrides the button background.
- `:last-child`/`:nth-child` can't mean "last in its column" in a column-flow grid.
- Negative-margin overlaps must be scoped (`.media + .content`) so variants without media don't break.
- Favicons: also replace root `/favicon.ico`; the Apple touch icon needs an opaque background.
- Counters/`::before` numbering: reset the counter on the list wrapper, not the item.

## Environment / tool quirks (not bugs)

- Browser panes may report `document.hidden === true` → GSAP pauses; use `.progress(1)`.
- `:hover` doesn't persist between tool calls — verify the compiled CSS instead.
- Blank screenshots: retry once, then verify via DOM geometry and say so.
- Crawlers that don't decode HTML entities misread `esc('attr')`-encoded `href`s (`https&#x3a;…`).

## Known issues & unwired code <!-- PROJECT — starts empty -->

## Known bugs & fixes <!-- PROJECT — starts empty -->

Format: **Symptom** (what was observed) · **Root cause** (the specific mechanism) · **Fix** (why
it's right; note attempts that didn't work) · **File(s)**. Log non-obvious causes, failed first
attempts, anything a future "smallest change" could re-introduce, and tool quirks that look like
bugs. Not typos or self-evident one-liners. Remove the matching "Known issues" line once fixed;
delete entries that go stale.

## When blocked

A needed field, variable, snippet, key or config value doesn't exist and isn't clearly implied
→ stop and ask — especially for `abstracts/`, `site/config/` and anything secret.
