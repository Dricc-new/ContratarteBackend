<?php

use App\Models\Attachment;
use Ramsey\Uuid\Uuid;

function SearchOnModel($search, $model, $col = ['name'])
{
    if ($search) {
        $temp = $model;
        foreach ($col as $value) {
            $temp = $temp->orWhere($value, 'like', "%$search%");
        }
        return $temp;
    }
    return $model;
}

function SearchWithOnModel($search, $model, $col)
{
    if ($search) {
        $temp = $model;
        foreach ($col as $value) {
            $temp = $temp->where($value, 'like', "%$search%");
        }
        return $temp;
    }
    return $model;
}


function newFilename()
{
    $filename = '';
    do {
        $filename = Uuid::uuid4()->getHex();
    } while (Attachment::where('filename', $filename)->first() != null);
    return $filename;
}
