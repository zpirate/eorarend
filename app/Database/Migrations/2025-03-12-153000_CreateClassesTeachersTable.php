<?php

use CodeIgniter\Database\Migration;

class CreateClassesTeachersTable extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'autoincrement' => true
            ],
            'class_id' => [
                'type' => 'int',
            ],
            'subject_id' => [
                'type' => 'int',
            ],
            'teacher_id' => [
                'type' => 'int',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['class_id','subject_id','teacher_id'], false, true);
        $this->forge->addForeignKey('class_id', 'classes', 'id');
        $this->forge->addForeignKey('subject_id', 'subjects', 'id');
        $this->forge->addForeignKey('teacher_id', 'teachers', 'id');

        $this->forge->createTable('classes_teachers');
    }

    public function down() {
        $this->forge->dropTable('classes_teachers');
    }
}