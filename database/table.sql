-- Table Drivers
CREATE TABLE Drivers (
    Driver_ID INT AUTO_INCREMENT PRIMARY KEY,
    Full_Name VARCHAR(100) NOT NULL,
    Nationality VARCHAR(50),
    Born_Date DATE,
    Driver_Image VARCHAR(255)
);

-- Table Team
CREATE TABLE Team (
    Team_ID INT AUTO_INCREMENT PRIMARY KEY,
    Team_Name VARCHAR(100) NOT NULL,
    Base_Location VARCHAR(100),
    Win_Amount INT,
    Establish YEAR(4)
);

-- Table Circuit
CREATE TABLE Circuit (
    Circuit_ID INT AUTO_INCREMENT PRIMARY KEY,
    Circuit_Name VARCHAR(100) NOT NULL,
    Location VARCHAR(100),
    Country VARCHAR(50)
);

-- Table Season
CREATE TABLE Season (
    Season_ID INT AUTO_INCREMENT PRIMARY KEY,
    Year INT(4) NOT NULL -- Use INT for storing years in MySQL
);

-- Table Race
CREATE TABLE Race (
    Race_ID INT AUTO_INCREMENT PRIMARY KEY,
    Race_Name VARCHAR(100) NOT NULL,
    Race_Date DATE,
    Circuit_ID INT,
    Season_ID INT,
    FOREIGN KEY (Circuit_ID) REFERENCES Circuit(Circuit_ID),
    FOREIGN KEY (Season_ID) REFERENCES Season(Season_ID)
);

-- Table Car
CREATE TABLE Car (
    Car_ID INT AUTO_INCREMENT PRIMARY KEY,
    Car_Name VARCHAR(100) NOT NULL,
    Driver_ID INT,
    Car_Image VARCHAR(255),
    Team_ID INT,
    FOREIGN KEY (Driver_ID) REFERENCES Drivers(Driver_ID),
    FOREIGN KEY (Team_ID) REFERENCES Team(Team_ID)
);

-- Table Result
CREATE TABLE Result (
    Result_ID INT AUTO_INCREMENT PRIMARY KEY,
    Race_ID INT,
    Driver_ID INT,
    Team_ID INT,
    Position INT,
    Car_ID INT,
    Season_ID INT,
    FOREIGN KEY (Race_ID) REFERENCES Race(Race_ID),
    FOREIGN KEY (Driver_ID) REFERENCES Drivers(Driver_ID),
    FOREIGN KEY (Team_ID) REFERENCES Team(Team_ID),
    FOREIGN KEY (Car_ID) REFERENCES Car(Car_ID),
    FOREIGN KEY (Season_ID) REFERENCES Season(Season_ID)
);

-- Table ResultImages
CREATE TABLE ResultImages (
    Image_ID INT AUTO_INCREMENT PRIMARY KEY,
    Result_ID INT,
    ResultImage VARCHAR(255) NOT NULL,
    FOREIGN KEY (Result_ID) REFERENCES Result(Result_ID)
);

-- Table SeasonDescriptions
CREATE TABLE SeasonDescriptions (
    Season_ID INT PRIMARY KEY,
    Description TEXT, -- Use TEXT for large text fields in MySQL
    FOREIGN KEY (Season_ID) REFERENCES Season(Season_ID)
);
