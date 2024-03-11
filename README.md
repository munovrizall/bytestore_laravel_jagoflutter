# Byte Store  

The backend web system for the [Byte Store](https://github.com/munovrizall/bytestore_flutter_jagoflutter) online shop application serves the purpose of adding products, categories, and managing ongoing orders.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Setup](#setup)
- [Acknowledgments](#acknowledgments)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Introduction

This project was developed during my participation in the Flutter Intensive Club Batch 12 by [Jagoflutter](https://jagoflutter.com/). The website serves as the backend for the [Byte Store](https://github.com/munovrizall/bytestore_flutter_jagoflutter) application, offering a range of capabilities including the ability to add categories, products, and efficiently manage ongoing orders.

![Laravel](https://img.shields.io/badge/Built_with-Laravel-red.svg)
![PHP](https://img.shields.io/badge/Built_with-PHP-blue?logo=php)
![HTML](https://img.shields.io/badge/Built_with-HTML-orange?logo=html5)
![CSS](https://img.shields.io/badge/Built_with-CSS-blueviolet?logo=css3)

## Features

A few of the things you can do with this system:

- Create, update, and delete categories.
- Create, update, and delete products.
- Managing ongoing orders.
- User account management system, with two roles: admin and user

<p align="center">
  <img src = "https://i.imgur.com/lb76GGT.png" width=1080>
</p>

## Setup

1. Clone this project into the C:\xampp\htdocs directory if you are using XAMPP, or into the C:\laragon\www directory if you are using Laragon.

```
git clone https://github.com/munovrizall/bytestore_laravel_jagoflutter.git
```

2. Start XAMPP or Laragon.

3. Migrate the database.

```
php artisan migrate:fresh --seed
```

4. Start the website with the IP you have. (for example my ip is 192.168.1.7)

```
php artisan serve --host 192.168.1.7
```

5. You are ready to go!

## Acknowledgments

Thanks to [Jagoflutter](https://jagoflutter.com/) for the guidance and the knowledge.
