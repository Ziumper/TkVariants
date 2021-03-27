<?php

use TkVariants\Models\TkVariant;

class  Shopware_Controllers_Backend_TkVariants extends Shopware_Controllers_Backend_Application {

    protected $model = TkVariant::class;
    protected $alias = "tk_variants";

    protected function getListQuery()
    {
        $builder = parent::getListQuery();

        $builder->leftJoin('tk_variants.article', 'article');
        $builder->leftJoin('tk_variants.detail', 'detail');
        $builder->addSelect(array('article'));
        $builder->addSelect(array('detail'));
    

        return $builder;
    }

    protected function getDetailQuery($id)
    {
        $builder = parent::getDetailQuery($id);

        $builder->leftJoin('tk_variants.article', 'article');
        $builder->leftJoin('tk_variants.detail', 'detail');
        $builder->addSelect(array('article'));
        $builder->addSelect(array('detail'));

        return $builder;
    }
  

}