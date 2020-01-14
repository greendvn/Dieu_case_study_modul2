<?php


class NoteTypeFile extends JsonConnection implements CRUD
{
    public function add($noteType)
    {
        $noteTypes = $this->readFile();
        $data = [
            'id' => count($noteTypes) + 1,
            'name' => $noteType->getName(),
            'description' => $noteType->getDescription()
        ];
        array_push($noteTypes, $data);
        $this->saveDataToFile($noteTypes);
    }

    public function search($search)
    {
        $data = $this->readFile();
        $arr = [];
        foreach ($data as $item) {
            $noteType = new NoteType(
                $item['name']
            );
            $noteType->setId($item['id']);
            $noteType->setDescription($item['description']);
            array_push($arr, $noteType);
        }
        return $arr;
    }

    public function delete($id)
    {
        $noteTypes = $this->readFile();
        $index = (int)$id - 1;

        if (array_key_exists($index, $noteTypes)) {
            array_splice($noteTypes, $index, 1);
        }
        $arr=[];
        foreach ($noteTypes as $newIndex => $noteType) {
            $noteType["id"] = $newIndex +1;
            array_push($arr,$noteType);
        }
        $this->saveDataToFile($arr);
    }

    public function getById($id)
    {
        $data = $this->readFile();
        $index = (int) $id -1;
        if (array_key_exists($index, $data)) {
            $noteType = new NoteType(
                $data[$index]['name']
            );
            $noteType->setId($data[$index]['id']);
            $noteType->setDescription($data[$index]['description']);
            return $noteType;
        }
    }

    public function edit($id, $noteType)
    {
        $noteTypes = $this->readFile();
        $data = [
            'id' => $noteType->getId(),
            'name' => $noteType->getName(),
            'description' => $noteType->getDescription()
        ];
        $noteTypes[$id- 1] = $data;
        $this->saveDataToFile($noteTypes);
    }

}