CREATE DATABASE Company;
USE Company;
CREATE TABLE Category (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name CHAR(255) NOT NULL,
	image VARCHAR(255)
);

CREATE TABLE Product (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name CHAR(255) NOT NULL,
	image VARCHAR(255),
    price FLOAT NOT NULL,
    description TEXT,
    main_category INT NOT NULL
);

CREATE TABLE Product_category (
	product_id INT NOT NULL,
    category_id INT NOT NULL
);

CREATE TABLE News (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	header CHAR(255) NOT NULL,
	date DATE NOT NULL,
    preview TEXT,
    description TEXT
);

CREATE TABLE Feedback (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name CHAR(255) NOT NULL,
	e_mail CHAR(255) NOT NULL,
    phone CHAR(20),
    text TEXT NOT NULL
);

INSERT INTO Category (name)
VALUES ('Электронные сигареты'), ('Трубки'), ('Жидкости для заправки'), ('Аккумуляторы и атомайзеры'), 
	   ('Катриджи'), ('Зарядные устройства'), ('Аксессуары'), ('Подарочные наборы');

INSERT INTO Product (name, price, main_category)
VALUES ('Электронная сигарета FD12', 820, 1), ('Трубка из дерева', 760, 2), ('Жидкость для заправки', 59, 3),
('Аккумулятор TY 132', 450, 4), ('Картридж FG876', 110, 5), ('Зарядное устройство', 340, 6),
('Аксессуар', 500, 7), ('Подарочный набор', 1150, 8);

INSERT INTO Product_category (product_id, category_id)
VALUES (1, 1), (1, 8), (2, 1), (2, 2), (2, 8), (3, 3), (4, 4), (5, 5), (5, 7), (6, 6), (7, 7), (8, 8);

INSERT INTO News (header, date)
VALUES 
('Поздравительная речь президента международной корпорации Хуа Шэн господина Ли Вея в Международный...', '2010-03-03'),
('Собрание правления киевского филиала', '2010-02-27'),
('Петропавловскому офису международной корпорации Хуа Шен исполнился 1 год', '2010-02-23'),
('Проведение церемонии награждения в бишкекском филиале', '2010-02-22'),
('Сотрудники иркутского филиала отметили китайский новый', '2010-02-15'),
('Празднование китайского нового года в одесском филиале', '2010-02-14');
