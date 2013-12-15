<?php 

/**
 * Migration file to create Artifacts table
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Migration
 * @subpackage Migration_Create_artifacts_table
 */ 

class Migration_Create_artifacts_table extends CI_Migration
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
            'identifier' => array(
                'type' => 'VARCHAR', 
                'constraint' => 15,
                'null' => FALSE),
            'name' => array(
                'type' => 'VARCHAR', 
                'constraint' => 255,
                'null' => FALSE),                 
            'description' => array(
                'type' => 'TEXT', 
                'null' => TRUE),  
            'date' => array(
                'type' => 'VARCHAR', 
                'constraint' => 20,
                'null' => TRUE),
            'creator' => array(
                'type' => 'VARCHAR', 
                'constraint' => 30,
                'null' => TRUE),
            'source' => array(
                'type' => 'VARCHAR', 
                'constraint' => 100,
                'null' => TRUE),
            'dimensions' => array(
                'type' => 'VARCHAR', 
                'constraint' => 75,
                'null' => TRUE),
            'status' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE),
            'views' => array(
                'type' => 'INT', 
                'default' => 0,
                'unsigned' => TRUE, 
                'null' => FALSE),
            'created_at' => array(
                'type' => 'TIMESTAMP', 
                'default' => '0000-00-00 00:00:00',
                'null' => FALSE),
            'updated_at' => array(
                'type' => 'TIMESTAMP', 
                'default' => '0000-00-00 00:00:00',
                'null' => FALSE)            
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(
            array(
                    'status', 
                    'id', 
                    'name', 
                    'identifier', 
                    'views'
            )
        );        

        $this->dbforge->create_table('artifacts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        $this->dbforge->drop_table('artifacts');
    }
}