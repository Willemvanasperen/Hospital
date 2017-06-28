<?php

require(ROOT . "model/PatientsModel.php");

function index()
{
	render("patients/index");
}

function create()
{
	render("patients/create");
}

function createSave()
{
	if (!createPatient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "patients/index");
}

function edit($id)
{
	render("patients/edit", array(
		'patients' => getPatients($id)
	));
}

function editSave()
{
	if (!editPatient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "patients/index");
} 

function delete($id)
{
	if (!deletePatient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "patients/index");
}
