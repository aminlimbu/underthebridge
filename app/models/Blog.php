<?php 

class Blog{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

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
}
?>