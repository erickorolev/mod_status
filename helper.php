<?php

/**
 * Вспомогательный класс для модуля "Статус ученика".
 */

class ModStatusHelper
{
    /**
     * Метод высчитывает количество оставшихся дней на прохождение этапа.
     * На выполнение этапа отводится 30 дней.
     * @param $date datetime Дата начала текущего этапа учеником, которое указывает администратор
     * @return integer Количество оставшихся дней из 30 дней
     */
    public static function daysLeft($date) {

        $now = time();
        $month = 30;
        $dates = $now - strtotime($date);
        $left = $month - floor($dates / (60 * 60 * 24));

        if ($left < 0) {
            return 0;
        } else {
            return $left;
        }
    }

    /**
     * Метод высчитывает количество прошедших дней от даты.
     * Используется для определния количества прошедших учебных дней
     * @param $date datetime Дата начала первого этапа учеником, которое указывает администратор
     * @return integer Количество дней, прошедших с первого этапа
     */
    public static function countDates($date) {
        $now = time();
        $dates = $now - strtotime($date);
        return floor($dates / (60 * 60 * 24));
    }

    /**
     * Метод, который подсчитывает опыт пользователя по формуле:
     * количество подходов + количество свиданий * 10 + количество секса * 100
     * Метод возвращает значение опыта, а не отображает сразу,
     * потому что значение опыта использует также функция расчета звания showRank.
     * @param $num_contacts integer Количество подходов, совершенных учеником
     * @param $num_dates integer Количество свиданий, совершенных учеником
     * @param $num_closenesses integer Количество секса, совершенных учеником
     * @return $practice integer Количество опыта, высчитанное по формуле:
     * количество подходов + количество свиданий * 10 + количество секса * 100
     */
    public static function countPractice($num_contacts, $num_dates, $num_closenesses) {
        $practice = $num_contacts + $num_dates * 10 + $num_closenesses * 100;
        return $practice;
    }

    /* Метод назначает пользователю звание на основе количеста полученного пользователем опыта.
     * Из-за того, что рост опыта не является константой, более оптимальное решение придумать не удалось.
     * Необходимо перенести в базу данных.
     * $practice integer Количество опыта ученика
     * $rank string Название звания ученика
     */
    public static function countRank($practice) {

        // Массив содержит все возможные звания.
        $ranks = array("мальчик",
                       "юбколовец",
                       "дамский угодник",
                       "ухажер",
                       "сердцеед",
                       "кот",
                       "мачо",
                       "ловелас",
                       "женолюб",
                       "дон-жуан",
                       "казанова",
                       "плейбой",
                       "кобель",
                       "поручик",
                       "гусар",
                       "блудник",
                       "самец",
                       "альфа-самец",
                       "бабник",
                       "сиськохват",
                       // "сиськолов", // Одно звание лишнее, больше, чем нужно
                       "палковводец",
                       "плотолюбец",
                       "дырокол",
                       "кентавр",
                       "спермогон",
                       "экстрасекс",
                       "сексозавр",
                       "сперматозавр");

        // Присваивается начальное звание при нулевом опыте.
        $rank = $ranks[0];

        // Присваивается звание из массива в зависимости от количества опыта.
        if ( $practice >= 1 and $practice < 2) {$rank = $ranks[1];}
        else if ($practice >= 2 and $practice < 3) {$rank = $ranks[2];}
        else if ($practice >= 3 and $practice < 4) {$rank = $ranks[3];}
        else if ($practice >= 4 and $practice < 5) {$rank = $ranks[4];}
        else if ($practice >= 5 and $practice < 6) {$rank = $ranks[5];}
        else if ($practice >= 6 and $practice < 7) {$rank = $ranks[6];}
        else if ($practice >= 7 and $practice < 8) {$rank = $ranks[7];}
        else if ($practice >= 8 and $practice < 9) {$rank = $ranks[8];}
        else if ($practice >= 9 and $practice < 10) {$rank = $ranks[9];}
        else if ($practice >= 10 and $practice < 20) {$rank = $ranks[10];}
        else if ($practice >= 20 and $practice < 30) {$rank = $ranks[11];}
        else if ($practice >= 30 and $practice < 40) {$rank = $ranks[12];}
        else if ($practice >= 40 and $practice < 50) {$rank = $ranks[13];}
        else if ($practice >= 50 and $practice < 60) {$rank = $ranks[14];}
        else if ($practice >= 60 and $practice < 70) {$rank = $ranks[15];}
        else if ($practice >= 70 and $practice < 80) {$rank = $ranks[16];}
        else if ($practice >= 80 and $practice < 90) {$rank = $ranks[17];}
        else if ($practice >= 90 and $practice < 100) {$rank = $ranks[18];}
        else if ($practice >= 100 and $practice < 200) {$rank = $ranks[19];}
        else if ($practice >= 200 and $practice < 300) {$rank = $ranks[20];}
        else if ($practice >= 300 and $practice < 400) {$rank = $ranks[21];}
        else if ($practice >= 400 and $practice < 500) {$rank = $ranks[22];}
        else if ($practice >= 500 and $practice < 600) {$rank = $ranks[23];}
        else if ($practice >= 600 and $practice < 700) {$rank = $ranks[24];}
        else if ($practice >= 700 and $practice < 800) {$rank = $ranks[25];}
        else if ($practice >= 800 and $practice < 900) {$rank = $ranks[26];}
        else if ($practice >= 900 and $practice < 1000) {$rank = $ranks[27];}
        else if ($practice >= 1000) {$rank = $ranks[28];}

        return $rank;
    }

    /**
     * Метод исполняет следующий запрос к базе данных:
     * SELECT username, num_contacts + num_interests * 10 + num_dates * 100 + num_closenesses * 1000 AS Practice
     * FROM aasgz_users
     * ORDER BY Practice DESC;
     * Этот же запрос используется для модуля "Рейтинг по количеству опыта". Отличие в том, что показываются пользователи с нулевым опытом.
     */
    public static function getRating()
    {
        $db = JFactory::getDbo();

        $query = $db->getQuery(true);

        $query->select('username,(num_contacts + (num_dates * 10 ) + (num_closenesses * 100)) AS Practice');
        $query->from($db->quoteName('#__users'));
        $query->order('Practice DESC');

        $db->setQuery($query);

        $result = $db->loadRowList();

        return $result;

    }

    /**
     * Метод ссполняет следующий запрос к базе данных:
     * SELECT username, donat FROM aasgz_users ORDER BY donat DESC;
     * Этот же запрос используется для модуля "Рейтинг по сумме пожертвований".
     * Отличие в том, что показываются также пользователи с нулевым пожертвованием
     *                                                (вновь зарегистрировавшиеся).
     */
    public static function getTop()
    {
        $db = JFactory::getDbo();

        $query = $db->getQuery(true);

        $query->select($db->quoteName(array('username', 'donat')));
        $query->from($db->quoteName('#__users'));
        $query->order('donat DESC');

        $db->setQuery($query);

        $result = $db->loadRowList();

        return $result;
    }

    /**
     * Метод ищет имя пользователя в массиве результата запроса к базе данных
     *                               и выдает позицию пользователя в рейтинге
     * Используется в двух случаях:
     * при составлении рейтинга по сумме пожертвований и рейтинга по количеству опыта.
     */
    public static function findUser($result, $user)
    {

        $position = 1;

        foreach ($result as $row) {
            if ($user == $row['0']) {
                echo $position;
                break;
            }
            else {
                $position ++;
            }
        }
    }

}