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
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <article class="swiper-slide">
                    <div class="slide">
                        <img class="slide__image" src="<?=$arItem["PROPERTIES"]["PICTURE"]["VALUE"]?>">
                        <p class="slide__name"><?=$arItem["NAME"]?></p>
                        <p class="slide__price"><?=formatPrice(
                            $arItem["PROPERTIES"]["PRICE"]["VALUE"],
                            $arItem["PROPERTIES"]["CURRENCY"]["VALUE"]
                        )?></p>
                    </div>
                </article>
            <?endforeach;?>
        </div>
        <div class="sneakers-slider__pagination"></div>
        <div class="sneakers-slider__arrow sneakers-slider__arrow--left"></div>
        <div class="sneakers-slider__arrow sneakers-slider__arrow--right"></div>
    </div>
</div>
