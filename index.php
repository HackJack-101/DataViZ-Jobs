<?php
$yamlFilename	 = './jobs.yaml';
$yamlFile		 = file_get_contents($yamlFilename);
$yaml			 = yaml_parse($yamlFile);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>DataViZ</title>
	</head>
	<body>
		<h1>DataViZ Jobs</h1>
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