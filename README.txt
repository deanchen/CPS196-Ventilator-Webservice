Hello and welcome to the PMV Decision Aid Tool source code.

For license info see license.txt

The code for the doctor, admin, and rest api is contained in the api folder
The code for the survey the patient's family takes on the iPad is in the client folder.



Api folder documentation:

The api folder uses the CodeIgniter (http://codeigniter.com/) PHP framework, as well as MySQL for its databases.

All css files used by the system are contained in the /api/css folder.
All javascript files used by the system are contained in the /api/js folder.
All images used by the system are contained in the /api/images folder.
The /api/system folder is the CodeIgniter framework - you will not need to touch this.

The /api/application folder contains the core of the web application, implemented using CodeIgniter.
Read the CodeIgniter documentation for details, but the gist is that the functionality is contained
in the /api/application/models folder. The visuals for every page are in the /api/application/views folder.
And the mapping of what pages should do what and show what visuals is in the /api/application/controllers folder.
All files in these folders have a header explaining what they do.



Configuring and deploying the PMV Decision Aid Tool:

Aquire a hosting account or server that allows PHP and MySQL and domain name.

Set up the databases used by this web application. Create a database, and the import into it the SQL found in the db_schemas.sql file
in this folder.

Go into /api/application/config and copy database-sample.php to database.php. Open the database.php file and fill in the 
required settings needed to access the database you just set up.

Upload the entire contents of the folder containing this README to the hosting account or server's publically viewable html directory

Go to the domain name mapped to your server / hosting account in the web browser and confirm everything is working!
