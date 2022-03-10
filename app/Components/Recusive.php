<?php
namespace App\Components;

use App\Models\Category;

class Recusive
{
    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function useRecusive($parentId, $id = 0, $subMark = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='". $value['id'] ."'>" . $subMark . $value['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='". $value['id'] ."'>" . $subMark . $value['name'] . "</option>";
                }
                $this->useRecusive($parentId, $value['id'], $subMark . '--');
            }
        }

        return $this->htmlSelect;
    }
}
?>
