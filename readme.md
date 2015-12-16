# CSCI E-15 Project 4 KidzMoments by Jean Yu Chun Su

## Live URL
[http://p4.meiosise.com](http://p4.meiosise.com)

## Description
This project is to create a kids moment sharing platform for family members to use.
The target users are parents or relatives of a kid to add a kid into the user profile and the kid's moments photos. A user can invite their family members to add the kid's profile with a family code.
The application is created with Laravel framework and Composer is used to manage packages applied in the project.
Controllers were used to route pages and views were used to organize GUI page html.

Users can register an account using unique email address.
Once the user account is registered, user can login via login form.
Users who have Facebook accounts can also login directly via Facebook connect.

Users can access kids or photos content only after they are logged in.

Once a user is logged in, he/she will be redirected to home page with a list of photos belonging to the user's kids.

There are two menu, "Add a kid" and "Add a photo" allowing users to add more kids or their photos to the account.

Users will need to create a kid profile first before a photo is added/associated to the kid's profile.
In the "Add a kid" menu, a kid's name, gender and family code are required to create the kid's profile. User can add a kid's avatar if needed.
The family code is intended to invite other family members to add the same kid to their user accounts so that the same kid's photo moments can be shared in a family.

A kid's photo moment can be associated to a kid's record via "Add a photo" menu.
On the "Add a photo" page, photo's title, image URL and belonging kid are required before a photo's record is saved. Moreover, tags can be associated to each photo.

## Demo
[https://youtu.be/NtQtcVQsZZ4](https://youtu.be/NtQtcVQsZZ4)

## Details for teaching team
User login is required to access kids or photos menu.

Two default user accounts, Jamal and Jill were seeded in the database per project requirement.

Please use 'hellojasper' or 'hellooly' if you want to add an existing kid via family code feature.

The index.blade.php file created by Laravel framework was moved to views/welcome folder to better organize views corresponding to controller action. The content was updated to welcome guests to the application for the first time.

The index.blade.php file under views/photos folder is the home page to greet logged-in users to take the next action. If the user did not have any kid belonging to the account, he/she will be greeted to create a kid's profile first before adding a kid's moment photo.

The following three non-essential features were completed per project requirement:
* Login via Facebook connect oAuth2
* Register form with Google reCAPTCHA to prevent spam robot account creation
* Add a kid's avatar via local image upload on the kid's profile creation page

The source code of the project can be found at my github repository: <https://github.com/JeanYSu/cscie15P4>

The planning document handed in in November:
<https://docs.google.com/document/d/1KsVl8w3nNkHbyZR5mmtS9eNK4PDx2wSdbvI5-CEl-gE/edit?usp=sharing>

## Outside code
* Bootstrap: http://www.w3schools.com/bootstrap/
* Package: anhskohbo/no-captcha used for reCAPTCHA component on user account creation page
* Package: laravelcollective/html used for image file upload component on kid's profile creation
 page
* Package: laravel/socialite used for Facebook login connect integration
* Package: barryvdh/laravel-debugbar for debugging sql queries and page performance at dev environment
* Foobooks project for basic CRUD form requirement references https://github.com/susanBuck/foobooks
