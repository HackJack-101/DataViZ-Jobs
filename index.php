<?php
$yamlFilename	 = './jobs.yaml';
$yamlFile		 = file_get_contents($yamlFilename);
$yaml			 = yaml_parse($yamlFile);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>DataViZ</title>
		<script type="application/javascript" src="geo.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	</head>
	<body>
		<h1>DataViZ Jobs</h1>
		<div id="map"></div>
		<?php
		foreach ($yaml['items'] as $y)
		{
			?>
			<div class="job">
				<ul>
					<?php
					foreach ($y as $key => $value)
					{
						?>
						<li>
							<b><?php echo ucwords($key); ?> : </b>
							<span class="<?php echo $key; ?>"><?php echo $value; ?></span>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}
		?>
	</body>
</html>