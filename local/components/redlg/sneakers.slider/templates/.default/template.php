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

function formatPrice($sPrice, $sCurrency)
{
    switch ($sCurrency) {
        case "RUR":
            return "$sPrice р.";
        case "USD":
            return "\$$sPrice";
        default:
            return $sPrice;
    }
}
?>
<div class="sneakers">
    <h2 class="sneakers__title">Все модели</h2>
    <div class="swiper-container sneakers-slider">
        <div class="swiper-wrapper">
            <?while($arItem = $arResult["ITEMS"]->getNext()):?>
                <article class="swiper-slide">
                    <div class="slide">
                        <img class="slide__image" src="<?=$arItem["PROPERTY_PICTURE_VALUE"]?>">
                        <div class="slide__name"><?=$arItem["NAME"]?></div>
                        <?if ($arParams["SHOW_PRICE"] === "Y"):?>
                            <div class="slide__price"><?=formatPrice(
                                    $arItem["PROPERTY_PRICE_VALUE"],
                                    $arItem["PROPERTY_CURRENCY_VALUE"]
                            )?></div>
                        <?endif;?>
                        <?if ($arParams["SHOW_DESCRIPTION"] === "Y"):?>
                            <div class="slide__description"><?=$arItem["PROPERTY_DESCRIPTION_VALUE"]?></div>
                        <?endif;?>
                    </div>
                </article>
            <?endwhile;?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
