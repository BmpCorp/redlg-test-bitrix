<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Кроссовки-кроссовочки");
$APPLICATION->SetTitle("Кроссовки-кроссовочки");
?><?$APPLICATION->IncludeComponent(
	"redlg:sneakers.slider", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_ID" => "12",
		"SHOW_DESCRIPTION" => "Y",
		"SHOW_PRICE" => "Y"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>