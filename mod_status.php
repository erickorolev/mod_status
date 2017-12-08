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

$user = JFactory::getUser();

require JModuleHelper::getLayoutPath('mod_status');