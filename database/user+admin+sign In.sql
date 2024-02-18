DROP TABLE IF EXISTS ar_booking;
DROP TABLE IF EXISTS ar_flight;
DROP TABLE IF EXISTS ar_airport;
DROP TABLE IF EXISTS ar_user;
DROP TABLE IF EXISTS ar_person;


CREATE TABLE ar_person (
    person_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    password VARCHAR(255),
    email VARCHAR(30),
    first_name VARCHAR(30),
    middle_name VARCHAR(30),
    last_name VARCHAR(30),
    gender VARCHAR(10),
    preferred_language VARCHAR(30),
    preferred_meal VARCHAR(30),
    preferred_seat VARCHAR(30),
    birthday DATE,
    address VARCHAR(90),
    city VARCHAR(30),
    province VARCHAR(10),
    country VARCHAR(30),
    postal_code VARCHAR(10),
    admin BOOLEAN
)ENGINE=InnoDB;

/* INSERT INTO ar_person (person_id, first_name, last_name, birthday, gender, address) */
INSERT INTO ar_person (person_id, first_name, middle_name, last_name, gender, preferred_language, preferred_meal, preferred_seat, birthday, address, city, province, country, postal_code)
VALUES
(1, "Adobe", "", "Wong", "Female", "", "", "", "1979/02/05", "789 Oak St", "Montreal", "QC", "Canada", "H3K 3H3"),
(2, "John", "James", "Smith", "Male", "English", "", "", "1980/01/15", "123 Main St", "Toronto", "ON", "Canada", "M4E 0B5"),
(3, "Alice", "Rose", "Johnson", "Male", "French", "Muslim meal", "", "1983/04/22", "456 Elm St", "Vancouver", "BC", "Canada", "V6L 2L2"),
(4, "Robert", "Grace", "White", "Male", "English", "", "Window", "1986/10/18", "101 Pine St", "Ottawa", "ON", "Canada", "K1V 9J2"),
(5, "Emily", "", "Davis", "Female", "English", "Hindu meal", "", "1981/09/30", "202 Cedar St", "Calgary", "AB", "Canada", "T2B 1M5"),
(6, "Olivia", "Elizabeth", "Brown", "Male", "French", "", "", "1975/12/12", "303 Maple St", "Edmonton", "AB", "Canada", "T5K 0K5"),
(7, "Michael", "", "Lee", "Male", "English", "Diabetic meal", "Business Class", "1982/08/08", "404 Birch St", "Halifax", "NS", "Canada", "B3N 2T6"),
(8, "Emma", "Ava", "Miller", "Female", "French", "Vegetarian meal", "aisle", "1977/06/25", "505 Spruce St", "Winnipeg", "MB", "Canada", "R3G 2Y8"),
(9, "Sophia", "", "Young", "Female", "English", "", "Window", "1989/04/03", "606 Fir St", "Quebec City", "QC", "Canada", "G1C 5X9"),
(10, "Daniel", "", "Hall", "Male", "French", "", "First Class", "1972/10/14", "707 Pine St", "Regina", "SK", "Canada", "S4S 5P6"),
(11, "Olivia", "Daniel", "Clark", "Male", "French", "Asian meal", "Window", "1987/12/29", "808 Elm St", "Victoria", "BC", "Canada", "V8P 2G3"),
(12, "James", "", "Turner", "Male", "English", "", "Business Class", "1980/03/20", "909 Cedar St", "St. John's", "NL", "Canada", "A1A 4X4"),
(13, "Ava", "David", "Ward", "Female", "French", "Low-calorie meal", "First Class", "1973/08/07", "010 Oak St", "Yellowknife", "NT", "Canada", "X1A 1W6"),
(14, "Benjamin", "", "Foster", "Male", "French", "Muslim meal", "", "1985/10/11", "111 Pine St", "Iqaluit", "NU", "Canada", "X0A 3H0"),
(15, "Mia", "Joseph", "Gray", "Female", "English", "", "", "1988/04/28", "212 Cedar St", "Whitehorse", "YT", "Canada", "Y1A 4S7"),
(16, "William", "Amelia", "Bailey", "Male", "English", "Muslim meal", "aisle", "1971/11/02", "313 Elm St", "Charlottetown", "PE", "Canada", "C1A 1X8"),
(17, "Harper", "Christopher", "Cooper", "Male", "English", "Diabetic meal", "Window", "1981/06/19", "414 Maple St", "Fredericton", "NB", "Canada", "E3A 3R3"),
(18, "Evelyn", "Lily", "Cox", "Male", "French", "Vegetarian meal", "", "1974/04/15", "515 Birch St", "Halifax", "NS", "Canada", "B3N 2V1"),
(19, "Liam", "Matthew", "Richardson", "Male", "French", "Vegetarian meal", "Business Class", "1989/09/08", "616 Spruce St", "Winnipeg", "MB", "Canada", "R3G 2Z1"),
(20, "Amelia", "William", "Brooks", "Male", "English", "", "", "1978/12/23", "717 Fir St", "Regina", "SK", "Canada", "S4N 4M4"),
(21, "Ella", "", "Anderson", "Female", "English", "", "", "2012/03/10", "", "", "", "", ""),
(22, "Noah", "Thomas", "Johnson", "X", "English", "Baby meal", "", "2023/06/18", "", "", "", "", ""),
(23, "Sophia", "", "Martinez", "Female", "", "Child meal", "", "2018/10/05", "", "", "", "", ""),
(24, "Liam", "", "Thompson", "Female", "", "", "Window", "2011/07/22", "", "", "", "", ""),
(25, "Olivia", "Alexander", "Davis", "Male", "", "", "", "2014/04/15", "", "", "", "", "");

