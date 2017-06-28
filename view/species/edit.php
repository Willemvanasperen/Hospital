<h1>Edit species</h1>
<form action="<?= URL ?>species/editSave" method="post">
	<label>Species</label><input type="text" name="species" value="<?= $species['species_description']?>">
	<input type="submit" value="Submit">
	<input type="hidden" name="species_id" value="<?= $species['species_id']?>">
</form>


	<p><a href="<?= URL ?>home/index">Home</a></p>