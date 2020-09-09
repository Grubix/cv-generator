<?php

namespace App\Model\Entity;

/**
 * @Entity
 * @Table(name="interests")
 */
class Interests {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="interests")
     * @JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @Column(type="string")
     */
    protected $description;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Interests
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set user.
     *
     * @param \App\Model\Entity\User $user
     *
     * @return Interests
     */
    public function setUser(\App\Model\Entity\User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \App\Model\Entity\User
     */
    public function getUser() {
        return $this->user;
    }
}
