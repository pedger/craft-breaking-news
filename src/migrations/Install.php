<?php
/**
 * Craft Breaking News plugin for Craft CMS 3.x
 *
 * Displays a Breaking News banner on your website
 *
 * @link      http://pedrops.com
 * @copyright Copyright (c) 2018 Pedro Germani
 */

namespace pedrops\craftbreakingnews\migrations;

use pedrops\craftbreakingnews\CraftBreakingNews;

use Craft;
use craft\config\DbConfig;
use craft\db\Migration;

/**
 * Craft Breaking News Install Migration
 *
 * If your plugin needs to create any custom database tables when it gets installed,
 * create a migrations/ folder within your plugin folder, and save an Install.php file
 * within it using the following template:
 *
 * If you need to perform any additional actions on install/uninstall, override the
 * safeUp() and safeDown() methods.
 *
 * @author    Pedro Germani
 * @package   CraftBreakingNews
 * @since     1.0.2
 */
class Install extends Migration
{
    // Public Properties
    // =========================================================================

    /**
     * @var string The database driver to use
     */
    public $driver;

    // Public Methods
    // =========================================================================

    /**
     * This method contains the logic to be executed when applying this migration.
     * This method differs from [[up()]] in that the DB logic implemented here will
     * be enclosed within a DB transaction.
     * Child classes may implement this method instead of [[up()]] if the DB logic
     * needs to be within a transaction.
     *
     * @return boolean return a false value to indicate the migration fails
     * and should not proceed further. All other return values mean the migration succeeds.
     */
    public function safeUp()
    {
        $this->driver = Craft::$app->getConfig()->getDb()->driver;
        if ($this->createTables()) {
            $this->createIndexes();
            $this->addForeignKeys();
            // Refresh the db schema caches
            Craft::$app->db->schema->refresh();
            $this->insertDefaultData();
        }

        return true;
    }

    /**
     * This method contains the logic to be executed when removing this migration.
     * This method differs from [[down()]] in that the DB logic implemented here will
     * be enclosed within a DB transaction.
     * Child classes may implement this method instead of [[down()]] if the DB logic
     * needs to be within a transaction.
     *
     * @return boolean return a false value to indicate the migration fails
     * and should not proceed further. All other return values mean the migration succeeds.
     */
    public function safeDown()
    {
        $this->driver = Craft::$app->getConfig()->getDb()->driver;
        $this->removeTables();

        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Creates the tables needed for the Records used by the plugin
     *
     * @return bool
     */
    protected function createTables()
    {
        $tablesCreated = false;

    // craftbreakingnews_activepost table
        $tableSchema = Craft::$app->db->schema->getTableSchema('{{%craftbreakingnews_activepost}}');
        if ($tableSchema === null) {
            $tablesCreated = true;
            $this->createTable(
                '{{%craftbreakingnews_activepost}}',
                [
                    'id' => $this->primaryKey(),
                    'dateCreated' => $this->dateTime()->notNull(),
                    'dateUpdated' => $this->dateTime()->notNull(),
                    'uid' => $this->uid(),
                // Custom columns in the table
                    'siteId' => $this->integer()->notNull(),
                    'some_field' => $this->string(255)->notNull()->defaultValue(''),
                ]
            );
        }

    // craftbreakingnews_activepostexpirydate table
        $tableSchema = Craft::$app->db->schema->getTableSchema('{{%craftbreakingnews_activepostexpirydate}}');
        if ($tableSchema === null) {
            $tablesCreated = true;
            $this->createTable(
                '{{%craftbreakingnews_activepostexpirydate}}',
                [
                    'id' => $this->primaryKey(),
                    'dateCreated' => $this->dateTime()->notNull(),
                    'dateUpdated' => $this->dateTime()->notNull(),
                    'uid' => $this->uid(),
                // Custom columns in the table
                    'siteId' => $this->integer()->notNull(),
                    'some_field' => $this->string(255)->notNull()->defaultValue(''),
                ]
            );
        }

        return $tablesCreated;
    }

    /**
     * Creates the indexes needed for the Records used by the plugin
     *
     * @return void
     */
    protected function createIndexes()
    {
    // craftbreakingnews_activepost table
        $this->createIndex(
            $this->db->getIndexName(
                '{{%craftbreakingnews_activepost}}',
                'some_field',
                true
            ),
            '{{%craftbreakingnews_activepost}}',
            'some_field',
            true
        );
        // Additional commands depending on the db driver
        switch ($this->driver) {
            case DbConfig::DRIVER_MYSQL:
                break;
            case DbConfig::DRIVER_PGSQL:
                break;
        }

    // craftbreakingnews_activepostexpirydate table
        $this->createIndex(
            $this->db->getIndexName(
                '{{%craftbreakingnews_activepostexpirydate}}',
                'some_field',
                true
            ),
            '{{%craftbreakingnews_activepostexpirydate}}',
            'some_field',
            true
        );
        // Additional commands depending on the db driver
        switch ($this->driver) {
            case DbConfig::DRIVER_MYSQL:
                break;
            case DbConfig::DRIVER_PGSQL:
                break;
        }
    }

    /**
     * Creates the foreign keys needed for the Records used by the plugin
     *
     * @return void
     */
    protected function addForeignKeys()
    {
    // craftbreakingnews_activepost table
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%craftbreakingnews_activepost}}', 'siteId'),
            '{{%craftbreakingnews_activepost}}',
            'siteId',
            '{{%sites}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

    // craftbreakingnews_activepostexpirydate table
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%craftbreakingnews_activepostexpirydate}}', 'siteId'),
            '{{%craftbreakingnews_activepostexpirydate}}',
            'siteId',
            '{{%sites}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * Populates the DB with the default data.
     *
     * @return void
     */
    protected function insertDefaultData()
    {
    }

    /**
     * Removes the tables needed for the Records used by the plugin
     *
     * @return void
     */
    protected function removeTables()
    {
    // craftbreakingnews_activepost table
        $this->dropTableIfExists('{{%craftbreakingnews_activepost}}');

    // craftbreakingnews_activepostexpirydate table
        $this->dropTableIfExists('{{%craftbreakingnews_activepostexpirydate}}');
    }
}
