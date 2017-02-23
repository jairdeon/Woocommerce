<?php
// A ideia deste código, é que ele consiga retornar o preço promocional caso exista, e o preço real caso o promocional não exista.
// É necessário usar o código deon_data para funcionar.

// Get deon_data
function deon_data($field, $id = null){
	if(empty($id)){
		$id = get_the_id();
	}
	return get_post_meta($id, $field)[0];
}

// Cria a função, dizendo que $post_id é null (não obrigatório)
function if_promotion($post_id = null){
  // Se o campo "preço promocional existir"
	if(deon_data('_sale_price', $post_id)){
		// Retorne o preço promocional
		return number_format(deon_data('_sale_price', $post_id), 2);
	} else {
		// Caso contrário, retorne o valor cheio (sem ser promocional)
		return number_format(deon_data('_regular_price', $post_id), 2);
	}
}
