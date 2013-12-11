<?php

/**
 * Migration file to create Sessions table
 * @author Faust Gertz <faust@faustgertz.com>
 * @version 0.1 
 * @package CI_Migration
 * @subpackage Migration_Create_ci_sessions_table
 */ 

class Migration_Create_ci_sessions_table extends CI_Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        $this->dbforge->add_field(array(
            'session_id' => array(
                'type' => 'VARCHAR', 
                'constraint' => 40,
                'DEFAULT' => '0',
                'null' => FALSE), 
            'ip_address' => array(
                'type' => 'VARCHAR', 
                'constraint' => 45,
                'DEFAULT' => '0',
                'null' => FALSE),
            'user_agent' => array(
                'type' => 'VARCHAR', 
                'constraint' => 120,
                'null' => FALSE),                 
            'last_activity' => array(
                'type' => 'INT', 
                'constraint' => 10,
                'unsigned' => TRUE, 
                'DEFAULT' => '0',
                'null' => FALSE), 
            'user_data' => array(
                'type' => 'TEXT', 
                'null' => FALSE),
        ));
        
        $this->dbforge->add_key('session_id', TRUE);
        $this->dbforge->add_key('last_activity');        

        $this->dbforge->create_table('ci_sessions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        $this->dbforge->drop_table('ci_sessions');
    }
}