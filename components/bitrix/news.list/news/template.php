<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<pre><?//print_r($arResult["ITEMS"]);?></pre>


<div class="news-wrap">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
	<div class="news-header"><a href="">Новости</a></div>
	<?$i = 1;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="news-container index-&lt;? echo $_indx ?&gt;">
			<div class="news-wp" style="padding: 10px">
				<div class="news-date">
					<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
				</div>
				<div class="news-title">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				</div>
				<div class="news-text">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"  title="Читать новость" ><img src="/images/background/news/btn.png" style="float:right;margin: 7px 17px 1px 2px; " ></a>
					<?echo $arItem["PREVIEW_TEXT"];?>
						
				</div>
				
				
			</div>
	</div>
	<?if (!($i++ % 3)):?><div class="clear"></div><?endif;?>
<?endforeach;?>