<form action="<?= URL ?>task/editSaveTasks" method="POST">
	<input type="text" name="lists_name" value="<?= $lists["lists_name"] ?>">
	<input type="hidden" name="id" value="<?= $lists["lists_id"] ?>">
	<input class="btn btn-primary" type="submit" value="Opslaan">
</form>