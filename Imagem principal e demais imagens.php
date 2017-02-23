<?php
// Get images and Gallery
// Função criada (dizendo que o id é nulo (não obrigatório)
function get_post_image($id = null){

  // Se o id estiver vazio, automaticamente $id ser = ao id do post atual
  if(empty($id)){
		$id = get_the_id();
	}
  
  // Se _product_image_gallery não estiver vazio, execute a função abaixo
  if(!empty(get_post_meta($id, '_product_image_gallery')[0])){
    // Cria uma array
	 	$gallery = []; 
      // Separa as ids das imagens que estão neste post_meta
      $imagens = explode(',', get_post_meta($id, '_product_image_gallery')[0]);
	  	
      // Faz um FOR, repetindo até que a quantidade de imagens sejam escaneadas
      for($i = 0; $i < count($imagens); $i++){
        // Insere dentro de $galley, todas as urls encontradas pelo for
	    	array_push($gallery, wp_get_attachment_url($imagens[$i]));
	  	}
  // Caso contrário, $gallery ser igual a null
  } else {
		$gallery = null;
	}
  
  // Data é igual aos atributos, você pode usar qualquer um dos abaixo para obter os campos
 $data = ['url' => wp_get_attachment_url(get_post_meta($id, '_thumbnail_id')[0]), 'img_id' => get_post_meta($id, '_thumbnail_id')[0], 'gallery' => $gallery];
	
	return (object) $data;
}

// Exemplos: 
// Obter Imagem principal:
// get_post_image()->url;

// Obter galeria de imagens
for($i = 0; $i < count(get_post_image()->gallery); $i++){ ?>
  echo get_post_image()->gallery[$i];
}

?>
