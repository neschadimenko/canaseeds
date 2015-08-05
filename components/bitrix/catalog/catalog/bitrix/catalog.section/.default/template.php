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
$this->setFrameMode(true);?>
<?if (!empty($arResult['ITEMS']))
{?> 
<div class="col-main">
	<div class="wrapper-catalog-category">
		<div class="block-catalog-category-view">
			<div class="category-products">
				<!--<div class="sort-by">
					<label>Сортировать по:</label>
					<select onchange="setLocation(this.value)">
						<option value="http://can.sysint.net/katalog.html?dir=asc&amp;norobot=1&amp;order=position&amp;packing=67_68">
						Позиция        </option>
						<option value="http://can.sysint.net/katalog.html?dir=asc&amp;norobot=1&amp;order=name&amp;packing=67_68" selected="selected">
						Название        </option>
						<option value="http://can.sysint.net/katalog.html?dir=asc&amp;norobot=1&amp;order=price&amp;packing=67_68">
						Прайс        </option>
					</select>
					</div>-->
                <ol class="products-list" id="products-list">
				<?$i = 1;?>
				<?$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));?>
				<?foreach ($arResult['ITEMS'] as $key => $arItem){?>
				<pre><?//print_r($arItem)?></pre>
				<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);
	$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);?>
					<?if (!($i++ % 2)):?><li class="item odd" id="<?echo $strMainID?>">
					<?else:?><li class="item even" id="<?echo $strMainID?>">
					<?endif;?>
					    <a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>" title="<?echo $arItem['NAME'];?>" class="product-image">
							<img src="<? echo $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?echo $arItem['NAME'];?>" height="160" width="120">
						</a>
						<div class="product-shop">
							<div class="f-fix">
								<table class="product-list-table">
									<tbody>
										<tr>
											<td colspan="2" class="name">
												<h2 class="product-name"><a href="<?echo $arItem['DETAIL_PAGE_URL'];?>" title="<?echo $arItem['NAME'];?>"><?echo $arItem['NAME'];?></a></h2>
											</td>
										</tr>
										<tr>
											<td class="attributes">
											<ul class="block-attributes-catalog-list">
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['CML2_MANUFACTURER']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['CML2_MANUFACTURER']['NAME'];?> - <?echo $arItem['PROPERTIES']['CML2_MANUFACTURER']['VALUE'];?>" src="/images/properties/ico_r.png">
													<span><?echo $arItem['PROPERTIES']['CML2_MANUFACTURER']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['TIP']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['TIP']['NAME'];?> - <?echo $arItem['PROPERTIES']['TIP']['VALUE'];?>" src="/images/properties/ico_type.png">
													<span><?echo $arItem['PROPERTIES']['TIP']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['VID_1']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['VID_1']['NAME'];?> - <?echo $arItem['PROPERTIES']['VID_1']['VALUE'];?>" src="/images/properties/ico_aspect.png">
													<span><?echo $arItem['PROPERTIES']['VID_1']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['GENETIKA_2']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['GENETIKA_2']['NAME'];?> - <?echo $arItem['PROPERTIES']['GENETIKA_2']['VALUE'];?>" src="/images/properties/ico_gen.png">
													<span><?echo $arItem['PROPERTIES']['GENETIKA_2']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['PRIMENENIE_2']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['PRIMENENIE_2']['NAME'];?> - <?echo $arItem['PROPERTIES']['PRIMENENIE_2']['VALUE'];?>" src="/images/properties/ico_appl.png">
													<span><?echo $arItem['PROPERTIES']['PRIMENENIE_2']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['ROST_2']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['ROST_2']['NAME'];?> - <?echo $arItem['PROPERTIES']['ROST_2']['VALUE'];?>" src="/images/properties/ico_grow.png">
													<span><?echo $arItem['PROPERTIES']['ROST_2']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['TGK_2']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['TGK_2']['NAME'];?> - <?echo $arItem['PROPERTIES']['TGK_2']['VALUE'];?>" src="/images/properties/ico_tgk.png">
													<span><?echo $arItem['PROPERTIES']['TGK_2']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['TSVETENIE_1']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['TSVETENIE_1']['NAME'];?> - <?echo $arItem['PROPERTIES']['TSVETENIE_1']['VALUE'];?>" src="/images/properties/ico-flowering.png">
													<span><?echo $arItem['PROPERTIES']['TSVETENIE_1']['VALUE'];?></span>
												</li>
												<li>
													<img alt="<?echo $arItem['PROPERTIES']['UROZHAY_2']['NAME'];?>" title="<?echo $arItem['PROPERTIES']['UROZHAY_2']['NAME'];?> - <?echo $arItem['PROPERTIES']['UROZHAY_2']['VALUE'];?>" src="/images/properties/ico_harv.png">
													<span><?echo $arItem['PROPERTIES']['UROZHAY_2']['VALUE'];?></span>
												</li>
											</ul>
											</td>
											<td class="b-price">
												<?if (strlen($arItem['OFFERS']['0']['PROPERTIES']['SHTUK_V_UPAKOVKE']['VALUE']) > 0):?>
													<div class="offers_block">
														<p class="in_pack">Штук в упаковке</p>
														<ul class="offers_list" data-obj="<?=$strObName?>">
														<?$i = 0;
														foreach ($arItem['OFFERS'] as $arOffer):?>
															<li><a href="#" class="<?=$i == 0 ? "active" : ""?>" data-id="<?=$arOffer["ID"]?>"><?echo $arOffer['PROPERTIES']['SHTUK_V_UPAKOVKE']['VALUE'];?></a></li>
														<?$i++;
														endforeach;?>
														</ul>
													</div>
												<?endif;?>													
												<div class="Oprice" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
													<link itemprop="availability" href="http://schema.org/InStock" content="In Stock">
													<meta itemprop="priceCurrency" content="UAH">
													<div class="price-box" property="v:pricerange" style="max-width: 100%;">
														<span class="regular-price" id="product-price-14">
															<span itemprop="price" class="price"><?=!empty($arItem['OFFERS']) ? $arItem['OFFERS'][0]['MIN_PRICE']['PRINT_VALUE'] : $arItem['MIN_PRICE']['PRINT_VALUE']?></span>
														</span>
													</div>
												</div>
												<?//echo "<pre>";print_r($arItem["BUY_URL"]);echo "</pre>";?>
												<!--<p><button type="button" title="Купить" class="button btn-cart" onclick="setLocation('<?=$location?>')"><span><span>Купить</span></span></button></p>-->
												<a href="<?=!empty($arItem['OFFERS']) ? $arItem['OFFERS'][0]["BUY_URL"] : $arItem['DETAIL_PAGE_URL'];?>" title="<?echo $arItem['NAME'];?>" class="button btn-cart buy_link" style="text-decoration: none;"><span><span>Купить</span></span></a>
											</td>
										</tr>
										<tr>
											<td colspan="2" class="b-another">
												<!--<div class="cataloglist-item-compare clic-cmp UI-CATALOGCOMPARE-ADD-3">
													<a class="catalogcompare-add link-compare" href="<?=$arItem['COMPARE_URL']?>">К сравнению</a>
												</div>-->
												<div class="bx_catalog_item_controls_blocktwo">
													<a id="<? echo $strMainID.'_compare_link'; ?>" class="catalogcompare-add link-compare" href="javascript:void(0)">К сравнению</a>
													 
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					
				
