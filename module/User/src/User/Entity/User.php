<?php

namespace User\Entity\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Filter,
    Zend\I18n;
use Zend\Crypt\Password;
use Zend\Math\Rand;

/**
 * User
 * @ORM\Entity
 * @ORM\Table(name="user", indexes={
 *                              @ORM\Index(name="fk_User_Company1", columns={"fkCompany"}), 
 *                              @ORM\Index(name="fk_User_Resaler1_idx", columns={"fkResaler"})
 * })
 * 
 * @ORM\Entity(repositoryClass="User\Repository\User")
 */
class User {

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=14, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastLogin", type="datetime", nullable=false)
     */
    private $lastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=128, nullable=false)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=14, nullable=false)
     */
    private $ip;

    public function __construct(array $options = array()) {

        $this->filter = new Filter\FilterChain();
        $this->filter
                ->attach(new Filter\StripTags())
                ->attach(new I18n\Filter\Alnum())
        ;

        $this->populate($options);
    }

    public function populate(array $options = array()) {

        (new ClassMethods())->hydrate($options, $this);
    }

    public function encryptPassword($password) {

        if (!$this->filter instanceof Filter\FilterChain) {
            $this->filter = new Filter\FilterChain();
            $this->filter
                    ->attach(new Filter\StripTags())
                    ->attach(new I18n\Filter\Alnum())
            ;
        }

        $password = $this->filter->filter($password);

        $this->salt = Rand::getString(128, null, true) . (new \DateTime('now'))->getTimestamp();

        $bcrypt = new Password\Bcrypt();
        $bcrypt->setSalt($this->salt);
        $bcrypt->setCost(14);

        for ($i = 0; $i < ((\strlen($password) ^ \strlen($password)) * 64000); $i++) {

            if ($i % 2 == 0) {
                $password = $password . $this->salt;
            } else {
                $password = $this->salt . $password;
            }
        }

        return $bcrypt->create($password);
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getLastLogin() {
        return $this->lastLogin;
    }

    function getSalt() {
        return $this->salt;
    }

    function getIp() {
        return $this->ip;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $this->encryptPassword($password);
    }

    function setLastLogin(\DateTime $lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    function setIp($ip) {
        $this->ip = ip2long($ip);
    }

}
