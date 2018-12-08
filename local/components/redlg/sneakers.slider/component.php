<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arSelectFields = ["ID", "NAME", "PROPERTY_PICTURE"];
if ($arParams["SHOW_PRICE"] === "Y") {
    $arSelectFields[] = "PROPERTY_PRICE";
    $arSelectFields[] = "PROPERTY_CURRENCY";
}
if ($arParams["SHOW_DESCRIPTION"] === "Y") {
    $arSelectFields[] = "PROPERTY_DESCRIPTION";
}

$arResult["ITEMS"] = CIBlockElement::GetList([
    "ID" => "ASC"
], [
    "IBLOCK_ID" => $arParams["IBLOCK_ID"]
], false, false, $arSelectFields);

$this->IncludeComponentTemplate();
?>
