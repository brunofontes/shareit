# Share It

Cada usuário, identificado por e-mail, pode ter outros amigos

## DB

[x] usuário(nome, email)
[x] product[site/software](nome, admin)
[ ] usersPerItem(productID, userID)
[x] item[licença](nome, productID, usedBy, usedSince)
[ ] waiting(userID, itemID, waitingSince)

## VIEWS

- Product (administration)
- Item (view itens, other itens from the same product if this one is occupied)