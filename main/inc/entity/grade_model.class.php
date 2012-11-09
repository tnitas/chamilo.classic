<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @license see /license.txt
 * @author autogenerated
 */
class GradeModel extends \Entity
{
    /**
     * @return \Entity\Repository\GradeModelRepository
     */
     public static function repository(){
        return \Entity\Repository\GradeModelRepository::instance();
    }

    /**
     * @return \Entity\GradeModel
     */
     public static function create(){
        return new self();
    }

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var text $description
     */
    protected $description;

    /**
     * @var boolean $default_lowest_eval_exclude
     */
    protected $default_lowest_eval_exclude;

    /**
     * @var boolean $default_external_eval
     */
    protected $default_external_eval;

    /**
     * @var string $default_external_eval_prefix
     */
    protected $default_external_eval_prefix;


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
     * Set name
     *
     * @param string $value
     * @return GradeModel
     */
    public function set_name($value)
    {
        $this->name = $value;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $value
     * @return GradeModel
     */
    public function set_description($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function get_description()
    {
        return $this->description;
    }

    /**
     * Set default_lowest_eval_exclude
     *
     * @param boolean $value
     * @return GradeModel
     */
    public function set_default_lowest_eval_exclude($value)
    {
        $this->default_lowest_eval_exclude = $value;
        return $this;
    }

    /**
     * Get default_lowest_eval_exclude
     *
     * @return boolean 
     */
    public function get_default_lowest_eval_exclude()
    {
        return $this->default_lowest_eval_exclude;
    }

    /**
     * Set default_external_eval
     *
     * @param boolean $value
     * @return GradeModel
     */
    public function set_default_external_eval($value)
    {
        $this->default_external_eval = $value;
        return $this;
    }

    /**
     * Get default_external_eval
     *
     * @return boolean 
     */
    public function get_default_external_eval()
    {
        return $this->default_external_eval;
    }

    /**
     * Set default_external_eval_prefix
     *
     * @param string $value
     * @return GradeModel
     */
    public function set_default_external_eval_prefix($value)
    {
        $this->default_external_eval_prefix = $value;
        return $this;
    }

    /**
     * Get default_external_eval_prefix
     *
     * @return string 
     */
    public function get_default_external_eval_prefix()
    {
        return $this->default_external_eval_prefix;
    }
}