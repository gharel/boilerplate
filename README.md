# Backup code for Gulp build system

[![pipeline status](https://gitlab.skazy.name/web/BCI-net/badges/develop/pipeline.svg)](https://gitlab.skazy.name/web/BCI-net/commits/develop)

## Require
- Node.js
- Docker or web server (Laragon, etc.)

## Install
`npm install`

## Use
Create your own `docker-compose.override.yml` from `docker-compose.override.yml.dist`

### Command
`docker-compose up -d` if you need a web server
`npm start` launch JS/SCSS watcher, etc.
`npm run build` compile JS/SCSS file, etc.
`npm run lint:scss` check SCSS code
`npm run lint:js` check JS code
`npm run lint` check JS & CSS code
`npm run lint:scss:fix` fix SCSS code
`npm run lint:js:fix` fix JS code
`npm run lint:fix` fix JS & CSS code

## How to
Write your JS and SCSS in `web/src` folder
Use it in front with build file from `web/medias` folder

If you need another library, add to postinstall see package.json

## Technology
- BootStrap 4
- BEMIT : BEM + ITCSS
