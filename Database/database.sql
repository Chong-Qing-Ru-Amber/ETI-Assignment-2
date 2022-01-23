CREATE DATABASE Tutor;

use Tutor;

/* Create Table */
CREATE TABLE Tutors(
    TutorID          INT NOT NULL, 
    TutorName        VARCHAR (30) NOT NULL, 
    TutorDescription VARCHAR (250) NOT NULL, 
    PRIMARY KEY (TutorID)
)

/* Insert Values */
INSERT INTO Tutors (TutorID, TutorName, TutorDescription) VALUES ("1", "Wesley Teo", "ETI Modules");
INSERT INTO Tutors (TutorID, TutorName, TutorDescription) VALUES ("2", "Andy Tan", "ETI Modules");

