<?php

//Шаблон модуля "Статус ученика".
 
 defined('_JEXEC') or die; ?>

<?php
echo "<p>Имя: {$user->name}</p>";
echo "<p>Страна: {$user->country}</p>";
echo "<p>Город: {$user->city}</p>";
?>

<p> Возраст: <?php ModStatusHelper::showAge($user->date_of_birth); ?> <p/>

<?php echo "<p>Пожертвования: {$user->donat}</p>"; ?>

<p> Место в рейтинге: <?php ModStatusHelper::findUser(ModStatusHelper::getTop(), $user->username); ?> <p/>

<p> Жизни: <?php ModStatusHelper::showLives($user->lives); ?> <p/>

<p> Опыт: <?php echo ModStatusHelper::countPractice($user->num_contacts, $user->num_interests, $user->num_dates, $user->num_closenesses); ?> <p/>

<p> Место в рейтинге: <?php ModStatusHelper::findUser(ModStatusHelper::getRating(), $user->username); ?> <p/>

<p> Звание: <?php ModStatusHelper::showRank(ModStatusHelper::countPractice($user->num_contacts, $user->num_interests, $user->num_dates, $user->num_closenesses)); ?> <p/>