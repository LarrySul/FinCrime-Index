### The FinCrime Index <hr >

The project is built using Laravel Framework. The program reads data from Elucidate API services and returns list of all institutions and a search index if the institution is available else makes a report of the missing institution.


### Repo Overview <hr >

The repository contains the APIs that allows user do the followings 

i. Read the list of institutions

ii. Search for an institution

iii. Report a missing institution if not found in search


### Requirements <hr >

i. Download <a href="https://www.php.net/downloads.php"> PHP V7 </a> and above.

ii. Install <a href="https://getcomposer.org/download/"> Composer </a>


### Steps to run locally 🧑‍💻👩‍💻

i. Clone this repository:

```
git clone https://github.com/LarrySul/FinCrime-Index
```

ii. Install dependencies:

```
composer install
```

iii. Import the postman collection attach to the repository into your postman to call endpoint 


iv. Add the *ELUCIDATE_BASE_URL* to the .env file althought a fallback(https://api.dev.elucidate.co/) is used if this variable is not set.


v. Generate the application key using the artisan command

```
php artisan key:generate
```
