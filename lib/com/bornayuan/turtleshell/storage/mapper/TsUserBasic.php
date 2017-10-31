<?php




/**
 * TsUserBasic
 *
 * @Doctrine\ORM\Mapping\Table(name="ts_user_basic")
 * @Doctrine\ORM\Mapping\Entity
 */
class TsUserBasic
{
    /**
     * @var integer
     *
     * @Doctrine\ORM\Mapping\Column(name="id", type="integer", nullable=false)
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Column(name="first_name", type="string", length=60, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Column(name="middle_name", type="string", length=60, nullable=true)
     */
    private $middleName;

    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Column(name="last_name", type="string", length=60, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Column(name="nick_name", type="string", length=60, nullable=true)
     */
    private $nickName;

    /**
     * @var integer
     *
     * @Doctrine\ORM\Mapping\Column(name="gender", type="integer", nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Column(name="unique_identity", type="string", length=60, nullable=false)
     */
    private $uniqueIdentity;

    /**
     * @var \DateTime
     *
     * @Doctrine\ORM\Mapping\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;

    /**
     * @var \DateTime
     *
     * @Doctrine\ORM\Mapping\Column(name="updated_timestamp", type="datetime", nullable=true)
     */
    private $updatedTimestamp;


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
     * Set firstName
     *
     * @param string $firstName
     * @return TsUserBasic
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return TsUserBasic
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return TsUserBasic
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set nickName
     *
     * @param string $nickName
     * @return TsUserBasic
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * Get nickName
     *
     * @return string 
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     * @return TsUserBasic
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return TsUserBasic
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set uniqueIdentity
     *
     * @param string $uniqueIdentity
     * @return TsUserBasic
     */
    public function setUniqueIdentity($uniqueIdentity)
    {
        $this->uniqueIdentity = $uniqueIdentity;

        return $this;
    }

    /**
     * Get uniqueIdentity
     *
     * @return string 
     */
    public function getUniqueIdentity()
    {
        return $this->uniqueIdentity;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return TsUserBasic
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
     * @return TsUserBasic
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
}
