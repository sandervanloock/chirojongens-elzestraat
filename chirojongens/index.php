<?php
session_start();
$_SESSION['r'] = 1;
do {
  $r = rand(1, 13);
} while ($r == $_SESSION['r']);
$_SESSION['r'] = $r;
?>
<!DOCTYPE html>
<!--      _____                    _____                    _____                    _____                   _______
         /\    \                  /\    \                  /\    \                  /\    \                 /::\    \
        /::\    \                /::\____\                /::\    \                /::\    \               /::::\    \
       /::::\    \              /:::/    /                \:::\    \              /::::\    \             /::::::\    \
      /::::::\    \            /:::/    /                  \:::\    \            /::::::\    \           /::::::::\    \
     /:::/\:::\    \          /:::/    /                    \:::\    \          /:::/\:::\    \         /:::/~~\:::\    \
    /:::/  \:::\    \        /:::/____/                      \:::\    \        /:::/__\:::\    \       /:::/    \:::\    \
   /:::/    \:::\    \      /::::\    \                      /::::\    \      /::::\   \:::\    \     /:::/    / \:::\    \
  /:::/    / \:::\    \    /::::::\    \   _____    ____    /::::::\    \    /::::::\   \:::\    \   /:::/____/   \:::\____\
 /:::/    /   \:::\    \  /:::/\:::\    \ /\    \  /\   \  /:::/\:::\    \  /:::/\:::\   \:::\____\ |:::|    |     |:::|    |
/:::/____/     \:::\____\/:::/  \:::\    /::\____\/::\   \/:::/  \:::\____\/:::/  \:::\   \:::|    ||:::|____|     |:::|    |
\:::\    \      \::/    /\::/    \:::\  /:::/    /\:::\  /:::/    \::/    /\::/   |::::\  /:::|____| \:::\    \   /:::/    /
 \:::\    \      \/____/  \/____/ \:::\/:::/    /  \:::\/:::/    / \/____/  \/____|:::::\/:::/    /   \:::\    \ /:::/    /
  \:::\    \                       \::::::/    /    \::::::/    /                 |:::::::::/    /     \:::\    /:::/    /
   \:::\    \                       \::::/    /      \::::/____/                  |::|\::::/    /       \:::\__/:::/    /
    \:::\    \                      /:::/    /        \:::\    \                  |::| \::/____/         \::::::::/    /
     \:::\    \                    /:::/    /          \:::\    \                 |::|  ~|                \::::::/    /
      \:::\    \                  /:::/    /            \:::\    \                |::|   |                 \::::/    /
       \:::\____\                /:::/    /              \:::\____\               \::|   |                  \::/____/
        \::/    /                \::/    /                \::/    /                \:|   |                   ~~
         \/____/                  \/____/                  \/____/                  \|___|                              -->


<html lang="nl">

