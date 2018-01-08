<?php

class Usermodel extends CI_Model{

    public function getUsers()
    {
        //$this->load->database();
        //$this->load->dbforge();
        //$data=$this->db->get("blogs");
        //$data=$this->db->query("Select * from blogs");
        //print_r($result);
        //$result=$data->result_array();
        //return $result;
        $this->dbforge->drop_table('blogs');          //method to add and retrieve data from table

        $fields = array(
        'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
        ),
        'blog_author' => array(
                'type' =>'VARCHAR',
                'constraint' => '100',
                'default' => 'King of Town',
        ),
        'blog_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('blog_id', TRUE);
$this->dbforge->create_table('blogs');


$data = array(
'blog_id'=>1,
'blog_title'=>"haye",
'blog_author'=>"Raja",
'blog_description'=>"shiyaaaari"
);
$this->db->insert('blogs',$data);



    }

}
?>