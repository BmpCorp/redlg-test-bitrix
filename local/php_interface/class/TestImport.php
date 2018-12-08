<?

use GuzzleHttp\Client;

CModule::includeModule("iblock");

class TestImport
    {
        public static function init() {
            // Получаем и парсим данные.
            $obClient = new Client();
            $obResponse = $obClient->get("https://raw.githubusercontent.com/izica/testdata/master/frontend/1/products.json");
            //$obResponse = $obClient->get("https://download.hdd.tomsk.ru/download/fffrvnoy?48a07c54a683a9eb7b7c1518840d225f");

            $arItems = json_decode((string) $obResponse->getBody(), true)["items"];
            if (count($arItems) === 0) {
                return;
            }
            $obElement = new CIBlockElement();

            foreach ($arItems as $obItem) {
                // Формируем массив свойств элемента.
                $arProps = [
                    "ID" => $obItem["id"],
                    "PRICE" => $obItem["price"],
                    "CURRENCY" => $obItem["currency"],
                    "DESCRIPTION" => $obItem["description"],
                    "PICTURE" => $obItem["picture"]
                ];

                // Ищем в базе элемент с кодом товара и получаем внутренний ID.
                $arExistingElement = CIBlockElement::GetList([], [
                    "PROPERTY_ID" => $obItem["id"]
                ], false, false, [
                    "ID"
                ])->GetNext();

                if ($arExistingElement) {
                    // Если элемент уже есть в базе, обновляем его.
                    $nElementID = $arExistingElement["ID"];

                    $bUpdated = $obElement->Update($nElementID, [
                        "NAME" => $obItem["name"],
                        "PROPERTY_VALUES" => $arProps
                    ]);
                    if (!$bUpdated) {
                        die("Ошибка при обновлении элемента с ID = $nElementID!");
                    }
                } else {
                    // Если элемента нет в базе, создаём его.
                    $nElementID = $obElement->Add([
                        "IBLOCK_ID" => 12,
                        "IBLOCK_SECTION_ID" => false,
                        "NAME" => $obItem["name"],
                        "PROPERTY_VALUES" => $arProps
                    ]);

                    if ($nElementID === false) {
                        die("Ошибка при создании элемента для товара с кодом {$arProps['ID']}!");
                    }
                }
            }
        }
    }

?>
