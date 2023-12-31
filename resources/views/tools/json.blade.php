
<!doctype html>
<!-- - - - - - - - - - -->
<!-- Pretty Print JSON -->
<!-- - - - - - - - - - -->
<html lang=en>
<head>
   <meta charset=utf-8>
   <meta name=viewport                   content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name=robots                     content="index, follow">
   <meta name=description                content="Pretty-Print JSON -- Interactive online JavaScript tool to format JSON">
   <meta name=apple-mobile-web-app-title content="JSON">
   <meta property=og:title               content="Pretty Print JSON">
   <meta property=og:description         content="Pretty-print JSON data into HTML to indent and colorize (written in functional TypeScript)">
   <meta property=og:type                content="website">
   <meta property=og:image               content="https://centerkey.com/graphics/center-key-logo-card.png">
   <meta property=og:image:alt           content="Logo">
   <title>{{$title}}</title>
   <link rel=icon             href=https://centerkey.com/graphics/bookmark.png>
   <link rel=apple-touch-icon href=https://centerkey.com/graphics/mobile-home-screen.png>
   <link rel=preconnect       href=https://fonts.googleapis.com>
   <link rel=preconnect       href=https://fonts.gstatic.com crossorigin>
   <link rel=stylesheet       href=https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4/css/all.min.css>
   <link rel=stylesheet       href=https://cdn.jsdelivr.net/npm/pretty-print-json@2.0/dist/css/pretty-print-json.css>
   <link rel=stylesheet       href=https://cdn.jsdelivr.net/npm/dna-engine@2.3/dist/dna-engine.css>
   <link rel=stylesheet       href=https://cdn.jsdelivr.net/npm/web-ignition@1.7/dist/reset.min.css>
   <style>
      body {
         max-width: 1200px;
         color: whitesmoke;
         background-color: black;
         }
      body >header {
         margin-bottom: 40px;
         }
      body >header >figure {
         font-size: 3rem;
         }
      body >footer b {
         font-size: 1.1rem;
         }
      body >footer p a+a {
         margin-left: 10px;
         }
      .popup-anchor {
         position: relative;
         }
      .popup-anchor >span+label {
         position: absolute;
         top: -1.5em;
         left: 4.0em;
         font-size: 1rem;
         font-weight: lighter;
         white-space: nowrap;
         color: white;
         background-color: slateblue;
         border-radius: 5em;
         padding: 10px 25px;
         visibility: hidden;
         opacity: 0;
         transition: all 800ms;
         }
      .popup-anchor >span+label a {
         font-weight: bold;
         }
      .popup-anchor >span:hover+label,
      .popup-anchor >span+label:hover {
         visibility: visible;
         opacity: 1;
         }
   </style>
   <style>
      [data-component=pretty-print] >section {
         position: relative;
         max-width: 50%;
         }
      [data-component=pretty-print] >section >header {
         display: flex;
         justify-content: space-between;
         column-gap: 20px;
         margin-bottom: 3px;
         }
      [data-component=pretty-print] >section >header i.font-icon {
         font-size: 1.4rem;
         color: lightskyblue;
         padding: 10px;  /* enlarge click target */
         margin: -10px;  /* enlarge click target */
         }
      [data-component=pretty-print] >section:first-child >textarea {
         max-width: none;
         min-height: 300px;
         font-family: monospace;
         color: navy;
         background-color: white;
         transition: background-color 400ms;
         padding: 10px 15px;
         margin: 0px;
         }
      [data-component=pretty-print].dark-mode >section:first-child >textarea {
         background-color: gainsboro;
         }
      [data-component=pretty-print].invalid-json >section:first-child >textarea {
         background-color: pink;
         }
      [data-component=pretty-print] >section:first-child #error-message {
         font-size: 1.2rem;
         font-weight: bold;
         text-align: center;
         text-shadow: 0px 0px 0.1em white;
         color: crimson;
         padding-top: 3px;
         opacity: 0;
         transition: opacity 800ms;
         }
      [data-component=pretty-print].invalid-json >section:first-child #error-message {
         opacity: 1;
         }
      [data-component=pretty-print] >section:first-child >fieldset {
         display: flex;
         gap: 15px;
         max-width: none;
         margin-bottom: 5px;
         }
      [data-component=pretty-print] >section:first-child >fieldset >input {
         flex: 1;
         max-width: none;
         font-size: 1rem;
         background-color: aliceblue;
         margin: 0px;
         }
      [data-component=pretty-print] >section:first-child >a {
         font-size: 0.9rem;
         }
      [data-component=pretty-print] >section:last-child >div {
         min-height: 350px;
         background-color: white;
         border: 5px solid silver;
         padding: 5px 10px;
         transition: background-color 400ms;
         overflow: scroll;
         }
      [data-component=pretty-print].line-numbers >section:last-child >div {
         padding: 0px;
         }
      [data-component=pretty-print].dark-mode >section:last-child >div {
         background-color: black;
         }
      [data-component=pretty-print] >section:last-child >div >output {
         display: block;
         white-space: pre;  /* replaces <pre> in order to support toggling line numbers */
         margin: 0px;
         }
      [data-component=pretty-print].line-numbers >section:last-child >div >output {
         white-space: normal;
         }
      [data-component=pretty-print] >section:last-child >nav {
         display: flex;
         justify-content: space-between;
         column-gap: 10px;
         color: silver;
         padding-top: 3px;
         }
      [data-component=pretty-print] >section:last-child >nav >label >input {
         margin: 0px 8px 0px 0px;
         }
      @media (max-width: 667px) {  /* selects iPhone 6/6s/7/8/SE2/SE3 landscape and anything narrower */
         [data-component=pretty-print] >section { max-width: none; }
         [data-component=pretty-print] >section:first-child >textarea { min-height: 150px; }
         [data-component=pretty-print] >section:last-child >div { min-height: 200px; }
         }
   </style>
   <script defer src=https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js></script>
   <script defer src=https://cdn.jsdelivr.net/npm/pretty-print-json@2.0/dist/pretty-print-json.min.js></script>
   <script defer src=https://cdn.jsdelivr.net/npm/fetch-json@3.1/dist/fetch-json.min.js></script>
   <script defer src=https://cdn.jsdelivr.net/npm/dna-engine@2.3/dist/dna-engine.min.js></script>
   <script defer src=https://cdn.jsdelivr.net/npm/web-ignition@1.7/dist/lib-x.min.js></script>
   <script data-on-load=app.setup data-wait-for=libX>
      const app = {
         processJson(target, event, component) {
            const elem = component.data().elem;
            const options = {
               lineNumbers:   elem.option.numbers.is(':checked'),
               quoteKeys:     elem.option.keys.is(':checked'),
               trailingComma: elem.option.commas.is(':checked'),
               };
            component.toggleClass('line-numbers', options.lineNumbers);
            component.removeClass('invalid-json');
            try {
               const data = elem.textarea.val().trim().length ? JSON.parse(elem.textarea.val()) : null;
               const html = data ? prettyPrintJson.toHtml(data, options) : '[EMPTY]';
               elem.output.html(html);
               }
            catch (e) {
               globalThis.setTimeout(() => component.addClass('invalid-json'), 400);
               }
            },
         showExampleUrl(icon, event, component) {
            const exampleUrls = [
               'https://official-joke-api.appspot.com/random_joke',
               'https://yesno.wtf/api',
               'https://dna-engine.org/api/books/',
               'https://api.plos.org/search?q=title:DNA',
               'https://httpbin.org/get',
               'https://swapi.py4e.com/api/starships/',
               'https://www.googleapis.com/books/v1/volumes?q=spacex',
               'https://api.github.com/repos/center-key/pretty-print-json/contributors',
               ];
            component.data().currentExample = ((component.data().currentExample ?? -1) + 1) % exampleUrls.length;
            const elem = component.data().elem;
            libX.animate.jiggleIt(icon);
            elem.url.val(exampleUrls[component.data().currentExample]);
            },
         fetchData(target, event, component) {
            const elem = component.data().elem;
            const url =  elem.url.val().trim();
            const link = 'https://pretty-print-json.js.org/?url=' + url;
            elem.fetch.disable();
            const handleData = (data) => {
               elem.link.attr('href', link).text(link);
               elem.textarea.val(JSON.stringify(data, null, 3)).trigger('change');
               elem.fetch.enable();
               };
            globalThis.fetchJson.get(url)
               .then(handleData)
               .catch(error => handleData({ url: url, error: error.message }));
            },
         copyToClipboard(icon, event, component) {
            const elem =      component.data().elem;
            const selection = globalThis.getSelection();
            const range =     document.createRange();
            libX.animate.jiggleIt(icon);
            range.selectNode(elem.output[0]);
            selection.empty();
            selection.addRange(range);
            document.execCommand('copy');
            },
         toggleDarkMode(target, event, component) {
            component.toggleClass('dark-mode', target.is(':checked'));
            },
         setup() {
            const component = $('[data-component=pretty-print]');
            const elem = {
               textarea: component.find('>section >textarea'),
               message:  component.find('>section >#error-message'),
               url:      component.find('>section >fieldset >input'),
               fetch:    component.find('>section >fieldset >button'),
               link:     component.find('>section >a'),
               output:   component.find('>section >div >output'),
               option: {
                  numbers: component.find('>section >nav input[type=checkbox]#numbers'),
                  keys:    component.find('>section >nav input[type=checkbox]#keys'),
                  commas:  component.find('>section >nav input[type=checkbox]#commas'),
                  dark:    component.find('>section >nav input[type=checkbox]#dark'),
                  },
               };
            component.data().elem = elem;
            const intro = {
               message:  'Put some JSON in the text box.',
               error:    null,
               year:     new Date().getFullYear(),
               mobile:   libX.browser.userAgentData().mobile,
               platform: libX.browser.userAgentData().platform,
               space:    '🪐🚀✨',
               fancy:    'https://json5.org/?' + Date.now() % 20,
               };
            const url = new URLSearchParams(globalThis.location.search).get('url');
            elem.url.val(url);
            if (url)
               elem.fetch.click();
            else
               elem.textarea.val(JSON.stringify(intro)).trigger('change');
            elem.option.commas.click();  //turn on trailing commas
            if (globalThis.matchMedia?.('(prefers-color-scheme: dark)').matches)
               elem.option.dark.click();  //turn on dark mode
            $('.version-number').text(prettyPrintJson.version);
            },
         };
   </script>
