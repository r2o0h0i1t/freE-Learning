# FreE-Learning
## Features
#### User

 - View courses 
 - Search for courses 
 - Enroll in courses
 - Watch videos from courses

#### Admin

 - Upload courses 
 - Delete courses

## Technologies used
#### Framework
- [Semantic UI](https://semantic-ui.com)

#### Library
- [Typed.js](https://github.com/mattboldt/typed.js)
- [Jquery](https://jquery.com/)

#### Languages

 - Php 7 and mySQL
 - Javascript and Ajax
 - HTML 5 and CSS 3

#### Others

 - [Google recaptcha v2](https://www.google.com/recaptcha/intro/v3.html)

## Important notes

#### General

 - Base folder name: *freE-Learning*
 - Default admin: username: yuvraj & password: 123456


#### Configuration file

 - Database name: *e-learning* 
 - Root website url: *http://localhost/freE-Learning*

#### Uploading files

 - Supported image formats: *.jpg* 
 - Supported video formats: *.mp4*
 - Image size limit: 2 Mb
 - Uploaded profile pictures are saved inside *`assets/images/profilePictures/`*
 - Uploaded courses pictures and photos  are saved inside *`assets/courses/`*
 
  #### Recaptcha keys
   
 - Data-sitekey: *`6LeKFY4UAAAAAK_wO_RC5UvJpq2xIYi3kQ7unzkx`*
 -  Secret key: *`6LeKFY4UAAAAACm-gpvwPuvzbMoZ3ktLm8fVNnVy`*
 - Get your keys at https://www.google.com/recaptcha/intro/v3.html

#### Project layout

```bash
C:.
│   .gitignore
│   .htaccess
│   adminpanel.php
│   courses.php
│   dashboard.php
│   details.php
│   e-learning.sql
│   homepage.php
│   lectures.php
│   login.php
│   README.md
│   register.php
│   upload.php
│
├───assets
│   ├───courses
│   ├───css
│   │   │   adminpanel.css
│   │   │   course-details.css
│   │   │   courses.css
│   │   │   dashboard.css
│   │   │   footer.css
│   │   │   homepage.css
│   │   │   lectures.css
│   │   │   logins.css
│   │   │   nav.css
│   │   │   semantic.min.css
│   │   │   upload.css
│   │   │
│   │   └───themes
│   │       └───default
│   │           └───assets
│   │               ├───fonts
│   │               │       brand-icons.eot
│   │               │       brand-icons.svg
│   │               │       brand-icons.ttf
│   │               │       brand-icons.woff
│   │               │       brand-icons.woff2
│   │               │       icons.eot
│   │               │       icons.otf
│   │               │       icons.svg
│   │               │       icons.ttf
│   │               │       icons.woff
│   │               │       icons.woff2
│   │               │       outline-icons.eot
│   │               │       outline-icons.svg
│   │               │       outline-icons.ttf
│   │               │       outline-icons.woff
│   │               │       outline-icons.woff2
│   │               │
│   │               └───images
│   │                       flags.png
│   │
│   ├───images
│   │   │   hero.jpg
│   │   │   icon.png
│   │   │
│   │   └───profilePictures
│   └───js
│           homepage.js
│           jquery-3.3.1.min.js
│           lectures.js
│           register.js
│           search.js
│           semantic.min.js
│           upload.js
│
└───includes
    │   config.php
    │
    ├───classes
    │       Account.php
    │       Constants.php
    │       Course.php
    │       FooterLinks.php
    │       Header.php
    │       Messages.php
    │
    ├───components
    │       footer.php
    │       navbar.php
    │
    └───handlers
        │   enroll-course.php
        │   logout-handler.php
        │   register-handler.php
        │   search-course.php
        │   upload-course.php
        │
        └───ajax
                register-form-checks.php
                upload-form-checks.php
```
