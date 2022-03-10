@section('head')
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <title>Real Home | @yield('page-name')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/landing/favicon.png') }}" rel='shortcut icon' type='image/x-icon' />
    <link href="{{ asset('assets/landing/apple-touch-icon.png') }}" rel='apple-touch-icon-precomposed' />
    <link href="{{ asset('assets/landing/apple-touch-icon-114x114.png') }}" sizes='114x114'
        rel='apple-touch-icon-precomposed' />
    <link href="{{ asset('assets/landing/apple-touch-icon-72x72.png') }}" sizes='72x72'
        rel='apple-touch-icon-precomposed' />
    <link href="{{ asset('assets/landing/apple-touch-icon-144x144.png') }}" sizes='144x144'
        rel='apple-touch-icon-precomposed' />
    <meta name='robots' content='max-image-preview:large' />
    <script type="application/ld+json" class="aioseo-schema">
        {
            "@context": "https:\/\/schema.org",
            "@graph": [{
                "@type": "WebSite",
                "@id": "https:\/\/dtrealproperty.wpengine.com\/#website",
                "url": "https:\/\/dtrealproperty.wpengine.com\/",
                "name": "Real Home",
                "description": "Just another WordPress site",
                "publisher": {
                    "@id": "https:\/\/dtrealproperty.wpengine.com\/#organization"
                }
            }, {
                "@type": "Organization",
                "@id": "https:\/\/dtrealproperty.wpengine.com\/#organization",
                "name": "Real Home",
                "url": "https:\/\/dtrealproperty.wpengine.com\/"
            }, {
                "@type": "BreadcrumbList",
                "@id": "https:\/\/dtrealproperty.wpengine.com\/login\/#breadcrumblist",
                "itemListElement": [{
                    "@type": "ListItem",
                    "@id": "https:\/\/dtrealproperty.wpengine.com\/#listItem",
                    "position": 1,
                    "item": {
                        "@type": "WebPage",
                        "@id": "https:\/\/dtrealproperty.wpengine.com\/#item",
                        "name": "Home",
                        "description": "Real Property real estate WordPress theme comes built in with MLS listings plugin & agents module which helps in designing real estate site to stand out!",
                        "url": "https:\/\/dtrealproperty.wpengine.com\/"
                    },
                    "nextItem": "https:\/\/dtrealproperty.wpengine.com\/login\/#listItem"
                }, {
                    "@type": "ListItem",
                    "@id": "https:\/\/dtrealproperty.wpengine.com\/login\/#listItem",
                    "position": 2,
                    "item": {
                        "@type": "WebPage",
                        "@id": "https:\/\/dtrealproperty.wpengine.com\/login\/#item",
                        "name": "Login",
                        "description": "Username : test Password : test",
                        "url": "https:\/\/dtrealproperty.wpengine.com\/login\/"
                    },
                    "previousItem": "https:\/\/dtrealproperty.wpengine.com\/#listItem"
                }]
            }, {
                "@type": "WebPage",
                "@id": "https:\/\/dtrealproperty.wpengine.com\/login\/#webpage",
                "url": "https:\/\/dtrealproperty.wpengine.com\/login\/",
                "name": "Login | Real Home",
                "description": "Username : test Password : test",
                "inLanguage": "en-US",
                "isPartOf": {
                    "@id": "https:\/\/dtrealproperty.wpengine.com\/#website"
                },
                "breadcrumb": {
                    "@id": "https:\/\/dtrealproperty.wpengine.com\/login\/#breadcrumblist"
                },
                "datePublished": "2014-03-29T10:26:41+00:00",
                "dateModified": "2014-04-16T06:32:31+00:00"
            }]
        }

    </script>

    <link rel='dns-prefetch' href='https://maps.googleapis.com' />
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <link rel='stylesheet' id='custom-font-awesome-css'
        href='https://dtrealproperty.wpengine.com/wp-content/themes/realproperty/css/font-awesome.min.css?ver=3.0.2'
        type='text/css' media='all' />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style id='wp-block-library-theme-inline-css' type='text/css'>
        #start-resizable-editor-section {
            display: none
        }

        .wp-block-audio figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-code {
            font-family: Menlo, Consolas, monaco, monospace;
            color: #1e1e1e;
            padding: .8em 1em;
            border: 1px solid #ddd;
            border-radius: 4px
        }

        .wp-block-embed figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-image figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-pullquote {
            border-top: 4px solid;
            border-bottom: 4px solid;
            margin-bottom: 1.75em;
            color: currentColor
        }

        .wp-block-pullquote__citation,
        .wp-block-pullquote cite,
        .wp-block-pullquote footer {
            color: currentColor;
            text-transform: uppercase;
            font-size: .8125em;
            font-style: normal
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            position: relative;
            font-style: normal
        }

        .wp-block-quote.has-text-align-right {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote.has-text-align-center {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        .wp-block-group.has-background {
            padding: 1.25em 2.375em;
            margin-top: 0;
            margin-bottom: 0
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto;
            opacity: .4
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table thead {
            border-bottom: 3px solid
        }

        .wp-block-table tfoot {
            border-top: 3px solid
        }

        .wp-block-table td,
        .wp-block-table th {
            padding: .5em;
            border: 1px solid;
            word-break: normal
        }

        .wp-block-table figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-template-part.has-background {
            padding: 1.25em 2.375em;
            margin-top: 0;
            margin-bottom: 0
        }

        #end-resizable-editor-section {
            display: none
        }

    </style>

    <link rel='stylesheet' id='ls-google-fonts-css'
        href='https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900|Open+Sans:300|Indie+Flower:regular|Oswald:300,regular,700&#038;subset=latin,latin-ext'
        type='text/css' media='all' />

    <link rel='stylesheet' id='wpacu-combined-css-head-1' href='{{ asset('assets/landing/css/style.css') }}'
        type='text/css' media='all' />

    <style id='wp-block-library-theme-inline-css' type='text/css'>
        #start-resizable-editor-section {
            display: none
        }

        .wp-block-audio figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-code {
            font-family: Menlo, Consolas, monaco, monospace;
            color: #1e1e1e;
            padding: .8em 1em;
            border: 1px solid #ddd;
            border-radius: 4px
        }

        .wp-block-embed figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-image figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-pullquote {
            border-top: 4px solid;
            border-bottom: 4px solid;
            margin-bottom: 1.75em;
            color: currentColor
        }

        .wp-block-pullquote__citation,
        .wp-block-pullquote cite,
        .wp-block-pullquote footer {
            color: currentColor;
            text-transform: uppercase;
            font-size: .8125em;
            font-style: normal
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            position: relative;
            font-style: normal
        }

        .wp-block-quote.has-text-align-right {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote.has-text-align-center {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        .wp-block-group.has-background {
            padding: 1.25em 2.375em;
            margin-top: 0;
            margin-bottom: 0
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto;
            opacity: .4
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table thead {
            border-bottom: 3px solid
        }

        .wp-block-table tfoot {
            border-top: 3px solid
        }

        .wp-block-table td,
        .wp-block-table th {
            padding: .5em;
            border: 1px solid;
            word-break: normal
        }

        .wp-block-table figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-template-part.has-background {
            padding: 1.25em 2.375em;
            margin-top: 0;
            margin-bottom: 0
        }

        #end-resizable-editor-section {
            display: none
        }

    </style>

    <link rel='stylesheet' id='ls-google-fonts-css'
        href='https://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900|Open+Sans:300|Indie+Flower:regular|Oswald:300,regular,700&amp;subset=latin,latin-ext'
        type='text/css' media='all' />


    <link rel='stylesheet' id='realproperty-skin-css' href="{{ asset('assets/landing/css/property-skin.css') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='realproperty-print-css' href="{{ asset('assets/landing/css/property-print.css') }}"
        type='text/css' media='print' />

    <link rel='stylesheet' id='mytheme-google-fonts-css'
        href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        type='text/css' media='all' />

    <script type='text/javascript' src="{{ asset('assets/landing/js/jquery.min.js') }}" id='jquery-core-js'></script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/jquery-migrate.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/moxie.min.js') }}" id='moxiejs-js'></script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/plupload.min.js') }}" id='plupload-js'>
    </script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/layerslider.js') }}">
    </script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/greensock.js') }}">
    </script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/layerslider-transitions.js') }}">
    </script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/rbtools.min.js') }}" id='tp-tools-js'></script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/rs6.min.js') }}" id='revmin-js'></script>
    <script type='text/javascript' src="{{ asset('assets/landing/js/modernizer.min.js') }}" id='modernizr-js'></script>

    <script type="text/javascript">
        function setREVStartSize(e) {
            window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
            window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
            try {
                var pw = document.getElementById(e.c).parentNode.offsetWidth,
                    newh;
                pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
                e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
                e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
                e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
                e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
                e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
                e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
                e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
                if (e.layout === "fullscreen" || e.l === "fullscreen")
                    newh = Math.max(e.mh, window.RSIH);
                else {
                    e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                    for (var i in e.rl)
                        if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                    e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                    e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                    for (var i in e.rl)
                        if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];
                    var nl = new Array(e.rl.length),
                        ix = 0,
                        sl;
                    e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                    e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                    e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                    e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                    for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                    sl = nl[0];
                    for (var i in nl)
                        if (sl > nl[i] && nl[i] > 0) {
                            sl = nl[i];
                            ix = i
                        }
                    var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                    newh = (e.gh[ix] * m) + (e.tabh + e.thumbh)
                }
                if (window.rs_init_css === undefined) window.rs_init_css = document.head.appendChild(document.createElement(
                    "style"));
                document.getElementById(e.c).height = newh + "px";
                window.rs_init_css.innerHTML += "#" + e.c + "_wrapper { height: " + newh + "px }"
            } catch (e) {
                console.log("Failure at Presize of Slider:" + e)
            }
        }

        var APP_URL = "{{ config('app.url') }}";

    </script>
@show
