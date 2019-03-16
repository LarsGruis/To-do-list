<?php

function getAllTasks()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getTask($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE tasks_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createTask()
{
	$tasks_name = isset($_POST["tasks_name"]) ? $_POST["tasks_name"] : null;
	$description = isset($_POST["description"]) ? $_POST["description"] : null;
	
	if ($tasks_name === null || $description === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO tasks (tasks_name, description) VALUES (:tasks_name, :description)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":tasks_name" => $tasks_name, 
		":description" => $description
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteTask($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM tasks WHERE tasks_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editTask($id=null)
{
	$lists_name = isset($_POST["lists_name"]) ? $_POST["lists_name"] : null;
	$description = isset($_POST["description"]) ? $_POST["description"] : null;
	
	if ($tasks_id === null || $tasks_name === null || $description === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE tasks SET tasks_name = :tasks_name, description = :description WHERE tasks_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id,
		":tasks_name" => $tasks_name, 
		":description" => $description
	));

	$db = null;

	return true;
}