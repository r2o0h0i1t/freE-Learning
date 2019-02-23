# E-Learning Website

### Features
* Enroll in a course.
* Upload your own course.

## Project Layout

|Components| CSS | JS | PHP | PATH |
|:--|:--:|:--:|:--:|:---:|
| Navbar | `nav.css` |-	 | -	| `includes/components/navbar.php` |
| Navbar 2 | `nav2.css` |-	 | -	|`includes/components/navbar2.php` |
| Login Form | `modals.css` | -	 | -	|`includes/components/login-form.php` |
| Register Form| `modals.css` | `register-handler.js`	 | `register-handler.php`	|`includes/components/register-form.php` |
***
|Pages| CSS | JS | PHP |PATH |
|:--|:--:|:--:|:--:|:---:|
| Homepage| `homepage.css` |-	 | -	| `homepage.php` |
| Courses | `courses.css` | `display-course.js`	 | `includes/handlers/fetch-course.php`	|`courses.php` |
| Course Details | `course-details.css` |-	 | *	|`details.php` |
| Dashboard| `dashboard.css` | -	 |*	|`dashboard.php` |
| Upload course | - |`upload-course.js`	 | `includes/handlers/upload-course.php`	|`upload.php` |
