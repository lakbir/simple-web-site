<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Nom ( Raison Social ) ', $_POST['imObjectForm_1_1'], '', false);
	$form->setField('Adresse', $_POST['imObjectForm_1_2'], '', false);
	$form->setField('Numéro de tel', $_POST['imObjectForm_1_3'], '', false);
	$form->setField('Commande - Veuillez saisir les réferences d\'articles achetés , le paiement sera à la livraison ', $_POST['imObjectForm_1_4'], '', false);
	$form->setField('Réclamation', $_POST['imObjectForm_1_5'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner('amine.hajaji1@gmail.com', 'amine.hajaji1@gmail.com', '', '', false);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file