<?
	$arItemIDs = array(
		'ID' => $strMainID,
		'PICT' => $strMainID.'_pict',
		'SECOND_PICT' => $strMainID.'_secondpict',
		'STICKER_ID' => $strMainID.'_sticker',
		'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
		'QUANTITY' => $strMainID.'_quantity',
		'QUANTITY_DOWN' => $strMainID.'_quant_down',
		'QUANTITY_UP' => $strMainID.'_quant_up',
		'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
		'BUY_LINK' => $strMainID.'_buy_link',
		'BASKET_ACTIONS' => $strMainID.'_basket_actions',
		'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
		'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
		'COMPARE_LINK' => $strMainID.'_compare_link',

		'PRICE' => $strMainID.'_price',
		'DSC_PERC' => $strMainID.'_dsc_perc',
		'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',
		'PROP_DIV' => $strMainID.'_sku_tree',
		'PROP' => $strMainID.'_prop_',
		'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
		'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	);

	//echo "<pre>";print_r($strObName);echo "</pre>";
				$arJSParams = array(
					'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
					'SHOW_QUANTITY' => ($arParams['USE_PRODUCT_QUANTITY'] == 'Y'),
					'SHOW_ADD_BASKET_BTN' => false,
					'SHOW_BUY_BTN' => true,
					'SHOW_ABSENT' => true,
					'SHOW_SKU_PROPS' => $arItem['OFFERS_PROPS_DISPLAY'],
					'SECOND_PICT' => $arItem['SECOND_PICT'],
					'SHOW_OLD_PRICE' => ('Y' == $arParams['SHOW_OLD_PRICE']),
					'SHOW_DISCOUNT_PERCENT' => ('Y' == $arParams['SHOW_DISCOUNT_PERCENT']),
					'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
					'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] == 'Y'),
					'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
					'DEFAULT_PICTURE' => array(
						'PICTURE' => $arItem['PRODUCT_PREVIEW'],
						'PICTURE_SECOND' => $arItem['PRODUCT_PREVIEW_SECOND']
					),
					'VISUAL' => array(
						'ID' => $arItemIDs['ID'],
						'PICT_ID' => $arItemIDs['PICT'],
						'SECOND_PICT_ID' => $arItemIDs['SECOND_PICT'],
						'QUANTITY_ID' => $arItemIDs['QUANTITY'],
						'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
						'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
						'QUANTITY_MEASURE' => $arItemIDs['QUANTITY_MEASURE'],
						'PRICE_ID' => $arItemIDs['PRICE'],
						'TREE_ID' => $arItemIDs['PROP_DIV'],
						'TREE_ITEM_ID' => $arItemIDs['PROP'],
						'BUY_ID' => $arItemIDs['BUY_LINK'],
						'ADD_BASKET_ID' => $arItemIDs['ADD_BASKET_ID'],
						'DSC_PERC' => $arItemIDs['DSC_PERC'],
						'SECOND_DSC_PERC' => $arItemIDs['SECOND_DSC_PERC'],
						'DISPLAY_PROP_DIV' => $arItemIDs['DISPLAY_PROP_DIV'],
						'BASKET_ACTIONS_ID' => $arItemIDs['BASKET_ACTIONS'],
						'NOT_AVAILABLE_MESS' => $arItemIDs['NOT_AVAILABLE_MESS'],
						'COMPARE_LINK_ID' => $arItemIDs['COMPARE_LINK']
					),
					'BASKET' => array(
						'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
						'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
						'SKU_PROPS' => $arItem['OFFERS_PROP_CODES'],
						'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
						'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
					),
					'PRODUCT' => array(
						'ID' => $arItem['ID'],
						'NAME' => $arItem["NAME"]
					),
					'OFFERS' => $arItem['JS_OFFERS'],
					'OFFER_SELECTED' => $arItem['OFFERS_SELECTED'],
					'TREE_PROPS' => $arSkuProps,
					'LAST_ELEMENT' => $arItem['LAST_ELEMENT']
				);
				if ($arParams['DISPLAY_COMPARE'])
				{
					$arJSParams['COMPARE'] = array(
						'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
						'COMPARE_PATH' => $arParams['COMPARE_PATH']
					);
				}
				?><pre><?//print_r($arJSParams);?></pre><?//Koval Roman  */
				?>
<script type="text/javascript">
var <?=$strObName?> = new JCCatalogSection(<?=CUtil::PhpToJSObject($arJSParams, false, true)?>);
// Koval Roman begin
this.compareData = {
		compareUrl: '',  
		comparePath: '' 
	};

this.compareData.compareUrl = '<?echo $arJSParams['COMPARE']['COMPARE_URL_TEMPLATE'];?>';


window.JCCatalogSection.prototype.Compare<?=$key?> = function()
{
	var compareParams, compareLink;  
	var iddd;
	iddd = '<?echo $arJSParams['OFFERS']['0']['ID'];?>';
	var Koval;
	
		compareLink = this.compareData.compareUrl.replace('#ID#', '<?echo $arJSParams['OFFERS']['0']['ID'];?>'); 
		
		compareParams = {
			ajax_action: 'Y'
		};
		BX.ajax.loadJSON(
			compareLink,
			compareParams,
			BX.proxy(this.JCCatalogSection.prototype.CompareResult<?=$key?>, this)
		);
	
};

window.JCCatalogSection.prototype.CompareResult<?=$key?> = function(result)
{
	var popupContent, popupButtons, popupTitle;
	
// 	if (!!this.obPopupWin)
	if (!!<?=$strObName;?>.obPopupWin)
	{
		<?=$strObName;?>.obPopupWin.close();
	}
	if (typeof result !== 'object')
	{
		return false;
	}
	window.JCCatalogSection.prototype.InitPopupWindow<?=$key?>();
	popupTitle = {
		content: BX.create('div', {
			style: { marginRight: '30px', whiteSpace: 'nowrap' },
			text: BX.message('COMPARE_TITLE')
		})
	};
	if (result.STATUS === 'OK')
	{
		BX.onCustomEvent('OnCompareChange');
		popupContent = '<div style="width: 96%; margin: 10px 2%; text-align: center;"><p>'+BX.message('COMPARE_MESSAGE_OK')+'</p></div>';
		if (<?=$strObName;?>.showClosePopup)
		{
			popupButtons = [
				new BasketButton({
					ownerClass: <?=$strObName;?>.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_COMPARE_REDIRECT'),
					events: {
						click: BX.delegate(this.CompareRedirect, this)
					},
					style: {marginRight: '10px'}
				}),
				new BasketButton({
					ownerClass: <?=$strObName;?>.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_CLOSE_POPUP'),
					events: {
						click: BX.delegate(this.obPopupWin.close, this.obPopupWin)
					}
				})
			];
		}
		else
		{
			popupButtons = [
				new window.BasketButton({
					ownerClass: <?=$strObName;?>.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_COMPARE_REDIRECT'),
					events: {
						click: BX.delegate(<?=$strObName;?>.CompareRedirect, <?=$strObName;?>)
					}
				})
			];
		}
	}
	else
	{
		popupContent = '<div style="width: 96%; margin: 10px 2%; text-align: center;"><p>'+(!!result.MESSAGE ? result.MESSAGE : BX.message('COMPARE_UNKNOWN_ERROR'))+'</p></div>';
		popupButtons = [
			new window.BasketButton({
				ownerClass: <?=$strObName;?>.obProduct.parentNode.parentNode.className,
				text: BX.message('BTN_MESSAGE_CLOSE'),
				events: {
					click: BX.delegate(<?=$strObName;?>.obPopupWin.close, this.obPopupWin)
				}

			})
		];
	}
	<?=$strObName;?>.obPopupWin.setTitleBar(popupTitle);
	<?=$strObName;?>.obPopupWin.setContent(popupContent);
	<?=$strObName;?>.obPopupWin.setButtons(popupButtons);
	<?=$strObName;?>.obPopupWin.show();
	return false;
};
window.JCCatalogSection.prototype.InitPopupWindow<?=$key?> = function()
{ 
	if (!!<?=$strObName;?>.obPopupWin)
	{
		return;
	}
	<?=$strObName;?>.obPopupWin = BX.PopupWindowManager.create('CatalogSectionBasket_'+'<?echo $arJSParams['VISUAL']['ID'] ?>', null, {
		autoHide: false,
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		closeByEsc: true,
		titleBar: true,
		closeIcon: {top: '10px', right: '10px'}
	});
};
this.obCompare<?=$key?> = BX('<?echo $arJSParams['VISUAL']['COMPARE_LINK_ID']?>');
if (!!this.obCompare<?=$key?>) 
{
	BX.bind(this.obCompare<?=$key?>, 'click', BX.proxy(this.JCCatalogSection.prototype.Compare<?=$key?>, this));
}
// Koval Roman end
</script></li>
				<?}?>

<?}?>
<script type="text/javascript">
BX.message({
	BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
	BASKET_URL: '<? echo $arParams["BASKET_URL"]; ?>',
	ADD_TO_BASKET_OK: '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
	TITLE_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
	TITLE_BASKET_PROPS: '<? echo GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
	TITLE_SUCCESSFUL: '<? echo GetMessageJS('ADD_TO_BASKET_OK'); ?>',
	BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
	BTN_MESSAGE_SEND_PROPS: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
	BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
	BTN_MESSAGE_CLOSE_POPUP: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP'); ?>',
	BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
	COMPARE_MESSAGE_OK: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
	COMPARE_UNKNOWN_ERROR: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
	COMPARE_TITLE: '<? echo GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
	BTN_MESSAGE_COMPARE_REDIRECT: '<? echo GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
	SITE_ID: '<? echo SITE_ID; ?>'
});
</script>