<<?php
function damage()//真实伤害计算方式
{
$damage=$attack+$defence-$penetration;
}
function power()//剩余生命计算方式
{
$power=$power-$damage;
}
function attack()//攻击力
{
$attack=$level+$totla_equipment_attack;
}
function defence()//防御力
{
$defence=$level*10%+$totla_equipment_defence;
}

function penetration()//护甲穿透
{
$penetration=$totla_equipment_penetration;
}
function soul()//剩余灵魂计算方式
{
$soul=$soul-$price;
}



















 ?>
