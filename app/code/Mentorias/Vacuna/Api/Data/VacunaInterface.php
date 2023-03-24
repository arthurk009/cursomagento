<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api\Data;

interface VacunaInterface
{

    const NUM_INT = 'num_int';
    const FORMA_PAGO = 'forma_pago';
    const MUNICIPALITY = 'municipality';
    const CREATED_AT = 'created_at';
    const EXT_NUM = 'ext_num';
    const SECOND_LASTNAME = 'second_lastname';
    const USER_ID = 'user_id';
    const LASTNAME = 'lastname';
    const BIRTHDATE = 'birthdate';
    const GENDER = 'gender';
    const NEIGHBORHOOD = 'neighborhood';
    const VACUNA_ID = 'vacuna_id';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const STREET = 'street';
    const APPOINTMENT_VACCINE_ID = 'appointment_vaccine_id';
    const ZIP_CODE = 'zip_code';
    const REGION = 'region';
    const CONSULTORIO_ID = 'consultorio_id';
    const NAME = 'name';
    const UPDATED_AT = 'updated_at';
    const FOLIO = 'folio';
    const CURP = 'curp';
    const DATE_TIME = 'date_time';

    /**
     * Get vacuna_id
     * @return string|null
     */
    public function getVacunaId();

    /**
     * Set vacuna_id
     * @param string $vacunaId
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setVacunaId($vacunaId);

    /**
     * Get appointment_vaccine_id
     * @return string|null
     */
    public function getAppointmentVaccineId();

    /**
     * Set appointment_vaccine_id
     * @param string $appointmentVaccineId
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setAppointmentVaccineId($appointmentVaccineId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setName($name);

    /**
     * Get lastname
     * @return string|null
     */
    public function getLastname();

    /**
     * Set lastname
     * @param string $lastname
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setLastname($lastname);

    /**
     * Get second_lastname
     * @return string|null
     */
    public function getSecondLastname();

    /**
     * Set second_lastname
     * @param string $secondLastname
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setSecondLastname($secondLastname);

    /**
     * Get gender
     * @return string|null
     */
    public function getGender();

    /**
     * Set gender
     * @param string $gender
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setGender($gender);

    /**
     * Get curp
     * @return string|null
     */
    public function getCurp();

    /**
     * Set curp
     * @param string $curp
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setCurp($curp);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setEmail($email);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setPhone($phone);

    /**
     * Get zip_code
     * @return string|null
     */
    public function getZipCode();

    /**
     * Set zip_code
     * @param string $zipCode
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setZipCode($zipCode);

    /**
     * Get street
     * @return string|null
     */
    public function getStreet();

    /**
     * Set street
     * @param string $street
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setStreet($street);

    /**
     * Get num_int
     * @return string|null
     */
    public function getNumInt();

    /**
     * Set num_int
     * @param string $numInt
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setNumInt($numInt);

    /**
     * Get ext_num
     * @return string|null
     */
    public function getExtNum();

    /**
     * Set ext_num
     * @param string $extNum
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setExtNum($extNum);

    /**
     * Get region
     * @return string|null
     */
    public function getRegion();

    /**
     * Set region
     * @param string $region
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setRegion($region);

    /**
     * Get municipality
     * @return string|null
     */
    public function getMunicipality();

    /**
     * Set municipality
     * @param string $municipality
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setMunicipality($municipality);

    /**
     * Get neighborhood
     * @return string|null
     */
    public function getNeighborhood();

    /**
     * Set neighborhood
     * @param string $neighborhood
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setNeighborhood($neighborhood);

    /**
     * Get folio
     * @return string|null
     */
    public function getFolio();

    /**
     * Set folio
     * @param string $folio
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setFolio($folio);

    /**
     * Get date_time
     * @return string|null
     */
    public function getDateTime();

    /**
     * Set date_time
     * @param string $dateTime
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setDateTime($dateTime);

    /**
     * Get consultorio_id
     * @return string|null
     */
    public function getConsultorioId();

    /**
     * Set consultorio_id
     * @param string $consultorioId
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setConsultorioId($consultorioId);

    /**
     * Get forma_pago
     * @return string|null
     */
    public function getFormaPago();

    /**
     * Set forma_pago
     * @param string $formaPago
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setFormaPago($formaPago);

    /**
     * Get user_id
     * @return string|null
     */
    public function getUserId();

    /**
     * Set user_id
     * @param string $userId
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setUserId($userId);

    /**
     * Get birthdate
     * @return string|null
     */
    public function getBirthdate();

    /**
     * Set birthdate
     * @param string $birthdate
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setBirthdate($birthdate);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Mentorias\Vacuna\Vacuna\Api\Data\VacunaInterface
     */
    public function setUpdatedAt($updatedAt);
}