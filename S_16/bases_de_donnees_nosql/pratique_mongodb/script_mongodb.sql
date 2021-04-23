use jarditou

db.categories.insertOne({"cat_nom": "brouette"})
db.categories.insertOne({"cat_nom": "barbecue"})
db.categories.insertOne({"cat_nom": "arbuste"})
db.categories.insertOne({"cat_nom": "outillage"})

db.products.insertOne({"cat_nom": "barbecue", "pro_ref": "barb001", "pro_libelle": "Aramis", "pro_description": "lorem", "pro_prix": 110.00, "pro_stock": 2, "pro_couleur": "Brun", "pro_photo": "jpg", "pro_d_ajout": new Date("2018-04-18")})

db.products.insertOne({"cat_nom": "barbecue", "pro_ref": "barb002", "pro_libelle": "Athos", "pro_description": "lorem2", "pro_prix": 249.99, "pro_stock": 0, "pro_couleur": "Noir", "pro_photo": "jpg", "pro_d_ajout": new Date("2016-06-14")})

db.products.insertOne({"cat_nom": "barbecue", "pro_ref": "barb003", "pro_libelle": "Clatronic", "pro_description": "lorem3", "pro_prix": 135.90, "pro_stock": 10, "pro_couleur": "Chrome", "pro_photo": "jpg", "pro_d_ajout": new Date("2017-10-18")}

db.products.insertOne({"cat_nom": "brouette", "pro_ref": "brou002", "pro_libelle": "Silver", "pro_description": "Pellentesque ultrices vestibulum sagittis.", "pro_prix": 88.00, "pro_stock": 0, "pro_couleur": "Argent", "pro_photo": "jpg", "pro_d_ajout": new Date("2018-08-09")})

db.products.insertOne({"cat_nom": "brouette", "pro_ref": "brou003", "pro_libelle": "Yellow", "pro_description": "Sed lobortis pulvinar orci, ut efficitur urna eges...", "pro_prix": 54.49, "pro_stock": 3, "pro_d_ajout": new Date("2018-08-12")})

db.products.find({pro_prix: 54.49})

db.products.update({pro_ref: "brou003"},{$set:{pro_photo: "jpg"}})

db.products.deleteOne({pro_ref: "brou003"})