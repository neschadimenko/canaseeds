<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="header-cart">
<?
if ($arResult["READY"]=="Y" || $arResult["DELAY"]=="Y" || $arResult["NOTAVAIL"]=="Y" || $arResult["SUBSCRIBE"]=="Y")
{
?><table class="hc-wrapper" border="0" cellpadding="0" cellspacing="0">
<tbody>
	<tr>
		<td class="hc-title">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td class="h-title">        
							<h3><a href="<?$arParams["PATH_TO_BASKET"]?>">Корзина</a></h3>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td class="hc-cart-info">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td class="a-right">
							<strong>Товара:</strong>
						</td>
						<td class="a-left">
							<span><?=$arResult['QUANTITY']?> шт</span>
						</td>
					</tr>
					<tr>
						<td class="a-right">
							<strong>Сумма:</strong>
						</td>
						<td class="a-left">
							<span><span class="price"><?=$arResult['SUM']?>&nbsp;грн.</span></span>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<?
	if ($arResult["READY"]=="Y")
	{
		
		
		if ('' != $arParams["PATH_TO_ORDER"])
		{
			?>
			<style type="text/css">
			.sendsubmit {
			width:  119px;  // длина кнопки
			height: 19px; // высота кнопки
			margin: 0;
			padding:0;
			border: 0;
			background: transparent url('/images/background/cart/cart_checkout.png') no-repeat center top;
			text-indent: -1000em;
			cursor: pointer; 
			cursor: hand; 
			}
			</style>
			<tr><td class="hc-cart-action"><form method="get" action="<?= $arParams["PATH_TO_ORDER"] ?>">
			<input type="submit" class="sendsubmit" value="">
			</form></td></tr><?
		}
	}
	if ($arResult["DELAY"]=="Y")
	{
		?><tr><td align="center"><?= GetMessage("TSBS_DELAY") ?></td></tr>
		<tr><td><ul>
		<?
		foreach ($arResult["ITEMS"] as &$v)
		{
			if ($v["DELAY"]=="Y" && $v["CAN_BUY"]=="Y")
			{
				?><li><?
				if ('' != $v["DETAIL_PAGE_URL"])
				{
					?><a href="<?echo $v["DETAIL_PAGE_URL"] ?>"><b><?echo $v["NAME"]?></b></a><?
				}
				else
				{
					?><b><?echo $v["NAME"]?></b><?
				}
				?><br />
				<?= GetMessage("TSBS_PRICE") ?>&nbsp;<b><?echo $v["PRICE_FORMATED"]?></b><br />
				<?= GetMessage("TSBS_QUANTITY") ?>&nbsp;<?echo $v["QUANTITY"]?>
				</li>
				<?
			}
		}
		if (isset($v))
			unset($v);
		?></ul></td></tr><?
		if ('' != $arParams["PATH_TO_BASKET"])
		{
			?><tr><td><form method="get" action="<?=$arParams["PATH_TO_BASKET"]?>">
			<input type="submit" value="<?= GetMessage("TSBS_2BASKET") ?>">
			</form></td></tr><?
		}
	}
	if ($arResult["SUBSCRIBE"]=="Y")
	{
		?><tr><td align="center"><?= GetMessage("TSBS_SUBSCRIBE") ?></td></tr>
		<tr><td><ul><?
		foreach ($arResult["ITEMS"] as &$v)
		{
			if ($v["CAN_BUY"]=="N" && $v["SUBSCRIBE"]=="Y")
			{
				?><li><?
				if ('' != $v["DETAIL_PAGE_URL"])
				{
					?><a href="<?echo $v["DETAIL_PAGE_URL"] ?>"><b><?echo $v["NAME"]?></b></a><?
				}
				else
				{
					?><b><?echo $v["NAME"]?></b><?
				}
				?></li><?
			}
		}
		if (isset($v))
			unset($v);
		?></ul></td></tr><?
	}
	if ($arResult["NOTAVAIL"]=="Y")
	{
		?><tr><td align="center"><?= GetMessage("TSBS_UNAVAIL") ?></td></tr>
		<tr><td><ul><?
		foreach ($arResult["ITEMS"] as &$v)
		{
			if ($v["CAN_BUY"]=="N" && $v["SUBSCRIBE"]=="N")
			{
				?><li><?
				if ('' != $v["DETAIL_PAGE_URL"])
				{
					?><a href="<?echo $v["DETAIL_PAGE_URL"] ?>"><b><?echo $v["NAME"]?></b></a><?
				}
				else
				{
					?><b><?echo $v["NAME"]?></b><?
				}
				?><br />
				<?= GetMessage("TSBS_PRICE") ?>&nbsp;<b><?echo $v["PRICE_FORMATED"]?></b><br />
				<?= GetMessage("TSBS_QUANTITY") ?>&nbsp;<?echo $v["QUANTITY"]?>
				</li><?
			}
		}
		if (isset($v))
			unset($v);
		?></ul></td></tr><?
	}
	?></tbody></table><?
}
else{
	?><table class="hc-wrapper" border="0" cellpadding="0" cellspacing="0">
<tbody>
	<tr>
		<td class="hc-title">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td class="h-title">        
							<h3><a href="<?$arParams["PATH_TO_BASKET"]?>">Корзина</a></h3>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td class="hc-cart-info">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td class="a-right">
							<strong>Товара:</strong>
						</td>
						<td class="a-left">
							<span><?=$arResult['QUANTITY']?> шт</span>
						</td>
					</tr>
					<tr>
						<td class="a-right">
							<strong>Сумма:</strong>
						</td>
						<td class="a-left">
							<span><span class="price"><?=$arResult['SUM']?>&nbsp;грн.</span></span>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<?
	if ($arResult["READY"]=="Y")
	{
		
		
		if ('' != $arParams["PATH_TO_ORDER"])
		{
			?>
			<style type="text/css">
			.sendsubmit {
			width:  119px;  // длина кнопки
			height: 19px; // высота кнопки
			margin: 0;
			padding:0;
			border: 0;
			background: transparent url('/images/background/cart/cart_checkout.png') no-repeat center top;
			text-indent: -1000em;
			cursor: pointer; 
			cursor: hand; 
			}
			</style>
			<tr><td class="hc-cart-action"><form method="get" action="<?= $arParams["PATH_TO_ORDER"] ?>">
			<input type="submit" class="sendsubmit" value="">
			</form></td></tr><?
		}
	}
	if ($arResult["DELAY"]=="Y")
	{
		?><tr><td align="center"><?= GetMessage("TSBS_DELAY") ?></td></tr>
		<tr><td><ul>
		<?
		foreach ($arResult["ITEMS"] as &$v)
		{
			if ($v["DELAY"]=="Y" && $v["CAN_BUY"]=="Y")
			{
				?><li><?
				if ('' != $v["DETAIL_PAGE_URL"])
				{
					?><a href="<?echo $v["DETAIL_PAGE_URL"] ?>"><b><?echo $v["NAME"]?></b></a><?
				}
				else
				{
					?><b><?echo $v["NAME"]?></b><?
				}
				?><br />
				<?= GetMessage("TSBS_PRICE") ?>&nbsp;<b><?echo $v["PRICE_FORMATED"]?></b><br />
				<?= GetMessage("TSBS_QUANTITY") ?>&nbsp;<?echo $v["QUANTITY"]?>
				</li>
				<?
			}
		}
		if (isset($v))
			unset($v);
		?></ul></td></tr><?
		if ('' != $arParams["PATH_TO_BASKET"])
		{
			?><tr><td><form method="get" action="<?=$arParams["PATH_TO_BASKET"]?>">
			<input type="submit" value="<?= GetMessage("TSBS_2BASKET") ?>">
			</form></td></tr><?
		}
	}
	if ($arResult["SUBSCRIBE"]=="Y")
	{
		?><tr><td align="center"><?= GetMessage("TSBS_SUBSCRIBE") ?></td></tr>
		<tr><td><ul><?
		foreach ($arResult["ITEMS"] as &$v)
		{
			if ($v["CAN_BUY"]=="N" && $v["SUBSCRIBE"]=="Y")
			{
				?><li><?
				if ('' != $v["DETAIL_PAGE_URL"])
				{
					?><a href="<?echo $v["DETAIL_PAGE_URL"] ?>"><b><?echo $v["NAME"]?></b></a><?
				}
				else
				{
					?><b><?echo $v["NAME"]?></b><?
				}
				?></li><?
			}
		}
		if (isset($v))
			unset($v);
		?></ul></td></tr><?
	}
	if ($arResult["NOTAVAIL"]=="Y")
	{
		?><tr><td align="center"><?= GetMessage("TSBS_UNAVAIL") ?></td></tr>
		<tr><td><ul><?
		foreach ($arResult["ITEMS"] as &$v)
		{
			if ($v["CAN_BUY"]=="N" && $v["SUBSCRIBE"]=="N")
			{
				?><li><?
				if ('' != $v["DETAIL_PAGE_URL"])
				{
					?><a href="<?echo $v["DETAIL_PAGE_URL"] ?>"><b><?echo $v["NAME"]?></b></a><?
				}
				else
				{
					?><b><?echo $v["NAME"]?></b><?
				}
				?><br />
				<?= GetMessage("TSBS_PRICE") ?>&nbsp;<b><?echo $v["PRICE_FORMATED"]?></b><br />
				<?= GetMessage("TSBS_QUANTITY") ?>&nbsp;<?echo $v["QUANTITY"]?>
				</li><?
			}
		}
		if (isset($v))
			unset($v);
		?></ul></td></tr><?
	}
	?></tbody></table><?
}
?>
</div>