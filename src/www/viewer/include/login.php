<?php
if ( (isset($_SERVER['PHP_AUTH_USER']) && !empty($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']) && !empty($_SERVER['PHP_AUTH_PW']))) {
	//echo "USERNAME: " . $_SERVER['PHP_AUTH_USER'] . " - Password: " . $_SERVER['PHP_AUTH_PW'] . "<br />";
	$checkuser = $db->prepare("SELECT id, groups_id, companies_id, username FROM users WHERE username='" . strip_tags($_SERVER['PHP_AUTH_USER']) . "' AND password=SHA1('" . strip_tags($_SERVER['PHP_AUTH_PW']) . "')");
	$checkuser->execute();
	$resultcheckuser = $checkuser->fetchAll();	
	$authenticationcount = count($resultcheckuser);
	if ($authenticationcount == "1") {
		//echo "Authentification OK";
		// Authenficitation correcte
		// On assigne un token qui sera stocké dans le cookie et la base de données pour la durée de la session. 
		if (isset($_POST['username'])) {$post_username = strip_tags($_POST['username']);}
		else {$post_username = "";}
		if (isset($_POST['sha1pass'])) {$post_shapass = strip_tags($_POST['sha1pass']);}
		else {$post_shapass = "";}		
		
		$token = sha1($post_username . time());
		Cookie::Set('token', $token , Cookie::SevenDays);
		Cookie::Set('username', $post_username , Cookie::SevenDays);
		$inserttoken = $db->prepare("UPDATE users SET token = '" . $token . "', lastlogin = '" . time() ."' WHERE username='" . $post_username . "' AND password='" . $post_shapass . "'");		
		$inserttoken->execute();
		$current_usersid = $resultcheckuser[0]["id"];
		$current_usersgroupid = $resultcheckuser[0]["groups_id"];
		$current_userscompanyid = $resultcheckuser[0]["companies_id"];
		$current_usersname = $resultcheckuser[0]["username"];		
		$smarty->assign('CONFIGUSERNAME', $current_usersname);
		//echo "LOGIN USER INIT: $current_usersid - COMPANY: $current_userscompanyid <br />";																	
	} else {
		// Erreur d'authentification
		header('WWW-Authenticate: Basic realm="Webcampak"');
		header('HTTP/1.0 401 Unauthorized');
		$smarty->assign('LOGINERROR', "<br />Login ou mot de passe incorrect");
		$smarty->display('login.tpl');		
		exit();
	}
} else {
	// On considère que l'authentification est déjà réalisée
	$checktoken = $db->prepare("SELECT id, groups_id, companies_id, username FROM users WHERE token='" . Cookie::Get('token') . "' AND username='" . Cookie::Get('username') . "' LIMIT 1");
	$checktoken->execute();
	$resultchecktoken = $checktoken->fetchAll();
	$authenticationcount = count($resultchecktoken);
	if ($authenticationcount != "1") {
		//Authentification incorrecte
		header('WWW-Authenticate: Basic realm="Webcampak"');
		header('HTTP/1.0 401 Unauthorized');
		$smarty->display('login.tpl');		
		exit();
	} else {	
		$current_usersid = $resultchecktoken[0]["id"];
		$current_usersgroupid = $resultchecktoken[0]["groups_id"];
		$current_userscompanyid = $resultchecktoken[0]["companies_id"];
		$current_usersname = $resultchecktoken[0]["username"];	
		$smarty->assign('CONFIGUSERNAME', $current_usersname);	
		//echo "LOGIN USER: $current_usersid - COMPANY: $current_userscompanyid <br />";										
	}
}

function login_allowed($userid, $db, $group, $page) {
// Check if a user is allowed to access a specific page
	if ($group == "1") {
		return TRUE;
	} else {
		$checkaccess = $db->prepare("
		SELECT 
			g.name AS gname,
			u.username AS uusername,
			p.name AS pname
		FROM 
			users AS u
		LEFT JOIN groups AS g ON g.id = u.groups_id
		LEFT JOIN groups_pages AS gp ON gp.groups_id = g.id
		LEFT JOIN pages AS p ON gp.pages_id = p.id
		WHERE
			u.id = '" . $userid . "' AND gp.access ='1'");
		$checkaccess->execute();
		$resultcheckaccess = $checkaccess->fetchAll();
		if ($page != "") {
			$access = 0;
			for ($i=0;$i<count($resultcheckaccess);$i++) {
				if ($resultcheckaccess[$i]["pname"] == $page) {
					$access = 1;
				}
			}
			if ($access == 1) { return TRUE;}
			else { return FALSE;}
		} else {
			return $resultcheckaccess;
		}
	}
//return TRUE;
}

?>
