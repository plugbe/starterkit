<div data-date="<?php echo date('Y-m-d'); ?>">
	<b>[<?php echo date('d-m-Y'); ?>]</b><br>
<?php
		foreach ($data as $field => $value):
			//if (str::startsWith($field, '_')) continue;
			if (is_array($value)) {
				$value = implode(', ', array_filter($value, function ($i) {
					return $i !== '';
				}));
			}
?>
	<u><?php echo ucfirst($field) ?>:</u> <?php echo $value ?><br>
<?php endforeach; ?>
</div>