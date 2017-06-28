<?php

require(ROOT . "model/SpeciesModel.php");

function index()
{
	render("species/index" , array('species' => getAllSpecies()
		));
}

function add()
{
	render("species/add");
}

function addSave()
{
	if (!addSpecies()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "species/index");
}

function edit($id)
{
	render("species/edit", array(
		'species' => getSpecies($id)
	));
}

function editSave()
{
	if (!editSpecies()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "species/index");
} 

function delete($id)
{
	if (!deleteSpecies($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "species/index");
}
