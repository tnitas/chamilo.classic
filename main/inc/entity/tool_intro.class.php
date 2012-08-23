<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @license see /license.txt
 * @author autogenerated
 */
class ToolIntro extends \CourseEntity
{
    /**
     * @return \Entity\Repository\ToolIntroRepository
     */
     public static function repository(){
        return \Entity\Repository\ToolIntroRepository::instance();
    }

    /**
     * @return \Entity\ToolIntro
     */
     public static function create(){
        return new self();
    }

    /**
     * @var integer $c_id
     */
    protected $c_id;

    /**
     * @var string $id
     */
    protected $id;

    /**
     * @var integer $session_id
     */
    protected $session_id;

    /**
     * @var text $intro_text
     */
    protected $intro_text;


    /**
     * Set c_id
     *
     * @param integer $value
     * @return ToolIntro
     */
    public function set_c_id($value)
    {
        $this->c_id = $value;
        return $this;
    }

    /**
     * Get c_id
     *
     * @return integer 
     */
    public function get_c_id()
    {
        return $this->c_id;
    }

    /**
     * Set id
     *
     * @param string $value
     * @return ToolIntro
     */
    public function set_id($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set session_id
     *
     * @param integer $value
     * @return ToolIntro
     */
    public function set_session_id($value)
    {
        $this->session_id = $value;
        return $this;
    }

    /**
     * Get session_id
     *
     * @return integer 
     */
    public function get_session_id()
    {
        return $this->session_id;
    }

    /**
     * Set intro_text
     *
     * @param text $value
     * @return ToolIntro
     */
    public function set_intro_text($value)
    {
        $this->intro_text = $value;
        return $this;
    }

    /**
     * Get intro_text
     *
     * @return text 
     */
    public function get_intro_text()
    {
        return $this->intro_text;
    }
}