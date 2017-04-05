<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		['GET', '/contact/', 'Default#contact', 'default_contact'],

		['GET', '/conference/est/', 'Conference#est', 'conference_est'],

		['GET', '/conference/ouest/', 'Conference#ouest', 'conference_ouest'],

		['GET', '/conference/division/[i:id]-[:divName]/', 'Division#division', 'division_division']
	);