<head>
    <title>Chirojongens Elzestraat</title>
    <meta charset="utf-8">
    <meta content="#FF5252" name="theme-color"/><!-- verandert kleur adresbalk in chrome op android toestellen -->
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Chirojongens Elzestraat" name="description"/>
    <meta content="chirojongens, elzestraat, chiro" name="keywords"/>
    <meta content="Maxim Janssens" name="author"/>
    <script crossorigin="anonymous"
            integrity="sha256-aWXJZ/4kdONPAkoIYYyE6fmVw0gqPEbnk7nspLANguI="
            src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.all.min.js"></script>
    <script crossorigin="anonymous"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145860511-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-145860511-1');
    </script>

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/icomoon.css" rel="stylesheet">
    <link href="css/style.css?v=5" rel="stylesheet">
    <link href="images/chirologo.png" rel="icon">
    <style>
        video {
            width: 50%;
        }

        .googleCalendar {
            position: relative;
            min-height: 400px;
            width: 80%;
            padding-bottom: 50%;
        }

        .googleCalendar iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php" <?php if ($r == 1 || $r == 3 || $r == 6) {
                                                  echo "style=\"color:white;\"";
                                                } ?>>Chirojongens Elzestraat</a>
        <button aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
                data-target="#ftco-nav" data-toggle="collapse" type="button">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="#section-home" <?php if ($r == 1 || $r == 3 || $r == 6) {
                                                                                  echo "style=\"color:white;\"";
                                                                                } ?>>Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#section-groepen" <?php if ($r == 3 || $r == 5 || $r == 6 || $r == 11 || $r == 13) {
                                                                              echo "style=\"color:gray;\"";
                                                                            } elseif ($r == 7 || $r == 1 ) {
                                                                              echo "style=\"color:yellow;\"";
                                                                            } ?>>Groepen</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#section-verhuur" <?php if ($r == 3 || $r == 5 || $r == 6 || $r == 11 || $r == 13) {
                                                                              echo "style=\"color:gray;\"";
                                                                            } elseif ($r == 7 || $r == 1 ) {
                                                                              echo "style=\"color:yellow;\"";
                                                                            } ?>>Verhuur</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#section-tprogram" <?php if ($r == 3 || $r == 5 || $r == 6 || $r == 11 || $r == 13) {
                                                                              echo "style=\"color:gray;\"";
                                                                            } elseif ($r == 7 || $r == 1 ) {
                                                                              echo "style=\"color:yellow;\"";
                                                                            } ?>>Program</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="https://shop.chiroelzestraat.be/" target="_blank" <?php if ($r == 3 || $r == 5 || $r == 6 || $r == 11 || $r == 13) {
                                                                              echo "style=\"color:gray;\"";
                                                                            } elseif ($r == 7 || $r == 1 ) {
                                                                              echo "style=\"color:yellow;\"";
                                                                            } ?>>Webshop</a>
                </li>
                <!--          <li class="nav-item"><a href="#section-evenementen" class="nav-link" <?php if ($r == 3 || $r == 5 || $r == 6 || $r == 11 || $r == 13) {
                                                                                                  echo "style=\"color:gray;\"";
                                                                                                } elseif ($r == 7 || $r == 1 ) {
                                                                                                  echo "style=\"color:yellow;\"";
                                                                                                } ?>>Evenementen</a>
                          </li>-->
                <li class="nav-item"><a class="nav-link" href="#section-contact" <?php if ($r == 3 || $r == 5 || $r == 6 || $r == 11 || $r == 13) {
                                                                              echo "style=\"color:gray;\"";
                                                                            } elseif ($r == 7 || $r == 1 ) {
                                                                              echo "style=\"color:yellow;\"";
                                                                            } ?>>Contact</a>
                </li>
                <li class="nav-item"><a class="nav-link inschrijvenLink" href="https://smart.chiroelzestraat.be/">Inschrijven</a>
                </li>
                <!-- <li class="nav-item"><a href="https://kamp.chiroelzestraat.be/" class="nav-link inschrijvenLink">Inschrijven kamp</a></li> -->
            </ul>
        </div>
    </div>
</nav>
<!-- Einde navigatiebalk -->

<section class="ftco-cover ftco-slant" id="section-home"
         style="background-image: url(images/achtergrond<?php echo $r ?>.jpg);">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
            <div class="col-md-10">
                <h1 class="ftco-heading ftco-animate" id="welkom">Welkom bij Chirojongens Elzestraat</h1>
                <!--          <h1 id="welkom" class="ftco-heading ftco-animate">Inschrijvingen voor Chirokamp 2023 geopend!</h1>-->
                <!-- <h2 class="h2"><a href="https://smart.chiroelzestraat.be/" class="nav-link inschrijvenLink">Schrijf je in via SmartChiro</a></h2> -->
                <!--          <h2 class="h2"><a href="https://kamp.chiroelzestraat.be/" class="nav-link inschrijvenLink">Inschrijven kamp</a></h2>-->
                <!--<h2 class="h2"><a href="https://bbq.chiroelzestraat.be/" class="nav-link inschrijvenLink">Inschrijven bbq</a></h2> -->
            </div>
        </div>
    </div>
</section>

<!-- Begin opkomende activiteiten-->
<section class="ftco-section bg-light  ftco-slant" id="section-activiteiten">
    <div class="container">
        <!--<div class="row">
          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="text-uppercase ftco-uppercase">Opkomende activiteiten</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead"></p>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="media-body">
                <h5 class="mt-0">Algemeen weekend</h5>
                <p>11-13 maart 2022</p>
                <!--<div class="afbact">
                    <img src="images/zwemmenchrk.jpg" >
                    </div>
                <p>
                   Alle praktische info vindt u <a href="https://tprogram.chiroelzestraat.be/Brief-Algemeen-Weekend-2022.pdf">hier terug</a>.</br>
                   Inschrijven kan via de <a href="https://smart.chiroelzestraat.be/#/uitstap/WMeU0kGzNvyWHCKs6EzO">volgende pagina op SmartChiroe</a>.
                </p>
              </div>
            </div>
          </div> -->
        <!-- <div class="col-lg-4 col-md-6">
          <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
            <div class="media-body">
              <h5 class="mt-0">Paasmanden</h5>
              <p>Zondag 9 april</p>
              <img class="afbact" alt="Paasmanden" src="https://chiroelzestraat.be/img/paasmand.png">
              <p>Wil jij een ontbijtje geleverd aan huis op Pasen? Heb jij geluk! Plaats <a target="_blank" href="https://forms.gle/4eriVEtkVnL6mJ3p8">hier snel je bestelling!</a></p>
            </div>
          </div>
        </div> -->
    </div>
</section>
<!--einde opkomende activiteiten-->

