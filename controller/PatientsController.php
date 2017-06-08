<?php

require(ROOT . "model/PatientModel.php");

function index()
{
	render("patient/index", array(
		'patients' => getAllpatients()
	));
}

function create()
{
	render("patient/create");
}

function createSave()
{
	if (!createPatient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}

function edit($id)
{
	render("birthday/edit", array(
		'birthday' => getBirthday($id)
	));
}

function editSave()
{
	if (!editPatient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "patient/index");
} 

function delete($id)
{
	if (!deletePatient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "patient/index");
}
