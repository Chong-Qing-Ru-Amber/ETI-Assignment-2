CREATE DATABASE ETIAsgn2;

use ETIAsgn2;

/* Create Table */
CREATE TABLE Tutors(
    TutorID          VARCHAR (30) NOT NULL, 
    TutorName        VARCHAR (30) NOT NULL, 
    TutorDescription VARCHAR (250) NOT NULL, 
    PRIMARY KEY (TutorID)
)

/* Insert Values */
INSERT INTO Tutors (TutorID, TutorName, TutorDescription) VALUES ("1", "Wesley Teo", "Module tutor.");
INSERT INTO Tutors (TutorID, TutorName, TutorDescription) VALUES ("2", "Andy Tan", "Module leader");

/* Create Table */
CREATE TABLE Modules
(
	ModuleCode VARCHAR(5) NOT NULL PRIMARY KEY, 
	ModuleName VARCHAR(50),
	ModuleSynopsis VARCHAR(50), 
	ModuleObjective VARCHAR(50),
    TutorID VARCHAR(5),
    FOREIGN KEY (TutorID) REFERENCES Tutors(TutorID)
);

/* Create Table */
CREATE TABLE Classes
(
    ClassCode VARCHAR(5) NOT NULL PRIMARY KEY, 
    ClassSchedule VARCHAR(250),
    ClassCapacity VARCHAR(50),
    TutorID VARCHAR(5),
    FOREIGN KEY (TutorID) REFERENCES Tutors(TutorID)
)

/* Create Table */
CREATE TABLE Timetable
(
    TimetableID VARCHAR(5) NOT NULL PRIMARY KEY,
    LessonDay VARCHAR(10),
    StartTime VARCHAR(5),
    EndTime VARCHAR(5),
    ModuleCode VARCHAR(5),
    FOREIGN KEY (ModuleCode) REFERENCES Modules(ModuleCode)
)

/* Create Table */
CREATE TABLE Ratings
(
    RatingsID VARCHAR(5) NOT NULL PRIMARY KEY,
    Ratings VARCHAR(3),
    Comments VARCHAR(50),
    TutorID VARCHAR(5),
    FOREIGN KEY (TutorID) REFERENCES Tutors(TutorID)
)

/* Create Table */
CREATE TABLE EnrolledStudents
(
    TutorID VARCHAR(5),
    ModuleCode VARCHAR(5),
    StudentID VARCHAR(5),
    FOREIGN KEY (TutorID) REFERENCES Tutors(TutorID)
    FOREIGN KEY (ModuleCode) REFERENCES Modules(ModuleCode)
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID)
)

/* Create Table */
CREATE TABLE EnrolledStudents
(
    StudentID VARCHAR(5) NOT NULL PRIMARY KEY, 
	StudentName VARCHAR(30),
	DOB VARCHAR(10), 
	Address VARCHAR(50), 
	PhoneNumber VARCHAR(8)
)



