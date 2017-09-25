<?php

/**
 * Пример для библиотеки OrangeDataClient PHP Beta version 2.0.2
 * Библиотека корректно работает с версией PHP: 5.4+
 */
/**
 * create_order(a, b, c, d, e*) - Создание нового чека
 *  Параметры:
 *    a ($id) - Идентификатор документа (Строка от 1 до 32 символов)
 *    b ($type) - Признак расчета (Число от 1 до 4):
 *          1 - Приход
 *          2 - Возврат прихода
 *          3 - Расход
 *          4 - Возврат расхода
 *    с ($customerContact) - Телефон или электронный адрес покупателя (Строка от 1 до 64 символов)
 *    d ($taxationSystem) - Система налогообложения (Число от 0 до 5):
 *          0 – Общая, ОСН
 *          1 – Упрощенная доход, УСН доход
 *          2 – Упрощенная доход минус расход, УСН доход - расход
 *          3 – Единый налог на вмененный доход, ЕНВД
 *          4 – Единый сельскохозяйственный налог, ЕСН
 *          5 – Патентная система налогообложения, Патент
 *    e* ($group) - Группа устройств, с помощью которых будет пробит чек (не всегда является обязательным полем)
 *  
 *    Пример запроса:
 *        create_order('2234', 1, 'ex@example.ex', 5);
 */
/**
 * add_position_to_order(a, b, c, d, e*, f*) - Добавление позиций в чек
 *  Параметры:
 *    a ($quantity) - Количество предмета расчета (Десятичное число с точностью до 6 символов после точки*)
 *    b ($price) - Цена за единицу предмета расчета с учетом скидок и наценок (Десятичное число с точностью до 2 символов после точки*)
 *    c ($tax) - Система налогообложения (Число от 1 до 6):
 *          1 – ставка НДС 18%
 *          2 – ставка НДС 10%
 *          3 – ставка НДС расч. 18/118
 *          4 – ставка НДС расч. 10/110
 *          5 – ставка НДС 0%
 *          6 – НДС не облагается
 *    d ($text) - Наименование предмета расчета (Строка до 128 символов)
 *    e* ($paymentMethodType) - Признак способа расчета (Число от 1 до 7 или null. Если передано null, то будет отправлено значение 4):
 *          1 – Предоплата 100%
 *          2 – Частичная предоплата
 *          3 – Аванс
 *          4 – Полный расчет
 *          5 – Частичный расчет и кредит
 *          6 – Передача в кредит
 *          7 – оплата кредита
 *    f* ($paymentSubjectType) - Признак предмета расчета (Число от 1 до 13 или null. Если передано null, то будет отправлено значение 1):
 *          1 – Товар
 *          2 – Подакцизный товар
 *          3 – Работа
 *          4 – Услуга
 *          5 – Ставка азартной игры
 *          6 – Выигрыш азартной игры
 *          7 – Лотерейный билет
 *          8 – Выигрыш лотереи
 *          9 – Предоставление РИД
 *          10 – Платеж
 *          11 – Агентское вознаграждение
 *          12 – Составной предмет расчета
 *          13 – Иной предмет расчета
 *  
 *    Примеры запроса:
 *        Полный запрос (рекомендуется):
 *          add_position_to_order(6, 200, 'ex@example.ex', 2, 2, 10);
 *
 *        Запрос с пропуском поля 'e*':
 *          add_postion_to order(6, 200, 'ex@example.ex', 2, null, 10); (Поле e* = 4)
 *
 *        Запрос с пропуском полей 'e*' и 'f*':
 *          add_position_to_order(6, 200, 'ex@example.ex', 2); (Поле e* = 4, поле f* = 1)
 */
/**
 * add_payment_to_order(a, b) - Добавление позиций в чек
 *  Параметры:
 *    a ($type) - Тип оплаты (Число от 1 до 16):
 *          1 – сумма по чеку наличными, 1031
 *          2 – сумма по чеку электронными, 1081
 *          14 – сумма по чеку предоплатой (зачетом аванса и (или) предыдущих платежей), 1215
 *          15 – сумма по чеку постоплатой (в кредит), 1216
 *          16 – сумма по чеку (БСО) встречным предоставлением, 1217
 *    b ($amount) - Сумма оплаты (Десятичное число с точностью до 2 символов после точки*)
 *
 *    Примеры запроса:
 *        add_payment_to_order(1, 2.7); 
 */
/**
 * send_order() - Отправка чека на обработку
 */