CREATE TABLE ar_user (
    user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(30),
    password VARCHAR(255),
    email VARCHAR(30),
    card_number VARCHAR(10),
	phone VARCHAR(20),
    head_img VARCHAR(60),
    person_id INT,
    admin BOOLEAN
)ENGINE=InnoDB;


INSERT INTO ar_user (user_id, user_name, password, email, card_number, phone, head_img, person_id, admin)
VALUES 
(1, "admin", "admin123", "admin@email.com", "816969890", "111-222-3333", "/avatar/img1.jpg", 1, TRUE),
(2, "skyrider123", "pass123", "john.smith@email.com", "873910885", "123-456-7892", "/avatar/img2.jpg", 2, FALSE),
(3, "travelbuff88", "abc@123", "alice@email.com", "861760757", "987-654-4321", "/avatar/img3.jpg", 3, FALSE),
(4, "globetrotter99", "testpass", "robert@email.com", "878445970", "444-555-6666", "/avatar/img4.jpg", 4, FALSE),
(5, "wanderlust22", "secure1", "emily@email.com", "876821703", "777-888-9999", "/avatar/img5.jpg", 5, FALSE),
(6, "nomadexplorer", "mypass", "olivia@email.com", "817161536", "112-223-3344", "/avatar/img6.jpg", 6, FALSE),
(7, "adventureseeker55", "p123456", "michael@email.com", "889396684", "223-334-4455", "/avatar/img7.jpg", 7, FALSE),
(8, "voyager2023", "letmein", "emma@email.com", "869788288", "334-445-5566", "/avatar/img8.jpg", 8, FALSE),
(9, "exploredreams", "welcome1", "sophia@email.com", "831130726", "445-556-6677", "/avatar/img9.jpg", 9, FALSE),
(10, "flightfreak44", "qwerty", "daniel@email.com", "878606359", "556-667-7788", "/avatar/img10.jpg", 10, FALSE),
(11, "roamingspirit", "passpass", "olivia.c@email.com", "873779187", "667-778-8899", "/avatar/img11.jpg", 11, FALSE),
(12, "infinitejourney", "football", "james@email.com", "802419547", "778-889-9009", "/avatar/img12.jpg", 12, FALSE),
(13, "eternalwanderer", "baseball", "ava@email.com", "807313474", "889-900-0111", "/avatar/img13.jpg", 13, FALSE),
(14, "soaringhigh78", "password", "benjamin@email.com", "811993293", "900-011-1221", "/avatar/img14.jpg", 14, FALSE),
(15, "odysseytraveler", "sunshine", "mia@email.com", "810553720", "444-122-2333", "/avatar/img15.jpg", 15, FALSE),
(16, "horizonchaser", "1234abcd", "william@email.com", "818614394", "122-233-3445", "/avatar/img16.jpg", 16, FALSE),
(17, "infinitedestiny", "welcome2", "harper@email.com", "869808480", "233-344-4552", "/avatar/img17.jpg", 17, FALSE),
(18, "journeyenthusiast", "abcdefgh", "evelyn@email.com", "875581821", "344-455-5664", "/avatar/img18.jpg", 18, FALSE),
(19, "travelepicurean", "abc98765432", "liam@email.com", "891675302", "455-566-6777", "/avatar/img19.jpg", 19, FALSE),
(20, "expeditionist2023", "passpass", "amelia@email.com", "848922928", "566-677-7887", "/avatar/img20.jpg", 20, FALSE);



