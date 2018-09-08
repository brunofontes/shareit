# Share It

Cada usuário, identificado por e-mail, pode ter outros amigos

## DB

usuário(nome, email)
product[site/software](nome, admin)
userPerProduct(productID, userID)
item[licença](nome, productID, usedBy, usedSince)
waiting(userID, itemID, waitingSince)

## VIEWS

- Product (administration)
- Item (view itens, other itens from the same product if this one is occupied)