<div class="container">
	<table border="1">
		<tr>
			<th style="display: none;">#</th>
			<th style="display: none;">Naam lijst</th>
			<th colspan="2" style="display: none;">Actie</th>
		</tr>
		
		<?php foreach ($lists as $list) {

			echo "<tr>";
			echo "<td style='display: none;'>" . $list['lists_id'] . "</td>";
			echo "<td>" . $list['lists_name'] . "</td>";
			echo "<td>" . $task['tasks_name'] . "</td>";
			echo "<td><a href=\"" . URL . "song/edit/" . $list['lists_id'] . "\">Edit</a></td>";
			echo "<td><a href=\"" . URL . "song/delete/" . $list['lists_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a class="btn btn-primary" href="<?= URL ?>song/create">Nieuwe lijst toevoegen</a>
	<a class="btn btn-primary" href="<?= URL ?>task/createTasks">Nieuwe taak toevoegen</a>
</div>