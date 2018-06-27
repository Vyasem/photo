<?php
/*Модель для редактирования главной страницы*/

namespace app\admin\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Gallery extends ActiveRecord
{
    public static $name;


    public static function tableName()
    {
        return self::$name;
    }

    /*public function attributeLabels()
    {
        return [
            'id_cat' => 'Id Cat',
            'name' => 'Name',
            'foto' => 'Foto',
        ];
    }*/


    public static function arrayBuild($arFiles)
    {
        foreach($arFiles as $key => $value)
        {
            foreach ($value as $eKey => $eVal)
            {
                $arNewFiles[$eKey][$key] = $eVal;
            }
        }

        return  $arNewFiles;
    }

    public static function deleteFiles($arFiles)
    {
        foreach($arFiles as $fVal)
        {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $fVal['id_cat'] . '/small/' . $fVal['name']);
            unlink($_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $fVal['id_cat'] . '/' . $fVal['name']);

        }
    }

    private function hightSide($image)
    {

        list($width, $height) = getimagesize($image);
        if($width > $height)
        {
            $id_size = 2;
        }
        else
        {
            $id_size = 1;
        }
        return $id_size;
    }

    private function expansion($type)
    {
        $expansion = explode('/', $type);
        if($expansion[1] == jpeg)
        {
            $expansion = jpg;
        }
        return $expansion;
    }

    private function photoResize($tmp_name, $dst_folder)
    {
        list($width, $height) = getimagesize($tmp_name);
        $newheight = 800;
        $medium_width = $height / $newheight;
        $newwidth = $width / $medium_width;

        $dst_image = imagecreatetruecolor($newwidth, $newheight);
        $src_image = imagecreatefromjpeg($tmp_name);

        imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($dst_image, $dst_folder);

        imagedestroy($dst_image);
        imagedestroy($src_image);

    }

    private function photoSmallSize($tmp_name, $dst_foldersmall)
    {
        list($width, $height) = getimagesize($tmp_name);
        if($height > $width)
        {
            $newheight = 434;
            $medium_width = $height / $newheight;
            $newwidth = $width / $medium_width;
        }
        else
        {
            $newwidth = 300;
            $medium_height = $width / $newwidth;
            $newheight = $height / $medium_height;

        }

        $dst_image = imagecreatetruecolor($newwidth, $newheight);
        $src_image = imagecreatefromjpeg($tmp_name);
        imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($dst_image, $dst_foldersmall);

        imagedestroy($dst_image);
        imagedestroy($src_image);
    }

    public function queryHandling($arFile, $cat)
    {
        $dst_folder = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/' . $arFile['name'];
        $dst_foldersmall = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/small/' . $arFile['name'];

        $idSize = $this->hightSide($arFile['tmp_name']);
        $expansion = $this->expansion($arFile['type']);

        $this->photoResize($arFile['tmp_name'], $dst_folder);
        $this->photoSmallSize($arFile['tmp_name'], $dst_foldersmall);

        $lasrRow = self::find()->orderBy(['id' => SORT_DESC])->one();
        $id = $lasrRow['id'] + 1;
        $newName = $cat . '_' . $id . '.' . $expansion;

        $newNameFolder = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/' . $cat . '_' . $id . '.' . $expansion;
        $newNameFolderSmall = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/small/' . $cat . '_' . $id . '.' . $expansion;

        rename($dst_folder,  $newNameFolder);
        rename($dst_foldersmall,  $newNameFolderSmall);

        $this->id = $id;
        $this->id_cat = $cat;
        $this->id_size = $idSize;
        $this->name = $newName;
        $this->insert();
    }
}