<?php

function getSpecies($species_id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM speciess WHERE species_id = :species_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":species_id" => $species_id));

	$db = null;

	return $query->fetch();
}

function getAllSpeciess() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM speciess order by species_description";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editSpecies() 
{
	$species_description = isset($_POST['species_description']) ? $_POST['species_description'] : null;
	$species_id = isset($_POST['species_id']) ? $_POST['species_id'] : null;
	
	if (strlen($species_description) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE speciess SET species_description = :species_description, WHERE species_id = :species_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species_description' => $species_description,
		':species_id' => $species_id));

	$db = null;
	
	return true;
}

function deleteSpecies($species_id = null) 
{
	if (!$species_id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM speciess WHERE species_id=:species_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species_id' => $species_id));

	$db = null;
	
	return true;
}

function createSpecies() 
{
	$species_description = isset($_POST['species_description']) ? $_POST['species_description'] : null;

	if (strlen($species_description) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO speciess(species_description) VALUES (:species_description)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species_description' => $species_description));

	$db = null;
	
	return true;
}