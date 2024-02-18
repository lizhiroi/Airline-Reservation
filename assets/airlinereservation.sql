DROP DATABASE IF EXISTS `airreservation`;

CREATE DATABASE IF NOT EXISTS airreservation DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `airreservation`;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS ar_user;
DROP TABLE IF EXISTS ar_person;
DROP TABLE IF EXISTS ar_flight;
DROP TABLE IF EXISTS ar_seat;
DROP TABLE IF EXISTS ar_airport;
DROP TABLE IF EXISTS ar_booking;
DROP TABLE IF EXISTS ar_ticket;
DROP TABLE IF EXISTS ar_discount;

CREATE TABLE ar_person (
    person_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(30),
    middle_name VARCHAR(30),
    last_name VARCHAR(30),
    gender VARCHAR(10),
    perferred_language VARCHAR(30),
    perferred_meal VARCHAR(30),
    perferred_seat VARCHAR(30),
    birthday DATE,
    address VARCHAR(90),
    city VARCHAR(30),
    province VARCHAR(10),
    country VARCHAR(30),
    postal_code VARCHAR(10)
)ENGINE=InnoDB;

/* INSERT INTO ar_person (person_id, first_name, last_name, birthday, gender, address) */
INSERT INTO ar_person (person_id, first_name, middle_name, last_name, gender, preferred_language, perferred_meal, perferred_seat, birthday, address, city, province, country, postal_code)
VALUES
(1, "John", "James", "Smith", "Male", "English", "", "", "1980/01/15", "123 Main St", "Toronto", "ON", "Canada", "M4E 0B5"),
(2, "Alice", "Rose", "Johnson", "Male", "French", "Muslim meal", "", "1983/04/22", "456 Elm St", "Vancouver", "BC", "Canada", "V6L 2L2"),
(3, "Admin", "", "Admin", "Female", "", "", "", "1979/02/05", "789 Oak St", "Montreal", "QC", "Canada", "H3K 3H3"),
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
    password VARCHAR(30),
    email VARCHAR(30),
    card_number VARCHAR(10),
	phone VARCHAR(20),
    head_img VARCHAR(60),
    person_id INT,
    admin BOOLEAN,
    FOREIGN KEY (person_id) REFERENCES ar_person(person_id)
)ENGINE=InnoDB;



INSERT INTO ar_user (user_id, user_name, password, email, card_number, phone, head_img, person_id, admin)
VALUES 
(1, "SkyRider123", "pass123", "john.smith@email.com", "881320671", "123-456-7892", "/avatar/img1.jpg", 1, FALSE),
(2, "TravelBuff88", "abc@123", "alice@email.com", "886946472", "987-654-4321", "/avatar/img2.jpg", 2, FALSE),
(3, "admin", "admin123", "admin@email.com", "823404638", "111-222-3333", "/avatar/img3.jpg", 3, TRUE),
(4, "GlobeTrotter99", "testpass", "robert@email.com", "853593552", "444-555-6666", "/avatar/img4.jpg", 4, FALSE),
(5, "Wanderlust22", "secure1", "emily@email.com", "821423679", "777-888-9999", "/avatar/img5.jpg", 5, FALSE),
(6, "NomadExplorer", "mypass", "olivia@email.com", "875346549", "112-223-3344", "/avatar/img6.jpg", 6, FALSE),
(7, "AdventureSeeker55", "p123456", "michael@email.com", "888753378", "223-334-4455", "/avatar/img7.jpg", 7, FALSE),
(8, "Voyager2023", "letmein", "emma@email.com", "819939841", "334-445-5566", "/avatar/img8.jpg", 8, FALSE),
(9, "ExploreDreams", "welcome1", "sophia@email.com", "868200757", "445-556-6677", "/avatar/img9.jpg", 9, FALSE),
(10, "FlightFreak44", "qwerty", "daniel@email.com", "883926974", "556-667-7788", "/avatar/img10.jpg", 10, FALSE),
(11, "RoamingSpirit", "passpass", "olivia.c@email.com", "818748573", "667-778-8899", "/avatar/img11.jpg", 11, FALSE),
(12, "InfiniteJourney", "football", "james@email.com", "868399695", "778-889-9009", "/avatar/img12.jpg", 12, FALSE),
(13, "EternalWanderer", "baseball", "ava@email.com", "898833910", "889-900-0111", "/avatar/img13.jpg", 13, FALSE),
(14, "SoaringHigh78", "password", "benjamin@email.com", "835254213", "900-011-1221", "/avatar/img14.jpg", 14, FALSE),
(15, "OdysseyTraveler", "sunshine", "mia@email.com", "820426507", "444-122-2333", "/avatar/img15.jpg", 15, FALSE),
(16, "HorizonChaser", "1234abcd", "william@email.com", "890587777", "122-233-3445", "/avatar/img16.jpg", 16, FALSE),
(17, "InfiniteDestiny", "welcome2", "harper@email.com", "808706284", "233-344-4552", "/avatar/img17.jpg", 17, FALSE),
(18, "JourneyEnthusiast", "abcdefgh", "evelyn@email.com", "858452471", "344-455-5664", "/avatar/img18.jpg", 18, FALSE),
(19, "TravelEpicurean", "abc98765432", "liam@email.com", "881165965", "455-566-6777", "/avatar/img19.jpg", 19, FALSE),
(20, "Expeditionist2023", "passpass", "amelia@email.com", "880148423", "566-677-7887", "/avatar/img20.jpg", 20, FALSE);


