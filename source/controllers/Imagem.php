<?php

namespace Source\controllers;
use Source\models\Imagens;
use CoffeeCode\Uploader\Image;

class Imagem {

    public function read(){
        
    }

    public function create($data){
        $id = $data["id"];
        $imagem = new Image("./source/storage","images");
        function salvar($dir,$id){
            $dbimg = (new Imagens());
            $dbimg->url_imagem = $dir;
            $dbimg->id_anuncio = $id;
            $dbimg->save();
        }

        if(!empty($_FILES['file'])):
            $files = $_FILES['file'];
            for($i = 0;$i < count($files["type"]); $i++){
               foreach (array_keys($files) as $keys){
                  $imagensFiles[$i][$keys] = $files[$keys][$i];
               }
            }

            foreach($imagensFiles as $file){
                if(empty($file["type"])):
                    $data = ["mensagem" => "Selecione uma imagem valida!","status" => false];
                    echo json_encode($data);
                    exit();
                elseif(!in_array($file["type"],$imagem::isAllowed())):
                    $data = ["mensagem" => "O arquivo não é valido!","status" => false];
                    echo json_encode($data);
                    exit();
                else:
                    $upload = $imagem->upload($file,pathinfo($file['name'],PATHINFO_FILENAME),1280);
                    salvar($upload,$id);
                endif;
            }
            $data = ["mensagem" => "Upload com sucesso!","status" => true];
            echo json_encode($data);
        endif;
    }

    // Excluir Anuncio e Imagens 
    public function destroy_imagem($id,$url){
        $img = (new Imagens())->findById($id)->destroy();
        unlink($url);
    }
    
    public function delete($data){
        $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
        $imagem = (new Imagens())->findById($id);
        $url = $imagem->data->url_imagem;
        $this->destroy_imagem($id,$url);

        header("Location:".url("admin/anuncios"));
        exit();
    }

}