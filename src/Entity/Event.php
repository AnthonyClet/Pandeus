<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event", indexes={@ORM\Index(name="event_event_type_FK", columns={"id_event_type"})})
 * @ORM\Entity
 */
class Event
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
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=5000, nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=500, nullable=false)
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_day", type="date", nullable=false)
     */
    private $startDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_day", type="date", nullable=false)
     */
    private $endDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time", nullable=false)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time", nullable=false)
     */
    private $endTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date", nullable=false)
     */
    private $createdat;

    /**
     * @var \EventType
     *
     * @ORM\ManyToOne(targetEntity="EventType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event_type", referencedColumnName="id")
     * })
     */
    private $idEventType;


}
