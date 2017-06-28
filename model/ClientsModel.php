<?php

function getClient($client_id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients WHERE client_id = :client_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":client_id" => $client_id));

	$db = null;

	return $query->fetch();
}

function getAllClients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editClient() 
{
	$client_firstname = isset($_POST['client_firstname']) ? $_POST['client_firstname'] : null;
	$client_lastname = isset($_POST['client_lastname']) ? $_POST['client_lastname'] : null;
	$id = isset($_POST['client_id']) ? $_POST['client_id'] : null;
	
	if (strlen($client_firstname) == 0 || strlen($client_lastname) == 0) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE clients SET client_firstname = :client_firstname, client_lastname = :client_lastname WHERE client_id = :client_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':client_firstname' => $client_firstname,
		':client_lastname' => $client_lastname,
		':client_id' => $client_id));

	$db = null;
	
	return true;
}

function deleteClient($client_id = null) 
{
	if (!$client_id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM clients WHERE client_id=:client_id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':client_id' => $client_id));

	$db = null;
	
	return true;
}

function createClient() 
{
	$client_firstname = isset($_POST['client_firstname']) ? $_POST['client_firstname'] : null;
	$client_lastname = isset($_POST['client_lastname']) ? $_POST['client_lastname'] : null;

	if (strlen($client_firstname) == 0 || strlen($client_lastname) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO clients(client_firstname, client_lastname) VALUES (:client_firstname, :client_lastname)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':client_firstname' => $client_firstname,
		':client_lastname' => $client_lastname));

	$db = null;
	
	return true;
}