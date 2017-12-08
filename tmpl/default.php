<?php

/**
 * Шаблон модуля "Статус ученика".
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

defined('_JEXEC') or die; ?>

<?php
// Подключение css стиля модуля для подсказок
$document = JFactory::getDocument();
$document->addStyleSheet('/modules/mod_status/css/tooltips.css');
?>

<?php
echo "<p>Имя: {$user->name}</p>";
echo "<p>Страна: {$user->country}</p>";
echo "<p>Город: {$user->city}</p>";
echo "<p>Возраст: {$user->age}</p>";
?>

<p> Учебный день:
    <?php echo ModStatusHelper::countDates($user->schoolDate); ?>
<p/>

<p>
    <span data-tooltip="Ученик лишается жизни за невыполнение задания в течение месяца">Жизни:</span>
    <?php
        for ($i = 0; $i < $user->lives; $i ++) {
            echo '<img src="/images/systema/live.png"/>';
        }
    ?>
<p/>

<p> Осталось дней: <?php echo ModStatusHelper::daysLeft($user->stageDate); ?> <p/>

<?php echo "<p>Пожертвования: {$user->donat}</p>"; ?>

<p> Место в рейтинге: <?php ModStatusHelper::findUser(ModStatusHelper::getTop(), $user->username); ?> <p/>

<p>
    <span data-tooltip="+ 1 за подход, + 10 за свидание, + 100 за секс. Опыт подтверждается аудиозаписью">Опыт:</span>
    <?php echo ModStatusHelper::countPractice($user->num_contacts, $user->num_dates, $user->num_closenesses); ?>
<p/>

<p> Место в рейтинге: <?php ModStatusHelper::findUser(ModStatusHelper::getRating(), $user->username); ?> <p/>

<p> Звание: <?php echo ModStatusHelper::countRank(ModStatusHelper::countPractice($user->num_contacts, $user->num_dates, $user->num_closenesses)); ?> <p/>