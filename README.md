# Online-Bookstore-Project
Proof-of-concept online bookstore with a simple webpage interface

## About This Project:
This was my final project for my relational database class. It had been years since I last used HTML and CSS, so I had to refresh my knowledge on those skills. I wrote the CSS as an internal stylesheet; I am now aware that this is bad practice. I had never used PHP or jQuery before, so I had to learn the basics in order to write my server-side code. I used XAMPP to create a local web server to test my code.

## Tech Stack Used: 
HTML, CSS, PHP, jQuery, and MySQL.

## Requirements:
* Use SQL commands to create tables with primary and foreign keys.
*	Simple webpage interface.
*	Webpage should be able to query database and display tables.
*	Implement an administrator's transaction to insert new books with relevant data into the database.

## Screenshots:
![Figure 1](/images/f1.png)
**Figure 1:** Full view of webpage.

![Figure 2](/images/f2.png)
**Figure 2:** Form drops down when "Admin Book Form" button is clicked. The Admin can add a new book through this form. 

*(Note: the red shield icon at the end of the boxes is apart of an Avira extension I have for this browser, please ignore this.)*

![Figure 3](/images/f3.png)
**Figure 3:** Form drops down when "Admin Author Form" button is clicked. The Admin can add new authors to the database through this form. The ISBN is a foreign key in the AUTHORS table. It is used to add the authorID to the correct column of the BOOKS table.

![Figure 4](/images/f4.png)
**Figure 4:** After submitting either the Admin Book Form or Admin Author Form, an alert box will pop up letting the Admin know if it was successful or if it failed.

![Figure 5](/images/f5.png)
**Figure 5:** A query for the entire BOOKS Table.

![Figure 6](/images/f6.png)
**Figure 6:** A query for the entire AUTHORS Table.

![Figure 7](/images/f7.png)
**Figure 7:** The ISBN Query shows all the authors for a given ISBN. This is to show that multiple authors are allowed per book.
