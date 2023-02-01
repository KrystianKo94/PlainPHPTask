<?php

namespace App\Interfaces;

interface CrudDatabase
{
    public function create($data);
    public function update($data, $id);
    public function delete($id);
    public function findAll();
}