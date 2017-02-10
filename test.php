<?php
$idmonster=1;
$name=1;
$life=1;
$soul=1;
$monster_attack=1;
$monster_defence=1;
$monster_level=1;
$monster_exp=1;
$monster_skill=1;
$monster_story=1;
$sql = "update monster set name='".$name."'life=".$life."soul=".$soul." where idmonster=".$idmonster.";

echo "$sql";
?>
