# underthebridge
(http://underthebridge.lovestoblog.com/)

A simple MVC framework using PHP and Bootstrap.
- Features
  - Blog post
    - Add Post
  - User Login and registration
    - User Session
    - Logout
  - MySql Database connection
    - updated database
    - populate from the database
    - user records
    - blogs record
  
- Model, View and Controller Framework and OOP: Object-Oriented Programming
  - Libraries with Core Classes
  - Instance of core class for controller and database
  - Core.php handles HTTP request
  - Controller load views and initialise models

- Database integration
  - MySQL
  - two tables Blogs and Users
  - Database connection using PDO
  
- Form Validation
  - Check of registered user
  - Register the user with the required and valid fields
  - Allow logged users to add post
  - Sanitise inputs
- Consume API
  - Display random quotations from API-ninja