CREATE TABLE ar_airport (
    airport_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    airport_code VARCHAR(10),
    airport_name VARCHAR(30),
    airport_province VARCHAR(10),
    airport_city VARCHAR(20),
    latitude DECIMAL(10, 4),
    longitude DECIMAL(10, 4)
)ENGINE=InnoDB;

INSERT INTO ar_airport (airport_id, airport_code, airport_name, airport_province, airport_city, latitude, longitude)
VALUES 
(1, "YYZ", "Toronto Pearson International Airport", "ON", "Toronto", 43.6777, -79.6248),
(2, "YVR", "Vancouver International Airport", "BC", "Vancouver", 49.1947, -123.1792),
(3, "YUL", "Montréal-Pierre Elliott Trudeau International Airport", "QC", "Montreal", 45.4577, -73.7497),
(4, "YYC", "Calgary International Airport", "AB", "Calgary", 51.1314, -114.0105),
(5, "YEG", "Edmonton International Airport", "AB", "Edmonton", 53.3097, -113.579),
(6, "YOW", "Ottawa Macdonald-Cartier International Airport", "ON", "Ottawa", 45.3225, -75.6692),
(7, "YHZ", "Halifax Stanfield International Airport", "NS", "Halifax", 44.8805, -63.5086),
(8, "YWG", "Winnipeg James Armstrong Richardson International Airport", "MB", "Winnipeg", 49.9075, -97.2399),
(9, "YQB", "Québec City Jean Lesage International Airport", "QC", "Quebec City", 46.7911, -71.3933),
(10, "YHM", "Hamilton John C. Munro International Airport", "ON", "Hamilton", 43.1717, -79.9353),
(11, "YYJ", "Victoria International Airport", "BC", "Victoria", 48.6469, -123.425),
(12, "YXU", "London International Airport", "ON", "London", 43.0286, -81.1496),
(13, "YLW", "Kelowna International Airport", "BC", "Kelowna", 49.951, -119.3809),
(14, "YYT", "St. John's International Airport", "NL", "St. John's", 47.6186, -52.7517),
(15, "YXE", "Saskatoon John G. Diefenbaker International Airport", "SK", "Saskatoon", 52.17, -106.6997),
(16, "YQR", "Regina International Airport", "SK", "Regina", 50.432, -104.6669),
(17, "YQT", "Thunder Bay International Airport", "ON", "Thunder Bay", 48.3722, -89.3256),
(18, "YXX", "Abbotsford International Airport", "BC", "Abbotsford", 49.0253, -122.3616),
(19, "YWH", "Victoria Inner Harbour Airport", "BC", "Victoria", 48.4203, -123.3727),
(20, "YFC", "Fredericton International Airport", "NB", "Fredericton", 45.8689, -66.5304),
(21, "YYG", "Charlottetown Airport", "PE", "Charlottetown", 46.2896, -63.1216),
(22, "YMM", "Fort McMurray Airport", "AB", "Fort McMurray", 56.6533, -111.2219),
(23, "YZF", "Yellowknife Airport", "NT", "Yellowknife", 62.4647, -114.4404),
(24, "YQX", "Gander International Airport", "NL", "Gander", 48.9433, -54.5681),
(25, "YDF", "Deer Lake Regional Airport", "NL", "Deer Lake", 49.2108, -57.3914),
(26, "YYB", "North Bay Jack Garland Airport", "ON", "North Bay", 46.3636, -79.4227),
(27, "YKA", "Kamloops Airport", "BC", "Kamloops", 50.7022, -120.444),
(28, "YXS", "Prince George Airport", "BC", "Prince George", 53.8886, -122.678),
(29, "YQQ", "Comox Valley Airport", "BC", "Comox Valley", 49.71, -124.886),
(30, "YQY", "Sydney/J.A. Douglas McCurdy Airport", "NS", "Sydney", 46.1614, -60.0478),
(31, "YCD", "Nanaimo Airport", "BC", "Nanaimo", 49.0523, -123.8707),
(32, "YQB", "Québec City Jean Lesage International Airport", "QC", "Quebec City", 46.7911, -71.3933),
(33, "YQM", "Greater Moncton Roméo LeBlanc International Airport", "NB", "Moncton", 46.1124, -64.6787),
(34, "YSJ", "Saint John Airport", "NB", "Saint John", 45.3161, -65.8905),
(35, "YFB", "Iqaluit Airport", "NU", "Iqaluit", 63.7566, -68.5558),
(36, "YXY", "Whitehorse Airport", "YT", "Whitehorse", 60.7096, -135.0679),
(37, "CZBA", "Burlington Airpark", "ON", "Burlington", 43.3555, -79.8258),
(38, "YQF", "Red Deer Regional Airport", "AB", "Red Deer", 52.1822, -113.894),
(39, "YBR", "Brandon Municipal Airport", "MB", "Brandon", 49.91, -99.9519),
(40, "YOO", "Oshawa Executive Airport", "ON", "Oshawa", 43.922, -78.8948),
(41, "YGK", "Kingston Norman Rogers Airport", "ON", "Kingston", 44.2259, -76.5967),
(42, "YZP", "Sandspit Airport", "BC", "Sandspit", 53.2531, -131.8136),
(43, "YGV", "Havre-Saint-Pierre Airport", "QC", "Havre-Saint-Pierre", 50.2425, -63.5983);


