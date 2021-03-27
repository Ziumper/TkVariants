<?php


namespace TkVariants;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\Tools\SchemaTool;
use Exception;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class TkVariants extends Plugin  {

    public function install(InstallContext $context): void
    {
        $this->createDatabaseTables();
    }

    public function uninstall(UninstallContext $context)
    {
        if($context->keepUserData()) {
            return;
        }
        
        $this->dropDatabaseTables();
    }


    private function getModelManager(): ModelManager {
        return $this->container->get("models");
    }

    private function getConnection(): Connection {
        return $this->container->get('dbal_connection');
    }

    private function createDatabaseTables(): void {
        $tableExsit = $this->getConnection()->getSchemaManager()->tablesExist(["tk_variants_products"]); 
        
        if ($tableExsit) {
            return;
        }

        $modelManager = $this->getModelManager();
        $classes = [$modelManager->getClassMetadata(Models\TkVariant::class)];
        $schemaTool = new SchemaTool($modelManager);
        $schemaTool->createSchema($classes);
    }

    private function dropDatabaseTables(): void {
        $modelManager = $this->getModelManager();
        $classes = [$modelManager->getClassMetadata(Models\TkVariant::class)];
        $schemaTool = new SchemaTool($modelManager);
        $schemaTool->dropSchema($classes);
    }

}