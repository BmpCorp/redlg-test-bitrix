<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arComponentParameters = [
    "GROUPS" => [],
    "PARAMETERS" => [
        "IBLOCK_ID" => [
            "PARENT" => "BASE",
            "NAME" => "ID инфоблока",
            "TYPE" => "STRING",
            "REFRESH" => "N",
            "MULTIPLE" => "N",
            "DEFAULT" => 12,
            "COLS" => 3
        ],
        "SHOW_PRICE" => [
            "PARENT" => "BASE",
            "NAME" => "Показывать цену",
            "TYPE" => "CHECKBOX",
            "REFRESH" => "N",
            "MULTIPLE" => "N",
            "DEFAULT" => "Y"
        ],
        "SHOW_DESCRIPTION" => [
            "PARENT" => "BASE",
            "NAME" => "Показывать описание",
            "TYPE" => "CHECKBOX",
            "REFRESH" => "N",
            "MULTIPLE" => "N",
            "DEFAULT" => "Y"
        ]
    ]
];
