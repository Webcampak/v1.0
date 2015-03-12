<?php
// Copyright 2010 Infracom & Eurotechnia (support@webcampak.com)
// This file is part of the Webcampak project.
// Webcampak is free software: you can redistribute it and/or modify it 
// under the terms of the GNU General Public License as published by 
// the Free Software Foundation, either version 3 of the License, 
// or (at your option) any later version.

// Webcampak is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
// even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// See the GNU General Public License for more details.

// You should have received a copy of the GNU General Public License along with Webcampak. 
// If not, see http://www.gnu.org/licenses/.
header("Content-Type: text/html; charset=UTF-8");
include("include/cookie.php");
require("../../etc/viewer.config.php");

$_SERVER['PHP_AUTH_USER'] = "logout";
$_SERVER['PHP_AUTH_PW'] = "logout";

include("include/login.php");
include("include/witofunctions.php");

$smarty->display('login.tpl');		
exit();

//header('WWW-Authenticate: Basic realm="Webcampak"');
//header('HTTP/1.0 401 Unauthorized');
/*
<html>
<head>

<title>Redirection vers l'interface d'administration dans une seconde</title
<meta http-equiv="refresh" content="1; URL=/viewer/">
</head>

<body>
Redirection vers l'interface dans 1 seconde. <br /><br />
Sinon cliquez ici: <a href="/viewer/">Interface Visiteur</a> 
</body>
</html>
*/
?>
