<?
// Считаем общее количество товаро и общую сумму
$kolvo = 0;
$summa = 0;
foreach ($arResult['ITEMS'] as $arItem){
	$kolvo = $kolvo + $arItem['QUANTITY'];
	$summa = $summa + $arItem['PRICE'] * $arItem['QUANTITY'];
}
$arResult['QUANTITY'] = $kolvo;
$arResult['SUM']      = $summa;
?>