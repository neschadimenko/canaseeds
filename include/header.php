<div class="block-all-pages-top-menu">
    <table>
        <tbody>
			<tr>
				<td class="left">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"horizontal_multilevel",
						Array(
							"ROOT_MENU_TYPE" => "top",
							"MAX_LEVEL" => "1",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "N",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => ""
						)
					);?>            
				</td>
				<td class="right">
					<ul class="top-menu-account">
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.auth.form",
							"auth",
							Array(
								"REGISTER_URL" => "/user/registration.php",
								"FORGOT_PASSWORD_URL" => "/user/",
								"PROFILE_URL" => "/user/profile.php",
								"SHOW_ERRORS" => "N"
							)
						);?>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<noscript>
	<div class="global-site-notice noscript">
		<div class="notice-inner">
			<p>
				<strong>JavaScript seems to be disabled in your browser.</strong><br />
				Вы должны включить JavaScript в вашем браузере, чтобы использовать функциональные возможности этого сайта.                
			</p>
		</div>
	</div>
</noscript>
<div class="page">
    <div class="header-container">
		<div class="header">
			<table class="table-header">
				<tbody>
					<tr>
						<td class="logo">
							<h1 class="logo"><strong>Cannaseeds Ukraine</strong><a href="/" title="Cannaseeds Ukraine" class="logo"><img src="/bitrix/templates/.default/images/logo.png" alt="Cannaseeds Ukraine"></a></h1>
						</td>
						<td class="search-wrapper">
							<?$APPLICATION->IncludeComponent(
								"bitrix:search.form",
								"serch",
								Array(
									"USE_SUGGEST" => "N",
									"PAGE" => "#SITE_DIR#search/index.php"
								)
							);?>
							<div class="top-contacts">
								<ul>
									<li class="mts"><?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => "/include/mts.php",
											"EDIT_TEMPLATE" => ""
										)
									);?></li>
									<li class="ks"><?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => "/include/ks.php",
											"EDIT_TEMPLATE" => ""
										)
									);?></li>
									<li class="life"><?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => "/include/life.php",
											"EDIT_TEMPLATE" => ""
										)
									);?></li>
								</ul>
								<button type="button" title="Обратный звонок" class="callback" data-url="http://can.sysint.net/ajax/data/getblock/id/callback/">
									<span>
										<span>Обратный звонок</span>
									</span>
								</button>
							</div>
							<div class="top-consultant">
								<a href="https://siteheart.com/webconsultation/649981?byhref=1" target="_blank" onclick="var o=window.open;o( 'https://siteheart.com/webconsultation/649981?', 'siteheart_sitewindow_649981', 'width=700,height=500,top=30,left=30,resizable=yes'); return false;" title="Нажмите, что бы связаться с On-line консультантом"><img alt="Нажмите, что бы связаться с On-line консультантом" src="/bitrix/templates/.default/images/consultant.png"></a>
							</div>
						</td>
						<td class="cart">
							<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.small", 
	"basket_small", 
	array(
		"PATH_TO_BASKET" => "/personal/basket.php",
		"PATH_TO_ORDER" => "/personal/order/",
		"SHOW_DELAY" => "Y",
		"SHOW_NOTAVAIL" => "Y",
		"SHOW_SUBSCRIBE" => "Y"
	),
	false
);?> 
						</td>
					</tr>
				</tbody>
			</table>
        </div>
	</div>
	<div class="nav-container">
		<ul id="nav">
			<li class="level0 nav-1 first last level-top"><a href="/catalog/" class="level-top"><span>Каталог</span></a></li> 
		</ul>
		<ul id="predefinedfilter">
			<li class="filter-1">
				<!--<a href="/catalog/feminised.php?q=фем&how=r">Фем</a>-->
				<a href="/catalog/19/">Фем</a>
			</li>
			<li class="filter-2">
				<a href="/catalog/feminised.php?q=авто-фем&how=r">Авто-фем</a>
			</li>
			<li class="filter-3">
				<a href="/catalog/feminised.php?q=рег&how=r">Рег</a>
			</li>
			<li class="filter-5">
				<a href="/catalog/feminised.php?q=авто-рег&how=r">Авто-рег</a>
			</li>
			<li class="filter-4 last">
				<a href="/catalog/feminised.php?q=микс&how=r">Миксы</a>
			</li>
		</ul> 
	</div>