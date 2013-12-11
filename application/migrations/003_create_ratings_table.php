<?php

/**
 * Migration file to create Ratings table
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Migration
 * @subpackage Migration_Create_ratings_table
 */ 

class Migration_Create_ratings_table extends CI_Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT', 
                'constraint' => 10,
                'unsigned' => TRUE, 
                'auto_increment' => TRUE,
                'null' => FALSE), 
            'artifact_id' => array(
                'type' => 'INT', 
                'constraint' => 10,
                'unsigned' => TRUE, 
                'null' => FALSE), 
            'rating' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => TRUE, 
                'null' => FALSE),
            'status' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE), 
            'ip_address' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'null' => FALSE),
            'previous_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'null' => TRUE)
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(
            array(
                'artifact_id', 
                'status', 
                'rating'
              )
        );

        $this->dbforge->create_table('ratings');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        $this->dbforge->drop_table('ratings');
    }
}