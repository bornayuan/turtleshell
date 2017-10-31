<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TsArticleBasic
 *
 * @ORM\Table(name="ts_article_basic", indexes={@ORM\Index(name="ARTICLE_CATEGORY_ID", columns={"article_category_id"}), @ORM\Index(name="USER_BASIC_ID", columns={"user_basic_id"})})
 * @ORM\Entity
 */
class TsArticleBasic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_timestamp", type="datetime", nullable=true)
     */
    private $updatedTimestamp;

    /**
     * @var \TsUserBasic
     *
     * @ORM\ManyToOne(targetEntity="TsUserBasic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_basic_id", referencedColumnName="id")
     * })
     */
    private $userBasic;

    /**
     * @var \TsArticleCategory
     *
     * @ORM\ManyToOne(targetEntity="TsArticleCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_category_id", referencedColumnName="id")
     * })
     */
    private $articleCategory;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return TsArticleBasic
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return TsArticleBasic
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return TsArticleBasic
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime 
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Set updatedTimestamp
     *
     * @param \DateTime $updatedTimestamp
     * @return TsArticleBasic
     */
    public function setUpdatedTimestamp($updatedTimestamp)
    {
        $this->updatedTimestamp = $updatedTimestamp;

        return $this;
    }

    /**
     * Get updatedTimestamp
     *
     * @return \DateTime 
     */
    public function getUpdatedTimestamp()
    {
        return $this->updatedTimestamp;
    }

    /**
     * Set userBasic
     *
     * @param \TsUserBasic $userBasic
     * @return TsArticleBasic
     */
    public function setUserBasic(\TsUserBasic $userBasic = null)
    {
        $this->userBasic = $userBasic;

        return $this;
    }

    /**
     * Get userBasic
     *
     * @return \TsUserBasic 
     */
    public function getUserBasic()
    {
        return $this->userBasic;
    }

    /**
     * Set articleCategory
     *
     * @param \TsArticleCategory $articleCategory
     * @return TsArticleBasic
     */
    public function setArticleCategory(\TsArticleCategory $articleCategory = null)
    {
        $this->articleCategory = $articleCategory;

        return $this;
    }

    /**
     * Get articleCategory
     *
     * @return \TsArticleCategory 
     */
    public function getArticleCategory()
    {
        return $this->articleCategory;
    }
}
