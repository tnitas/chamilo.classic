<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @license see /license.txt
 * @author autogenerated
 */
class SpecificFieldValues extends \Entity
{
    /**
     * @return \Entity\Repository\SpecificFieldValuesRepository
     */
     public static function repository(){
        return \Entity\Repository\SpecificFieldValuesRepository::instance();
    }

    /**
     * @return \Entity\SpecificFieldValues
     */
     public static function create(){
        return new self();
    }

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $course_code
     */
    protected $course_code;

    /**
     * @var string $tool_id
     */
    protected $tool_id;

    /**
     * @var integer $ref_id
     */
    protected $ref_id;

    /**
     * @var integer $field_id
     */
    protected $field_id;

    /**
     * @var string $value
     */
    protected $value;


    /**
     * Get id
     *
     * @return integer 
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set course_code
     *
     * @param string $value
     * @return SpecificFieldValues
     */
    public function set_course_code($value)
    {
        $this->course_code = $value;
        return $this;
    }

    /**
     * Get course_code
     *
     * @return string 
     */
    public function get_course_code()
    {
        return $this->course_code;
    }

    /**
     * Set tool_id
     *
     * @param string $value
     * @return SpecificFieldValues
     */
    public function set_tool_id($value)
    {
        $this->tool_id = $value;
        return $this;
    }

    /**
     * Get tool_id
     *
     * @return string 
     */
    public function get_tool_id()
    {
        return $this->tool_id;
    }

    /**
     * Set ref_id
     *
     * @param integer $value
     * @return SpecificFieldValues
     */
    public function set_ref_id($value)
    {
        $this->ref_id = $value;
        return $this;
    }

    /**
     * Get ref_id
     *
     * @return integer 
     */
    public function get_ref_id()
    {
        return $this->ref_id;
    }

    /**
     * Set field_id
     *
     * @param integer $value
     * @return SpecificFieldValues
     */
    public function set_field_id($value)
    {
        $this->field_id = $value;
        return $this;
    }

    /**
     * Get field_id
     *
     * @return integer 
     */
    public function get_field_id()
    {
        return $this->field_id;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return SpecificFieldValues
     */
    public function set_value($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function get_value()
    {
        return $this->value;
    }
}