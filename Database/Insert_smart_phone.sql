-- Apple

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (4, 14, 'Apple Iphone 11');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(14, 1, 'iphone-11(big-img).png'),
(14, 2, 'iphone-11(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (14, 9);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (14, 'Just apple.', 'Apple is lastest Iphone model', 'iphone-11.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(14, 13, 'IPS LCD, 6.1", Liquid Retina'),
(14, 9, 'Apple A13 Bionic 6 cores'),
(14, 10, 'IOS 13'),
(14, 11, '4GB'),
(14, 14, '128GB'),
(14, 19, '12MP'),
(14, 20, '12MP main camera, 12MP wide angle'),
(14, 21, '1 eSIM & 1 Nano SIM, 4G'),
(14, 22, '3110 mAh, fast charger')
(14, 6, 'VietNam');

--ip11 pro max

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (4, 14, 'Apple Iphone 11 Pro Max');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(15, 1, 'iphone-11-pro-max(big-img).png'),
(15, 2, 'iphone-11-pro-max(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (15, 10);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (15, 'Small jump in technology and revoluntion in price', 'Apple is lastest Flagship', 'iphone-11-pro-max.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(15, 13, 'OLED, 6.5", Super Retina XDR'),
(15, 9, 'Apple A13 Bionic 6 cores'),
(15, 10, 'IOS 13'),
(15, 11, '4GB'),
(15, 14, '64GB'),
(15, 19, '12MP'),
(15, 20, '3 camera 12 MP'),
(15, 21, '1 eSIM & 1 Nano SIM, 4G'),
(15, 22, '3969 mAh, fast charger'),
(15, 6, 'VietNam');

--oppo findx2

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (4, 15, 'OPPO Find X2 Smart phone');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(16, 1, 'oppo-find-x2(big-img).png'),
(16, 2, 'oppo-find-x2(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (16, 9);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (16, 'Free headphone or speakers, 50usd discount.', 'Oppo is lastest Flagship, Great display and camera cant justify the high price', 'oppo-find-x2.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(16, 13, 'AMOLED, 6.78", Quad HD+ (2K+)'),
(16, 9, 'Snapdragon 865'),
(16, 10, 'Android 10'),
(16, 11, '12 GB'),
(16, 14, '256 GB'),
(16, 19, '32 MP'),
(16, 20, '3 camera 48 MP, 13 MP, 12 MP'),
(16, 21, '2 Nano SIM, 5G'),
(16, 22, '4200 mAh, fast charger'),
(16, 6, 'China');

--oppo reno 3
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (4, 15, 'OPPO Reno3 Smart phone');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(17, 1, 'oppo-reno3(big-img).png'),
(17, 2, 'oppo-reno3(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (17, 13);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (17, 'Free headphone or speakers, 50usd discount.', 'OPPO Reno3 Smart phone', 'oppo-reno3.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(17, 13, 'AMOLED, 6.4", FullHD+'),
(17, 9, 'MediaTek Helio P90 8 cores'),
(17, 10, 'Android 10'),
(17, 11, '8 GB'),
(17, 14, '128 GB'),
(17, 19, '44 MP'),
(17, 20, '4 camera 48 MP, 13 MP, 8 MP, 2 MP'),
(17, 21, '2 Nano SIM, 4G'),
(17, 22, '4000 mAh, fast charger'),
(17, 6, 'China');

--samsung s20 ultra
INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (4, 1, 'Samsung S20 Ultra Smart Phone');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(18, 1, 'samsung-galaxy-s20-ultra(big-img).png'),
(18, 2, 'samsung-galaxy-s20-ultra(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (18, 10);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (18, 'New technology and revoluntion in price', 'Samsung is lastest Flagship.', 'samsung-galaxy-s20-ultra.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(18, 13, 'Dynamic AMOLED 2X, 6.9", Quad HD+ (2K+)'),
(18, 9, 'Exynos 990 8 cores'),
(18, 10, 'Android 10'),
(18, 11, '12 GB'),
(18, 14, '128 GB'),
(18, 19, '40 MP'),
(18, 20, '3 camera 108 MP & 48 MP, 12 MP, TOF 3D'),
(18, 21, '2 Nano sim or 1 eSIM & 1 Nano SIM, 5G'),
(18, 22, '4200 mAh, fast charger'),
(18, 6, 'VietNam');

--samsung galaxy a30s

INSERT INTO products(Cat_ID, Brand_ID, Product_Name)
VALUES (4, 1, 'Samsung Galaxy A30s Smart Phone');

INSERT INTO product_images(Product_ID, Img_spec_ID, Img_path)
VALUES 
(19, 1, 'samsung-galaxy-a30s(big-img).png'),
(19, 2, 'samsung-galaxy-a30s(small-img).png');

INSERT INTO prices_mapping(Product_ID, Price_ID)
VALUES (19, 14);

INSERT INTO product_descriptions(Product_ID, Small_description, Big_description, Word_path)
VALUES (19, 'Free headphone or speakers, 30usd discount.', 'Samsung is lastest Flagship.', 'samsung-galaxy-a30s.docx');

INSERT INTO technical_specifications(Product_ID, Spec_ID, Spec_Value)
VALUES 
(19, 13, 'Super AMOLED, 6.4", HD+'),
(19, 9, 'Exynos 7904 8 nhân'),
(19, 10, 'Android 9.0'),
(19, 11, '4 GB'),
(19, 14, '64 GB'),
(19, 19, '16 MP'),
(19, 20, '3 camera 25 MP & 8 MP, 5 MP'),
(19, 21, '2 Nano sim, 4G'),
(19, 22, '3916 mAh, fast charger'),
(19, 6, 'VietNam');