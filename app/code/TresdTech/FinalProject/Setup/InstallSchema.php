<?php
namespace TresdTech\FinalProject\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('tresdtech_finalproject_book')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('tresdtech_finalproject_book')
			)
				->addColumn(
					'book_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Book ID'
				)
				->addColumn(
					'fisrt_name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'First Name'
				)
				->addColumn(
					'last_name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Last Name'
				)
				->addColumn(
					'email',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Email'
				)
				->addColumn(
					'telephone',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Phone'
				)
				
				->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('Book Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('tresdtech_finalproject_book'),
				$setup->getIdxName(
					$installer->getTable('tresdtech_finalproject_book'),
					['fisrt_name','last_name','email','telephone'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['fisrt_name','last_name','email','telephone'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}