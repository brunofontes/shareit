<?php
/**
 * Strings from the product pages
 * They are separeted by the file that calls them.
 * Sometimes, a string is used on another file,
 * so it will stay at the common segment.
 */

return [
    /**
     * COMMON
     */
    'insert' => 'Inserir',
    'close' => 'Fechar',
     
    /**
     * addItemForm.blade.php
     */
    'item' => 'Item:',
    '100yearsSolitude' => 'Cem anos de solidão',

     /**
      * addProductForm.blade.php
      */
    'name' => 'Nome:',
    'book' => 'Livro',
    'url' => 'URL:',
    'optionalUrlExample' => '(Opcional) http://sitedolivro.com.br',

     /**
      * deleteButton.blade.php
      */
    'delete' => 'Apagar',
    'confirmation' => 'Confirmação...',
    'wannaDelete' => "Você gostaria de apagar o produto <strong>:productname</strong> e seus items?",
    'notAbleRestore' => 'Não será possível recuperá-los depois.',

     /**
      * editButton.blade.php
      */
    'edit' => 'Editar',
    'editProduct' => 'Editar produto',
    'newName' => 'Novo nome:',
    'newUrl' => 'Nova url:',

     /**
      * index.blade.php
      */
    'products' => 'Produtos',
    'noProductsYet' => 'Ainda não há produtos cadastrados. Inclua um no formulário acima.',
    'addProduct' => 'Incluir produto',
    'yourItems' => 'Seus items',

     /**
      * show.blade.php
      */
    'items' => 'Items:',
    'noItemsYet' => 'Ainda não há itens cadastrados. Inclua um no formulário acima.',
    'addItem' => 'Incluir item',
    'back' => 'VOLTAR',
];
