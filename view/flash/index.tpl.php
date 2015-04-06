<form method="post">
	<input type="submit" name="info" value="Info Message" onClick="this.form.action = '<?= $this->url->create('flash/choice') ?>'" />
	<input type="submit" name="error" value="Error Message" onClick="this.form.action = '<?= $this->url->create('flash/choice') ?>'" />
	<input type="submit" name="success" value="Success Message" onClick="this.form.action = '<?= $this->url->create('flash/choice') ?>'">
	<input type="submit" name="warning" value="Warning Message" onClick="this.form.action = '<?= $this->url->create('flash/choice') ?>'">

	<output><?= $output ?></output>
</form>