<section class="ftco-section bg-light  ftco-slant ftco-slant-white" id="section-groepen">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center mb-5 ftco-animate">
                <h2 class="text-uppercase ftco-uppercase">Groepen</h2>
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <p class="lead">De leden zijn opgedeeld in groepen, afhankelijk van hun leeftijd.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
                    <!-- eventueel logo's toevoegen -->
                    <div class="media-body">
                        <h5 class="mt-0">Speelclub</h5>
                        <p>1e - 3e leerjaar</p>
                        <p>14h - 17h</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
                    <div class="media-body">
                        <h5 class="mt-0">Rakkers</h5>
                        <p>4e - 6e leerjaar</p>
                        <p>14h - 17.30h</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">

                    <div class="media-body">
                        <h5 class="mt-0">Toppers</h5>
                        <p>1e - 2e middelbaar</p>
                        <p>14h - 18.30h</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">

                    <div class="media-body">
                        <h5 class="mt-0">Kerels</h5>
                        <p>3e - 4e middelbaar</p>
                        <p>14h - 19h</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">

                    <div class="media-body">
                        <h5 class="mt-0">Aspiranten</h5>
                        <p>5e - 6e middelbaar</p>
                        <p>14h - 19.30h</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Einde van groepen sectie -->

<section class="ftco-section ftco-slant" id="section-verhuur">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ftco-animate">
                <h2 class="text-uppercase ftco-uppercase">Verhuur</h2>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7">
                        <p class="lead">Onze lokalen zijn enkel beschikbaar tijdens weekends. De vaste kosten zijn
                            vastgelegd op 250 euro. Het verbruik van gas en elektriciteit wordt
                            berekend door middel van de meterstanden. Het contract vindt u <a
                                    href="https://verhuur.chiroelzestraat.be/Huurcontract Chirojongens Elzestraat 2024-2025.pdf"
                                    target="_blank">hier.</a>
                        </p>
                    </div>
                </div>
                <h4 class="text-uppercase">Waarborg</h4>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7">
                        <p class="lead">De waarborg van 150 euro wordt ten laatste twee weken op voorhand betaald op
                            rekeningnummer BE87 7350 6146 9894. Indien de huurder het weekend annuleert tot een termijn
                            van 1 week op
                            voorhand, wordt de waarborg teruggestort aan de huurder. Gebeurt de opzegging later dan
                            wordt de
                            waarborg niet teruggestort.</p>
                    </div>
                </div>
                <h4 class="text-uppercase">Locatie</h4>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7">
                        <p class="lead">Clemenceaustraat 111E, 2860 Sint-Katelijne-Waver</p>
                        <p class="lead">Achter de kerk aan de rechterkant</p>
                        <p><a href="galerij/verhuur">Foto-album</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END row -->
        <div class="row">
            <div class="col-lg-4 mb-5 ftco-animate">
                <div class="p-3">
                    <h3 class="h4">Infrastructuur</h3>
                    <ul class="list-unstyled ftco-list-check text-left">
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span>
                            <span>1 groot heem</span></li>
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span>
                            <span>4 kleine hemen</span>
                        </li>
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>volledig uitgeruste
                  keuken (bestek, borden, kookpotten, etc.)</span></li>
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>sanitair vermogen &
                  douche</span></li>
                        <li class="d-flex mb-2"><span class="oi oi-x mr-3 text-primary"></span> <span>GEEN bedden</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 mb-5 ftco-animate">
                <div class="p-3">
                    <h3 class="h4">Omgeving</h3>
                    <ul class="list-unstyled ftco-list-check text-left">
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Zwembad</span>
                        </li>
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Park,
                  basketpleintje</span></li>
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Spar, bakker,
                  frietkot</span></li>
                        <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Colruyt (5 minuten met
                  wagen)</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 mb-5 ftco-animate">
                <div class="p-3">
                    <h3 class="h4">Contact</h3>
                    <ul>
                        <li>contact@chiroelzestraat.be</li>
                    </ul>
                </div>
            </div>

            <div class="col ftco-animate">
                <div class="googleCalendar" style="margin: 0 auto;">
                    <iframe frameborder="0"
                            height="600" scrolling="no"
                            src="https://calendar.google.com/calendar/embed?src=contact%40chiroelzestraat.be&ctz=Europe%2FBrussels"
                            style="border: 0" width="800"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-slant ftco-slant-white" id="section-tprogram">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ftco-animate">
                <h2 class="text-uppercase ftco-uppercase">'t Program</h2>
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7">
                        <p class="lead"><a href="https://tprogram.chiroelzestraat.be/kampboekje2025.pdf">Kampboekje 2025</a></p>
                        <p class="lead"><a href="https://tprogram.chiroelzestraat.be/Program-april-juni.pdf">'t Program
                        april - juni 2025</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- einde 't Program sectie -->

