<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TsUserAuth
 *
 * @ORM\Table(name="ts_user_auth", indexes={@ORM\Index(name="USER_BASIC_ID", columns={"user_basic_id"})})
 * @ORM\Entity
 */
class TsUserAuth
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
     * @ORM\Column(name="username", type="string", length=60, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=false)
     */
    private $password;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return TsUserAuth
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return TsUserAuth
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return TsUserAuth
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
     * @return TsUserAuth
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
     * @return TsUserAuth
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
}
