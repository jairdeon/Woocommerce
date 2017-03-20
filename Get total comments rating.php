<?php
// Obtém a quantidade total de avaliações.
// É necessário que sua get_comment_meta value seja = a 'rating'

function get_comments_rating($post_id = null){
	$ratings_value = []; // Cria um array
	$post_id = (empty($post_id)) ? get_the_ID() : $post_id; // Se o atributo $post_id estiver vazio, é  equivalente a get_post_ID(), caso contrário, recebe o atribut
 $comments = get_comments(['post_id' => $post_id]); // Obtem todos os comentários da publicação
 foreach($comments as $comment) { // Abre um foreach
		array_push($ratings_value, get_comment_meta($comment->comment_ID, 'rating', true)); // Insere em $ratings_value, o valor contido em get_comment_meta
	} return (array_sum($ratings_value) / wp_count_comments(get_the_id())->approved); // Soma todos os valores e divide pela quantidade de comentrios
} // Fim do loop
