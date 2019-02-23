# E-Learning Website

### Features
* Enroll in a course.
* Upload your own course.

## Project Layout

|Components| CSS | JS | PHP | PATH |
|:--|:--:|:--:|:--:|:---:|
| Navbar | `assets/css/nav.css` |-	 | -	| `includes/components/navbar.php` |
| Navbar 2 | `assets/css/nav2.css` |-	 | -	|`includes/components/navbar2.php` |
| Login Form | `assets/css/modals.css` | -	 | -	|`includes/components/login-form.php` |
| Register Form| `assets/css/modals.css` | `register-handler.js`	 | `register-handler.php`	|`includes/components/register-form.php` |
***
|Pages| CSS | JS | PHP |PATH |
|:--|:--:|:--:|:--:|:---:|
| Homepage| `assets/css/homepage.css` |-	 | -	| `homepage.php` |
| Courses | `assets/css/courses.css` | `display-course.js`	 | `includes/handlers/fetch-course.php`	|`courses.php` |
| Course Details | `assets/css/course-details.css` |-	 | *	|`details.php` |
| Dashboard| `assets/css/dashboard.css` | -	 |*	|`dashboard.php` |
| Upload course | - |`upload-course.js`	 | `includes/handlers/upload-course.php`	|`upload.php` |
