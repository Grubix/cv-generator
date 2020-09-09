<?php

namespace App\Model\Entity;

/**
 * @Entity
 * @Table(name="employment_history")
 */
class employmentHistory {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="employmentHistory")
     * @JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    protected $period;

    /**
     * @Column(type="string", nullable=false)
     */
    protected $title;

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
     * Set period.
     *
     * @param string $period
     *
     * @return employmentHistory
     */
    public function setPeriod($period) {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period.
     *
     * @return string
     */
    public function getPeriod() {
        return $this->period;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return employmentHistory
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return employmentHistory
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
     * @return employmentHistory
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