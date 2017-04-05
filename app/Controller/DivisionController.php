<?php

namespace Controller;

use \W\Controller\Controller;

class DivisionController extends Controller {

	public function division($id, $divName) {

		$teamModel = new \Model\TeamModel();
		$allTeams = $teamModel->findAll();
		//debug($allTeams);

		$divisionModel = new \Model\DivisionModel;
		$divisionInfos = $divisionModel->find($id);

		$divisionTeams = array();
		//I initialize my array
		foreach($allTeams as $currentTeam) {
			// if currentTeam is in the asked division
			if($currentTeam['div_id'] == $id) {
				$divisionTeams[] = $currentTeam;
			}
		}

		// I check
		//debug($divisionTeams);

		$this->show('conference/division', array(
			'divisionTeams' => $divisionTeams,
			'divName' => $divisionInfos['div_name']
		));

	}
}