/**
 * get_order_status(a) - Проверка состояния чека
 *  Параметры:
 *    a ($id) - Идентификатор документа (Строка от 1 до 32 символов)
 *
 *    Пример запроса:
 *        get_order_status(435621);
 */
/**
 * create_correction(a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u) - Создание чека-коррекции
 *  Параметры:
 *    a ($id) - Идентификатор документа (Строка от 1 до 32 символов)
 *    b ($correctionType) - 1173, тип коррекции (Число):
 *          0 - Самостоятельно
 *          1 - По предписанию
 *    c ($type) - Признак расчета, 1054 (Число):
 *          1 - Приход
 *          3 - Расход
 *    d ($description) - 1177, описание коррекции (Строка от 1 до 244 символов)
 *    e ($causeDocumentDate) - 1178, дата документа основания для коррекции В данном реквизите время всегда указывать, как 00:00:00 (Время в виде строки в формате ISO8601)
 *    f ($causeDocumentNumber) - 1179, номер документа основания для коррекции (Строка от 1 до 32 символов)
 *    g ($totalSum) - 1020, сумма расчета, указанного в чеке (БСО) (Десятичное число с точностью до 2 символов после точки)
 *    h ($cashSum) - 1031, сумма по чеку (БСО) наличными (Десятичное число с точностью до 2 символов после точки)
 *    i ($eCashSum) - 1081, сумма по чеку (БСО) электронными (Десятичное число с точностью до 2 символов после точки)
 *    j ($prepaymentSum) - 1215, сумма по чеку (БСО) предоплатой (зачетом аванса и (или) предыдущих платежей) (Десятичное число с точностью до 2 символов после точки)
 *    k ($postpaymentSum) - 1216, сумма по чеку (БСО) постоплатой (в кредит) (Десятичное число с точностью до 2 символов после точки)
 *    l ($otherPaymentTypeSum) - 1217, сумма по чеку (БСО) встречным предоставлением (Десятичное число с точностью до 2 символов после точки)
 *    m ($tax1Sum) - 1102, сумма НДС чека по ставке 18% (Десятичное число с точностью до 2 символов после точки)
 *    n ($tax2Sum) - 1103, сумма НДС чека по ставке 10% (Десятичное число с точностью до 2 символов после точки)
 *    o ($tax3Sum) - 1104, сумма расчета по чеку с НДС по ставке 0% (Десятичное число с точностью до 2 символов после точки)
 *    p ($tax4Sum) - 1105, сумма расчета по чеку без НДС (Десятичное число с точностью до 2 символов после точки)
 *    q ($tax5Sum) - 1106, сумма НДС чека по расч. ставке 18/118 (Десятичное число с точностью до 2 символов после точки)
 *    r ($tax6Sum) - 1107, сумма НДС чека по расч. ставке 10/110 (Десятичное число с точностью до 2 символов после точки)
 *    s ($taxationSystem) - 1055, применяемая система налогообложения (Число):
 *          0 - Общая
 *          1 - Упрощенная доход
 *          2 - Упрощенная доход минус расход
 *          3 - Единый налог на вмененный доход
 *          4 - Единый сельскохозяйственный налог
 *          5 - Патентная система налогообложения
 */
/**
 * post_correction() - Отправка чека-коррекции на обработку
 */
/**
 * get_correcrtion_status(a) - Проверка состояния чека-коррекции
 *  Параметры:
 *    a ($id) - Идентификатор документа (Строка от 1 до 32 символов)
 */
/**
 * is_debug() - Данная функция служит для активации записей в файле 'curl.log'
 */

include_once 'orangedata_client.php'; //Путь к библиотеке (как правило это файл orangedata_client.php или orangedataclient_Beta.php)

$api_url = 'https://apip.orangedata.ru:2443';
$sign_pkey = getcwd() . '\secure_path\private_key.pem'; //path to private key for signing
$ssl_client_key = getcwd() . '\secure_path\client.key'; //path to client private key for ssl
$ssl_client_crt = getcwd() . '\secure_path\client.crt'; //path to client certificate for ssl
$ssl_ca_cert = getcwd() . '\secure_path\cacert.pem'; //path to cacert for ssl
$ssl_client_crt_pass = 1234; //password for client certificate for ssl
$inn = '0123456789'; //ИНН
//create new client
$byer = new orangedata\orangedata_client($inn, $api_url, $sign_pkey, $ssl_client_key, $ssl_client_crt, $ssl_ca_cert, $ssl_client_crt_pass);

