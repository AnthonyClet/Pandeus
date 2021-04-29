<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LineUp
 *
 * @ORM\Table(name="line_up")
 * @ORM\Entity
 */
class LineUp
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", length=100, nullable=false)
     */
    private $rank;


}
