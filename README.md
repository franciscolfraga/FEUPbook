# FEUPbook

This project is being developed regarding the Information Systems and Databases course of MIEEC @ FEUP. It aims to produce an internal social network designed to connect students, professors and researchers based on their level of connectivity in the FEUP environment.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

In order to clone the project:
```
git clone https://github.com/franciscolfraga/FEUPbook
```

In order to run it on a development environment we are using [XAMPP](https://www.apachefriends.org/index.html).

You just need to copy the files into [htdocs](C:\xampp\htdocs) directory after installation and start the live server.

The following lines in XAMPP's php.ini should be uncommented or added: extension=php_pdo_pgsql.dll; default_charset = "iso-8859-15".

## Database Design

The database design is available in 2 pdf documents placed at the root of the repository. The sql script that implements the database is available at the same location.

## Deployment

**Task list:**

  - [X] Authentication.
  - [X] Member profile design.
  - [X] Database design and implementation.
  - [ ] Workspace and feed design.
  - [X] Settings page design.
  - [X] Settings page backend.
  - [ ] Algorithm to define and evaluate affinity levels between profiles.
  - [ ] Notifications.
  - [ ] Chat.
  - [ ] Groups creation and management.
  - [X] Automatic FEUP news display on feed.
  - [ ] Feed, chat and notifications asynchronous refresh.
  - [ ] Files sharing and ability to parse some formats into feed (video, image, sound and pdf).
  - [ ] Password recovering.
  - [ ] Administrator members that can edit or delete any inserted post.

## Assignments

Francisco Fraga:
* Member profile
* Algorithm to define and evaluate affinity levels between profiles.
* Settings Design.
* Settings page backend.
* Automatic FEUP news display on feed.

Miguel Cardoso:
* Workspace and Feed design.
* Chat.
* Notifications.
* Database design and implementation.

## Built With

* [XAMPP](https://www.apachefriends.org/index.html) - The local live server used for deployment.
* [PHP](http://php.net/) - An open source server sided scripting language.
* [HTML5](https://www.w3.org/html/) - Markup language used for structuring and presenting content on the World Wide Web.
* [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS) - Stylesheet language used to describe the presentation of a document.
* [Javascript](https://www.javascript.com/) - A high-level, interpreted programming language.
* [PostgreSQL](https://www.postgresql.org/) -  A powerful, open source object-relational database system.

## Authors

* **Francisco Fraga** - [franciscolfraga](https://github.com/franciscolfraga/)

* **Miguel Cardoso** - [mcardoso-pt](https://github.com/mcardoso-pt)

## Acknowledgments

* Inspired on some examples given and developed by our professor André Restivo.

* Developed under the guidance of our professors Tiago Cunha and José Pedro Ornelas.
