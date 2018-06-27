<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property integer $id_cat
 * @property integer $id_size
 * @property string $name
 */
class Gallery extends ActiveRecord
{

    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'gallery';
    }

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

    public function hightSide($image)
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

    public function expansion($type)
    {
        $expansion = explode('/', $type);
        if($expansion[1] == jpeg)
        {
            $expansion = jpg;
        }
        return $expansion;
    }

    public function photoResize($tmp_name, $dst_folder)
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

    public function photoSmallSize($tmp_name, $dst_foldersmall)
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
        //$arNewFiles = $this->arrayBuild($arFile);
       /* foreach($arNewFiles as $key => $val)
        {
            $dst_folder = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/' . $val['name'];
            $dst_foldersmall = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/small/' . $val['name'];

            $idSize = $this->hightSide($val['tmp_name']);
            $expansion = $this->expansion($val['type']);*/

            /*$this->photoResize($val['tmp_name'], $dst_folder);
            $this->photoSmallSize($val['tmp_name'], $dst_foldersmall);*/

           /* $lasrRow = self::find()->orderBy(['id' => SORT_DESC])->one();
            $id = $lasrRow['id'] + 1;
            $newName = $cat . '_' . $id . '.' . $expansion;*/
            /*$newNameFolder = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/' . $cat . '_' . $id . '.' . $expansion;
            $newNameFolderSmall = $_SERVER['DOCUMENT_ROOT'] . '/web/img/gallery/' . $cat . '/small/' . $cat . '_' . $id . '.' . $expansion;

            rename($dst_folder,  $newNameFolder);
            rename($dst_foldersmall,  $newNameFolderSmall);*/

           /* $this->id = $id;
            $this->id_cat = $cat;
            $this->id_size = $idSize;
            $this->name = $newName;
            $this->insert();
        }*/

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

 /**
  * @inheritdoc
  */
    /*public function rules()
    {
        return [
            [['id_cat', 'id_size', 'name'], 'required'],
            [['id_cat', 'id_size'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }*/

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cat' => 'Индекс категории',
            'id_size' => 'Размер категории',
            'name' => 'Название фотографии',
        ];
    }*/

}
