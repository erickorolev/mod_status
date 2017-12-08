<?php

/**
 * Шаблон модуля "Статус ученика".
 * имя,
 * страна,
 * город,
 * возраст,
 * учебный день,
 * жизни,
 * осталось дней,
 * пожертвования
 * место в рейтинге,
 * опыт,
 * место в топе,
 * звание.
 */

defined('_JEXEC') or die; ?>

<?php
// Подключение css стиля модуля для подсказок
$document = JFactory::getDocument();
$document->addStyleSheet('/modules/mod_status/css/tooltips.css');
?>

<p> Имя: <?php echo $user->name; ?> <p/>

<p> Страна: <?php echo $user->country; ?> <p/>

<p> Город: <?php echo $user->city; ?> <p/>

<p> Возраст: <?php echo $user->age; ?> <p/>

<p> Учебный день: <?php echo $school_date; ?> <p/>

<p>
    <span data-tooltip="Ученик лишается жизни за невыполнение задания в течение месяца">Жизни:</span>
    <?php
        for ($i = 0; $i < $user->lives; $i ++) {
            echo '<img src="/images/systema/live.png"/>';
        }
    ?>
<p/>

<p> Осталось дней: <?php echo $days_left; ?> <p/>

<p> Пожертвования: <?php echo $user->donat; ?> <p/>

<p> Место в топе: <?php echo $position_top; ?> <p/>

<p>
    <span data-tooltip="+ 1 за подход, + 10 за свидание, + 100 за секс. Опыт подтверждается аудиозаписью">Опыт:</span>
    <?php echo $practice; ?>
<p/>

<p> Место в рейтинге: <?php echo $position_rating;  ?> <p/>

<p> Звание: <?php echo $rank; ?> <p/>