<?php


namespace TkVariants\Models;

use Shopware\Models\Article\Article;
use Shopware\Models\Article\Detail;
use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;


/**
 * @ORM\Entity()
 * @ORM\Table(name="tk_variants_products", options={"collate"="utf8_unicode_ci"})
 */
class TkVariant extends ModelEntity {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * 
     *
     * @var Shopware\Models\Article\Article
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Article\Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;

    /**
     * Mapped variable for assocation extjs fetching
     *
     * @var 
     * 
     * @ORM\Column(name="article_id", type="integer")
     */
    private $articleId;


    /**
     *
     * @var Shopware\Models\Article\Detail
     * 
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Article\Detail")
     * @ORM\JoinColumn(name="detail_id", referencedColumnName="id")
     */
    private $detail;

    /**
     * Mapped variable for extjs fetching
     *
     * @var 
     * 
     * @ORM\Column(name="detail_id",type="integer")
     * 
     */
    private $detailId;


    public function setId(int $id)  {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    /**
     * Undocumented function
     *
     * @param mixed $article
     * @return void
     */
    public function setArticle($article) {
        $this->article = $article;
    }

    public function getArticle() {
        return $this->article;
    }

    /**
     * Undocumented function
     *
     * @param mixed $detail
     * @return void
     */
    public function setDetail($detail) {
        $this->detail = $detail;
    }

    public function getDetail() {
        return $this->detail;
    }

}