CREATE TABLE ar_airport (
    airport_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    airport_code VARCHAR(10),
    airport_name VARCHAR(80),
    airport_province VARCHAR(10),
    airport_city VARCHAR(20),
    latitude DECIMAL(10, 4),
    longitude DECIMAL(10, 4)
)ENGINE=InnoDB;

INSERT INTO ar_airport (airport_id, airport_code, airport_name, airport_province, airport_city, latitude, longitude)
VALUES 
(1, "YYC", "Calgary International Airport", "AB", "Calgary", 51.1314, -114.0105),
(2, "YEG", "Edmonton International Airport", "AB", "Edmonton", 53.3097, -113.579),
(3, "YMM", "Fort McMurray Airport", "AB", "Fort McMurray", 56.6533, -111.2219),
(4, "YQF", "Red Deer Regional Airport", "AB", "Red Deer", 52.1822, -113.894),
(5, "YVR", "Vancouver International Airport", "BC", "Vancouver", 49.1947, -123.1792),
(6, "YYJ", "Victoria International Airport", "BC", "Victoria", 48.6469, -123.425),
(7, "YLW", "Kelowna International Airport", "BC", "Kelowna", 49.951, -119.3809),
(8, "YXX", "Abbotsford International Airport", "BC", "Abbotsford", 49.0253, -122.3616),
(9, "YWH", "Victoria Inner Harbour Airport", "BC", "Victoria", 48.4203, -123.3727),
(10, "YKA", "Kamloops Airport", "BC", "Kamloops", 50.7022, -120.444),
(11, "YXS", "Prince George Airport", "BC", "Prince George", 53.8886, -122.678),
(12, "YQQ", "Comox Valley Airport", "BC", "Comox Valley", 49.71, -124.886),
(13, "YCD", "Nanaimo Airport", "BC", "Nanaimo", 49.0523, -123.8707),
(14, "YZP", "Sandspit Airport", "BC", "Sandspit", 53.2531, -131.8136),
(15, "YWG", "Winnipeg James Armstrong Richardson International Airport", "MB", "Winnipeg", 49.9075, -97.2399),
(16, "YBR", "Brandon Municipal Airport", "MB", "Brandon", 49.91, -99.9519),
(17, "YFC", "Fredericton International Airport", "NB", "Fredericton", 45.8689, -66.5304),
(18, "YQM", "Greater Moncton Roméo LeBlanc International Airport", "NB", "Moncton", 46.1124, -64.6787),
(19, "YSJ", "Saint John Airport", "NB", "Saint John", 45.3161, -65.8905),
(20, "YYT", "St. John's International Airport", "NL", "St. John's", 47.6186, -52.7517),
(21, "YQX", "Gander International Airport", "NL", "Gander", 48.9433, -54.5681),
(22, "YDF", "Deer Lake Regional Airport", "NL", "Deer Lake", 49.2108, -57.3914),
(23, "YHZ", "Halifax Stanfield International Airport", "NS", "Halifax", 44.8805, -63.5086),
(24, "YQY", "Sydney/J.A. Douglas McCurdy Airport", "NS", "Sydney", 46.1614, -60.0478),
(25, "YZF", "Yellowknife Airport", "NT", "Yellowknife", 62.4647, -114.4404),
(26, "YFB", "Iqaluit Airport", "NU", "Iqaluit", 63.7566, -68.5558),
(27, "YYZ", "Toronto Pearson International Airport", "ON", "Toronto", 43.6777, -79.6248),
(28, "YOW", "Ottawa Macdonald-Cartier International Airport", "ON", "Ottawa", 45.3225, -75.6692),
(29, "YHM", "Hamilton John C. Munro International Airport", "ON", "Hamilton", 43.1717, -79.9353),
(30, "YXU", "London International Airport", "ON", "London", 43.0286, -81.1496),
(31, "YQT", "Thunder Bay International Airport", "ON", "Thunder Bay", 48.3722, -89.3256),
(32, "YYB", "North Bay Jack Garland Airport", "ON", "North Bay", 46.3636, -79.4227),
(33, "CZBA", "Burlington Airpark", "ON", "Burlington", 43.3555, -79.8258),
(34, "YOO", "Oshawa Executive Airport", "ON", "Oshawa", 43.922, -78.8948),
(35, "YGK", "Kingston Norman Rogers Airport", "ON", "Kingston", 44.2259, -76.5967),
(36, "YYG", "Charlottetown Airport", "PE", "Charlottetown", 46.2896, -63.1216),
(37, "YUL", "Montréal-Pierre Elliott Trudeau International Airport", "QC", "Montreal", 45.4577, -73.7497),
(38, "YQB", "Québec City Jean Lesage International Airport", "QC", "Quebec City", 46.7911, -71.3933),
(39, "YQB", "Québec City Jean Lesage International Airport", "QC", "Quebec City", 46.7911, -71.3933),
(40, "YGV", "Havre-Saint-Pierre Airport", "QC", "Havre-Saint-Pierre", 50.2425, -63.5983),
(41, "YXE", "Saskatoon John G. Diefenbaker International Airport", "SK", "Saskatoon", 52.17, -106.6997),
(42, "YQR", "Regina International Airport", "SK", "Regina", 50.432, -104.6669),
(43, "YXY", "Whitehorse Airport", "YT", "Whitehorse", 60.7096, -135.0679);


