-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2020 г., 20:29
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: company
--
CREATE DATABASE IF NOT EXISTS company DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE company;

-- --------------------------------------------------------

--
-- Структура таблицы category
--

CREATE TABLE category (
  id int NOT NULL,
  name varchar(255) NOT NULL,
  image varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы category
--

INSERT INTO category (id, `name`, image) VALUES
(1, 'Электронные сигареты', NULL),
(2, 'Трубки', NULL),
(3, 'Жидкости для заправки', NULL),
(4, 'Аккумуляторы и атомайзеры', NULL),
(5, 'Катриджи', NULL),
(6, 'Зарядные устройства', NULL),
(7, 'Аксессуары', NULL),
(8, 'Подарочные наборы', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы feedback
--

CREATE TABLE feedback (
  id int NOT NULL,
  name varchar(50) NOT NULL,
  e_mail varchar(100) NOT NULL,
  phone varchar(20) DEFAULT NULL,
  text text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы news
--

CREATE TABLE news (
  id int NOT NULL,
  header varchar(255) NOT NULL,
  date date NOT NULL,
  preview text,
  description text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы news
--

INSERT INTO news (id, header, `date`, preview, description) VALUES
(1, 'Поздравительная речь президента международной корпорации Хуа Шэн господина Ли Вея в Международный...', '2010-03-03', 'Здравствуйте! По случаю 15-ой годовщины корпорации «Тяньши» искренне благодарю всех за...', 'Здравствуйте! По случаю 15-ой годовщины корпорации «Тяньши» искренне благодарю всех за столь долгую поддержку и понимание, \r\n	а так же благодарю за единство, помощь друг другу, взаимное развитие и приверженность курсу корпорации «Тяньши». \r\n	Без вашего понимания, поддержки и самоотверженности не было бы этих блистательных 15-ти лет корпорации «Тяньши».\r\n	В 1993 году ради мечты и карьеры я приехал из Цанчжоу в Тяньцзинь, в этот чудесный край изобилия, \r\n	собираясь работать в сфере недвижимости. Однако, проанализировав экономическую ситуацию и динамичное развитие внутренних \r\n	тенденций отрасли производства товаров для здоровья, я изменил свою концепцию развития и решительно переместился \r\n	из сферы недвижимости в индустрию здоровья.'),
(2, 'Собрание правления киевского филиала', '2010-02-27', 'Киевское дворянское собрание — утраченное историческое здание в Киеве...', 'Киевское дворянское собрание — утраченное историческое здание в Киеве, построенное в 1851 году по проекту А. В. Беретти \r\n	и разрушенное в 1976 году. А также официально существовавшая с 1795 г. до 1917 г. монархическая организация, \r\n	которая дала название этому сооружению.'),
(3, 'Петропавловскому офису международной корпорации Хуа Шен исполнился 1 год', '2010-02-23', 'Международная корпорация ХуаШен - это объединение ученых-изобретателей и заводов-изготовителей продукции...', 'Международная корпорация ХуаШен - это объединение ученых-изобретателей и заводов-изготовителей продукции \r\n	для восстановления и поддержания здоровья. Hua shen образован в 1992 году в Китае. Центральный офис находится \r\n	в г.Циндао, сеть заводов находится также на территории Китая. \r\n	Руководит корпорацией ученый-философ и экономист Ли Вэй. Оздоровительная продукция ХуаШен разработана на основе \r\n	китайской 5000-летней культуре поддержания здоровья и высокотехнологичных современных нанометрических процессов \r\n	переработки целебных трав и природных минералов. \r\n	Продукция Хуа Шен - это прорыв в способах профилактики и восстановления здоровья, в спортивных достижениях и \r\n	реабилитации спортсменов, улучшении качества воды, косметической и гигиенической областях. \r\n	Благодаря сотрудничеству с известными высшими учебными заведениями Китая и множеством научно-технических институтов, \r\n	в корпорации сформирована высококвалифицированная, творческая научно-исследовательская команда. \r\n	Коллективом ХуаШэн создан идеальный высокотехнологичный материал – биофотоны, разработана технология дробления \r\n	с помощью сверхзвуковых встречных потоков воздуха и использована техника сверхтонкой обработки нанометрического уровня.'),
(4, 'Проведение церемонии награждения в бишкекском филиале', '2010-02-22', 'Церемония награждения — один из самых любимых форматов многих event-менеджеров...', 'Церемония награждения — один из самых любимых форматов многих event-менеджеров. \r\n	Тут нет места для пустой болтовни, ведущим не нужно придумывать конкурсы, чтобы разбавить шоу, \r\n	в организации не должно оставаться места для неподготовленных сюрпризов и открытий. Четкость логистики и \r\n	детальность сценария здесь важнее креатива и оформления.\r\n	Церемония награждения — очень строгий формат мероприятия, а проблемы у всех организаторов одни и те же: \r\n	как удержать внимание зрителей и как не испортить минуту славы победителям.'),
(5, 'Сотрудники иркутского филиала отметили китайский новый', '2010-02-15', 'Хотя китайцы уже давно живут по григорианскому календарю вместе со всем миром...', 'Хотя китайцы уже давно живут по григорианскому календарю вместе со всем миром, а 1 января у них выходной, \r\n	главным праздником страны по-прежнему считается встреча Нового года по старому летоисчислению, лунно-солнечному. \r\n	Дата Чуньцзе — Праздника весны — постоянно меняется, но всегда попадает в промежуток между 21 января и 21 февраля. \r\n	Это второе новолуние после зимнего солнцестояния.\r\n	Как и мы, китайцы любят праздновать Новый год подолгу. Когда-то каникулы длились несколько недель. \r\n	21 век задает новые темпы, и в 2018 г. гулянья сократили до 15 дней. Их 4716-й год Желтой земляной собаки начался только \r\n	16 февраля. В последний день старого года (в 2018 г. — 2 марта) можно стать свидетелями закрытия праздника с эффектным Фестивалем фонарей.'),
(6, 'Празднование китайского нового года в одесском филиале', '2010-02-14', 'Одна из новогодних традиций — лепить цзяоцзы, пельмени в виде золотых слитков, и в одном из них...', 'Одна из новогодних традиций — лепить цзяоцзы, пельмени в виде золотых слитков, и в одном из них запекать монету. \r\n	Разумеется, тот, кому она попадется на зуб, обретет счастье. Лишь бы зуб уцелел. Можно положить юань и в рисовые \r\n	лепешки-печеньки няньгао, тоже традиционное новогоднее блюдо.\r\n	Как и у нас, самый новогодний фрукт — мандарин. Из них даже делают бусы, а гости и хозяева часто дарят друг другу в обмен. \r\n	Другие популярные подарки — сладости, амулеты, символизирующие достаток, фигурки в виде символа года и прочие безделушки. \r\n	Либо наоборот, практичные мелочи, упаковки молока, сигареты. Ради семейной гармонии подарки принято делать парные, \r\n	четным числом предметов (только не 4, ведь в Азии это традиционное число смерти).\r\n	Очень часто китайцы дарят хунбао — деньги в конверте, но обязательно в красном! Чаще всего так одаривают детей, стариков и коллег по работе.');

-- --------------------------------------------------------

--
-- Структура таблицы product
--

CREATE TABLE product (
  id int NOT NULL,
  name varchar(255) NOT NULL,
  image varchar(255) DEFAULT NULL,
  price float NOT NULL,
  description text,
  main_category int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы product
--

INSERT INTO product (id, `name`, image, price, description, main_category) VALUES
(1, 'Электронная сигарета FD12', NULL, 820, 'Устройство отличается стильным современным дизайном. Изготовлено из нержавеющей стали, \r\n		пластика и прочного стекла. Металлический корпус сигареты надежно защищен от механических повреждений. \r\n		Матовое покрытие не скользит в руках и приятно на ощупь. На нем не образуются потертости и царапины. \r\n		На корпусе из нержавеющей стали не остается пятен и отпечатков пальцев.', 1),
(2, 'Трубка из дерева', NULL, 760, 'В комплект к трубке входит одноименный клиромайзер на 2 мл с набором стандартных функций: \r\n		верхняя заправка, нижний обдув, коннектор 510. Работает на испарителях типа LVC и BF SS316.', 2),
(3, 'Жидкость для заправки', NULL, 59, 'Вкус жидкости определяется ароматизатором, которые условно делятся на 5 групп: \r\n		фруктово-ягодные, табачные, сладкие (кондитерские) и оригинальные.', 3),
(4, 'Аккумулятор TY 132', NULL, 450, 'Высокотоковый аккумулятор для мощных варивольтов/вариваттов и механических модов.', 4),
(5, 'Картридж FG876', NULL, 110, 'Сменный картридж для модели Qwerty Kit. Сопротивление - 1.0 Ом, ёмкость - 2 мл.\r\n		Комплектация: Сменный картридж Shine - 3 штуки, упаковка', 5),
(6, 'Зарядное устройство', NULL, 340, 'Универсальное интеллектуальное зарядное устройство NicJoy с индикатором заряда предназначено для зарядки \r\n		литий-ионных и никель-металлогидридных аккумуляторов цилиндрической формы типа \r\n		10440, 17670, 18490, 16340 (rcr123), 14500, 18350, 18650, AA, AAA.\r\n		При установке аккумулятора зарядка сама определяет вид аккумулятора, необходимое напряжение и общее состояние заряда. \r\n		Устройство имеет защиту от короткого замыкания, перезаряда, неправильной полярности, а также способно на \r\n		автоматическое определение неисправных, не способных к перезаряду, и реанимации \"уставших\" аккумуляторных батарей.', 6),
(7, 'Аксессуар', NULL, 500, 'Пластиковый кейс для двух батареек 18650 типоразмера. Изготовлен из полупрозрачного пластика шести разных цветов — синего, зеленого, оранжевого, желтого, фиолетового, бесцветного. Приятные цветовые решения добавят положительных эмоций даже в таком обыденном деле, как хранение батареек.', 7),
(8, 'Подарочный набор', NULL, 1150, 'Привлекательный вейп Joyetech eRoll Mac влюбит вас в себя с первого взгляда! Элегантный и компактный набор \r\n		включает в себя всё необходимое – девайс для парения, схожий по размерам с шариковой ручкой, \r\n		два картриджа и стильный портсигар PCC для зарядки. Простейшее в использовании устройство срабатывает автоматически \r\n		при затяжке – забудьте о кнопке Fire!\r\n		Ёмкость картриджей eRoll Mac составляет 0,55 миллилитра, они могут быть легко перезаправлены, \r\n		а установленный внутрь керамический испаритель с сопротивлением 1,5 Ом обладает восхитительной вкусопередачей и затяжкой, \r\n		способной заинтересовать привередливых MTL-энтузиастов.\r\n		Комплектный портсигар PCC обладает колоссальной ёмкостью аккумулятора в 2000 мАч, \r\n		благодаря чему вы сможете носить eRoll Mac с собой всегда и везде.', 8);

-- --------------------------------------------------------

--
-- Структура таблицы product_category
--

CREATE TABLE product_category (
  product_id int NOT NULL,
  category_id int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы product_category
--

INSERT INTO product_category (product_id, category_id) VALUES
(1, 1),
(1, 8),
(2, 1),
(2, 2),
(2, 8),
(3, 3),
(4, 4),
(5, 5),
(5, 7),
(6, 6),
(7, 7),
(8, 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы category
--
ALTER TABLE category
  ADD PRIMARY KEY (id);

--
-- Индексы таблицы feedback
--
ALTER TABLE feedback
  ADD PRIMARY KEY (id);

--
-- Индексы таблицы news
--
ALTER TABLE news
  ADD PRIMARY KEY (id);

--
-- Индексы таблицы product
--
ALTER TABLE product
  ADD PRIMARY KEY (id),
  ADD KEY main_category (main_category);

--
-- Индексы таблицы product_category
--
ALTER TABLE product_category
  ADD KEY product_id (product_id),
  ADD KEY category_id (category_id);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы category
--
ALTER TABLE category
  MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы feedback
--
ALTER TABLE feedback
  MODIFY id int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы news
--
ALTER TABLE news
  MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы product
--
ALTER TABLE product
  MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы product
--
ALTER TABLE product
  ADD CONSTRAINT product_ibfk_1 FOREIGN KEY (main_category) REFERENCES category (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы product_category
--
ALTER TABLE product_category
  ADD CONSTRAINT product_category_ibfk_1 FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT product_category_ibfk_2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
