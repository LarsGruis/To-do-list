<div class="container">
	<table border="1">
		<tr>
			<th style="display: none;">#</th>
			<th style="display: none;">Naam lijst</th>
			<th colspan="2" style="display: none;">Actie</th>
		</tr>
		
		<?php foreach ($tasks as $task) {

			echo "<tr>";
			echo "<td style='display: none;'>" . $task['tasks_id'] . "</td>";
			echo "<td>" . $task['tasks_name'] . "</td>";
			echo "<td><a href=\"" . URL . "task/editTasks/" . $task['tasks_id'] . "\">Edit</a></td>";
			echo "<td><a href=\"" . URL . "task/deleteTasks/" . $task['tasks_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a class="btn btn-primary" href="<?= URL ?>task/createTasks">Nieuwe taak toevoegen</a>
</div>