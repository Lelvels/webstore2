-- Từ cuối cùng sẽ mang số nhiều

CREATE DATABASE liberty_electronic;
USE liberty_electronic;

CREATE TABLE brands(
    Brand_ID INT AUTO_INCREMENT NOT NULL,
    Brand_Name VARCHAR(40),
    PRIMARY KEY (Brand_ID)
);

CREATE TABLE brand_details(
    Brand_ID INT NOT NULL,
    Founded_Year VARCHAR(4),
    Brand_Origin VARCHAR(20),
    Brand_Description TEXT,
    FOREIGN KEY (Brand_ID) REFERENCES Brands(Brand_ID),
    PRIMARY KEY (Brand_ID)
);

CREATE TABLE Categories(
    Cat_ID INT AUTO_INCREMENT NOT NULL,
    Cat_Name VARCHAR(40) NOT  NULL ,
    PRIMARY KEY(Cat_ID)
);

CREATE TABLE Products(
    Product_ID INT AUTO_INCREMENT NOT NULL,
    Cat_ID INT NOT NULL,
    Brand_ID INT NOT NULL,
    Product_Name VARCHAR(30) NOT NULL,
    PRIMARY KEY (Product_ID),
    FOREIGN KEY (Brand_ID) REFERENCES Brands(Brand_ID),
    FOREIGN KEY (Cat_ID) REFERENCES Categories(Cat_ID)
);

CREATE TABLE Technical_specification_details(
    Spec_ID INT AUTO_INCREMENT,
    Spec_Name VARCHAR(40) NOT NULL,
    PRIMARY KEY (Spec_ID)
);

-- Đây là bảng chứa value của spec của sản phẩm
CREATE TABLE Technical_specifications(
    Product_ID INT,
    Spec_ID INT, 
    Spec_Value TEXT,
    PRIMARY KEY (Product_ID),
    FOREIGN KEY (Product_ID) REFERENCES Products(Product_ID),
    FOREIGN KEY (Spec_ID) REFERENCES Technical_specification_details(Spec_ID)
);

CREATE TABLE Prices(
    Price_ID INT AUTO_INCREMENT,
    Price_Value DECIMAL(12,2),
    PRIMARY KEY (Price_ID)
);

CREATE TABLE Prices_mapping(
    Product_ID INT,
    Price_ID INT,
    FOREIGN KEY (Price_ID) REFERENCES Prices(Price_ID),
    FOREIGN KEY (Product_ID) REFERENCES Products(Product_ID)
);

CREATE TABLE Image_specification(
    Img_spec_ID INT NOT NULL,
    Img_spec_name VARCHAR(20),
    PRIMARY KEY (Img_spec_ID)
);

CREATE TABLE Product_Images(
    Img_ID INT NOT NULL AUTO_INCREMENT,
    Product_ID INT NOT NULL,
    Img_spec_ID INT NOT NULL,
    Img_Path TEXT,
    PRIMARY key (Img_ID),
    FOREIGN KEY (Product_ID) REFERENCES Products(Product_ID),
    FOREIGN KEY (Img_spec_ID) REFERENCES Image_specification(Img_spec_ID)
);

CREATE TABLE Product_descriptions(
    Product_ID INT NOT NULL,
    Small_description TEXT(2000),
    Big_description TEXT(4000),
    PRIMARY KEY(Product_ID),
    FOREIGN KEY(Product_ID) REFERENCES Products(Product_ID)
);

CREATE TABLE Customer_feedback(
    Feedback_ID INT AUTO_INCREMENT,
    Customer_name VARCHAR(60) NOT NULL,
    Customer_email VARCHAR(60),
    Customer_gender VARCHAR(8),
    Customer_phone VARCHAR(12),
    Customer_feedback TEXT,
    PRIMARY KEY (Feedback_ID)
);
