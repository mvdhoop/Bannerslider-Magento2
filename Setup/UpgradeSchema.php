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

            // mobile image for banners
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

            // owl carousel settings for sliders
            $table = $setup->getTable('magestore_bannerslider_slider');
            if ($setup->getConnection()->isTableExists($table) == true) {
                
                $columnArrows = $setup->getConnection()->tableColumnExists($table, 'show_arrows');
                if (!$columnArrows) {
                    $setup->getConnection()->addColumn(
                        $table,
                        'show_arrows',
                        [
                            'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            'length'   => 10,
                            'nullable' => true,
                            'comment'  => 'Show arrows'
                        ]
                    );
                }

                $columnDots = $setup->getConnection()->tableColumnExists($table, 'show_dots');
                if (!$columnDots) {
                    $setup->getConnection()->addColumn(
                        $table,
                        'show_dots',
                        [
                            'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            'length'   => 10,
                            'nullable' => true,
                            'comment'  => 'Show dots'
                        ]
                    );
                }

                $columnAutoplay = $setup->getConnection()->tableColumnExists($table, 'autoplay');
                if (!$columnAutoplay) {
                    $setup->getConnection()->addColumn(
                        $table,
                        'autoplay',
                        [
                            'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            'length'   => 10,
                            'nullable' => true,
                            'comment'  => 'Autoplay'
                        ]
                    );
                }

                $columnAnimationSpeeed = $setup->getConnection()->tableColumnExists($table, 'anim_speed');
                if (!$columnAnimationSpeeed) {
                    $setup->getConnection()->addColumn(
                        $table,
                        'anim_speed',
                        [
                            'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                            'length'   => 10,
                            'nullable' => true,
                            'comment'  => 'Animation speed'
                        ]
                    );
                }
            }

        }

        $setup->endSetup();

    }


}