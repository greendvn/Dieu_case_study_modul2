<?php


class Note
{
    protected $id;
    protected $title;
    protected $content;
    protected $type_id;

    public function __construct($title,$content,$type_id)
    {
        $this->title = $title;
        $this->content = $content;
        $this->type_id = $type_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

}