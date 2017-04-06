<?php

	$w_routes = array(
		// nbateams.dev/home/
		['GET', '/', 'Default#home', 'default_home'],
		// nbateams.dev/contact/
		['GET', '/contact/', 'Default#contact', 'default_contact'],
		// nbateams.dev/conference/est/
		['GET', '/conference/est/', 'Conference#est', 'conference_est'],
		// nbateams.dev/conference/ouest/
		['GET', '/conference/ouest/', 'Conference#ouest', 'conference_ouest'],
		// nbateams.dev/conference/division/4-sud-est
		['GET', '/conference/division/[i:id]-[:divName]/', 'Division#division', 'division_division'],
		//nbateams.dev/signin/
		['GET', '/signin/', 'User#signin', 'user_signin'],
		['POST', '/signin/', 'User#signinPost', 'user_signinpost'],
		//nbateams.dev/signup/
		['GET|POST', '/signup/', 'User#signup', 'user_signup'],
		//nbateams.dev/forgot_password/
	);
