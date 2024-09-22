-- Insert Drivers, Team, Circuit, Season, Race, Car, Result, ResultImages

-- Insert Driver
INSERT INTO Drivers (Full_Name, Nationality, Born_Date, Driver_Image)
VALUES ('Giuseppe Farina', 'Italian', '1906-10-30', 'farina.jpg');

-- Insert Team
INSERT INTO Team (Team_Name, Base_Location, Win_Amount, Establish)
VALUES ('Alfa Romeo', 'Milan, Italy', 10, 1910)
ON DUPLICATE KEY UPDATE Team_Name = Team_Name;

-- Insert Circuit
INSERT INTO Circuit (Circuit_Name, Location, Country)
VALUES ('Silverstone', 'Silverstone', 'UK');

-- Insert Season
INSERT INTO Season (Season_ID, Year)
VALUES (1950,1950);

-- Insert Race
INSERT INTO Race (Race_Name, Race_Date, Circuit_ID, Season_ID)
VALUES ('British Grand Prix', '1950-07-13', (SELECT Circuit_ID FROM Circuit WHERE Circuit_Name = 'Silverstone'), (SELECT Season_ID FROM Season WHERE Year = 1950));

-- Insert Car
INSERT INTO Car (Car_Name, Driver_ID, Car_Image, Team_ID)
VALUES ('Alfa Romeo 158', (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Giuseppe Farina'), 'alfa158.jpg', (SELECT Team_ID FROM Team WHERE Team_Name = 'Alfa Romeo'));

-- Insert Result
INSERT INTO Result (Result_ID, Race_ID, Driver_ID, Team_ID, Position, Car_ID, Season_ID)
VALUES (1950, 1, (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Giuseppe Farina'), (SELECT Team_ID FROM Team WHERE Team_Name = 'Alfa Romeo'), 1, (SELECT Car_ID FROM Car WHERE Car_Name = 'Alfa Romeo 158'), (SELECT Season_ID FROM Season WHERE Year = 1950));

-- Insert ResultImages
INSERT INTO ResultImages (Result_ID, ResultImage)
VALUES ((SELECT Result_ID FROM Result WHERE Race_ID = (SELECT Race_ID FROM Race WHERE Race_Name = 'British Grand Prix')), 'britishgp_winner.jpg');

-- Insert into SeasonDescriptions
INSERT INTO SeasonDescriptions (Season_ID, Description)
VALUES (
    (SELECT Season_ID FROM Season WHERE Year = 1950),
    'The 1950 Formula 1 season marked the inaugural year of the FIA Formula One World Championship. Giuseppe Farina won the championship driving for Alfa Romeo. The season consisted of 7 races.'
);


--2023
-- Insert Drivers, Team, Circuit, Season, Race, Car, Result, ResultImages

-- Insert Driver
INSERT INTO Drivers (Full_Name, Nationality, Born_Date, Driver_Image)
VALUES ('Max Verstappen', 'Dutch', '1997-09-30', 'images/drivers/max-verstappen-profile-pic.avif');

-- Insert Team
INSERT INTO Team (Team_Name, Base_Location, Win_Amount, Establish)
VALUES ('Red Bull Racing', 'Milton Keynes, UK', 7, 2005);

-- Insert Circuit
INSERT INTO Circuit (Circuit_Name, Location, Country)
VALUES ('Monza', 'Monza', 'Italy');

-- Insert Season
INSERT INTO Season (Season_ID, Year)
VALUES (2023, 2023);

-- Insert Race
INSERT INTO Race (Race_Name, Race_Date, Circuit_ID, Season_ID)
VALUES ('Italian Grand Prix', '2023-09-03', (SELECT Circuit_ID FROM Circuit WHERE Circuit_Name = 'Monza'), (SELECT Season_ID FROM Season WHERE Year = 2023));

-- Insert Car
INSERT INTO Car (Car_Name, Driver_ID, Car_Image, Team_ID)
VALUES ('Red Bull RB19', (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Max Verstappen'), 'rb19.jpg', (SELECT Team_ID FROM Team WHERE Team_Name = 'Red Bull Racing'));

-- Insert Result
INSERT INTO Result (Race_ID, Driver_ID, Team_ID, Position, Car_ID, Season_ID)
VALUES (
    (SELECT Race_ID FROM Race WHERE Race_Name = 'Italian Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 2023)),
    (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Max Verstappen'),
    (SELECT Team_ID FROM Team WHERE Team_Name = 'Red Bull Racing'),
    1,
    (SELECT Car_ID FROM Car WHERE Car_Name = 'Red Bull RB19'),
    (SELECT Season_ID FROM Season WHERE Year = 2023)
);

-- Insert ResultImages
INSERT INTO ResultImages (Result_ID, ResultImage)
VALUES (
    (SELECT Result_ID FROM Result WHERE Race_ID = (SELECT Race_ID FROM Race WHERE Race_Name = 'Italian Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 2023))),
    'images/1950/2023result.jpg'
);

-- Insert into SeasonDescriptions
INSERT INTO SeasonDescriptions (Season_ID, Description)
VALUES (
    (SELECT Season_ID FROM Season WHERE Year = 2023),
    'The 2023 Formula 1 season featured exciting races with Max Verstappen winning the Italian Grand Prix driving for Red Bull Racing. The season included races across various iconic circuits.'
);


--1975
-- Insert Drivers, Team, Circuit, Season, Race, Car, Result, ResultImages

-- Insert Driver
INSERT INTO Drivers (Full_Name, Nationality, Born_Date, Driver_Image)
VALUES ('Niki Lauda', 'Austrian', '1949-02-22', 'images/drivers/niki-lauda.jpg');

-- Insert Team
INSERT INTO Team (Team_Name, Base_Location, Win_Amount, Establish)
VALUES ('Ferrari', 'Maranello, Italy', 16, 1929);

-- Insert Circuit
INSERT INTO Circuit (Circuit_Name, Location, Country)
VALUES ('Monza', 'Monza', 'Italy');

-- Insert Season
INSERT INTO Season (Season_ID, Year)
VALUES (1975, 1975);

-- Insert Race
INSERT INTO Race (Race_Name, Race_Date, Circuit_ID, Season_ID)
VALUES ('Italian Grand Prix', '1975-09-07', (SELECT Circuit_ID FROM Circuit WHERE Circuit_Name = 'Monza'), (SELECT Season_ID FROM Season WHERE Year = 1975));

-- Insert Car
INSERT INTO Car (Car_Name, Driver_ID, Car_Image, Team_ID)
VALUES ('Ferrari 312T', (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Niki Lauda'), 'ferrari_312t.jpg', (SELECT Team_ID FROM Team WHERE Team_Name = 'Ferrari'));

-- Insert Result
INSERT INTO Result (Race_ID, Driver_ID, Team_ID, Position, Car_ID, Season_ID)
VALUES (
    (SELECT Race_ID FROM Race WHERE Race_Name = 'Italian Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 1975)),
    (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Niki Lauda'),
    (SELECT Team_ID FROM Team WHERE Team_Name = 'Ferrari'),
    1,
    (SELECT Car_ID FROM Car WHERE Car_Name = 'Ferrari 312T'),
    (SELECT Season_ID FROM Season WHERE Year = 1975)
);

-- Insert ResultImages
INSERT INTO ResultImages (Result_ID, ResultImage)
VALUES (
    (SELECT Result_ID FROM Result WHERE Race_ID = (SELECT Race_ID FROM Race WHERE Race_Name = 'Italian Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 1975))),
    'images/1950/1975-result.webp'
);

-- Insert into SeasonDescriptions
INSERT INTO SeasonDescriptions (Season_ID, Description)
VALUES (
    (SELECT Season_ID FROM Season WHERE Year = 1975),
    'The 1975 Formula 1 season saw Niki Lauda winning the Italian Grand Prix driving for Ferrari. The season was marked by competitive racing and technical advancements.'
);


--1988
-- Insert Drivers
INSERT INTO Drivers (Full_Name, Nationality, Born_Date, Driver_Image)
VALUES ('Ayrton Senna', 'Brazilian', '1960-03-21', 'images/drivers/ayrton-senna.jpg');

-- Insert Team
INSERT INTO Team (Team_Name, Base_Location, Win_Amount, Establish)
VALUES ('McLaren', 'Woking, UK', 8, 1963);

-- Insert Circuit
INSERT INTO Circuit (Circuit_Name, Location, Country)
VALUES ('Suzuka International Racing Course', 'Suzuka', 'Japan');

-- Insert Season
INSERT INTO Season (Season_ID, Year)
VALUES (1988, 1988);

-- Insert Race
INSERT INTO Race (Race_Name, Race_Date, Circuit_ID, Season_ID)
VALUES ('Japanese Grand Prix', '1988-10-30', (SELECT Circuit_ID FROM Circuit WHERE Circuit_Name = 'Suzuka'), (SELECT Season_ID FROM Season WHERE Year = 1988));

-- Insert Car
INSERT INTO Car (Car_Name, Driver_ID, Car_Image, Team_ID)
VALUES ('McLaren MP4/4', (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Ayrton Senna'), 'images/cars/mclaren-mp4-4.jpg', (SELECT Team_ID FROM Team WHERE Team_Name = 'McLaren'));

-- Insert Result
INSERT INTO Result (Race_ID, Driver_ID, Team_ID, Position, Car_ID, Season_ID)
VALUES ((SELECT Race_ID FROM Race WHERE Race_Name = 'Japanese Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 1988)),
        (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Ayrton Senna'), 
        (SELECT Team_ID FROM Team WHERE Team_Name = 'McLaren'), 
        1, 
        (SELECT Car_ID FROM Car WHERE Car_Name = 'McLaren MP4/4' AND Driver_ID = (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Ayrton Senna')),
        (SELECT Season_ID FROM Season WHERE Year = 1988));

-- Insert ResultImages
INSERT INTO ResultImages (Result_ID, ResultImage)
VALUES ((SELECT Result_ID FROM Result WHERE Race_ID = (SELECT Race_ID FROM Race WHERE Race_Name = 'Japanese Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 1988) LIMIT 1)),
        'images/1950/1988-result.webp');

-- Insert into SeasonDescriptions
INSERT INTO SeasonDescriptions (Season_ID, Description)
VALUES ((SELECT Season_ID FROM Season WHERE Year = 1988),
        'The 1988 Formula 1 season was dominated by McLaren-Honda, with Ayrton Senna and Alain Prost driving the McLaren MP4/4. Senna won the Drivers\' Championship and McLaren secured the Constructors\' Championship.');


--2000
-- Insert Drivers
INSERT INTO Drivers (Full_Name, Nationality, Born_Date, Driver_Image)
VALUES ('Michael Schumacher', 'German', '1969-01-03', 'images/drivers/Michael-Schumacher.webp');


-- Insert Circuit
INSERT INTO Circuit (Circuit_Name, Location, Country)
VALUES ('Suzuka International Racing Course', 'Suzuka', 'Japan');

-- Insert Season
INSERT INTO Season (Season_ID, Year)
VALUES (2000, 2000);

-- Insert Race
INSERT INTO Race (Race_Name, Race_Date, Circuit_ID, Season_ID)
VALUES ('Japanese Grand Prix', '2000-10-08', (SELECT Circuit_ID FROM Circuit WHERE Circuit_Name = 'Suzuka'), (SELECT Season_ID FROM Season WHERE Year = 2000));

-- Insert Car
INSERT INTO Car (Car_Name, Driver_ID, Car_Image, Team_ID)
VALUES ('Ferrari F1-2000', (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Michael Schumacher'), 'images/cars/ferrari-f1-2000.jpg', (SELECT Team_ID FROM Team WHERE Team_Name = 'Ferrari'));

-- Insert Result
INSERT INTO Result (Race_ID, Driver_ID, Team_ID, Position, Car_ID, Season_ID)
VALUES ((SELECT Race_ID FROM Race WHERE Race_Name = 'Japanese Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 2000)),
        (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Michael Schumacher'), 
        (SELECT Team_ID FROM Team WHERE Team_Name = 'Ferrari'), 
        1, 
        (SELECT Car_ID FROM Car WHERE Car_Name = 'Ferrari F1-2000' AND Driver_ID = (SELECT Driver_ID FROM Drivers WHERE Full_Name = 'Michael Schumacher')),
        (SELECT Season_ID FROM Season WHERE Year = 2000));

-- Insert ResultImages
INSERT INTO ResultImages (Result_ID, ResultImage)
VALUES ((SELECT Result_ID FROM Result WHERE Race_ID = (SELECT Race_ID FROM Race WHERE Race_Name = 'Japanese Grand Prix' AND Season_ID = (SELECT Season_ID FROM Season WHERE Year = 2000) LIMIT 1)),
        'images/1950/2000-result.jpg');

-- Insert into SeasonDescriptions
INSERT INTO SeasonDescriptions (Season_ID, Description)
VALUES ((SELECT Season_ID FROM Season WHERE Year = 2000),
        'The 2000 Formula 1 season saw Michael Schumacher winning the Japanese Grand Prix driving for Ferrari. It was his third Drivers\' Championship and Ferrari\'s 11th Constructors\' Championship.');
