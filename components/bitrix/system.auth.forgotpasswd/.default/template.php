<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN","Y");
?>

<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" id="form-validate">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	
<div class="fieldset">
<h2 class="legend">Восстановление пароля</h2>
<p>Пожалуйста, введите ваш адрес электронной почты (email). Вы получите ссылку для восстановления пароля.</p>
<ul class="form-list">
	<li>
		<label for="email_address" class="required"><em>*</em>Адрес электронной почты (email)</label>
		<div class="input-box">
			<input name="USER_EMAIL" alt="email" maxlength="255" id="email_address" class="input-text required-entry validate-email" type="text">
		</div>
	</li>
</ul>
</div>
	<div class="buttons-set">
        <p class="required">* Обязательные поля</p>
        <p class="back-link"><a href="<?=$arResult["AUTH_AUTH_URL"]?>"><small>← </small>Вернуться на форму авторизации</a></p>
        <button type="submit" name="send_account_info" title="Отправить" class="button"><span><span>Отправить</span></span></button>
    </div>	
	
</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
