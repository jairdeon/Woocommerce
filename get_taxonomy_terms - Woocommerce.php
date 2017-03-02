<?php
// Função para obter custom terms
#product_cat = sua_taxonomy
#hide_empty = false para exibir os termos que estão vazios e true para exibir somente os termos que existem publicações
$get_taxonomy_terms = get_terms('product_cat', array('hide_empty' => false));

// Foreach para listar os termos encontrados
foreach($get_taxonomy_terms as $terms){
    // Params - Utilize os códigos abaixo para exibir o id, nome slug e etc
    #ID - $terms->term_id;
    #name - $terms->name;
    #slug - $terms->slug;
    #link - get_term_link($terms->slug, 'product_cat');
    
    // Var_dump para debugar a função e ver todos os parametros disponívels
    echo '<pre>';
    var_dump($terms);
    echo '</pre>';
}

#documentação:
#https://developer.wordpress.org/reference/functions/get_terms/
#https://developer.wordpress.org/reference/functions/get_term_link/
?>

Snippet para sublime:
<snippet>
	<content><![CDATA[
\$${1:function_name} = get_terms('${2:taxonomy_name}', array('hide_empty' => false));
foreach(\$${1:function_name} as \$${3:foreach_name}){
    // Params
    #ID - \$${3:foreach_name}->term_id;
    #name - \$${3:foreach_name}->name;
    #slug - \$${3:foreach_name}->slug;
    #link - get_term_link(\$${3:foreach_name}->slug, '${2:taxonomy_name}');
    
    echo '<pre>';
    var_dump(\$${3:foreach_name});
    echo '</pre>';
}
]]></content>
	<!-- Optional: Set a tabTrigger to define how to trigger the snippet -->
	<tabTrigger>get_taxonomy_terms</tabTrigger>
	<!-- Optional: Set a scope to limit where the snippet will trigger -->
	<scope>source.php</scope>
</snippet>
