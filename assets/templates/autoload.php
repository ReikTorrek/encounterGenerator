<?php
//Подключение сонтроллеров
require_once dirname(__DIR__) . '/Component/DB/UserController.php';
require_once dirname(__DIR__) . '/Component/DB/StatController.php';
require_once dirname(__DIR__) . '/Component/DB/BuffsController.php';
require_once dirname(__DIR__) . '/Component/DB/LootController.php';
require_once dirname(__DIR__) . '/Component/DB/EncountersController.php';
require_once dirname(__DIR__) . '/Component/DB/GamesController.php';
require_once dirname(__DIR__) . '/Component/DB/AbilitiesController.php';
//Подключение рендеров
require_once dirname(__DIR__) . '/Component/Renderer/AllAbilitiesRenderer.php';
require_once dirname(__DIR__) . '/Component/Renderer/AllCreaturesRenderer.php';
require_once dirname(__DIR__) . '/Component/Renderer/AllGamesRenderer.php';
require_once dirname(__DIR__) . '/Component/Renderer/DiceRenderer.php';
require_once dirname(__DIR__) . '/Component/Renderer/EncounterRenderer.php';
require_once dirname(__DIR__) . '/Component/Renderer/CurrentPropPageRenderer.php';
require_once dirname(__DIR__) . '/Component/Renderer/GameRenderer.php';
//Подключение констант
require_once dirname(__DIR__) . '/const.php';