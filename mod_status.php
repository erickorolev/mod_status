<?php
/**
 * Модуль "Статус ученика".
 * В модуле отображается следующие свойства ученика:
 * имя,
 * страна,
 * город,
 * возраст,
 * учебный день,
 * жизни,
 * опыт,
 * осталось дней,
 * пожертвования
 * место в рейтинге,
 * опыт,
 * место в рейтинге,
 * звание.
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$user = JFactory::getUser(); // экземпляр ученика

$school_date = ModStatusHelper::countDates($user->schoolDate); // осталось дней на этом этапе

$days_left = ModStatusHelper::daysLeft($user->stageDate); // прошедших учебных дней

$top = ModStatusHelper::getTop(); // массив с топом учеников по пожертвованиям

$rating = ModStatusHelper::getRating(); // массив с рейтингом учеников по опыту

// уровень опыта ученика, высчитанного по формуле: подходы + свидания * 10 + секс * 100
$practice = ModStatusHelper::countPractice($user->num_contacts, $user->num_dates, $user->num_closenesses);

$position_top = ModStatusHelper::findUser($top, $user->username); // позиция ученика в топе пожертвований

$position_rating = ModStatusHelper::findUser($rating, $user->username); // позиция ученика в рейтинге по опыту

$rank = ModStatusHelper::countRank($practice); // звания ученика, исходя из набранного опыта

require JModuleHelper::getLayoutPath('mod_status');