<?php

namespace page\migrations;

use yii\db\Migration;
use yii\rbac\Item as rbacItem;
use rbacUserManager\components\MigrationTrait;

/**
 * Handles the creation of table `page`.
 */
class m220719_151138_create_page_table extends Migration
{

    use MigrationTrait;

    protected $tableName = 'page';

    protected $authItems = [
        'permissions'   => [
            [
                'name'          => 'pageCreate',
                'ruleName'      => null,
                'description'   => 'Разрешение создавать новые страницы.',
            ],
            [
                'name'          => 'pageDelete',
                'ruleName'      => null,
                'description'   => 'Разрешение удалять страницы.',
            ],
            [
                'name'          => 'pageIndex',
                'ruleName'      => null,
                'description'   => 'Разрешение просматривать список страниц.',
            ],
            [
                'name'          => 'pageUpdate',
                'ruleName'      => null,
                'description'   => 'Разрешение обновлять страницы.',
            ],
            [
                'name'          => 'pageView',
                'ruleName'      => null,
                'description'   => 'Разрешение просматривать страницы.',
            ],
        ],
        'roles'         => [
            [
                'name'          => 'pageManager',
                'ruleName'      => null,
                'description'   => 'Управление страницами.',
                'children'      => [
                    'pageCreate'    => rbacItem::TYPE_PERMISSION,
                    'pageDelete'    => rbacItem::TYPE_PERMISSION,
                    'pageIndex'     => rbacItem::TYPE_PERMISSION,
                    'pageUpdate'    => rbacItem::TYPE_PERMISSION,
                    'pageView'      => rbacItem::TYPE_PERMISSION,
                    'fileManager'   => rbacItem::TYPE_PERMISSION,
                    'user'          => rbacItem::TYPE_ROLE,
                ],
            ],
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if(!$this->tableExists()){
            $this->createTable($this->tableName, [
                'id'            => $this->string(255)->notNull()->unique(),
                'title'         => $this->string()->notNull(),
                'content'       => $this->db->schema->createColumnSchemaBuilder('LONGTEXT')->null(),
                'keywords'      => $this->string()->null(),
                'description'   => $this->string()->null(),
                'layout'        => $this->string()->notNull(),
            ]);

            $this->addPrimaryKey('pk_' . $this->tableName, $this->tableName, 'id');
        }

        $this->addPermissions($this->authItems['permissions']);
        $this->addRoles($this->authItems['roles']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->tableExists() && $this->dropTable($this->tableName);

        $this->deletePermissions($this->authItems['permissions']);
        $this->deleteRoles($this->authItems['roles']);
    }

    protected function tableExists(): bool
    {
        return !is_null($this->db->schema->getTableSchema($this->tableName));
    }
    
}
