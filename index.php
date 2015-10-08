<?php
$yamlFilename	 = './jobs.yaml';
$yamlFile		 = file_get_contents($yamlFilename);
$yaml			 = yaml_parse($yamlFile);
?>
<html>
	<head></head>
	<body>
		<h1>DataViZ Jobs</h1>
		<?php
		foreach ($yaml['items'] as $y)
		{
			?>
			<div class="job">
				<?php
				foreach ($y as $key => $value)
				{
					?>
					<h3><?php echo ucwords($key); ?></h3>
					<span class="<?php echo $key; ?>"><<?php echo $value; ?></span>
					<?php
				}
				?>
			</div>
			<?php
		}
		?>
	</body>
</html>