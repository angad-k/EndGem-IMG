# EndGem-IMG
## Instructions to set up the website
* Download the zip and extract it. 
* Rename the extracted folder to **'EndGem'**. 
* Copy the folder 'EndGem' to the root directory of your server such that it follows the following hierarchy :
  rootfolder/EndGem/index.php(or any other file inside the EndGem folder)
* I have uploaded the schema.sql file for setting up the database in the schemaForDatabase folder. Import the same into your mySQL with the query :
  >mysql -u root -p < schema.sql
* Also, I have used a user called 'clienthai' with the password 'YES' to connect to the SQL database. Create a similar user on your database with the query :
  >CREATE USER 'clienthai'@'localhost' IDENTIFIED BY 'YES';
* Grant the user permissions to view and update the database with the query :
  >GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO ‘clienthai’@'localhost’;
* Open the index.php file in EndGem and check my website out!
