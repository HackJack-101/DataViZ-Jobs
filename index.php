<?php
$yamlFilename	 = './jobs.yaml';
$yamlFile		 = file_get_contents($yamlFilename);
$yaml			 = yaml_parse($yamlFile);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>DataViZ</title>
		<script type="text/javascript" src="geo.js"></script>
		<style>
			*
			{
				margin: 0;
				padding: 0;
			}
			#maps
			{
				height:	80vh;
				width: 80vw;
				margin: auto;
			}
		</style>
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

		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	</body>
</html>