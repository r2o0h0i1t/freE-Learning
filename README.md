# E-Learning Website

### Features
* Enroll in a course.
* Upload your own course.

## Project Layout

|Components| CSS | JS | PHP | PATH |
|:--|:--:|:--:|:--:|:---:|
| Navbar | nav.css |-	 | -	| `/includes/components/navbar.php` |
| Navbar 2 | nav.css |-	 | -	|`/includes/components/navbar2.php` |
| Login Form | modals.css | modals.js	 | -	|`/includes/components/login-form.php` |
| Register Form| modals.css | register-handler.js, modals.js	 | register-handler.php	|`/includes/components/register-form.php` |
***
|Pages| CSS | JS | PHP |PATH |
|:--|:--:|:--:|:--:|:---:|
| Homepage| hero.css |-	 | -	| `/index.php` |
| Courses | courses.css | display-course.js	 | fetch-course-handler.php	|`/pages/courses.php` |
| Course Details | courseDetails.css |-	 | *	|`/pages/course-details.php` |
| Dashboard| - | -	 |*	|`/pages/dashboard.php` |
| Upload course | - |upload-course.js	 | upload-course-handler.php	|`/pages/upload-course.php` |
