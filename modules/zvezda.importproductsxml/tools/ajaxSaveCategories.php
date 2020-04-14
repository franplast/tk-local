<?php
header("Content-type: application/json; charset=utf-8");
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Catalog\CatalogIblockTable;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Main\Config\Option;
CModule::IncludeModule("highloadblock");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
$arResult = array();
$arResult['STATUS'] = 1;

$categoryId = 2;
$iblock_id_ar = array();
$section_id_ar = array();
$hlblock = HL\HighloadBlockTable::getById(4)->fetch();
$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entityDataClass = $entity->getDataClass();
//TODO сначала проверить есть ли запись, после обновляем или добавляеи
$arData = [
    "UF_CATEGORY_NAME" => $arCategory["NAME"],
    "UF_XML_ID" => $xmlId,
    "UF_CATEGORY_ID" => $categoryId
];
//add
$result = $entityDataClass::add($arData);
//update
$entityDataClass::update($categoryId, ["UF_IBLOCK_ID" => $iblockId]);


echo json_encode($arResult);
