<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN","Y");
?>
<?
ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>

<div class="account-login">
	<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>
		<div class="col2-set">
			<div class="col-1 new-users">
				<div class="content">
					<h2>Новые клиенты</h2>
					<p>Создав учётную запись на нашем сайте, вы будете 
	тратить меньше времени на оформление заказа, сможете хранить несколько 
	адресов доставки, отслеживать состояние заказов, а также многое другое.</p>
				</div>
			</div>
			<div class="col-2 registered-users">
				<div class="content">
					<h2>Зарегистрированные клиенты</h2>
                    <p>Если у вас есть учётная запись на нашем сайте, пожалуйста, авторизируйтесь.</p>
                    
                    <p class="login-switch-title">Для авторизации на сайте вы можете использовать:</p>
					<ul class="login-switch">
						<li id="email">
                            <span class="" rel="email">Электронная почта (email)</span>
                        </li>
						<li id="phone">
                            <span class="sel" rel="phone">Телефон</span>
                        </li>
					</ul>
					<ul class="form-list">
						<li>
                            <div class="input-box">
                                <input name="USER_LOGIN" id="email" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" class="input-text required-entry inp-email" title="Адрес электронной почты (email)" type="text">
                            </div>
                        </li>
						<li>
                            <label for="pass" class="required"><em>*</em><?echo GetMessage("AUTH_PASSWORD")?></label>
                            <div class="input-box">
                                <input name="USER_PASSWORD" class="input-text required-entry validate-password" maxlength="255" id="pass" title="Пароль" type="password">
                            </div>
                        </li>
						<li>
				
							<?if($arResult["CAPTCHA_CODE"]):?>
								<tr>
									<td></td>
									<td><input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
									<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></td>
								</tr>
								<tr>
									<td class="bx-auth-label"><?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:</td>
									<td><input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" /></td>
								</tr>
							<?endif;?>
						</li>
						<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
							<li id="remember-me-box" class="control">
								<div class="input-box">
									<input name="USER_REMEMBER" class="checkbox" id="remember_mey6DWLGHHre" checked="checked" title="Запомнить меня" type="checkbox">
								</div>
								<label for="remember_mey6DWLGHHre">Запомнить меня</label>
							</li>		
						<?endif?>
						</ul>
						<script type="text/javascript">
//<![CDATA[
    function toggleRememberMepopup(event){
        if($('remember-me-popup')){
            var viewportHeight = document.viewport.getHeight(),
                docHeight      = $$('body')[0].getHeight(),
                height         = docHeight > viewportHeight ? docHeight : viewportHeight;
            $('remember-me-popup').toggle();
            $('window-overlay').setStyle({ height: height + 'px' }).toggle();
        }
        Event.stop(event);
    }

    document.observe("dom:loaded", function() {
        new Insertion.Bottom($$('body')[0], $('window-overlay'));
        new Insertion.Bottom($$('body')[0], $('remember-me-popup'));

        $$('.remember-me-popup-close').each(function(element){
            Event.observe(element, 'click', toggleRememberMepopup);
        })
        $$('#remember-me-box a').each(function(element) {
            Event.observe(element, 'click', toggleRememberMepopup);
        });
    });
//]]>
</script>
                    <p class="required">* Обязательные поля</p>
				</div>
			</div>
		</div>
		<div class="col2-set">
		<?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
		<noindex>	
			<div class="col-1 new-users">
                <div class="buttons-set">
                    <button type="button" title="Создать учётную запись" class="button" onclick="window.location='<?=$arResult["AUTH_REGISTER_URL"]?>';"><span><span>Создать учётную запись</span></span></button>
				</div>
            </div>
		</noindex>
		<?endif?>
		<div class="col-2 registered-users">
			<div class="buttons-set">
			<?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
			<noindex>
				<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" class="f-left">Забыли пароль?</a>
			</noindex>
			<?endif?>
				<button type="submit" class="button" title="<?=GetMessage("AUTH_AUTHORIZE")?>" name="send" id="send2"><span><span><?=GetMessage("AUTH_AUTHORIZE")?></span></span></button>
			</div>
		</div>
		</div>
	</form>
	<script type="text/javascript">
    //<![CDATA[
        var dataForm = new VarienForm('login-form', true);
    //]]>
    </script>
</div>

<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>