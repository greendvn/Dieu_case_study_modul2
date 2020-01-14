<?php


interface CRUD
{
    public function add($object);
    public function delete($id);
    public function search($search);
    public function getById($id);
    public function edit($id,$object);

}