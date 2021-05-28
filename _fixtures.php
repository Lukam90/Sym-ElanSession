<?php 

$nocheck = "SET FOREIGN_KEY_CHECKS = 0;";
$truncate = "$nocheck TRUNCATE TABLE ";

$doctrine = "php bin/console doctrine";
$command = "$doctrine:query:sql";
$fixtures = "$doctrine:fixtures:load";

$query = "$command '$truncate";

exec("$query user'");
exec("$query stagiaire'");
exec("$query lieu'");
exec("$query session'");
exec("$query module'");
exec("$query formation'");

exec("$query formation_module'");
exec("$query module_formation'");
exec("$query stagiaire_session'");

echo "Les tables ont bien été vidées.";

system("$fixtures");