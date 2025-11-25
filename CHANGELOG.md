# Change Log
All changes to `Failed Logins` will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [2.1.0] - 2025-06-30

### Added
-	An `if` clause to the `login_box_failed()` function of the event listener to prevent counting failed attempts for the guest user (anonymous) if an unknown username was used
-	A `ext.php` file including a new language file to display error messages during install if PHP or phpBB versions are unable to cope with the extension

### Changed
-	All function definions into using typed parameters

### Fixed
-	A problem with the user language setup which led to a fallback to the `en` language for system language variables

### Removed
  
  
## [2.0.0] - 2025-03-03

### Added

### Changed
-	Completely revised version of tas2580's abandoned extension

### Fixed

### Removed
  
  
## [1.1.0] - 2016

Last developed version for phpBB 3.1.x by tas2580, since then abandoned
