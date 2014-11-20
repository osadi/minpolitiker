<?php
	include __DIR__ . '/recipients.php';
?>
<!doctype html>

<html lang="sv">
<head>
  <meta charset="utf-8">

  <title>minpolitiker.se</title>
  <meta name="description" content="minpolitiker.se">
  <meta name="author" content="minpolitiker.se">


  <link rel="stylesheet" href="css/stylesheets/screen.css">


  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
	<div class="wrapper">
		<form role="form" method="POST" action="send-mail" name="mailer-form">

			<div class="main">
				<div class="big-info">
					<h1>minpolitiker.se</h1>
					<h4>Direktkontakt med dina kommunalpolitiker.</h4>
					<div class="info-box">
						<ul>
							<li>Markera en eller flera ledamöter som du vill skriva till.</li>
							<li>Använd den färdiga mallen eller skriv ett eget mail.</li>
							<li>Fyll i namn samt mail - tryck skicka!</li>
						</ul>					
					</div>
				</div>
				<div>
					<h2>Mail</h2>
				</div>
				<div class="mailbox">
					<div class="form-group"><label for="subject">Rubrik</label><input type="text" class="form-control" name="subject" id="subject" value="Du lovade oss"></div>
					<div class="form-group"><label for="mail-body">Meddelande</label>
						<textarea class="form-control" rows="8" name="mail-body" id="mail-body">
Hej,

I valrörelsen var alliansen och det rödgröna överens om att de aldrig skulle medverka till att ge Sverigedemokraterna något politiskt inflytande i Borås. De senaste dagarna verkar det som om allianspartierna öppnar upp för att rösta igenom sitt budgetförslag med hjälp av Sverigedemokraterna. Att medverka till att ge det högerextrema partiet Sverigedemokraterna makten över våra liv är ett svek mot de löften som gavs i valrörelsen. Ni lovade att aldrig samarbeta med rasister!

Genom att ge Sverigedemokraterna inflytande i vår stad ser ni till att normalisera rasism. Att göra det ok att säga, att vissa människor är mer värda och har större rättigheter än andra. Det är inte vad ni lovade.

Vi i Borås Tillsammans verkar för mer gemenskap, öppenhet och tolerans i Borås. Sverigedemokraterna står för något helt annat. Vi kräver att alla icke-rasistiska partier i Borås tar sitt ansvar och håller vad ni lovade, att inte ge rasister inflytande över våra liv. Det var vad 89 % av boråsarna röstade för i valet. Det är dags att ni står för vad ni lovade!

Med vänliga hälsningar
[namn - fyller du i fältet namn ändras detta automatiskt]</textarea>
					</div>
					<div class="form-group"><label for="name">Ditt namn</label><input type="text" class="form-control" name="name" id="name"></div>
					<div class="form-group"><label for="email">Din epost</label><input type="email" class="form-control" name="email" id="email"></div>
					<div class="form-group"><label for="question">Är alla människor lika mycket värda?</label><input type="text" class="form-control" name="question" id="question"></div>
					<p class="right"><input type="submit" value="Skicka" class="btn btn-primary"></p>
				</div>
			</div>

			<div class="sidebar">
				<article class="all">
					<div class="circle"><span class="icon-mail mail-icon"></span></div>
					<div class="info">
						<h2>Skicka till alla</h2>
						<p>Detta alternativ skickar ditt mail till alla de adresser vi har kunnat hitta för politiker i kommunfullmäktige, Borås.</p>
						<input type="checkbox" name="chosen[]" class="hidden" value="all" />
					</div>
				</article>
				<article>
					<h3>Eller välj de du tycker är viktigast:</h3>
				</article>
				<?php
					foreach ($recipients as $key => $recipient) {
						$leaderKey = $recipient['leader-key'];
						$leader    = $recipient['members'][$leaderKey];
						?>
						<article class="leader">
							<div class="circle"><img src="img/<?php echo $key ?>.png"></div>
							<div class="info">
								<h3><?php echo $leader['name']; ?></h3>
								<p><?php echo $recipient['party-long'] .' ('. $recipient['party-short'] .')' ; ?></p>
								<input type="checkbox" name="chosen[]" class="hidden" value="<?php echo $key .'_'. $leaderKey; ?>" />
							</div>
						</article>
						<?php
					}
				?>
				<article>
			</div>
		</form>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="js/site.dist.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-56838629-1', 'auto');
	  ga('send', 'pageview');
	</script>
</body>
</html>