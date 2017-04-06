<?php

namespace Controller;

use Model\ConferenceModel;
use \W\Controller\Controller;

class ConferenceController extends Controller {

	public function est() {
		// allows a certain user to access
		$this->allowTo('user');

		// Je récupère les données de la DB pour une conférence dont l'id est 2
		$model = new ConferenceModel();
		$conference = $model->find(2);
		//debug($conference);

		$object = new ConferenceModel();
		$allTeamsAndDivisions = $object->getAllTeamsAndDivisions(2);
		//debug($allTeamsAndDivisions);

		$this->show('default/conference/est', array(
			'conferenceName' => $conference['con_name'],
			'allTeams' => $allTeamsAndDivisions
		));
	}

	public function ouest() {
		$this->allowTo('user');

		// Je récupère les données de la DB pour une conférence dont l'id est 2
		$model = new ConferenceModel();
		$conference = $model->find(1);
		//debug($conference);

		$object = new ConferenceModel();
		$allTeamsAndDivisions = $object->getAllTeamsAndDivisions(1);
		//debug($allTeamsAndDivisions);

		$this->show('default/conference/ouest', array(
			'conferenceName' => $conference['con_name'],
			'allTeams' => $allTeamsAndDivisions
		));
	}

}
