<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();



//delayed function must return a string
if(empty($arResult))
	return "";
	
$strReturn = '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><ul itemprop="breadcrumb">';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		$strReturn .= '<li class="home" typeof="v:Breadcrumb"><a rel="v:url" href="'.$arResult[$index]["LINK"].'" title="'.$title.'"><span property="v:title">'.$title.'</span></a><span class="crumb">&gt; </span></li>';
	else
		$strReturn .= '<li class="cms_page" typeof="v:Breadcrumb"><a rel="v:url" href="'.$arResult[$index]["LINK"].'"><strong property="v:title">'.$title.'</strong></a></li>';
}

$strReturn .= '</ul></div>';

return $strReturn;
?>