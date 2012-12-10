<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @license see /license.txt
 * @author autogenerated
 */
class SessionField extends \Entity
{
    /**
     * @return \Entity\Repository\SessionFieldRepository
     */
     public static function repository(){
        return \Entity\Repository\SessionFieldRepository::instance();
    }

    /**
     * @return \Entity\SessionField
     */
     public static function create(){
        return new self();
    }

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var integer $field_type
     */
    protected $field_type;

    /**
     * @var string $field_variable
     */
    protected $field_variable;

    /**
     * @var string $field_display_text
     */
    protected $field_display_text;

    /**
     * @var text $field_default_value
     */
    protected $field_default_value;

    /**
     * @var integer $field_order
     */
    protected $field_order;

    /**
     * @var boolean $field_visible
     */
    protected $field_visible;

    /**
     * @var boolean $field_changeable
     */
    protected $field_changeable;

    /**
     * @var boolean $field_filter
     */
    protected $field_filter;

    /**
     * @var datetime $tms
     */
    protected $tms;


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
     * Set field_type
     *
     * @param integer $value
     * @return SessionField
     */
    public function set_field_type($value)
    {
        $this->field_type = $value;
        return $this;
    }

    /**
     * Get field_type
     *
     * @return integer 
     */
    public function get_field_type()
    {
        return $this->field_type;
    }

    /**
     * Set field_variable
     *
     * @param string $value
     * @return SessionField
     */
    public function set_field_variable($value)
    {
        $this->field_variable = $value;
        return $this;
    }

    /**
     * Get field_variable
     *
     * @return string 
     */
    public function get_field_variable()
    {
        return $this->field_variable;
    }

    /**
     * Set field_display_text
     *
     * @param string $value
     * @return SessionField
     */
    public function set_field_display_text($value)
    {
        $this->field_display_text = $value;
        return $this;
    }

    /**
     * Get field_display_text
     *
     * @return string 
     */
    public function get_field_display_text()
    {
        return $this->field_display_text;
    }

    /**
     * Set field_default_value
     *
     * @param text $value
     * @return SessionField
     */
    public function set_field_default_value($value)
    {
        $this->field_default_value = $value;
        return $this;
    }

    /**
     * Get field_default_value
     *
     * @return text 
     */
    public function get_field_default_value()
    {
        return $this->field_default_value;
    }

    /**
     * Set field_order
     *
     * @param integer $value
     * @return SessionField
     */
    public function set_field_order($value)
    {
        $this->field_order = $value;
        return $this;
    }

    /**
     * Get field_order
     *
     * @return integer 
     */
    public function get_field_order()
    {
        return $this->field_order;
    }

    /**
     * Set field_visible
     *
     * @param boolean $value
     * @return SessionField
     */
    public function set_field_visible($value)
    {
        $this->field_visible = $value;
        return $this;
    }

    /**
     * Get field_visible
     *
     * @return boolean 
     */
    public function get_field_visible()
    {
        return $this->field_visible;
    }

    /**
     * Set field_changeable
     *
     * @param boolean $value
     * @return SessionField
     */
    public function set_field_changeable($value)
    {
        $this->field_changeable = $value;
        return $this;
    }

    /**
     * Get field_changeable
     *
     * @return boolean 
     */
    public function get_field_changeable()
    {
        return $this->field_changeable;
    }

    /**
     * Set field_filter
     *
     * @param boolean $value
     * @return SessionField
     */
    public function set_field_filter($value)
    {
        $this->field_filter = $value;
        return $this;
    }

    /**
     * Get field_filter
     *
     * @return boolean 
     */
    public function get_field_filter()
    {
        return $this->field_filter;
    }

    /**
     * Set tms
     *
     * @param datetime $value
     * @return SessionField
     */
    public function set_tms($value)
    {
        $this->tms = $value;
        return $this;
    }

    /**
     * Get tms
     *
     * @return datetime 
     */
    public function get_tms()
    {
        return $this->tms;
    }
}