CREATE TABLE ar_flight (
    flight_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    airline_name VARCHAR(20),
    departure_airport_id INT,
    arrival_airport_id INT,
    departure_date DATE,
    departure_time TIME,
    arrival_date DATE,
    arrival_time TIME,
    price_first DECIMAL(10, 2),
    price_business DECIMAL(10, 2),
    price_economy DECIMAL(10, 2),
    available_seats INT,
    FOREIGN KEY (departure_airport_id) REFERENCES ar_airport(airport_id),
    FOREIGN KEY (arrival_airport_id) REFERENCES ar_airport(airport_id)
)ENGINE=InnoDB;

CREATE TABLE ar_seat (
    seat_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    flight_id INT,
    seat_number VARCHAR(20),
    seat_class VARCHAR(20),
    person_id INT,
    FOREIGN KEY (flight_id) REFERENCES ar_flight(flight_id),
    FOREIGN KEY (person_id) REFERENCES ar_person(person_id)
)ENGINE=InnoDB;

CREATE TABLE ar_booking (
    booking_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    booking_number VARCHAR(20),
	user_id INT,
	flight_id INT,
	booking_date DATE,
    booking_time TIME,
	total_price DECIMAL(10, 2),
	Status VARCHAR(20),
	FOREIGN KEY (user_id) REFERENCES ar_user(user_id),
    FOREIGN KEY (flight_id) REFERENCES ar_flight(flight_id)
)ENGINE=InnoDB;

CREATE TABLE ar_ticket (
	ticket_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	booking_id INT,
	person_id INT,
	seat_id INT,
	price DECIMAL(10, 2),
	checkin BOOLEAN,
	FOREIGN KEY (booking_id) REFERENCES ar_booking(booking_id),
    FOREIGN KEY (person_id) REFERENCES ar_person(person_id),
    FOREIGN KEY (seat_id) REFERENCES ar_seat(seat_id)
)ENGINE=InnoDB;

CREATE TABLE ar_discount (
	discount_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	adult DECIMAL(10, 2),
	children DECIMAL(10, 2),
	baby DECIMAL(10, 2),
	age_children INT,
	age_baby INT,
	reason1 VARCHAR(20),
	rate1 DECIMAL(10, 2),
	reason2 VARCHAR(20),
	rate2 DECIMAL(10, 2)
    reason3 VARCHAR(20),
	rate3 DECIMAL(10, 2)
)ENGINE=InnoDB;