<!--  <section class="ftco-section bg-light  ftco-slant ftco-slant-white" id="section-evenementen">-->
<!--    <div class="container">-->
<!--      <div class="row mb-5">-->
<!--        <div class="col-md-12 text-center ftco-animate">-->
<!--          <h2 class="text-uppercase ftco-uppercase">Evenementen</h2>-->
<!--          <div class="row justify-content-center mb-5">-->
<!--            <div class="col-md-7">-->
<!--              <a href="https://www.facebook.com/JungleTD/"><img class="evenement" alt="JungleTD" src="images/jungletd.jpg"></a>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="row justify-content-center mb-5">-->
<!--            <div class="col-md-7">-->
<!--              <a href="https://www.facebook.com/events/1526390364142622/"><img class="evenement" alt="Elzestraatd" src="images/elzestraatd.jpg"></a>-->
<!--            </div>-->
<!--          </div>-->
<!--          &lt;!&ndash;<div class="row justify-content-center mb-5">-->
<!--              <div class="col-md-7">-->
<!--                <a href="https://quiz.chiroelzestraat.be"><img class="evenement" alt="Chiroquiz" src="images/chiroquiz.PNG"></a>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="row justify-content-center mb-5">-->
<!--              <div class="col-md-7">-->
<!--                <a href="https://www.facebook.com/events/260560494590414/"><img class="evenement" alt="Jungle Junior" src="images/junglejunior.jpg"></a>-->
<!--              </div>-->
<!--            </div>&ndash;&gt;-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->

<!--  </section>-->
<section class="ftco-section bg-slant ftco-slant ftco-slant-white" id="section-counter">

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center ftco-animate">
                <h2 class="text-uppercase ftco-uppercase">Cijfers</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md ftco-animate">
                <div class="ftco-counter text-center">
                    <span class="ftco-number" data-number="62">0</span>
                    <span class="ftco-label">Leden</span>
                </div>
            </div>
            <div class="col-md ftco-animate">
                <div class="ftco-counter text-center">
                    <span class="ftco-number" data-number="11">0</span>
                    <span class="ftco-label">Leiders</span>
                </div>
            </div>
            <div class="col-md ftco-animate">
                <div class="ftco-counter text-center">
                    <span Y class="ftco-number" data-number="71">0</span>
                    <span class="ftco-label">Jaar Chiro Elzestraat</span>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="ftco-section bg-slant ftco-slant ftco-slant-white" id="section-faq">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="text-uppercase ftco-uppercase">F.A.Q.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <h2>Roken – Vapen – Drugs beleid</h2>
                <p>Ons rook en drugs beleid kan je <a
                        href="https://docs.google.com/document/d/1wAZEWRUqxB2IpmUwKgUxwfvjvoU_3fP9">hier</a> terugvinden
                </p>
            </div>
        </div>
    </div>

</section>
<section class="ftco-section bg-light  ftco-slant ftco-slant-white" id="section-contact">
    <div class="container">
        <div class="row">


            <div class="col-md pr-md-5 mb-5">
                <h1>Contact in noodgevallen</h1>
                <p>Lowie Willems: <a href="tel:0468227664">0468 22 76 64</a></p>
                <p>Jef Souvereyns: <a href="tel:0472796887">0472 79 68 87</a></p>
                <br>
                <h1>Niet-dringend contact</h1>
                <div class="form-group">
                    <label class="sr-only" for="naam">Naam</label>
                    <input class="form-control" id="naam" placeholder="Naam" type="text">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" id="email" placeholder="Email" type="text">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="bericht">Bericht</label>
                    <textarea class="form-control" cols="30" id="bericht" name="bericht"
                              placeholder="Schrijf je bericht"
                              rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" id="stuurBericht">Stuur bericht</button>
                </div>
            </div>

        </div>
    </div>
</section>
<footer class="ftco-footer ftco-bg-dark">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                <div class="row">
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                        <li><a href="https://twitter.com/ChiroElzestraat"><span class="icon-twitter"></span></a></li>
                        <li><a href="https://www.facebook.com/Chirojongens-Elzestraat-234251636629703/"><span
                                class="icon-facebook"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md text-left">
                <p>&copy; Chirojongens Elzestraat <?php echo date("Y"); ?>.</p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div class="show fullscreen" id="ftco-loader">
    <svg class="circular" height="48px" width="48px">
        <circle class="path-bg" cx="24" cy="24" fill="none" r="22" stroke="#eeeeee" stroke-width="4"/>
        <circle class="path" cx="24" cy="24" fill="none" r="22" stroke="#4586ff" stroke-miterlimit="10"
                stroke-width="4"/>
    </svg>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/main.js"></script>

<script src="ajax.js?v=1"></script>
</body>

</html>
