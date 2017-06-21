<?php

require(ROOT . "model/ClientModel.php");

function index()
{
	render("client/index", array(
		'clients' => getAllClients()
	));
}

function create()
{
	render("client/create");
}

function createSave()
{
	if (!createClient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "client/index");
}

function edit($client_id)
{
	render("client/edit", array(
		'client' => getClient($id)
	));
}

function editSave()
{
	if (!editClient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "client/index");
} 

function delete($client_id)
{
	if (!deleteClient($client_id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "client/index");
}
