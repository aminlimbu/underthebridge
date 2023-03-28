<?php 

class Blog{
    private $db;

    // constructor function, instantiate new database
    public function __construct(){
        $this->db = new Database;
    }

    // GetBlogs method, join two tables (users and blogs) and fetch data
    public function getBlogs(){
        $this->db->query('SELECT *,
            blogs.id as blogId,
            users.id as userId,
            blogs.created_at as blogCreated,
            users.created_at as userCreated
            FROM blogs
            INNER JOIN users
            ON blogs.user_id = users.id
            ORDER BY blogs.created_at
            ');

        return $this->db->fetchAll();
    }

    // AddBlog Method, populate database with new data
    public function addBlog($data){
        $this->db->query('INSERT INTO blogs(title, user_id, body) VALUES (:title, :user_id, :body)');

        // bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        // Execute query with bind values; update database
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
?>
