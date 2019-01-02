<?php

/**
 * @category    Magestore
 * @package     Magestore_Bannerslider
 */

namespace Magestore\Bannerslider\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) {

        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.8.0') < 0) {

            $table = $setup->getTable('magestore_bannerslider_banner');
            if ($setup->getConnection()->isTableExists($table) == true) {
                $column = $setup->getConnection()->tableColumnExists($table, 'mobile_image');
                if (!$column) {
                    $setup->getConnection()->addColumn(
                        $table,
                        'mobile_image',
                        [
                            'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                            'length'   => 255,
                            'nullable' => true,
                            'comment'  => 'Mobile Banner Image'
                        ]
                    );
                }
            }

        }

        $setup->endSetup();

    }


}