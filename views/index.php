<?php
	include __DIR__ . '/recipients.php';
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>minapolitiker.se</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">


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
						<p>Håll muspekaren över en politiker för att få veta mer.</p>
					</div>
				</div>
				<div>
					<h2>Mail</h2>
				</div>
				<div class="mailbox">
					<textarea class="form-control" rows="8" name="mail-body">
Hej,

I valrörelsen var alliansen och det rödgröna överens om att de aldrig 
skulle medverka till att ge Sverigedemokraterna något politiskt 
inflytande i Borås. De senaste dagarna verkar det som om 
allianspartierna öppnar upp för att rösta igenom sitt budgetförslag 
med hjälp av Sverigedemokraterna. Att medverka till att ge det 
högerextrema partiet Sverigedemokraterna makten över våra liv är ett 
svek mot de löften som gavs i valrörelsen. Ni lovade att aldrig 
samarbeta med rasister! 

Genom att ge Sverigedemokraterna inflytande i vår stad ser ni till att 
normalisera rasism. Att göra det ok att säga, att vissa människor är 
mer värda och har större rättigheter än andra. Det är inte vad ni 
lovade. 

Vi i Borås Tillsammans verkar för mer gemenskap, öppenhet och tolerans 
i Borås. Sverigedemokraterna står för något helt annat. Vi kräver att 
alla icke-rasistiska partier i Borås tar sitt ansvar och håller vad ni 
lovade, att inte ge rasister inflytande över våra liv. Det var vad 89 
% av boråsarna röstade för i valet. Det är dags att ni står för vad ni 
lovade! 

Med vänliga hälsningar
[namn - fyller du i fältet namn ändras detta automatiskt]</textarea>
					<div class="form-group"><label for="name">Ditt namn</label><input type="text" class="form-control" name="name" id="name"></div>
					<div class="form-group"><label for="email">Din epost</label><input type="text" class="form-control" name="email" id="email"></div>
					<div class="form-group"><label for="question">Är alla människor lika mycket värda?</label><input type="text" class="form-control" name="question" id="question"></div>
					<p class="right"><input type="submit" value="Skicka" class="btn btn-primary"></p>
				</div>
			</div>

			<div class="sidebar">
				<?php
					foreach ($recipients as $key => $recipient) {
						?>
						<article>
							<div class="circle"><img src="img/<?php echo $key ?>.png"></div>
							<div class="info">
								<h2><?php echo $recipient['name']; ?></h2>
								<p><?php echo $recipient['party']; ?></p>
								<div class="text"><?php echo $recipient['text']; ?></div>
								<input type="checkbox" name="chosen[]" class="hidden" value="<?php echo $key; ?>" />
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