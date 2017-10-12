<?php

declare(strict_types=1);

namespace Minerva\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application entity
 *
 * @ORM\Entity
 * @ORM\Table(name="guild_application")
 */
class Application
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="realname", type="string")
     */
    private $name = '';

    /**
     * @ORM\Column(name="age", type="integer")
     */
    private $age = 1;

    /**
     * @ORM\Column(name="location", type="string")
     */
    private $location = '';

    /**
     * @ORM\Column(name="charactername", type="string")
     */
    private $characterName = '';

    /**
     * @ORM\Column(name="characterclass", type="string")
     */
    private $class = '';

    /**
     * @ORM\Column(name="armorylink", type="string")
     */
    private $armory = '';

    /**
     * @ORM\Column(name="battletag", type="string")
     */
    private $battleTag = '';

    /**
     * @ORM\Column(name="mainspec", type="string")
     */
    private $mainSpec = '';

    /**
     * @ORM\Column(name="offspec", type="string")
     */
    private $offSpec = '';

    /**
     * @ORM\Column(name="experience", type="text")
     */
    private $experience = '';

    /**
     * @ORM\Column(name="gametime", type="text")
     */
    private $gameTime = '';

    /**
     * @ORM\Column(name="communication", type="text")
     */
    private $communication = '';

    /**
     * @ORM\Column(name="criticism", type="text")
     */
    private $criticism = '';

    /**
     * @ORM\Column(name="effort", type="text")
     */
    private $effort = '';

    /**
     * @ORM\Column(name="availability", type="text")
     */
    private $availability = '';

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Getter for id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter for name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Setter for name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Getter for age
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Setter for age
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    /**
     * Getter for location
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * Setter for location
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Getter for characterName
     */
    public function getCharacterName(): string
    {
        return $this->characterName;
    }

    /**
     * Setter for characterName
     */
    public function setCharacterName(string $characterName): self
    {
        $this->characterName = $characterName;
        return $this;
    }

    /**
     * Getter for class
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * Setter for class
     */
    public function setClass($class): self
    {
        $this->class = $class;
        return $this;
    }

    /**
     * Getter for armory
     */
    public function getArmory(): string
    {
        return $this->armory;
    }

    /**
     * Setter for armory
     */
    public function setArmory(string $armory): self
    {
        $this->armory = $armory;
        return $this;
    }

    /**
     * Getter for battletag
     */
    public function getBattleTag(): string
    {
        return $this->battleTag;
    }

    /**
     * Setter for battletag
     */
    public function setBattleTag(string $battleTag): self
    {
        $this->battleTag = $battleTag;
        return $this;
    }

    /**
     * Getter for mainSpec
     */
    public function getMainSpec(): string
    {
        return $this->mainSpec;
    }

    /**
     * Setter for mainSpec
     */
    public function setMainSpec(string $mainSpec): self
    {
        $this->mainSpec = $mainSpec;
        return $this;
    }

    /**
     * Getter for offSpec
     */
    public function getOffSpec(): string
    {
        return $this->offSpec;
    }

    /**
     * Setter for offSpec
     */
    public function setOffSpec(string $offSpec): self
    {
        $this->offSpec = $offSpec;
        return $this;
    }

    /**
     * Getter for experience
     */
    public function getExperience(): string
    {
        return $this->experience;
    }

    /**
     * Setter for experience
     */
    public function setExperience(string $experience): self
    {
        $this->experience = $experience;
        return $this;
    }

    /**
     * Getter for gametime
     */
    public function getGameTime(): string
    {
        return $this->gameTime;
    }

    /**
     * Setter for gametime
     */
    public function setGameTime(string $gameTime): self
    {
        $this->gameTime = $gameTime;
        return $this;
    }

    /**
     * Getter for communication
     */
    public function getCommunication(): string
    {
        return $this->communication;
    }

    /**
     * Setter for communication
     */
    public function setCommunication(string $communication): self
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * Getter for criticism
     */
    public function getCriticism(): string
    {
        return $this->criticism;
    }

    /**
     * Setter for criticism
     */
    public function setCriticism(string $criticism): self
    {
        $this->criticism = $criticism;
        return $this;
    }

    /**
     * Getter for effort
     */
    public function getEffort(): string
    {
        return $this->effort;
    }

    /**
     * Setter for effort
     */
    public function setEffort(string $effort): self
    {
        $this->effort = $effort;
        return $this;
    }

    /**
     * Getter for availability
     */
    public function getAvailability(): string
    {
        return $this->availability;
    }

    /**
     * Setter for availability
     */
    public function setAvailability(string $availability): self
    {
        $this->availability = $availability;
        return $this;
    }
}
