<?php

namespace agolash\p2;

class Note {
	private $id;
	private $subjectLine = '';
	private $noteBody= '';
  private $authorName= '';
  private $dateCreated= '';
  private $dateUpdated= '';
  private $noteChrCount=0;

	public function __construct(){
        $this->id = uniqid();
        //implement date time created
    }

  //Getters
	/**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getSubjectLine()
    {
        return $this->subjectLine;
    }

    /**
     * @return string
     */
    public function getNoteBody()
    {
        return $this->noteBody;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
    /**
     * @return string
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }
    /**
     * @return string
     */
    public function getNoteChrCount()
    {
        return $this->noteChrCount;
    }


    //Setters

    /**
     * @param string $subjectLine
     */
    public function setSubjectLine($subjectLine)
    {
        $this->subjectLine = $subjectLine;
    }

    /**
     * @param string $noteBoby
     */
    public function setNoteBody($noteBody)
    {
        $this->noteBody = $noteBody;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @param string $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @param string $dateUpdated
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }
    /**
     * @param string $noteChrCount
     */
    public function setNoteChrCount($noteChrCount)
    {
        $this->noteChrCount = $noteChrCount;
    }
}
