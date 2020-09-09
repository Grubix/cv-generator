<?php

namespace App\Model\Entity;

/**
 * @Entity
 * @Table(name="users")
 */
class User {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", nullable=false)
     */
    protected $email;

    /**
     * @Column(type="string", nullable=false)
     */
    protected $password;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    protected $name;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    protected $lastname;

    /**
     * @Column(type="date", nullable=false)
     */
    protected $birthDate;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    protected $adressStreet;

    /**
     * @Column(type="string", length=15, nullable=false)
     */
    protected $adressHouseNumber;

    /**
     * @Column(type="string", length=15, nullable=false)
     */
    protected $adressZipCode;

    /**
     * @Column(type="string", length=45, nullable=false)
     */
    protected $adressTown;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $imageUrl;

    /**
     * @OneToMany(targetEntity="Skills", mappedBy="user", orphanRemoval=true)
     */
    protected $skills;

    /**
     * @OneToMany(targetEntity="Interests", mappedBy="user", orphanRemoval=true)
     */
    protected $interests;

    /**
     * @OneToMany(targetEntity="EmploymentHistory", mappedBy="user", orphanRemoval=true)
     */
    protected $employmentHistory;

    /**
     * @OneToMany(targetEntity="EducationHistory", mappedBy="user", orphanRemoval=true)
     */
    protected $educationHistory;

    /**
     * Constructor
     */
    public function __construct() {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
        $this->interests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employmentHistory = new \Doctrine\Common\Collections\ArrayCollection();
        $this->educationHistory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set birthDate.
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate.
     *
     * @return \DateTime
     */
    public function getBirthDate() {
        return $this->birthDate;
    }

    /**
     * Set adressStreet.
     *
     * @param string $adressStreet
     *
     * @return User
     */
    public function setAdressStreet($adressStreet) {
        $this->adressStreet = $adressStreet;

        return $this;
    }

    /**
     * Get adressStreet.
     *
     * @return string
     */
    public function getAdressStreet() {
        return $this->adressStreet;
    }

    /**
     * Set adressHouseNumber.
     *
     * @param string $adressHouseNumber
     *
     * @return User
     */
    public function setAdressHouseNumber($adressHouseNumber) {
        $this->adressHouseNumber = $adressHouseNumber;

        return $this;
    }

    /**
     * Get adressHouseNumber.
     *
     * @return string
     */
    public function getAdressHouseNumber() {
        return $this->adressHouseNumber;
    }

    /**
     * Set adressZipCode.
     *
     * @param string $adressZipCode
     *
     * @return User
     */
    public function setAdressZipCode($adressZipCode) {
        $this->adressZipCode = $adressZipCode;

        return $this;
    }

    /**
     * Get adressZipCode.
     *
     * @return string
     */
    public function getAdressZipCode() {
        return $this->adressZipCode;
    }

    /**
     * Set adressTown.
     *
     * @param string $adressTown
     *
     * @return User
     */
    public function setAdressTown($adressTown) {
        $this->adressTown = $adressTown;

        return $this;
    }

    /**
     * Get adressTown.
     *
     * @return string
     */
    public function getAdressTown() {
        return $this->adressTown;
    }

    /**
     * Add skill.
     *
     * @param \App\Model\Entity\Skills $skill
     *
     * @return User
     */
    public function addSkill(\App\Model\Entity\Skills $skill) {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill.
     *
     * @param \App\Model\Entity\Skills $skill
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSkill(\App\Model\Entity\Skills $skill) {
        return $this->skills->removeElement($skill);
    }

    /**
     * Get skills.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills() {
        return $this->skills;
    }

    /**
     * Add interest.
     *
     * @param \App\Model\Entity\Interests $interest
     *
     * @return User
     */
    public function addInterest(\App\Model\Entity\Interests $interest) {
        $this->interests[] = $interest;

        return $this;
    }

    /**
     * Remove interest.
     *
     * @param \App\Model\Entity\Interests $interest
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeInterest(\App\Model\Entity\Interests $interest) {
        return $this->interests->removeElement($interest);
    }

    /**
     * Get interests.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterests() {
        return $this->interests;
    }

    /**
     * Add employmentHistory.
     *
     * @param \App\Model\Entity\EmploymentHistory $employmentHistory
     *
     * @return User
     */
    public function addEmploymentHistory(\App\Model\Entity\EmploymentHistory $employmentHistory) {
        $this->employmentHistory[] = $employmentHistory;

        return $this;
    }

    /**
     * Remove employmentHistory.
     *
     * @param \App\Model\Entity\EmploymentHistory $employmentHistory
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEmploymentHistory(\App\Model\Entity\EmploymentHistory $employmentHistory) {
        return $this->employmentHistory->removeElement($employmentHistory);
    }

    /**
     * Get employmentHistory.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmploymentHistory() {
        return $this->employmentHistory;
    }

    /**
     * Add educationHistory.
     *
     * @param \App\Model\Entity\EducationHistory $educationHistory
     *
     * @return User
     */
    public function addEducationHistory(\App\Model\Entity\EducationHistory $educationHistory) {
        $this->educationHistory[] = $educationHistory;

        return $this;
    }

    /**
     * Remove educationHistory.
     *
     * @param \App\Model\Entity\EducationHistory $educationHistory
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEducationHistory(\App\Model\Entity\EducationHistory $educationHistory) {
        return $this->educationHistory->removeElement($educationHistory);
    }

    /**
     * Get educationHistory.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEducationHistory() {
        return $this->educationHistory;
    }

    /**
     * Set imageUrl.
     *
     * @param string $imageUrl
     *
     * @return User
     */
    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl.
     *
     * @return string
     */
    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getFullName() {
        return $this->name . ' ' . $this->lastname;
    }

}