//for write curl.log file
//$byer->is_debug();

// create client new order, add positions , add payment, send request
$byer->create_order('3268483278', 1, 'example@example.com', 1)
        ->add_position_to_order(6.123456, '10.', 1, 'matches', 1, 10)
        ->add_position_to_order(7, 10, 1, 'matches2', null, 10)
        ->add_position_to_order(345., 10.76, 1, 'matches3', 3, null)
        ->add_payment_to_order(1, 131.23)
        ->add_payment_to_order(2, 3712.2);
try {
    //view response
    $result = $byer->send_order();
    var_dump($result);
} catch (Exception $ex) {
    echo 'Ошибка:' . PHP_EOL . $ex->getMessage();
}
//view status of order 
try {
    $order_status = $byer->get_order_status(3268483278);
    var_dump($order_status);
} catch (Exception $ex) {
    echo 'Ошибка:' . PHP_EOL . $ex->getMessage();
}

///Создания чека коррекции
$byer->create_correction(
        'cor1', //id  Идентификатор документа (Строка от 1 до 32 символов)
        0, //correctionType 1173, тип коррекции
        //0. Самостоятельно
        //1. По предписанию
        3, //type Признак расчета, 1054:
        //1. Приход
        //3. Расход 
        ' Ошибка Кассира1', //description 1177, описание коррекции Строка от 1 до 244 символов
        new \DateTime(), //causeDocumentDate DateTime объект .1178, дата документа основания для коррекции В данном реквизите время всегда приводится, к 00:00:00.  Время в виде строки в формате ISO8601
        '56ce', //causeDocumentNumber 1179, номер документа основания для коррекции Строка от 1 до 32 символов
        567.9, //totalSum 1020, сумма расчета, указанного в чеке (БСО) Десятичное число с точностью до 2 символов после точки
        567, //cashSum 1031, сумма по чеку (БСО) наличными Десятичное число с точностью до 2 символов после точки
        0.9, //eCashSum 1081, сумма по чеку (БСО) электронными Десятичное число с точностью до 2 символов после точки
        0, //prepaymentSum 1215, сумма по чеку (БСО) предоплатой (зачетом аванса и (или) предыдущих платежей) Десятичное число с точностью до 2 символов после точки
        0, //postpaymentSum 1216, сумма по чеку (БСО) постоплатой (в кредит) Десятичное число с точностью до 2 символов после точки
        0, //otherPaymentTypeSum 1217, сумма по чеку (БСО) встречным предоставлением Десятичное число с точностью до 2 символов после точки
        0, //tax1Sum 1102, сумма НДС чека по ставке 18% Десятичное число с точностью до 2 символов после точки
        0, //tax2Sum 1103, сумма НДС чека по ставке 10% Десятичное число с точностью до 2 символов после точки
        0, //tax3Sum 1104, сумма расчета по чеку с НДС по ставке 0% Десятичное число с точностью до 2 символов после точки
        0, //tax4Sum 1105, сумма расчета по чеку без НДС Десятичное число с точностью до 2 символов после точки
        0, //tax5Sum 1106, сумма НДС чека по расч. ставке 18/118 Десятичное число с точностью до 2 символов после точки
        0, //tax6Sum 1107, сумма НДС чека по расч. ставке 10/110 Десятичное число с точностью до 2 символов после точки
        2, //taxationSystem 1055, применяемая система налогообложения
        //0. Общая
        //1. Упрощенная доход
        //2. Упрощенная доход минус расход
        //3. Единый налог на вмененный доход
        //4. Единый сельскохозяйственный налог
        //5. Патентная система налогообложения
        //Число
        'Main', //group Группа устройств, с помощью которых будет пробит чек Строка от 1 до 32 символов или null. Опциональный параметр.
        null //key Название ключа который должен быть использован для проверки подпись. Опциональный параметр. Если имя ключа не указано для проверки подписи будет использован ключ, заданный по умолчанию.
        //Строка от 1 до 32 символов либо null
);
try {
    $result = $byer->post_correction();
//view response
    var_dump($result);
} catch (Exception $ex) {
    echo 'Ошибка:' . PHP_EOL . $ex->getMessage();
}
//view status of correction
try {
    $cor_status = $byer->get_correction_status('cor1');
    var_dump($cor_status);
} catch (Exception $ex) {
    echo 'Ошибка:' . PHP_EOL . $ex->getMessage();
}
?>
