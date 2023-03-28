# underthebridge

A simple MVC framework using PHP and Bootstrap.
- Features
  - Blog post
    - Add Post
  - User Login and registration
    - User Session
    - Logout
  - MySql Database connection
    - udpated database
    - populate from database
    - user records
    - blogs record
  
- Model, View and Controller Framework and OOP: Object-Oriented Programming
  - Libraries with Core Classes
  - Instance of core class for controller and database
  - Core.php handles http request
  - Controller load veiws and initialise models

- Database integrateion
  - MySQL
  - two tables Blogs and Users
  - Database connection using PDO
  
- Form Validation
  - Check of registered user
  - Register user with required and valid fields
  - Allow logged in user to add post
  - Sanitise inputs
- Consume API
  - display random quotation from api-ninja