</head>
<body>

<header>
    <a href="/dashboard" style="text-decoration:none;font-size:40px">👈 Back</a>
   <figure>🦋</figure>
   <h1>Pretty-Print JSON</h1>
   <h2>Interactive online tool to format JSON</h2>
</header>

<main>
   <div data-component=pretty-print class=flex-columns>
      <section>
         <header>
            <h3>JSON input:</h3>
         </header>
         <textarea data-smart-update=app.processJson placeholder="Enter some JSON" autofocus></textarea>
         <p id=error-message>Invalid JSON</p>
         <header>
            <h3 class=popup-anchor>
               <span>JSON REST endpoint URL:</span>
               <label>
                  Powered by:
                  <a href=https://github.com/center-key/fetch-json#readme class=external-site>fetch-json</a>
               </label>
            </h3>
            <i data-icon=wand-magic-sparkles data-click=app.showExampleUrl></i>
         </header>
         <fieldset>
            <input type=text>
            <button data-click=app.fetchData>Fetch Data</button>
         </fieldset>
         <a href=#></a>&nbsp;
      </section>
      <section>
         <header>
            <h3>Color output:</h3>
            <i data-icon=copy data-click=app.copyToClipboard></i>
         </header>
         <div>
            <output class=json-container></output>
         </div>
         <nav>
            <label><input id=numbers type=checkbox data-change=app.processJson>line numbers</label>
            <label><input id=keys    type=checkbox data-change=app.processJson>quote keys</label>
            <label><input id=commas  type=checkbox data-change=app.processJson>trailing commas</label>
            <label><input id=dark    type=checkbox data-change=app.toggleDarkMode>dark mode</label>
         </nav>
      </section>
   </div>
</main>



</body>
</html>
