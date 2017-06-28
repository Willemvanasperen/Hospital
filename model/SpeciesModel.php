<?php

function getSpecies($species_id) 
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM species WHERE species_id = :species_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":species_id" => $species_id));
	$db = null;
	return $query->fetch();
}

function getAllSpecies() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editSpecies() 
{
	$species_description = isset($_POST['species']) ? $_POST['species'] : null;
	$species_id = isset($_POST['species_id']) ? $_POST['species_id'] : null;
	
	if (strlen($species_description) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();
	$sql = "UPDATE species SET species_description = :species_description WHERE species_id = :species_id";
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

	$sql = "DELETE FROM species WHERE species_id=:species_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species_id' => $species_id));

	$db = null;
	
	return true;
}

function addSpecies() 
{
	$species = isset($_POST['species']) ? $_POST['species'] : null;

	if (strlen($species) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO species(species_description) VALUES (:species)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':species' => $species));

	$db = null;
	
	return true;
}