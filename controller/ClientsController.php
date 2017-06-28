<?php

require(ROOT . "model/ClientsModel.php");

function index()
{
	render("clients/index");
}

function create()
{
	render("clients/create");
}

function createSave()
{
	if (!createClient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "clients/index");
}

function edit($client_id)
{
	render("clients/edit", array(
		'clients' => getClient($id)
	));
}

function editSave()
{
	if (!editClient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "clients/index");
} 

function delete($client_id)
{
	if (!deleteClient($client_id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "clients/index");
}
