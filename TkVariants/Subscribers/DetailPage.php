<?php

namespace TkVariants\Subscribers;

use Doctrine\DBAL\Connection;
use Enlight\Event\SubscriberInterface;
use Enlight_Controller_ActionEventArgs;
use Shopware\Bundle\StoreFrontBundle\Service\ContextServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Service\Core\ListProductService;
use Shopware\Components\Compatibility\LegacyStructConverter;

class DetailPage implements SubscriberInterface {

    private $connection;
    private $listProductService;
    private $shopContext;
    private $legacyStructConverter;

    public function __construct(
        Connection $connection, 
        ListProductService $listProductService,
        ContextServiceInterface $shopContext,
        LegacyStructConverter $legacyStructConverter
    )
    {
        $this->connection = $connection;
        $this->listProductService = $listProductService;  
        $this->shopContext = $shopContext;      
        $this->legacyStructConverter = $legacyStructConverter;
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onPostDispatch'
        ];              
    }

    public function onPostDispatch(Enlight_Controller_ActionEventArgs $args)
    {
        $view = $args->getSubject()->View();
        $articleId = $view->getAssign('sArticle')['articleID'];
        
        if(empty($articleId)) {
            return;
        }

        $variants = $this->getVariants($articleId);
        $view->assign('tkVariants',$variants);
    }

    private function getVariants(int $articleId) {
        $ordernumbers =  $this->connection->createQueryBuilder()->select('variants.ordernumber')
        ->from('tk_variants_products','tkVariants')
        ->leftJoin('tkVariants','s_articles_details','variants','tkVariants.detail_id = variants.id')
        ->where('tkVariants.article_id = :articleId')->setParameter('articleId',$articleId)
        ->execute()->fetchAll();

        $numbers = [];

        foreach($ordernumbers as $ordernumber) {
            $number = $ordernumber['ordernumber'];
            $numbers[] = $number;
        } 

        if(empty($numbers)) {
            return [];
        }

        $shopContenxt = $this->shopContext->getContext();

        $products = $this->listProductService->getList($numbers,$shopContenxt);

        $result = [];

        foreach($products as $product) {
            $result[] = $this->legacyStructConverter->convertListProductStruct($product);
        }

        return $result;
    }
}