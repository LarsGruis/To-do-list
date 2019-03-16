<?php

require(ROOT . "model/TaskModel.php");

function index()
{
	$tasks = getAllTasks();
	
	render("song/index", array(
		'tasks' => $tasks)
	);
}

function createTasks()
{
	render("song/createTask");
}

function createSaveTasks()
{
	if (createTask()) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function readTasks($id)
{
	$tasks = getTasks($id);

	render("song/read", array(
		"tasks" => $tasks
	));
}

function editTasks($id)
{
	$tasks = getTask($id);

	render("song/edit", array(
		"tasks" => $tasks
	));
}

function editSaveTasks($id)
{
	if (editTask($id)) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}

function deleteTasks($id)
{
	if (deleteTask($id)) {
		header("location:" . URL . "song/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}