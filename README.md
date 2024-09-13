<img src="cover.png" alt="Image">

# HTTP - Logistic service
**HTTP - Logistic Service** is not just a website, but a full-fledged web platform designed to integrate freight carriers, drivers, and individuals. This platform aims to significantly optimize logistics processes, including simplifying the search for cargo and vehicles for rent.

**HTTP - Logistic Service** provides effective solutions for every market participant, providing a convenient and intuitive interface for managing logistics tasks. Whether it is cargo search, vehicle rental, or other logistics management, this platform guarantees maximum efficiency and convenience in every step of the process.

## Platform functionality
***Implemented*** 
- Registration / Authorization
- List of cargoes added by users / Search filtering
- Creation of cargo by user / Generation of cargo QR code
  
***Not implemented***
- List of cargoes added by users / Search filtering
- Creating a vehicle for rent / Generating a vehicle QR code 
- Creating a personal account, managing your own cargo/transport, deleting, editing, customizing your own account, changing your password or login
- Adding a review about the platform through your personal account, deleting, editing
- Information page about the shipper or carrier, adding a review about the user, viewing their cargo/transport

***In the planning stage***
- Limiting the addition of cargo/transport to 1, expanding the ability to add more when paying for a subscription plan
- Manage subscriptions in your account 

## Technology stack
**Frontend**
- HTML
- SCSS
- JS

**Backend**
- Laravel (PHP)
 
**Container management systems**
- Docker
 
**Database**
- MySQL

## Roles and access rights
**Guest** - Not an authorized user.\
**User** - Authorized user, individual.\
**Company** - Authorized user, company.

_In the planning stage_\
**Admin** - Administrator

## Controllers
**HomeController** - Responsible for displaying the home page

**CityController** - Accepts an AJAX request with a region ID, selects cities by this region ID and returns a json response

**CargoController** - Responsible for working with cargoes (output, creation, filtering, QR code generation). Uses _CargoFilterRequest_, _CargoRequest_ for data validation, _qrCodeService_ for QR generation

**LoginController** - Responsible for user authorization, uses _LoginRequest_ for data validation.

**RegisterController** - Responsible for user registration. Uses _StoreUserRequest_, _StoreCompanyRequest_ for validation, _UserService_ class-service for creating a user in the database, loading an avatar into the database and into the storage folder.

## Requests
**CargoFilterRequest** - validation of cargo search filters.

**CargoRequest** - validation for creating a cargo.

**LoginRequest** - validation of authorization data.

**StoreUserRequest** - validation for creating a user of type 'user'

**StoreCompanyRequest** - validation for creating a user of type 'company'

## Models
**Avatar** - user avatars, has a one-to-one relationship with _User_

**Cargo** - cargoes, has a one-to-one relationship with load_region_id, load_city_id, unload_region_id, unload_city_id also has a polymorphic relationship with QrCode

**City** - Cities

**QrCode** - Qr-codes, has a polymorphic relationship as it can work with Cargo and Cars

**Region** - Regions

**User** - Users, has a one-to-one relationship with avatars

## Services
**FilterService** - accepts a request to the database, an array of data, makes a selection from the database, creates a pagination and returns the request.

**UserService** - Checks for password occupancy (checking is inappropriate), creates a user record in the database depending on the received profile type, adds profile avatars to the database and to the folder.
