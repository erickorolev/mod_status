<?php

//Шаблон модуля "Статус ученика".

defined('_JEXEC') or die; ?>

<?php
// Подключение javascript для обнуления дней без порно после нажатия кнопки.
$document = JFactory::getDocument();
$document->addScript('/modules/mod_status/js/relapse.js');
// Подключение css стиля модуля
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

<!--
Для блока необходимо сделать поле, в которое пользователь вводит дату, когда смотрел порно последний раз.
Также необходимо сделать кнопку Х, нажимая на которою счетчик количества дней обнуляется, так как дату устанавливается на сегодняшний день.
<p>

    <span data-tooltip="Отображается количество дней, прошедших с начала этапа Отказ от порно. В случае рецидива, вам следует обнулить счетчик, нажав на крестик.">Дней без порно:</span>

    <?php // echo ModStatusHelper::countDates($user->nofapDate); ?> <input id="relapse" type="button" value="X">
<p/>
-->

<p>
    <span data-tooltip="Ученик лишается жизни за невыполнение задания в течение месяца">Жизни:</span>
    <?php ModStatusHelper::showLives($user->lives); ?>
<p/>

<p> Осталось дней: <?php echo ModStatusHelper::daysLeft($user->stageDate); ?> <p/>

<?php echo "<p>Пожертвования: {$user->donat}</p>"; ?>

<p> Место в рейтинге: <?php ModStatusHelper::findUser(ModStatusHelper::getTop(), $user->username); ?> <p/>

<p>
    <span data-tooltip="+ 1 за подход, + 10 за свидание, + 100 за секс. Опыт подтверждается аудиозаписью">Опыт:</span>
    <?php echo ModStatusHelper::countPractice($user->num_contacts, $user->num_dates, $user->num_closenesses); ?>
<p/>

<p> Место в рейтинге: <?php ModStatusHelper::findUser(ModStatusHelper::getRating(), $user->username); ?> <p/>

<p> Звание: <?php ModStatusHelper::showRank(ModStatusHelper::countPractice($user->num_contacts, $user->num_dates, $user->num_closenesses)); ?> <p/>