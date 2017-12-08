<?php
/**
 * Модуль "Статус ученика". В модуле отображается следующие свойства пользователя:
 * имя, жизни, опыт, место в рейтинге, звание, количество учебных дней, количество оставшихся дней,
 * сумма пожертвований, место ученика в топе пожертвований.
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$user = JFactory::getUser();

require JModuleHelper::getLayoutPath('mod_status');