<?php

/**
 * Migration file to create Images table
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Migration
 * @subpackage Migration_Create_images_table
 */ 

class Migration_Create_images_table extends CI_Migration
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
            'image' => array(
                'type' => 'VARCHAR', 
                'constraint' => 255,
                'null' => FALSE),
            'sort_order' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => TRUE, 
                'null' => FALSE)
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(
            array(
                'artifact_id', 
                'sort_order', 
                'image'
            )
        );

        $this->dbforge->create_table('images');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        $this->dbforge->drop_table('images');
    }
}