CREATE TABLE ar_flight (
    flight_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    company_id INT,
    aircraft_id INT,
    departure_airport_id INT,
    arrival_airport_id INT,
    airline_miles INT,
    departure_date DATE,
    departure_time TIME,
    arrival_date DATE,
    arrival_time TIME,
    price_business DECIMAL(10, 2),
    price_premium DECIMAL(10, 2),
    price_economy DECIMAL(10, 2)
)ENGINE=InnoDB;

CREATE TABLE ar_booking (
    booking_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    booking_number VARCHAR(20),
	user_id INT,
	flight_id INT,
	booking_date DATE,
    booking_time TIME,
	booking_status_id INT,
    total_price DECIMAL(10, 2)
)ENGINE=InnoDB;


INSERT INTO ar_flight (flight_id, company_id, aircraft_id, departure_airport_id, arrival_airport_id, airline_miles, departure_date, departure_time, arrival_date, arrival_time, price_business, price_premium, price_economy)
VALUES
(1, 6, 2, 1, 3, 641, "2023/03/12", "07:07:00", "2023/03/12", "07:55:00", 468, 272, 151),
(2, 8, 4, 1, 3, 641, "2023/04/18", "15:04:00", "2023/04/18", "15:52:00", 468, 272, 151),
(3, 10, 3, 1, 5, 687, "2023/06/04", "17:00:00", "2023/06/04", "17:51:00", 490, 284, 158),
(4, 6, 5, 1, 5, 687, "2023/11/01", "14:03:00", "2023/11/01", "14:54:00", 490, 284, 158),
(5, 7, 2, 1, 5, 687, "2023/08/05", "06:08:00", "2023/08/05", "06:59:00", 490, 284, 158),
(6, 8, 5, 1, 6, 728, "2023/04/05", "16:02:00", "2023/04/05", "16:56:00", 509, 295, 164),
(7, 9, 4, 1, 6, 728, "2023/10/17", "09:06:00", "2023/10/17", "10:00:00", 509, 295, 164),
(8, 7, 1, 1, 6, 728, "2023/07/10", "08:11:00", "2023/07/10", "09:05:00", 509, 295, 164),
(9, 2, 4, 1, 7, 401, "2023/10/08", "12:08:00", "2023/10/08", "12:38:00", 357, 207, 115),
(10, 1, 4, 1, 8, 640, "2023/06/12", "15:10:00", "2023/06/12", "15:58:00", 468, 271, 151),
(11, 5, 2, 1, 8, 640, "2023/09/01", "18:01:00", "2023/09/01", "18:49:00", 468, 271, 151),
(12, 10, 1, 1, 9, 736, "2023/03/17", "10:02:00", "2023/03/17", "10:57:00", 513, 297, 165),
(13, 4, 3, 1, 10, 453, "2023/08/06", "09:05:00", "2023/08/06", "09:39:00", 381, 221, 123),
(14, 3, 1, 1, 12, 786, "2023/04/12", "13:02:00", "2023/04/12", "14:00:00", 536, 311, 172),
(15, 3, 3, 1, 13, 740, "2023/09/17", "12:11:00", "2023/09/17", "13:06:00", 514, 298, 166),
(16, 8, 3, 1, 13, 740, "2023/10/11", "15:06:00", "2023/10/11", "16:01:00", 514, 298, 166),
(17, 10, 3, 1, 14, 1234, "2023/08/15", "19:10:00", "2023/08/15", "20:42:00", 744, 432, 240),
(18, 2, 2, 1, 14, 1234, "2023/11/26", "09:03:00", "2023/11/26", "10:35:00", 744, 432, 240),
(19, 6, 1, 1, 14, 1234, "2023/05/11", "09:03:00", "2023/05/11", "10:35:00", 744, 432, 240);



INSERT INTO ar_booking (booking_id, booking_number, user_id, flight_id, booking_date, booking_time, booking_status_id, total_price)
VALUES
(1, "I806397920", 14, 2000, "2023/07/22", "13:01:02", 2, 1793.00),
(2, "C825225288", 19, 914, "2023/10/05", "08:43:14", 3, 803.00),
(3, "Z806456182", 13, 1093, "2023/05/14", "19:11:17", 4, 2102.00),
(4, "C839582656", 9, 1601, "2023/06/09", "21:48:40", 3, 2496.00),
(5, "E821474358", 10, 1975, "2023/10/24", "14:06:02", 2, 580.00),
(6, "M805393817", 7, 1183, "2023/12/25", "21:16:04", 4, 1493.00),
(7, "D875279849", 17, 86, "2023/11/02", "16:25:15", 5, 6514.00),
(8, "N872422904", 18, 1209, "2023/03/23", "15:48:19", 2, 1469.00),
(9, "X870295576", 5, 2395, "2023/05/03", "23:46:06", 4, 2307.00),
(10, "P882615583", 19, 2468, "2023/03/02", "16:22:00", 4, 1776.00);