DROP DATABASE IF EXISTS `CupCrafty`;

CREATE DATABASE `CupCrafty`;

USE `CupCrafty`;

CREATE TABLE 
    `Roles` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255) NOT NULL
);

CREATE TABLE 
    `City` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255) NOT NULL
);

CREATE TABLE 
    `BranchDetails` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `CityId` INT NOT NULL,
        `Address` VARCHAR(255) NOT NULL,
        `SquareFeet` INT NOT NULL,
        `OwnerName` VARCHAR(255) NOT NULL,
        FOREIGN KEY (`CityId`) REFERENCES `City` (`Id`)
);

CREATE TABLE 
    `Users` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `RoleId` INT NOT NULL,
        `BranchId` INT NOT NULL,
        FOREIGN KEY (`RoleId`) REFERENCES `Roles` (`Id`),
        FOREIGN KEY (`BranchId`) REFERENCES `BranchDetails` (`Id`)
);

CREATE TABLE 
    `Module` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255) NOT NULL
);

CREATE TABLE 
    `Permission` (
        `UserId` INT NOT NULL,
        `ModuleId` INT NOT NULL,
        `BranchId` INT NOT NULL,
        PRIMARY KEY (`UserId`),
        FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`),
        FOREIGN KEY (`ModuleId`) REFERENCES `Module` (`Id`),
        FOREIGN KEY (`BranchId`) REFERENCES `BranchDetails` (`Id`)
);

CREATE TABLE 
    `Categories` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255) NOT NULL
);

CREATE TABLE 
    `Products` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `CategoryId` INT NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        `Description` VARCHAR(255) NOT NULL,
        `Price` INT NOT NULL,
        `ImageFileName` VARCHAR(255) NOT NULL,
        FOREIGN KEY (`CategoryId`) REFERENCES `Categories` (`Id`)
);

CREATE TABLE 
    `Stock` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `BranchId` INT NOT NULL,
        `ProductId` INT NOT NULL,
        `CurrentQuantity` INT NOT NULL,
        FOREIGN KEY (`BranchId`) REFERENCES `BranchDetails` (`Id`),
        FOREIGN KEY (`ProductId`) REFERENCES `Products` (`Id`)
);

CREATE TABLE 
    `purchase` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `BranchId` INT NOT NULL,
        `ProductId` INT NOT NULL,
        `Quantity` INT NOT NULL,
        FOREIGN KEY (`BranchId`) REFERENCES `BranchDetails` (`Id`),
        FOREIGN KEY (`ProductId`) REFERENCES `Products` (`Id`)
);

CREATE TABLE 
    `Sales` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `BranchId` INT NOT NULL,
        `ProductId` INT NOT NULL,
        `Quantity` INT NOT NULL,
        FOREIGN KEY (`BranchId`) REFERENCES `BranchDetails` (`Id`),
        FOREIGN KEY (`ProductId`) REFERENCES `Products` (`Id`)
);

CREATE TABLE 
    `Expense` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `BranchId` INT NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        `Amount` INT NOT NULL,
        FOREIGN KEY (`BranchId`) REFERENCES `BranchDetails` (`Id`)
);
