<?php

function getAllSongs()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getSong($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE lists_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createSong()
{
	$lists_name = isset($_POST["lists_name"]) ? $_POST["lists_name"] : null;
	
	if ($lists_name === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO lists (lists_name) VALUES (:lists_name)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":lists_name" => $lists_name
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteSong($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM lists WHERE lists_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editSong($id=null)
{
	$lists_name = isset($_POST["lists_name"]) ? $_POST["lists_name"] : null;
	
	if ($lists_id === null || $lists_name === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE lists SET lists_name = :lists_name WHERE lists_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id,
		":lists_name" => $lists_name
	));

	$db = null;

	return true;
}