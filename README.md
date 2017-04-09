# Sistem Informasi Kantin TC (SKTC) | _Cafetaria Information System_
A fuly functioning Cafetaria Information System build with CodeIgniter that designed to manage food sales on local cafetaria/shop

## Features
### For guest
1. Show cafetaria's status (Open/Close)
2. Show real-time food that being sold, it's stock, and price
![Guest page screenshot](/screenshot/01_home_umum.PNG?raw=true)
### For administrator
1. Add a food to be sold and it's stock
2. Show stock information such as critical stock, total stock, and stock that near expired date
3. Easily delete foods that past expired date
4. Change the cafetaria's status (Open/Close)
5. Transaction
6. Monthly financial report
![Admin page screenshot](/screenshot/05_admin_home.PNG?raw=true)

## Getting Started
- Make sure you have all the requirements in [official CodeIgniter requirements](/kantintc/readme.rst)
- The default homepage should be ```http://[localhost]/kantintc/index.php/Main/home```
### Installing
- Put all the folder ```kantintc``` on your web server. You might also change the name.
- Create a new database (name it as you wish, but the default is ```kantin```)
- Import the database by executing the [dump](/dump_kantintc.sql). Note: this dump designed to include some data for ease the testing. A truncate table operation would be good if you want to use empty database, or just modify the dump so that it wont insert any data.
- Adjust your [/application/config/databass.php](/application/config/databass.php) files to match with your current database setting
- Set username and password for login that can be managed directly at table ```user``` on the database, while default username and password for login are as follows:
  - username : adminkantin
  - password : ibu kantin
## Built With
* [CodeIgniter 3](https://www.codeigniter.com/) - The web framework used
* [JetBrains PhpStorm 2016.3.2](https://www.jetbrains.com/phpstorm/) - IDE

## Authors
* **Rahmat Nazali S** - [LinkedIn](https://www.linkedin.com/in/rahmat-nazali-salimi-43391a13b/) - [HackerRank](https://www.hackerrank.com/rahmatNazali)
* **Ilham Gurat Adillion** - [LinkedIn](https://www.linkedin.com/in/ilham-gurat-adillion-0b4b46133/)
* **Afif Ishamsyah H** - [Facebook](https://www.facebook.com/afif.ishamsyah.h)
* **Muhammad Rizki Prawiraatmaja** - [LinkedIn](https://www.linkedin.com/in/mrizkip/)

## Disclaimer
This project was developed by all four member (as specified in Authors). Since I have a quite spare time, I decided to polish it by trying to make the code more clean, compact, and tamp the MVC models.
