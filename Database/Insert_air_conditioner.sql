-- INSERT AIR CONDITIONER

--Samsung
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (1, 1, 'Samsung Inverter air conditioner');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(1, 1, 'One-way air conditioner'),
(1, 2, 'Wall mounted'),
(1, 3, 'Yes'),
(1, 4, 'Easy Filter, Anti-dust, Fast Colling, Auto-cleaning, ...'),
(1, 5, 'R32'),
(1, 6, 'Thailand'),
(1, 7, '1 year'),
(1, 8, '12000 BTU');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(1, 1, 'samsung-air-conditioner(big-img).png'),
(1, 2, 'samsung-air-conditioner(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (1, 1);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES 
(1, 'Free install and free ship, 50USD gift card for the next shopping time', 'Samsung Inverter air conditioner', 'samsung-air-conditioner.docx');


--LG
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (1, 2, 'LG Inverter air conditioner');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(2, 1, 'One-way air conditioner'),
(2, 2, 'Wall mounted'),
(2, 3, 'Yes'),
(2, 4, 'Anti-bacteria, Deodorant air-filter mode,...'),
(2, 5, 'R32'),
(2, 6, 'Thailand'),
(2, 7, '1 year'),
(2, 8, '11200 BTU');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(2, 1, 'dh-lg(big-img).png'),
(2, 2, 'dh-lg(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (2, 2);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES 
(2, 'Free install and free ship, 50USD gift card for the next shopping time', 'LG Inverter air conditioner', 'dh-lg.docx');


--Panasonic
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (1, 4, 'Panasonic Inverter air conditioner');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(3, 1, 'One-way air conditioner'),
(3, 2, 'Wall mounted'),
(3, 3, 'Yes'),
(3, 4, 'Nanoe-G filter, Powerful fast cooling ,Deodorant air-filter mode,...'),
(3, 5, 'R32'),
(3, 6, 'Malaysia'),
(3, 7, '1 year'),
(3, 8, '9000 BTU');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(3, 1, 'dh panasonic(big-img).png'),
(3, 2, 'dh panasonic(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (3, 2);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES 
(3, 'Free install and free ship, 50USD gift card for the next shopping time', 'Panasonic Inverter air conditioner', 'dh panasonic.docx');


--kangaroo
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (1, 6, 'Kangaroo Inverter air conditioner');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(4, 1, 'One-way air conditioner'),
(4, 2, 'Wall mounted'),
(4, 3, 'Yes'),
(4, 4, 'Anti-dust ,Timer , Turbo fast cooling ,Deodorant air-filter mode,...'),
(4, 5, 'R32'),
(4, 6, 'Thailand'),
(4, 7, '1 year'),
(4, 8, '9000 BTU');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(4, 1, 'dh kangaroo(big-img).png'),
(4, 2, 'dh kangaroo(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (4, 3);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES 
(4, 'Free install and free ship, 50USD gift card for the next shopping time', 'Kangaroo Inverter air conditioner', 'dh panasonic.docx');




