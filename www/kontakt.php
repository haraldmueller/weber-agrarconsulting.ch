<!DOCTYPE html>
<html lang="de">
<head>
  <title>weber-agrarconsulting</title>
  <meta name="page-topic" content="Kontakt:, Agrarconsulting, Beratung im produzierenden Gemüsebau">
  <meta name="name" content="Heiner Weber Agrarconsulting, Gemüsegärtner, Beratung im produzierenden Gemüsebau, +41 79 416 78 67">
  <meta name="keywords" content="Heiner, Weber, Agrar, Consulting, Consult, Gemüsegärtner, Gemüsebau, Gemüseanbau, Schweizer Gemüsebaubetrieb, Gemüsebaubetrieb, Bauer, Landwirt, Gartenbauingenieur, FH Wädenswil, Agronom, Anbaumethoden, Herbizidversuche, Düngungsversuche, Sortenversuche, Führungschulungen, Hygienenschulugnen, Organisation, Kulturenkontrolle, Beratung, Pflanzenschutzempfehlungen, Mitarbeit auf dem Betrieb, Mitarbeit, Erntegruppen, Mitarbeit in Erntegruppen, Bodenbearbeitung, Aufzeichnung, Aufzeichnungspflichten, Qualitätssicherungen, Swiss Gap-Umsetzungen, Sortenempfehlungen, Gartenbauarbeiten, regelmässige Mitarbeit, Gartenbaubetrieb, Pflanzen, Tiere, heranwachsen, Natur, Jahreszeiten, Basel, Basellandschaft, Basel-Land, NWS, Nordwestschweiz, Landwirtschaftliche Handelsschule am Strickhof">
  <meta name="description" content="Heiner Weber Agrarconsulting, Gemüsegärtner, Gemüsebau, Gemüseanbau, Schweizer Gemüsebaubetrieb, Betriebsinterne Versuche wie zum Beispiel Herbizidversuche, Anbaumethoden, Düngungsversuche, Sortenversuche, Führungschulungen, Hygienenschulugnen, Organisation, Kulturenkontrolle, Beratung, Pflanzenschutzempfehlungen, Allgemeine Mitarbeit auf dem Betrieb, von der Mitarbeit in den Erntegruppen bis zur Bodenbearbeitung, wahrnehmen von Aufzeichnungspflichten, Qualitätssicherungen, Swiss Gap-Umsetzungen, Sortenempfehlungen, Gartenbauarbeiten durch regelmässige Mitarbeit in einem Gartenbaubetrieb, weber-agrarconsulting.ch, +41 79 416 78 67, 079 416 78 67, 0794167867"> 
  <meta name="author" content="powerlook.ch">
  <meta name="publisher" content="powerlook.ch">
  <meta name="copyright" content=" (c) powerlook.ch">
    <meta charset="iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/jquery-1.11.3.min.map"></script>
  <script src="js/bootstrap.min.js"></script>
  
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="16x16" href="apple-touch-icon16.png">
	<link rel="apple-touch-icon" sizes="32x32" href="apple-touch-icon32.png">
	<link rel="apple-touch-icon" sizes="36x36" href="apple-touch-icon36.png">
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon57.png">
	<link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon72.png">
	<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon144.png" /><!-- Retina iPad --> 
	<link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon144.png">
  
  <link rel="stylesheet" href="css/weber-agrarconsulting.css">
</head>
<body>
<div class="container-fluid">
<h1 class="hid">Kontakt</h1>
  <div class="row">
    <div class="col-sm-6">

      <div class="row">
        <div class="col-sm-12 p0"><img src="img/hg_tomaten_640x480.jpg" width="100%"/></div>
      </div>

      <div class="row">
      	<div class="col-sm-3  hidden-xs">&nbsp;</div>
        <div class="col-sm-8 pl1">

        	<p class="ueberschrift_1">Kontakt</p>

	        <div class="formKontakt">
