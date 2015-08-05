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
<?
$arElements = $APPLICATION->IncludeComponent(
	"bitrix:search.page",
	".default",
	Array(
		"RESTART" => $arParams["RESTART"],
		"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"],
		"USE_LANGUAGE_GUESS" => $arParams["USE_LANGUAGE_GUESS"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"SHOW_WHERE" => "N",
		"arrWHERE" => array(),
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => 50,
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "N",
	),
	$component,
	array('HIDE_ICONS' => 'Y')
);
if (!empty($arElements) && is_array($arElements))
{
	global $searchFilter;
	$searchFilter = array(
		"=ID" => $arElements,
	);
	/*
	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		".default",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
			"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
			"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
			"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
			"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFERS_LIMIT" => $arParams["OFFERS_LIMIT"],
			"SECTION_URL" => $arParams["SECTION_URL"],
			"DETAIL_URL" => $arParams["DETAIL_URL"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"DISPLAY_COMPARE" => $arParams["DISPLAY_COMPARE"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
			"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
			"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
			"CURRENCY_ID" => $arParams["CURRENCY_ID"],
			"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"FILTER_NAME" => "searchFilter",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SECTION_USER_FIELDS" => array(),
			"INCLUDE_SUBSECTIONS" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"META_KEYWORDS" => "",
			"META_DESCRIPTION" => "",
			"BROWSER_TITLE" => "",
			"ADD_SECTIONS_CHAIN" => "N",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
			//default_properties
				
				
		),
		$arResult["THEME_COMPONENT"],
		array('HIDE_ICONS' => 'Y')
	);
	*/
	//catalog
	$APPLICATION->IncludeComponent(
			"bitrix:catalog",
			"catalog_search",
			array(
					"SECTIONS_VIEW_MODE" => "LIST",
					"SECTIONS_SHOW_PARENT_NAME" => "Y",
					"FILTER_VIEW_MODE" => "VERTICAL",
					"TEMPLATE_THEME" => "blue",
					"ADD_PICT_PROP" => "-",
					"LABEL_PROP" => "-",
					"PRODUCT_DISPLAY_MODE" => "Y",
					"OFFER_ADD_PICT_PROP" => "-",
					"OFFER_TREE_PROPS" => array(
							0 => "SHTUK_V_UPAKOVKE",
							1 => "TIP",
							2 => "CML2_MANUFACTURER",
							3 => "MOSHCHNOST",
							4 => "SVETOVOY_POTOK",
							5 => "TIP_LAMPY",
							6 => "TSVETOVAYA_TEMPERATURA",
					),
					"DETAIL_DISPLAY_NAME" => "Y",
					"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
					"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
					"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
					"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
					"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
					"COMMON_SHOW_CLOSE_POPUP" => "N",
					"TOP_ADD_TO_BASKET_ACTION" => "ADD",
					"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
					"DETAIL_ADD_TO_BASKET_ACTION" => array(
					),
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_OLD_PRICE" => "Y",
					"DETAIL_SHOW_MAX_QUANTITY" => "Y",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_COMPARE" => "Сравнение",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"DETAIL_USE_VOTE_RATING" => "N",
					"DETAIL_USE_COMMENTS" => "N",
					"DETAIL_BRAND_USE" => "N",
					"USE_SALE_BESTSELLERS" => "Y",
					"USE_BIG_DATA" => "Y",
					"BIG_DATA_RCM_TYPE" => "any",
					"TOP_VIEW_MODE" => "SECTION",
					"AJAX_MODE" => "N",
					"SEF_MODE" => "Y",
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"USE_FILTER" => "N",
					"USE_REVIEW" => "N",
					"USE_COMPARE" => "Y",
					"SHOW_TOP_ELEMENTS" => "Y",
					"SECTION_COUNT_ELEMENTS" => "Y",
					"SECTION_TOP_DEPTH" => "2",
					"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
					"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
					"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"LIST_PROPERTY_CODE" => array(),
					"INCLUDE_SUBSECTIONS" => "Y",
					"LIST_META_KEYWORDS" => "-",
					"LIST_META_DESCRIPTION" => "-",
					"LIST_BROWSER_TITLE" => "-",
					"DETAIL_PROPERTY_CODE" => array(
							0 => "CML2_MANUFACTURER",
							1 => "TIP",
							2 => "VID_1",
							3 => "GENETIKA_2",
							4 => "PRIMENENIE_2",
							5 => "ROST_2",
							6 => "TGK_2",
							7 => "TSVETENIE_1",
							8 => "UROZHAY_2",
							9 => "",
					),
					"DETAIL_META_KEYWORDS" => "-",
					"DETAIL_META_DESCRIPTION" => "-",
					"DETAIL_BROWSER_TITLE" => "-",
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "Y",
					"ADD_SECTIONS_CHAIN" => "Y",
					"ADD_ELEMENT_CHAIN" => "Y",
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"PRICE_VAT_SHOW_VALUE" => "N",
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"PARTIAL_PRODUCT_PROPERTIES" => "Y",
					"PRODUCT_PROPERTIES" => array(
							0 => "CML2_MANUFACTURER",
							1 => "TIP",
							2 => "VID",
							3 => "GENETIKA",
							4 => "PRIMENENIE_1",
							5 => "CML2_TRAITS",
							6 => "CML2_TAXES",
							7 => "CML2_ATTRIBUTES",
							8 => "ROST",
							9 => "TGK_1",
							10 => "UROZHAY",
							11 => "SHTUK_V_UPAKOVKE",
							12 => "TSVETENIE",
							13 => "MOSHCHNOST",
							14 => "SVETOVOY_POTOK",
							15 => "TIP_LAMPY",
							16 => "TSVETOVAYA_TEMPERATURA",
					),
					"LINK_IBLOCK_TYPE" => "",
					"LINK_IBLOCK_ID" => "",
					"LINK_PROPERTY_SID" => "",
					"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
					"USE_ALSO_BUY" => "N",
					"USE_STORE" => "Y",
					"USE_ELEMENT_COUNTER" => "Y",
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"] ,
					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => "Товары",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"LIST_OFFERS_FIELD_CODE" => array(
							0 => "",
							1 => "",
					),
					"LIST_OFFERS_PROPERTY_CODE" => array(
							0 => "SHTUK_V_UPAKOVKE",
							1 => "SHTUK_V_UPAKOVKE_CHISLO",
							2 => "TIP",
							3 => "VID",
							4 => "CML2_ARTICLE",
							5 => "CML2_BASE_UNIT",
							6 => "GENETIKA",
							7 => "MORE_PHOTO",
							8 => "CML2_MANUFACTURER",
							9 => "CML2_TRAITS",
							10 => "CML2_TAXES",
							11 => "FILES",
							12 => "CML2_ATTRIBUTES",
							13 => "CML2_BAR_CODE",
							14 => "PRIMENENIE",
							15 => "PRIMENENIE_1",
							16 => "ROST",
							17 => "GENETIKA_1",
							18 => "TGK",
							19 => "ROST_1",
							20 => "TGK_1",
							21 => "UROZHAY",
							22 => "KOMMENTARII_POKUPATELYA",
							23 => "MNOZHESTVENNYE_SVOYSTVA_DLYA_FILTRA",
							24 => "METOD_OPLATY",
							25 => "METOD_OPLATY_ID",
							26 => "SPOSOB_DOSTAVKI",
							27 => "ZAKAZ_OPLACHEN",
							28 => "DOSTAVKA_RAZRESHENA",
							29 => "OTMENEN",
							30 => "FINALNYY_STATUS",
							31 => "STATUS_ZAKAZA",
							32 => "STATUSA_ZAKAZA_ID",
							33 => "DATA_IZMENENIYA_STATUSA",
							34 => "SAYT",
							35 => "ADRES_DOSTAVKI",
							36 => "UPAKOVKA",
							37 => "TSVETENIE",
							38 => "TIP_1",
							39 => "TSVETENIE_1",
							40 => "TSVETENIE_POLNYY_TSIKL_DLYA_AVTO",
							41 => "ID_ZVONOK",
							42 => "UROZHAY_1",
							43 => "VID_1",
							44 => "GENETIKA_2",
							45 => "PRIMENENIE_2",
							46 => "TGK_2",
							47 => "UROZHAY_2",
							48 => "ROST_2",
							49 => "DATA_OTMENY_ZAKAZA",
							50 => "PRICHINA_OTMENY",
							51 => "DATA_OPLATY",
							52 => "DATA_RAZRESHENIYA_DOSTAVKI",
							53 => "DOP_SVEDENIYA",
							54 => "LAMPY",
							55 => "MOSHCHNOST",
							56 => "SVETOVOY_POTOK",
							57 => "TIP_LAMPY",
							58 => "TSVETOVAYA_TEMPERATURA",
							59 => "",
					),
					"LIST_OFFERS_LIMIT" => "5",
					"DETAIL_OFFERS_FIELD_CODE" => array(
							0 => "",
							1 => "",
					),
					"DETAIL_OFFERS_PROPERTY_CODE" => array(
							0 => "SHTUK_V_UPAKOVKE",
							1 => "",
					),
					"TOP_ELEMENT_COUNT" => "9",
					"TOP_LINE_ELEMENT_COUNT" => "3",
					"TOP_ELEMENT_SORT_FIELD" => "sort",
					"TOP_ELEMENT_SORT_ORDER" => "asc",
					"TOP_ELEMENT_SORT_FIELD2" => "id",
					"TOP_ELEMENT_SORT_ORDER2" => "desc",
					"TOP_PROPERTY_CODE" => array(
							0 => "",
							1 => "",
					),
					"TOP_OFFERS_FIELD_CODE" => array(
							0 => "",
							1 => "",
					),
					"TOP_OFFERS_PROPERTY_CODE" => array(
							0 => "",
							1 => "",
					),
					"TOP_OFFERS_LIMIT" => "5",
					"FILTER_NAME" => "searchFilter",
					"FILTER_FIELD_CODE" => array(
							0 => "",
							1 => "",
					),
					"FILTER_PROPERTY_CODE" => array(
							0 => "CML2_MANUFACTURER",
							1 => "TIP",
							2 => "VID_1",
							3 => "VID",
							4 => "GENETIKA_2",
							5 => "SHTUK_V_UPAKOVKE_CHISLO",
							6 => "PRIMENENIE_2",
							7 => "GENETIKA",
							8 => "ROST_2",
							9 => "TGK_2",
							10 => "PRIMENENIE",
							11 => "TSVETENIE_1",
							12 => "UROZHAY_2",
							13 => "CML2_ARTICLE",
							14 => "CML2_BASE_UNIT",
							15 => "PRIMENENIE_1",
							16 => "CML2_TRAITS",
							17 => "CML2_TAXES",
							18 => "CML2_ATTRIBUTES",
							19 => "CML2_BAR_CODE",
							20 => "ROST",
							21 => "GENETIKA_1",
							22 => "TGK",
							23 => "ROST_1",
							24 => "TGK_1",
							25 => "UROZHAY",
							26 => "KOMMENTARII_POKUPATELYA",
							27 => "SHTUK_V_UPAKOVKE",
							28 => "MNOZHESTVENNYE_SVOYSTVA_DLYA_FILTRA",
							29 => "METOD_OPLATY",
							30 => "METOD_OPLATY_ID",
							31 => "SPOSOB_DOSTAVKI",
							32 => "ZAKAZ_OPLACHEN",
							33 => "DOSTAVKA_RAZRESHENA",
							34 => "OTMENEN",
							35 => "FINALNYY_STATUS",
							36 => "STATUS_ZAKAZA",
							37 => "STATUSA_ZAKAZA_ID",
							38 => "DATA_IZMENENIYA_STATUSA",
							39 => "SAYT",
							40 => "ADRES_DOSTAVKI",
							41 => "UPAKOVKA",
							42 => "TSVETENIE",
							43 => "TIP_1",
							44 => "TSVETENIE_POLNYY_TSIKL_DLYA_AVTO",
							45 => "ID_ZVONOK",
							46 => "UROZHAY_1",
							47 => "DATA_OTMENY_ZAKAZA",
							48 => "PRICHINA_OTMENY",
							49 => "DATA_OPLATY",
							50 => "DATA_RAZRESHENIYA_DOSTAVKI",
							51 => "DOP_SVEDENIYA",
							52 => "LAMPY",
							53 => "MOSHCHNOST",
							54 => "SVETOVOY_POTOK",
							55 => "TIP_LAMPY",
							56 => "TSVETOVAYA_TEMPERATURA",
							57 => "",
					),
					"FILTER_PRICE_CODE" => array(
							0 => "BASE",
							1 => "Для сайта",
							2 => "соглашение",
					),
					"FILTER_OFFERS_FIELD_CODE" => array(
							0 => "",
							1 => "",
					),
					"FILTER_OFFERS_PROPERTY_CODE" => array(
							0 => "SHTUK_V_UPAKOVKE",
							1 => "SHTUK_V_UPAKOVKE_CHISLO",
							2 => "TIP",
							3 => "",
					),
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
					"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER2" => "desc",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"SEF_FOLDER" => "/catalog/",
					"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
					"COMPARE_FIELD_CODE" => array(
							0 => "NAME",
							1 => "PREVIEW_PICTURE",
							2 => "",
					),
					"COMPARE_PROPERTY_CODE" => array(
							0 => "CML2_MANUFACTURER",
							1 => "",
					),
					"COMPARE_OFFERS_FIELD_CODE" => array(
							0 => "NAME",
							1 => "PREVIEW_PICTURE",
							2 => "DETAIL_PICTURE",
							3 => "",
					),
					"COMPARE_OFFERS_PROPERTY_CODE" => array(
							0 => "",
							1 => "",
					),
					"COMPARE_ELEMENT_SORT_FIELD" => "sort",
					"COMPARE_ELEMENT_SORT_ORDER" => "asc",
					"DISPLAY_ELEMENT_SELECT_BOX" => "N",
					"COMPARE_POSITION_FIXED" => "Y",
					"COMPARE_POSITION" => "top left",
					"DETAIL_SHOW_BASIS_PRICE" => "Y",
					"STORES" => array(
							0 => "2",
					),
					"USE_MIN_AMOUNT" => "N",
					"USER_FIELDS" => array(
							0 => "",
							1 => "",
					),
					"FIELDS" => array(
							0 => "",
							1 => "",
					),
					"MIN_AMOUNT" => "10",
					"SHOW_EMPTY_STORE" => "N",
					"SHOW_GENERAL_STORE_INFORMATION" => "N",
					"STORE_PATH" => "/store/#store_id#",
					"MAIN_TITLE" => "Есть в наличии",
					"DETAIL_BLOG_USE" => "Y",
					"DETAIL_BLOG_URL" => "catalog_comments",
					"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
					"DETAIL_VK_USE" => "Y",
					"DETAIL_VK_API_ID" => "API_ID",
					"DETAIL_FB_USE" => "N",
					"SEF_URL_TEMPLATES" => array(
							"sections" => "",
							"section" => "#SECTION_ID#/",
							"element" => "#SECTION_ID#/#ELEMENT_ID#/",
							"compare" => "compare",
					)
			),
			false
	);
	
	
}
else
{
	//echo GetMessage("CT_BCSE_NOT_FOUND");
}
?>