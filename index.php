<?php

class resize {
    var $size="1000";
    var $path='';
    public function __construct(String $scale=''){
        if(strlen($scale)>0){
            $this->size=$scale;
        }
        $this->path=getcwd().'/';
    }
    private  function scale(){
        exec('ffmpeg -i '.$this->path.'pankaj.jpg -vf scale='.$this->size.':-1 '.$this->newImage());
    }

    private function newImage(){
           return $this->path."input_new_".$this->size .".jpg";
    }

    public function showImage(){
        self::scale();
        return 'input_new_'.$this->size .".jpg";;
    }

}

$obj= new resize();
$image= $obj->showImage();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
</head>
<body>
   <img src="pankaj.jpg"  /> <br>
   <img src="<?= $image ?>" /> <br>
</body>
</html>