<?php
				if ( isset($_REQUEST["senden"])) {
					$fehlers = "";
					if ($_REQUEST["absendername"] == null){
						$fehlers = $fehlers."<li class='fehlermeldung'>Bitte geben Sie Ihren Namen an.</li>";
					}
					if ($_REQUEST["telefon"] == null){
						$fehlers = $fehlers."<li class='fehlermeldung'>Mit einer Telefonnummer k&ouml;nnen wir Sie bei Fragen besser erreichen.</li>";
					}
					if ($_REQUEST["emailvon"] == null){
						$fehlers = $fehlers."<li class='fehlermeldung'>Ohne E-Mail-Adresse k&ouml;nnen wir Sie nicht so gut kontaktieren.</li>";
					}
					if ($_REQUEST["betreff"] == null){
						$fehlers = $fehlers."<li class='fehlermeldung'>Ein Betreff w&auml;re auch noch gut.</li>";
					}
				
					if ($fehlers == "") {
						$nachrichtErhalten = "Wir haben Ihre Nachricht erhalten und werden uns bei Ihnen melden.";
						$betreiberSite 	= 	"www.weber-agrarconsulting.ch";
						$empfaenger 	=  	"info@weber-agrarconsulting.ch";
						$sender 		= htmlspecialchars($_REQUEST["emailvon"]);
						$betreff 		= ": ". htmlspecialchars($_REQUEST["betreff"]) ." ";
						$mailtext 		= "<br>Name:<br>".$_REQUEST["absendername"]
										."<br><br>Telefon:<br>".htmlspecialchars($_REQUEST["telefon"])
										."<br><br>Email:<br>".htmlspecialchars($_REQUEST["emailvon"])
										."<br><br>Mitteilung:<br>".htmlspecialchars($_REQUEST["message"])
										."<br><br>--<br>"
										."<br>heiner weber"
										."<br>AGRARCONSULTING"
										."<br>"
										."<br>"
										."<br>www.weber-agrarconsulting.ch"
										."<br>info@weber-agrarconsulting.ch"
										."<br>"
										."<br>"
										."<br>"
										."<br>";
						//Mail an Betreiber der Website						
						mail($empfaenger, "Nachricht von: ".$betreiberSite." ".$betreff, "<p>Folgende Nachricht kommt von einem Benutzer der Website ".$betreiberSite.":<br><br>".$mailtext."</p>", "From: $sender\n" . "Content-Type: text/html; charset=utf-8\n"); 
						
						//Mail an Benutzer/Besucher der Website						
						mail($sender, "Danke von ".$betreiberSite, "<p>".$nachrichtErhalten."<br><br>Folgende Angaben haben Sie uns gemacht: <br>".$mailtext."</p>", "From: ".$empfaenger."\n" . "Content-Type: text/html; charset=utf-8\n"); 
						
						$_REQUEST["absendername"] 	= "";
						$_REQUEST["telefon"]  		= "";
						$_REQUEST["emailvon"] 		= "";
						$_REQUEST["betreff"]		= "";
						$_REQUEST["message"]  		= "";
						
						echo "<p class='okMeldung'><img src='img/check.png'>&nbsp;&nbsp;&nbsp;Vielen Dank! ".$nachrichtErhalten;						
					} else {
						echo "<ul>".$fehlers."</ul>";
					}
				}
?>
		
				<form class="form-horizontal" action="#contact-form" method="post">
					<fieldset>
						<div class="control-group">
							<div class="controls">
							<label class="control-label hidden-xs" for="name">Name</label>
								<input class="input-xlarge" type="text" id="name" name="absendername" placeholder="Vorname Nachname" value="<?=$_REQUEST["absendername"]?>"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label hidden-xs" for="email">E-Mail</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="email" name="emailvon" placeholder="vorname.nachname@gmail.com" value="<?=$_REQUEST["emailvon"]?>"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label hidden-xs" for="telefon">Telefon</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="telefon" name="telefon" placeholder="079 123 45 xx" value="<?=$_REQUEST["telefon"]?>"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label hidden-xs" for="subject">Betreff</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="subject" name="betreff" placeholder="Betreff" value="<?=$_REQUEST["betreff"]?>"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label hidden-xs" for="message">Mitteilung</label>
							<div class="controls">
								<textarea class="input-xlarge" rows="5" id="message" name="message" placeholder="Ihre Mitteilung..."><?=$_REQUEST["message"]?></textarea>
							</div>
						</div>
						<div class="control-group form-actions">
							<button type="submit" name="senden" id="senden" class="btn btn-success">Senden</button>
						</div>
					</fieldset>
				</form>
	        </div>  
        </div>
      	<div class="col-sm-1  hidden-xs">&nbsp;</div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="row">
        <div class="col-sm-12 p0 hidden-xs"><img src="img/hg_gemuese_320x480oben.jpg" width="100%"/></div>
      </div>
      <div class="row">
        <div class="col-sm-12 p0"><img src="img/hg_gemuese_320x480unten.jpg" width="100%"/></div>
      </div>
    </div>
    <div class="col-sm-3">

      <div class="row">
		<div class="col-sm-12 p0">

	        <ul class="menu_ul">
	        	<li><a href="index.html">Home</a></li>
	        	<li><a href="uebermich.html">&Uuml;ber mich</a></li>
	        	<li><a href="kompetenzen.html">Kompetenzen</a></li>
	        	<li><a href="referenzen.html">Referenzen</a></li>
	        	<li><a href="links.html">Links</a></li>
	        	<li>Kontakt</li>
	        	<li><a href="impressum.html">Impressum</a></li>
	        	<li class=" hidden-xs"><a href="login.php">Login</a></li>
	        </ul>

	    </div>
      </div>
      <div class="row">
        <div class="col-sm-12 p0"><img src="img/hg_gruen_mit_logo_320x480.png" width="100%"/></div>
      </div>

    </div>
  </div>
  
</div>

</body>
</html>