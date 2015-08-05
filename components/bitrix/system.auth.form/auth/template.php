<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>


<?if($arResult["FORM_TYPE"] == "login"):?>
	<li>
		<a class="enter" href="/user/" title="Войти">Войти</a>
	</li>
	<li>
		<a class="customer" href="<?=$arResult["AUTH_REGISTER_URL"]?>" title="Регистрация">Регистрация</a>
	</li>

<?
else:
?>
	<li>
		<a class="customer" href="<?=$arResult["PROFILE_URL"]?>" title="Личный раздел">Личный раздел</a>
	</li>
	<li>
		<a class="enter" href="<?=$APPLICATION->GetCurPageParam("logout=yes", array(
     "login",
     "logout",
     "register",
     "forgot_password",
     "change_password"));?>" title="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>"><?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
	</li>
	
<?endif?>
