<?php


class NoteFile extends JsonConnection implements CRUD
{

    public function add($note)
    {
        $notes = $this->readFile();
        $data = [
            'id' => count($notes) + 1,
            'title' => $note->getTitle(),
            'content' => $note->getContent(),
            'typeId' => $note->getTypeId()
        ];
        array_push($notes, $data);
        $this->saveDataToFile($notes);
    }

    public function search($search)
    {
        $data = $this->readFile();
        $arr = [];
        foreach ($data as $item) {
            $note = new Note(
                $item['title'],
                $item['content'],
                $item['typeId']
            );
            $note->setId($item['id']);
            array_push($arr, $note);
        }
        if (empty($search)) {
            return $arr;
        }
        $filtered_arr = [];
        foreach ($arr as $noteArr) {
            if (stripos($noteArr->getTitle(), $search) !== false || stripos($noteArr->getContent(), $search) !== false) {
                array_push($filtered_arr, $noteArr);
            }
        }
        return $filtered_arr;


    }

    public function delete($id)
    {
        $notes = $this->readFile();
        $index = (int)$id - 1;
        if (array_key_exists($index, $notes)) {
            array_splice($notes, $index, 1);
        }
        $arr = [];
        foreach ($notes as $newIndex => $note) {
            $note['id'] = $newIndex + 1;
            array_push($arr, $note);
        }
        $this->saveDataToFile($arr);
    }

    public function getById($id)
    {
        $data = $this->readFile();
        $index = (int)$id - 1;
        if (array_key_exists($index, $data)) {
            $note = new Note(
                $data[$index]['title'],
                $data[$index]['content'],
                $data[$index]['typeId']
            );
            $note->setId($data[$index]['id']);
            return $note;
        }
    }

    public function edit($id, $note)
    {
        $notes = $this->readFile();
        $data = [
            'id' => $note->getId(),
            'title' => $note->getTitle(),
            'content' => $note->getContent(),
            'typeId' => $note->getTypeId()
        ];
        $notes[$id - 1] = $data;
        $this->saveDataToFile($notes);
    }

}