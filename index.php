<?php
$yamlFilename = './jobs.yaml';
$yamlFile = file_get_contents($yamlFilename);
$yaml = yaml_parse($yamlFile);
?>
<html>
	<head></head>
	<body>
		<pre>
			<?php print_r($yaml); ?>
		</pre>
	</body>
</html>