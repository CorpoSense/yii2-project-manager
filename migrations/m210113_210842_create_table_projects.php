<?php

use yii\db\Migration;

/**
 * Class m210113_210842_create_table_projects
 */
class m210113_210842_create_table_projects extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $tableOptions = 'ENGINE=InnoDB';

      $this->createTable(
          '{{%projects}}',
          [
              'project_id'=> $this->primaryKey(11),
              'name'=> $this->string(255)->notNull(),
              'type'=> $this->string(255)->notNull(),
              'rate'=> $this->string(255)->notNull()->defaultValue(0),
              'amount'=> $this->integer(11)->notNull()->defaultValue(0),
              'paid'=> $this->integer(11)->notNull()->defaultValue(0),
              'status'=> $this->integer(11)->notNull()->defaultValue(0),
              'date_added'=> $this->integer(11)->notNull()->defaultValue(0),
              'created_at'=> $this->integer(11)->null()->defaultValue(null),
              'updated_at'=> $this->integer(11)->null()->defaultValue(null),
          ],$tableOptions
      );
      $this->createIndex('projects_idx','{{%projects}}',['project_id'],false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropIndex('projects_idx', '{{%projects}}');
      $this->dropTable('{{%projects}}');
    }

}
