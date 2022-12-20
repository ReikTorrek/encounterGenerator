<?php
global $USER;

//Text for ecg strings
const ENCOUNTERGENERATORTEXTS = [
    'name' => 'Введите имя',
    'race' => 'Введите расу',
    'type' => 'Введите тип существа (Животное, голем...)',
    'class' => 'Введите класс, если он есть',
    'lvl' => 'Введите уровень',
    'aligment' => 'Введите мировоззрение',
    'HP' => 'Введите количество HP',
    'AC' => 'Введите количество AC',
    'armor' => 'Введите количество брони',
    'actions' => 'Введите количество действий',
    'defenceActions' => 'Введите количество оборонительных действий',
];

const DICE_TYPES = ['1d2', '1d4', '1d6', '1d8', '1d10', '1d12', '1d20', '1d100',];

const ENCOUNTER_DB_TOREADEBLETEXT = [
    'name' => 'Имя',
    'race' => 'Раса',
    'type' => 'Тип',
    'class' => 'Класс',
    'lvl' => 'Уровень',
    'aligment' => 'Мировоззрение',
    'HP' => 'HP',
    'AC' => 'AC',
    'armor' => 'Броня',
    'actions' => 'Действия',
    'defenceActions' => 'Защитные действия/Уклонения',
    'abilities' => 'Способности',
    'buffs' => 'Баффы',
    'debuff' => 'Дебаффы',
    'areals' => 'Места обитания',
    'loot' => 'Добыча',
    'stats' => 'Характеристики',
];

const ABILITY_DB_TO_REAL_TEXT = [
    'name' => 'Название',
    'description' => 'Описание',
    'dice' => 'Кубы',
];