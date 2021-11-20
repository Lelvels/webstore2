-- ACER
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (2, 10, 'ACER PREDATOR HELIOS 300');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(5, 6, 'China'),
(5, 9, 'Intel Core i7 9750H'),
(5, 10, 'Window 10 Home'),
(5, 11, 'DDR4 16GB 2666MHz'),
(5, 12, 'Geforce RTX 2060 6GB'),
(5, 13, '15.6 FHD IPS, 144Hz 3ms'),
(5, 14, '256GB'),
(5, 15, '1 slot HDD 2.5'),
(5, 16, '2.4 kg');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(5, 1, 'Helios-300(big-img).png'),
(5, 2, 'Helios-300(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (5, 4);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (5, 'Free ship, free backpack and free mouse, 50USD gift card.', 'ACER PREDATOR HELIOS 300', 'Helios-300.docx');



-- ASUS

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (2, 11, 'LAPTOP ASUS TUF A15');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(6, 1, 'TUF-A15(big-img).png'),
(6, 2, 'TUF-A15(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (6, 5);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (6, 'Free ship, free backpack and free mouse, 50USD gift card.', 'LAPTOP ASUS TUF A15', 'TUF-A15.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(6, 6, 'China'),
(6, 9, 'AMD Ryzen 5 – 4600H'),
(6, 10, 'Window 10 Home'),
(6, 11, 'DDR4 8GB 3200MHz'),
(6, 12, 'Geforce GTX 1650 4GB'),
(6, 13, '15.6 FHD IPS, 144Hz'),
(6, 14, '512GB'),
(6, 15, '1 slot HDD 2.5'),
(6, 16, '2.3 kg');

-- ASUS g14

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (2, 11, 'ASUS ROG ZEPHYRUS G14');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(7, 1, 'ZEPHYRUS G14(big-img).png'),
(7, 2, 'ZEPHYRUS G14(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (7, 4);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (7, 'Free ship, free backpack and free mouse, 50USD gift card.', 'ASUS ROG ZEPHYRUS G14', 'ZEPHYRUS G14.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(7, 6, 'China'),
(7, 9, 'AMD Ryzen 7 – 4800HS'),
(7, 10, 'Window 10 Home'),
(7, 11, 'DDR4 16GB 3200MHz'),
(7, 12, 'Geforce GTX 1660Ti'),
(7, 13, '14" 2K IPS, 100% sRGB'),
(7, 14, '512GB'),
(7, 15, '1 slot HDD 2.5'),
(7, 16, '1.7 kg');

-- DELL G3

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (2, 12, 'DELL G3 INSPIRON 3590');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(8, 1, 'Dell-G3(big-img).png'),
(8, 2, 'Dell-G3(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (8, 5);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (8, 'Free ship, free backpack and free mouse, 50USD gift card.', 'DELL G3 INSPIRON 3590', 'DELL-G3.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(8, 6, 'China'),
(8, 9, 'Intel Core i5 9300H'),
(8, 10, 'Window 10 Home'),
(8, 11, 'DDR4 8GB 2666MHz'),
(8, 12, 'Geforce GTX 1050 3GB'),
(8, 13, '15.6 FHD IPS, 144Hz'),
(8, 14, '256GB'),
(8, 15, '1 slot HDD 2.5'),
(8, 16, '2.5 kg');

--Lenovo

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (2, 13, 'LENOVO LEGION 5');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(9, 1, 'Legion-5(big-img).png'),
(9, 2, 'Legion-5(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (9, 6);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (9, 'Free ship, free backpack and free mouse, 50USD gift card.', 'LENOVO LEGION 5', 'Legion-5.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(9, 6, 'China'),
(9, 9, 'Intel Core i5 10300H'),
(9, 10, 'Window 10 Home'),
(9, 11, 'DDR4 8GB 3200MHz'),
(9, 12, 'Geforce GTX 1650 4GB'),
(9, 13, '15.6 FHD IPS, 144Hz'),
(9, 14, '512GB'),
(9, 15, '1 slot HDD 2.5'),
(9, 16, '2.4 kg');
