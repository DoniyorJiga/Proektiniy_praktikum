-- добавление данных и строк в таблицы 
.headers on 
.mode column 

-- создадим таблицу 
CREATE TABLE Client( 
ID_client INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
FIO NVARCHAR(50) NOT NULL, 
Age INTEGER NOT NULL);

CREATE TABLE Request( 
ID_request INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
ID_client INTEGER NOT NULL, 
ID_service INTEGER NOT NULL);

CREATE TABLE Service( 
ID_service INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
Name NVARCHAR(50) NOT NULL, 
Price money NOT NULL);

-- добавление строк 
INSERT INTO Client (ID_client, FIO, Age) 
VALUES (1, 'Иванов Иван Иванович', 25); 
INSERT INTO Client (ID_client, FIO, Age) 
VALUES (2, 'Литвинов Алексей Александрович', 40); 
INSERT INTO Client (ID_client, FIO, Age) 
VALUES (3, 'Сахарова Ксения Дмитревна', 18); 
INSERT INTO Client (ID_client, FIO, Age) 
VALUES (4, 'Дмитриенко Анна Евгеньевна', 28); 
INSERT INTO Client (ID_client, FIO, Age) 
VALUES (5, 'Петров Степан Аркадьевич', 45); 

INSERT INTO Request (ID_request, ID_client, ID_service) 
VALUES (1, 1, 1);
 INSERT INTO Request (ID_request, ID_client, ID_service) 
VALUES (3, 2, 3);
INSERT INTO Request (ID_request, ID_client, ID_service) 
VALUES (4, 3, 2);
INSERT INTO Request (ID_request, ID_client, ID_service) 
VALUES (5, 4, 5);
INSERT INTO Request (ID_request, ID_client, ID_service) 
VALUES (7, 5, 4);

INSERT INTO Service (ID_service, Name, Price) 
VALUES (1, 'Замена дисплея iphone 4', 3000,0000);
INSERT INTO Service (ID_service, Name, Price) 
VALUES (1, 'Замена дисплея iphone 5', 4500,0000);
INSERT INTO Service (ID_service, Name, Price) 
VALUES (1, 'Замена дисплея iphone 5s', 4500,0000);
INSERT INTO Service (ID_service, Name, Price) 
VALUES (1, 'Замена дисплея iphone SE', 4500,0000);
INSERT INTO Service (ID_service, Name, Price) 
VALUES (1, 'Замена дисплея iphone 6', 7000,0000);



