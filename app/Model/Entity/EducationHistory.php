<?php

namespace App\Model\Entity;

/**
 * @Entity
 * @Table(name="education_history")
 */
class EducationHistory {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="educationHistory")
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
     * @return EducationHistory
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
     * @return EducationHistory
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
     * @return EducationHistory
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
     * @return EducationHistory
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