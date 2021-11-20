-- LG
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (3, 2, 'LG Inverter 613 liters');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(10, 1, 'tu-lanh-LG(big-img).png'),
(10, 2, 'tu-lanh-LG(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (10, 4);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (10, 'Free install and free ship, 50USD gift card for the next shopping time.', 'LG Inverter 613 liters', 'tu-lanh-LG.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(10, 6, 'China'),
(10, 17, '613 liters'),
(10, 1, 'Side by side'),
(10, 3, 'Yes'),
(10, 8, '1,84 kW/day'),
(10, 18, 'Power-saving, Quick-Icing,...'),
(10, 4, 'Deodorant technology: Nano Carbon, Multi-demension-cooling,...');

--Panasonic
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (3, 4, 'Panasonic Inverter 255 liters');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(11, 1, 'tu-lanh-panasonic(big-img).png'),
(11, 2, 'tu-lanh-panasonic(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (11, 7);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (11, 'Free install and free ship, 50USD gift card for the next shopping time.', 'Panasonic Inverter 255 liters', 'tu-lanh-panasonic.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(11, 6, 'VietNam'),
(11, 17, '255 liters'),
(11, 1, 'Common'),
(11, 3, 'Yes'),
(11, 8, '0.9 kW/day'),
(11, 18, 'Power-saving, Icing-technology: Panorama,...'),
(11, 4, 'Deodorant technology: Ag-clean, Prime Fresh+,...');

--Samsung
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (3, 1, 'Samsung Inverter 360 liters');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(12, 1, 'tu-lanh-samsung(big-img).png'),
(12, 2, 'tu-lanh-samsung(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (12, 8);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (12, 'Free install and free ship, 50USD gift card for the next shopping time.', 'Samsung Inverter 360 liters', 'tu-lanh-samsung.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(12, 6, 'ThaiLand'),
(12, 17, '360 liters'),
(12, 1, 'Common'),
(12, 3, 'Yes'),
(12, 8, '1.2 kW/day'),
(12, 18, 'Power-saving, Icing-technology: Twin Cooling Plus,...'),
(12, 4, 'Deodorant technology: Deodorizer,...');

--Sharp
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (3, 7, 'Sharp Inverter 605 liters');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(13, 1, 'tu-lanh-Sharp(big-img).png'),
(13, 2, 'tu-lanh-Sharp(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (13, 5);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (13, 'Free install and free ship, 50USD gift card for the next shopping time.', 'Samsung Inverter 360 liters', 'tu-lanh-Sharp.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(13, 6, 'ThaiLand'),
(13, 17, '605 liters'),
(13, 1, 'Multi Door'),
(13, 3, 'Yes'),
(13, 8, '1.25 kW/day'),
(13, 18, 'Power-saving, Icing-technology: Hybrid Cooling,...'),
(13, 4, 'Deodorant technology: Ag+Cu filter,...');
