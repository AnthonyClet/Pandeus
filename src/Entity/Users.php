<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="user_line_up_FK", columns={"id_line_up"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=50, nullable=false)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=500, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", length=100, nullable=false)
     */
    private $rank;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date", nullable=false)
     */
    private $createdat;

    /**
     * @var \LineUp
     *
     * @ORM\ManyToOne(targetEntity="LineUp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_line_up", referencedColumnName="id")
     * })
     */
    private $idLineUp;


}
