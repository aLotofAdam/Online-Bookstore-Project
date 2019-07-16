USE Bookstore;

CREATE TABLE BOOKS (ISBN INTEGER, Title VARCHAR(20), authorID VARCHAR(30), PublisherID VARCHAR(30), 
	Year_Published INTEGER, Price DECIMAL(2), Book_Description VARCHAR(250), Genre VARCHAR(20), 
	FormatType VARCHAR(20), BookCondition VARCHAR(20), numOfPages INTEGER, Written_Language VARCHAR(20), 
	Product_Weight INTEGER, productDimiensions VARCHAR(20), Reviews VARCHAR(250),
	PRIMARY KEY (ISBN), 
	FOREIGN KEY(authorID) REFERENCES AUTHORS(authorID));

CREATE TABLE AUTHORS (authorID VARCHAR(30), authorFirstName VARCHAR(20), authorLastName VARCHAR(20), ISBN INTEGER,
	PRIMARY KEY(authorID),
	FOREIGN KEY(ISBN) REFERENCES BOOKS(ISBN));
