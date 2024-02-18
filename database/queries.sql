/*  Query Flights miles, ticket prices, departure & arrival time in Table ar_flight, 
 *  departure airport name, arrival airport name in Table ar_airport
 *  company in Table ar_company
 *  aircraft in Table ar_aircraft
 *  */

SET @departure = 'Montreal';
SET @arrival = 'Calgary';

SELECT 
    f.flight_id AS `ID`,
    c.company_name AS `Company`,
    p.aircraft_model AS `Plane`,
    f.airline_miles AS `Miles`,
    f.departure_time AS `Departure`,
    f.arrival_time AS `Arrival`,
    f.price_business AS `Business`,
    f.price_premium AS `Premium`,
    f.price_economy AS `Economy`
FROM 
    ar_flight f
JOIN 
    ar_company c ON c.company_id = f.company_id
JOIN 
    ar_aircraft p ON p.aircraft_id = f.aircraft_id
JOIN 
    ar_airport departure_airport ON f.departure_airport_id = departure_airport.airport_id
JOIN 
    ar_airport arrival_airport ON f.arrival_airport_id = arrival_airport.airport_id
WHERE 
    departure_airport.airport_city = @departure AND arrival_airport.airport_city = @arrival;