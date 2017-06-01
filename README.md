# upload
[![GitHub license](https://img.shields.io/github/license/kberzinch/upload.svg?style=flat-square)](https://raw.githubusercontent.com/kberzinch/upload/master/LICENSE.md) [![StyleCI badge](https://styleci.io/repos/92993554/shield)](https://styleci.io/repos/92993554)

Dead-simple file dropbox.

## Setup
1. Clone the repo to a directory and configure your web server as appropriate.
2. Create a directory where your files will be stored and ensure your web server can write to it.
3. Copy `config.sample.php` to `config.php` and edit as appropriate.

## Caveats
This script writes user-supplied content to disk. You should _probably_ secure the upload page in some fashion. **Definitely prevent PHP or other executable content from running from your target directory.**
