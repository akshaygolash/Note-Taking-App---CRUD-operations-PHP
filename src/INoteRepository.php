<?php

namespace agolash\p2;


interface INoteRepository
{
    public function saveNote($note);
    public function getAllNotes();
    public function getNoteById($id);
    public function deleteNote($noteId);
}
