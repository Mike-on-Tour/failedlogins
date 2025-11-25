# Failed Logins

![Version: 2.1.0](https://img.shields.io/badge/Version-2.1.0-green)  
  
![phpBB >= 3.3.5 Compatible](https://img.shields.io/badge/phpBB->=%203.3.5%20Compatible-009BDF)  

![PHP >= 8.0.30, < 8.5.0](https://img.shields.io/badge/PHP->=%208.0.30,%20<%208.5.0-blueviolet)

[![Build Status](https://github.com/Mike-on-Tour/failedlogins/workflows/Tests/badge.svg)](https://github.com/Mike-on-Tour/failedlogins/actions)

## Description
This extension detects and counts failed login attempts for a user and logs each failed attempt in the user log.  
At the next successful login the user will be notified about the number of failed login attempts with a message box which includes a button to remove it. The counted failed attempts
will then be deleted from the user's data; this will also happen at the next successful login if the remove button has not been activated.
  
*Note to the administrator:* This extension does not have any settings in the ACP!
    
## Install

1. Download the latest release.
2. Unzip the downloaded file.
3. Copy the unzipped folder to `/ext/` (if done correctly, you'll have the main extension class at `(your forum root)/ext/mot/failedlogins/composer.json`).
4. Navigate in the ACP to `Customise -> Manage extensions`.
5. Look for `Failed Logins` under the Disabled Extensions list, and click its `Enable` link.

## Update

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Failed Logins` under the Enabled Extensions list, and click its `Disable` link.
3. Using your favorite FTP software go to the `(your forum root)/ext/mot/failedlogins` folder and delete all files and directories.
4. Locally unzip the file `mot_failedlogins_x.y.z.zip` file (x, y and z are numbers indicating the major version, minor version and patch level).
5. Upload all files from your unzipped `failedlogins` folder to your server into the `(your forum root)/ext/mot/failedlogins`, please make certain that you use the binary mode for uploading.
6. Go back to the ACP and look for `Failed Logins` under the Disabled Extensions list, and click its `Enable` link.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Failed Logins` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/mot/failedlogins` folder.

## License
![GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)
