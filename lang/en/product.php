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
    'insert' => 'Insert',
    'close' => 'Close',
    '' => '',
    '' => '',
     
    /**
     * addItemForm.blade.php
     */
    'item' => 'Item:',
    '100yearsSolitude' => 'One Hundred Years of Solitude',

     /**
      * addProductForm.blade.php
      */
    'name' => 'Name:',
    'book' => 'Book',
    'url' => 'URL:',
    'optionalUrlExample' => '(Optional) http://bookwebsite.com',

     /**
      * deleteButton.blade.php
      */
    'delete' => 'Delete',
    'confirmation' => 'Confirmation...',
    'wannaDelete' => "Would you like to delete the product <strong>:productname</strong> and it's items?",
    'notAbleRestore' => 'You will not be able to restore it after deletion.',

     /**
      * editButton.blade.php
      */
    'edit' => 'Edit',
    'editProduct' => 'Edit product',
    'newName' => 'New name:',
    'newUrl' => 'New url:',

     /**
      * index.blade.php
      */
    'products' => 'Products',
    'noProductsYet' => 'There are no products yet. Include one with the form above.',
    'addProduct' => 'Add product',
    'yourItems' => 'Your items',

     /**
      * show.blade.php
      */
    'items' => 'Items:',
    'noItemsYet' => 'There are no items yet. Include one with the form above.',
    'addItem' => 'Add item',
    'back' => 'BACK',
];
